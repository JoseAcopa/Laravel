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
      $productos = Products::all()->pluck('description', 'id');
      return view('admin.quotation.create', compact('clientes', 'productos'));
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
      $cotizacion = Quotations::create($request->all());

      // guardando contador del cotizador
      $now = new \DateTime(); //obteniendo la fecha actual
      $year = $now->format('Y'); //obteniendo solo el anio
      $newCount = Count::where('fecha', $year)->get(); //obteniendo todas las fechas guardadas en este anio
      $count = new Count;
      $count->count = count($newCount)+1; //obteniendoel resultado y le sumo uno para agregar uno nuevo
      $count->fecha = $year;
      $count->save();

      // guardando productos cotizados
      $productos_cotizados = json_decode($request->cotizar_productos);
      for ($i=0; $i < count($productos_cotizados); $i++) {
        $cotizar = new Quoteers;
        $cotizar->cantidad = $productos_cotizados[$i]->cantidad;
        $cotizar->precio = $productos_cotizados[$i]->precio;
        $cotizar->subtotal = $productos_cotizados[$i]->subtotal;
        $cotizar->cotizacion_id = (int) $cotizacion->id;
        $cotizar->producto_id = (int) $productos_cotizados[$i]->producto_id;
        $cotizar->save();
      }

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
      $productos = Products::all()->pluck('description', 'id');
      $productos_cotizados = Quoteers::where('cotizacion_id', $id)->get();
      $cotizacion = Quotations::find($id);
      return $productos_cotizados;
      return view('admin.quotation.edit', compact('cotizacion', 'productos_cotizados', 'productos'));
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
