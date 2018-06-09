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

    $pdf = PDF::loadView('admin.PDF.suministro', compact('selectQuotation', 'quoteers'));
    $pdf->output();
    $dom_pdf = $pdf->getDomPDF();

    $canvas = $dom_pdf ->get_canvas();
    $canvas->page_text(525, 700, "Página {PAGE_NUM} de {PAGE_COUNT}", "bold", 8, array(0, 0, 0));

    return $pdf->stream($selectQuotation->cotizacion.'.pdf');
  }

  public function descargarCotizacionPDF($quotation)
  {
    $id = $quotation;
    $selectQuotation = Quotations::find($id);
    $selectQuotation->user;
    $selectQuotation->cliente;

    $quoteers = DB::table('quoteers')->where('cotizacion_id', $id)->get();

    $pdf = PDF::loadView('admin.PDF.suministro', compact('selectQuotation', 'quoteers'));

    $pdf->output();
    $dom_pdf = $pdf->getDomPDF();

    $canvas = $dom_pdf ->get_canvas();
    $canvas->page_text(525, 700, "Página {PAGE_NUM} de {PAGE_COUNT}", "bold", 8, array(0, 0, 0));

    return $pdf->download($selectQuotation->cotizacion.'.pdf');
  }

  public function downloadPDF($id)
  {
    $invoice = Invoice::with(['coin', 'category', 'supplier'])->find($id);
    $pdf = PDF::loadView('admin.PDF.cotizacion', compact('invoice'));

    $pdf->output();
    $dom_pdf = $pdf->getDomPDF();

    $canvas = $dom_pdf ->get_canvas();
    $canvas->page_text(525, 700, "Página {PAGE_NUM} de {PAGE_COUNT}", "bold", 8, array(0, 0, 0));

    return $pdf->stream($invoice->category->type.'.pdf');
  }

  public function descargarPDF($id)
  {
    $invoice = Invoice::with(['coin', 'category', 'supplier'])->find($id);
    $pdf = PDF::loadView('admin.PDF.cotizacion', compact('invoice'));
    $pdf->output();
    $dom_pdf = $pdf->getDomPDF();

    $canvas = $dom_pdf ->get_canvas();
    $canvas->page_text(525, 700, "Página {PAGE_NUM} de {PAGE_COUNT}", "bold", 8, array(0, 0, 0));

    return $pdf->download($invoice->category->type.'.pdf');
  }
}
