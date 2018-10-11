@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Cotización
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Editar Cotización</li>
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
          <h3 class="box-title"><i class="fa fa-book"></i> Editar Cotización</h3>
        </div>
        {!! Form::model($cotizacion, ['method' => 'POST','route' => ['cotizacion.update', $cotizacion->id]]) !!}
          {{ csrf_field() }}

          @include('admin.quotation.form')

        {!! Form::close() !!}

        <div class="col-md-12">
          <hr>
          <h2>Agregar productos</h2>
          <a href="#" class="btn btn-success pull-right">Agregar productos</a>
          <br>
          <br>
          <table id="Jtabla" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
                <th>Eliminar</th>
             </tr>
            </thead>
            <tbody>
              {{-- @foreach ($cotizaciones as $key => $cotizacion) --}}
                <tr>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td class="row-copasat">
                      <a type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>

                  </td>
                </tr>
              {{-- @endforeach --}}
            </tbody>
            <tfoot>
              <tr>
                <th>#</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
                <th>Acciones</th>
             </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </section>

@endsection
