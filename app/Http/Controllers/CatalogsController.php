<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catalog;
use App\Proveedores;
use App\Units;
use App\Category;
use App\Http\Requests\CreateCatalogs;
use App\Http\Requests\UpdateCatalogs;

class CatalogsController extends Controller
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
      $catalog = Catalog::with(['supplier', 'category'])->get();
      return view('admin.catalogs.catalogs', compact('catalog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $proveedores = Proveedores::all();
      $units = Units::all();
      $categories = Category::all();
      return view('admin.catalogs.alta', compact('proveedores', 'units', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCatalogs $request)
    {
      $producto = new Catalog;
      $producto->category_id = $request->category;
      $producto->letter = $request->letter;
      $producto->supplier_id = $request->proveedor;
      $producto->unit = $request->unidad;
      $producto->description = $request->description;
      $producto->sku = $request->sku;
      $producto->save();
      return redirect()->route('catalogo.edit', $producto->id)->with('success','Datos guardados correctamente.');
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
      $proveedores = Proveedores::all();
      $units = Units::all();
      $categories = Category::all();
      $catalog = Catalog::find($id);
      $catalog->supplier;
      $catalog->category;
      return view('admin.catalogs.edit', compact('proveedores', 'units', 'categories', 'catalog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCatalogs $request, $id)
    {
      $producto = Catalog::find($id);

      $producto->category_id = $request->category;
      $producto->letter = $request->letter;
      $producto->supplier_id = $request->proveedor;
      $producto->unit = $request->unidad;
      $producto->description = $request->description;
      $producto->sku = $request->sku;
      $producto->save();
      return redirect()->route('catalogo.edit', $producto->id)->with('success','Datos guardados correctamente.');
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
      return redirect('admin/catalogo')->with('success','Producto eliminado del catálogo correctamente.');
    }
}
