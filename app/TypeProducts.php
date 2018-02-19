<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeProducts extends Model
{
  protected $table = 'typeProducts';
  protected $id = "id";

  protected $fillable = [
      'type','letters','categorias',
  ];

  public function catalogs()
  {
    return $this->hasMany('App\Catalog');
  }

  public function products()
  {
    return $this->hasMany('App\TypeProducts');
  }
}
