<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coins extends Model
{
  // protected $table = 'coins';

  protected $fillable = [
      'type',
  ];

  public function products()
  {
    return $this->hasMany('App\Products');
  }
}
