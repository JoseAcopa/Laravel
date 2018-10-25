@extends('layouts.app')

@section('content')

  <section class="content-header">
    <h1>
      Clientes
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
      <li class="active">Clientes</li>
    </ol>
  </section>

  <section class="content container-fluid">
    <div class="box">
      <div class="box-header">
        @can ('cliente.create')
          <a href="{{route('cliente.create')}}" class="btn btn-default" ><i class="fa fa-user-plus"></i> Nuevo Cliente</a>
        @endcan
      </div>

      <div class="box-body">
        <table id="Jtabla" class="table table-bordered table-hover dataTable">
          <thead>
            <tr>
              <th>#</th>
              <th>RFC</th>
              <th>Nombre de la Empresa</th>
              <th>Siglas</th>
              <th>Dirección</th>
              <th>Teléfono</th>
              <th>E-mail</th>
              <th>Acciones</th>
           </tr>
          </thead>
          <tbody>
            @foreach ($clientes as $key => $cliente)
              <tr>
                <td>{{ $key+1 }}</td>
                <td><a href="{{route('cliente.edit', $cliente->id)}}">{{ $cliente->rfc }}</a></td>
                <td>{{ str_limit($cliente->nombre_empresa, 30) }}</td>
                <td>{{ $cliente->siglas }}</td>
                <td>{{ str_limit($cliente->direccion, 50) }}</td>
                <td>{{ $cliente->telefono }}</td>
                <td>{{ $cliente->correo }}</td>
                <td class="row-copasat">
                  @can ('cliente.edit')
                    <a class="btn bg-navy" href="{{route('cliente.edit', $cliente->id)}}"><i class="fa fa-pencil-square-o"></i></a>
                  @endcan
                  @can ('cliente.destroy')
                    <a type="submit" class="btn btn-danger" onclick="destroy('{{route('cliente.destroy', $cliente->id)}}');"><i class="fa fa-trash-o"></i></a>
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
              <th>Siglas</th>
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
