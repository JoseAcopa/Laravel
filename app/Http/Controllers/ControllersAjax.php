<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Catalog;
use App\Clientes;
use App\Count;

class ControllersAjax extends Controller
{
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

  public function getClientAjax($id)
  {
    $now = new \DateTime();
    $fecha = $now->format('Y');
    $total_cotizacion = Count::where('fecha', $fecha)->get();
    $cliente = Clientes::find($id);
    $array = compact('fecha', 'total_cotizacion', 'cliente');
    return $array;
  }

  public function getProductsAjax()
  {
    $products = Products::with(['category'])->get();
    return $products;
  }
}
