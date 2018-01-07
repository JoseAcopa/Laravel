<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suppliers;
use App\Http\Requests\CreateSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $suppliers = Suppliers::all();
      return view('admin.suppliers.suppliers', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.suppliers.add-suppliers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSupplierRequest $request)
    {
      $suppliers = new Suppliers;
      $suppliers->RFC = request('RFC');
      $suppliers->business = request('business');
      $suppliers->address = request('address');
      $suppliers->phone = request('phone');
      $suppliers->email = request('email');

      $suppliers->save();
      return redirect('admin/suppliers')->with('success','Proveedor '. $suppliers->business .' guardado correctamente');
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
      $supplier = Suppliers::find($id);
      return view('admin.suppliers.edit-suppliers', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupplierRequest $request, $id)
    {
      $newRFC = $request->input('RFC');
      $newBusiness = $request->input('business');
      $newAddress = $request->input('address');
      $newPhone = $request->input('phone');
      $newEmail = $request->input('email');

      $supplier = Suppliers::find($id);

      $supplier->RFC = $newRFC;
      $supplier->business = $newBusiness;
      $supplier->address = $newAddress;
      $supplier->phone = $newPhone;
      $supplier->email = $newEmail;
      $supplier->save();

      return redirect('admin/suppliers')->with('success','Proveedor '. $supplier->business .' actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Suppliers::find($id)->delete();
      return redirect('admin/suppliers')->with('success','Proveedor RX-'. $id .' eliminado correctamente');
    }
}
