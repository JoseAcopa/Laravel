@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Cotización
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Ver Cotización</li>
      </ol>
    </section>

    <section class="content container-fluid">
      <section class="invoice">

        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <i class="fa fa-check"></i> Cotización
              <small class="pull-right">Fecha: {{ date('d/m/Y') }}</small>
            </h2>
          </div>
        </div>

        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            De:
            <address>
              <strong>{{$ver_cotizacion->user->name}}</strong><br>
              {{$ver_cotizacion->user->user}}<br>
              Telefono: {{$ver_cotizacion->user->phone}}<br>
              Correo: {{$ver_cotizacion->user->email}}
            </address>
          </div>

          <div class="col-sm-4 invoice-col">
            Para:
            <address>
              <strong>{{$ver_cotizacion->cliente->nombre_empresa}}</strong><br>
              {{$ver_cotizacion->cliente->direccion}}<br>
              Telefono: {{$ver_cotizacion->cliente->telefono}}<br>
              Correo: {{$ver_cotizacion->cliente->correo}}
            </address>
          </div>

          <div class="col-sm-4 invoice-col">
            <b>Cotización:<br> {{$ver_cotizacion->numero_cotizacion}}</b><br>
            <b>Licitación:</b> {{$ver_cotizacion->licitacion}}<br>
            <b>Nombre:</b> {{$ver_cotizacion->nombre_empresa}}<br>
            <b>Puesto:</b> {{$ver_cotizacion->puesto}}
          </div>
        </div>
        <hr>
        <p class="lead">Fecha cotizada {{$ver_cotizacion->fecha}}</p>
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>PARTIDA</th>
                  <th>DESCRIPCIÓN</th>
                  <th>CANTIDAD</th>
                  <th>U.MEDIDA</th>
                  <th>P.UNITARIO</th>
                  <th>IMPORTE</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($productos_cotizados as $i => $producto)
                  <tr>
                    <td>{{$i+1}}</td>
                    <td class="tjustify">
                      {{strtoupper($producto->catalogo->descripcion)}}
                    </td>
                    <td>{{$producto->cantidad}}</td>
                    <td>Pieza</td>
                    <td>${{$producto->precio}}</td>
                    <td>${{$producto->subtotal}}</td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>PARTIDA</th>
                  <th>DESCRIPCIÓN</th>
                  <th>CANTIDAD</th>
                  <th>U.MEDIDA</th>
                  <th>P.UNITARIO</th>
                  <th>IMPORTE</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-xs-6 pull-right">
            <div class="table-responsive">
              <table class="table">
                <tbody>
                <tr>
                  <th>Total:</th>
                  <td>${{$ver_cotizacion->total}}</td>
                </tr>
              </tbody></table>
            </div>
          </div>
        </div>

        <div class="row no-print">
          <div class="col-xs-12">
            <a class="btn btn-primary pull-right"><i class="fa fa-copy"></i> Copiar Cotización</a>
            <a href="{{ url('/cotizacion') }}" class="btn btn-default pull-left"><i class="fa fa-reply fa-lg"></i> Regresar</a>
          </div>
        </div>
      </section>
    </section>

@endsection
