@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Redactar mensaje
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Redactar mensaje</li>
      </ol>
    </section>

    <section class="content container-fluid">
      <div class="col-md-9">
        <form class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Redactar nuevo mensaje</h3>
          </div>
          <div class="box-body">
            <div class="form-group">
              <label for="">Para:</label>
              <input type="text" class="form-control" placeholder="para" value="{{$user->name}}" required>
            </div>
            <div class="form-group">
              <label for="">Correo:</label>
              <input type="text" class="form-control" placeholder="correo" value="{{$user->email}}" required>
            </div>
            <div class="form-group">
              <label for="">Nueva Contraseña:</label>
              <input type="text" class="form-control" placeholder="contraseña" required>
            </div>
          </div>
          <div class="box-footer">
            <div class="pull-right">
              <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Enviar</button>
            </div>
            <a href="{!! route('correo.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> cancelar</a>
          </div>
        </form>
      </div>
    </section>

@endsection
