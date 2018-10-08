@extends('layouts.app')

@section('content')

  <section class="content-header">
    <h1>
      Clientes
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
      <li class="active">Registrar Cliente</li>
    </ol>
  </section>

  <section class="content container-fluid">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-user-plus"></i> Registrar Cliente</h3>
      </div>
      {!! Form::open(['method' => 'POST','route' => 'cliente.store']) !!}
        {{ csrf_field() }}

        @include('admin.clientes.form')

      {!! Form::close() !!}
    </div>
  </section>

@endsection
