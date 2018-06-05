<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
  protected $fillable = [
      'name', 'slug', 'description', 'special',
  ];

  public function users()
  {
    return $this->hasMany('App\User');
  }
}
