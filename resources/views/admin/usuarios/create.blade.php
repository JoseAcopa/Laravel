@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Empleados
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
        {!! Form::open(['method' => 'POST','route' => 'usuario.store']) !!}
          {{ csrf_field() }}

          @include('admin.usuarios.form')

        {!! Form::close() !!}
      </div>
    </section>

@endsection
