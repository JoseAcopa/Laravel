@extends('layouts.app')

@section('content')

  <section class="content-header">
    <h1>
      Productos
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
      <li class="active">Inventario</li>
    </ol>
  </section>

  <section class="content container-fluid">
    <div class="box">
      <div class="box-header">
        @can ('inventario.create')
          <a href="{{route('producto.create')}}" class="btn btn-default" ><i class="fa fa-plus"></i> Nuevo Producto</a>
        @endcan
      </div>

      <div class="box-body">
        <table id="Jtabla" class="table table-bordered table-hover dataTable">
          <thead>
            <tr>
              <th style="width: 10px;">#</th>
              <th>N° de Producto</th>
              <th>Producto</th>
              <th>Descripción</th>
              <th>Fecha de Entrada</th>
              <th>Stock</th>
              <th>Precio Lista</th>
              <th>Costo</th>
              <th style="width: 110px;">Acciones</th>
           </tr>
          </thead>
          <tbody>
            @foreach ($productos as $i => $producto)
              <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $producto->catalogo->sku }}</td>
                <td>{{ $producto->categoria->tipo }}</td>
                <td>{{ str_limit($producto->catalogo->descripcion, 50) }}</td>
                <td>{{ $producto->fecha_entrada }}</td>
                <td>
                  <span <?php echo (int)$producto->stock <= 20 ? "class='badge bg-red'" : "class='badge bg-green'"; ?>>
                    {{$producto->stock}}
                  </span>
                  {{$producto->catalogo->unidad_medida}}
                </td>
                <td>${{ $producto->precio_lista }} {{ $producto->moneda }}</td>
                <td>${{ $producto->costo }} {{ $producto->moneda }}</td>
                <td class="row-copasat">
                  @can ('producto.show')
                    <a class="btn btn-primary" alt="Ver mas.." data-toggle="modal" data-target="#myModal" onclick="verProducto('{{route('producto.show',$producto->id)}}');"><i class="fa fa-eye"></i></a>
                  @endcan
                  @can ('producto.edit')
                    <a class="btn bg-navy" href="{{route('producto.edit',$producto->id)}}"><i class="fa fa-pencil-square-o"></i></a>
                  @endcan
                  @can ('producto.destroy')
                    <a type="submit" class="btn btn-danger" onclick="destroy('{{route('producto.destroy', $producto->id)}}');"><i class="fa fa-trash-o"></i></a>
                  @endcan
                </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>#</th>
              <th>N° de Producto</th>
              <th>Producto</th>
              <th>Descripción</th>
              <th>Fecha de Entrada</th>
              <th>Stock</th>
              <th>Precio Lista</th>
              <th>Costo</th>
              <th>Acciones</th>
           </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </section>
  <script type="text/javascript">
    function verProducto(url) {
      $.ajax({
        url: url,
        type: 'GET',
        success: (res)=>{
          $('#tipo_producto').text(res.tipo_producto)
          $('#sku').text(res.sku)
          $('#unidad_medida').text(res.unidad_medida)
          $('#categoria').text(res.categoria)
          $('#descripcion').text(res.descripcion)
          $('#proveedor').text(res.proveedor)
          $('#fecha_entrada').text(res.fecha_entrada)
          $('#stock').text(res.stock)
          $('#precio_lista').text('$'+res.precio_lista)
          $('#costo').text('$'+res.costo)
          $('#precio_venta1').text('$'+res.precio_venta1)
          $('#precio_venta2').text('$'+res.precio_venta2)
          $('#precio_venta3').text('$'+res.precio_venta3)
          $('#precio_venta4').text('$'+res.precio_venta4)
          $('#precio_venta5').text('$'+res.precio_venta5)
          $('#moneda').text(res.moneda)
        }
      })
    }
  </script>

  @include('admin.productos.show')

@endsection
