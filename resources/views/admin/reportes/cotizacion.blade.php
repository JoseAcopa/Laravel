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
        <form style="width:60%; display: flex; flex-direction: row; justify-content: space-between;">
          <div class="form-group" style="width:80%;">
            <label>Buscar cotización por rango de fechas:</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="reservation">
            </div>
          </div>
          <div style="margin-top: 25px;">
            <button type="button" class="btn btn-default"><i class="fa fa-search"></i> Buscar</button>
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
            <li>
              <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
              <div class="mailbox-attachment-info">
                <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> JA-001-2018-SEAP.pdf</a>
                <span class="mailbox-attachment-size">
                  1,245 KB
                  <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                </span>
              </div>
            </li>
          </ul>
        </div>
        <div class="box-footer">
          <div class="pull-right">
            <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> ir a cotizaciones</button>
          </div>
        </div>
      </div>
    </section>

@endsection
