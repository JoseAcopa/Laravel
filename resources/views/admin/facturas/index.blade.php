@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Administrador
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Facturas</li>
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
          <h2 class="box-title"><i class="fa fa-book"></i> Facturas</h2>
        </div>

        <div class="box-body">
          <table id="Jtabla" class="table table-bordered table-striped">
            <thead>
              <tr class="success">
                <th>Acciones</th>
                <th>N° de Factura</th>
                <th>Categoria</th>
                <th>Proveedor</th>
                <th>Fecha Entrada</th>
                <th>Cantidad</th>
                <th>Unidad</th>
             </tr>
            </thead>
            <tbody>
              @foreach ($invoices as $invoice)
                <tr>
                  <td class="row-copasat">
                    @if (auth()->user()->update === 1)
                      <a class="btn btn-info" href="{{ url('admin/edit-employee',$invoice->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                      <button class="btn btn-primary"><i class="fa fa-print"></i></button>
                    @endif
                    @if (auth()->user()->delete === 1)
                      {!! Form::open(['method' => 'DELETE','route' => ['facturas.destroy', $invoice->id]]) !!}
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                      {!! Form::close() !!}
                      {{-- <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o" aria-hidden="true"></i></a> --}}
                    @endif
                  </td>
                  <td>{{ $invoice->nInvoice }}</td>
                  <td>{{ $invoice->category->categorias }}</td>
                  <td>{{ $invoice->supplier->business }}</td>
                  <td>{{ $invoice->checkin }}</td>
                  <td>{{ $invoice->quantity }}</td>
                  <td>{{ $invoice->unit }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header has-warning">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3 class="modal-title control-label"> <i class="fa fa-bell-o"></i> Eliminar Registro</h3>
            </div>
            <div class="modal-body has-error">
              <h4 class="help-block">¿Está seguro que desea eliminar permanentemente este registro de la base de datos?</h4>
              <span class="help-block">¡No podrá recuperar este registro!</span>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
              {!! Form::open(['method' => 'DELETE','route' => ['facturas.destroy', 2]]) !!}
                <button type="submit" class="btn btn-danger">Confirmar</button>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </section>
    <script>
      function destroy(){
        return 1
      }
    </script>

@endsection
