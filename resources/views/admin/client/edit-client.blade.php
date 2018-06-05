@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Administrador
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Editar Cliente</li>
      </ol>
    </section>

    <section class="content container-fluid">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-edit"></i> Editar Cliente</h3>
        </div>
        {!! Form::model($client, ['method' => 'PUT','route' => ['client.update', $client->id], 'role' => 'form']) !!}
          {{ csrf_field() }}
          <div class="box-body">
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('business') ? 'has-error' : '' }}">
                <label for="business">Nombre de la Empresa:</label>
                <input type="text" name="business" class="form-control" value='{{ $client->business }}'>
                {!! $errors->first('business','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('RFC') ? 'has-error' : '' }}">
                <label for="RFC">RFC:</label>
                <input type="text" name="RFC" class="form-control" value='{{ $client->RFC }}'>
                {!! $errors->first('RFC','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone">Teléfono:</label>
                <input type="tel" name="phone" class="form-control" value='{{ $client->phone }}'>
              </div>
              <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" name="email" class="form-control" value='{{ $client->email }}'>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('siglas') ? 'has-error' : '' }}">
                <label for="siglas">Siglas:</label>
                <input type="text" name="siglas" value="{{ $client->siglas }}" class="form-control" placeholder="siglas">
                {!! $errors->first('siglas','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">Dirección:</label>
                <textarea type="text" rows="6" class="form-control" name="address">{{ $client->address }}</textarea>
                {!! $errors->first('address','<span class="help-block">:message</span>')!!}
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-lg"></i> Guardar</button>
            <a href="{{ url('/admin/clientes') }}" class="btn btn-danger"><i class="fa fa-times-rectangle-o fa-lg"></i> Cancelar</a>
          </div>
        {!! Form::close() !!}
      </div>
    </section>

@endsection
