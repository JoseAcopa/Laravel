<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
  protected $fillable = [
      'type',
  ];

  public function products()
  {
    return $this->hasMany('App\Products');
  }
}
