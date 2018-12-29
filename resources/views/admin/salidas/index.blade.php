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

    <div style="margin-top: 10px;">
      {!! Form::open(['method' => 'POST','route' => 'salida.buscar-rango']) !!}
        {{ csrf_field() }}
        <div class="row">
          <div class="col-md-3">
            <label for="">Proveedores:</label>
            {!! Form::select('proveedor', $proveedores,  null, ['class' => 'form-control', 'placeholder' => 'Seleccione']); !!}
          </div>
          <div class="col-md-7">
            <div class="form-group">
              <label>Buscar reportes por rango de fechas:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                {{ Form::text('rango', null, ['class' => 'form-control pull-right"', 'id' => "reservation"]) }}
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <div style="margin-top: 25px;">
              <button type="submit" class="btn btn-primary"><i class="fa fa-file-pdf-o"></i> Generar PDF</button>
            </div>
          </div>
        </div>
      {!! Form::close() !!}
    </div>
  </section>

  <section class="content container-fluid">
    <div class="box">
      <div class="box-header">
        @can ('salida.create')
          <a href="{{route('salida.create')}}" class="btn btn-default" ><i class="fa fa-plus"></i> Nueva Salida</a>
        @endcan
        <a href="{{route('reporte.salida-general')}}" target="_blank" class="btn btn-default pull-right"><i class="fa fa-file-pdf-o"></i> Generar PDF</a>
      </div>

      <div class="box-body">
        <table id="Jtabla" class="table table-bordered table-hover dataTable">
          <thead>
            <tr>
              <th style="width: 10px;">#</th>
              <th>Producto</th>
              <th>SKU</th>
              <th>Descripción</th>
              <th>Stock</th>
              <th>Fecha salida</th>
              <th>Cantidad de Salida</th>
              <th>Precio Salida</th>
              <th style="width: 110px;">Acciones</th>
           </tr>
          </thead>
          <tbody>
            @foreach ($salidas as $i => $salida)
              <tr>
                <td>{{ $i+1 }}</td>
                @can ('salida.edit')
                  <td><a href="{{route('salida.edit',$salida->id)}}">{{ $salida->categoria->tipo }}</a></td>
                @endcan
                @cannot ('salida.edit')
                  <td>{{ $salida->categoria->tipo }}</td>
                @endcannot
                <td>{{ $salida->catalogo->sku }}</td>
                <td>{{ str_limit($salida->catalogo->descripcion, 50) }}</td>
                <td>
                  <span  <?php echo (int)$salida->producto->stock <= 20 ? "class='badge bg-red'" : "class='badge bg-green'"; ?>>
                    {{$salida->producto->stock}}
                  </span>
                  {{ $salida->catalogo->unidad_medida }}
                </td>
                <td>{{ $salida->fecha_salida }}</td>
                <td><span class="badge bg-yellow">{{ $salida->cantidad_salida }}</span> {{ $salida->catalogo->unidad_medida }}</td>
                <td>${{ $salida->precio_venta }} {{ $salida->moneda }}</td>
                <td class="row-copasat">
                  <a class="btn btn-default" target="_blank" href="{{route('reporte.salida',$salida->id)}}" alt="Ver mas.."><i class="fa fa-file-pdf-o"></i></a>
                  @can ('salida.show')
                    <a class="btn bg-navy"  data-toggle="modal" data-target="#myModal" onclick="verSalida('{{route('salida.show',$salida->id)}}');"><i class="fa fa-eye"></i></a>
                  @endcan
                  @can ('salida.destroy')
                    <a type="submit" class="btn btn-danger" onclick="destroy('{{route('salida.destroy', $salida->id)}}');"><i class="fa fa-trash-o"></i></a>
                  @endcan
                </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Producto</th>
              <th>SKU</th>
              <th>Descripción</th>
              <th>Stock</th>
              <th>Fecha salida</th>
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
    function verSalida(url) {
      $.ajax({
        url: url,
        type: 'GET',
        success: (res)=>{
          $('#tipo_producto').text(res.categoria.tipo)
          $('#sku').text(res.sku)
          $('#numero_factura').text(res.numero_factura)
          $('#categoria').text(res.categoria.categorias)
          $('#unidad_medida').text(res.unidad_medida)
          $('#proveedor').text(res.proveedor.nombre_empresa)
          $('#descripcion').text(res.descripcion)
          $('#fecha_salida').text(res.fecha_salida)
          $('#stock').text(res.stock)
          $('#cantidad_salida').text(res.cantidad_salida)
          $('#precio_lista').text(res.precio_lista)
          $('#costo').text(res.costo)
          $('#precio_venta').text(res.precio_venta)
          $('#moneda').text(res.moneda)
        }
      })
    }
  </script>

  @include('admin.salidas.show')

@endsection
