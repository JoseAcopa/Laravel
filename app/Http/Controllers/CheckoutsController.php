<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checkouts;
use App\Suppliers;
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
      $checkin = Checkins::find($id);
      return view('admin.inventary.edit-out', compact('checkin'), compact('suppliers', 'units', 'products'));
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
      Checkouts::find($id)->delete();
      return redirect('admin/inventary-out')->with('success','Producto de salida eliminado correctamente');

    }
}
