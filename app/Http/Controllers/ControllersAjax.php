<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Catalog;
use App\Clients;

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
    $client = Clients::find($id);
    return $client;
  }
}
