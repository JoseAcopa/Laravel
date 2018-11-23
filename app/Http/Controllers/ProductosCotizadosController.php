<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cotizador;
use App\Cotizacion;

class ProductosCotizadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // guardando producto cotizado
      $producto = new Cotizador;
      $producto->cotizacion_id = $request->cotizacion_id;
      $producto->producto_id = $request->producto_id;
      $producto->cantidad = (float) $request->cantidad;
      $producto->precio = (float) trim($request->precio, "$");
      $producto->subtotal = (int) $request->cantidad * (float) trim($request->precio, "$");
      $producto->save();

      // editando el subtotal de la cotizacion
      $cotizacion = Cotizacion::find($request->cotizacion_id);
      $productos = Cotizador::where('cotizacion_id', $request->cotizacion_id)->get();
      $total = 0;

      for ($i=0; $i < count($productos); $i++) {
        $total += $productos[$i]->subtotal;
      }

      $cotizacion->total = $total;
      $cotizacion->save();

      return redirect()->route('cotizacion.edit', $request->cotizacion_id)->with('success_product','Datos guardado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
      $total = 0;
      $producto = Cotizador::find($id);
      $cotizacion = Cotizacion::find($producto->cotizacion_id);
      Cotizador::find($id)->delete();
      $productos = Cotizador::where('cotizacion_id', $cotizacion->id)->get();

      for ($i=0; $i < count($productos); $i++) {
        $total += $productos[$i]->subtotal;
      }

      $cotizacion->total = $total;
      $cotizacion->save();
      return $productos;
    }
}
