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
          @can ('salida.create')
            <a href="{{url('admin/crear-salida')}}" class="btn btn-default" ><i class="fa fa-plus"></i> Registrar Salida Productos</a>
          @endcan
        </div>

        <div class="box-body">
          <table id="Jtabla" class="table table-bordered table-hover dataTable">
            <thead>
              <tr>
                <th>#</th>
                <th>Tipo Producto</th>
                <th>N° de Producto</th>
                <th>Descripción del Producto</th>
                <th>Stock</th>
                <th>Fecha de Salida</th>
                <th>Cantidad de Salida</th>
                <th>Precio Salida</th>
                <th>Acciones</th>
             </tr>
            </thead>
            <tbody>
              @foreach ($checkouts as $i => $checkout)
                <tr>
                  <td>{{ $i+1 }}</td>
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
                  <td><span class="badge bg-yellow">{{ $checkout->quantity_output }}</span> {{ $checkout->unit }}</td>
                  <td>${{ $checkout->price_output }} {{ $checkout->coin->type }}</td>
                  <td class="row-copasat">
                    @can ('salida.show')
                      <a class="btn btn-default" href="{{url('/admin/ver-salida',$checkout->id)}}" alt="Ver mas.."><i class="fa fa-file-pdf-o"></i></a>
                    @endcan
                    @can ('salida.edit')
                      <a class="btn bg-navy" href="{{url('/admin/editar-salida',$checkout->id)}}"><i class="fa fa-pencil-square-o"></i></a>
                    @endcan
                    @can ('salida.destroy')
                      <a type="submit" class="btn btn-danger" onclick="destroy('{{route('salida.destroy', $checkout->id)}}');"><i class="fa fa-trash-o"></i></a>
                    @endcan
                  </td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>#</th>
                <th>Tipo Producto</th>
                <th>N° de Producto</th>
                <th>Descripción del Producto</th>
                <th>Stock</th>
                <th>Fecha de Salida</th>
                <th>Cantidad de Salida</th>
                <th>Precio Salida</th>
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
