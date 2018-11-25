@extends('layouts.app')

@section('content')

  <section class="content-header">
    <h1>
      Reportes de ingresos
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
      <li class="active">Reportes de ingresos</li>
    </ol>

    <div style="margin-top: 10px;">
      {!! Form::open(['method' => 'POST','route' => 'reporte.buscar-rango']) !!}
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
        <h2 class="box-title"><i class="fa fa-book"></i> Reportes de Ingreso</h2>
        <a type="button" class="btn btn-default pull-right" target="_blank" href="{{ route('reporte.general') }}"><i class="fa fa-file-pdf-o"></i> Generar Reportes</a>
      </div>

      <div class="box-body">
        <table id="Jtabla" class="table table-bordered table-hover dataTable">
          <thead>
            <tr>
              <th>#</th>
              <th>N° de Factura</th>
              <th>Categoria</th>
              <th>Proveedor</th>
              <th>Fecha Entrada</th>
              <th>Cantidad</th>
              <th>Precio Lista</th>
              <th>Costo</th>
              <th>Acciones</th>
           </tr>
          </thead>
          <tbody>
            @foreach ($facturas as $i => $factura)
              <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $factura->numero_factura }}</td>
                <td>{{ $factura->categoria->categorias }}</td>
                <td>{{ $factura->proveedor->nombre_empresa }}</td>
                <td>{{ $factura->fecha_entrada }}</td>
                <td>
                  {{ $factura->cantidad_entrada }}
                  @if ($factura->catalogo)
                    {{ $factura->catalogo->unidad_medida }}
                  @endif
                </td>
                <td>${{ $factura->precio_lista }} {{ $factura->moneda }}</td>
                <td>${{ $factura->costo }} {{ $factura->moneda }}</td>
                <td class="row-copasat">
                  <a class="btn btn-primary" target="_blank" href="{{ route('reporte.generate',$factura->id) }}"><i class="fa fa-file-pdf-o"></i></a>
                  @can ('factura.destroy')
                    <a type="submit" class="btn btn-danger" onclick="destroy('{{route('factura.destroy', $factura->id)}}');"><i class="fa fa-trash-o"></i></a>
                  @endcan
                </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>#</th>
              <th>N° de Factura</th>
              <th>Categoria</th>
              <th>Proveedor</th>
              <th>Fecha Entrada</th>
              <th>Cantidad</th>
              <th>Precio Lista</th>
              <th>Costo</th>
              <th>Acciones</th>
           </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </section>

@endsection
