<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
  // protected $table = 'products';
  // protected $id = "id";

  protected $fillable = [
      'nInvoice', 'typeProduct_id', 'initials', 'supplier_id', 'checkin',
      'quantity', 'unit_id', 'priceList', 'cost','description', 'stock',
      'priceSales1', 'priceSales2', 'priceSales3', 'priceSales4',
      'priceSales5', 'coin_id',
  ];

  public function typeProduct()
  {
    return $this->belongsTo('App\TypeProducts');
  }

  public function suppliers()
  {
    return $this->hasMany('App\Suppliers');
  }

  public function unit()
  {
    return $this->belongsTo('App\Units');
  }

  public function coin()
  {
    return $this->belongsTo('App\Coins');
  }
}
