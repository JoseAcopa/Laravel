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
              <strong>{{$quotations->user->name}}</strong><br>
              {{$quotations->user->user}}<br>
              Telefono: {{$quotations->user->phone}}<br>
              Correo: {{$quotations->user->email}}
            </address>
          </div>

          <div class="col-sm-4 invoice-col">
            Para:
            <address>
              <strong>{{$quotations->cliente->business}}</strong><br>
              {{$quotations->cliente->address}}<br>
              Telefono: {{$quotations->cliente->phone}}<br>
              Correo: {{$quotations->cliente->email}}
            </address>
          </div>

          <div class="col-sm-4 invoice-col">
            <b>Cotización:<br> {{$quotations->cotizacion}}</b><br>
            <br>
            <b>Licitación:</b> {{$quotations->licitacion}}<br>
            <b>Nombre:</b> {{$quotations->nombre}}<br>
            <b>Puesto:</b> {{$quotations->puesto}}
          </div>
        </div>
        <hr>
        <p class="lead">Fecha cotizada {{$quotations->fecha}}</p>
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
                @foreach ($quoteers as $i=>$quoteer)
                  <tr>
                    <td>{{$i+1}}</td>
                    <td class="tjustify">
                      {{strtoupper($quoteer->producto->description)}}
                    </td>
                    <td>{{$quoteer->cantidad}}</td>
                    <td>Pieza</td>
                    <td>${{substr($quoteer->precio, 1, -3)}}</td>
                    <td>${{substr($quoteer->subtotal, 1, -3)}}</td>
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
                  <td>${{$quotations->total}}</td>
                </tr>
              </tbody></table>
            </div>
          </div>
        </div>

        <div class="row no-print">
          <div class="col-xs-12">
            <a href="{{url('admin/cotizacion')}}" class="btn btn-default pull-right"><i class="fa fa-reply fa-lg"></i> Regresar</a>
            <a href="{{url('/cotizacion',$quotations->id)}}" class="btn btn-primary pull-right" style="margin-right: 5px;" target="_blank">
              <i class="fa fa-file-pdf-o"></i> Generar PDF
            </a>
          </div>
        </div>
      </section>
    </section>

@endsection
