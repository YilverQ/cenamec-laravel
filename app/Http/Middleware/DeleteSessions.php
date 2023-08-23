<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteSessions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Eliminamos todas las secciones involucradas con la autenticación.
        $request->session()->forget('is_teacher_valid');
        $request->session()->forget('is_student_valid');
        $request->session()->forget('is_admin_valid');
        $request->session()->forget('student_id');
        $request->session()->forget('teacher_id');
        $request->session()->forget('module_id');
        $request->session()->forget('admin_id');
        return $next($request);
    }
}
