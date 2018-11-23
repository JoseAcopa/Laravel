<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
  protected $table = 'products';

  protected $fillable = [
    'fecha_entrada', 'precio_lista', 'costo', 'stock', 'precio_venta1',
    'precio_venta2', 'precio_venta3', 'precio_venta4', 'precio_venta5',
    'moneda', 'catalogo_id', 'proveedor_id', 'categoria_id',
  ];

  public function catalogo()
  {
    return $this->belongsTo('App\Catalogo');
  }

  public function proveedor()
  {
    return $this->belongsTo('App\Proveedores');
  }

  public function categoria()
  {
    return $this->belongsTo('App\Categoria');
  }

  public function factura()
  {
    return $this->belongsTo('App\Factura');
  }

  public function salida()
  {
    return $this->belongsTo('App\Salida');
  }

  public function quoteers()
  {
    return $this->hasMany('App\Quoteers');
  }
}
