<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salida;
use App\Producto;
use App\Catalogo;

class SalidasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $salidas = Salida::with(['proveedor', 'categoria', 'producto'])->get();
      for ($i=0; $i < count($salidas); $i++) {
        $catalogo = Catalogo::find($salidas[$i]->producto->catalogo_id);
        $salidas[$i]->catalogo = $catalogo;
      }

      return view('admin.salidas.index', compact('salidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $productos = Producto::with(['catalogo', 'proveedor', 'categoria'])->get();
      for ($i=0; $i < count($productos); $i++) {
        $productos[$i]->select = $productos[$i]->categoria->tipo.' | '.$productos[$i]->catalogo->descripcion;
      }

      $newProductos = $productos->pluck('select', 'id');
      return view('admin.salidas.create', compact('newProductos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $salida = Salida::create($request->all());
      $salida->save();

      // editamos el nuevo stock del producto
      $id = $request->producto_id;
      $producto = Producto::find($id);
      $producto->stock = $request->stock;
      $producto->save();

      return redirect()->route('salida.edit', $salida->id)->with('success','Datos guardados correctamente.');
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
      $salida = Salida::with(['proveedor', 'categoria', 'producto'])->find($id);
      $catalogo = Catalogo::find($salida->producto->catalogo_id);
      $salida->letra = $salida->categoria->letra;
      $salida->categoria = $salida->categoria->tipo;
      $salida->proveedor = $salida->proveedor->nombre_empresa;
      $salida->stock = $salida->producto->stock;
      $salida->precio_lista = $salida->producto->precio_lista;
      $salida->costo = $salida->producto->costo;
      $salida->descripcion = $catalogo->descripcion;

      $precios = array(
        $salida->producto->precio_venta1 => $salida->producto->precio_venta1,
        $salida->producto->precio_venta2 => $salida->producto->precio_venta2,
        $salida->producto->precio_venta3 => $salida->producto->precio_venta3,
        $salida->producto->precio_venta4 => $salida->producto->precio_venta4,
        'precioVenta5' => $salida->producto->precio_venta5
      );

      return view('admin.salidas.edit', compact('salida', 'precios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Salida $salida)
    {
      $salida->update($request->all());
      return redirect()->route('salida.edit', $salida->id)->with('success','Datos actualizados correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Salida::find($id)->delete();
      return ['success' => true];
    }
}
