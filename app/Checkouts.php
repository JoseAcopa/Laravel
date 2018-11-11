<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkouts extends Model
{
  // protected $table = 'checkouts';
  // protected $id = "id";

  // public $timestamps = false;
  protected $fillable = [
    'category_id', 'initials', 'supplier_id',
    'unit', 'description', 'priceList','cost',
    'coin_id', 'stock', 'quantity_output', 'price_output'
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
