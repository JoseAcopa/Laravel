@extends('layouts.app')

@section('content')

  <section class="content-header">
    <h1>
      Proveedores
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
      <li class="active">Proveedores</li>
    </ol>
  </section>

  <section class="content container-fluid">
    <div class="box">
      <div class="box-header">
        @can ('proveedor.create')
          <a href="{{route('proveedor.create')}}" class="btn btn-default" ><i class="fa fa-user-plus"></i> Nuevo Proveedor</a>
        @endcan
      </div>

      <div class="box-body">
        <table id="Jtabla" class="table table-bordered table-hover dataTable">
          <thead>
            <tr>
              <th>#</th>
              <th>RFC</th>
              <th>Nombre de la Empresa</th>
              <th>Dirección</th>
              <th>Teléfono</th>
              <th>E-mail</th>
              <th>Acciones</th>
           </tr>
          </thead>
          <tbody>
            @foreach ($proveedores as $key => $proveedor)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $proveedor->rfc }}</td>
                <td>{{ str_limit($proveedor->nombre_empresa, 30) }}</td>
                <td>{{ str_limit($proveedor->direccion, 50) }}</td>
                <td>{{ $proveedor->telefono }}</td>
                <td>{{ $proveedor->correo }}</td>
                <td class="row-copasat">
                  @can ('proveedor.edit')
                    <a class="btn bg-navy" href="{{route('proveedor.edit', $proveedor->id)}}"><i class="fa fa-pencil-square-o"></i></a>
                  @endcan
                  @can ('proveedor.destroy')
                    <a type="submit" class="btn btn-danger" onclick="destroy('{{route('proveedor.destroy', $proveedor->id)}}');"><i class="fa fa-trash-o"></i></a>
                  @endcan
                </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>#</th>
              <th>RFC</th>
              <th>Nombre de la Empresa</th>
              <th>Dirección</th>
              <th>Teléfono</th>
              <th>E-mail</th>
              <th>Acciones</th>
           </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </section>

@endsection
