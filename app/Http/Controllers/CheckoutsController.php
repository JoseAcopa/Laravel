<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checkouts;
use App\Suppliers;
use App\Units;
use App\Products;

class CheckoutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $checkouts = Checkouts::all();
      return view('admin.inventary.inventary-out', compact('checkouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $products = Products::all();
      return view('admin.inventary.add-out', compact('products'));
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
      $checkout->TProducts = request('TProducts');
      $checkout->letters = request('letters');
      $checkout->provider = request('provider');
      $checkout->description = request('description');
      $checkout->unit = request('unit');
      $checkout->checkout = request('checkout');
      $checkout->cost = request('cost');
      $checkout->price = request('price');
      $checkout->quantityCO = request('quantityCO');
      $checkout->merma = request('merma');
      $checkout->stock = request('stock');
      $checkout->totalAmount = request('totalAmount');
      $checkout->totalMult = request('totalMult');
      $checkout->save();
      return redirect('admin/inventary-out')->with('success','Producto '. $checkout->TProducts .' Guardado correctamente');
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
      $newTProducts = $request->input('TProducts');
      $newLetters = $request->input('letters');
      $newProvider = $request->input('provider');
      $newDescription = $request->input('description');
      $newUnit = $request->input('unit');
      $newCheckout = $request->input('checkout');
      $newCost = $request->input('cost');
      $newPrice = $request->input('price');
      $newQuantityCO = $request->input('quantityCO');
      $newMerma = $request->input('merma');
      $newStock = $request->input('stock');
      $newTotalAmount = $request->input('totalAmount');
      $newTotalMult = $request->input('totalMult');

      $checkout = Checkouts::find($id);

      $checkout->nInvoice = $newNInvoice;
      $checkout->TProducts = $newTProducts;
      $checkout->letters = $newLetters;
      $checkout->provider = $newProvider;
      $checkout->description = $newDescription;
      $checkout->unit = $newUnit;
      $checkout->checkout = $newCheckout;
      $checkout->cost = $newCost;
      $checkout->price = $newPrice;
      $checkout->quantityCO = $newQuantityCO;
      $checkout->merma = $newMerma;
      $checkout->stock = $newStock;
      $checkout->totalAmount = $newTotalAmount;
      $checkout->totalMult = $newTotalMult;


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
