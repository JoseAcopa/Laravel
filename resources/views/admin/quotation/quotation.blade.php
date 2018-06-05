@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Cotización
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Cotización</li>
      </ol>

      <div style="margin-top: 10px;">
        <form style="width:80%; display: flex; flex-direction: row; justify-content: space-between;">
          <div class="form-group" style="width:70%;">
            <label>Buscar cotización por rango de fechas:</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="reservation">
            </div>
          </div>
          <div style="margin-top: 25px;">
            <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</button>
          </div>
          <div style="margin-top: 25px;">
            <button type="button" class="btn btn-primary"><i class="fa fa-download"></i> Generar PDF</button>
          </div>
        </form>
      </div>
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
          <a href="{{url('admin/crear-cotizacion')}}" class="btn btn-default" ><i class="fa fa-plus"></i> Nuevo</a>
        </div>

        <div class="box-body">
          <table id="Jtabla" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Acciones</th>
                <th>No. de Cotización</th>
                <th>Empleados</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Nombre de la Empresa</th>
                <th>RFC</th>
                <th>Subtotal</th>
                <th>IVA</th>
                <th>Total</th>
             </tr>
            </thead>
            <tbody>
              @foreach ($quotations as $quotation)
                <tr>
                  <td class="row-copasat">
                    <a class="btn btn-primary" href="{{url('/admin/ver-cotizacion',$quotation->id)}}" alt="Ver mas.."><i class="fa fa-eye"></i></a>
                    <a class="btn btn-default" target="_blank" href="{{url('/cotizacion',$quotation->id)}}"><i class="fa fa-file-pdf-o"></i></a>
                    {{-- <a class="btn btn-info" href="{{url('/admin/edit-product',$quotation->id)}}"><i class="fa fa-pencil-square-o"></i></a> --}}
                    <a type="submit" class="btn btn-danger" onclick="destroy('{{route('cotizacion.destroy', $quotation->id)}}');"><i class="fa fa-trash-o"></i></a>
                  </td>
                  <td>{{$quotation->cotizacion}}</td>
                  <td>{{$quotation->user->name}}</td>
                  <td>{{$quotation->fecha}}</td>
                  <td>{{$quotation->nombre}}</td>
                  <td>{{$quotation->cliente->business}}</td>
                  <td>{{$quotation->cliente->RFC}}</td>
                  <td>${{$quotation->subtotal}}</td>
                  <td>${{$quotation->IVA}}</td>
                  <td>${{$quotation->total}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <script type="text/javascript">
    sessionStorage.clear();
    var idQuotation = {{$quotationPDF}}
    if (idQuotation != 0) {
      window.onload=function onloadPDF() {
        var a = document.createElement("a");
    		a.target = "_blank";
    		a.href = "/cotizacion/"+idQuotation;
    		a.click();

        window.location="{{url('/admin/quotation')}}"
      }
    }

    function destroy(url){
      event.preventDefault();
      swal({
        title: '¿Desea eliminar esta cotización?',
        text: "¡No podra revertir esto!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3c8dbc',
        cancelButtonColor: '#dd4b39',
        confirmButtonText: 'Sí, eliminar!',
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
