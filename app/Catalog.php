<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
  // protected $table = 'catalogs';
  // protected $id = "id";

  protected $fillable = [
    'category_id', 'initials', 'supplier_id',
    'unit_id', 'description', 'categoria',
  ];

  public function category()
  {
    return $this->belongsTo('App\Category');
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
