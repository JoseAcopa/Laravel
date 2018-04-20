<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
  // protected $table = 'clients';
  protected $fillable = [
      'RFC', 'business', 'address', 'phone', 'email',
  ];

  public function quotations()
  {
    return $this->hasMany('App\Quotations');
  }
}
