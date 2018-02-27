@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Administrador
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
        {!! Form::model($employee, ['method' => 'PATCH','route' => ['employee.update', $employee->id], 'role' => 'form']) !!}
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
                <label for="user">Usuario:</label>
                <input type="text" name="user" value='{{ $employee->user }}' class="form-control">
                {!! $errors->first('user','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">Contraseña:</label>
                <input type="password" name="password" value='{{ $employee->password }}' class="form-control">
                {!! $errors->first('password','<span class="help-block">:message</span>')!!}
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-lg"></i> Guardar</button>
            <a href="{{ url('/admin/employee') }}" class="btn btn-danger"><i class="fa fa-times-rectangle-o fa-lg"></i> Cancelar</a>
          </div>
        {!! Form::close() !!}
      </div>
    </section>

@endsection
