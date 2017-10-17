<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Suppliers;
use App\Units;

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
      return view('admin.inventary.add-product', compact('suppliers'), compact('units'));
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
      $product->nProducts = request('nProducts');
      $product->provider = request('provider');
      $product->description = request('description');
      $product->checkin = request('checkin');
      $product->quantity = request('quantity');
      $product->stock = request('stock');
      $product->unit = request('unit');
      $product->cost = request('cost');
      $product->price1 = request('price1');
      $product->price2 = request('price2');
      $product->price3 = request('price3');
      $product->price4 = request('price4');
      $product->save();
      return redirect('admin/inventary')->with('success','Producto '. $product->nProducts .' Guardado correctamente');

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
      $product = Products::find($id);
      return view('admin.inventary.edit-product', compact('product'));
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
      $newNProducts = $request->input('nProducts');
      $newProvider = $request->input('provider');
      $newDescription = $request->input('description');
      $newCheckin = $request->input('checkin');
      $newQuantity = $request->input('quantity');
      $newStock = $request->input('stock');
      $newUnit = $request->input('unit');
      $newCost = $request->input('cost');
      $newPrice1 = $request->input('price1');
      $newPrice2 = $request->input('price2');
      $newPrice3 = $request->input('price3');
      $newPrice4 = $request->input('price4');

      $product = Products::find($id);

      $product->nInvoice = $newNInvoice;
      $product->nProducts = $newNProducts;
      $product->provider = $newProvider;
      $product->description = $newDescription;
      $product->checkin = $newCheckin;
      $product->quantity = $newQuantity;
      $product->stock = $newStock;
      $product->unit = $newUnit;
      $product->cost = $newCost;
      $product->price1 = $newPrice1;
      $product->price2 = $newPrice2;
      $product->price3 = $newPrice3;
      $product->price4 = $newPrice4;
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
      return redirect('admin/inventary')->with('success','Producto'. $id .' eliminado correctamente');
    }
}
