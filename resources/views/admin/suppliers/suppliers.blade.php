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
          @can ('suppliers.create')
            <a href="{{ url('/admin/create-proveedor') }}" class="btn btn-default" ><i class="fa fa-user-plus"></i> Registrar Proveedores</a>
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
              @foreach ($suppliers as $i => $supplier)
                <tr>
                  <td>{{ $i+1 }}</td>
                  <td>{{ $supplier->RFC }}</td>
                  <td>{{ str_limit($supplier->business, 30) }}</td>
                  <td>{{ str_limit($supplier->address, 50) }}</td>
                  <td>{{ $supplier->phone }}</td>
                  <td>{{ $supplier->email }}</td>
                  <td class="row-copasat">
                    @can ('suppliers.edit')
                      <a class="btn bg-navy" href="{{ url('admin/edit-proveedor',$supplier->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                    @endcan
                    @can ('suppliers.destroy')
                      <a type="submit" class="btn btn-danger" onclick="destroy('{{route('suppliers.destroy', $supplier->id)}}');"><i class="fa fa-trash-o"></i></a>
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
    <script type="text/javascript">
      function destroy(url){
        event.preventDefault();
        swal({
          title: '¿Desea eliminar este proveedor?',
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
