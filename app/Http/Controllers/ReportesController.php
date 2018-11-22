<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factura;
use App\Quotations;

class ReportesController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function cotizacion()
    {
      return view('admin.reportes.cotizacion');
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

    public function generarCotizacion(Request $request)
    {
      $rango = $request->cotizacion;
      $max = substr($rango, -10);
      $min = substr($rango, 0, -13);
      $cotizacion = Quotations::where('fecha','>=',$min)->where('fecha','<=',$max)->with(['user', 'cliente'])->paginate(10);
      return view('admin.reportes.cotizacion', compact('cotizacion'));
    }
}
