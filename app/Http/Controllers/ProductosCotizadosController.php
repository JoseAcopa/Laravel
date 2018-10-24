<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quoteers;
use App\Quotations;

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
        //
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
      $producto = Quoteers::find($id);
      $cotizacion = Quotations::find($producto->cotizacion_id);
      Quoteers::find($id)->delete();
      $productos = Quoteers::where('cotizacion_id', $cotizacion->id)->get();

      for ($i=0; $i < count($productos); $i++) {
        $total += $productos[$i]->subtotal;
      }

      $cotizacion->total = $total;
      $cotizacion->save();
      return $productos;
    }
}
