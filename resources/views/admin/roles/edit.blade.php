@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Roles y Permisos
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Editar Rol</li>
      </ol>
    </section>

    <section class="content container-fluid">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-edit"></i> Editar Rol</h3>
        {!! Form::model($role, ['method' => 'POST','route' => ['roles.update', $role->id]]) !!}
          {{ csrf_field() }}

          @include('admin.roles.form')

        {!! Form::close() !!}
      </div>
    </section>

@endsection
