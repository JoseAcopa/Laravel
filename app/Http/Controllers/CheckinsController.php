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
      $checkin->TProduct = request('TProduct');
      $checkin->NProduct = request('NProduct');
      $checkin->provider = request('provider');
      $checkin->checkin = request('checkin');
      $checkin->quantity = request('quantity');
      $checkin->stock = request('stock');
      $checkin->unit = request('unit');
      $checkin->priceList = request('priceList');
      $checkin->cost = request('cost');
      $checkin->description = request('description');
      $checkin->priceSales1 = request('priceSales1');
      $checkin->priceSales2 = request('priceSales2');
      $checkin->priceSales3 = request('priceSales3');
      $checkin->priceSales4 = request('priceSales4');
      $checkin->priceSales5 = request('priceSales5');
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
      $products = Products::all();
      $checkin = Checkins::find($id);
      return view('admin.inventary.edit-checkin', compact('checkin'), compact('suppliers', 'units', 'products'));
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
      $newCheckin = $request->input('checkin');
      $newQuantity = $request->input('quantity');
      $newStock = $request->input('stock');
      $newUnit = $request->input('unit');
      $newPriceList = $request->input('priceList');
      $newCost = $request->input('cost');
      $newDescription = $request->input('description');
      $newPriceSales1 = $request->input('priceSales1');
      $newPriceSales2 = $request->input('priceSales2');
      $newPriceSales3 = $request->input('priceSales3');
      $newPriceSales4 = $request->input('priceSales4');
      $newPriceSales5 = $request->input('priceSales5');

      $checkin = Checkins::find($id);

      $checkin->nInvoice = $newNInvoice;
      $checkin->TProduct = $newTProduct;
      $checkin->NProduct = $newNProduct;
      $checkin->provider = $newProvider;
      $checkin->checkin = $newCheckin;
      $checkin->quantity = $newQuantity;
      $checkin->stock = $newStock;
      $checkin->unit = $newUnit;
      $checkin->priceList = $newPriceList;
      $checkin->cost = $newCost;
      $checkin->description = $newDescription;
      $checkin->priceSales1 = $newPriceSales1;
      $checkin->priceSales2 = $newPriceSales2;
      $checkin->priceSales3 = $newPriceSales3;
      $checkin->priceSales4 = $newPriceSales4;
      $checkin->priceSales5 = $newPriceSales5;
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
