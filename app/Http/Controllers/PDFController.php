<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
  public function cotizacionPDF($quotation)
  {
    $id = $quotation
    $pdf = PDF::loadView('admin.PDF.quotations', compact('quotation'));
      return $pdf->stream('cotizacion.pdf');
  }
}
