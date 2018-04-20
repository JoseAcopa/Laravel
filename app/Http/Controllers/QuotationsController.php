<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quotations;
use App\Products;
use App\Clients;
use App\Quoteers;
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
      return view('admin.quotation.add-quotation', compact('products', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateQuotationRequest $request)
    {
      $quotation = new Quotations;
      $quotation->cotizacion = request('cotizacion');
      $quotation->fecha = request('fecha');
      $quotation->licitacion = request('licitacion');
      $quotation->nombre = request('nombre');
      $quotation->puesto = request('puesto');
      $quotation->observaciones = request('observaciones');
      $quotation->subtotal = request('neto');
      $quotation->IVA = request('iva');
      $quotation->total = request('total');
      $quotation->cliente_id = request('cliente');
      $quotation->user_id = request('usuario');
      $quotation->save();

      $count = request('count');

      for ($i=0; $i < $count; $i++) {
        if (request('producto'.$i)) {
          $quoteer = new Quoteers;
          $quoteer->cotizacion_id = $quotation->id;
          $quoteer->producto = request('producto'.$i);
          $quoteer->cantidad = request('cantidad'.$i);
          $quoteer->descripcion = request('descripcion'.$i);
          $quoteer->precio = request('precio'.$i);
          $quoteer->save();
        }
      }

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
      $product = Products::find($id);
      $quotations = Quotations::all();
      return view('admin.inventary.show-product', compact('product'));
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
      return redirect('admin/quotation')->with('success','La cotizacion ha sido eliminado correctamente');
    }
}
