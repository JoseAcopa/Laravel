@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Administrador
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Clientes</li>
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
            <a href="{{ url('/admin/add-client') }}" class="btn btn-success" ><i class="fa fa-user-plus"></i> Registrar Clientes</a>
          @endif
        </div>

        <div class="box-body">
          <table id="Jtabla" class="table table-bordered table-striped">
            <thead>
              <tr class="success">
                <th>Acciones</th>
                <th>RFC</th>
                <th>Nombre de la Empresa</th>
                <th>Siglas</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>E-mail</th>
             </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                  <tr>
                    <td class="row-copasat">
                      @if (auth()->user()->update === 1)
                        <a class="btn btn-info" href="{{ url('admin/edit-client',$client->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                      @endif
                      @if (auth()->user()->delete === 1)
                        {!! Form::open(['method' => 'DELETE','route' => ['client.destroy', $client->id]]) !!}
                          <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                        {!! Form::close() !!}
                      @endif
                    </td>
                    <td>{{ $client->RFC }}</td>
                    <td>{{ str_limit($client->business, 30) }}</td>
                    <td>{{ $client->siglas }}</td>
                    <td>{{ str_limit($client->address, 50) }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->email }}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>

@endsection
