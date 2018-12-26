@extends('layouts.app')

@section('content')
  <section class="content-header">
    <h1>
      Salidas
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
      <li class="active">Salidas de Productos</li>
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
        <div class="col-md-4">
          <h3 class="box-title"><i class="fa fa-edit"></i>Editar Salida de Producto</h3>
        </div>
      </div>
      {!! Form::model($salida, ['method' => 'PUT','route' => ['salida.update', $salida->id], 'role' => 'form']) !!}
        {{ csrf_field() }}

        @include('admin.salidas.form')

      {!! Form::close() !!}
    </div>
  </section>
  <script>
    function precioVenta(val) {

      if (val.value === "precioVenta5") {
        $('#precio_venta').val('')
        $('#precio_venta').removeAttr('readonly')
      }else {
        $('#precio_venta').val(val.value)
        $('#precio_venta').attr('readonly', 'readonly')
      }
    }
  </script>
  <script type="text/javascript">
    // funcion se ejecuta al hacer cambio con clic
    function cantidadSalida(val) {
      var existencia = document.getElementById('existencia').value
      var value = val.value

      if (Number(value) <= Number(existencia)) {
        var newStock = existencia - value
        document.getElementById('stock').value = newStock
      }else {
        document.getElementById('cantidad_salida').value = 1
        swal({
          type: 'error',
          title: 'Producto en stock',
          text: '¡Solo hay '+existencia+' productos en existencia!'
        })
      }
    }

    // funcion se ejecuta al hacer cambio manual
    setTimeout(function() {
      $("#cantidad_salida").keyup(function() {
        var existencia = document.getElementById('existencia').value
        var value = document.getElementById('cantidad_salida').value

        if (Number(value) <= Number(existencia)) {
          var newStock = existencia - value
          document.getElementById('stock').value = newStock
        }else {
          document.getElementById('cantidad_salida').value = 1
          swal({
            type: 'error',
            title: 'Producto en stock',
            text: '¡Solo hay '+existencia+' productos en existencia!'
          })
        }
      });
    },1000)
  </script>

@endsection
