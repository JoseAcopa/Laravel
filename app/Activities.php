<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
  protected $fillable = [
    'nombre', 'titulo', 'status'
  ];
}
