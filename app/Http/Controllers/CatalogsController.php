<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catalog;
use App\Suppliers;
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
      // $catalog = Catalog::get();
      // $catalog->unit;
      // return json_decode($catalog, true);
      $catalog = Catalog::with(['unit', 'supplier', 'category'])->get();
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
      $categories = Category::all();
      return view('admin.catalogs.alta', compact('suppliers', 'units', 'categories'));
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
      $product->category_id = request('category');
      $product->letter = request('letter');
      $product->supplier_id = request('proveedor');
      $product->unit_id = request('unidad');
      $product->description = request('description');
      $product->categoria = request('tipo_categoria');
      $product->save();
      return redirect('admin/catalogo')->with('success','Producto '. $product->category_id .' Guardado correctamente.')->withInput(request(['description']));
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
      $suppliers = Suppliers::all();
      $units = Units::all();
      $categories = Category::all();
      $catalog = Catalog::find($id);
      $catalog->unit;
      $catalog->supplier;
      $catalog->category;
      return view('admin.catalogs.edit', compact('suppliers', 'units', 'categories', 'catalog'));
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
      $newCategory = $request->input('category');
      $newLetter = $request->input('letter');
      $newSuppler = $request->input('proveedor');
      $newUnit = $request->input('unidad');
      $newDescription = $request->input('description');
      $newCategoria = $request->input('categoria');

      $product = Catalog::find($id);

      $product->category_id = $newCategory;
      $product->letter = $newLetter;
      $product->supplier_id = $newSuppler;
      $product->unit_id = $newUnit;
      $product->description = $newDescription;
      $product->categoria = $newCategoria;
      $product->save();
      return redirect('admin/catalogo')->with('success',$newDescription .' actualizado correctamente.');
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
