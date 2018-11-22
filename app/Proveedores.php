<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
  protected $table = 'suppliers';
  protected $fillable = [
      'nombre_empresa', 'rfc', 'telefono', 'correo', 'direccion',
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
