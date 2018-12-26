<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
  protected $table = 'quotations';
  // protected $id = "id";

  protected $fillable = [
    'numero_cotizacion', 'fecha', 'licitacion', 'rfc_cliente', 'telefono_cliente',
    'correo_cliente', 'nombre_empresa', 'direccion', 'nombre_cotizar', 'puesto',
    'observaciones', 'total', 'moneda', 'cliente_id', 'user_id'
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function cliente()
  {
    return $this->belongsTo('App\Clientes');
  }
}
