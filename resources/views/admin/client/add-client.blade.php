@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Administrador
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Registrar Clientes</li>
      </ol>
    </section>

    <section class="content container-fluid">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-user-plus"></i> Registrar Clientes</h3>
        </div>
        <form role="form" method="POST" action="{{route('client.store')}}">
          {{ csrf_field() }}
          <div class="box-body">
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('business') ? 'has-error' : '' }}">
                <label for="business">Nombre de la Empresa:</label>
                <input type="text" name="business" value="{{ old('business') }}" class="form-control" placeholder="Nombre de la empresa">
                {!! $errors->first('business','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('RFC') ? 'has-error' : '' }}">
                <label for="RFC">RFC:</label>
                <input type="text" name="RFC" value="{{ old('RFC') }}" class="form-control" placeholder="RFC">
                {!! $errors->first('RFC','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('siglas') ? 'has-error' : '' }}">
                <label for="siglas">Siglas:</label>
                <input type="text" name="siglas" value="{{ old('siglas') }}" class="form-control" placeholder="siglas">
                {!! $errors->first('siglas','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="E-mail">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone">Teléfono:</label>
                <input type="tel" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Teléfono">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">Dirección:</label>
                <textarea type="text" rows="6" class="form-control" name="address" placeholder="Dirección">{{ old('address') }}</textarea>
                {!! $errors->first('address','<span class="help-block">:message</span>')!!}
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-lg"></i> Guardar</button>
            <a href="{{ url('/admin/clientes') }}" class="btn btn-danger"><i class="fa fa-times-rectangle-o fa-lg"></i> Cancelar</a>
          </div>
        </form>
      </div>
    </section>

@endsection
