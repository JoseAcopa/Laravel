<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catalog;
use App\Products;
use App\Invoice;

class ControllerNewProductQuotation extends Controller
{
  public function saveNewProduct(Request $request)
  {
    // guardando en catalogo
    $product = new Catalog;
    $product->category_id = $request->category;
    $product->letter = $request->letter;
    $product->supplier_id = $request->proveedor;
    $product->unit = $request->unidad;
    $product->description = $request->description;
    $product->save();

    // guardando en producto
    $product = new Products;
    $product->category_id = $request->category;
    $product->initials = $request->letter;
    $product->supplier_id = $request->proveedor;
    $product->checkin = $request->fecha_entrada;
    $product->unit = $request->unidad;
    $product->description = $request->description;
    $product->priceList = $request->precio_lista === null ? 0 : $request->precio_lista;
    $product->cost = $request->costo === null ? 0 : $request->costo;
    $product->stock = $request->cantidad_entrada;
    $product->priceSales1 = $request->priceSales1;
    $product->priceSales2 = $request->priceSales2;
    $product->priceSales3 = $request->priceSales3;
    $product->priceSales4 = $request->priceSales4;
    $product->priceSales5 = $request->priceSales5 === null ? 0 : $request->priceSales5;
    $product->coin_id = $request->moneda;
    $product->save();

    // guardando en cotizaciones de productos de entrada
    $invoice = new Invoice;
    $invoice->nInvoice = $request->nInvoice === null ? '' : $request->nInvoice;
    $invoice->category_id = $request->category;
    $invoice->initials = $request->letter;
    $invoice->supplier_id = $request->proveedor;
    $invoice->checkin = $request->fecha_entrada;
    $invoice->quantity = $request->cantidad_entrada;
    $invoice->unit = $request->unidad;
    $invoice->priceList = $request->precio_lista === null ? 0 : $request->precio_lista;
    $invoice->cost = $request->costo === null ? 0 : $request->costo;
    $invoice->description = $request->description;
    $invoice->priceSales1 = $request->priceSales1;
    $invoice->priceSales2 = $request->priceSales2;
    $invoice->priceSales3 = $request->priceSales3;
    $invoice->priceSales4 = $request->priceSales4;
    $invoice->priceSales5 = $request->priceSales5 === null ? 0 : $request->priceSales5;
    $invoice->coin_id = $request->moneda;
    $invoice->save();

    return redirect('admin/crear-cotizacion')->with('success','La cotizacion ha sido eliminado correctamente');
  }
}
