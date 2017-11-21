<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkouts extends Model
{
  // protected $table = 'checkouts';
  // protected $id = "id";

  // public $timestamps = false;
  protected $fillable = [
      'nInvoice', 'TProduct', 'NProduct', 'provider', 'checkout',
      'quantity', 'merma', 'stock', 'unit', 'priceList', 'cost', 'priceSales',
      'description', 'totalAmount',
  ];
}
