<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Questionnaire;

#use Illuminate\Support\Facades\Storage;


class QuestionnaireController extends Controller
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
     * Retornamos un formulario que nos permite crear un nuevo elemento.
     */
    public function create(Request $request)
    {
        return view('questionnaire.create');
    }


    /**
     * Acción para crear un nuevo elemento.
     */
    public function store(Request $request)
    {
        //Obtenemos los datos básicos
        $module_id  = $request->session()->get('module_id');
        $teacher_id = $request->session()->get('teacher_id');
        $module = Module::where('id', $module_id)
                            ->withCount('questionnaires')
                            ->first();  


        //Persistimos los datos.
        $questionnaire = new Questionnaire;
        $questionnaire->ask        = $request->input('ask');
        $questionnaire->answer     = $request->input('answer');
        $questionnaire->bad1       = $request->input('bad1');
        $questionnaire->bad2       = $request->input('bad2');
        $questionnaire->bad3       = $request->input('bad3');
        $questionnaire->level       = $module->questionnaires_count + 1;
        $questionnaire->teacher_id = $teacher_id;
        $questionnaire->module_id  = $module_id;
        $questionnaire->save();

        session()->flash('message-success', '¡El cuestionario fue creado!');
        return redirect()->route('teacher.module.show', $module);
    }


    /**
     * Retornamos un formulario que nos permite actualizar un elemento. 
     */
    public function edit(Questionnaire $item)
    {
        return view('questionnaire.edit')
                ->with('questionnaire', $item);
    }


    /**
     * Acción para actualizar un elemento.
     * Se guardan los datos en bd.
     */
    public function update(Request $request, Questionnaire $item)
    {
        $module = Module::where('id', $item->module_id)->first();

        $item->ask    = $request->input('ask'); 
        $item->answer = $request->input('answer'); 
        $item->bad1   = $request->input('bad1'); 
        $item->bad2   = $request->input('bad2'); 
        $item->bad3   = $request->input('bad3'); 
        $item->save();

        #Retorna un mensaje flash.
        session()->flash('message-success', '¡El cuestionario fue actualizado!');
        return to_route('teacher.module.show', $module);
    }


    /**
     * Eliminamos el elemento de nuestra base de datos. 
     * 
     * Envíamos un mensaje flash.
     * Retornamos la vista principal y envíamos el modulo a la vista.  
     */
    public function destroy(Request $request, Questionnaire $item)
    {
        $module = Module::where('id', $item->module_id)->first();
        $questionnaires = Questionnaire::where('module_id', '=', $module->id)->get();

        //Acomodamos el campo level.
        foreach ($questionnaires as $key => $value) {
            if ($value->level > $item->level) {
                $value->level = $value->level - 1;
                $value->save();
            }
        }

        //Elimina el elemento y retorna un mensaje flash.
        $item->delete();
        session()->flash('message-success', '¡El cuestionario fue eliminado correctamente!');
        return to_route('teacher.module.show', $module);
    }
}
