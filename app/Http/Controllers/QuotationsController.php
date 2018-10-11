<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Quotations;
use App\Products;
use App\Clientes;
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
      $cotizaciones = Quotations::with(['user', 'cliente'])->get();
      return view('admin.quotation.index', compact('cotizaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // $clients = Clients::all();
      $clientes = Clientes::all()->pluck('nombre_empresa', 'id');
      return view('admin.quotation.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // guardando cotizacion
      $user = Auth::user();
      $request['user_id'] =  $user->id;
      $request['total'] = 0;
      $cotizacion = Quotations::create($request->all());

      // guardando contador del cotizdor
      $now = new \DateTime(); //obteniendo la fecha actual
      $year = $now->format('Y'); //obteniendo solo el anio
      $newCount = Count::where('fecha', $year)->get(); //obteniendo todas las fechas guardadas en este anio
      $count = new Count;
      $count->count = count($newCount)+1; //obteniendoel resultado y le sumo uno para agregar uno nuevo
      $count->fecha = $year;
      $count->save();

      // guardando productos cotizados
      // $total = request('total_poductos');
      // for ($i=0; $i < $total; $i++) {
      //   if (request('producto'.$i)) {
      //     // $quoteer = Quoteers::create($request->all());
      //     $producto_cotizado = new Quoteers;
      //     $producto_cotizado->cantidad = request('cantidad'.$i);
      //     $producto_cotizado->precio = request('precio'.$i);
      //     $producto_cotizado->subtotal = request('subtotal'.$i);
      //     $producto_cotizado->cotizacion_id = (int) $quotation->id;
      //     $producto_cotizado->producto_id = (int) $request->idProduct1.$i;
      //     $producto_cotizado->save();
      //   }
      // }

      return redirect()->route('cotizacion.edit', $cotizacion->id)->with('success','Datos guardado correctamente.');
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
      $productos_cotizados = Quoteers::where('cotizacion_id', $id)->get();
      $cotizacion = Quotations::find($id);
      return view('admin.quotation.edit', compact('cotizacion', 'productos_cotizados'));
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

    public function cliente(Request $request)
    {
      $cliente = Clientes::create($request->all());
      $cliente->save();

      return redirect()->route('cotizacion.create')->with('success','Datos guardados correctamente.');
    }
}
