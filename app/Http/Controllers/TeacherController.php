<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/*Importamos los modelos*/
use App\Models\User;
use App\Models\State;
use App\Models\Parishe;
use App\Models\Teacher;
use App\Models\Profileimg;
use App\Models\Municipalitie;


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
     * Envíamos un cursos asociado al profesor de forma aleatoria.
     */
    public function index(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $user    = User::find($user_id);
        $teacher = Teacher::find($user->teacher->id);
        $course  = $teacher->courses()->inRandomOrder()->first(); 

        return view('teacher.index')
                ->with("course", $course)
                ->with("teacher", $user);
    }


    /**
     * Retornamos una vista para ver el perfil.
     */
    public function profile(Request $request)
    {
        //Buscamos todas las ubicaciones geográficas.
        $states = State::all();
        $municipalities = Municipalitie::all();
        $parishes = Parishe::all();

        //Buscamos todas las imagenes para el perfil de usuario.
        $profileimgs = Profileimg::all();
        
        //Buscamos el usuario con session activa.
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
     * Para actualizar el elemento se debe cumplir:
     *      1. Ingresar un correo electrónico único.
     *      2. Ingresar un número de teléfono único.
     *      3. Ingresar un número de cédula único.
     *      4. Los datos ingresados puedes ser igual al que tenían anteriormente.
     * 
     * Luego de comprobar se procede a:
     *      1. Persistir los datos que ingresó el usuario.
     *      2. Se redirecciona a la vista principal del estudiante.   
     */
    public function update(Request $request)
    {
        /*Buscamos el usuario de la sessión activa*/
        $user_id = $request->session()->get('user_id');
        $item    = User::find($user_id);


        /*Recibimos los datos sencibles*/
        $email = $request->input('email');
        $phone = $request->input('number_phone');
        $idCard = $request->input('identification_card');

        /*Buscamos en la DB si existe alguno de los datos*/
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
        $password          = $request->input('reset_password');
        $item->firts_name  = $request->input('firts_name');
        $item->second_name = $request->input('second_name');
        $item->lastname    = $request->input('lastname');
        $item->second_lastname = $request->input('second_lastname');
        $item->gender      = $request->input('gender');
        $item->birthdate   = $request->input('birthdate');
        $item->identification_card = $request->input('identification_card');
        $item->number_phone = $request->input('number_phone');
        $item->email       = $request->input('email');
        $item->parishe_id  = $request->input('parishe');

        /*Comprobamos si el usuario quizo actualizar su contraseña*/
        if ($password) {
            $item->password = $password;
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

        //Recibimos el nombre de la imagen. 
        $value = $request->input('picture');
        
        //Comprobamos si el usuario quiso actualizar la imagen.
        if ($value){
            $item->profileimg_id = $value;
            $item->save();
        }

        #Retorna un mensaje flash.
        session()->flash('message-success', '¡La imagen fue actualizada!');
        return to_route('teacher.profile');
    }
}