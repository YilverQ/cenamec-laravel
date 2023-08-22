<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Module;
use App\Models\Note;
use App\Models\Questionnaire;

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
        $teacher_id = $request->session()->get('teacher_id');
        $teacher = Teacher::find($teacher_id);
        $courses = $teacher->courses;
        //listItem es un array asociativo que tiene los cursos y módulos
        $listItem = [];

        //asígnamos el nombre del curso con sus módulos.
        foreach ($courses as $key => $value) {
            $item = Module::where('teacher_id', $teacher_id)
                    ->where('course_id', $value->id)
                    ->withCount('notes')
                    ->withCount('questionnaires')
                    ->orderBy('level')
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
        $user_id = $request->session()->get('user_id');
        $user    = User::find($user_id);
        $teacher = Teacher::find($user->teacher->id);
        $courses = $teacher->courses()->withCount('modules')->get(); 

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
        $user_id = $request->session()->get('user_id');
        $user    = User::find($user_id);

       

        $course_id = $request->input('course');
        //buscamos el curso
        $course = Course::where('id', $course_id)
                            ->withCount('modules')
                            ->first();

        //Persistimos los datos.
        $module = new Module;
        $module->name = $request->input('name_module');
        $module->description = $request->input('description');
        $module->level = $course->modules_count + 1;
        $module->teacher_id = $user->teacher->id;
        $module->course_id  = $course->id;
        $module->save();

        session()->flash('message-success', '¡El módulo fue creado!');
        return redirect()->route('teacher.course.show', $course);
    }


    /**
     * Retornamos una vista que nos muestra un elemento.
     * Buscamos el profesor de nuestra sessión. 
     * Buscamos los módulos que tiene el curso que viene por párametro.
     * retornamos todos los datos. 
     */
    public function show(Request $request, Module $item)
    {
        $request->session()->put('module_id', $item->id);

        $teacher_id = $request->session()->get('teacher_id');
        $course = Course::find($item->course_id);

        $item = Module::where('id', $item->id)
                    ->withCount('notes')
                    ->withCount('questionnaires')
                    ->first();

        $notes = Note::where('module_id', $item->id)
                        ->where("teacher_id", $teacher_id)
                        ->orderBy('level')
                        ->get(); 

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
     * Recibimos los datos envíados por el formulario.
     * Persistimos los datos. 
     * Se guardan los datos en bd.
     */
    public function update(Request $request, Module $item)
    {
        $item->name = $request->input('name_module');
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
     * Buscamos el course al cual pertenece nuestro módulo. 
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
