<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  // protected $table = 'typeProducts';

  protected $fillable = [
      'type','letters','categorias',
  ];

  public function catalogs()
  {
    return $this->hasMany('App\Catalog');
  }

  public function products()
  {
    return $this->hasMany('App\Products');
  }
}
