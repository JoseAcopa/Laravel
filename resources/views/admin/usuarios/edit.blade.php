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
    @if ($message = Session::get('success'))
      <div class="box box-success box-solid">
        <div class="box-header">
          <h3 class="box-title"><i class="icon fa fa-check"></i> {{ $message }}</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
      </div>
    @endif

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-edit"></i> Editar Empleado</h3>
      </div>
      {!! Form::model($editarUsuario, ['method' => 'PUT','route' => ['usuario.update', $editarUsuario->id], 'role' => 'form']) !!}
        {{ csrf_field() }}

        @include('admin.usuarios.form')

      {!! Form::close() !!}
    </div>
  </section>

@endsection
