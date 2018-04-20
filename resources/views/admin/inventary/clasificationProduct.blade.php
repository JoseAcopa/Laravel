@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Administrador
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Clasificación de Producto</li>
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
          <h4><i class="fa fa-pencil-square"></i> Clasificación de Producto</h4>
        </div>

        <div class="box-body">
          <div class="col-md-4">
            <form rol="form" method="POST" action="/admin/clasificationProduct">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                  <label for="typeP">Tipo de Producto:</label>
                  <input type="text" name="type" id="type" class="form-control" >
                  {!! $errors->first('type','<span class="help-block">:message</span>')!!}
                </div>
                <div class="form-group {{ $errors->has('letters') ? 'has-error' : '' }}">
                  <label for="ini">Iniciales:</label>
                  <input type="text" name="letters" id="name" class="form-control" >
                  {!! $errors->first('letters','<span class="help-block">:message</span>')!!}
                </div>
                <div class="form-group {{ $errors->has('categorias') ? 'has-error' : '' }}">
                  <label for="ini">Categorias:</label>
                  <select name="categorias" id="name" class="form-control" >
                    <option value="">Seleccione Categoria</option>
                    <option value="Petrolera | Industrial">Petrolera | Industrial</option>
                    <option value="Hidraulica">Hidraulica</option>
                    <option value="Otro">Otro</option>
                  </select>
                  {!! $errors->first('categorias','<span class="help-block">:message</span>')!!}
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-lg"></i> Guardar</button>
              </div>
            </form>
          </div>
          <div class="col-md-8">
            <table class="table table-bordered table-striped">
              <thead>
                <tr class="success">
                  <th>Acciones</th>
                  <th>Tipo de Producto</th>
                  <th>Letra Inicial</th>
                  <th>Categoria</th>
               </tr>
              </thead>
              <tbody>
                @foreach ($categories as $key)
                  <tr>
                    <td class="row-copasat">
                      {{-- <a href="{{url('/admin/edit-out',$key->id_Producto)}}" class="btn-green"><i class="fa fa-pencil-square-o fa-lg"></i></a> --}}
                      {!! Form::open(['method' => 'DELETE','route' => ['clasificationProduct.destroy', $key->id]]) !!}
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                      {!! Form::close() !!}
                    </td>
                    <td>{{$key->type}}</td>
                    <td>{{$key->letters}}</td>
                    <td>{{$key->categorias}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>

@endsection
