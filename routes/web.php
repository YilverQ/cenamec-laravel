<?php

use Illuminate\Support\Facades\Route;

/*Importamos los controladores*/
use App\Http\Controllers\NoteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\StudentModuleController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\AdministratorTeacherController;
use App\Http\Controllers\AdministratorStudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login.home');
});


/** Login
 * HTTP     URI           Method         Reponse   Description
 * -----------------------------------------------------------------------
 * get   /home            index           View      Retorna la vista principal. 
 * get   /login           login           View      Formulario para ingresar al sistema. 
 * get   /signup          signup          View      Formulario para crear un nuevo estudiante. 
 * post  /login           auth            Action    Combrueba los datos del usuario y redirecciona. 
 * post  /login/student   checkStudent    Action    Combrueba los datos del usuario y redirecciona. 
 * post  /login/teacher   checkTeacher    Action    Combrueba los datos del usuario y redirecciona. 
 * post  /signup          checkSignup     Action    Comprueba los datos del usuario y redirecciona.
 * post  /signup/student  store           Action    Crea un nuevo estudiante.
 * get   /logout          logout          Action    Cerramos la sección. 
 * get   /admin           admin           view      Formulario para ingresar al sistema como admin. 
 * post  /admin           checkAdmin      Action    Combrueba los datos del usuario y redirecciona. 
*/
Route::controller(LoginController::class)->group(function () {
    Route::get( '/home',    'home')->name('login.home');
    Route::get( '/login',   'login')->name('login.login');
    Route::get( '/signup',  'signup')->name('login.signup');
    Route::post('/login',   'auth')->name('login.auth');
    Route::post('/login/student', 'checkStudent')->name('login.checkStudent');
    Route::post('/login/teacher', 'checkTeacher')->name('login.checkTeacher');
    Route::post('/signup',  'checkSignup')->name('login.checkSignup');
    Route::post('/signup/student', 'store')->name('login.newStudent');
    Route::get( '/logout',  'logout')->name('login.logout');
    Route::get( '/admin',   'admin')->name('login.admin');
    Route::post('/admin',   'checkAdmin')->name('login.checkAdmin');
});


/** Administrador
 * HTTP     URI                Method       Reponse  Description
 * -----------------------------------------------------------------------
 * get     /admin              home         View     Retorna la vista principal. 
 * get     /admin              index        View     Retorna todos los elementos. 
 * get     /admin/create       create       View     Formulario para crear un nuevo elemento. 
 * post    /admin              store        Action   Crea un nuevo elemento. 
 * get     /admin/{item}       show         View     Vista de un elemento. 
 * get     /admin/{item}/edit  edit         View     Vista para editar un elemento. 
 * put     /admin/{item}       update       Action   Actualiza un elemento. 
 * put     /admin/{item}/img   updateImg    Action   Actualiza un elemento. 
 * delete  /admin/{item}       delete       Action   Elimina un elemento.
*/
Route::controller(AdministratorController::class)->group(function () {
    Route::get( '/administrator', 'home')->name('administrator.home');
    Route::get( '/administrator/user', 'index')->name('administrator.index');
    Route::get( '/administrator/create', 'create')->name('administrator.create');
    Route::post('/administrator/user', 'store')->name('administrator.store');
    Route::get( '/administrator/user/{item}', 'show')->name('administrator.show');
    Route::get( '/administrator/user/{item}/edit', 'edit')->name('administrator.edit');
    Route::put( '/administrator/user/{item}', 'update')->name('administrator.update');
    Route::put( '/administrator/user/{item}/img', 'updateImg')->name('administrator.img');
    Route::delete('/administrator/user/{item}', 'destroy')->name('administrator.destroy');
});


/** Profesor
 * HTTP     URI                Method     Reponse  Description
 * -----------------------------------------------------------------------
 * get   /teacher               index     View     Retorna la vista principal del profesor. 
 * get   /teacher/profile       profile   View     Retorna el perfil del usuario. 
 * get   /teacher/profile/edit  edit      View     Retorna un formulario para actualizar el perfil. 
 * put   /teacher/profile       update    Action   Actualiza los datos del profesor. 
*/
Route::controller(TeacherController::class)->group(function () {
    Route::get( '/teacher', 'index')->name('teacher.index');
    Route::get( '/teacher/profile/', 'profile')->name('teacher.profile');
    Route::put( '/teacher/profile/', 'update')->name('teacher.update');
    Route::put( '/teacher/profile/img', 'updateImg')->name('teacher.img');
});


