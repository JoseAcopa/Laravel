@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Administrador
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Proveedores</li>
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
            <a href="{{ url('/admin/add-suppliers') }}" class="btn btn-success" ><i class="fa fa-user-plus"></i> Registrar Proveedores</a>
          @endif
        </div>

        <div class="box-body">
          <table id="Jtabla" class="table table-bordered table-striped">
            <thead>
              <tr class="success">
                <th>Acciones</th>
                <th>RFC</th>
                <th>Nombre de la Empresa</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>E-mail</th>
             </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                  <tr>
                    <td class="row-copasat">
                      @if (auth()->user()->update === 1)
                        <a class="btn btn-info" href="{{ url('admin/edit-suppliers',$supplier->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                      @endif
                      @if (auth()->user()->delete === 1)
                        {!! Form::open(['method' => 'DELETE','route' => ['suppliers.destroy', $supplier->id]]) !!}
                          <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                        {!! Form::close() !!}
                      @endif
                    </td>
                    <td>{{ $supplier->RFC }}</td>
                    <td>{{ str_limit($supplier->business, 30) }}</td>
                    <td>{{ str_limit($supplier->address, 50) }}</td>
                    <td>{{ $supplier->phone }}</td>
                    <td>{{ $supplier->email }}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>

@endsection
