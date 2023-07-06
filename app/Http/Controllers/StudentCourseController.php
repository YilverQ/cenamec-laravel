<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Module;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class StudentCourseController extends Controller
{
    /**
     * Middlewares necesarios para comprobar los permisos
     * auth.teacher -> Comprueba que el usuario tiene permiso de estudiante.
     */
    public function __construct()
    {
        $this->middleware('auth.student');
    }


    /**
     * Retornamos la vista para todos los cursos.
     */
    public function index(Request $request)
    {
        $student_id = $request->session()->get('student_id');
        $student    = Student::find($student_id);

        $myCourses = $student->courses;
        $courses = Course::where("id", "!=", 0)
                            ->withCount('modules')
                            ->get();

        $diff   = $courses->diff($myCourses);
        $diff2 = $courses->intersect($myCourses);

        return view('studentCourse.index')
                ->with('myCourses', $diff2)
                ->with('courses', $diff);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $item)
    {
        $student_id = $request->session()->get('student_id');
        $student    = Student::find($student_id);       

        #Agregamos el curso al estudiante. 
        #Agregamos los modulos al estudiante.
        $modules = $item->modules;
        $student->courses()->attach($item);
        $student->modules()->attach($modules);


        #Activamos el primer módulo del curso.
        #buscamos el id minimo. 
        $id_min = DB::table('module_student')
                        ->join('modules', 'module_student.module_id', '=', 'modules.id')
                        ->select("modules.course_id")
                        ->where('modules.course_id', '=', $item->id)
                        ->min('modules.id');


        $active_module = DB::table('module_student')
              ->where('module_id', $id_min)->update(['state' => 'active']);

        #Retorna un mensaje flash.
        session()->flash('message-success', '¡Te haz inscrito en el curso!');
        return to_route('student.course.display', $item);
    }


    /**
     * Retornamos una vista que nos muestra un elemento.
     * Buscamos los módulos que tiene el curso que viene por párametro.
     * retornamos todos los datos. 
     */
    public function show(Request $request, Course $item)
    {
        //Buscamos los datos. 
        $modules = Module::where('course_id', $item->id)
                        ->orderBy('level')
                        ->withCount('notes')
                        ->withCount('questionnaires')
                        ->get(); 

        //Retornamos todos los datos a la vista. 
        return view('studentCourse.show')
                ->with("course", $item)
                ->with("modules", $modules);
    }


    /**
     * Retornamos una vista que nos muestra un elemento.
     * Buscamos los módulos que tiene el curso que viene por párametro.
     * retornamos todos los datos. 
     */
    public function display(Request $request, Course $item)
    {
        $student_id = $request->session()->get('student_id');
        $student    = Student::find($student_id);  

        //Buscamos los datos. 
        $modules = Module::where('course_id', $item->id)
                        ->orderBy('level')
                        ->select('modules.*', 'module_student.state')
                        ->join('module_student', 'module_student.module_id', '=', 'modules.id')
                        ->withCount('notes')
                        ->withCount('questionnaires')
                        ->get();

        //Retornamos todos los datos a la vista. 
        return view('studentCourse.display')
                ->with("course", $item)
                ->with("modules", $modules);
    }
}
