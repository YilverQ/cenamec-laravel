<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/*Importamos los modelos*/
use App\Models\User;
use App\Models\Course;
use App\Models\Module;
use App\Models\Student;
use App\Models\Certificate;


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
        //Buscamos el usuario.
        $user_id = $request->session()->get('user_id');
        $user    = User::find($user_id);

        //Buscamos los cursos del usuario.
        $myCourses = $user->student->courses;
        $courses = Course::where("id", "!=", 0)
                            ->where("disabled", "=", "t")
                            ->withCount('modules')
                            ->get();

        //Dividimos los cursos en los que está inscrito el usuario 
        //Y los que no está inscrito.
        $diff   = $courses->diff($myCourses);
        $diff2 = $courses->intersect($myCourses);


        return view('studentCourse.index')
                ->with('myCourses', $diff2)
                ->with('courses', $diff);
    }


    /**
     * Acción para crear un nuevo elemento.
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
              ->where('module_id', $id_min)
              ->where('student_id', '=', $student_id)
              ->update(['state' => 'active']);

        #Retorna un mensaje flash.
        session()->flash('message-success', '¡Te has inscrito en el curso!');
        return to_route('student.course.display', $item);
    }


    /**
     * Retornamos una vista que nos muestra un elemento.
     */
    public function show(Request $request, Course $item)
    {
        //Buscamos los datos. 
        $teachers = $item->teachers;
        //Buscamos los datos. 
        $modules = Module::where('course_id', $item->id)
                        ->orderBy('level')
                        ->withCount('notes')
                        ->withCount('questionnaires')
                        ->get(); 

        //Retornamos todos los datos a la vista. 
        return view('studentCourse.show')
                ->with("course", $item)
                ->with("teachers", $teachers)
                ->with("modules", $modules);
    }


    /**
     * Retornamos una vista que nos muestra un elemento.
     * Buscamos los módulos que tiene el curso que viene por párametro.
     * retornamos todos los datos. 
     */
    public function display(Request $request, Course $item)
    {
        //Buscamos los datos. 
        $teachers = $item->teachers;
     
        $student_id = $request->session()->get('student_id');
        $student    = Student::find($student_id);  

        //Buscamos los datos. 
        $modules = Module::where('course_id', $item->id)
                        ->orderBy('level')
                        ->select('modules.*', 'module_student.state', 'module_student.percentage')
                        ->join('module_student', 'module_student.module_id', '=', 'modules.id')
                        ->join('students', 'students.id', '=', 'module_student.student_id')
                        ->withCount('notes')
                        ->withCount('questionnaires')
                        ->where('students.id', '=', $student_id)
                        ->get();

        $certificate = Certificate::where('course_id', $item->id)
                                ->where('student_id', $student_id)
                                ->first();

        //Retornamos todos los datos a la vista. 
        return view('studentCourse.display')
                ->with("course", $item)
                ->with("teachers", $teachers)
                ->with("certificate", $certificate)
                ->with("modules", $modules);
    }
}
