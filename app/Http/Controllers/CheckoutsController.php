<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checkouts;
use App\Products;
use App\Http\Requests\CreateCheckoutRequest;

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
    public function store(CreateCheckoutRequest $request)
    {
      // descontando stock del producto
      $id = request('idProduct');
      $stock = $request->input('stock');
      $quantity = $request->input('cantidad');
      $newStock = $stock - $quantity;
      $product = Products::find($id);
      $product->stock = $newStock;
      $product->save();

      $checkout = new Checkouts;
      $checkout->nInvoice = request('factura') === null ? '' : request('factura');
      $checkout->category_id = request('categoria');
      $checkout->initials = request('iniciales');
      $checkout->supplier_id = request('proveedor');
      $checkout->unit = request('unidad');
      $checkout->date_out = request('salida');
      $checkout->description = request('description');
      $checkout->priceList = request('precio_lista');
      $checkout->cost = request('costo');
      $checkout->coin_id = request('idMoneda');
      $checkout->stock = $newStock;
      $checkout->quantity_output = request('cantidad');
      $checkout->price_output = request('precio');
      $checkout->keyProduct = $id;

      $checkout->save();
      return redirect('admin/salidas')->with('success','Salida Guardado correctamente');
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
      $checkout->coin;
      $checkout->supplier;
      $checkout->category;
      return view('admin.checkout.show', compact('checkout'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $checkout = Checkouts::find($id);
      $checkout->coin;
      $checkout->supplier;
      $checkout->category;
      return view('admin.checkout.edit', compact('checkout'));
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
      $keyProduct = $request->input('idProduct');
      $newNInvoice = $request->input('factura');
      $newDate = $request->input('salida');
      $newStock = $request->input('stock');
      $newQuantity = $request->input('cantidad');
      $newPrice = $request->input('precio');

      // editando stock del producto
      $product = Products::find($keyProduct);
      $product->stock = $newStock;
      $product->save();

      $checkout = Checkouts::find($id);

      $checkout->nInvoice = $newNInvoice;
      $checkout->date_out = $newDate;
      $checkout->stock = $newStock;
      $checkout->quantity_output = $newQuantity;
      $checkout->price_output = $newPrice;
      $checkout->save();

      return redirect('admin/salidas')->with('success','Salida actualizado correctamente');
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
      return redirect('admin/salidas')->with('success','Salida eliminado correctamente');

    }
}
