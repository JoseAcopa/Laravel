<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotations extends Model
{
  // protected $table = 'quotations';
  // protected $id = "id";

  // public $timestamps = false;

  protected $fillable = [
      'folio', 'RFC', 'name', 'date', 'job', 'nClient',
      'direction', 'mail', 'company', 'nBidding', 'description',
       'total', 'IVA', 'totalAmount'
  ];
}
