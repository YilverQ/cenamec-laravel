<?php

use Illuminate\Support\Facades\Route;

/*Importamos los controladores*/
use App\Http\Controllers\AdministratorController;
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
 * post  /login              checkStudent    Action    Combrueba los datos del usuario y redirecciona. 
 * post  /login              checkTeacher    Action    Combrueba los datos del usuario y redirecciona. 
 * post  /signup             checkSignup     Action    Comprueba los datos del usuario y redirecciona.
*/
Route::controller(LoginController::class)->group(function () {
    Route::get( '/home', 'home')->name('login.home');
    Route::get( '/login', 'login')->name('login.login');
    Route::get( '/signup', 'signup')->name('login.signup');
    Route::post('/login/student', 'checkStudent')->name('login.checkStudent');
    Route::post('/login/teacher', 'checkTeacher')->name('login.checkTeacher');
    Route::post('/signup', 'checkSignup')->name('login.checkSignup');
});


/** Administrador
 * HTTP     URI                      Method     Reponse   Description
 * -----------------------------------------------------------------------
 * get   /administrator              index      View      Retorna todos los elementos. 
 * get   /administrator/create       create     View      Formulario para crear un nuevo elemento. 
 * post  /administrator              store      Action    Crea un nuevo elemento. 
 * get   /administrator/{item}/edit  edit       View      Vista para editar un elemento. 
 * put   /administrator/{item}       update     Action    Actualiza un elemento. 
 * get   /administrator/check        delete     Action    Elimina un elemento.
*/
Route::controller(AdministratorController::class)->group(function () {
    Route::get( '/administrator', 'index')->name('administrator.index');
    Route::get( '/administrator/create', 'create')->name('administrator.create');
    Route::post('/administrator', 'store')->name('administrator.store');
    Route::get( '/administrator/{item}/edit', 'edit')->name('administrator.edit');
    Route::put( '/administrator/{item}', 'update')->name('administrator.update');
    Route::delete('/administrator/{item}', 'destroy')->name('administrator.destroy');
});


/** Profesor
 * HTTP     URI                Method     Reponse   Description
 * -----------------------------------------------------------------------
 * get   /teacher              index      View      Retorna todos los elementos. 
 * get   /teacher/create       create     View      Formulario para crear un nuevo elemento. 
 * post  /teacher              store      Action    Crea un nuevo elemento. 
 * get   /teacher/{item}/edit  edit       View      Vista para editar un elemento. 
 * put   /teacher/{item}       update     Action    Actualiza un elemento. 
 * get   /teacher/check        delete     Action    Elimina un elemento.
*/
Route::controller(TeacherController::class)->group(function () {
    Route::get( '/teacher', 'index')->name('teacher.index');
    Route::get( '/teacher/create', 'create')->name('teacher.create');
    Route::post('/teacher', 'store')->name('teacher.store');
    Route::get( '/teacher/{item}/edit', 'edit')->name('teacher.edit');
    Route::put( '/teacher/{item}', 'update')->name('teacher.update');
    Route::delete('/teacher/{item}', 'destroy')->name('teacher.destroy');
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