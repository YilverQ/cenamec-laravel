<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrator;

class AdministratorController extends Controller
{
    /**
     * Middlewares necesarios para comprobar los permisos
     * auth.admin -> Comprueba que el usuario tiene permiso de administrador.
     */
    public function __construct()
    {
        $this->middleware('auth.admin');
    }


    /**
     * Retornamos una vista.
     * buscamos el administrador 'admin'
     * y lo envíamos a la vista. 
     */
    public function home(Request $request)
    {
        $admin_id = $request->session()->get('admin_id');
        $admin    = Administrator::find($admin_id);      
        return view('administrator.home')
                ->with("admin", $admin);
    }


    /**
     * Retornamos una lista de todos los administradores.
     * Buscamos una lista de todos los administradores
     * y lo envíamos a la vista. 
     */
    public function index()
    {
        //Obtenemos todos los administradores.
        $administrators = Administrator::all();

        return view('administrator.index')
                ->with("administrators", $administrators);
    }


    /**
     * Retornamos un formulario que nos permite crear un nuevo elemento.
     */
    public function create()
    {
        return view('administrator.create');
    }


    /**
     * Acción para crear un elemento.
     * 
     * Para crear el elemento se debe cumplir:
     *      1. El elemento debe ingresar un correo electrónico único.
     *      2. El correo electrónico no puede estar asociado a ningún usuario.    
     */
    public function store(Request $request)
    {
        $email = $request->input('email');
        $is_email_valid = Administrator::where('email', '=', $email)->first();

        //Si no se encuentra un elemento es porque el correo ingresado es correcto.
        if (empty($is_email_valid->email)) {
            //Creamos un nuevo elemento.
            $administrator = new Administrator;
            $administrator->name     = $request->input('name');
            $administrator->lastname = $request->input('lastname');
            $administrator->email    = $request->input('email');
            $administrator->password = $request->input('password');
            $administrator->save();
            
            #Retornamos un mensaje flash.
            session()->flash('message-success', '¡Un nuevo administrador fue creado!');
            return to_route('administrator.index');
        }

        #Retornamos un mensaje flash de error.
        session()->flash('message-error', 'Error, los datos ingresados no son correctos');
        return to_route('administrator.create');
    }


    /**
     * Retornamos una vista que nos muestra un elemento. 
     */
    public function show(Administrator $item)
    {
        return view('administrator.show')
                ->with("admin", $item);
    }


    /**
     * Retornamos un formulario que nos permite actualizar un elemento. 
     */
    public function edit(Administrator $item)
    {
        return view('administrator.edit')
                ->with("admin", $item);
    }

    /**
     * Acción para actualizar un elemento.
     * 
     * Para actualizar el elemento se debe cumplir:
     *      1. El elemento debe ingresar un correo electrónico único.
     *      2. El correo electrónico puede ser igual al que tenía anteriormente.    
     */
    public function update(Request $request, Administrator $item)
    {   
        $email = $request->input('email');
        $is_email_valid = Administrator::where('email', '=', $email)->first();
        $password = $request->input('password');

        //El correo ingresado en el formulario ya está en la bd.
        if (!(empty($is_email_valid->email))) {
            if ($item->email != $email) {
                #El correo ya lo tiene otra persona.
                #No actualiza el dato. 
                #Retorna un mensaje de error. 
                session()->flash('message-error', 'Error, el correo ingresado ya está siendo usado');
                return to_route('administrator.edit', $item);
            }
        }
        
        //Si no se cumple lo anterior es porque se puede actualizar los datos. 
        $item->name     = $request->input('name');
        $item->lastname = $request->input('lastname');
        $item->email    = $request->input('email');
        if ($password) {
            $item->password = $request->input('password');
        }
        $item->save();
        
        #Retorna un mensaje flash.
        session()->flash('message-success', '¡El administrador fue actualizado!');
        return to_route('administrator.index');
    }

    /**
     * Eliminamos un elemento de nuestra bd.
     * Para que se pueda eliminar se debe cumplir con lo siguiente:
     *      1. El elemento que se desea eliminar no puede ser del usuario que está activo.   
     */
    public function destroy(Request $request, Administrator $item)
    {
        //Obtener el administrador con la sesión activa. 
        $admin_id = $request->session()->get('admin_id');
        $admin    = Administrator::find($admin_id);


        /*
            Si el administrador de la sesión activa es el mismo
            que el elemento que se desea eliminar, no lo elimina.
            Retorna un mensaje flash de error. 
        */
        if ($admin->email == $item->email) {
            session()->flash('message-error', '¡Tu sesión está activa, no te puedes eliminar!');
            return to_route('administrator.index');
        }

        //Elimina el elemento y retorna un mensaje flash.
        $item->delete();
        session()->flash('message-success', '¡El administrador fue eliminado correctamente!');
        return to_route('administrator.index');
    }
}
