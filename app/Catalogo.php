<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
  protected $table = 'catalogs';

  protected $fillable = [
    'sku', 'unidad_medida', 'descripcion', 'categoria_id', 'proveedor_id'
  ];

  public function categoria()
  {
    return $this->belongsTo('App\Categoria');
  }

  public function proveedor()
  {
    return $this->belongsTo('App\Proveedores');
  }

  public function productos()
  {
    return $this->hasMany('App\Producto');
  }
}
