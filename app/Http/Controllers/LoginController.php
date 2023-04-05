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
        //Eliminamos todas las secciones involucradas con la autenticación.
        $request->session()->forget('is_teacher_valid');
        $request->session()->forget('is_student_valid');
        $request->session()->forget('is_admin_valid');
        $request->session()->forget('admin_id');
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
     * Comprobamos el tipo de authentication (teacher o student).
     */
    public function auth(Request $request)
    {
        //Check that kind of auth required.
        if ($request->input('role') == "student")
        {
            //Redirect to checkStudent.
            return $this->checkStudent($request);
        }
        //Redirect to checkTeacher.
        return $this->checkTeacher($request);  
    }


    /**
     * Acción para comprobar las credenciales ingresada por el usuario.
     */
    public function checkStudent(Request $request)
    {
        $email    = $request->input("email");
        $password = $request->input("password");
        $student  = Student::where('email', '=', $email)->first();

        //Si no se encuentra un estudiante es porque el correo ingresado es incorrecto.
        if (empty($student->password)) {
            session()->flash('message-error', 'Error, los datos ingresados no son correctos');
            return to_route('login.login');
        }

        //Si el correo y la contraseña son correcta, El usuario tiene permiso.
        if ($password == $student->password) {
            $request->session()->put('is_student_valid', 'true');
            return to_route('student.index');
        }
        
        session()->flash('message-error', 'Error, los datos ingresados no son correctos');
        return to_route('login.login');
    }


    /**
     * Acción para comprobar las credenciales ingresada por el usuario.
     */
    public function checkTeacher(Request $request)
    {
        $email    = $request->input("email");
        $password = $request->input("password");
        $teacher  = Teacher::where('email', '=', $email)->first();

        //Si no se encuentra un estudiante es porque el correo ingresado es incorrecto.
        if (empty($teacher->password)) {
            session()->flash('message-error', 'Error, los datos ingresados no son correctos');
            return to_route('login.login');
        }

        //Si el correo y la contraseña son correcta, El usuario tiene permiso.
        if ($password == $teacher->password) {
            $request->session()->put('is_teacher_valid', 'true');
            return to_route('teacher.index');
        }
        
        session()->flash('message-error', 'Error, los datos ingresados no son correctos');
        return to_route('login.login');
    }


    /**
     * Acción para comprobar las credenciales ingresada por el usuario.
     */
    public function checkAdmin(Request $request)
    {
        $email    = $request->input("email");
        $password = $request->input("password");
        $administrator = Administrator::where('email', '=', $email)->first();

        //Si no se encuentra un estudiante es porque el correo ingresado es incorrecto.
        if (empty($administrator->password)) {
            session()->flash('message-error', 'Error, los datos ingresados no son correctos');
            return to_route('login.admin');
        }

        //Si el correo y la contraseña son correcta, El usuario tiene permiso.
        if ($password == $administrator->password) {
            $request->session()->put('is_admin_valid', 'true');
            $request->session()->put('admin_id', $administrator->id);
            return to_route('administrator.home');
        }
        
        session()->flash('message-error', 'Error, los datos ingresados no son correctos');
        return to_route('login.admin');
    }


    /**
     * Cerramos la sección.
     */
    public function logout(Request $request)
    {
        session()->flash('message-success', 'Se ha cerrado sesión.');
        return to_route('login.login');
    }
}
