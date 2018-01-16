<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coins extends Model
{
  // protected $table = 'coins';

  protected $fillable = [
      'type',
  ];

  public function product()
  {
    return $this->belongsTo('App\Products');
  }
}
