<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Quotations;
use App\Quoteers;
use App\Invoice;

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

  public function downloadPDF($id)
  {
    $invoice = Invoice::with(['coin', 'category', 'supplier'])->find($id);
    $pdf = PDF::loadView('admin.PDF.invoice', compact('invoice'));
      return $pdf->stream($invoice->category->type.'.pdf');
  }

  public function descargarPDF($id)
  {
    $invoice = Invoice::with(['coin', 'category', 'supplier'])->find($id);
    $pdf = PDF::loadView('admin.PDF.invoice', compact('invoice'));
      return $pdf->download($invoice->category->type.'.pdf');
  }
}
