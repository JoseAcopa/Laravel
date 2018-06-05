<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Quotations;
use App\Quoteers;

class PDFController extends Controller
{
  public function cotizacionPDF($quotation)
  {
    $id = $quotation;
    $selectQuotation = Quotations::find($id);
    $selectQuotation->user;
    $selectQuotation->cliente;

    $quoteers = DB::table('quoteers')->where('cotizacion_id', $id)->get();

    $pdf = PDF::loadView('admin.PDF.quotations', compact('selectQuotation', 'quoteers'));
      return $pdf->stream('cotizacion.pdf');
  }
}
