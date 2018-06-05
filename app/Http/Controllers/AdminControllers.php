<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Catalog;
use App\Clients;
use App\Suppliers;
use Carbon\Carbon;

class AdminControllers extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $users = count(User::all());
    $customers = count(Clients::all());
    $providers = count(Suppliers::all());
    $date = Carbon::now();
    $date = $date->format('d/m/Y');
    $quotations = count(DB::table('quotations')->where('fecha', $date)->get());

    return view('admin.admin', compact('users', 'quotations', 'customers', 'providers'));
  }
}
