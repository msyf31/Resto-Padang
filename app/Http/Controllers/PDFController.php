<?php

namespace App\Http\Controllers;
use PDF;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $data = ['title' => 'BISA LOH NAD'];
        $pdf = PDF::loadView('backend.v_pdf.document', $data);
        return $pdf->download('document.pdf');
    }
}
