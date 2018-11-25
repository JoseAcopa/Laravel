<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Catalogo;
use App\Factura;
use App\Http\Requests\CrearProductosRequest;

class ProductosController extends Controller
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
      $productos = Producto::all();
      return view('admin.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $catalogo = Catalogo::with(['proveedor', 'categoria'])->get();

      for ($i=0; $i < count($catalogo) ; $i++) {
        $catalogo[$i]->select = $catalogo[$i]->categoria->tipo.' | '.$catalogo[$i]->descripcion;
      }

      $productos = $catalogo->pluck('select', 'id');

      return view('admin.productos.create', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrearProductosRequest $request)
    {
      // optener el producto para saver si crearlo o editaro
      $idProducto = Producto::where('catalogo_id', $request->catalogo_id)->get();
      $request['stock'] = $request->cantidad_entrada;
      $request['precio_lista'] = $request->precio_lista == null ? 0 : $request->precio_lista;
      $request['costo'] = $request->costo == null ? 0 : $request->costo;
      $request['numero_factura'] = $request->numero_factura == null ? 'No Asignado' : $request->numero_factura;
      $request['precio_venta1'] = $request->precio_venta1 == null ? 0 : $request->precio_venta1;
      $request['precio_venta2'] = $request->precio_venta2 == null ? 0 : $request->precio_venta2;
      $request['precio_venta3'] = $request->precio_venta3 == null ? 0 : $request->precio_venta3;
      $request['precio_venta4'] = $request->precio_venta4 == null ? 0 : $request->precio_venta4;
      $request['precio_venta5'] = $request->precio_venta5 == null ? 0 : $request->precio_venta5;

      // validamos si el producto no exuste lo creamos, si no, editamos el stock
      if (count($idProducto) == 0) {
        $producto = Producto::create($request->all());
        $producto->save();

        $request['producto_id'] = $producto->id;
        $factura = Factura::create($request->all());
        $factura->save();
      }else {
        $producto = Producto::find($idProducto[0]->id);
        $stock  = (integer)$producto->stock + (integer)$request->cantidad_entrada;

        $producto->fecha_entrada = $request->fecha_entrada;
        $producto->precio_lista = $request->precio_lista;
        $producto->costo = $request->costo;
        $producto->stock= (string)$stock;
        $producto->precio_venta1 = $request->precio_venta1;
        $producto->precio_venta2 = $request->precio_venta2;
        $producto->precio_venta3 = $request->precio_venta3;
        $producto->precio_venta4 = $request->precio_venta4;
        $producto->precio_venta5 = $request->precio_venta5;
        $producto->save();

        $request['producto_id'] = $producto->id;
        $factura = Factura::create($request->all());
        $factura->save();
      }

      return redirect()->route('producto.edit', $producto->id)->with('success','Datos guardados correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $producto = Producto::find($id);
      $catalogo = Catalogo::with(['categoria', 'proveedor'])->find($producto->catalogo_id);
      $producto->descripcion = $catalogo->descripcion;
      $producto->unidad_medida = $catalogo->unidad_medida;
      $producto->proveedor = $catalogo->proveedor->nombre_empresa;
      $producto->letra = $catalogo->categoria->letra;
      $producto->tipo_producto = $catalogo->categoria->tipo;
      $producto->categoria = $catalogo->categoria->categorias;
      $producto->cantidad_entrada = $producto->stock;
      $producto->sku = $producto->catalogo->sku;

      return $producto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $producto = Producto::find($id);
      $catalogo = Catalogo::find($producto->catalogo_id);
      $catalogo->categoria;
      $catalogo->proveedor;

      $producto->descripcion = $catalogo->descripcion;
      $producto->unidad_medida = $catalogo->unidad_medida;
      $producto->proveedor = $catalogo->proveedor->nombre_empresa;
      $producto->letra = $catalogo->categoria->letra;
      $producto->tipo_producto = $catalogo->categoria->tipo;
      $producto->categoria = $catalogo->categoria->categorias;
      $producto->cantidad_entrada = $producto->stock;

      return view('admin.productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Producto $producto)
    {
      $producto->update($request->all());
      return redirect()->route('producto.edit', $producto->id)->with('success','Datos actualizados correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Producto::find($id)->delete();
      return ['success' => true];
    }
}
