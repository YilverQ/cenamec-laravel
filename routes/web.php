<?php

use Illuminate\Support\Facades\Route;

/*Importamos los controladores*/
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\AdministratorTeacherController;
use App\Http\Controllers\AdministratorStudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\LoginController;

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
    return view('welcome');
});


/** Login
 * HTTP     URI              Method         Reponse   Description
 * -----------------------------------------------------------------------
 * get   /home               index           View      Retorna la vista principal. 
 * get   /login              login           View      Formulario para ingresar al sistema. 
 * get   /signup             signup          View      Formulario para crear un nuevo estudiante. 
 * post  /login              auth            Action    Combrueba los datos del usuario y redirecciona. 
 * post  /login/student      checkStudent    Action    Combrueba los datos del usuario y redirecciona. 
 * post  /login/teacher      checkTeacher    Action    Combrueba los datos del usuario y redirecciona. 
 * post  /signup             checkSignup     Action    Comprueba los datos del usuario y redirecciona.
 * post  /signup/student     storeStudent    Action    Crea un nuevo estudiante.
 * get   /logout             logout          Action    Cerramos la sección. 
 * get   /admin              admin           view      Formulario para ingresar al sistema como admin. 
 * post  /admin              checkAdmin      Action    Combrueba los datos del usuario y redirecciona. 
*/
Route::controller(LoginController::class)->group(function () {
    Route::get( '/home', 'home')->name('login.home');
    Route::get( '/login', 'login')->name('login.login');
    Route::get( '/signup', 'signup')->name('login.signup');
    Route::post('/login', 'auth')->name('login.auth');
    Route::post('/login/student', 'checkStudent')->name('login.checkStudent');
    Route::post('/login/teacher', 'checkTeacher')->name('login.checkTeacher');
    Route::post('/signup', 'checkSignup')->name('login.checkSignup');
    Route::post('/signup/student', 'storeStudent')->name('login.newStudent');
    Route::get( '/logout', 'logout')->name('login.logout');
    Route::get( '/admin', 'admin')->name('login.admin');
    Route::post('/admin', 'checkAdmin')->name('login.checkAdmin');
});


/** Administrador
 * HTTP     URI                      Method     Reponse   Description
 * -----------------------------------------------------------------------
 * get     /administrator              home       View      Retorna la vista principal. 
 * get     /administrators             index      View      Retorna todos los elementos. 
 * get     /administrator/create       create     View      Formulario para crear un nuevo elemento. 
 * post    /administrator              store      Action    Crea un nuevo elemento. 
 * get     /administrator/{item}       show       View      Vista de un elemento. 
 * get     /administrator/{item}/edit  edit       View      Vista para editar un elemento. 
 * put     /administrator/{item}       update     Action    Actualiza un elemento. 
 * delete  /administrator/{item}       delete     Action    Elimina un elemento.
*/
Route::controller(AdministratorController::class)->group(function () {
    Route::get( '/administrator', 'home')->name('administrator.home');
    Route::get( '/administrators', 'index')->name('administrator.index');
    Route::get( '/administrator/create', 'create')->name('administrator.create');
    Route::post('/administrator', 'store')->name('administrator.store');
    Route::get( '/administrator/{item}', 'show')->name('administrator.show');
    Route::get( '/administrator/{item}/edit', 'edit')->name('administrator.edit');
    Route::put( '/administrator/{item}', 'update')->name('administrator.update');
    Route::delete('/administrator/{item}', 'destroy')->name('administrator.destroy');
});


