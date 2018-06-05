@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Administrador
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Empleados</li>
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
          @can ('employee.create')
            <a href="{{ url('/admin/create-usuario') }}" class="btn btn-default" ><i class="fa fa-user-plus"></i> Registrar Empleados</a>
          @endcan
        </div>

        <div class="box-body">
          <table id="Jtabla" class="table table-bordered table-hover dataTable">
            <thead>
              <tr class="active">
                <th>#</th>
                <th>Acciones</th>
                <th>Nombre completo</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Iniciales</th>
                <th>Tipo de Usuario</th>
             </tr>
            </thead>
            <tbody>
              @foreach ($employees as $employee)
                <tr>
                  <td>{{ $employee->id }}</td>
                  <td class="row-copasat">
                    @can ('employee.update')
                      <a class="btn btn-info" href="{{ route('employee.edit',$employee->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                    @endcan
                    @can ('employee.destroy')
                      <a type="submit" class="btn btn-danger" onclick="destroy('{{route('employee.destroy', $employee->id)}}');"><i class="fa fa-trash-o"></i></a>
                    @endcan
                  </td>
                  <td>{{ $employee->name }}</td>
                  <td>{{ $employee->email }}</td>
                  <td>{{ $employee->phone }}</td>
                  <td>{{ $employee->user }}</td>
                  <td><?php echo isset($employee->role->name) == 1 ? $employee->role->name : 'No asignado'; ?></td>
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
          title: '¿Desea eliminar este empleado?',
          text: "¡No podra revertir esto!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3c8dbc',
          cancelButtonColor: '#dd4b39',
          confirmButtonText: 'Sí, eliminarlo!',
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
