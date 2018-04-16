<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Coins;
use App\Catalog;
use App\Invoice;
use App\Http\Requests\CreateProductsRequest;
use App\Http\Requests\UpdateProductsRequest;

class ProductsControllers extends Controller
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
      $coins = Coins::all();
      $catalog = Catalog::with(['supplier', 'category'])->get();
      return view('admin.inventary.add-product', compact('coins', 'catalog'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductsRequest $request)
    {
      $idProduct = request('idProduct');
      $product = Products::find($idProduct);
      if ($product === null) {
        $product = new Products;
        $product->id = $idProduct;
        $product->category_id = request('category');
        $product->initials = request('initials');
        $product->supplier_id = request('proveedor');
        $product->checkin = request('fecha_entrada');
        $product->unit = request('unidad');
        $product->description = request('description');
        $product->priceList = request('precio_lista') === null ? 0 : request('precio_lista');
        $product->cost = request('costo') === null ? 0 : request('costo');
        $product->stock = request('cantidad_entrada');
        $product->priceSales1 = request('priceSales1');
        $product->priceSales2 = request('priceSales2');
        $product->priceSales3 = request('priceSales3');
        $product->priceSales4 = request('priceSales4');
        $product->priceSales5 = request('priceSales5') === null ? 0 : request('priceSales5');
        $product->coin_id = request('moneda');
      }else {
        $stock  = (integer)$product->stock + (integer)request('cantidad_entrada');
        $product->stock=(string)$stock;
        $product->category_id = request('category');
        $product->initials = request('initials');
        $product->supplier_id = request('proveedor');
        $product->checkin = request('fecha_entrada');
        $product->unit = request('unidad');
        $product->description = request('description');
        $product->priceList = request('precio_lista') === null ? 0 : request('precio_lista');
        $product->cost = request('costo') === null ? 0 : request('costo');
        $product->priceSales1 = request('priceSales1');
        $product->priceSales2 = request('priceSales2');
        $product->priceSales3 = request('priceSales3');
        $product->priceSales4 = request('priceSales4');
        $product->priceSales5 = request('priceSales5') === null ? 0 : request('priceSales5');
        $product->coin_id = request('moneda');
      }

      $product->save();

      $invoice = new Invoice;
      $invoice->nInvoice = request('nInvoice') === null ? '' : request('nInvoice');
      $invoice->category_id = request('category');
      $invoice->initials = request('initials');
      $invoice->supplier_id = request('proveedor');
      $invoice->checkin = request('fecha_entrada');
      $invoice->quantity = request('cantidad_entrada');
      $invoice->unit = request('unidad');
      $invoice->priceList = request('precio_lista') === null ? 0 : request('precio_lista');
      $invoice->cost = request('costo') === null ? 0 : request('costo');
      $invoice->description = request('description');
      $invoice->priceSales1 = request('priceSales1');
      $invoice->priceSales2 = request('priceSales2');
      $invoice->priceSales3 = request('priceSales3');
      $invoice->priceSales4 = request('priceSales4');
      $invoice->priceSales5 = request('priceSales5') === null ? 0 : request('priceSales5');
      $invoice->coin_id = request('moneda');
      $invoice->save();

      return redirect('admin/inventary')->with('success','Producto '. $product->category->type .' Guardado correctamente')
      ->withInput(request(['tipo_producto' , 'proveedor', 'fecha_entrada', 'cantidad_entrada',
      'unidad', 'precio_lista', 'costo', 'moneda', 'description', 'priceSales1',
      'priceSales2', 'priceSales3', 'priceSales4', 'priceSales5', 'initials']));
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
      $product->coin;
      $product->supplier;
      $product->category;
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
      $coins = Coins::all();
      $product->coin;
      $product->supplier;
      $product->category;
      return view('admin.inventary.edit-product', compact('product', 'coins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductsRequest $request, $id)
    {
      $newCategory = $request->input('category');
      $newInitials = $request->input('initials');
      $newSupplier = $request->input('proveedor');
      $newCheckin = $request->input('fecha_entrada');
      $newUnit = $request->input('unidad');
      $newDescription = $request->input('description');
      $newStock = $request->input('cantidad_entrada');
      $newPriceList = $request->input('precio_lista');
      $newCost = $request->input('costo');
      $newPriceSales1 = $request->input('priceSales1');
      $newPriceSales2 = $request->input('priceSales2');
      $newPriceSales3 = $request->input('priceSales3');
      $newPriceSales4 = $request->input('priceSales4');
      $newPriceSales5 = $request->input('priceSales5');
      $newCoin = $request->input('moneda');

      $product = Products::find($id);

      $product->category_id = $newCategory;
      $product->initials = $newInitials;
      $product->supplier_id = $newSupplier;
      $product->checkin = $newCheckin;
      $product->unit = $newUnit;
      $product->description = $newDescription;
      $product->stock = $newStock;
      $product->priceList = $newPriceList;
      $product->cost = $newCost;
      $product->priceSales1 = $newPriceSales1;
      $product->priceSales2 = $newPriceSales2;
      $product->priceSales3 = $newPriceSales3;
      $product->priceSales4 = $newPriceSales4;
      $product->priceSales5 = $newPriceSales5;
      $product->coin_id = $newCoin;
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

    public function getCatalogtAjax($id)
    {
      $product = Catalog::find($id);
      $product->unit;
      $product->supplier;
      $product->category;
      return $product;
    }

    public function getProductAjax($id)
    {
      $product = Products::find($id);
      $product->coin;
      $product->supplier;
      $product->category;
      return $product;
    }
}
