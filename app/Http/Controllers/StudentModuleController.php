<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Module;
use App\Models\Certificate;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StudentModuleController extends Controller
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
     * Retorna una vista para estudiar.
     */
    public function study(Request $request, Module $item)
    {
        $notes = $item->notes;
        //Retornamos todos los datos a la vista. 
        return view('studentModule.study')
                ->with("notes", $notes)
                ->with('module', $item);
    }


    /**
     * Retorna una vista para estudiar.
     */
    public function test(Request $request, Module $item)
    {
        $course = Course::find($item->course_id);
        $questionnaires = $item->questionnaires;

        //Ordenamos el array de forma aleatoria.
        $questions = [];
        $choices = [];
        foreach ($questionnaires as $key => $value) {
            $choices[0] = $value->answer;
            $choices[1] = $value->bad1;
            $choices[2] = $value->bad2;
            $choices[3] = $value->bad3;
            shuffle($choices);
            $value->choices = $choices;
            array_push($questions, $value);
        }
        shuffle($questions);

        //Retornamos todos los datos a la vista. 
        return view('studentModule.test')
                ->with("questionnaires", $questions)
                ->with("course", $course)
                ->with("module", $item);
    }

    /**
     * Retorna una vista para estudiar.
     */
    public function passModule(Request $request, Module $item)
    {
        $student_id = $request->session()->get('student_id');
        $percentage = $request->input('percentage');
        
        #Aprobamos el módulo.
        $active_module = DB::table('module_student')
              ->where('module_id', $item->id)
              ->where('student_id', $student_id)
              ->update(['state' => 'finished', 'percentage' => $percentage]);


        #Buscamos el id máximo de los módulos.
        $course_id = $item->course->id;
        $id_max = DB::table('module_student')
                        ->join('modules', 'module_student.module_id', '=', 'modules.id')
                        ->select("modules.course_id")
                        ->where('modules.course_id', '=', $course_id)
                        ->max('modules.id');


        /*
            Activamos el siguiente módulo si el id del módulo no es el máximo y si no ha aprobado el siguiente módulo.
        */
        if ($item->id != $id_max) {
            #Buscamos el siguiente módulo.
            $next_module = DB::table('module_student')
              ->where('module_id', $item->id + 1)
              ->where('student_id', $student_id)
              ->first();
            
            if ($next_module->state != "finished") {
                #Activamos el siguiente módulo el módulo.
                $active_module = DB::table('module_student')
                  ->where('module_id', $item->id + 1)
                  ->where('student_id', $student_id)
                  ->update(['state' => 'active']);
            }
        }else{
            $certificate = Certificate::where('course_id', $item->id)
                                ->where('student_id', $student_id)
                                ->first();
            if (!$certificate) {
                //Generamos un certificado.
                $certificate = new Certificate;
                $certificate->date_certificate = now();
                $certificate->course_id  = $course_id;
                $certificate->student_id = $student_id;
                $certificate->save();

                DB::table('course_student')
                    ->where('course_id', $course_id)
                    ->where('student_id', $student_id)
                    ->update(['dateFinished' => now()]);
            }
        }


        //Retornamos todos los datos a la vista.
        session()->flash('message-success', '¡Feliciades, has aprobado el módulo!'); 
        return to_route('student.course.display', $item->course_id);
    }
}
