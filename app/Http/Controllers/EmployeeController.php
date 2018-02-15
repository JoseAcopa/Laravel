<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Employee;
use App\User;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;

class EmployeeController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
   public function index()
   {
     $employees = User::all();
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
   public function store(CreateUserRequest $request)
   {
     $employee = new User;
     $employee->name = request('name');
     $employee->user = request('user');
     $employee->email = request('email');
     $employee->phone = request('phone');
     $employee->password = bcrypt(request('password'));

     $employee->save();
     return redirect('admin/employee')->with('success','Empleado '. $employee->name .' Guardado correctamente')->withInput(request(['email', 'name', 'user', 'phone']));
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
     $employee = User::find($id);
     return view('admin.employee.edit-employee', compact('employee'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
   public function update(UpdateUserRequest $request, $id)
   {
     $newName = $request->input('name');
     $newPhone = $request->input('phone');
     $newUser = $request->input('user');
     $newPassword = $request->input('password');

     $employee = User::find($id);

     $employee->name = $newName;
     $employee->phone = $newPhone;
     $employee->user = $newUser;
     $employee->password = $newPassword;
     $employee->save();

     return redirect('admin/employee')->with('success','Empleado RX-'. $id .' actualizado correctamente');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
   public function destroy($id)
   {
     User::find($id)->delete();
     return redirect('admin/employee')->with('success','Empleado RX-'. $id .' eliminado correctamente');
   }
}
