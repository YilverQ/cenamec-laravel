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
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $teacher_id = $request->session()->get('teacher_id');
        $courses    = Course::where('teacher_id', $teacher_id)
                                ->withCount('modules')
                                ->get(); 

        return view('course.index')
                ->with("courses", $courses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
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

        $teacher_id = $request->session()->get('teacher_id');
        $course = new Course;
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->img = $urlImage;
        $course->teacher_id = $teacher_id;
        $course->save();

        return redirect()->route('teacher.course.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Course $item)
    {
        $teacher = $request->session()->get('teacher_id');
        $teacher = Teacher::find($teacher);
        $modules = Module::where('course_id', $item->id)
                        ->withCount('notes')
                        ->withCount('questionnaires')
                        ->get(); 


        return view('course.show')
                ->with("course", $item)
                ->with("teacher", $teacher)
                ->with("modules", $modules);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $item)
    {
        return view('course.edit')
                ->with('course', $item);
    }

    /**
     * Update the specified resource in storage.
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
                return to_route('teacher.course.index');
            }
        }

        //Comprobamos si se quiere actualizar una imagen. 
        $imagen = $request->file('img');
        if (!(empty($imagen))){
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
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Course $item)
    {
        //Elimina el elemento y retorna un mensaje flash.
        $item->delete();
        session()->flash('message-success', '¡El curso fue eliminado correctamente!');
        return to_route('teacher.course.index');
    }
}
