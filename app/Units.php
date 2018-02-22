<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
  protected $fillable = [
      'type',
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
