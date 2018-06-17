<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correo extends Model
{
  protected $table = 'emails';

  protected $fillable = [
      'idUsuario', 'correo', 'nombre', 'status',
  ];

  protected $dates = [
      'created_at',
      'updated_at',
  ];
}
