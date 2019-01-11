<?php

namespace App;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user', 'email', 'phone', 'password', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function quotations()
    {
      return $this->hasMany('App\Quotations');
    }

    public function role()
    {
      return $this->belongsTo('App\Roles');
    }

    // public function setPasswordAttribute($value)
    // {
    //   if (!empty($value)) {
    //     $this->attributes['password'] = bcrypt($value);
    //   }
    // }
}
