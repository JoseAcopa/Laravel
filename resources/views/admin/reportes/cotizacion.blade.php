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
          <h3 class="box-title">{{count($cotizaciones_pdf)}} Reportes encontrados</h3>
        </div>

        <div class="box-body">
          <ul class="mailbox-attachments clearfix">
            @foreach ($cotizaciones_pdf as $item)
              <li>
                <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                <div class="mailbox-attachment-info">
                  <a target="_blank" href="{{route('cotizacion.reporte-cotizacion',$item->id)}}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{$item->numero_cotizacion}}.pdf</a>
                  <span class="mailbox-attachment-size">
                    {{$item->user->name}}
                    <a target="_blank" href="{{ url('descargar-cotizacion',$item->id) }}" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                  </span>
                </div>
              </li>
            @endforeach
          </ul>
          {{-- <div class="pull-right">
            {{ $cotizacion->links() }}
          </div> --}}
        </div>
        <div class="box-footer">
          <div class="pull-right">
            <a href="{{ route('cotizacion.index') }}" type="button" class="btn btn-default"><i class="fa fa-reply"></i> Regresar</a>
          </div>
        </div>
      </div>
    </section>

@endsection
