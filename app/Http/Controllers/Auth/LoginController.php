<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Auth;

class LoginController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest', ['only' => 'showLoginForm']);
  }

  public function showLoginForm()
  {
    return view('login');
  }

  public function login()
  {
    $credentials = $this->validate(request(), [
      'email' => 'email|required|string',
      'password' => 'required|string'
    ]);

    if (Auth::attempt($credentials)) {
      return redirect('admin/admin-welcome');
    }
    return back()->with('error','Los datos ingresados no existen en la base de datos')->withInput(request(['email']));
  }

  public function logout()
  {
    Auth::logout();

    return redirect('/')->with('success','La sesión se cerró con éxito');
  }
}
