@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Administrador
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Salida de Productos</li>
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
          @if (auth()->user()->create === 1)
            <a href="{{url('admin/add-product-output')}}" class="btn btn-success" ><i class="fa fa-pencil "></i> Registrar Salida Productos</a>
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
                <th>Stock</th>
                <th>Fecha de Salida</th>
                <th>Cantidad de Salida</th>
                <th>Precio</th>
             </tr>
            </thead>
            <tbody>
              @foreach ($checkouts as $checkout)
                <tr>
                  <td class="row-copasat">
                    <a class="btn btn-primary" href="{{url('/admin/show-product-output',$checkout->id)}}" alt="Ver mas.."><i class="fa fa-eye"></i></a>
                    <a class="btn btn-info" href="{{url('/admin/edit-product-output',$checkout->id)}}"><i class="fa fa-pencil-square-o"></i></a>
                    {!! Form::open(['method' => 'DELETE','route' => ['product-output.destroy', $checkout->id]]) !!}
                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                    {!! Form::close() !!}
                  </td>
                  <td>{{ $checkout->category->type }}</td>
                  <td>{{ $checkout->initials }}-{{ $checkout->id }}</td>
                  <td>{{ $checkout->description }}</td>
                  <td>
                    <span  <?php echo (int)$checkout->stock <= 20 ? "class='badge bg-red'" : "class='badge bg-green'"; ?>>
                      {{$checkout->stock}}
                    </span>
                  </td>
                  <td>{{ $checkout->date_out }}</td>
                  <td>{{ $checkout->quantity_output }}</td>
                  <td>{{ $checkout->price_output }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>

@endsection
