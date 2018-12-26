<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
  protected $table = 'checkouts';

  protected $fillable = [
    'numero_factura', 'fecha_salida', 'cantidad_salida', 'precio_venta',
    'moneda', 'producto_id', 'categoria_id', 'proveedor_id'
  ];

  public function categoria()
  {
    return $this->belongsTo('App\Categoria');
  }

  public function proveedor()
  {
    return $this->belongsTo('App\Proveedores');
  }

  public function producto()
  {
    return $this->belongsTo('App\Producto');
  }
}
