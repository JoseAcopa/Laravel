<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
  protected $fillable = [
      'nInvoice', 'category', 'initials', 'supplier', 'checkin',
      'quantity', 'unit', 'priceList', 'cost','description',
      'priceSales1', 'priceSales2', 'priceSales3', 'priceSales4',
      'priceSales5', 'coin_id',
  ];
}
