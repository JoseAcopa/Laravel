@extends('layouts.app')

@section('content')

  <section class="content-header">
    <h1>
      Categorias
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
      <li class="active">Categorias de Producto</li>
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

    <div class="box">
      <div class="box-header">
        <h4><i class="fa fa-pencil-square"></i> Categorias de Producto</h4>
      </div>

      <div class="box-body">
        <div class="col-md-4">
          {!! Form::open(['method' => 'POST','route' => 'categoria.store']) !!}
            {{ csrf_field() }}

            @include('admin.categorias.form')

          {!! Form::close() !!}
        </div>
        <div class="col-md-8">
          <table class="table table-bordered table-hover dataTable">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Tipo de Producto</th>
                <th>Letra Inicial</th>
                <th>Categoria</th>
                <th style="width: 40px">Acciones</th>
             </tr>
            </thead>
            <tbody>
              @foreach ($categorias as $i => $categoria)
                <tr>
                  <td>{{$i+1}}</td>
                  <td>{{$categoria->tipo}}</td>
                  <td>{{$categoria->letra}}</td>
                  <td>{{$categoria->categorias}}</td>
                  <td class="row-copasat">
                    @can ('categoria.destroy')
                      <a type="submit" class="btn btn-danger" onclick="destroy('{{route('categoria.destroy', $categoria->id)}}');"><i class="fa fa-trash-o"></i></a>
                    @endcan
                  </td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>#</th>
                <th>Tipo de Producto</th>
                <th>Letra Inicial</th>
                <th>Categoria</th>
                <th>Acciones</th>
             </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </section>

@endsection
