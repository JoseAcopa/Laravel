<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Suppliers;
use App\Units;
use App\TypeProducts;
use App\Coins;
use App\Http\Requests\CreateProductsRequest;

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
      $coins = Coins::all();
      return view('admin.inventary.add-product', compact('suppliers'), compact('units', 'typeProducts', 'coins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductsRequest $request)
    {
      $product = new Products;
      $product->nInvoice = request('nInvoice');
      $product->TProducts = request('TProducts');
      $product->initials = request('initials');
      $product->provider = request('provider');
      $product->checkin = request('checkin');
      $product->quantity = request('quantity');
      $product->unit = request('unit');
      $product->priceList = request('priceList');
      $product->cost = request('cost');
      $product->description = request('description');
      $product->stock = request('quantity');
      $product->priceSales1 = request('priceSales1');
      $product->priceSales2 = request('priceSales2');
      $product->priceSales3 = request('priceSales3');
      $product->priceSales4 = request('priceSales4');
      $product->priceSales5 = request('priceSales5');
      $product->coin = request('coin');
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
      $coins = Coins::all();
      return view('admin.inventary.edit-product', compact('product'), compact('suppliers', 'units', 'typeProducts', 'coins'));
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
      $newInitials = $request->input('initials');
      $newProvider = $request->input('provider');
      $newCheckin = $request->input('checkin');
      $newQuantity = $request->input('quantity');
      $newUnit = $request->input('unit');
      $newPriceList = $request->input('priceList');
      $newCost = $request->input('cost');
      $newDescription = $request->input('description');
      $newPriceSales1 = $request->input('priceSales1');
      $newPriceSales2 = $request->input('priceSales2');
      $newPriceSales3 = $request->input('priceSales3');
      $newPriceSales4 = $request->input('priceSales4');
      $newPriceSales5 = $request->input('priceSales5');

      $product = Products::find($id);

      $product->nInvoice = $newNInvoice;
      $product->TProducts = $newTProducts;
      $product->initials = $newInitials;
      $product->provider = $newProvider;
      $product->checkin = $newCheckin;
      $product->quantity = $newQuantity;
      $product->unit = $newUnit;
      $product->priceList = $newPriceList;
      $product->cost = $newCost;
      $product->description = $newDescription;
      $product->stock = $newQuantity;
      $product->priceSales1 = $newPriceSales1;
      $product->priceSales2 = $newPriceSales2;
      $product->priceSales3 = $newPriceSales3;
      $product->priceSales4 = $newPriceSales4;
      $product->priceSales5 = $newPriceSales5;
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
