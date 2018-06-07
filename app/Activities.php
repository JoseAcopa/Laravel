<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Activities extends Model
{
  protected $fillable = [
    'nombre', 'titulo', 'status',
  ];

  protected $dates = [
      'created_at',
      'updated_at',
  ];

}
