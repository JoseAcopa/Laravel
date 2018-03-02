<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Employee;
use App\User;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;

class EmployeeController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
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
     $employee->tipo = request('tipo');
     if (request('tipo') === 'admin') {
       $employee->cliente = true;
       $employee->proveedores = true;
       $employee->empleados = true;
       $employee->inventario = true;
       $employee->cotizacion = true;
       $employee->create = true;
       $employee->read = true;
       $employee->update = true;
       $employee->delete = true;
     }else {
       if (count(request()->accesos) > 0) {
         $employee->cliente = in_array("clientes", request()->accesos) ? true : false;
         $employee->proveedores = in_array("proveedores", request()->accesos) ? true : false;
         $employee->empleados = in_array("empleados", request()->accesos) ? true : false;
         $employee->inventario = in_array("inventario", request()->accesos) ? true : false;
         $employee->cotizacion = in_array("cotizacion", request()->accesos) ? true : false;
       }else {
         $employee->cliente = false;
         $employee->proveedores = false;
         $employee->empleados = false;
         $employee->inventario = false;
         $employee->cotizacion = false;
       }
       if (count(request()->permisos) > 0) {
         $employee->create = in_array("create", request()->permisos) ? true : false;
         $employee->read = in_array("read", request()->permisos) ? true : false;
         $employee->update = in_array("update", request()->permisos) ? true : false;
         $employee->delete = in_array("delete", request()->permisos) ? true : false;
       }else {
         $employee->create = false;
         $employee->read = false;
         $employee->update = false;
         $employee->delete = false;
       }
     }

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
     $newUser = $request->input('user');
     $newEmail = $request->input('email');
     $newPhone = $request->input('phone');
     $newPassword = bcrypt($request->input('password'));
     $newTipo = $request->input('tipo');
     $newAccesso = $request->input('accesos');
     $newPermisos = $request->input('permisos');


     $employee = User::find($id);

     $employee->name = $newName;
     $employee->user = $newUser;
     $employee->email = $newEmail;
     $employee->phone = $newPhone;
     if (strlen($newPassword) > 0) {
       $employee->password = $newPassword;
     }
     $employee->tipo = $newTipo;
     if ($newTipo === 'admin') {
       $employee->cliente = true;
       $employee->proveedores = true;
       $employee->empleados = true;
       $employee->inventario = true;
       $employee->cotizacion = true;
       $employee->create = true;
       $employee->read = true;
       $employee->update = true;
       $employee->delete = true;
     }else {
       if (count($newAccesso) > 0) {
         $employee->cliente = in_array("clientes", $newAccesso) ? true : false;
         $employee->proveedores = in_array("proveedores", $newAccesso) ? true : false;
         $employee->empleados = in_array("empleados", $newAccesso) ? true : false;
         $employee->inventario = in_array("inventario", $newAccesso) ? true : false;
         $employee->cotizacion = in_array("cotizacion", $newAccesso) ? true : false;
       }else {
         $employee->cliente = false;
         $employee->proveedores = false;
         $employee->empleados = false;
         $employee->inventario = false;
         $employee->cotizacion = false;
       }
       if (count($newPermisos) > 0) {
         $employee->create = in_array("create", $newPermisos) ? true : false;
         $employee->read = in_array("read", $newPermisos) ? true : false;
         $employee->update = in_array("update", $newPermisos) ? true : false;
         $employee->delete = in_array("delete", $newPermisos) ? true : false;
       }else {
         $employee->create = false;
         $employee->read = false;
         $employee->update = false;
         $employee->delete = false;
       }
     }

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
