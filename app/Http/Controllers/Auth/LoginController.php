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
      'user' => 'required|string',
      'password' => 'required|string'
    ]);

    $response = Auth::attempt($credentials, true);

    if ($response) {
      return redirect('admin/admin-welcome');
    }else {
      return back()
        ->withErrors(['user' => 'Usuario no coincide en nuestro registro'])
        ->withInput(request(['user']));
    }
  }
}
