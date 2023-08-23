<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

/*Importamos los modelos*/
use App\Models\User;
use App\Models\State;
use App\Models\Student;
use App\Models\Parishe;
use App\Models\Teacher;
use App\Models\Municipalitie;
use App\Models\Administrator;


class LoginController extends Controller
{
    /**
     * Middlewares necesarios para comprobar los permisos
     * delete.sessions -> Elimina las sessiones del servidor.
     * Solamente se aplica a algunos métodos.
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
        /*Buscamos la ubicaciones*/
        $states = State::all();
        $municipalities = Municipalitie::all();
        $parishes = Parishe::all();

        /*Retornamos una vista*/
        return view('login.signup')
                    ->with("parishes", $parishes)
                    ->with("municipalities", $municipalities)
                    ->with("states", $states);
    }


    /**
     * Retornamos un formulario que nos permite 
     * ingresar a la aplicación como administrador.
     */
    public function admin(Request $request)
    {
        return view('login.admin');
    }


    /**
     * Acción para crear un elemento.
     * 
     * Para crear el elemento se debe cumplir:
     *      1. Ingresar un correo electrónico único.
     *      2. Ingresar un número de teléfono único.
     *      3. Ingresar un número de cédula único.
     *      4. Los datos ingresados no puede estar asociado a ningún otro usuario.
     * 
     * Luego de comprobar se procede a:
     *      1. Persistir los datos que ingresó el usuario.
     *      2. Se crea un relación con la tabla 'students'. 
     *      3. Se redirecciona a la vista principal del estudiante.   
     */
    public function store(Request $request)
    {
        /*Recibimos los datos sencibles*/
        $email = $request->input('email');
        $phone = $request->input('number_phone');
        $idCard = $request->input('identification_card');

        /*Buscamos en la DB si existe alguno de los datos*/
        $is_email_valid  = User::where('email', '=', $email)->first();
        $is_phone_valid  = User::where('number_phone', '=', $phone)->first();
        $is_idCard_valid = User::where('identification_card', '=', $idCard)->first();


        //Si se encuentra un elemento es porque el correo ingresado es incorrecto.
        if (!(empty($is_email_valid->email))) {
            #Retornamos un mensaje flash de error.
            session()->flash('message-error', 'Error, el correo electrónico ya está en uso');
            return to_route('login.signup');
        }

        //Si se encuentra un elemento es porque el número de teléfono ingresado es incorrecto.
        if (!(empty($is_phone_valid->number_phone))) {
            #Retornamos un mensaje flash de error.
            session()->flash('message-error', 'Error, el número de teléfono ya está en uso');
            return to_route('login.signup');
        }

        //Si se encuentra un elemento es porque el número de cédula ingresado es incorrecto.
        if (!(empty($is_idCard_valid->identification_card))) {
            #Retornamos un mensaje flash de error.
            session()->flash('message-error', 'Error, el número de cédula ya está en uso');
            return to_route('login.signup');
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
        //Según el genero, le asignamos una imagen de perfil.
        if ($user->gender == "Masculino"){
            $user->profileimg_id = 49;
        }
        else{
            $user->profileimg_id = 46;
        }
        
        $user->parishe_id = $request->input('parishe');
        $user->save();

        //Creamos un nuevo estudiante.
        $role = new Student;
        $role->user_id = $user->id; 
        $role->save();
        
        #Guardamos datos importantes en "session".
        #Retornamos un mensaje flash.
        #Nos dirijimos a la vista principal del estudiante
        $request->session()->put('is_student_valid', 'true');
        $request->session()->put('user_id', $user->id);
        $request->session()->put('student_id', $user->student->id);
        session()->flash('message-success', '¡Te has registrado como estudiante!');
        return to_route('student.index');
    }


    /**
     * Comprobamos el tipo de authentication (teacher o student).
     */
    public function auth(Request $request)
    {
        $email    = $request->input("email");
        $password = $request->input("password");
        $user  = User::where('email', '=', $email)->first();

        //Si no se encuentra un usuario es porque el correo ingresado es incorrecto.
        if (empty($user->email)) {
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

        //Si no se encuentra un estudiante es porque no tiene permiso para acceder.
        if (empty($student->id)){
            session()->flash('message-error', 
                             'Error, no tienes permiso para acceder como estudiante');
            return to_route('login.login');
        }
        
        //Si el correo y la contraseña son correcta, El usuario tiene permiso.
        $request->session()->put('is_student_valid', 'true');
        $request->session()->put('student_id', $student->id);
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

        //Si no se encuentra un profesor es porque no tiene permiso para acceder.
        if (empty($teacher->id)){
            session()->flash('message-error', 
                             'Error, no tienes permiso para acceder como profesor');
            return to_route('login.login');
        }
        
        //Si el correo y la contraseña son correcta, El usuario tiene permiso.
        $request->session()->put('is_teacher_valid', 'true');
        $request->session()->put('teacher_id', $teacher->id);
        $request->session()->put('user_id', $user->id);
        return to_route('teacher.index');
    }


    /**
     * Acción para comprobar las credenciales ingresada por el usuario.
     */
    public function checkAdmin(Request $request, User $user)
    {
        $admin = Administrator::where('user_id', $user->id)
                                ->first(); 

        //Si no se encuentra un administrador es porque no tiene permiso para acceder.
        if (empty($admin->id)){
            session()->flash('message-error', 'Error, El administrador no existe');
            return to_route('login.admin');
        }
        
        //Si el correo y la contraseña son correcta, El usuario tiene permiso.
        $request->session()->put('is_admin_valid', 'true');
        $request->session()->put('admin_id', $admin->id);
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
