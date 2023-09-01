<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

/*Models*/
use App\Models\Certificate;


class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        #$pdf = app('dompdf.wrapper');
        #$pdf->loadHTML('<h1>Hola Mundo<h1>');
        $pdf = PDF::loadView('certificate.pdf');
        return $pdf->stream();
        #return $pdf->download(); //Para descargar automaticamente el PDF.
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $item)
    {
        $course   = $item->course;
        $student  = $item->student;

        $data = [
            "course" => $course,
            "student" => $student->user,
            "certificate" => $item
        ];

        $pdf = PDF::loadView('certificate.pdf', $data);
        return $pdf->stream();
    }
}
