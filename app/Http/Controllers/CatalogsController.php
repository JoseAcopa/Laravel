<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catalog;
use App\Suppliers;
use App\Units;
use App\TypeProducts;
use App\Http\Requests\CreateCatalogs;

class CatalogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $catalog = Catalog::all();
      return view('admin.catalogs.catalogs', compact('catalog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $suppliers = Suppliers::all();
      $units = Units::all();
      $typeProducts = TypeProducts::all();
      return view('admin.catalogs.alta', compact('suppliers', 'units', 'typeProducts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCatalogs $request)
    {
      $product = new Catalog;
      $product->typeProduct_id = request('tipo_producto');
      $product->letter = request('letter');
      $product->supplier_id = request('proveedor');
      $product->unit_id = request('unidad');
      $product->description = request('description');
      $product->save();
      return redirect('admin/catalogo')->with('success','Producto '. $product->typeProduct_id .' Guardado correctamente');
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
      Catalog::find($id)->delete();
      return redirect('admin/catalogo')->with('success','Producto eliminado correctamente');
    }
}
