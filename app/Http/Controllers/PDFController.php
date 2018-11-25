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

  // generando reporte de ingreso individual
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

  // generando reporte de ingresos en general
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

  // generando los reportes de salidas por rango y provedor o solo por rango
  public function   generarReporteIngresoRango(Request $request)
  {
    $rango = $request->rango;
    $inicio = substr($rango, 0, -13);
    $fin = substr($rango, -10);

    if ($request->proveedor != null) {
      $facturas = Factura::where('proveedor_id', $request->proveedor)->where('fecha_entrada', '>=' ,$inicio)->where('fecha_entrada', '<=' ,$fin)->with(['proveedor', 'categoria', 'producto'])->get();

      for ($i=0; $i < count($facturas); $i++) {
        $producto = Catalogo::find($facturas[$i]->producto->catalogo_id);
        $facturas[$i]->catalogo = $producto;
      }

      $pdf = PDF::loadView('admin.PDF.ingresoProveedorRango', compact('facturas', 'rango'));

      $pdf->output();
      $dom_pdf = $pdf->getDomPDF();

      $canvas = $dom_pdf ->get_canvas();
      $canvas->page_text(525, 700, "Página {PAGE_NUM} de {PAGE_COUNT}", "bold", 8, array(0, 0, 0));
      return $pdf->stream('Ingreso Proveedor y Fechas.pdf');
    }else {
      $facturas = Factura::where('fecha_entrada', '>=' ,$inicio)->where('fecha_entrada', '<=' ,$fin)->with(['proveedor', 'categoria', 'producto'])->get();

      for ($i=0; $i < count($facturas); $i++) {
        $producto = Catalogo::find($facturas[$i]->producto->catalogo_id);
        $facturas[$i]->catalogo = $producto;
      }

      $pdf = PDF::loadView('admin.PDF.ingresoRango', compact('facturas', 'rango'));

      $pdf->output();
      $dom_pdf = $pdf->getDomPDF();

      $canvas = $dom_pdf ->get_canvas();
      $canvas->page_text(525, 700, "Página {PAGE_NUM} de {PAGE_COUNT}", "bold", 8, array(0, 0, 0));
      return $pdf->stream('Ingreso por Rango.pdf');
    }
  }

  // generando reporte de salida individual
  public function generarReporteSalida($id)
  {
    $salida = Salida::with(['proveedor', 'categoria', 'producto'])->find($id);
    $catalogo = Catalogo::find($salida->producto->catalogo_id);
    $salida->catalogo = $catalogo;

    $pdf = PDF::loadView('admin.PDF.salida', compact('salida'));

    $pdf->output();
    $dom_pdf = $pdf->getDomPDF();

    $canvas = $dom_pdf ->get_canvas();
    $canvas->page_text(525, 700, "Página {PAGE_NUM} de {PAGE_COUNT}", "bold", 8, array(0, 0, 0));
    return $pdf->stream($salida->proveedor->nombre_empresa.'.pdf');
  }

  // generando reporte de salida en general
  public function generarReporteGeneralSalida()
  {
    $salidas = Salida::with(['proveedor', 'categoria', 'producto'])->get();
    for ($i=0; $i < count($salidas); $i++) {
      $producto = Catalogo::find($salidas[$i]->producto->catalogo_id);
      $salidas[$i]->catalogo = $producto;
    }

    $pdf = PDF::loadView('admin.PDF.salidaGeneral', compact('salidas'));

    $pdf->output();
    $dom_pdf = $pdf->getDomPDF();

    $canvas = $dom_pdf ->get_canvas();
    $canvas->page_text(525, 700, "Página {PAGE_NUM} de {PAGE_COUNT}", "bold", 8, array(0, 0, 0));
    return $pdf->stream('Salida General.pdf');
  }

  // generando los reportes de salidas por rango y provedor o solo por rango
  public function generarReporteSalidaRango(Request $request)
  {
    $rango = $request->rango;
    $inicio = substr($rango, 0, -13);
    $fin = substr($rango, -10);

    if ($request->proveedor != null) {
      $salidas = Salida::where('proveedor_id', $request->proveedor)->where('fecha_salida', '>=' ,$inicio)->where('fecha_salida', '<=' ,$fin)->with(['proveedor', 'categoria', 'producto'])->get();

      for ($i=0; $i < count($salidas); $i++) {
        $producto = Catalogo::find($salidas[$i]->producto->catalogo_id);
        $salidas[$i]->catalogo = $producto;
      }

      $pdf = PDF::loadView('admin.PDF.salidaProveedorRango', compact('salidas', 'rango'));

      $pdf->output();
      $dom_pdf = $pdf->getDomPDF();

      $canvas = $dom_pdf ->get_canvas();
      $canvas->page_text(525, 700, "Página {PAGE_NUM} de {PAGE_COUNT}", "bold", 8, array(0, 0, 0));
      return $pdf->stream('Salida Proveedor y Fechas.pdf');
    }else {
      $salidas = Salida::where('fecha_salida', '>=' ,$inicio)->where('fecha_salida', '<=' ,$fin)->with(['proveedor', 'categoria', 'producto'])->get();

      for ($i=0; $i < count($salidas); $i++) {
        $producto = Catalogo::find($salidas[$i]->producto->catalogo_id);
        $salidas[$i]->catalogo = $producto;
      }

      $pdf = PDF::loadView('admin.PDF.salidaRango', compact('salidas', 'rango'));

      $pdf->output();
      $dom_pdf = $pdf->getDomPDF();

      $canvas = $dom_pdf ->get_canvas();
      $canvas->page_text(525, 700, "Página {PAGE_NUM} de {PAGE_COUNT}", "bold", 8, array(0, 0, 0));
      return $pdf->stream('Salida por Rango.pdf');
    }
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
