<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
  protected $table = 'suppliers';
  protected $fillable = [
      'nombre_empresa', 'rfc', 'telefono', 'correo', 'direccion',
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

  public function checkouts()
  {
    return $this->hasMany('App\Checkouts');
  }
}
