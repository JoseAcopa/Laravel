<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  protected $table = 'categories';

  protected $fillable = [
      'tipo', 'letra', 'categorias',
  ];

  public function catalogo()
  {
    return $this->hasMany('App\Catalogo');
  }

  public function productos()
  {
    return $this->hasMany('App\Producto');
  }

  public function invoices()
  {
    return $this->hasMany('App\Invoice');
  }

  public function checkouts()
  {
    return $this->hasMany('App\Checkouts');
  }
}
