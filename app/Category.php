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
}
