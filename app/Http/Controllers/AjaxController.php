<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Catalogo;
use App\Clientes;
use App\Count;

class AjaxController extends Controller
{
  public function getCatalogoAjax($id)
  {
    $producto = Catalogo::find($id);
    $producto->proveedor;
    $producto->categoria;
    return $producto;
  }

  // public function getProductAjax($id)
  // {
  //   $product = Producto::find($id);
  //   $product->coin;
  //   $product->supplier;
  //   $product->category;
  //   return $product;
  // }
  //
  // public function getClientAjax($id)
  // {
  //   $now = new \DateTime();
  //   $fecha = $now->format('Y');
  //   $total_cotizacion = Count::where('fecha', $fecha)->get();
  //   $cliente = Clientes::find($id);
  //   $array = compact('fecha', 'total_cotizacion', 'cliente');
  //   return $array;
  // }
  //
  // public function getProductsAjax()
  // {
  //   $products = Producto::with(['category'])->get();
  //   return $products;
  // }
}
