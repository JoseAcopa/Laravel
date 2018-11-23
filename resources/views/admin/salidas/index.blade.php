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
    <div class="box">
      <div class="box-header">
        @can ('salida.create')
          <a href="{{route('salida.create')}}" class="btn btn-default" ><i class="fa fa-plus"></i> Nueva Salida</a>
        @endcan
      </div>

      <div class="box-body">
        <table id="Jtabla" class="table table-bordered table-hover dataTable">
          <thead>
            <tr>
              <th style="width: 10px;">#</th>
              <th>Tipo Producto</th>
              <th>SKU</th>
              <th>Descripción</th>
              <th>Stock</th>
              <th>Fecha de Salida</th>
              <th>Cantidad de Salida</th>
              <th>Precio Salida</th>
              <th style="width: 110px;">Acciones</th>
           </tr>
          </thead>
          <tbody>
            @foreach ($salidas as $i => $salida)
              <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $salida->categoria->tipo }}</td>
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
                  @can ('salida.show')
                    <a class="btn btn-default" href="{{route('salida.show',$salida->id)}}" alt="Ver mas.."><i class="fa fa-file-pdf-o"></i></a>
                  @endcan
                  @can ('salida.edit')
                    <a class="btn bg-navy" href="{{route('salida.edit',$salida->id)}}"><i class="fa fa-pencil-square-o"></i></a>
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
              <th>Tipo Producto</th>
              <th>SKU</th>
              <th>Descripción</th>
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

@endsection
