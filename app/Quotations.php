<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotations extends Model
{
  // protected $table = 'quotations';
  // protected $id = "id";

  // public $timestamps = false;

  protected $fillable = [
    'numero_cotizacion', 'fecha', 'licitacion', 'nombre_cotizar', 'puesto',
    'observaciones', 'total', 'cliente_id', 'user_id'
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function cliente()
  {
    return $this->belongsTo('App\Clients');
  }
}
