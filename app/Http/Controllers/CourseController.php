<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Module;

use Illuminate\Support\Facades\Storage;


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
     * también cuenta los módulos de cada curso.
     * y lo envíamos a la vista. 
     */
    public function index(Request $request)
    {
        //Buscamos el id del profesor. 
        $teacher_id = $request->session()->get('teacher_id');
        $courses    = Course::where('teacher_id', $teacher_id)
                                ->withCount('modules')
                                ->get(); 

        return view('course.index')
                ->with("courses", $courses);
    }


    /**
     * Retornamos un formulario que nos permite crear un nuevo elemento.
     */
    public function create()
    {
        return view('course.create');
    }


    /**
     * Acción para crear un nuevo elemento.
     * 
     * Para crear el elemento se debe cumplir: 
     *      1. El 'nombre' debe ser único. 
     *      2. El 'nombre' no puede estar asociado a ningún usuario.  
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

        //Persistimos los datos en la bd.
        $teacher_id = $request->session()->get('teacher_id');
        $course = new Course;
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->img = $urlImage;
        $course->teacher_id = $teacher_id;
        $course->save();

        session()->flash('message-success', '¡El curso fue creado!');
        return redirect()->route('teacher.course.index');
    }


    /**
     * Retornamos una vista que nos muestra un elemento.
     * Buscamos el profesor de nuestra sessión. 
     * Buscamos los módulos que tiene el curso que viene por párametro.
     * retornamos todos los datos. 
     */
    public function show(Request $request, Course $item)
    {
        //Buscamos los datos. 
        $teacher = $request->session()->get('teacher_id');
        $teacher = Teacher::find($teacher);
        $modules = Module::where('course_id', $item->id)
                        ->orderBy('level')
                        ->withCount('notes')
                        ->withCount('questionnaires')
                        ->get(); 

        //Retornamos todos los datos a la vista. 
        return view('course.show')
                ->with("course", $item)
                ->with("teacher", $teacher)
                ->with("modules", $modules);
    }


    /**
     * Retornamos un formulario que nos permite actualizar un elemento. 
     */
    public function edit(Course $item)
    {
        return view('course.edit')
                ->with('course', $item);
    }


    /**
     * Acción para actualizar un elemento.
     * 
     * Para actualizar el elemento se debe cumplir:
     *      1. El 'nombre' debe ser único. 
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

        //Si no se cumple lo anterior es porque se puede actualizar los datos. 
        $item->name        = $request->input('name');
        $item->description = $request->input('description');
        $item->save();

        #Retorna un mensaje flash.
        session()->flash('message-success', '¡El curso fue actualizado!');
        return to_route('teacher.course.index');
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
