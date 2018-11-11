<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
  protected $fillable = [
      'nInvoice', 'category_id', 'initials', 'supplier_id', 'checkin',
      'quantity', 'unit', 'priceList', 'cost','description',
      'priceSales1', 'priceSales2', 'priceSales3', 'priceSales4',
      'priceSales5', 'coin_id',
  ];

  public function coin()
  {
    return $this->belongsTo('App\Coins');
  }

  public function category()
  {
    return $this->belongsTo('App\Category');
  }

  public function supplier()
  {
    return $this->belongsTo('App\Proveedores');
  }
}