/** Administrator - Teacher (AdministratorTeacherController)
 * HTTP     URI                      Method     Reponse   Description
 * -----------------------------------------------------------------------
 * get     /admin/teacher              index      View      Retorna todos los elementos. 
 * get     /admin/teacher/create       create     View      Formulario para crear un nuevo elemento. 
 * post    /admin/teacher              store      Action    Crea un nuevo elemento. 
 * get     /admin/teacher/{item}       show       View      Vista de un elemento. 
 * get     /admin/teacher/{item}/edit  edit       View      Vista para editar un elemento. 
 * put     /admin/teacher/{item}       update     Action    Actualiza un elemento. 
 * delete  /admin/teacher/{item}       delete     Action    Elimina un elemento.
*/
Route::controller(AdministratorTeacherController::class)->group(function () {
    Route::get( '/admin/teacher', 'index')->name('admin.teacher.index');
    Route::get( '/admin/teacher/create', 'create')->name('admin.teacher.create');
    Route::post('/admin/teacher', 'store')->name('admin.teacher.store');
    Route::get( '/admin/teacher/{item}', 'show')->name('admin.teacher.show');
    Route::get( '/admin/teacher/{item}/edit', 'edit')->name('admin.teacher.edit');
    Route::put( '/admin/teacher/{item}', 'update')->name('admin.teacher.update');
    Route::delete('/admin/teacher/{item}', 'destroy')->name('admin.teacher.destroy');
});


/** Administrator - Student (AdministratorStudentController)
 * HTTP     URI                      Method     Reponse   Description
 * -----------------------------------------------------------------------
 * get     /admin/student              index      View      Retorna todos los elementos. 
 * get     /admin/student/create       create     View      Formulario para crear un nuevo elemento. 
 * post    /admin/student              store      Action    Crea un nuevo elemento. 
 * get     /admin/student/{item}       show       View      Vista de un elemento. 
 * get     /admin/student/{item}/edit  edit       View      Vista para editar un elemento. 
 * put     /admin/student/{item}       update     Action    Actualiza un elemento. 
 * delete  /admin/student/{item}       delete     Action    Elimina un elemento.
*/
Route::controller(AdministratorStudentController::class)->group(function () {
    Route::get( '/admin/student', 'index')->name('admin.student.index');
    Route::get( '/admin/student/create', 'create')->name('admin.student.create');
    Route::post('/admin/student', 'store')->name('admin.student.store');
    Route::get( '/admin/student/{item}', 'show')->name('admin.student.show');
    Route::get( '/admin/student/{item}/edit', 'edit')->name('admin.student.edit');
    Route::put( '/admin/student/{item}', 'update')->name('admin.student.update');
    Route::delete('/admin/student/{item}', 'destroy')->name('admin.student.destroy');
});


/** Profesor
 * HTTP     URI                Method     Reponse   Description
 * -----------------------------------------------------------------------
 * get   /teacher              index      View      Retorna la vista principal del profesor. 
 * get   /teacher/course       course     View      Retorna todos los cursos del profesor. 
 * get   /teacher/course       profile    View      Retorna el perfil del usuario. 
*/
Route::controller(TeacherController::class)->group(function () {
    Route::get( '/teacher', 'index')->name('teacher.index');
    Route::get( '/teacher/courses/', 'course')->name('teacher.course');
    Route::get( '/teacher/profile/', 'profile')->name('teacher.profile');
});


/** Estudiante
 * HTTP     URI                      Method     Reponse   Description
 * -----------------------------------------------------------------------
 * get   /student              index      View      Retorna todos los elementos. 
 * get   /student/create       create     View      Formulario para crear un nuevo elemento. 
 * post  /student              store      Action    Crea un nuevo elemento. 
 * get   /student/{item}/edit  edit       View      Vista para editar un elemento. 
 * put   /student/{item}       update     Action    Actualiza un elemento. 
 * get   /student/check        delete     Action    Elimina un elemento.
*/
Route::controller(StudentController::class)->group(function () {
    Route::get( '/student', 'index')->name('student.index');
    Route::get( '/student/create', 'create')->name('student.create');
    Route::post('/student', 'store')->name('student.store');
    Route::get( '/student/{item}/edit', 'edit')->name('student.edit');
    Route::put( '/student/{item}', 'update')->name('student.update');
    Route::delete('/student/{item}', 'destroy')->name('student.destroy');
});


