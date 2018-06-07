<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Catalog;
use App\Clients;
use App\Suppliers;
use Carbon\Carbon;
use App\Activities;

class AdminControllers extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    Carbon::setLocale('es');
    $users = count(User::all());
    $customers = count(Clients::all());
    $providers = count(Suppliers::all());
    $date = Carbon::now();
    $date = $date->format('d/m/Y');
    $user = Auth::user();
    $quotations = count(DB::table('quotations')->where('fecha', $date)->get());
    $activities = DB::table('activities')->where('nombre', $user->name)->paginate(6);
    return view('admin.admin', compact('users', 'quotations', 'customers', 'providers', 'activities'));
  }

  public function store(Request $request)
  {
    $user = Auth::user();
    $activity = new Activities;

    $activity->nombre = $user->name;
    $activity->titulo = $request->titulo;
    $activity->status = false;
    $activity->save();
    return redirect('/admin/admin-welcome');
  }

  public function destroy($id)
  {
    Activities::find($id)->delete();
    return redirect('/admin/admin-welcome');
  }

  public function edit($id)
  {
    $activity = Activities::find($id);
    return $activity;
  }

  public function update(Request $request)
  {
    $user = Auth::user();
    $id = $request->idActividad;
    $newTitulo = $request->tituloEdit;
    $newStatus = $request->check == "false" ? true : false;

    $activity = Activities::find($id);

    $activity->nombre = $user->name;;
    $activity->titulo = $newTitulo;
    $activity->status = $newStatus;
    $activity->save();
    return redirect('/admin/admin-welcome');
  }

}
