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
        <form method="POST" action="{{route('cotizaciones.generar')}}" style="width:60%; display: flex; flex-direction: row; justify-content: space-between;">
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
            @foreach ($cotizacion as $item)
              <li>
                <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                <div class="mailbox-attachment-info">
                  <a target="_blank" href="{{url('/cotizacion',$item->id)}}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{$item->cotizacion}}.pdf</a>
                  <span class="mailbox-attachment-size">
                    {{$item->user->name}}
                    <a target="_blank" href="{{ url('descargar-cotizacion',$item->id) }}" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                  </span>
                </div>
              </li>
            @endforeach
          </ul>
          <div class="pull-right">
            {{ $cotizacion->links() }}
          </div>
        </div>
        <div class="box-footer">
          <div class="pull-right">
            <a href="{{ route('cotizacion.index') }}" type="button" class="btn btn-default"><i class="fa fa-reply"></i> ir a cotizaciones</a>
          </div>
        </div>
      </div>
    </section>

@endsection
