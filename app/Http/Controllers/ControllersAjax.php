<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Catalog;
use App\Clients;
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
    $year = $now->format('Y');
    $count = Count::where('fecha', $year)->get();
    $client = Clients::find($id);
    $array = compact('year', 'count', 'client');
    return $array;
  }
}
