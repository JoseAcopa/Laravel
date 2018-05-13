@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Administrador
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Registrar Roles</li>
      </ol>
    </section>

    <section class="content container-fluid">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-pencil"></i> Registrar Roles</h3>
        </div>
        <form role="form" method="POST" action="{{route('roles.store')}}">
          {{ csrf_field() }}
          <div class="box-body">
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Nombre del rol:</label>
                <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="rol">
                {!! $errors->first('name','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
                <label for="RFC">URL amigable:</label>
                <input type="text" value="{{ old('url') }}" name="url" class="form-control" placeholder="url amigable">
                {!! $errors->first('url','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-12">
              <h4>Permiso Especial</h4>
              <div class="checkbox">
                <label>
                  <input type="radio" name="special" value="all-access">
                  Accesso total
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="radio" name="special" value="no-access">
                  Ningun acceso
                </label>
              </div>
            </div>
            <div class="col-md-12">
              <h4>Lista Permisos</h4>
              @foreach ($permissions as $permission)
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="permission_role[]" value="{{$permission->id}}">
                    {{$permission->description}}
                  </label>
                </div>
              @endforeach
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-lg"></i> Guardar</button>
            <a href="{{url('admin/roles')}}" class="btn btn-danger"><i class="fa fa-times-rectangle-o fa-lg"></i> Cancelar</a>
          </div>
        </form>
      </div>
    </section>

@endsection
