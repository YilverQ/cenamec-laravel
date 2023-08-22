<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Parishe;
use App\Models\Municipalitie;
use App\Models\State;
use App\Models\Profileimg;
use App\Models\Teacher;

use Illuminate\Support\Facades\Storage;

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
     * Retornamos la vista principal del profesor.
     * envíamos los datos del profesor. 
     * Envíamos un cursos asociado al profesor de forma aleatoria.
     */
    public function index(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $user    = User::find($user_id);
        return view('teacher.index')
                ->with("teacher", $user);
    }


    /**
     * Retornamos una vista para ver el perfil.
     */
    public function profile(Request $request)
    {
        $states = State::all();
        $municipalities = Municipalitie::all();
        $parishes = Parishe::all();
        $profileimgs = Profileimg::all();
        
        $user_id = $request->session()->get('user_id');
        $user    = User::find($user_id);

        return view('teacher.profile')
                    ->with("states", $states)
                    ->with("municipalities", $municipalities)
                    ->with("parishes", $parishes)
                    ->with("profileimgs", $profileimgs)
                    ->with('user', $user);
    }


    /**
     * Acción para actualizar un elemento. 
     * 
     * Para actualizar se debe cumplir: 
     *      1. El correo ingresado debe ser único y no puede estar asociado a otra persona. 
     *      2. El numero de teléfono ingresado debe ser único y no debe estar asociado a otra persona.
     *      3. El número de cédula ingresado debe ser único y no debe estar asociado a otra persona. 
     * 
     * Se guardan los datos y se retorna un vista.
     */
    public function update(Request $request)
    {
        /*Buscamos el usuario de la sessión activa*/
        $user_id = $request->session()->get('user_id');
        $item    = User::find($user_id);


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
                return to_route('teacher.profile');
            }
        }

        //Si se encuentra un elemento es porque el número de teléfono ingresado es incorrecto.
        if (!(empty($is_phone_valid->number_phone))) {
            if ($item->number_phone != $phone) {
                #El número de teléfono ya lo tiene otra persona.
                session()->flash('message-error', 'Error, el número de teléfono ya está en uso');
                return to_route('teacher.profile');
            }
        }

        //Si se encuentra un elemento es porque el número de teléfono ingresado es incorrecto.
        if (!(empty($is_idCard_valid->identification_card))) {
            if ($item->identification_card != $idCard) {
                #El número de teléfono ya lo tiene otra persona.
                session()->flash('message-error', 'Error, el número de cédula ya está en uso');
                return to_route('teacher.profile');
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
        session()->flash('message-success', '¡Tus datos fueron actualizados!');
        return to_route('teacher.profile');
    }

    /**
     * Actualizamos la imagen del usuario 
     */
    public function updateImg(Request $request)
    {
        /*Buscamos el usuario de la sessión activa*/
        $user_id = $request->session()->get('user_id');
        $item    = User::find($user_id);

        $value = $request->input('picture');
        if ($value){
            $item->profileimg_id = $value;
            $item->save();
        }

        #Retorna un mensaje flash.
        session()->flash('message-success', '¡La imagen fue actualizada!');
        return to_route('teacher.profile');
    }
}