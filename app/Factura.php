<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
  protected $table = 'invoices';

  protected $fillable = [
    'numero_factura', 'precio_lista', 'costo', 'moneda', 'fecha_entrada',
    'cantidad_entrada', 'producto_id', 'proveedor_id', 'categoria_id'
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
