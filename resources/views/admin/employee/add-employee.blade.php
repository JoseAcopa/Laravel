@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Administrador
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Registrar Empleados</li>
      </ol>
    </section>

    <section class="content container-fluid">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-user-plus"></i> Registrar Empleados</h3>
        </div>
        <form role="form" method="POST" action="{{route('employee.store')}}">
          {{ csrf_field() }}
          <div class="box-body">
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Nombre Completo:</label>
                <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control" placeholder="Nombre Completo">
                {!! $errors->first('name','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone">Teléfono:</label>
                <input type="tel" name="phone" value="{{ old('phone') }}" id="phone" class="form-control" placeholder="Teléfono">
                {!! $errors->first('phone','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">Correo:</label>
                <input type="email" name="email" value="{{ old('email') }}" id="email" class="form-control" placeholder="Email">
                {!! $errors->first('email','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                <label for="user">Iniciales:</label>
                <input type="text" name="user" value="{{ old('user') }}" id="user" class="form-control" placeholder="Iniciales de su nombre completo, Ejemplo: Admin Test = AT">
                {!! $errors->first('user','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
                {!! $errors->first('password','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('tipo') ? 'has-error' : '' }}">
                <label for="user">Tipo de Usuario:</label>
                <select name="tipo" class="form-control select2">
                  <option value=""> Seleccione tipo de usuario</option>
                  @foreach ($roles as $rol)
                    <option value="{{$rol->id}}">{{$rol->name}}</option>
                  @endforeach
                </select>
                {!! $errors->first('tipo','<span class="help-block">:message</span>')!!}
              </div>
            </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-lg"></i> Guardar</button>
            <a href="{{ url('/admin/usuario') }}" class="btn btn-danger"><i class="fa fa-times-rectangle-o fa-lg"></i> Cancelar</a>
          </div>
        </form>
      </div>
    </section>

@endsection
