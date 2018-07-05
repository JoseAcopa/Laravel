<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Count extends Model
{
  protected $table = 'counts';

  protected $fillable = [
      'count', 'fecha'
  ];

  protected $dates = [
      'created_at',
      'updated_at',
  ];
}
