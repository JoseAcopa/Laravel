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
    $data = $request->data;

    // guardando en catalogo
    $catalogo = new Catalog;
    $catalogo->category_id = $data['category'];
    $catalogo->letter = $data['letter'];
    $catalogo->supplier_id = $data['proveedor'];
    $catalogo->unit = $data['unidad'];
    $catalogo->description = $data['description'];
    $catalogo->save();

    // guardando en producto
    $product = new Products;
    $product->category_id = $data['category'];
    $product->initials = $data['letter'];
    $product->supplier_id = $data['proveedor'];
    $product->checkin = $data['fecha_entrada'];
    $product->unit = $data['unidad'];
    $product->description = $data['description'];
    $product->priceList = $data['precio_lista'] === null ? 0 : $data['precio_lista'];
    $product->cost = $data['costo'] === null ? 0 : $data['costo'];
    $product->stock = $data['cantidad_entrada'];
    $product->priceSales1 = $data['priceSales1'];
    $product->priceSales2 = $data['priceSales2'];
    $product->priceSales3 = $data['priceSales3'];
    $product->priceSales4 = $data['priceSales4'];
    $product->priceSales5 = $data['priceSales5'] === null ? 0 : $data['priceSales5'];
    $product->coin_id = $data['moneda'];
    $product->save();

    // guardando en cotizaciones de productos de entrada
    $invoice = new Invoice;
    $invoice->nInvoice = $data['nInvoice'] === null ? '' : $data['nInvoice'];
    $invoice->category_id = $data['category'];
    $invoice->initials = $data['letter'];
    $invoice->supplier_id = $data['proveedor'];
    $invoice->checkin = $data['fecha_entrada'];
    $invoice->quantity = $data['cantidad_entrada'];
    $invoice->unit = $data['unidad'];
    $invoice->priceList = $data['precio_lista'] === null ? 0 : $data['precio_lista'];
    $invoice->cost = $data['costo'] === null ? 0 : $data['costo'];
    $invoice->description = $data['description'];
    $invoice->priceSales1 = $data['priceSales1'];
    $invoice->priceSales2 = $data['priceSales2'];
    $invoice->priceSales3 = $data['priceSales3'];
    $invoice->priceSales4 = $data['priceSales4'];
    $invoice->priceSales5 = $data['priceSales5'] === null ? 0 : $data['priceSales5'];
    $invoice->coin_id = $data['moneda'];
    $invoice->save();

    return ["status" => "ok", "message" => "Datos insertados correctamente"];
  }
}
