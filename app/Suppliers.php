<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
  // protected $table = 'suppliers';
  protected $fillable = [
      'RFC', 'business', 'address', 'phone', 'email',
  ];

  public function catalogs()
  {
    return $this->hasMany('App\Catalog');
  }

  public function products()
  {
    return $this->hasMany('App\Products');
  }

  public function invoices()
  {
    return $this->hasMany('App\Invoice');
  }
}
