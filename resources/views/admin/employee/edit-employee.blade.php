@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Empleados
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Editar Empleado</li>
      </ol>
    </section>

    <section class="content container-fluid">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-edit"></i> Editar Empleado</h3>
        </div>
        {!! Form::model($employee, ['method' => 'POST','route' => ['employee.update', $employee->id], 'role' => 'form']) !!}
          {{ csrf_field() }}
          <div class="box-body">
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Nombre Completo:</label>
                <input type="text" name="name" value='{{ $employee->name }}' class="form-control">
                {!! $errors->first('name','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="telephone">Teléfono:</label>
                <input type="tel" name="phone" value='{{ $employee->phone }}' class="form-control">
                {!! $errors->first('phone','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">Correo:</label>
                <input type="email" name="email" value='{{ $employee->email }}' class="form-control">
                {!! $errors->first('email','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                <label for="user">Iniciales:</label>
                <input type="text" name="user" value='{{ $employee->user }}' class="form-control">
                {!! $errors->first('user','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-6" id="btn-password">
              <label for="password">Nueva Contraseña:</label>
              <input type="password" name="password" class="form-control" placeholder="nueva contraseña">
              <div id="btn-cancel" style="margin-top: 25px;">
                <button type="button" name="button" class="btn btn-default" onclick="changePass('cancel');">Cancelar</button>
              </div>
            </div>
            <div class="col-md-6" id="btn-change">
              <button type="button" name="button" class="btn btn-default" onclick="changePass('change');">Cambiar Contraseña</button>
            </div>
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('tipo') ? 'has-error' : '' }}">
                <label for="tipo">Tipo de Usuario:</label>
                <select name="tipo" class="form-control select2">
                  <option value="{{ $employee->role_id }}"><?php echo isset($employee->role->name) == 1 ? $employee->role->name : 'No asignado'; ?></option>
                  @foreach ($roles as $rol)
                    <option value="{{$rol->id}}">{{$rol->name}}</option>
                  @endforeach
                </select>
                {!! $errors->first('tipo','<span class="help-block">:message</span>')!!}
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-lg"></i> Guardar</button>
            <a href="{{ url('/admin/usuario') }}" class="btn btn-danger"><i class="fa fa-times-rectangle-o fa-lg"></i> Cancelar</a>
          </div>
        {!! Form::close() !!}
      </div>
    </section>

@endsection
