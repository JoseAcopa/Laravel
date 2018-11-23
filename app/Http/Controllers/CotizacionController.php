<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Cotizacion;
use App\Producto;
use App\Clientes;
use App\Cotizador;
use App\Count;
use App\Categoria;
use App\Proveedor;
use App\Catalogo;

class CotizacionController extends Controller
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
      $cotizaciones = Cotizacion::with(['user', 'cliente'])->get();
      return view('admin.cotizacion.index', compact('cotizaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $clientes = Clientes::all();
      for ($i=0; $i < count($clientes); $i++) {
        $clientes[$i]->select = $clientes[$i]->nombre_empresa.' | '.$clientes[$i]->correo.' | '.$clientes[$i]->telefono;
      }

      $productos = Producto::with(['catalogo', 'categoria'])->get();
      for ($i=0; $i < count($productos); $i++) {
        $productos[$i]->select = $productos[$i]->categoria->tipo.' | '.$productos[$i]->catalogo->descripcion;
      }
      $selectProducto = $productos->pluck('select', 'id');
      $selectCliente = $clientes->pluck('select', 'id');

      return view('admin.cotizacion.create', compact('clientes', 'selectProducto', 'selectCliente'));
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
      $cotizacion = Cotizacion::create($request->all());

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
        $cotizar = new Cotizador;
        $cotizar->cantidad = $productos_cotizados[$i]->cantidad;
        $cotizar->precio = $productos_cotizados[$i]->precio;
        $cotizar->subtotal = $productos_cotizados[$i]->subtotal;
        $cotizar->cotizacion_id = (int) $cotizacion->id;
        $cotizar->producto_id = (int) $productos_cotizados[$i]->producto_id;
        $cotizar->save();
      }

      return redirect()->route('cotizacion.edit', $cotizacion->id)->with('success','Datos guardados correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $cotizador = Cotizador::with(['producto'])->where('cotizacion_id', $id)->get();
      $cotizacion = Cotizacion::find($id);
      $cotizacion->user;
      $cotizacion->cliente;
      return view('admin.cotizacion.show', compact('$cotizador', 'cotizacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $productos = Producto::with(['catalogo', 'categoria'])->get();
      for ($i=0; $i < count($productos); $i++) {
        $productos[$i]->select = $productos[$i]->categoria->tipo.' | '.$productos[$i]->catalogo->descripcion;
      }
      $selectProductos = $productos->pluck('select', 'id');

      $productos_cotizados = Cotizador::with(['producto'])->where('cotizacion_id', $id)->get();
      for ($i=0; $i < count($productos_cotizados); $i++) {
        $catalogo = Catalogo::find($productos_cotizados[$i]->producto->catalogo_id);
        $productos_cotizados[$i]->catalogo = $catalogo;
      }

      $cotizacion = Cotizacion::find($id);
      return view('admin.cotizacion.edit', compact('cotizacion', 'productos_cotizados', 'selectProductos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Cotizacion $cotizacion)
    {
      $cotizacion->update($request->all());
      return redirect()->route('cotizacion.edit', $cotizacion->id)->with('success','Datos actualizados correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Cotizacion::find($id)->delete();
      DB::table('quoteers')->where('cotizacion_id', $id)->delete();
      return ['success' => true];
    }

    public function cliente(Request $request)
    {
      $cliente = Clientes::create($request->all());
      $cliente->save();

      return redirect()->route('cotizacion.create')->with('success','Datos guardados correctamente.');
    }
}