/** Curso
 * HTTP     URI               Method     Reponse   Description
 * -----------------------------------------------------------------------
 * get   /course              index      View      Retorna todos los elementos. 
 * get   /course/create       create     View      Formulario para crear un nuevo elemento. 
 * post  /course              store      Action    Crea un nuevo elemento. 
 * get   /course/{item}/edit  edit       View      Vista para editar un elemento. 
 * put   /course/{item}       update     Action    Actualiza un elemento. 
 * get   /course/check        delete     Action    Elimina un elemento.
*/
Route::controller(CourseController::class)->group(function () {
    Route::get( '/course', 'index')->name('course.index');
    Route::get( '/course/create', 'create')->name('course.create');
    Route::post('/course', 'store')->name('course.store');
    Route::get( '/course/{item}/edit', 'edit')->name('course.edit');
    Route::put( '/course/{item}', 'update')->name('course.update');
    Route::delete('/course/{item}', 'destroy')->name('course.destroy');
});


/** Módulo
 * HTTP     URI               Method     Reponse   Description
 * -----------------------------------------------------------------------
 * get   /module              index      View      Retorna todos los elementos. 
 * get   /module/create       create     View      Formulario para crear un nuevo elemento. 
 * post  /module              store      Action    Crea un nuevo elemento. 
 * get   /module/{item}/edit  edit       View      Vista para editar un elemento. 
 * put   /module/{item}       update     Action    Actualiza un elemento. 
 * get   /module/check        delete     Action    Elimina un elemento.
*/
Route::controller(ModuleController::class)->group(function () {
    Route::get( '/module', 'index')->name('module.index');
    Route::get( '/module/create', 'create')->name('module.create');
    Route::post('/module', 'store')->name('module.store');
    Route::get( '/module/{item}/edit', 'edit')->name('module.edit');
    Route::put( '/module/{item}', 'update')->name('module.update');
    Route::delete('/module/{item}', 'destroy')->name('module.destroy');
});


/** Nota
 * HTTP     URI             Method     Reponse   Description
 * -----------------------------------------------------------------------
 * get   /note              index      View      Retorna todos los elementos. 
 * get   /note/create       create     View      Formulario para crear un nuevo elemento. 
 * post  /note              store      Action    Crea un nuevo elemento. 
 * get   /note/{item}/edit  edit       View      Vista para editar un elemento. 
 * put   /note/{item}       update     Action    Actualiza un elemento. 
 * get   /note/check        delete     Action    Elimina un elemento.
*/
Route::controller(NoteController::class)->group(function () {
    Route::get( '/note', 'index')->name('note.index');
    Route::get( '/note/create', 'create')->name('note.create');
    Route::post('/note', 'store')->name('note.store');
    Route::get( '/note/{item}/edit', 'edit')->name('note.edit');
    Route::put( '/note/{item}', 'update')->name('note.update');
    Route::delete('/note/{item}', 'destroy')->name('note.destroy');
});


/** Cuestionario
 * HTTP     URI                      Method     Reponse   Description
 * -----------------------------------------------------------------------
 * get   /questionnaire              index      View      Retorna todos los elementos. 
 * get   /questionnaire/create       create     View      Formulario para crear un nuevo elemento. 
 * post  /questionnaire              store      Action    Crea un nuevo elemento. 
 * get   /questionnaire/{item}/edit  edit       View      Vista para editar un elemento. 
 * put   /questionnaire/{item}       update     Action    Actualiza un elemento. 
 * get   /questionnaire/check        delete     Action    Elimina un elemento.
*/
Route::controller(QuestionnaireController::class)->group(function () {
    Route::get( '/questionnaire', 'index')->name('questionnaire.index');
    Route::get( '/questionnaire/create', 'create')->name('questionnaire.create');
    Route::post('/questionnaire', 'store')->name('questionnaire.store');
    Route::get( '/questionnaire/{item}/edit', 'edit')->name('questionnaire.edit');
    Route::put( '/questionnaire/{item}', 'update')->name('questionnaire.update');
    Route::delete('/questionnaire/{item}', 'destroy')->name('questionnaire.destroy');
});


/** Certificado
 * HTTP     URI                      Method     Reponse   Description
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