@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Administrador
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Inventario</li>
      </ol>
    </section>

    <section class="content container-fluid">
      @if ($message = Session::get('success'))
        <div class="box box-success box-solid">
          <div class="box-header">
            <h3 class="box-title">{{ $message }}</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
        </div>
      @endif

      <div class="box">
        <div class="box-header">
          @if (auth()->user()->create === 1)
            <a href="{{url('admin/add-product')}}" class="btn btn-success" ><i class="fa fa-pencil "></i> Registrar Productos</a>
          @endif
        </div>

        <div class="box-body">
          <table id="Jtabla" class="table table-bordered table-striped">
            <thead>
              <tr class="success">
                <th>Acciones</th>
                <th>Tipo Producto</th>
                <th>N° de Producto</th>
                <th>Descripción del Producto</th>
                <th>Fecha de Entrada</th>
                <th>Stock</th>
             </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
                <tr>
                  <td class="row-copasat">
                    <a class="btn btn-primary" href="{{url('/admin/show-product',$product->id)}}" alt="Ver mas.."><i class="fa fa-eye"></i></a>
                    @if (auth()->user()->update === 1)
                      <a class="btn btn-info" href="{{url('/admin/edit-product',$product->id)}}"><i class="fa fa-pencil-square-o"></i></a>
                    @endif
                    @if (auth()->user()->delete === 1)
                      {!! Form::open(['method' => 'DELETE','route' => ['inventary.destroy', $product->id]]) !!}
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                      {!! Form::close() !!}
                    @endif
                  </td>
                  <td>{{ $product->category }}</td>
                  <td>{{ $product->initials }}-{{ $product->id }}</td>
                  <td>{{ $product->description }}</td>
                  <td>{{ $product->checkin }}</td>
                  <td>{{ $product->stock }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>

@endsection
