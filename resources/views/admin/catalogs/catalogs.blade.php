@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Catálogo
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Catálogo</li>
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
          @can ('catalogo.create')
            <a href="{{url('admin/create-producto-catalogo')}}" class="btn btn-default" ><i class="fa fa-plus"></i> Alta de Productos</a>
          @endcan
        </div>

        <div class="box-body">
          <table id="Jtabla" class="table table-bordered table-hover dataTable">
            <thead>
              <tr class="active">
                <th>Acciones</th>
                <th>Tipo de Producto</th>
                <th>Iniciales</th>
                <th>Proveedor</th>
                <th>Unidad</th>
                <th>Descripción</th>
             </tr>
            </thead>
            <tbody>
              @foreach ($catalog as $product)
                <tr>
                  <td class="row-copasat">
                    @can ('catalogo.edit')
                      <a class="btn btn-info" href="{{url('/admin/editar-producto-catalogo',$product->id)}}"><i class="fa fa-pencil-square-o"></i></a>
                    @endcan
                    @can ('catalogo.destroy')
                      <a type="submit" class="btn btn-danger" onclick="destroy('{{route('catalogo.destroy', $product->id)}}');"><i class="fa fa-trash-o"></i></a>
                    @endcan
                  </td>
                  <td>{{ $product->category->type }}</td>
                  <td>{{ $product->letter }}</td>
                  <td>{{ $product->supplier->business }}</td>
                  <td>{{ $product->unit }}</td>
                  <td>{{ str_limit($product->description, 50) }}</td>
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
