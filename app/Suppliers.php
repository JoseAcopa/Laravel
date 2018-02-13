<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
  // protected $table = 'suppliers';
  protected $fillable = [
      'RFC', 'business', 'address', 'phone', 'email',
  ];

  public function catalog()
  {
    return $this->hasMany('App\Catalog');
  }
}
