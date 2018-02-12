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

  // public function typeProduct()
  // {
  //   return $this->belongsTo('App\TypeProducts');
  // }
  //
  // public function suppliers()
  // {
  //   return $this->hasMany('App\Suppliers');
  // }
  //
  // public function units()
  // {
  //   return $this->belongsTo('App\Units');
  // }
}
