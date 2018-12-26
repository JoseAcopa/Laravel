<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factura;
use App\Cotizacion;

class ReportesController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function generarCotizacion(Request $request)
    {
      $rango = $request->rango;
      $inicio = substr($rango, 0, -13);
      $fin = substr($rango, -10);

      if ($request->cliente != null) {
        $cotizaciones_pdf = Cotizacion::where('cliente_id', $request->cliente)->where('fecha', '>=' ,$inicio)->where('fecha', '<=' ,$fin)->with(['user', 'cliente'])->get();

        return view('admin.reportes.cotizacion', compact('cotizaciones_pdf'));
      }else {
        $cotizaciones_pdf = Cotizacion::where('fecha', '>=' ,$inicio)->where('fecha', '<=' ,$fin)->with(['user', 'cliente'])->get();

        return view('admin.reportes.cotizacion', compact('cotizaciones_pdf'));
      }
    }

    public function factura()
    {
      return view('admin.reportes.facturas');
    }

    public function generarFacturas(Request $request)
    {
      $rango = $request->rango;
      $inicio = substr($rango, 0, -13);
      $fin = substr($rango, -10);

      $reportes = Factura::where('fecha_entrada', '>=' ,$inicio)->where('fecha_entrada', '<=' ,$fin)->with(['categoria', 'proveedor'])->paginate(500);

      return view('admin.reportes.facturas', compact('reportes'));
    }

    public function generarCotizaciontes(Request $request)
    {
      $rango = $request->cotizacion;
      $max = substr($rango, -10);
      $min = substr($rango, 0, -13);
      $cotizacion = Quotations::where('fecha','>=',$min)->where('fecha','<=',$max)->with(['user', 'cliente'])->paginate(10);
      return view('admin.reportes.cotizacion', compact('cotizacion'));
    }
}
