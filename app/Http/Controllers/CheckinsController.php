<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checkins;
use App\Suppliers;
use App\Units;
use App\Products;

class CheckinsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $checkins = Checkins::all();
      return view('admin.inventary.checkin', compact('checkins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $suppliers = Suppliers::all();
      $products = Products::all();
      return view('admin.inventary.add-entrada', compact('suppliers'), compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $checkin = new Checkins;
      $checkin->nInvoice = request('nInvoice');
      $checkin->TProducts = request('TProducts');
      $checkin->provider = request('provider');
      $checkin->description = request('description');
      $checkin->checkin = request('checkin');
      $checkin->quantity = request('quantity');
      $checkin->stock = request('stock');
      $checkin->unit = request('unit');
      $checkin->cost = request('cost');
      $checkin->price = request('price');
      $checkin->save();
      return redirect('admin/checkin')->with('success','Producto '. $checkin->TProducts .' Guardado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $checkin = Checkins::find($id);
      return view('admin.inventary.show-checkin', compact('checkin'));
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
      $checkin = Checkins::find($id);
      return view('admin.inventary.edit-checkin', compact('checkin'), compact('suppliers', 'units'));
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

      $checkin = Checkins::find($id);

      $checkin->nInvoice = $newNInvoice;
      $checkin->nProducts = $newNProducts;
      $checkin->provider = $newProvider;
      $checkin->description = $newDescription;
      $checkin->checkin = $newCheckin;
      $checkin->quantity = $newQuantity;
      $checkin->stock = $newStock;
      $checkin->unit = $newUnit;
      $checkin->cost = $newCost;
      $checkin->price1 = $newPrice1;
      $checkin->price2 = $newPrice2;
      $checkin->price3 = $newPrice3;
      $checkin->price4 = $newPrice4;
      $checkin->save();

      return redirect('admin/checkin')->with('success','Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Checkins::find($id)->delete();
      return redirect('admin/checkin')->with('success','Producto de entrada'. $id .' eliminado correctamente');
    }
}
