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
                <th>Precio Lista</th>
                <th>Costo</th>
             </tr>
            </thead>
            <tbody>
              @foreach ($invoices as $invoice)
                <tr>
                  <td class="row-copasat">
                    {{-- <a class="btn btn-info" href="{{ url('admin/edit-employee',$invoice->id) }}"><i class="fa fa-pencil-square-o"></i></a> --}}
                    <a class="btn btn-primary" target="_blank" href="{{ url('factura',$invoice->id) }}"><i class="fa fa-print"></i></a>
                    {!! Form::open(['method' => 'DELETE','route' => ['facturas.destroy', $invoice->id]]) !!}
                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                    {!! Form::close() !!}
                    {{-- <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o" aria-hidden="true"></i></a> --}}
                  </td>
                  <td>{{ $invoice->nInvoice }}</td>
                  <td>{{ $invoice->category->categorias }}</td>
                  <td>{{ $invoice->supplier->business }}</td>
                  <td>{{ $invoice->checkin }}</td>
                  <td>{{ $invoice->quantity }} {{ $invoice->unit }}</td>
                  <td>{{ $invoice->priceList }}</td>
                  <td>{{ $invoice->cost }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <script type="text/javascript">
      function destroy(url){
        event.preventDefault();
        swal({
          title: '¿Desea eliminar esta factura?',
          text: "¡No podra revertir esto!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3c8dbc',
          cancelButtonColor: '#dd4b39',
          confirmButtonText: 'Sí, eliminarlo!',
          cancelButtonText: 'No, cancelar!'
        }).then(() => {
          $.ajax({
            url: url,
            method: "POST",
            data: {
                _token: "{{csrf_token()}}",
                _method: "DELETE"
            },
            success: function(data){
              location.reload();
            }
          })
        })

      }
    </script>

@endsection
