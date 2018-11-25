<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Quotations;
use App\Quoteers;
use App\Factura;
use App\Catalogo;
use App\Salida;
use NumerosEnLetras;

class PDFController extends Controller
{
  // public function cotizacionPDF($quotation)
  // {
  //   $id = $quotation;
  //   $selectQuotation = Quotations::find($id);
  //   $selectQuotation->user;
  //   $selectQuotation->cliente;
  //
  //   $quoteers = Quoteers::with(['producto'])->where('cotizacion_id', $id)->get();
  //   $total = intval($selectQuotation->total);
  //   $letras = NumerosEnLetras::convertir($total);
  //   // $letras = NumeroALetras::convertir(12345.67, 'colones', 'centimos');
  //   $pdf = PDF::loadView('admin.PDF.suministro', compact('selectQuotation', 'quoteers', 'letras'));
  //   $pdf->output();
  //   $dom_pdf = $pdf->getDomPDF();
  //
  //   $canvas = $dom_pdf->get_canvas();
  //   $canvas->page_text(525, 700, "Página {PAGE_NUM} de {PAGE_COUNT}", "bold", 8, array(0, 0, 0));
  //
  //   return $pdf->stream($selectQuotation->cotizacion.'.pdf');
  // }
  //
  // public function descargarCotizacionPDF($quotation)
  // {
  //   $id = $quotation;
  //   $selectQuotation = Quotations::find($id);
  //   $selectQuotation->user;
  //   $selectQuotation->cliente;
  //
  //   $quoteers = Quoteers::with(['producto'])->where('cotizacion_id', $id)->get();
  //   $total = intval($selectQuotation->total);
  //   $letras = NumerosEnLetras::convertir($total);
  //
  //   $pdf = PDF::loadView('admin.PDF.suministro', compact('selectQuotation', 'quoteers', 'letras'));
  //
  //   $pdf->output();
  //   $dom_pdf = $pdf->getDomPDF();
  //
  //   $canvas = $dom_pdf ->get_canvas();
  //   $canvas->page_text(525, 700, "Página {PAGE_NUM} de {PAGE_COUNT}", "bold", 8, array(0, 0, 0));
  //
  //   return $pdf->download($selectQuotation->cotizacion.'.pdf');
  // }

  public function generarReporteIngreso($id)
  {
    $factura = Factura::with(['categoria', 'proveedor', 'producto'])->find($id);
    if ($factura->producto != null) {
      $producto = Catalogo::find($factura->producto->catalogo_id);
      $factura->producto = $producto;
    }

    $pdf = PDF::loadView('admin.PDF.ingreso', compact('factura'));

    $pdf->output();
    $dom_pdf = $pdf->getDomPDF();

    $canvas = $dom_pdf ->get_canvas();
    $canvas->page_text(525, 700, "Página {PAGE_NUM} de {PAGE_COUNT}", "bold", 8, array(0, 0, 0));
    return $pdf->stream($factura->proveedor->nombre_empresa.'.pdf');
  }

  public function reporteGeneralIngreso()
  {
    $facturas = Factura::with(['categoria', 'proveedor', 'producto'])->get();
    for ($i=0; $i < count($facturas); $i++) {
      if ($facturas[$i]->producto != null) {
        $producto = Catalogo::find($facturas[$i]->producto->catalogo_id);
        $facturas[$i]->catalogo = $producto;
      }
    }

    $pdf = PDF::loadView('admin.PDF.ingresoGeneral', compact('facturas'));

    $pdf->output();
    $dom_pdf = $pdf->getDomPDF();

    $canvas = $dom_pdf ->get_canvas();
    $canvas->page_text(525, 700, "Página {PAGE_NUM} de {PAGE_COUNT}", "bold", 8, array(0, 0, 0));
    return $pdf->stream('Ingreso General.pdf');
  }

  public function generarReporteSalida($id)
  {
    $salida = Salida::with(['proveedor', 'categoria', 'producto'])->find($id);
    $catalogo = Catalogo::find($salida->producto->catalogo_id);
    $salida->catalogo = $catalogo;

    // return $salida;

    $pdf = PDF::loadView('admin.PDF.salida', compact('salida'));

    $pdf->output();
    $dom_pdf = $pdf->getDomPDF();

    $canvas = $dom_pdf ->get_canvas();
    $canvas->page_text(525, 700, "Página {PAGE_NUM} de {PAGE_COUNT}", "bold", 8, array(0, 0, 0));
    return $pdf->stream('Ingreso General.pdf');
  }

  public function generarReporteGeneralSalida()
  {
    $salidas = Salida::with(['proveedor', 'categoria', 'producto'])->get();
    for ($i=0; $i < count($salidas); $i++) {
      $producto = Catalogo::find($salidas[$i]->producto->catalogo_id);
      $salidas[$i]->catalogo = $producto;
    }

    // return $salidas;

    $pdf = PDF::loadView('admin.PDF.salidaGeneral', compact('salidas'));

    $pdf->output();
    $dom_pdf = $pdf->getDomPDF();

    $canvas = $dom_pdf ->get_canvas();
    $canvas->page_text(525, 700, "Página {PAGE_NUM} de {PAGE_COUNT}", "bold", 8, array(0, 0, 0));
    return $pdf->stream('Salida General.pdf');
  }

  // public function descargarPDF($id)
  // {
  //   $invoice = Invoice::with(['coin', 'category', 'supplier'])->find($id);
  //   $pdf = PDF::loadView('admin.PDF.salida', compact('invoice'));
  //   $pdf->output();
  //   $dom_pdf = $pdf->getDomPDF();
  //
  //   $canvas = $dom_pdf ->get_canvas();
  //   $canvas->page_text(525, 700, "Página {PAGE_NUM} de {PAGE_COUNT}", "bold", 8, array(0, 0, 0));
  //
  //   return $pdf->download($invoice->category->type.'.pdf');
  // }
}
