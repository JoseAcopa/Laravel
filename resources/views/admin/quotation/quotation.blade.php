@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Administrador
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Cotización</li>
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
            <a href="{{url('admin/add-quotation')}}" class="btn btn-success" ><i class="fa fa-book"></i> Cotizar</a>
          @endif
        </div>

        <div class="box-body">
          <table id="Jtabla" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Acciones</th>
                <th>Empleados</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Nombre de la Empresa</th>
                <th>Subtotal</th>
                <th>Total</th>
             </tr>
            </thead>
            <tbody>
              @foreach ($quotations as $quotation)
                <tr>
                  <td class="row-copasat">
                    <a class="btn btn-primary" href="{{url('/admin/show-product',$quotation->id)}}" alt="Ver mas.."><i class="fa fa-eye"></i></a>
                    <a class="btn btn-info" href="{{url('/admin/edit-product',$quotation->id)}}"><i class="fa fa-pencil-square-o"></i></a>
                    {!! Form::open(['method' => 'DELETE','route' => ['inventary.destroy', $quotation->id]]) !!}
                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                    {!! Form::close() !!}
                  </td>
                  <td>{{$quotation->folio}}</td>
                  <td>{{$quotation->date}}</td>
                  <td>{{$quotation->nClient}}</td>
                  <td>{{$quotation->company}}</td>
                  <td>{{$quotation->RFC}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>

@endsection
