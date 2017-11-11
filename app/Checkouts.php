<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkouts extends Model
{
  // protected $table = 'checkouts';
  // protected $id = "id";

  // public $timestamps = false;
  protected $fillable = [
      'nInvoice', 'TProducts', 'letters', 'provider', 'description',
      'unit', 'checkout', 'cost', 'price', 'quantityCO', 'merma', 'stock',
      'totalAmount', 'totalMult',
  ];
}
