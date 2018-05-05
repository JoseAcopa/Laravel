<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Permissions;
use App\Roles;
use App\Permissions_Roles;
use App\Http\Requests\CreateRolesRequest;

class RolesController extends Controller
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
      $roles = Roles::all();
      return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $permissions = Permissions::all();
      return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRolesRequest $request)
    {
      $roles = new Roles;
      $roles->name = request('name');
      $roles->slug = request('url');
      $special = request('special');
      $roles->special = count($special) > 0 ?request('special') : null;
      $roles->save();

      if (count($special) === 0) {
        $permission = request('permission_role');
        for ($i=0; $i < count($permission); $i++) {
          $permissionRoles = new Permissions_Roles;
          $permissionRoles->permission_id = $permission[$i];
          $permissionRoles->role_id = $roles->id;
          $permissionRoles->save();
        }
      }

      return redirect('admin/roles')->with('success','Rol guardado correctamente.')->withInput(request(['name', 'url']));
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
      $permissions = Permissions::all();
      return view('admin.roles.edit', compact('permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Roles::find($id)->delete();
      DB::table('permission_role')->where('role_id', $id)->delete();
      return redirect('admin/roles')->with('success','El rol ha sido eliminado correctamente');
    }
}
