<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;

class EmployeeController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
   public function index()
   {
     $employees = Employee::all();
     return view('admin.employee.employee', compact('employees'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
   public function create()
   {
     return view('admin.employee.add-employee');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
   public function store()
   {
     $employee = new Employee;
     $employee->nombre_Empleado = request('nombre_Empleado');
     $employee->telefono = request('telefono');
     $employee->usuario = request('usuario');
     $employee->contrasena = request('contrasena');

     $employee->save();

     return redirect('admin/add-employee');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
   public function show($id)
   {

   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
   public function edit($id)
   {
     $employee = Employee::find($id);
     return view('admin.employee.edit-employee', compact('employee'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
   public function update($id)
   {
       //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
   public function destroy($id)
   {
     $employee = Employee::find($id);
     $employee->delete();

    //  Session::flash('message', 'Successfully deleted the nerd!');
     return Redirect::to('admin.employee.employee');
   }
}
