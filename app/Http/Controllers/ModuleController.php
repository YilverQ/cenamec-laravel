<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Module;

use Illuminate\Support\Facades\Storage;

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
     * Retornamos una lista de todos los cursos.
     * 
     * asignamos el nombre del curso con sus módulos.
     * Y lo envíamos a la vista.
     */
    public function index(Request $request)
    {
        $teacher = $request->session()->get('teacher_id');
        $teacher = Teacher::find($teacher);
        $courses = $teacher->courses;
        //listItem es un array asociativo que tiene los cursos y módulos
        $listItem = [];

        //asígnamos el nombre del curso con sus módulos.
        foreach ($courses as $key => $value) {
            $item = Module::where('course_id', $value->id)
                    ->withCount('notes')
                    ->withCount('questionnaires')
                    ->get();
            $listItem[$value->name] = $item;
        }

        //retornamos una vista
        return view('module.index')
                ->with("listItem", $listItem);
    }


    /**
     * Retornamos un formulario que nos permite crear un nuevo elemento.
     * 
     * Buscamos una lista de cursos y módulos que tiene cada curso.
     */
    public function create(Request $request)
    {
        $teacher_id = $request->session()->get('teacher_id');
        $courses    = Course::where('teacher_id', $teacher_id)
                                ->withCount('modules')
                                ->get();
        return view('module.create')
                        ->with('courses', $courses);
    }


    /**
     * Acción para crear un nuevo elemento.
     * 
     * Para crear el elemento se debe cumplir: 
     *      1. Que el usuario haya ingresado un curso para asociar el módulo. 
     * 
     * Guardamos el registro. 
     */
    public function store(Request $request)
    {
        //Comprobamos que se haya introducido un curso.
        $course = $request->input('course');
        if ($course == null) {
            session()->flash('message-error', 'Error, debes agregar un curso para el módulo');
            return to_route('teacher.module.create');
        }

        //buscamos el curso
        $course = Course::where('id', $course)
                            ->withCount('modules')
                            ->first();
        $teacher_id = $request->session()->get('teacher_id');

        //Persistimos los datos.
        $module = new Module;
        $module->name = $request->input('name');
        $module->level = $course->modules_count + 1;
        $module->teacher_id = $teacher_id;
        $module->course_id  = $course->id;
        $module->save();

        return redirect()->route('teacher.course.show', $course);
    }


    /**
     * Retornamos una vista que nos muestra un elemento.
     * Buscamos el profesor de nuestra sessión. 
     * Buscamos los módulos que tiene el curso que viene por párametro.
     * retornamos todos los datos. 
     */
    public function show(Module $item)
    {
        //
    }


    /**
     * Retornamos un formulario que nos permite actualizar un elemento. 
     * Le envíamos el curso asociado al módulo.
     * Le envíamos el módulo.
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
     * 
     * Para actualizar el elemento se debe cumplir:
     *      1. El 'nombre' debe ser único. 
     *      2. El 'nombre' es igual al que tenía asociado.
     * 
     * Se guardan los datos en bd.
     */
    public function update(Request $request, Module $item)
    {
        //Comprobamos si el nombre es valido.
        $name = $request->input('name');
        $is_name_valid  = Module::where('name', '=', $name)->first();
        //Si se encuentra un elemento es porque el nombre ingresado es incorrecto.
        if (!(empty($is_name_valid->name))) {
            if ($item->name != $name) {
                #El nombre del curso ya lo tiene otra persona.
                #No actualiza el dato. 
                #Retorna un mensaje de error. 
                session()->flash('message-error', 'Error, nombre del módulo ya está en uso');
                return to_route('teacher.module.edit', $item);
            }
        }

        //Si no se cumple lo anterior es porque se puede actualizar los datos. 
        $item->name = $request->input('name');
        $item->save();

        #Retorna un mensaje flash.
        session()->flash('message-success', '¡El módulo fue actualizado!');
        return to_route('teacher.module.index');
    }


    /**
     * Eliminamos un elemento de nuestra bd.
     */
    public function destroy(Request $request, Module $item)
    {
        //Elimina el elemento y retorna un mensaje flash.
        $item->delete();
        session()->flash('message-success', '¡El módulo fue eliminado correctamente!');
        return to_route('teacher.module.index');
    }
}
