<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

  public function login(Request $request)
  {
    $this->validate($request, [
      'user' => 'required|string',
      'password' => 'required|string'
    ]);

    $credentials = [
      'user'=>$request->user,
      'password'=>$request->password
    ];

    if (Auth::attempt($credentials)) {
      return redirect('admin/admin-welcome');
    }
    return back()
      ->withErrors(['user' => 'Usuario no coincide en nuestro registro'])
      ->withInput(request(['user']));
  }

  public function logOut()
  {
    Auth::logout();

    return view('login')->with('error_message', 'Logged out correctly');
  }
}
