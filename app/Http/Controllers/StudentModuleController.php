<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Module;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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
        $questionnaires = $item->questionnaires;
        //Retornamos todos los datos a la vista. 
        return view('studentModule.test')
                ->with("questionnaires", $questionnaires)
                ->with("module", $item);
    }
}
