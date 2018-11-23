<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizador extends Model
{
  protected $table = 'quoteers';

  protected $fillable = [
      'cotizacion_id', 'producto_id', 'cantidad', 'precio', 'subtotal'
  ];

  public function producto()
  {
    return $this->belongsTo('App\Producto');
  }
}
