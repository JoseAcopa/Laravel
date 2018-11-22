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
      <form method="POST" action="{{route('facturas.generar')}}" style="width:70%; display: flex; flex-direction: row; justify-content: space-between;">
        {{ csrf_field() }}
        <div class="form-group" style="width:80%;">
          <label>Buscar reportes por rango de fechas:</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right" id="reservation" name="rango">
          </div>
        </div>
        <div style="margin-top: 25px;">
          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar Reportes</button>
        </div>
      </form>
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
                <td>{{ $factura->precio_lista }} {{ $factura->moneda }}</td>
                <td>{{ $factura->costo }} {{ $factura->moneda }}</td>
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
