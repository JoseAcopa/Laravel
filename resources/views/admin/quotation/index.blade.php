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
        <form method="POST" action="{{route('cotizaciones.generar')}}" style="width:70%; display: flex; flex-direction: row; justify-content: space-between;">
          {{ csrf_field() }}
          <div class="form-group" style="width:80%;">
            <label>Buscar cotización por rango de fechas:</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="reservation" name="cotizacion">
            </div>
          </div>
          <div style="margin-top: 25px;">
            <button type="submit" class="btn btn-primary"><i class="fa fa-download"></i> Generar PDF</button>
          </div>
        </form>
      </div>
    </section>

    <section class="content container-fluid">
      @if ($message = Session::get('success'))
        <div class="box box-success box-solid">
          <div class="box-header">
            <h3 class="box-title">{{ $message }}</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
        </div>
      @endif

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
                <th>Empresa</th>
                <th>RFC</th>
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
                  <td>{{$cotizacion->nombre}}</td>
                  <td>{{$cotizacion->cliente->nombre_empresa}}</td>
                  <td>{{$cotizacion->cliente->RFC}}</td>
                  <td>${{$cotizacion->total}}</td>
                  <td class="row-copasat">
                    @can ('quotation.show')
                      <a class="btn btn-primary" href="{{route('cotizacion.show',$cotizacion->id)}}" alt="Ver mas.."><i class="fa fa-eye"></i></a>
                    @endcan
                    <a class="btn btn-default" target="_blank" href="{{url('/cotizacion',$cotizacion->id)}}"><i class="fa fa-file-pdf-o"></i></a>
                    @can ('quotation.destroy')
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
                <th>Empresa</th>
                <th>RFC</th>
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
