@extends('layouts.app')

@section('content')
    <section class="content-header">
      <h1>
        Reportes
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Reportes</li>
      </ol>

      <div style="margin-top: 10px;">
        <form method="POST" action="{{route('facturas.generar')}}" style="width:60%; display: flex; flex-direction: row; justify-content: space-between;">
          {{ csrf_field() }}
          <div class="form-group" style="width:80%;">
            <label>Buscar facturas por rango de fechas:</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="reservation" name="rango">
            </div>
          </div>
          <div style="margin-top: 25px;">
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Buscar</button>
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

      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Reportes encontrados</h3>
        </div>

        <div class="box-body">
          <ul class="mailbox-attachments clearfix">
            @foreach ($reportes as $reporte)
              <li>
                <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                <div class="mailbox-attachment-info">
                  <a target="_blank" href="{{ url('factura',$reporte->id) }}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{$reporte->category->type}}.pdf</a>
                  <span class="mailbox-attachment-size">
                    {{$reporte->initials}}
                    <a target="_blank" href="{{ url('descargar',$reporte->id) }}" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                  </span>
                </div>
              </li>
            @endforeach
          </ul>
          <div class="pull-right">
            {{ $reportes->links() }}
          </div>
        </div>
        <div class="box-footer">
          <div class="pull-right">
            <a href="{{ route('factura.index') }}" type="button" class="btn btn-default"><i class="fa fa-reply"></i> ir a facturas</a>
          </div>
        </div>
      </div>
    </section>

@endsection
