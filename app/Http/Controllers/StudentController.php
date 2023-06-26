<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Middlewares necesarios para comprobar los permisos
     * auth.teacher -> Comprueba que el usuario tiene permiso de estudiante.
     */
    public function __construct()
    {
        $this->middleware('auth.student');
    }


    /**
     * Retornamos la vista principal del estudiante.
     * Envíamos los datos del estudiante. 
     * Envíamos los cursos asociados al estudiante.
     */
    public function index(Request $request)
    {
        $student_id = $request->session()->get('student_id');
        $student    = Student::where('id', $student_id)
                                ->withCount('courses')
                                ->withCount('certificates')
                                ->first();
        return view('student.index')
                ->with("student", $student);
    }

    /**
     * Retornamos una vista para ver el perfil.
     */
    public function profile(Request $request)
    {
        $student_id = $request->session()->get('student_id');
        $student    = Student::find($student_id);
        return view('student.profile')
                ->with('student', $student);
    }


    /**
     * Formulario para editar un elemento.
     */
    public function edit(Request $request)
    {
        $student_id = $request->session()->get('student_id');
        $student    = Student::find($student_id);

        return view('student.edit')
                ->with('student', $student);
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
        $student_id = $request->session()->get('student_id');
        $item    = Student::find($student_id);

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
                return to_route('student.edit');
            }
        }

        //Si se encuentra un elemento es porque el número de teléfono ingresado es incorrecto.
        if (!(empty($is_phone_valid->number_phone))) {
            if ($item->number_phone != $phone) {
                #El número de teléfono ya lo tiene otra persona.
                session()->flash('message-error', 'Error, el número de teléfono ya está en uso');
                return to_route('student.edit');
            }
        }

        //Si se encuentra un elemento es porque el número de teléfono ingresado es incorrecto.
        if (!(empty($is_idCard_valid->identification_card))) {
            if ($item->identification_card != $idCard) {
                #El número de teléfono ya lo tiene otra persona.
                session()->flash('message-error', 'Error, el número de cédula ya está en uso');
                return to_route('student.edit');
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
        return to_route('student.profile');
    }

    /**
     * Eliminamos el elemento de nuestra base de datos. 
     * 
     * Envíamos un mensaje flash.
     * Retornamos la vista de login.  
     */
    public function destroy(Request $request, Student $item)
    {
        $item->delete();
        session()->flash('message-success', '¡El usuario fue eliminado correctamente!');
        return to_route('login.login');
    }
}
