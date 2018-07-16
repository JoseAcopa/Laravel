<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Quotations;
use App\Products;
use App\Clients;
use App\Quoteers;
use App\Count;
use App\Units;
use App\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateQuotationRequest;

class QuotationsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $quotationPDF = 0;
      $quotations = Quotations::with(['user', 'cliente'])->get();
      return view('admin.quotation.quotation', compact('quotations', 'quotationPDF'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $products = Products::all();
      $clients = Clients::all();
      $units = Units::all();
      $categories = Category::all();
      return view('admin.quotation.add-quotation', compact('products', 'clients', 'units', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateQuotationRequest $request)
    {
      // guardando cotizacion
      $user = Auth::user();
      $quotation = new Quotations;
      $quotation->cotizacion = $request->cotizacion;
      $quotation->fecha = $request->fecha;
      $quotation->licitacion = $request->licitacion;
      $quotation->nombre = $request->nombre;
      $quotation->puesto = $request->puesto;
      $quotation->observaciones = $request->observaciones;
      $quotation->total = $request->total;
      $quotation->cliente_id = (int) $request->cliente;
      $quotation->user_id = $user->id;
      $quotation->save();

      // guardando productos cotizados
      $count = request('count');
      for ($i=0; $i < $count; $i++) {
        if (request('producto'.$i)) {
          $quoteer = new Quoteers;
          $quoteer->cotizacion_id = $quotation->id;
          $quoteer->producto_id = (int) request('idProduct'.$i);
          $quoteer->cantidad = request('cantidad'.$i);
          $quoteer->precio = request('precio'.$i);
          $quoteer->subtotal = request('subtotal'.$i);
          $quoteer->save();
        }
      }

      // guardando contador del cotizdor
      $now = new \DateTime();
      $year = $now->format('Y');
      $newCount = Count::where('fecha', $year)->get();
      $count = new Count;
      $count->count = count($newCount)+1;
      $count->fecha = $year;
      $count->save();

      $quotationPDF = $quotation->id;
      $quotations = Quotations::with(['user', 'cliente'])->get();
      return view('admin.quotation.quotation', compact('quotations', 'quotationPDF'))->withInput(request(['cotizacion', 'fecha', 'licitacion', 'nombre', 'puesto', 'observaciones', 'neto', 'IVA', 'total']));;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $quoteers = Quoteers::with(['producto'])->where('cotizacion_id', $id)->get();
      $quotations = Quotations::find($id);
      $quotations->user;
      $quotations->cliente;
      return view('admin.quotation.show', compact('quoteers', 'quotations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Quotations::find($id)->delete();
      DB::table('quoteers')->where('cotizacion_id', $id)->delete();
      return redirect('admin/cotizacion')->with('success','La cotizacion ha sido eliminado correctamente');
    }
}