/** Curso
 * HTTP  URI                          Method     Reponse  Description
 * -----------------------------------------------------------------------
 * get   /teacher/course              index      View     Retorna todos los elementos. 
 * get   /teacher/course/create       create     View     Formulario para crear un nuevo elemento. 
 * post  /teacher/course/create       store      Action   Crea un nuevo elemento. 
 * get   /teacher/course/{item}       show       View     Vista para editar un elemento. 
 * put   /teacher/course/{item}/edit  edit       Action   Formulario para actualizar. 
 * put   /teacher/course/{item}       update     Action   Actualiza un elemento. 
 * get   /teacher/course/{item}       delete     Action   Elimina un elemento.
*/
Route::controller(CourseController::class)->group(function () {
    Route::get( '/teacher/courses/', 'index')->name('teacher.course.index');
    Route::get( '/teacher/courses/create', 'create')->name('teacher.course.create');
    Route::post('/teacher/courses/create', 'store')->name('teacher.course.store');
    Route::get( '/teacher/course/{item}', 'show')->name('teacher.course.show');
    Route::get( '/teacher/course/{item}/edit', 'edit')->name('teacher.course.edit');
    Route::put( '/teacher/course/{item}', 'update')->name('teacher.course.update');
    Route::delete('/teacher/course/{item}', 'destroy')->name('teacher.course.destroy');
});


/** Módulo
 * HTTP     URI                       Method     Reponse   Description
 * -----------------------------------------------------------------------
 * get   /teacher/module              index      View      Retorna todos los elementos. 
 * get   /teacher/module/create       create     View      Formulario para crear un nuevo elemento. 
 * post  /teacher/module              store      Action    Crea un nuevo elemento. 
 * get   /teacher/module/{item}       show       View      Vista para editar un elemento. 
 * get   /teacher/module/{item}/edit  edit       Action    Formulario para actualizar. 
 * put   /teacher/module/{item}       update     Action    Actualiza un elemento. 
 * get   /teacher/module/check        delete     Action    Elimina un elemento.
*/
Route::controller(ModuleController::class)->group(function () {
    Route::get( '/teacher/module', 'index')->name('teacher.module.index');
    Route::get( '/teacher/module/create', 'create')->name('teacher.module.create');
    Route::post('/teacher/module', 'store')->name('teacher.module.store');
    Route::get( '/teacher/module/{item}', 'show')->name('teacher.module.show');
    Route::get( '/teacher/module/{item}/edit', 'edit')->name('teacher.module.edit');
    Route::put( '/teacher/module/{item}', 'update')->name('teacher.module.update');
    Route::delete('/teacher/module/{item}', 'destroy')->name('teacher.module.destroy');
});


/** Notas
 * HTTP     URI                     Method     Reponse   Description
 * -----------------------------------------------------------------------
 * get   /teacher/note/create       create     View      Formulario para crear un nuevo elemento. 
 * post  /teacher/note              store      Action    Crea un nuevo elemento. 
 * get   /teacher/note/{item}       show       View      Vista para editar un elemento. 
 * get   /teacher/note/{item}/edit  edit       Action    Formulario para actualizar. 
 * put   /teacher/note/{item}       update     Action    Actualiza un elemento. 
 * get   /teacher/note/check        delete     Action    Elimina un elemento.
*/
Route::controller(NoteController::class)->group(function () {
    Route::get( '/teacher/note/create', 'create')->name('teacher.note.create');
    Route::post('/teacher/note', 'store')->name('teacher.note.store');
    Route::get( '/teacher/note/{item}/edit', 'edit')->name('teacher.note.edit');
    Route::put( '/teacher/note/{item}', 'update')->name('teacher.note.update');
    Route::delete('/teacher/note/{item}', 'destroy')->name('teacher.note.destroy');
});


