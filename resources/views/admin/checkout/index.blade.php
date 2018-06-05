@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Salidas
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Salida de Productos</li>
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
          @can ('product-output.create')
            <a href="{{url('admin/crear-salida')}}" class="btn btn-default" ><i class="fa fa-plus"></i> Registrar Salida Productos</a>
          @endcan
        </div>

        <div class="box-body">
          <table id="Jtabla" class="table table-bordered table-hover dataTable">
            <thead>
              <tr class="active">
                <th>Acciones</th>
                <th>Tipo Producto</th>
                <th>N° de Producto</th>
                <th>Descripción del Producto</th>
                <th>Stock</th>
                <th>Fecha de Salida</th>
                <th>Cantidad de Salida</th>
                <th>Precio Salida</th>
             </tr>
            </thead>
            <tbody>
              @foreach ($checkouts as $checkout)
                <tr>
                  <td class="row-copasat">
                    @can ('product-output.show')
                      <a class="btn btn-primary" href="{{url('/admin/ver-salida',$checkout->id)}}" alt="Ver mas.."><i class="fa fa-eye"></i></a>
                    @endcan
                    @can ('product-output.edit')
                      <a class="btn btn-info" href="{{url('/admin/editar-salida',$checkout->id)}}"><i class="fa fa-pencil-square-o"></i></a>
                    @endcan
                    @can ('product-output.destroy')
                      <a type="submit" class="btn btn-danger" onclick="destroy('{{route('salida.destroy', $checkout->id)}}');"><i class="fa fa-trash-o"></i></a>
                    @endcan
                  </td>
                  <td>{{ $checkout->category->type }}</td>
                  <td>{{ $checkout->initials }}</td>
                  <td>{{ str_limit($checkout->description, 50) }}</td>
                  <td>
                    <span  <?php echo (int)$checkout->stock <= 20 ? "class='badge bg-red'" : "class='badge bg-green'"; ?>>
                      {{$checkout->stock}}
                    </span>
                    {{ $checkout->unit }}
                  </td>
                  <td>{{ $checkout->date_out }}</td>
                  <td>{{ $checkout->quantity_output }} {{ $checkout->unit }}</td>
                  <td>{{ $checkout->price_output }} {{ $checkout->coin->type }}</td>
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
          title: '¿Desea eliminar este producto?',
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
