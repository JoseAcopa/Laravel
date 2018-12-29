@extends('layouts.app')

@section('content')

  <section class="content-header">
    <h1>
      Empleados
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
      <li class="active">Empleados</li>
    </ol>
  </section>

  <section class="content container-fluid">
    <div class="box">
      <div class="box-header">
        @can ('usuario.create')
          <a href="{{ url('/crear-usuario') }}" class="btn btn-default" ><i class="fa fa-user-plus"></i> Nuevo Empleado</a>
        @endcan
      </div>

      <div class="box-body">
        <table id="Jtabla" class="table table-bordered table-hover dataTable">
          <thead>
            <tr>
              <th style="width: 10px;">#</th>
              <th>Nombre completo</th>
              <th>Correo</th>
              <th>Teléfono</th>
              <th>Iniciales</th>
              <th>Tipo de Usuario</th>
              <th style="width: 60px;">Acciones</th>
           </tr>
          </thead>
          <tbody>
            @foreach ($usuarios as $i => $usuario)
              <tr>
                <td>{{ $i+1}}</td>
                @can ('usuario.edit')
                  <td><a href="{{ route('usuario.edit',$usuario->id) }}">{{ $usuario->name }}</a></td>
                @endcan
                @cannot ('usuario.edit')
                  <td>{{ $usuario->name }}</td>
                @endcannot
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->phone }}</td>
                <td>{{ $usuario->user }}</td>
                <td><?php echo isset($usuario->role->name) == 1 ? $usuario->role->name : 'No asignado'; ?></td>
                <td class="row-copasat">
                  @can ('usuario.edit')
                    <a class="btn bg-navy" href="{{ route('usuario.edit',$usuario->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                  @endcan
                  @can ('usuario.destroy')
                    <a type="submit" class="btn btn-danger" onclick="destroy('{{route('usuario.destroy', $usuario->id)}}');"><i class="fa fa-trash-o"></i></a>
                  @endcan
                </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Nombre completo</th>
              <th>Correo</th>
              <th>Teléfono</th>
              <th>Iniciales</th>
              <th>Tipo de Usuario</th>
              <th>Acciones</th>
           </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </section>

@endsection
