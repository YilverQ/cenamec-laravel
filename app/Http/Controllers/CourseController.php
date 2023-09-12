<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

/*Importamos los modelos*/
use App\Models\Course;
use App\Models\Module;
use App\Models\Teacher;


class CourseController extends Controller
{
    /**
     * Middlewares necesarios para comprobar los permisos
     * auth.teacher -> Comprueba que el usuario tiene permiso de profesor.
     */
    public function __construct()
    {
        $this->middleware('auth.teacher');
    }


    /**
     * Retornamos una lista de todos los cursos.
     */
    public function index(Request $request)
    {
        //Buscamos los cursos asignados al profesor. 
        $teacher_id = $request->session()->get('teacher_id');
        $teacher = Teacher::find($teacher_id);
        $courses = $teacher->courses()
                            ->withCount('modules')
                            ->orderBy('updated_at', 'desc')
                            ->get(); 

        return view('course.index')
                ->with("courses", $courses);
    }


    /**
     * Retornamos un formulario que nos permite crear un nuevo elemento.
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('course.create')
                ->with("teachers", $teachers);
    }


    /**
     * Acción para crear un nuevo elemento.
     * 
     * Para crear el elemento se debe cumplir: 
     *      1. El nombre del elemento debe ser único. 
     * 
     * Procesamos la imagen. 
     *      1. Comprobamos que la imagen ingresada sea valida. 
     *      2. Guardamos la imagen en Storage. 
     * 
     * Guardamos el registro. 
     */
    public function store(Request $request)
    {
        //Comprobamos si el nombre es valido.
        $name = $request->input('name');
        $is_name_valid  = Course::where('name', '=', $name)->first();
        //Si se encuentra un elemento es porque el nombre ingresado es incorrecto.
        if (!(empty($is_name_valid->name))) {
            session()->flash('message-error', 'Error, el nombre del curso ya está en uso');
            return to_route('teacher.course.create');
        }

        //Procesamos la imagen
        $request->validate([
            'img' => 'required|image|max:2048'
        ]);
        $urlImage = $request->file('img')->store('public/imgCourses');
        $urlImage = Storage::url($urlImage);

        //Almacenamos los saltos de linea
        $competence = $request->input('competence');
        $specific_objetive = $request->input('specific_objetive');
        
        //Persistimos los datos en la bd.
        $course = new Course;
        $course->name        = $request->input('super_name');
        $course->purpose     = $request->input('purpose');
        $course->general_objetive  = $request->input('general_objetive');
        $course->specific_objetive = $specific_objetive;
        $course->competence  = $competence;
        $course->disabled    = $request->input('disabled');
        $course->img         = $urlImage;
        $course->save();
        
        //Asignamos el curso a los profesores
        $teachers_id = $request->input('teachers');
        $course->teachers()->sync($teachers_id);


        session()->flash('message-success', '¡El curso fue creado!');
        return redirect()->route('teacher.course.index');
    }


    /**
     * Retornamos una vista que nos muestra un elemento.
     * Buscamos los módulos que tiene el curso que viene por párametro.
     * retornamos todos los datos. 
     */
    public function show(Request $request, Course $item)
    {
        //Variables auxiliares. 
        $studentsApproved      = 0;
        $studentsTaking        = 0;
        $studentsNotStarted    = 0;
        $modulesApproved = 0;
        $modulesState = [];


        //Buscamos los datos. 
        $teachers = $item->teachers;
        $students = $item->students;
        $modules = Module::where('course_id', $item->id)
                        ->orderBy('level')
                        ->withCount('notes')
                        ->withCount('questionnaires')
                        ->get();

        

        $lastModule = Module::where('course_id', $item->id)
                        ->orderBy('level', 'desc')
                        ->first();


        //Asignamos el campo de levelComplete. 
        //levelComplete sirve para conocer el módulo donde se quedó el estudiante.
        foreach ($students as $key => $value) {
            //Buscamos los datos. 
            $studentModule = Module::where('course_id', $item->id) 
                                    ->join('module_student', 'module_student.module_id', '=', 'modules.id') 
                                    ->join('students', 'students.id', '=', 'module_student.student_id') 
                                    ->where('students.id', '=', $value->id) 
                                    ->where('module_student.state', '=', 'finished') 
                                    ->orderBy('level', 'desc') 
                                    ->first();
            
            if ($studentModule) {
                if ($studentModule->level == $lastModule->level) {
                    $studentsApproved += 1; 
                    $students[$key]->levelComplete = "Curso finalizado";
                }
                else{
                    $studentsTaking += 1; 
                    $students[$key]->levelComplete = $studentModule->level . "° Módulo";
                }
                $modulesApproved += $studentModule->level;
            }
            else{
                $studentsNotStarted += 1; 
                $students[$key]->levelComplete = "No ha empezado";
            }
        }

        //Contamos las notas educativas.
        //Contamos los cuestionarios educativas.
        $notes_count = 0;
        $questionnaires_count = 0;
        foreach ($modules as $key => $value) {
            $notes_count = $notes_count + $value->notes_count;
            $questionnaires_count = $questionnaires_count + $value->questionnaires_count;
        }

        if ($lastModule) {
            for ($i=0; $i < $lastModule->level; $i++) { 
                $approved = DB::table('module_student')
                                            ->where('state', 'finished')
                                            ->where('module_id', $modules[$i]->id)
                                            ->count();
                $taking = DB::table('module_student')
                                            ->where('state', 'active')
                                            ->where('module_id', $modules[$i]->id)
                                            ->count();

                $modulesState["Módulo ". $i+1] = ["Approved" => $approved,
                                                "Taking" => $taking];
            }
        }


        //Retornamos todos los datos a la vista. 
        return view('course.show')
                ->with("studentsApproved", $studentsApproved)
                ->with("studentsTaking", $studentsTaking)
                ->with("studentsNotStarted", $studentsNotStarted)
                ->with("modulesApproved", $modulesApproved)
                ->with("modulesState", $modulesState)
                ->with("notes_count", $notes_count)
                ->with("questionnaires_count", $questionnaires_count)
                ->with("course", $item)
                ->with("teachers", $teachers)
                ->with("students", $students)
                ->with("modules", $modules);
    }


