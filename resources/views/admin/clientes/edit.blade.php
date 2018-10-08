@extends('layouts.app')

@section('content')

  <section class="content-header">
    <h1>
      Clientes
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
      <li class="active">Editar Cliente</li>
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
        <h3 class="box-title"><i class="fa fa-edit"></i> Editar Cliente</h3>
      </div>
      {!! Form::model($editarCliente, ['method' => 'PUT','route' => ['cliente.update', $editarCliente->id]]) !!}
        {{ csrf_field() }}

        @include('admin.clientes.form')

      {!! Form::close() !!}
    </div>
  </section>

@endsection
