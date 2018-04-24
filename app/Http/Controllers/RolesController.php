<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permissions;
use App\Roles;
use App\Permissions_Roles;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('admin.roles.index');
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
    public function store(Request $request)
    {
      $roles = new Roles;
      $roles->name = request('nombre');
      $roles->slug = request('url');

      $permission_roleLength = request('permission_role');
      if (count($permission_roleLength) != 0) {
        for ($i=0; $i < count($roles); $i++) {
          $permission_role = new Permissions_Roles;
          $permission_role->permission_id = request('permission_role')[$i];
          $permission_role->user_id = request('permission_role')[$i];
        }
      }else {
        $roles->special = request('special')[0];
      }

      // $roles->save();
      return count($roles);
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
        //
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
        //
    }
}
