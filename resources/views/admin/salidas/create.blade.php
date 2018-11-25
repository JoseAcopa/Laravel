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
    <div class="box box-primary">
      <div class="box-header with-border">
        <div class="col-md-4">
          <h3 class="box-title"><i class="fa fa-plus"></i> Salida de Producto</h3>
        </div>
      </div>
      {!! Form::open(['method' => 'POST','route' => 'salida.store']) !!}
        {{ csrf_field() }}

        @include('admin.salidas.form')

      {!! Form::close() !!}
    </div>
  </section>
  <script type="text/javascript">
    function getProducto(val) {
      var id = val.value;

      $.ajax({
        url: '/producto-salida/'+id,
        type: 'GET',
        success: (res)=>{
          $('#precio').empty();
          $('#precio_lista').val(res.precio_lista);
          $('#categoria').val(res.categoria.categorias);
          $('#letra').val(res.categoria.letra);
          $('#stock').val(res.stock);
          $('#existencia').val(res.stock);
          $('#costo').val(res.costo);
          $('#proveedor').val(res.proveedor.nombre_empresa);
          $('#unidad_medida').val(res.catalogo.unidad_medida);
          $('#descripcion').val(res.catalogo.descripcion);
          $('#precio').append('<option>Seleccione</option>'+
                              '<option>'+res.precio_venta1+'</option>'+
                              '<option>'+res.precio_venta2+'</option>'+
                              '<option>'+res.precio_venta3+'</option>'+
                              '<option>'+res.precio_venta4+'</option>'+
                              '<option value="precioVenta5">'+res.precio_venta5+'</option>'
                            );
          $('#categoria_id').val(res.catalogo.id);
          $('#proveedor_id').val(res.proveedor.id);
          // limpiando los precios y cantidad cada que se cambia el producto
          $('#cantidad_salida').val("");
          $('#precio_venta').val("");

          if (res.categoria.categorias == 'Servicios') {
            $('#precio_venta').removeAttr('readonly')
          }else {
            $('#precio_venta').attr('readonly', 'readonly')
          }
        }
      })
    }
  </script>
  <script>
    function precioVenta(val) {
      var servicios = document.getElementById('categoria').value

      if (val.value === "precioVenta5") {
        $('#precio_venta').val('')
        $('#precio_venta').removeAttr('readonly')
      }else {
        $('#precio_venta').val(val.value)
        $('#precio_venta').attr('readonly', 'readonly')
      }

      if ( servicios == 'Servicios') {
        $('#precio_venta').removeAttr('readonly')
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
