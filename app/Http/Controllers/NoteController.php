<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/*Importamos los modelos*/
use App\Models\Note;
use App\Models\Module;
use App\Models\Course;


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
     */
    public function store(Request $request)
    {
        //Obtenemos los datos básicos
        $urlImage = null;
        $teacher_id = $request->session()->get('teacher_id');
        $module_id  = $request->session()->get('module_id');
        $module = Module::where('id', $module_id)
                            ->withCount('notes')
                            ->first();  

        //Procesamos la imagen
        // Obtener la imagen del formulario
        $imagen = $request->file('img');
        if (!(empty($imagen))){
            $url =  "/img/public/imgNotes/";
            $img = $request->file('img');
            // Generar un nombre único para la imagen
            $nameUnique = Str::random(20) . '.' . $img->getClientOriginalExtension();
            // Guardar la imagen en la carpeta "uploads"
            $img->move(public_path($url), $nameUnique);
            // Ruta completa de la imagen.
            $urlImage = $url . $nameUnique;
        }

        //Limpiamos la url.
        $parsedUrl = parse_url($request->input('youtube'));
        $queryString = $parsedUrl['query'];
        parse_str($queryString, $queryParameters);
        $youtubeCode = $queryParameters['v'];

        //Persistimos los datos.
        $note = new Note;
        $note->title       = $request->input('super_name');
        $note->img         = $urlImage;
        $note->youtube     = $request->input('youtube');
        $note->code_youtube = $youtubeCode;
        $note->description = $request->input('description');
        $note->level       = $module->notes_count + 1;
        $note->teacher_id  = $teacher_id;
        $note->module_id   = $module_id;
        $note->save();

        session()->flash('message-success', '¡La nota educativa fue creada!');
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
            //Procesamos la imagen
            // Obtener la ruta completa de la imagen
            // Verificar si la imagen existe antes de eliminarla
            if (file_exists(public_path($item->img)) and $item->img != null) {
                // Eliminar la imagen
                unlink(public_path($item->img));
            }

            // Obtener la imagen del formulario
            $url =  "/img/public/imgNotes/";
            $img = $request->file('img');
            // Generar un nombre único para la imagen
            $nameUnique = Str::random(20) . '.' . $img->getClientOriginalExtension();
            // Guardar la imagen en la carpeta "uploads"
            $img->move(public_path($url), $nameUnique);
            // Ruta completa de la imagen.
            $urlImage = $url . $nameUnique;

            $item->img = $urlImage;
        }

        //Limpiamos la url.
        $parsedUrl = parse_url($request->input('youtube'));
        $queryString = $parsedUrl['query'];
        parse_str($queryString, $queryParameters);
        $youtubeCode = $queryParameters['v'];

        $item->title       = $request->input('super_name');
        $item->youtube     = $request->input('youtube');
        $item->code_youtube = $youtubeCode;
        $item->description = $request->input('description');
        $item->save();

        #Retorna un mensaje flash.
        session()->flash('message-success', '¡La nota educativa fue actualizada!');
        return to_route('teacher.module.show', $module);
    }


    /**
     * Acción para eliminar un elemento.
     * 
     * Buscamos el módulo que corresponde la nota. 
     * Buscamos todas las notas educativas.
     * Eliminamos la imagen del curso que está en carpeta "Storage" en nuestro proyecto.
     * Eliminamos el elemento de nuestra base de datos. 
     * Envíamos un mensaje flash.
     * Retornamos la vista principal y envíamos el modulo a la vista.  
     */
    public function destroy(Request $request, Note $item)
    {
        $module = Module::where('id', $item->module_id)->first();
        $notes  = Note::where('module_id', '=', $module->id)->get();

        // Verificar si la imagen existe antes de eliminarla
        if (file_exists(public_path($item->img)) and $item->img != null) {
            // Eliminar la imagen
            unlink(public_path($item->img));
        }

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
