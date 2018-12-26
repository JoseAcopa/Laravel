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
use App\Catalogo;
use App\Proveedores;

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
      $clientes = Clientes::all()->pluck('nombre_empresa', 'id');
      return view('admin.cotizacion.index', compact('cotizaciones', 'clientes'));
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

      $productos = Catalogo::with(['productos', 'categoria'])->get();

      for ($i=0; $i < count($productos); $i++) {
        $productos[$i]->select = $productos[$i]->categoria->tipo.' | '.$productos[$i]->descripcion;
      }

      $selectProducto = $productos->pluck('select', 'id');
      $selectCliente = $clientes->pluck('select', 'id');
      $categorias = Categoria::all()->pluck('tipo', 'id');
      $proveedores = Proveedores::all()->pluck('nombre_empresa', 'id');
      $todas_categorias = Categoria::all();
      return view('admin.cotizacion.create', compact('clientes', 'selectProducto', 'selectCliente', 'categorias', 'proveedores', 'todas_categorias'));
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
      $productos_cotizados = Cotizador::with(['producto'])->where('cotizacion_id', $id)->get();
      for ($i=0; $i < count($productos_cotizados); $i++) {
        $catalogo = Catalogo::find($productos_cotizados[$i]->producto_id);
        $productos_cotizados[$i]->catalogo = $catalogo;
      }

      $ver_cotizacion = Cotizacion::with(['user', 'cliente'])->find($id);
      return view('admin.cotizacion.show', compact('productos_cotizados', 'ver_cotizacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $productos = Catalogo::with(['productos', 'categoria'])->get();
      for ($i=0; $i < count($productos); $i++) {
        $productos[$i]->select = $productos[$i]->categoria->tipo.' | '.$productos[$i]->descripcion;
      }
      $selectProductos = $productos->pluck('select', 'id');

      $productos_cotizados = Cotizador::with(['producto'])->where('cotizacion_id', $id)->get();
      for ($i=0; $i < count($productos_cotizados); $i++) {
        $catalogo = Catalogo::find($productos_cotizados[$i]->producto_id);
        $productos_cotizados[$i]->catalogo = $catalogo;
      }

      $editar_cotizacion = Cotizacion::find($id);
      return view('admin.cotizacion.edit', compact('editar_cotizacion', 'productos_cotizados', 'selectProductos'));
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

    public function catalogo(Request $request)
    {
      $catalogo = Catalogo::create($request->all());
      $catalogo->save();

      return redirect()->route('cotizacion.create')->with('success','Datos guardados correctamente.');
    }
}
