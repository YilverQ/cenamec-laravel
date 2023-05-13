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
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $teacher = $request->session()->get('teacher_id');
        $teacher = Teacher::find($teacher);
        $courses = $teacher->courses;
        $listItem = [];

        foreach ($courses as $key => $value) {
            $item = Module::where('course_id', $value->id)
                    ->withCount('notes')
                    ->withCount('questionnaires')
                    ->get();
            $listItem[$value->name] = $item;
        }

        return view('module.index')
                ->with("listItem", $listItem);
    }

    /**
     * Show the form for creating a new resource.
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
     * Store a newly created resource in storage.
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
        $module = new Module;
        $module->name = $request->input('name');
        $module->level = $course->modules_count + 1;
        $module->teacher_id = $teacher_id;
        $module->course_id  = $course->id;
        $module->save();

        return redirect()->route('teacher.course.show', $course);
    }

    /**
     * Display the specified resource.
     */
    public function show(Module $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Module $item)
    {
        $course = $item->course;
        return view('module.edit')
                ->with('module', $item)
                ->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Module $item)
    {
        //Elimina el elemento y retorna un mensaje flash.
        $item->delete();
        session()->flash('message-success', '¡El módulo fue eliminado correctamente!');
        return to_route('teacher.module.index');
    }
}
