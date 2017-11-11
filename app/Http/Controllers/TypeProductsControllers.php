<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeProducts;

class TypeProductsControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typesProducts = TypeProducts::all();
        return view('admin.inventary.clasificationProduct',compact('typesProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return views('admin.inventary.clasificationProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typesProducts = new TypeProducts;
        $typesProducts->type = request('typeP');
        $typesProducts->letters = request('ini');
        $typesProducts->save();
        return redirect('admin/clasificationProduct')->with('success',$typesProducts->type,'Guardado correctamente');
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
        TypeProducts::find($id)->delete();
        return view('admin/clasificationProduct') -> with('sucess', 'value',$id,'Eliminado correctamente');
    }
}
