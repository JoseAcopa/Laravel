@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Cotización
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Cotización</li>
      </ol>
      <div style="margin-top: 10px;">
        {!! Form::open(['method' => 'POST','route' => 'cotizaciones.generar']) !!}
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-3">
              <label for="">Clientes:</label>
              {!! Form::select('cliente', $clientes,  null, ['class' => 'form-control', 'placeholder' => 'Seleccione']); !!}
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
          @can ('cotizacion.create')
            <a href="{{route('cotizacion.create')}}" class="btn btn-default" ><i class="fa fa-plus"></i> Nueva cotización</a>
          @endcan
        </div>

        <div class="box-body">
          <table id="Jtabla" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>No. de Cotización</th>
                <th>Empleados</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Total</th>
                <th>Acciones</th>
             </tr>
            </thead>
            <tbody>
              @foreach ($cotizaciones as $key => $cotizacion)
                <tr>
                  <td>{{$key + 1}}</td>
                  <td><a href="{{route('cotizacion.edit', $cotizacion->id)}}">{{$cotizacion->numero_cotizacion}}</a></td>
                  <td>{{$cotizacion->user->name}}</td>
                  <td>{{$cotizacion->fecha}}</td>
                  <td>{{$cotizacion->cliente->nombre_empresa}}</td>
                  {{-- <td>${{round($cotizacion->total, 2)}}</td> --}}
                  <td>{{$cotizacion->total}}</td>
                  <td class="row-copasat">
                    @can ('cotizacion.show')
                      <a class="btn btn-primary" href="{{route('cotizacion.show',$cotizacion->id)}}" alt="Ver mas.."><i class="fa fa-eye"></i></a>
                    @endcan
                    <a class="btn btn-default" target="_blank" href="{{route('cotizacion.reporte-cotizacion',$cotizacion->id)}}"><i class="fa fa-file-pdf-o"></i></a>
                    @can ('cotizacion.destroy')
                      <a type="submit" class="btn btn-danger" onclick="destroy('{{route('cotizacion.destroy', $cotizacion->id)}}');"><i class="fa fa-trash-o"></i></a>
                    @endcan
                  </td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>#</th>
                <th>No. de Cotización</th>
                <th>Empleados</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Total</th>
                <th>Acciones</th>
             </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </section>
    <script type="text/javascript">
      sessionStorage.clear();
    </script>

@endsection
