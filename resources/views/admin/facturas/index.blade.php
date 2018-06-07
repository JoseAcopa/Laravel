@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Reportes de ingresos
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Reportes de ingresos</li>
      </ol>

      <div style="margin-top: 10px;">
        <form method="POST" action="{{route('facturas.generar')}}" style="width:70%; display: flex; flex-direction: row; justify-content: space-between;">
          {{ csrf_field() }}
          <div class="form-group" style="width:80%;">
            <label>Buscar facturas por rango de fechas:</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="reservation" name="rango">
            </div>
          </div>
          <div style="margin-top: 25px;">
            <button type="submit" class="btn btn-primary"><i class="fa fa-download"></i> Generar PDF</button>
          </div>
        </form>
      </div>
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
          <table id="Jtabla" class="table table-bordered table-hover dataTable">
            <thead>
              <tr class="active">
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
                    <a class="btn btn-primary" target="_blank" href="{{ url('factura',$invoice->id) }}"><i class="fa fa-file-pdf-o"></i></a>
                    @can ('facturas.destroy')
                      <a type="submit" class="btn btn-danger" onclick="destroy('{{route('factura.destroy', $invoice->id)}}');"><i class="fa fa-trash-o"></i></a>
                    @endcan
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
        }).then((res) => {
          if (res.value) {
            $.ajax({
              url: url,
              method: "POST",
              data: {
                  _token: "{{csrf_token()}}",
                  _method: "DELETE"
              },
              success: function(data){
                swal(
                  '¡Eliminado!',
                  'El registro ha sido eliminado.',
                  'success'
                ).then(()=>{
                  location.reload();
                })
              }
            })
          }else if (res.dismiss === "cancel") {
            swal(
              '¡Cancelado!',
              'La accion fue cancelada.',
              'error'
            )
          }
        })
      }
    </script>

@endsection
