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
     * Display a listing of the resource.
     */
    public function home(Request $request)
    {
        $admin_id = $request->session()->get('admin_id');
        $admin    = Administrator::find($admin_id);      
        return view('administrator.home')
                ->with("admin", $admin);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Obtenemos todos los administradores.
        $administrators = Administrator::all();

        return view('administrator.index')
                ->with("administrators", $administrators);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrator.create');
    }

    /**
     * Store a newly created resource in storage.
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
            
            //Persistimos los datos.
            session()->flash('message-success', '¡Un nuevo administrador fue creado!');
            return to_route('administrator.index');
        }
        session()->flash('message-error', 'Error, los datos ingresados no son correctos');
        return to_route('administrator.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Administrator $item)
    {
        return view('administrator.show')
                ->with("admin", $item);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Administrator $item)
    {
        return view('administrator.edit')
                ->with("admin", $item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Administrator $item)
    {   
        $email = $request->input('email');
        $is_email_valid = Administrator::where('email', '=', $email)->first();

        if (!(empty($is_email_valid->email))) {
            if ($item->email != $email) {
                #El correo ya lo tiene otra persona.
                session()->flash('message-error', 'Error, los datos ingresados no son correctos');
                return to_route('administrator.index');
            }
        }
        
        $item->name     = $request->input('name');
        $item->lastname = $request->input('lastname');
        $item->email    = $request->input('email');
        $item->password = $request->input('password');
        $item->save();
        
        session()->flash('message-success', '¡El administrador fue actualizado!');
        return to_route('administrator.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Administrator $item)
    {
        //Obtener el administrador con la sesión activa. 
        $admin_id = $request->session()->get('admin_id');
        $admin    = Administrator::find($admin_id);

        if ($admin->email == $item->email) {
            session()->flash('message-error', '¡Tu sesión está activa, no te puedes eliminar!');
            return to_route('administrator.index');
        }

        $item->delete();
        session()->flash('message-success', '¡El administrador fue eliminado correctamente!');
        return to_route('administrator.index');
    }
}