    /**
     * Retornamos un formulario que nos permite actualizar un elemento. 
     */
    public function edit(Course $item)
    {
        $teachers = Teacher::all();
        return view('course.edit')
                ->with('teachers', $teachers)
                ->with('course', $item);
    }


    /**
     * Acción para actualizar un elemento.
     * 
     * Para actualizar el elemento se debe cumplir:
     *      1. El nombre del elemento debe ser único.
     *      2. El 'nombre' no puede ser igual al que tenía asociado.
     * 
     * Comprobamos si se quiere actualizar la imágen. 
     *      1. Se comprueba el campo de la imágen. 
     *      2. Se comprueba que la imágen ingresada sea correcta.
     *      3. Se guarda la imágen.
     *    
     * Se guardan los datos en bd.
     */
    public function update(Request $request, Course $item)
    {
        //Comprobamos si el nombre es valido.
        $name = $request->input('name');
        $is_name_valid  = Course::where('name', '=', $name)->first();
        //Si se encuentra un elemento es porque el nombre ingresado es incorrecto.
        if (!(empty($is_name_valid->name))) {
            if ($item->name != $name) {
                #El nombre del curso ya lo tiene otra persona.
                #No actualiza el dato. 
                #Retorna un mensaje de error. 
                session()->flash('message-error', 'Error, nombre del curso ya está en uso');
                return to_route('teacher.course.edit');
            }
        }

        //Comprobamos si se quiere actualizar una imágen. 
        $imagen = $request->file('img');
        if (!(empty($imagen))){

            //Elimina la imagen antigua.
            $image = str_replace('storage', 'public', $item->img);
            Storage::delete($image);
            
            //Procesamos la imagen
            $request->validate([
                'img' => 'required|image|max:2048'
            ]);
            $urlImage = $request->file('img')->store('public/imgCourses');
            $urlImage = Storage::url($urlImage);
            
            $item->img = $urlImage;
        }

         //Almacenamos los saltos de linea
        $competence = $request->input('competence');
        $specific_objetive = $request->input('specific_objetive');
        

        //Si no se cumple lo anterior es porque se puede actualizar los datos. 
        $item->name        = $request->input('super_name');
        $item->purpose     = $request->input('purpose');
        $item->general_objetive  = $request->input('general_objetive');
        $item->specific_objetive = $specific_objetive;
        $item->competence  = $competence;
        $item->disabled    = $request->input('disabled');
        $item->save();

        //Asignamos el curso a los profesores
        if ($request->input('teachers')) {
            $teachers_id = $request->input('teachers');
            $item->teachers()->sync($teachers_id, true);
        }


        #Retorna un mensaje flash.
        session()->flash('message-success', '¡El curso fue actualizado!');
        return to_route('teacher.course.edit', $item);
    }


    /**
     * Eliminamos la imagen del curso que está en 
     * carpeta "Storage" en nuestro proyecto.
     *  
     * Eliminamos el elemento de nuestra base de datos. 
     * 
     * Envíamos un mensaje flash.
     * Retornamos la vista principal.  
     */
    public function destroy(Request $request, Course $item)
    {
        //Elimina el elemento y retorna un mensaje flash.
        $image = str_replace('storage', 'public', $item->img);
        Storage::delete($image);
        
        $item->delete();
        session()->flash('message-success', '¡El curso fue eliminado correctamente!');
        return to_route('teacher.course.index');
    }
}