/** Cuestionario
 * HTTP     URI                         Method   Reponse   Description
 * -----------------------------------------------------------------------
 * get   /teacher/question/create       create    View     Formulario para crear un nuevo elemento. 
 * post  /teacher/question              store     Action   Crea un nuevo elemento. 
 * get   /teacher/question/{item}       show      View     Vista para editar un elemento. 
 * get   /teacher/question/{item}/edit  edit      Action   Formulario para actualizar. 
 * put   /teacher/question/{item}       update    Action   Actualiza un elemento. 
 * get   /teacher/question/check        delete    Action   Elimina un elemento.
*/
Route::controller(QuestionnaireController::class)->group(function () {
    Route::get( '/teacher/question/create', 'create')->name('teacher.question.create');
    Route::post('/teacher/question', 'store')->name('teacher.question.store');
    Route::get( '/teacher/question/{item}', 'show')->name('teacher.question.show');
    Route::get( '/teacher/question/{item}/edit', 'edit')->name('teacher.question.edit');
    Route::put( '/teacher/question/{item}', 'update')->name('teacher.question.update');
    Route::delete('/teacher/question/{item}', 'destroy')->name('teacher.question.destroy');
});


/** Estudiante
 * HTTP     URI                Method     Reponse   Description
 * -----------------------------------------------------------------------
 * get   /student              index      View      Retorna todos los elementos. 
 * get   /student/profile      create     View      Formulario para crear un nuevo elemento. 
 * get   /student/profile/edit edit       View      Vista para editar un elemento. 
 * put   /student/profile      update     Action    Actualiza un elemento. 
 * get   /student/check        delete     Action    Elimina un elemento.
*/
Route::controller(StudentController::class)->group(function () {
    Route::get( '/student', 'index')->name('student.index');
    Route::get( '/student/profile', 'profile')->name('student.profile');
    Route::put( '/student/profile', 'update')->name('student.update');
    Route::put( '/student/profile/img', 'updateImg')->name('student.img');
});


/** Estudiante - Cursos
 * HTTP     URI                    Method     Reponse   Description
 * -----------------------------------------------------------------------
 * get   /student/course/          index      View      Retorna todos los elementos. 
 * post  /student/course/{item}/   store      Action    Agregarmos un curso al estudiante. 
 * get   /student/course/{item}/   show       View      vista de un elemento para inscribir. 
 * get   /student/course/{item}/   display    View      vista de un elemento inscrito. 
*/
Route::controller(StudentCourseController::class)->group(function () {
    Route::get('/student/course/', 'index')->name('student.course.index');
    Route::post('/student/course/{item}', 'store')->name('student.course.store');
    Route::get('/student/course/{item}', 'show')->name('student.course.show');
    Route::get('/student/my/course/{item}', 'display')->name('student.course.display');
});


/** Estudiante - Module
 * HTTP     URI                    Method     Reponse   Description
 * -----------------------------------------------------------------------
 * get   /student/module/{item}    index      View      Retorna una vista para estudiar. 
*/
Route::controller(StudentModuleController::class)->group(function () {
    Route::get('/student/study/module/{item}', 'study')->name('student.module.study');
    Route::get('/student/test/module/{item}', 'test')->name('student.module.test');
    Route::post('/student/pass/module/{item}', 'passModule')->name('student.module.pass');
});


/** Certificado
 * HTTP     URI                    Method     Reponse   Description
 * -----------------------------------------------------------------------
 * get   /certificate              index      View      Retorna todos los elementos. 
 * get   /certificate/create       create     View      Formulario para crear un nuevo elemento. 
 * post  /certificate              store      Action    Crea un nuevo elemento. 
 * get   /certificate/{item}/edit  edit       View      Vista para editar un elemento. 
 * put   /certificate/{item}       update     Action    Actualiza un elemento. 
 * get   /certificate/check        delete     Action    Elimina un elemento.
*/
Route::controller(CertificateController::class)->group(function () {
    Route::get( '/certificate', 'index')->name('certificate.index');
    Route::get( '/certificate/create', 'create')->name('certificate.create');
    Route::post('/certificate', 'store')->name('certificate.store');
    Route::get( '/certificate/{item}/edit', 'edit')->name('certificate.edit');
    Route::put( '/certificate/{item}', 'update')->name('certificate.update');
    Route::delete('/certificate/{item}', 'destroy')->name('certificate.destroy');
});