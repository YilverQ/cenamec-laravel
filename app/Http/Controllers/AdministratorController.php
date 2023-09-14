<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*Importamos los modelos*/
use App\Models\User;
use App\Models\Note;
use App\Models\State;
use App\Models\Course;
use App\Models\Module;
use App\Models\Parishe;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Profileimg;
use App\Models\Questionnaire;
use App\Models\Administrator;
use App\Models\Municipalitie;


class AdministratorController extends Controller
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
     * Retornamos una vista. 
     */
    public function home(Request $request)
    {
        //buscamos el administrador.
        $admin_id = $request->session()->get('admin_id');
        $admin    = User::find($admin_id);  
       
        return view('administrator.home')
                ->with("admin", $admin);
    }


    /**
     * Retornamos una lista de todos los administradores.
     */
    public function index()
    {
        //Obtenemos todos los administradores.
        $administrators = Administrator::all();
        $teachers = Teacher::all();
        $students = Student::all();

        return view('administrator.index')
                ->with("administrators", $administrators)
                ->with("teachers", $teachers)
                ->with("students", $students);
    }


    /**
     * Retornamos un formulario que nos permite crear un nuevo elemento.
     */
    public function create()
    {
        //Buscamos todas las ubicaciones geográficas.
        $states = State::all();
        $municipalities = Municipalitie::all();
        $parishes = Parishe::all();

        return view('administrator.create')
                    ->with("parishes", $parishes)
                    ->with("municipalities", $municipalities)
                    ->with("states", $states);
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
     *      2. Se crea un relación con según el role que se agregó. 
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
            return to_route('administrator.create');
        }

        //Si se encuentra un elemento es porque el número de teléfono ingresado es incorrecto.
        if (!(empty($is_phone_valid->number_phone))) {
            #Retornamos un mensaje flash de error.
            session()->flash('message-error', 'Error, el número de teléfono ya está en uso');
            return to_route('administrator.create');
        }

        //Si se encuentra un elemento es porque el número de cédula ingresado es incorrecto.
        if (!(empty($is_idCard_valid->identification_card))) {
            #Retornamos un mensaje flash de error.
            session()->flash('message-error', 'Error, el número de cédula ya está en uso');
            return to_route('administrator.create');
        }

        //Creamos un nuevo elemento.
        $user = new User;
        $user->firts_name  = $request->input('firts_name');
        $user->second_name = $request->input('second_name');
        $user->lastname    = $request->input('lastname');
        $user->second_lastname = $request->input('second_lastname');
        $user->gender      = $request->input('gender');
        $user->birthdate   = $request->input('birthdate');
        $user->identification_card = $request->input('identification_card');
        $user->number_phone = $request->input('number_phone');
        $user->email       = $request->input('email');
        $user->password    = $request->input('password');
        //Según el genero, le asignamos una imagen de perfil.
        if ($user->gender == "Masculino"){
            $user->profileimg_id = 49;
        }
        else{
            $user->profileimg_id = 46;
        }
        $user->parishe_id = $request->input('parishe');
        $user->save();

        //Creamos un nuevo elemento ROLE.
        if (!(empty($request->input("is_admin")))) {
            $role = new Administrator;
            $role->user_id = $user->id; 
            $role->save();
        }
        if (!(empty($request->input("is_teacher")))) {
            $role = new Teacher;
            $role->user_id = $user->id; 
            $role->save();
        }
        if (!(empty($request->input("is_student")))) {
            $role = new Student;
            $role->user_id = $user->id; 
            $role->save();
        }

        #Retornamos un mensaje flash de error.
        session()->flash('message-success', '¡Has agregado un nuevo usuario!');
        return to_route('administrator.index');
    }


    /**
     * Retornamos una vista que nos muestra un elemento. 
     */
    public function show(Administrator $item)
    {
        return view('administrator.show')
                ->with("admin", $item);
    }


    /**
     * Retornamos un formulario que nos permite actualizar un elemento. 
     */
    public function edit(User $item)
    {
        //Buscamos todas las ubicaciones geográficas.
        $states = State::all();
        $municipalities = Municipalitie::all();
        $parishes = Parishe::all();

        //Buscamos todas las imagenes para el perfil de usuario.
        $profileimgs = Profileimg::all();


        //Retornamos una vista con todos los datos necesarios.
        return view('administrator.edit')
                    ->with("states", $states)
                    ->with("municipalities", $municipalities)
                    ->with("parishes", $parishes)
                    ->with("profileimgs", $profileimgs)
                    ->with('user', $item);
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
     *      2. Se crea un relación con según el role que se agregó. 
     *      3. Se redirecciona a la vista principal del estudiante.   
     */
    public function update(Request $request, User $item)
    {   
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
                return to_route('administrator.edit', $item);
            }
        }

        //Si se encuentra un elemento es porque el número de teléfono ingresado es incorrecto.
        if (!(empty($is_phone_valid->number_phone))) {
            if ($item->number_phone != $phone) {
                #El número de teléfono ya lo tiene otra persona.
                session()->flash('message-error', 'Error, el número de teléfono ya está en uso');
                return to_route('administrator.edit', $item);
            }
        }

        //Si se encuentra un elemento es porque el número de teléfono ingresado es incorrecto.
        if (!(empty($is_idCard_valid->identification_card))) {
            if ($item->identification_card != $idCard) {
                #El número de teléfono ya lo tiene otra persona.
                session()->flash('message-error', 'Error, el número de cédula ya está en uso');
                return to_route('administrator.edit', $item);
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
        
        #Comprobamos los roles del usuario.
        return $this->checkRoles($request, $item);
    }


    /**
     * Comprobamos los roles del usuario 
     */
    public function checkRoles(Request $request, User $user)
    {
        /*Administrador*/
        if (!(empty($request->input("is_admin")))) {
            if (!($user->administrator)) {
                $role = new Administrator;
                $role->user_id = $user->id; 
                $role->save();
            }
        }
        else{
            if ($user->administrator) {
                $new_user = Administrator::where('user_id', '=', $user->id)->first();
                $new_user->delete();
            }
        }

        /*Profesor*/
        if (!(empty($request->input("is_teacher")))) {
            if (!($user->teacher)) {
                $role = new Teacher;
                $role->user_id = $user->id; 
                $role->save();
            }
        }
        else{
            if ($user->teacher) {
                $new_user = Teacher::where('user_id', '=', $user->id)->first();
                $new_user->delete();
            }
        }

        /*Estudiante*/
        if (!(empty($request->input("is_student")))) {
            if (!($user->student)) {
                $role = new Student;
                $role->user_id = $user->id; 
                $role->save();
            }
        } 
        else{
            if ($user->student) {
                $new_user = Student::where('user_id', '=', $user->id)->first();
                $new_user->delete();
            }
        }


        session()->flash('message-success', '¡El usuario fue actualizado!');
        return to_route('administrator.edit', $user);
    }


    /**
     * Actualizamos la imagen del usuario 
     */
    public function updateImg(Request $request, User $item)
    {
        //Recibimos el nombre de la imagen. 
        $value = $request->input('picture');
        
        //Comprobamos si el usuario quiso actualizar la imagen.
        if ($value){
            $item->profileimg_id = $value;
            $item->save();
        }

        #Retorna un mensaje flash.
        session()->flash('message-success', '¡La imagen del usuario fue actualizada!');
        return to_route('administrator.edit', $item);
    }


    /**
     * Eliminamos un elemento de nuestra bd.
     * Para que se pueda eliminar se debe cumplir con lo siguiente:
     *      1. El elemento que se desea eliminar no puede ser del usuario que está activo.   
     */
    public function destroy(Request $request, User $item)
    {
        //Obtener el administrador con la sesión activa. 
        $user_id = $request->session()->get('user_id');
        $user    = User::find($user_id);

        /*
            Si el administrador de la sesión activa es el mismo
            que el elemento que se desea eliminar, no lo elimina.
            Retorna un mensaje flash de error. 
        */
        if ($user->email == $item->email) {
            session()->flash('message-error', '¡Tu sesión está activa, no te puedes eliminar!');
            return to_route('administrator.index');
        }

        //Elimina el elemento y retorna un mensaje flash.
        $item->delete();
        session()->flash('message-success', '¡El usuario fue eliminado correctamente!');
        return to_route('administrator.index');
    }



    public function statistics(Request $request)
    {
        /*Buscamos todos los usuarios*/
        $users = User::all();
        $administrators = Administrator::all();

        //Obtenemos los municipios
        $municipalities = Municipalitie::withCount('users')
                                    ->orderBy('users_count', 'desc')
                                    ->take(10)
                                    ->get();

        $municipalitiesAll = Municipalitie::withCount('users')
                                    ->orderBy('users_count', 'desc')
                                    ->get();

        //Obtenemos las parroquias
        $parishes = Parishe::withCount('users')
            ->orderBy('users_count', 'desc')
            ->take(10)
            ->get();


        //Contamos a los usuarios por cada municipio.
        $stateName = null;
        $states = [];
        foreach ($municipalitiesAll as $key => $value) {
            $stateName = $value->state->name;
            if (isset($states[$stateName])) {
                $states[$stateName] += $value->users_count;
                // code...
            }else{
                $states[$stateName] = $value->users_count;
            }
        }


        //Calcular el porcentaje de genero:
        $masculine = User::where('gender', "Masculino")->get();
        $femenine  = User::where('gender', "Femenino")->get();
        $genderPercentageWoman  = (count($femenine) * 100) / count($users);
        $genderPercentageMen    = (count($masculine) * 100) / count($users);


        //calcular el promedio de edad. 
        $averageAge  = 0;
        $dateToday = date('Y-m-d');
        $birthdates  = User::pluck('birthdate');
        //Ahora iteramos para obtener todas las edades.
        $ages = [];
        foreach ($birthdates as $birthdate) {
            $age = date_diff(date_create($dateToday), date_create($birthdate))->y;
            $ages[] = $age;
        }
        $averageAge = array_sum($ages) / count($ages);
        $averageAge = floor($averageAge);


        //Buscamos todos los cursos. 
        $courses = Course::withCount(['teachers', 'students', 'modules'])->get();
        foreach ($courses as $key => $course) {
            foreach ($course->modules as $key => $value) {
                $course->notes_count += count($value->notes);
                $course->questionnaires_count += count($value->questionnaires);
            }
            $course->approved_count = $course->students()->whereNotNull('dateFinished')->count();
        }

        //Buscamos todos los cursos. 
        $bestCourses = Course::withCount(['students'])
                ->orderBy('students_count', 'desc')
                ->take(10)
                ->get();
        foreach ($bestCourses as $key => $value) {
            $value->name = str_replace(' ', '_', $value->name);
        }


        $modules = Module::withCount(['students as approved_count' => function ($query) {
                    $query->where('state', 'finished');
                }])->get();


        //Lista de profesores
        $teachers = Teacher::withCount(['courses', 'modules', 'notes', 'questionnaires'])->get();


        //Lista de estudiantes
        $students = Student::all();
        foreach ($students as $key => $student) {
            //Contamos los cursos aprobados
            $finishedCoursesCount = $student->courses()
                                ->whereHas('students', function ($query) {
                                    $query->whereNotNull('dateFinished');
                                })
                                ->count();

            //Contamos los módulos aprobados
            $finishModules = $student->modules()
                         ->where('state', 'finished')
                         ->get();
            
            //Contamos las notas educativas vistas
            $notes_count = 0;
            foreach ($finishModules as $key => $value) {
                $notes_count += count($value->notes);
            }
                         
            //Asignamos todos los valores al modelo.
            $student->courses_count = count($student->courses);
            $student->courses_finished_count = $finishedCoursesCount;
            $student->modules_count = count($finishModules);
            $student->notes_count = $notes_count;
        }

        return view('administrator.statistics')
                    ->with("users", $users)
                    ->with("teachers", $teachers)
                    ->with("students", $students)
                    ->with("administrators", $administrators)
                    ->with("states", $states)
                    ->with("municipalities", $municipalities)
                    ->with("parishes", $parishes)
                    ->with("averageAge", $averageAge)
                    ->with("genderPercentageWoman", $genderPercentageWoman)
                    ->with("genderPercentageMen", $genderPercentageMen)
                    ->with("modules", $modules)
                    ->with("courses", $courses)
                    ->with("bestCourses", $bestCourses);
    }
}
