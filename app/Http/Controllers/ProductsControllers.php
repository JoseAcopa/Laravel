<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Suppliers;
use App\Units;
use App\TypeProducts;

class ProductsControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Products::all();
      return view('admin.inventary.inventary', compact('products'));
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
      return view('admin.inventary.add-product', compact('suppliers'), compact('units', 'typeProducts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $product = new Products;
      $product->nInvoice = request('nInvoice');
      $product->TProducts = request('TProducts');
      $product->provider = request('provider');
      $product->checkin = request('checkin');
      $product->quantity = request('quantity');
      $product->unit = request('unit');
      $product->cost = request('cost');
      $product->description = request('description');
      $product->initials = request('initials');
      $product->stock = request('quantity');
      $product->save();
      return redirect('admin/inventary')->with('success','Producto '. $product->TProducts .' Guardado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $product = Products::find($id);
      return view('admin.inventary.show-product', compact('product'));
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
      $product = Products::find($id);
      $typeProducts = TypeProducts::all();
      return view('admin.inventary.edit-product', compact('product'), compact('suppliers', 'units', 'typeProducts'));
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
      $newNInvoice = $request->input('nInvoice');
      $newTProducts = $request->input('TProducts');
      $newProvider = $request->input('provider');
      $newCheckin = $request->input('checkin');
      $newQuantity = $request->input('quantity');
      $newUnit = $request->input('unit');
      $newCost = $request->input('cost');
      $newDescription = $request->input('description');
      $newInitials = $request->input('initials');

      $product = Products::find($id);

      $product->nInvoice = $newNInvoice;
      $product->TProducts = $newTProducts;
      $product->provider = $newProvider;
      $product->checkin = $newCheckin;
      $product->quantity = $newQuantity;
      $product->unit = $newUnit;
      $product->cost = $newCost;
      $product->description = $newDescription;
      $product->initials = $newInitials;
      $product->stock = $newQuantity;
      $product->save();

      return redirect('admin/inventary')->with('success','Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Products::find($id)->delete();
      return redirect('admin/inventary')->with('success','Producto '. $id .' eliminado correctamente');
    }
}
