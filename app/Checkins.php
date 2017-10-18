<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkins extends Model
{
  // protected $table = 'checkins';
  // protected $id = "id";

  // public $timestamps = false;

  protected $fillable = [
      'nInvoice', 'nProducts', 'provider', 'description',
      'checkin', 'quantity', 'stock', 'unit', 'cost', 'price1',
      'price2', 'price3', 'price4',
  ];
}
