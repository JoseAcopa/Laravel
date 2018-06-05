@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Administrador
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Inventario</li>
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
          <a href="{{url('admin/add-product')}}" class="btn btn-default" ><i class="fa fa-plus"></i> Registrar Productos</a>
        </div>

        <div class="box-body">
          <table id="Jtabla" class="table table-bordered table-hover dataTable">
            <thead>
              <tr class="active">
                <th>Acciones</th>
                <th>Tipo Producto</th>
                <th>N° de Producto</th>
                <th>Descripción del Producto</th>
                <th>Fecha de Entrada</th>
                <th>Stock</th>
                <th>Precio Lista</th>
                <th>Costo</th>
             </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
                <tr>
                  <td class="row-copasat">
                    <a class="btn btn-primary" href="{{url('/admin/show-product',$product->id)}}" alt="Ver mas.."><i class="fa fa-eye"></i></a>
                    <a class="btn btn-info" href="{{url('/admin/edit-product',$product->id)}}"><i class="fa fa-pencil-square-o"></i></a>
                    <a type="submit" class="btn btn-danger" onclick="destroy('{{route('inventary.destroy', $product->id)}}');"><i class="fa fa-trash-o"></i></a>
                  </td>
                  <td>{{ $product->category->type }}</td>
                  <td>{{ $product->initials }}-{{ $product->id }}</td>
                  <td>{{ str_limit($product->description, 50) }}</td>
                  <td>{{ $product->checkin }}</td>
                  <td>
                    <span <?php echo (int)$product->stock <= 20 ? "class='badge bg-red'" : "class='badge bg-green'"; ?>>
                      {{$product->stock}}
                    </span>
                    {{$product->unit}}
                  </td>
                  <td>{{ $product->priceList }} {{ $product->coin->type }}</td>
                  <td>{{ $product->cost }} {{ $product->coin->type }}</td>
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
