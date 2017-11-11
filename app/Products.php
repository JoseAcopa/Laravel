<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
  // protected $table = 'products';
  // protected $id = "id";

  // public $timestamps = false;

  protected $fillable = [
      'nInvoice', 'TProducts', 'provider', 'checkin', 'quantity',
      'unit', 'cost','description', 'initials', 'stock',
  ];
}
