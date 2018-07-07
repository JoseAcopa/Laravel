@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Roles y Permisos
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
          @can ('roles.create')
            <a href="{{ url('/admin/create-rol') }}" class="btn btn-default" ><i class="fa fa-plus"></i> Crear Rol</a>
          @endcan
        </div>

        <div class="box-body">
          <div class="col-md-10">
            <table id="Jtabla" class="table table-bordered table-hover dataTable">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Fecha</th>
                  <th>Acciones</th>
               </tr>
              </thead>
              <tbody>
                @foreach ($roles as $rol)
                  <tr>
                    <td>{{$rol->id}}</td>
                    <td>{{$rol->name}}</td>
                    <td>{{$rol->slug}}</td>
                    <td>{{str_limit($rol->created_at, 10)}}</td>
                    <td class="row-copasat">
                      @can ('roles.edit')
                        <a class="btn bg-navy" href="{{route('roles.edit',$rol->id)}}"><i class="fa fa-pencil-square-o"></i></a>
                      @endcan
                      @can ('roles.destroy')
                        <a type="submit" class="btn btn-danger" onclick="destroy('{{route('roles.destroy',$rol->id)}}');"><i class="fa fa-trash-o"></i></a>
                      @endcan
                    </td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Fecha</th>
                  <th>Acciones</th>
               </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </section>
    <script type="text/javascript">
      function destroy(url){
        event.preventDefault();
        console.log(url);
        swal({
          title: '¿Desea eliminar este Rol?',
          text: "¡No podra revertir esto!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3c8dbc',
          cancelButtonColor: '#dd4b39',
          confirmButtonText: 'Sí, eliminar!',
          cancelButtonText: 'No, cancelar!'
        }).then((res) => {
          if (res.value) {
            $.ajax({
              url: url,
              method: "POST",
              data: {
                  _token: "{{csrf_token()}}",
                  _method: "DELETE"
              },
              success: function(data){
                console.log(data);
                swal(
                  '¡Eliminado!',
                  'El registro ha sido eliminado.',
                  'success'
                ).then(()=>{
                  location.reload();
                })
              }
            })
          }else if (res.dismiss === "cancel") {
            swal(
              '¡Cancelado!',
              'La accion fue cancelada.',
              'error'
            )
          }
        })
      }
    </script>

@endsection
