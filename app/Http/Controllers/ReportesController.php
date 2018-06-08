<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
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
      $max = substr($rango, -10);
      $min = substr($rango, 0, -13);
      $reportes = Invoice::where('checkin','>=',$min)->where('checkin','<=',$max)->with(['coin', 'category', 'supplier'])->paginate(10);
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
