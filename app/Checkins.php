<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkins extends Model
{
  // protected $table = 'checkins';
  // protected $id = "id";

  // public $timestamps = false;

  protected $fillable = [
      'nInvoice', 'TProduct', 'NProduct', 'provider', 'checkin',
      'quantity', 'stock', 'unit', 'priceList', 'cost', 'description',
      'priceSales1', 'priceSales2', 'priceSales3', 'priceSales4', 'priceSales5',
  ];
}
