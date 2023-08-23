<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/*Importamos los modelos*/
use App\Models\User;
use App\Models\Note;
use App\Models\Course;
use App\Models\Module;
use App\Models\Teacher;
use App\Models\Questionnaire;


class ModuleController extends Controller
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
     * Retornamos un formulario que nos permite crear un nuevo elemento.
     */
    public function create(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $user    = User::find($user_id);
        $teacher = Teacher::find($user->teacher->id);
        $courses = $teacher->courses()->withCount('modules')->get(); 

        return view('module.create')
                        ->with('courses', $courses);
    }


    /**
     * Acción para crear un nuevo elemento.
     */
    public function store(Request $request)
    {
        //buscamos los datos para el curso.
        $teacher_id = $request->session()->get('teacher_id');
        $course_id = $request->input('course');
        $course = Course::where('id', $course_id)
                            ->withCount('modules')
                            ->first();

        //Persistimos los datos.
        $module = new Module;
        $module->name = $request->input('super_name');
        $module->description = $request->input('description');
        $module->level = $course->modules_count + 1;
        $module->teacher_id = $teacher_id;
        $module->course_id  = $course->id;
        $module->save();

        session()->flash('message-success', '¡El módulo fue creado!');
        return redirect()->route('teacher.course.show', $course);
    }


    /**
     * Retornamos una vista que nos muestra un elemento.
     */
    public function show(Request $request, Module $item)
    {
        //Guardamos el ID del módulo en session.
        $request->session()->put('module_id', $item->id);
        
        //Buscamos los datos básicos
        $teacher_id = $request->session()->get('teacher_id');
        $teacher = Teacher::find($teacher_id);
        $course = Course::find($item->course_id);


        //Buscamos los módulos.
        $item = Module::where('id', $item->id)
                    ->withCount('notes')
                    ->withCount('questionnaires')
                    ->first();

        //Buscamos las notas.
        $notes = Note::where('module_id', $item->id)
                        ->orderBy('level')
                        ->get(); 

        //Buscamos los cuestionarios.
        $questionnaires = Questionnaire::where('module_id', $item->id)
                        ->orderBy('level')
                        ->get(); 

        //Retornamos todos los datos a la vista. 
        return view('module.show')
                ->with("course", $course)
                ->with("module", $item)
                ->with("notes", $notes)
                ->with("questionnaires", $questionnaires);
    }


    /**
     * Retornamos un formulario que nos permite actualizar un elemento. 
     */
    public function edit(Module $item)
    {
        $course = $item->course;
        return view('module.edit')
                ->with('module', $item)
                ->with('course', $course);
    }


     /**
     * Acción para actualizar un elemento.
     */
    public function update(Request $request, Module $item)
    {
        //Persistimos los datos.
        $item->name = $request->input('super_name');
        $item->description = $request->input('description');
        $item->save();

        //Buscamos el curso correspondiente.
        $course = Course::find($item->course_id);

        #Retorna un mensaje flash.
        session()->flash('message-success', '¡El módulo fue actualizado!');
        return to_route('teacher.course.show', $course);
    }


    /**
     * Eliminamos un elemento de nuestra bd.
     * Buscamos el curso al cual pertenece nuestro módulo. 
     * Buscamos los módulos que tiene nuestro curso. 
     * 
     * Antes de eliminar el elemento debemos acomodar 
     * el orden de niveles de nuestro módulos.
     *  
     * Retornamos a la vista de un curso '$course'. 
     */
    public function destroy(Request $request, Module $item)
    {
        $course = Course::find($item->course_id);
        $modules  = Module::where('course_id', '=', $item->course_id)->get();
        
        //Acomodamos el level de los módulos.
        foreach ($modules as $key => $value) {
            if ($value->level > $item->level) {
                $value->level = $value->level - 1;
                $value->save();
            }
        }

        //Elimina el elemento y retorna un mensaje flash.
        $item->delete();
        session()->flash('message-success', '¡El módulo fue eliminado correctamente!');
        return to_route('teacher.course.show', $course);
    }
}
