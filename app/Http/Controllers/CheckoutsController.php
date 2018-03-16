<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checkouts;
use App\Products;

class CheckoutsController extends Controller
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
      $checkouts = Checkouts::with(['supplier', 'category'])->get();
      return view('admin.checkout.index', compact('checkouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $products = Products::all();
      return view('admin.checkout.add', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $checkout = new Checkouts;
      $checkout->nInvoice = request('nInvoice');
      $checkout->TProduct = request('TProduct');
      $checkout->NProduct = request('NProduct');
      $checkout->provider = request('provider');
      $checkout->checkout = request('checkout');
      $checkout->quantity = request('quantity');
      $checkout->merma = request('merma');
      $checkout->stock = request('stock');
      $checkout->unit = request('unit');
      $checkout->priceList = request('priceList');
      $checkout->cost = request('cost');
      $checkout->priceSales = request('priceSales');
      $checkout->description = request('description');
      $checkout->totalAmount = request('totalAmount');

      $checkout->save();
      return redirect('admin/inventary-out')->with('success','Producto '. $checkout->TProduct .' Guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $checkout = Checkouts::find($id);
      return view('admin.inventary.show-out', compact('checkout'));
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
      $products = Products::all();
      $checkout = Checkouts::find($id);
      return view('admin.inventary.edit-out', compact('checkout'), compact('suppliers', 'units', 'products'));
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
      $newTProduct = $request->input('TProduct');
      $newNProduct = $request->input('NProduct');
      $newProvider = $request->input('provider');
      $newCheckout = $request->input('checkout');
      $newQuantity = $request->input('quantity');
      $newMerma = $request->input('merma');
      $newStock = $request->input('stock');
      $newUnit = $request->input('unit');
      $newPriceList = $request->input('priceList');
      $newCost = $request->input('cost');
      $newPriceSales = $request->input('priceSales');
      $newDescription = $request->input('description');
      $newTotalAmount = $request->input('totalAmount');

      $checkout = Checkouts::find($id);

      $checkout->nInvoice = $newNInvoice;
      $checkout->TProduct = $newTProduct;
      $checkout->NProduct = $newNProduct;
      $checkout->provider = $newProvider;
      $checkout->checkout = $newCheckout;
      $checkout->quantity = $newQuantity;
      $checkout->merma = $newMerma;
      $checkout->stock = $newStock;
      $checkout->unit = $newUnit;
      $checkout->priceList = $newPriceList;
      $checkout->cost = $newCost;
      $checkout->priceSales = $newPriceSales;
      $checkout->description = $newDescription;
      $checkout->totalAmount = $newTotalAmount;
      $checkout->save();

      return redirect('admin/inventary-out')->with('success','Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Checkouts::find($id)->delete();
      return redirect('admin/inventary-out')->with('success','Producto de salida eliminado correctamente');

    }
}
