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
          <a href="{{ url('/admin/create-cliente') }}" class="btn btn-default" ><i class="fa fa-user-plus"></i> Registrar Clientes</a>
        </div>

        <div class="box-body">
          <table id="Jtabla" class="table table-bordered table-hover dataTable">
            <thead>
              <tr class="active">
                <th>Acciones</th>
                <th>RFC</th>
                <th>Nombre de la Empresa</th>
                <th>Siglas</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>E-mail</th>
             </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                  <tr>
                    <td class="row-copasat">
                      <a class="btn btn-info" href="{{ url('admin/edit-cliente',$client->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                      <a type="submit" class="btn btn-danger" onclick="destroy('{{route('client.destroy', $client->id)}}');"><i class="fa fa-trash-o"></i></a>
                    </td>
                    <td>{{ $client->RFC }}</td>
                    <td>{{ str_limit($client->business, 30) }}</td>
                    <td>{{ $client->siglas }}</td>
                    <td>{{ str_limit($client->address, 50) }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->email }}</td>
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
          title: '¿Desea eliminar este cliente?',
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
