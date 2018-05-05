@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Administrador
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Roles</li>
      </ol>
    </section>

    <section class="content container-fluid">
      @if ($message = Session::get('success'))
        <div class="box box-success box-solid">
          <div class="box-header">
            <h3 class="box-title"><i class="icon fa fa-check"></i> {{ $message }}</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
        </div>
      @endif

      <div class="box">
        <div class="box-header">
          <a href="{{ url('/admin/create-rol') }}" class="btn btn-success" ><i class="fa fa-user-plus"></i> Crear Rol</a>
        </div>

        <div class="box-body">
          <table id="Jtabla" class="table table-bordered table-striped">
            <thead>
              <tr class="success">
                <th>#</th>
                <th>Acciones</th>
                <th>Nombre</th>
                <th>Slug</th>
                <th>Fecha</th>
             </tr>
            </thead>
            <tbody>
              @foreach ($roles as $rol)
                <tr>
                  <td>{{$rol->id}}</td>
                  <td class="row-copasat">
                      <a class="btn btn-info" href="{{ url('/admin/edit-rol',$rol->id) }}"><i class="fa fa-pencil-square-o"></i> Editar</a>
                      <a type="submit" class="btn btn-danger" onclick="destroy('{{route('roles.destroy',$rol->id)}}');"><i class="fa fa-trash-o"></i> Eliminar</a>
                  </td>
                  <td>{{$rol->name}}</td>
                  <td>{{$rol->slug}}</td>
                  <td>{{str_limit($rol->created_at, 10)}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <script type="text/javascript">
      function destroy(url){
        event.preventDefault();
        swal({
          title: '¿Desea eliminar este Rol?',
          text: "¡No podra revertir esto!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3c8dbc',
          cancelButtonColor: '#dd4b39',
          confirmButtonText: 'Sí, eliminarlo!',
          cancelButtonText: 'No, cancelar!'
        }).then(() => {
          $.ajax({
            url: url,
            method: "POST",
            data: {
                _token: "{{csrf_token()}}",
                _method: "DELETE"
            },
            success: function(data){
              location.reload();
            }
          })
        })

      }
    </script>

@endsection
