<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
  // protected $table = 'products';
  // protected $id = "id";

  protected $fillable = [
      'category_id', 'initials', 'supplier_id', 'checkin',
      'unit', 'priceList', 'cost','description', 'stock',
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
    return $this->belongsTo('App\Suppliers');
  }

  public function quoteers()
  {
    return $this->hasMany('App\Quoteers');
  }
}
