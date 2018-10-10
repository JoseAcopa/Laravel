<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
  protected $table = 'clients';
  protected $fillable = [
    'nombre_empresa', 'rfc', 'siglas', 'correo', 'telefono', 'direccion'
  ];

  public function quotations()
  {
    return $this->hasMany('App\Quotations');
  }
}
