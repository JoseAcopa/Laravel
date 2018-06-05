<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotations extends Model
{
  // protected $table = 'quotations';
  // protected $id = "id";

  // public $timestamps = false;

  protected $fillable = [
    'cotizacion', 'fecha', 'licitacion', 'nombre', 'puesto',
    'observaciones', 'subtotal', 'IVA', 'total',
    'cliente_id', 'user_id'
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
