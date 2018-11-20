@extends('layouts.app')

@section('content')

  <section class="content-header">
    <h1>
      Catálogo
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
      <li class="active">Catálogo</li>
    </ol>
  </section>

  <section class="content container-fluid">
    <div class="box">
      <div class="box-header">
        @can ('catalogo.create')
          <a href="{{route('catalogo.create')}}" class="btn btn-default" ><i class="fa fa-plus"></i> Nuevo Producto</a>
        @endcan
      </div>

      <div class="box-body">
        <table id="Jtabla" class="table table-bordered table-hover dataTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Tipo de Producto</th>
              <th>Iniciales</th>
              <th>Proveedor</th>
              <th>Unidad</th>
              <th>Descripción</th>
              <th>Acciones</th>
           </tr>
          </thead>
          <tbody>
            @foreach ($catalogos as $i => $producto)
              <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $producto->categoria->tipo }}</td>
                <td>{{ $producto->categoria->letra }}</td>
                <td>{{ $producto->proveedor->nombre_empresa }}</td>
                <td>{{ $producto->unidad_medida }}</td>
                <td>{{ str_limit($producto->descripcion, 50) }}</td>
                <td class="row-copasat">
                  @can ('catalogo.edit')
                    <a class="btn bg-navy" href="{{route('catalogo.edit',$producto->id)}}"><i class="fa fa-pencil-square-o"></i></a>
                  @endcan
                  @can ('catalogo.destroy')
                    <a type="submit" class="btn btn-danger" onclick="destroy('{{route('catalogo.destroy', $producto->id)}}');"><i class="fa fa-trash-o"></i></a>
                  @endcan
                </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Tipo de Producto</th>
              <th>Iniciales</th>
              <th>Proveedor</th>
              <th>Unidad</th>
              <th>Descripción</th>
              <th>Acciones</th>
           </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </section>

@endsection
