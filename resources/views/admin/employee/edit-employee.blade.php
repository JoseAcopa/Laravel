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
            <div class="col-md-6" id="btn-password">
              <div class="form-group">
                <label for="password">Nueva Contraseña:</label>
                <input type="password" name="password" class="form-control" placeholder="nueva contraseña">
              </div>
            </div>
            <div class="col-md-6" id="btn-change">
              <button type="button" name="button" class="btn btn-default" onclick="changePass('change');">Cambiar Contraseña</button>
            </div>
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('tipo') ? 'has-error' : '' }}">
                <label for="user">Tipo de Usuario:</label>
                <select name="tipo" class="form-control" onchange="tipoUser(this);">
                  <option value="{{ $employee->tipo }}">{{ $employee->tipo }}</option>
                  <option value="admin">admin</option>
                  <option value="user">user</option>
                </select>
                {!! $errors->first('tipo','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-12" id="btn-cancel">
              <button type="button" name="button" class="btn btn-default" onclick="changePass('cancel');">Cancelar</button>
            </div>
            <div class="col-md-6" id="permisos-accesos">
              <h3>Acceso al sistema</h3>
              <hr>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="accesos[]" value="clientes" {{$employee->cliente ? "checked" : ""}}>
                  Clientes
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="accesos[]" value="proveedores" {{$employee->proveedores ? "checked" : ""}}>
                  Proveedores
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="accesos[]" value="empleados" {{$employee->empleados ? "checked" : ""}}>
                  Empleados
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="accesos[]" value="inventario" {{$employee->inventario ? "checked" : ""}}>
                  Inventario
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="accesos[]" value="cotizacion" {{$employee->cotizacion ? "checked" : ""}}>
                  Cotización
                </label>
              </div>
            </div>
            <div class="col-md-6" id="accesos-permisos">
              <h3>Permisos</h3>
              <hr>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="permisos[]" value="create" {{$employee->create ? "checked" : ""}}>
                  Crear
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="permisos[]" value="read" {{$employee->read ? "checked" : ""}}>
                  Leer
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="permisos[]" value="update" {{$employee->update ? "checked" : ""}}>
                  Editar
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="permisos[]" value="delete" {{$employee->delete ? "checked" : ""}}>
                  Eliminar
                </label>
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
    <script type="text/javascript">
      function tipoUser(val) {
        if (val.value === 'user') {
          document.getElementById('permisos-accesos').style.display = "block"
          document.getElementById('accesos-permisos').style.display = "block"
        }else {
          document.getElementById('permisos-accesos').style.display = "none"
          document.getElementById('accesos-permisos').style.display = "none"
        }
      }
    </script>
    <script type="text/javascript">
      function changePass(value) {
        if (value === "change") {
          console.log(value);
          document.getElementById('btn-password').style.display = "block"
          document.getElementById('btn-cancel').style.display = "block"
          document.getElementById('btn-change').style.display = "none"
        }else {
          document.getElementById('btn-password').style.display = "none"
          document.getElementById('btn-cancel').style.display = "none"
          document.getElementById('btn-change').style.display = "block"
        }
      }
    </script>

@endsection
