@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Roles y Permisos
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
        {!! Form::open(['method' => 'POST','route' => 'roles.store']) !!}
          {{ csrf_field() }}

          @include('admin.roles.form')

        {!! Form::close() !!}
      </div>
    </section>

@endsection
