<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Retornamos una vista de la página principal.
     */
    public function home()
    {
        return view('login.home');
    }

    /**
     * Retornamos un formulario que nos permite ingresar a la aplicación.
     */
    public function login()
    {
        return view('login.login');
    }


    /**
     * Retornamos un formulario que nos permite crear un estudiante.
     */
    public function signup()
    {
        return view('login.signup');
    }
}
