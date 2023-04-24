<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Course;

class TeacherController extends Controller
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
        $teacher    = Teacher::find($teacher_id);
        $course     = Course::where('teacher_id', $teacher->id)->first();      
        
        return view('teacher.index')
                ->with("teacher", $teacher)
                ->with("course", $course);
    }

    public function course(Request $request)
    {
        $teacher_id = $request->session()->get('teacher_id');
        $courses    = Course::where('teacher_id', $teacher_id)
                                ->withCount('modules')
                                ->get(); 

        return view('teacher.course')
                ->with("courses", $courses);
    }

    public function profile(Request $request)
    {
        $teacher_id = $request->session()->get('teacher_id');
        $teacher    = Teacher::find($teacher_id);
        return view('teacher.profile');
    }
}
