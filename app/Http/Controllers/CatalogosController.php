<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catalogo;
use App\Proveedores;
use App\Categoria;
use App\Http\Requests\CrearCatalogosRequest;

class CatalogosController extends Controller
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
      $catalogos = Catalogo::with(['proveedor', 'categoria'])->get();
      return view('admin.catalogos.index', compact('catalogos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categorias = Categoria::all()->pluck('tipo', 'id');
      $proveedores = Proveedores::all()->pluck('nombre_empresa', 'id');
      $todas_categorias = Categoria::all();
      return view('admin.catalogos.create', compact('proveedores', 'categorias', 'todas_categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrearCatalogosRequest $request)
    {
      $producto = Catalogo::create($request->all());
      return redirect()->route('catalogo.edit', $producto->id)->with('success','Datos guardados correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $catalogo = Catalogo::find($id);
      $categorias = Categoria::all()->pluck('tipo', 'id');
      $proveedores = Proveedores::all()->pluck('nombre_empresa', 'id');
      $todas_categorias = Categoria::all();
      $categoriasLetra = Categoria::find($catalogo->categoria_id);
      return view('admin.catalogos.edit', compact('proveedores', 'categorias', 'todas_categorias', 'catalogo', 'categoriasLetra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Catalogo $producto)
    {
      $producto->update($request->all());
      return redirect()->route('catalogo.edit', $producto->id)->with('success','Datos actualizados correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Catalogo::find($id)->delete();
      return ['success' => true];
    }
}
