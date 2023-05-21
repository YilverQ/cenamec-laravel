<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Middlewares necesarios para comprobar los permisos
     * auth.teacher -> Comprueba que el usuario tiene permiso de profesor.
     */
    public function __construct()
    {
        $this->middleware('auth.teacher');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    /**
     * Retornamos un formulario que nos permite crear un nuevo elemento.
     */
    public function create()
    {
        return view('note.create');
    }


    /**
     * Acción para crear un nuevo elemento.
     * 
     * Procesamos la imagen. 
     *      1. Comprobamos que la imagen ingresada sea valida. 
     *      2. Guardamos la imagen en Storage. 
     * 
     * Guardamos el registro. 
     */
    public function store(Request $request)
    {
        return "creando nota // la imagen puede ser opcional"
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
