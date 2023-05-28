<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Note;

use Illuminate\Support\Facades\Storage;

class NoteController extends Controller
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
        return view('note.create');
    }


    /**
     * Acción para crear un nuevo elemento.
     * 
     * Procesamos la imagen. 
     *      1. Comprobamos que la imagen ingresada sea valida. 
     *      2. Guardamos la imagen en Storage. 
     * 
     * Guardamos el registro. 
     */
    public function store(Request $request)
    {
        //Obtenemos los datos básicos
        $module_id  = $request->session()->get('module_id');
        $teacher_id = $request->session()->get('teacher_id');
        $module = Module::where('id', $module_id)
                            ->withCount('notes')
                            ->first();  

        //Procesamos la imagen
        $request->validate([
            'img' => 'required|image|max:2048'
        ]);
        $urlImage = $request->file('img')->store('public/imgNotes');
        $urlImage = Storage::url($urlImage);
      

        //Persistimos los datos.
        $note = new Note;
        $note->title = $request->input('title');
        $note->img = $urlImage;
        $note->description = $request->input('description');
        $note->level = $module->notes_count + 1;
        $note->teacher_id = $teacher_id;
        $note->module_id  = $module_id;
        $note->save();

        session()->flash('message-success', '¡El módulo fue creado!');
        return redirect()->route('teacher.module.show', $module);
    }


    /**
     * Retornamos un formulario que nos permite actualizar un elemento. 
     */
    public function edit(Note $item)
    {
        return view('note.edit')
                ->with('note', $item);
    }


     /**
     * Acción para actualizar un elemento.
     * 
     * Comprobamos si se quiere actualizar la imágen. 
     *      1. Se comprueba el campo de la imágen. 
     *      2. Se comprueba que la imágen ingresada sea correcta.
     *      3. Se guarda la imágen.
     *    
     * Se guardan los datos en bd.
     */
    public function update(Request $request, Note $item)
    {
        $module = Module::where('id', $item->module_id)->first();

        //Comprobamos si se quiere actualizar una imágen. 
        $imagen = $request->file('img');
        if (!(empty($imagen))){

            //Elimina la imagen antigua.
            $image = str_replace('storage', 'public', $item->img);
            Storage::delete($image);
            
            //Procesamos la imagen
            $request->validate([
                'img' => 'required|image|max:2048'
            ]);
            $urlImage = $request->file('img')->store('public/imgNotes');
            $urlImage = Storage::url($urlImage);
            
            $item->img = $urlImage;
        }

        $item->title       = $request->input('title');
        $item->description = $request->input('description');
        $item->save();

        #Retorna un mensaje flash.
        session()->flash('message-success', '¡La nota educativa fue actualizada!');
        return to_route('teacher.module.show', $module);
    }


    /**
     * Buscamos el módulo que corresponde 
     * con la nota que será eliminada. 
     * 
     * Eliminamos la imagen del curso que está en 
     * carpeta "Storage" en nuestro proyecto.
     *  
     * Eliminamos el elemento de nuestra base de datos. 
     * 
     * Envíamos un mensaje flash.
     * Retornamos la vista principal y envíamos el modulo a la vista.  
     */
    public function destroy(Request $request, Note $item)
    {
        $module = Module::where('id', $item->module_id)->first();
        $notes  = Note::where('module_id', '=', $module->id)->get();

        //Elimina el elemento y retorna un mensaje flash.
        $image = str_replace('storage', 'public', $item->img);
        Storage::delete($image);

        //Acomodamos el campo level.
        foreach ($notes as $key => $value) {
            if ($value->level > $item->level) {
                $value->level = $value->level - 1;
                $value->save();
            }
        }
        
        $item->delete();
        session()->flash('message-success', '¡La nota educativa fue eliminada correctamente!');
        return to_route('teacher.module.show', $module);
    }
}
