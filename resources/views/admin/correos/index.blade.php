@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Restablecer Contraseña
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">restablecer contraseña</li>
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

      <div class="col-md-9">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Inbox</h3>
          </div>
          <div class="box-body">
            <table id="correos" class="table table-hover table-striped">
              <thead>
                <tr style="display:none;">
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($correos as $correo)
                  <tr>
                    <td class="mailbox-star"><i class="fa fa-star text-yellow"></i></td>
                    <td class="mailbox-name"><a href="{!! route('correo.send', $correo->idUsuario) !!}">{{$correo->nombre}}</a></td>
                    <td class="mailbox-subject">
                      <b>Restablecer Contraseña</b>
                    </td>
                    <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                    <td class="mailbox-date"><i class="fa fa-clock-o"></i> {{ Carbon\Carbon::parse($correo->created_at)->diffForHumans() }}</td>
                    <td class="mailbox-date"><a href="{!! route('correo.destroy', $correo->id) !!}"><i class="fa fa-trash-o" style="color: #dd4b39;"></i></a></td>
                  </tr>
                @endforeach
                {{-- <tr>
                  <td class="mailbox-star"><i class="fa fa-star-o text-yellow"></i></td>
                  <td class="mailbox-name">Nirandelli Patricio Mayo</td>
                  <td class="mailbox-subject">
                    Restablecer Contraseña
                  </td>
                  <td class="mailbox-attachment"></td>
                  <td class="mailbox-date">28 mins ago</td>
                  <td class="mailbox-date"><a href="#"><i class="fa fa-trash-o" style="color: #dd4b39;"></i></a></td>
                </tr> --}}
              </tbody>
            </table>
          </div>
          <div class="box-footer">
            <button type="button" class="btn btn-default btn-sm pull-right"><i class="fa fa-refresh"></i></button>
          </div>
        </div>
      </div>
    </section>

@endsection
