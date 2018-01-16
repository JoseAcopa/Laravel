<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
  protected $fillable = [
      'type',
  ];

  public function product()
  {
    return $this->belongsTo('App\Products');
  }
}
