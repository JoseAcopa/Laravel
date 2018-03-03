<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
  // protected $table = 'products';
  // protected $id = "id";

  protected $fillable = [
      'nInvoice', 'category', 'initials', 'supplier', 'checkin',
      'quantity', 'unit', 'priceList', 'cost','description', 'stock',
      'priceSales1', 'priceSales2', 'priceSales3', 'priceSales4',
      'priceSales5', 'coin_id',
  ];

  public function coin()
  {
    return $this->belongsTo('App\Coins');
  }
}
