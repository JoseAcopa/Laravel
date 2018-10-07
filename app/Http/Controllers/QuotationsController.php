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
use App\Suppliers;
use App\Coins;
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
      $cotizaciones = Quotations::with(['user', 'cliente'])->get();
      return view('admin.quotation.index', compact('cotizaciones', 'quotationPDF'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // $clients = Clients::all();
      $clients = Clients::all()->pluck('business', 'id');
      $products = Products::all();
      $units = Units::all();
      $categories = Category::all();
      $proveedores = Suppliers::all();
      $coins = Coins::all();
      return view('admin.quotation.create', compact('products', 'clients', 'units', 'categories', 'proveedores', 'coins'));
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
      $request['user_id'] =  $user->id;
      $quotation = Quotations::create($request->all());

      // guardando contador del cotizdor
      $now = new \DateTime(); //obteniendo la fecha actual
      $year = $now->format('Y'); //obteniendo solo el anio
      $newCount = Count::where('fecha', $year)->get(); //obteniendo todas als fechas guardadas en este anio
      $count = new Count;
      $count->count = count($newCount)+1; //obteniendoel resultado y le sumo uno para agregar uno nuevo
      $count->fecha = $year;
      $count->save();
      // return redirect()->route('roles.edit', $role->id)->with('success','Rol guardado correctamente.');
      // $quotation = new Quotations;
      // $quotation->cotizacion = $request->cotizacion;
      // $quotation->fecha = $request->fecha;
      // $quotation->licitacion = $request->licitacion;
      // $quotation->nombre = $request->nombre;
      // $quotation->puesto = $request->puesto;
      // $quotation->observaciones = $request->observaciones;
      // $quotation->total = $request->total;
      // $quotation->cliente_id = (int) $request->cliente;
      // $quotation->user_id = $user->id;
      // $quotation->save();
      //
      // // guardando productos cotizados
      // $count = request('count');
      // for ($i=0; $i < $count; $i++) {
      //   if (request('producto'.$i)) {
      //     $quoteer = new Quoteers;
      //     $quoteer->cotizacion_id = $quotation->id;
      //     $quoteer->producto_id = (int) request('idProduct'.$i);
      //     $quoteer->cantidad = request('cantidad'.$i);
      //     $quoteer->precio = request('precio'.$i);
      //     $quoteer->subtotal = request('subtotal'.$i);
      //     $quoteer->save();
      //   }
      // }
      //

      //
      // $quotationPDF = $quotation->id;
      // $quotations = Quotations::with(['user', 'cliente'])->get();
      return view('admin.quotation.index', compact('quotations', 'quotationPDF'));
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

    public function get()
    {
      return 'test';
    }
}
