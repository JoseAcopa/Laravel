<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
  // protected $table = 'catalogs';
  // protected $id = "id";

  protected $fillable = [
    'typeProduct_id', 'initials', 'supplier_id',
    'unit_id', 'description', 'categoria',
  ];

  public function typeProduct()
  {
    return $this->belongsTo('App\TypeProducts');
  }

  public function supplier()
  {
    return $this->belongsTo('App\Suppliers');
  }

  public function unit()
  {
    return $this->belongsTo('App\Units');
  }
}
