<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


class AdministratorStudentController extends Controller
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
        $students = Student::all();

        return view('adminStudent.index')
                ->with("students", $students);
    }


    /**
     * Retornamos un formulario que nos permite crear un nuevo elemento.
     */
    public function create()
    {
        return view('adminStudent.create');
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
        session()->flash('message-success', '¡Un nuevo estudiante fue creado!');
        return to_route('admin.student.index');
        
    }


    /**
     * Retornamos una vista que nos muestra un elemento. 
     */
    public function show(Student $item)
    {
        return view('adminStudent.show')
                ->with("student", $item);
    }


    /**
     * Retornamos un formulario que nos permite actualizar un elemento. 
     */
    public function edit(Student $item)
    {
        return view('adminStudent.edit')
                ->with("student", $item);
    }

    /**
     * Acción para actualizar un elemento.
     * 
     * Para actualizar el elemento se debe cumplir:
     *      1. El elemento debe ingresar un correo electrónico único.
     *      2. El correo electrónico puede ser igual al que tenía anteriormente.    
     */
    public function update(Request $request, Student $item)
    {   
        $email = $request->input('email');
        $password = $request->input('password');
        $phone = $request->input('number_phone');
        $idCard = $request->input('identification_card');
        $is_email_valid  = Student::where('email', '=', $email)->first();
        $is_phone_valid  = Student::where('number_phone', '=', $phone)->first();
        $is_idCard_valid = Student::where('identification_card', '=', $idCard)->first();

        //El correo ingresado en el formulario ya está en la bd.
        if (!(empty($is_email_valid->email))) {
            if ($item->email != $email) {
                #El correo ya lo tiene otra persona.
                #No actualiza el dato. 
                #Retorna un mensaje de error. 
                session()->flash('message-error', 'Error, el correo electrónico ya está en uso');
                return to_route('admin.student.index');
            }
        }

        //Si se encuentra un elemento es porque el número de teléfono ingresado es incorrecto.
        if (!(empty($is_phone_valid->number_phone))) {
            if ($item->number_phone != $phone) {
                #El número de teléfono ya lo tiene otra persona.
                session()->flash('message-error', 'Error, el número de teléfono ya está en uso');
                return to_route('admin.student.index');
            }
        }

        //Si se encuentra un elemento es porque el número de teléfono ingresado es incorrecto.
        if (!(empty($is_idCard_valid->identification_card))) {
            if ($item->identification_card != $idCard) {
                #El número de teléfono ya lo tiene otra persona.
                session()->flash('message-error', 'Error, el número de cédula ya está en uso');
                return to_route('admin.student.index');
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
        session()->flash('message-success', '¡El estudiante fue actualizado!');
        return to_route('admin.student.index');
    }

    /**
     * Eliminamos un elemento de nuestra bd.
     * Para que se pueda eliminar se debe cumplir con lo siguiente:
     *      1. El elemento que se desea eliminar no puede ser del usuario que está activo.   
     */
    public function destroy(Request $request, Student $item)
    {
        //Elimina el elemento y retorna un mensaje flash.
        $item->delete();
        session()->flash('message-success', '¡El estudiante fue eliminado correctamente!');
        return to_route('admin.student.index');
    }
}
