<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('login.signup');
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
    public function storeStudent(Request $request)
    {
        $email = $request->input('email');
        $phone = $request->input('number_phone');
        $idCard = $request->input('identification_card');
        $is_email_valid  = Student::where('email', '=', $email)->first();
        $is_phone_valid  = Student::where('number_phone', '=', $phone)->first();
        $is_idCard_valid = Student::where('identification_card', '=', $idCard)->first();

        //Si se encuentra un elemento es porque el correo ingresado es incorrecto.
        if (!(empty($is_email_valid->email))) {
            #Retornamos un mensaje flash de error.
            session()->flash('message-error', 'Error, el correo electrónico ya está en uso');
            return to_route('admin.student.create');
        }

        //Si se encuentra un elemento es porque el número de teléfono ingresado es incorrecto.
        if (!(empty($is_phone_valid->number_phone))) {
            #Retornamos un mensaje flash de error.
            session()->flash('message-error', 'Error, el número de teléfono ya está en uso');
            return to_route('admin.student.create');
        }

        //Si se encuentra un elemento es porque el número de cédula ingresado es incorrecto.
        if (!(empty($is_idCard_valid->identification_card))) {
            #Retornamos un mensaje flash de error.
            session()->flash('message-error', 'Error, el número de cédula ya está en uso');
            return to_route('admin.student.create');
        }

        //Creamos un nuevo elemento.
        $student = new Student;
        $student->name     = $request->input('name');
        $student->lastname = $request->input('lastname');
        $student->identification_card = $request->input('identification_card');
        $student->number_phone = $request->input('number_phone');
        $student->email    = $request->input('email');
        $student->password = $request->input('password');
        $student->save();
        
        #Retornamos un mensaje flash.
        session()->flash('message-success', '¡Te haz registrado como estudiante!');
        return to_route('login.login');
        
    }


    /**
     * Comprobamos el tipo de authentication (teacher o student).
     */
    public function auth(Request $request)
    {
        //Comprobamos el tipo de autenticación.
        if ($request->input('role') == "student")
        {
            //Redirecciona a 'checkStudent'.
            return $this->checkStudent($request);
        }
        //Redirecciona a 'checkTeacher'.
        return $this->checkTeacher($request);  
    }


    /**
     * Acción para comprobar las credenciales ingresada por el usuario.
     */
    public function checkStudent(Request $request)
    {
        # $student: Hacemos una busqueda con Eloquent.
        $email    = $request->input("email");
        $password = $request->input("password");
        $student  = Student::where('email', '=', $email)->first();

        //Si no se encuentra un estudiante es porque el correo ingresado es incorrecto.
        if (empty($student->password)) {
            session()->flash('message-error', 'Error, el correo electrónico no está registrado');
            return to_route('login.login');
        }

        //Si el correo y la contraseña son correcta, El usuario tiene permiso.
        if ($password == $student->password) {
            $request->session()->put('is_student_valid', 'true');
            return to_route('student.index');
        }
        
        //En caso contrario, el usuario ha introducido una contraseña incorrecta.
        session()->flash('message-error', 'Error, la contraseña no es correcta');
        return to_route('login.login');
    }


    /**
     * Acción para comprobar las credenciales ingresada por el usuario.
     */
    public function checkTeacher(Request $request)
    {
        # $teacher: Hacemos una busqueda con Eloquent.
        $email    = $request->input("email");
        $password = $request->input("password");
        $teacher  = Teacher::where('email', '=', $email)->first();

        //Si no se encuentra un profesor es porque el correo ingresado es incorrecto.
        if (empty($teacher->password)) {
            session()->flash('message-error', 'Error, el correo electrónico no está registrado');
            return to_route('login.login');
        }

        //Si el correo y la contraseña son correcta, El usuario tiene permiso.
        if ($password == $teacher->password) {
            $request->session()->put('is_teacher_valid', 'true');
            $request->session()->put('teacher_id', $teacher->id);
            return to_route('teacher.index');
        }
        
        //En caso contrario, el usuario ha introducido una contraseña incorrecta.
        session()->flash('message-error', 'Error, la contraseña no es correcta');
        return to_route('login.login');
    }


    /**
     * Acción para comprobar las credenciales ingresada por el usuario.
     */
    public function checkAdmin(Request $request)
    {
        # $administrator: Hacemos una busqueda con Eloquent.
        $email    = $request->input("email");
        $password = $request->input("password");
        $administrator = Administrator::where('email', '=', $email)->first();

        //Si no se encuentra un estudiante es porque el correo ingresado es incorrecto.
        if (empty($administrator->password)) {
            session()->flash('message-error', 'Error, el correo electrónico no está registrado');
            return to_route('login.admin');
        }

        //Si el correo y la contraseña son correcta, El usuario tiene permiso.
        if ($password == $administrator->password) {
            $request->session()->put('is_admin_valid', 'true');
            $request->session()->put('admin_id', $administrator->id);
            return to_route('administrator.home');
        }
        
        //En caso contrario, el usuario ha introducido una contraseña incorrecta.
        session()->flash('message-error', 'Error, la contraseña no es correcta');
        return to_route('login.admin');
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
