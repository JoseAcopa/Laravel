<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Roles;
use App\Roles_Users;
use App\Http\Requests\CrearUsuariosRequest;
use App\Http\Requests\EditarUsuariosRequest;

class UsuariosController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $usuarios = User::with(['role'])->get();
      return view('admin.usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = Roles::all()->pluck('name', 'id');
      return view('admin.usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrearUsuariosRequest $request)
    {
      $usuario = User::create($request->all());

      // creamos acceso a los roles
      $role_user = new Roles_Users;
      $role_user->role_id = $request->role_id;
      $role_user->user_id = $usuario->id;
      $role_user->save();

      return redirect()->route('usuario.edit',$usuario->id)->with('success','Datos guardado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $editarUsuario = User::find($id);
      $roles = Roles::all()->pluck('name', 'id');
      return view('admin.usuarios.edit', compact('editarUsuario', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditarUsuariosRequest $request,User $usuario)
    {
      $usuario->update($request->all());

      $role_id = $request->role_id;

      // validamos si el rol ya no existe
      $rol = Roles::find($role_id);
      if ($rol != null) {
        // en caso de eliminar el rol, validamos si existe lo editamos, si no lo creamos
        $roleUser = Roles_Users::where('user_id', $usuario->id)->first();
        if ($roleUser != null) {
          $roleUser->role_id = $role_id;
          $roleUser->user_id = $usuario->id;
          $roleUser->save();
        } else {
          $createRoleUser = new Roles_Users;
          $createRoleUser->role_id = $role_id;
          $createRoleUser->user_id = $usuario->id;
          $createRoleUser->save();
        }
      }
      return redirect()->route('usuario.edit',$usuario->id)->with('success','Datos actualizados correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      User::find($id)->delete();
      Roles_Users::where('user_id', $id)->delete();
      return ['success' => true];
    }
}
