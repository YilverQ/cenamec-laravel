<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class AdministratorTeacherController extends Controller
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
     * Retornamos una lista de todos los administradores.
     * Buscamos una lista de todos los administradores
     * y lo envíamos a la vista. 
     */
    public function index()
    {
        //Obtenemos todos los administradores.
        $teachers = Teacher::all();

        return view('adminTeacher.index')
                ->with("teachers", $teachers);
    }


    /**
     * Retornamos un formulario que nos permite crear un nuevo elemento.
     */
    public function create()
    {
        return view('adminTeacher.create');
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
        $is_email_valid  = Teacher::where('email', '=', $email)->first();
        $is_phone_valid  = Teacher::where('number_phone', '=', $phone)->first();
        $is_idCard_valid = Teacher::where('identification_card', '=', $idCard)->first();

        //Si se encuentra un elemento es porque el correo ingresado es incorrecto.
        if (!(empty($is_email_valid->email))) {
            #Retornamos un mensaje flash de error.
            session()->flash('message-error', 'Error, el correo electrónico ya está en uso');
            return to_route('admin.teacher.create');
        }

        //Si se encuentra un elemento es porque el número de teléfono ingresado es incorrecto.
        if (!(empty($is_phone_valid->number_phone))) {
            #Retornamos un mensaje flash de error.
            session()->flash('message-error', 'Error, el número de teléfono ya está en uso');
            return to_route('admin.teacher.create');
        }

        //Si se encuentra un elemento es porque el número de cédula ingresado es incorrecto.
        if (!(empty($is_idCard_valid->identification_card))) {
            #Retornamos un mensaje flash de error.
            session()->flash('message-error', 'Error, el número de cédula ya está en uso');
            return to_route('admin.teacher.create');
        }

        //Creamos un nuevo elemento.
        $teacher = new Teacher;
        $teacher->name     = $request->input('name');
        $teacher->lastname = $request->input('lastname');
        $teacher->identification_card = $request->input('identification_card');
        $teacher->number_phone = $request->input('number_phone');
        $teacher->email    = $request->input('email');
        $teacher->password = $request->input('password');
        $teacher->save();
        
        #Retornamos un mensaje flash.
        session()->flash('message-success', '¡Un nuevo profesor fue creado!');
        return to_route('admin.teacher.index');
        
    }


    /**
     * Retornamos una vista que nos muestra un elemento. 
     */
    public function show(Teacher $item)
    {
        return view('adminTeacher.show')
                ->with("teacher", $item);
    }


    /**
     * Retornamos un formulario que nos permite actualizar un elemento. 
     */
    public function edit(Teacher $item)
    {
        return view('adminTeacher.edit')
                ->with("teacher", $item);
    }

    /**
     * Acción para actualizar un elemento.
     * 
     * Para actualizar el elemento se debe cumplir:
     *      1. El elemento debe ingresar un correo electrónico único.
     *      2. El correo electrónico puede ser igual al que tenía anteriormente.    
     */
    public function update(Request $request, Teacher $item)
    {   
        $email = $request->input('email');
        $password = $request->input('password');
        $phone = $request->input('number_phone');
        $idCard = $request->input('identification_card');
        $is_email_valid  = Teacher::where('email', '=', $email)->first();
        $is_phone_valid  = Teacher::where('number_phone', '=', $phone)->first();
        $is_idCard_valid = Teacher::where('identification_card', '=', $idCard)->first();

        //El correo ingresado en el formulario ya está en la bd.
        if (!(empty($is_email_valid->email))) {
            if ($item->email != $email) {
                #El correo ya lo tiene otra persona.
                #No actualiza el dato. 
                #Retorna un mensaje de error. 
                session()->flash('message-error', 'Error, el correo electrónico ya está en uso');
                return to_route('admin.teacher.index');
            }
        }

        //Si se encuentra un elemento es porque el número de teléfono ingresado es incorrecto.
        if (!(empty($is_phone_valid->number_phone))) {
            if ($item->number_phone != $phone) {
                #El número de teléfono ya lo tiene otra persona.
                session()->flash('message-error', 'Error, el número de teléfono ya está en uso');
                return to_route('admin.teacher.index');
            }
        }

        //Si se encuentra un elemento es porque el número de teléfono ingresado es incorrecto.
        if (!(empty($is_idCard_valid->identification_card))) {
            if ($item->identification_card != $idCard) {
                #El número de teléfono ya lo tiene otra persona.
                session()->flash('message-error', 'Error, el número de cédula ya está en uso');
                return to_route('admin.teacher.index');
            }
        }
        
        //Si no se cumple lo anterior es porque se puede actualizar los datos. 
        $item->name     = $request->input('name');
        $item->lastname = $request->input('lastname');
        $item->identification_card = $request->input('identification_card');
        $item->number_phone = $request->input('number_phone');
        $item->email    = $request->input('email');
        if ($password) {
            $item->password = $request->input('password');
        }
        $item->save();
        
        #Retorna un mensaje flash.
        session()->flash('message-success', '¡El profesor fue actualizado!');
        return to_route('admin.teacher.index');
    }

    /**
     * Eliminamos un elemento de nuestra bd.
     * Para que se pueda eliminar se debe cumplir con lo siguiente:
     *      1. El elemento que se desea eliminar no puede ser del usuario que está activo.   
     */
    public function destroy(Request $request, Teacher $item)
    {
        //Elimina el elemento y retorna un mensaje flash.
        $item->delete();
        session()->flash('message-success', '¡El profesor fue eliminado correctamente!');
        return to_route('admin.teacher.index');
    }
}
