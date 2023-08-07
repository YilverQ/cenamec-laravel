<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Parishe;
use App\Models\Municipalitie;
use App\Models\State;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Administrator;


class LoginController extends Controller
{
    /**
     * Middlewares necesarios para comprobar los permisos
     * auth.admin -> Comprueba que el usuario tiene permiso de administrador.
     */
    public function __construct()
    {
        $this->middleware('delete.sessions')
                ->only(['home', 'login', 'signup', 'admin', 'logout']);
    }


    /**
     * Retornamos una vista de la página principal.
     */
    public function home(Request $request)
    {
        return view('login.home');
    }

    /**
     * Retornamos un formulario que nos permite ingresar a la aplicación.
     */
    public function login(Request $request)
    {
        return view('login.login');
    }


    /**
     * Retornamos un formulario que nos permite crear un estudiante.
     */
    public function signup(Request $request)
    {
        $states = State::all();
        $municipalities = Municipalitie::all();
        $parishes = Parishe::all();

        return view('login.signup')
                    ->with("parishes", $parishes)
                    ->with("municipalities", $municipalities)
                    ->with("states", $states);
    }


    /**
     * Retornamos un formulario que nos permite ingresar a la aplicación como administrador.
     */
    public function admin(Request $request)
    {
        return view('login.admin');
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
            return to_route('login.checkSignup');
        }

        //Si se encuentra un elemento es porque el número de teléfono ingresado es incorrecto.
        if (!(empty($is_phone_valid->number_phone))) {
            #Retornamos un mensaje flash de error.
            session()->flash('message-error', 'Error, el número de teléfono ya está en uso');
            return to_route('login.checkSignup');
        }

        //Si se encuentra un elemento es porque el número de cédula ingresado es incorrecto.
        if (!(empty($is_idCard_valid->identification_card))) {
            #Retornamos un mensaje flash de error.
            session()->flash('message-error', 'Error, el número de cédula ya está en uso');
            return to_route('login.checkSignup');
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
        if (gender == "Masculino"){
            $user->img = "/storage/imgProfile/Vikingo.png";
        }
        else{
            $user->img = "/storage/imgProfile/Unicornio.png";
        }
        $user->parishe_id = $request->input('parishe');
        $user->save();
        
        #Retornamos un mensaje flash.
        #Nos dirijimos a la vista principal del estudiante
        $request->session()->put('is_student_valid', 'true');
        $request->session()->put('user_id', $user->id);
        session()->flash('message-success', '¡Te has registrado como estudiante!');
        return to_route('student.index');
    }


    /**
     * Comprobamos el tipo de authentication (teacher o student).
     */
    public function auth(Request $request)
    {
        # $student: Hacemos una busqueda con Eloquent.
        $email    = $request->input("email");
        $password = $request->input("password");
        $user  = User::where('email', '=', $email)->first();

        //Si no se encuentra un estudiante es porque el correo ingresado es incorrecto.
        if (empty($user->password)) {
            session()->flash('message-error', 'Error, el correo electrónico no está registrado');
            return to_route('login.login');
        }

        //Comprueba que el usuario no haya ingresado la contraseña correctamente.
        if ($password != $user->password) {
            session()->flash('message-error', 'Error, la contraseña no es correcta');
            return to_route('login.login');
        }


        //Comprobamos el tipo de autenticación.
        if ($request->input('role') == "student")
        {
            //Redirecciona a 'checkStudent'.
            return $this->checkStudent($request, $user);
        }
        elseif ($request->input('role') == "teacher") {
            //Redirecciona a 'checkTeacher'.
            return $this->checkTeacher($request, $user);  
        }
        //Redirecciona a 'checkAdmin'.
        return $this->checkAdmin($request, $user);  
    }


    /**
     * Acción para comprobar las credenciales ingresada por el usuario.
     */
    public function checkStudent(Request $request, User $user)
    {
        $student = Student::where('user_id', $user->id)
                                ->first(); 

        if (empty($student->id)){
            session()->flash('message-error', 'Error, El estudiante no existe');
            return to_route('login.login');
        }
        
        //Si el correo y la contraseña son correcta, El usuario tiene permiso.
        $request->session()->put('is_student_valid', 'true');
        $request->session()->put('user_id', $user->id);
        return to_route('student.index');
        
    }


    /**
     * Acción para comprobar las credenciales ingresada por el usuario.
     */
    public function checkTeacher(Request $request, User $user)
    {
        $teacher = Teacher::where('user_id', $user->id)
                                ->first(); 

        if (empty($teacher->id)){
            session()->flash('message-error', 'Error, El profesor no existe');
            return to_route('login.login');
        }
        
        //Si el correo y la contraseña son correcta, El usuario tiene permiso.
        $request->session()->put('is_teacher_valid', 'true');
        $request->session()->put('user_id', $user->id);
        return to_route('teacher.index');
    }


    /**
     * Acción para comprobar las credenciales ingresada por el usuario.
     */
    public function checkAdmin(Request $request, User $user)
    {
        $teacher = Administrator::where('user_id', $user->id)
                                ->first(); 

        if (empty($teacher->id)){
            session()->flash('message-error', 'Error, El administrador no existe');
            return to_route('login.admin');
        }
        
        //Si el correo y la contraseña son correcta, El usuario tiene permiso.
        $request->session()->put('is_admin_valid', 'true');
        $request->session()->put('user_id', $user->id);
        return to_route('administrator.home');
    }


    /**
     * Cerramos la sección.
     * Nos redirijimos a la vista 'login.login'
     */
    public function logout(Request $request)
    {
        session()->flash('message-success', 'Se ha cerrado sesión.');
        return to_route('login.login');
    }
}
