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
              <tr>
                <td class="mailbox-star"><i class="fa fa-star text-yellow"></i></td>
                <td class="mailbox-name"><a href="read-mail.html">Jose Acopa martinez</a></td>
                <td class="mailbox-subject">
                  <b>Restablecer Contraseña</b> Tratando de encontrar una solución a este problema
                </td>
                <td class="mailbox-attachment"></td>
                <td class="mailbox-date">5 mins ago</td>
                <td class="mailbox-date"><a href="#"><i class="fa fa-trash-o"></i></a></td>
              </tr>
              <tr>
                <td class="mailbox-star"><i class="fa fa-star-o text-yellow"></i></td>
                <td class="mailbox-name"><a href="read-mail.html">Nirandelli Patricio Mayo</a></td>
                <td class="mailbox-subject">
                  <b>Restablecer Contraseña</b> Tratando de encontrar una solución a este problema
                </td>
                <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                <td class="mailbox-date">28 mins ago</td>
                <td class="mailbox-date"><a href="#"><i class="fa fa-trash-o"></i></a></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="box-footer">
          <button type="button" class="btn btn-default btn-sm pull-right"><i class="fa fa-refresh"></i></button>
        </div>
      </div>
    </section>

@endsection
