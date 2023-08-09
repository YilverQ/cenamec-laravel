<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Municipalitie;
use App\Models\Parishe;
use App\Models\Profileimg;
use App\Models\User;
use App\Models\Administrator;
use App\Models\Teacher;
use App\Models\Student;

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
        $admin_id = $request->session()->get('user_id');
        $admin    = User::find($admin_id);  
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
        $administrators = User::all();

        return view('administrator.index')
                ->with("administrators", $administrators);
    }


    /**
     * Retornamos un formulario que nos permite crear un nuevo elemento.
     */
    public function create()
    {
        $states = State::all();
        $municipalities = Municipalitie::all();
        $parishes = Parishe::all();

        return view('administrator.create')
                    ->with("parishes", $parishes)
                    ->with("municipalities", $municipalities)
                    ->with("states", $states);
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
        $phone = $request->input('number_phone');
        $idCard = $request->input('identification_card');

        $is_email_valid  = User::where('email', '=', $email)->first();
        $is_phone_valid  = User::where('number_phone', '=', $phone)->first();
        $is_idCard_valid = User::where('identification_card', '=', $idCard)->first();

        //Si se encuentra un elemento es porque el correo ingresado es incorrecto.
        if (!(empty($is_email_valid->email))) {
            #Retornamos un mensaje flash de error.
            session()->flash('message-error', 'Error, el correo electrónico ya está en uso');
            return to_route('administrator.create');
        }

        //Si se encuentra un elemento es porque el número de teléfono ingresado es incorrecto.
        if (!(empty($is_phone_valid->number_phone))) {
            #Retornamos un mensaje flash de error.
            session()->flash('message-error', 'Error, el número de teléfono ya está en uso');
            return to_route('administrator.create');
        }

        //Si se encuentra un elemento es porque el número de cédula ingresado es incorrecto.
        if (!(empty($is_idCard_valid->identification_card))) {
            #Retornamos un mensaje flash de error.
            session()->flash('message-error', 'Error, el número de cédula ya está en uso');
            return to_route('administrator.create');
        }

        //Creamos un nuevo elemento.
        $user = new User;
        $user->firts_name  = $request->input('firts_name');
        $user->second_name = $request->input('second_name');
        $user->lastname  = $request->input('lastname');
        $user->second_lastname = $request->input('second_lastname');
        $user->gender    = $request->input('gender');
        $user->birthdate = $request->input('birthdate');
        $user->identification_card = $request->input('identification_card');
        $user->number_phone = $request->input('number_phone');
        $user->email    = $request->input('email');
        $user->password = $request->input('password');
        if ($user->gender == "Masculino"){
            $user->profileimg_id = 49;
        }
        else{
            $user->profileimg_id = 46;
        }
        $user->parishe_id = $request->input('parishe');
        $user->save();

        //Creamos un nuevo elemento ROLE.
        if (!(empty($request->input("is_admin")))) {
            $role = new Administrator;
            $role->user_id = $user->id; 
            $role->save();
        }
        if (!(empty($request->input("is_teacher")))) {
            $role = new Teacher;
            $role->user_id = $user->id; 
            $role->save();
        }
        if (!(empty($request->input("is_student")))) {
            $role = new Student;
            $role->user_id = $user->id; 
            $role->save();
        }

        #Retornamos un mensaje flash de error.
        session()->flash('message-success', '¡Has agregado un nuevo usuario!');
        return to_route('administrator.index');
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
    public function edit(User $item)
    {
        $states = State::all();
        $municipalities = Municipalitie::all();
        $parishes = Parishe::all();
        $profileimgs = Profileimg::all();


        return view('administrator.edit')
                    ->with("states", $states)
                    ->with("municipalities", $municipalities)
                    ->with("parishes", $parishes)
                    ->with("profileimgs", $profileimgs)
                    ->with('user', $item);
    }

    /**
     * Acción para actualizar un elemento.
     * 
     * Para actualizar el elemento se debe cumplir:
     *      1. El elemento debe ingresar un correo electrónico único.
     *      2. El correo electrónico puede ser igual al que tenía anteriormente.    
     */
    public function update(Request $request, User $item)
    {   
        /*Estos son los datos más sensibles*/
        $email = $request->input('email');
        $phone = $request->input('number_phone');
        $idCard = $request->input('identification_card');

        $is_email_valid  = User::where('email', '=', $email)->first();
        $is_phone_valid  = User::where('number_phone', '=', $phone)->first();
        $is_idCard_valid = User::where('identification_card', '=', $idCard)->first();

        //El correo ingresado en el formulario ya está en la bd.
        if (!(empty($is_email_valid->email))) {
            if ($item->email != $email) {
                #El correo ya lo tiene otra persona.
                #No actualiza el dato. 
                #Retorna un mensaje de error. 
                session()->flash('message-error', 'Error, el correo electrónico ya está en uso');
                return to_route('administrator.edit', $item);
            }
        }

        //Si se encuentra un elemento es porque el número de teléfono ingresado es incorrecto.
        if (!(empty($is_phone_valid->number_phone))) {
            if ($item->number_phone != $phone) {
                #El número de teléfono ya lo tiene otra persona.
                session()->flash('message-error', 'Error, el número de teléfono ya está en uso');
                return to_route('administrator.edit', $item);
            }
        }

        //Si se encuentra un elemento es porque el número de teléfono ingresado es incorrecto.
        if (!(empty($is_idCard_valid->identification_card))) {
            if ($item->identification_card != $idCard) {
                #El número de teléfono ya lo tiene otra persona.
                session()->flash('message-error', 'Error, el número de cédula ya está en uso');
                return to_route('administrator.edit', $item);
            }
        }
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
        $password = $request->input('password');
        $item->firts_name  = $request->input('firts_name');
        $item->second_name = $request->input('second_name');
        $item->lastname  = $request->input('lastname');
        $item->second_lastname = $request->input('second_lastname');
        $item->gender    = $request->input('gender');
        $item->birthdate = $request->input('birthdate');
        $item->identification_card = $request->input('identification_card');
        $item->number_phone = $request->input('number_phone');
        $item->email    = $request->input('email');
        $item->parishe_id = $request->input('parishe');

        /*Comprobamos si el usuario quizo actualizar su contraseña*/
        if ($password) {
            $item->password = $request->input('password');
        }

        $item->save();
        
        #Retorna un mensaje flash.
        session()->flash('message-success', '¡El usuario fue actualizado!');
        return to_route('administrator.edit', $item);
    }


    /**
     * Actualizamos la imagen del usuario 
     */
    public function updateImg(Request $request, User $item)
    {
        $value = $request->input('picture');
        if ($value){
            $item->profileimg_id = $value;
            $item->save();
        }

        #Retorna un mensaje flash.
        session()->flash('message-success', '¡La imagen del usuario fue actualizada!');
        return to_route('administrator.edit', $item);
    }

    /**
     * Eliminamos un elemento de nuestra bd.
     * Para que se pueda eliminar se debe cumplir con lo siguiente:
     *      1. El elemento que se desea eliminar no puede ser del usuario que está activo.   
     */
    public function destroy(Request $request, User $item)
    {
        //Obtener el administrador con la sesión activa. 
        $user_id = $request->session()->get('user_id');
        $user    = User::find($user_id);

        /*
            Si el administrador de la sesión activa es el mismo
            que el elemento que se desea eliminar, no lo elimina.
            Retorna un mensaje flash de error. 
        */
        if ($user->email == $item->email) {
            session()->flash('message-error', '¡Tu sesión está activa, no te puedes eliminar!');
            return to_route('administrator.index');
        }

        //Elimina el elemento y retorna un mensaje flash.
        $item->delete();
        session()->flash('message-success', '¡El usuario fue eliminado correctamente!');
        return to_route('administrator.index');
    }
}
