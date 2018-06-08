<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Permissions;
// use App\Roles;
// use App\Permissions_Roles;
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
      $roles = Role::all();
      return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $permissions = Permission::all();
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
      // $roles = new Roles;
      // $roles->name = request('name');
      // $roles->slug = request('url');
      // $special = request('special');
      // $roles->special = count($special) > 0 ? request('special') : null;
      // $roles->save();
      //
      // if (count($special) === 0) {
      //   $permission = request('permission_role');
      //   for ($i=0; $i < count($permission); $i++) {
      //     $permissionRoles = new Permissions_Roles;
      //     $permissionRoles->permission_id = $permission[$i];
      //     $permissionRoles->role_id = $roles->id;
      //     $permissionRoles->save();
      //   }
      // }
      $role = Role::create($request->all());
      $role->permissions()->sync($request->get('permissions'));
      return redirect()->route('roles.edit', $role->id)->with('success','Rol guardado correctamente.');
      // return redirect('admin/roles')->with('success','Rol guardado correctamente.')->withInput(request(['name']));
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
    public function edit(Role $role)
    {
      $permissions = Permission::get();
      return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
      // actuaizamos rol
      $role->update($request->all());

      // actual actuaizamos permisos
      $role->permissions()->sync($request->get('permissions'));
      return redirect()->route('roles.edit', $role->id)->with('success','El role ha sido editado correctamente');
      // return redirect('admin/roles')->with('success','El rol ha sido editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Role::find($id)->delete();
      // DB::table('permission_role')->where('role_id', $id)->delete();
      return redirect('admin/roles')->with('success','El rol ha sido eliminado correctamente');
    }
}
