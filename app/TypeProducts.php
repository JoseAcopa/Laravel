<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeProducts extends Model
{
  protected $table = 'typeProducts';

  protected $fillable = [
      'type','letters','categorias',
  ];

  public function products()
  {
    return $this->hasMany('App\Products');
  }
}
