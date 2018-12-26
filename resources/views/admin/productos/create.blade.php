@extends('layouts.app')

@section('content')
    <section class="content-header">
      <h1>
        Productos
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Registrar Productos</li>
      </ol>
    </section>

    <section class="content container-fluid">
      <div class="box box-primary">
        <div class="box-header with-border">
          <div class="col-md-4">
            <h3 class="box-title"><i class="fa fa-plus"></i> Registrar Producto</h3>
          </div>
        </div>
        {!! Form::open(['method' => 'POST','route' => 'producto.store']) !!}
          {{ csrf_field() }}

          @include('admin.productos.form')

        {!! Form::close() !!}
      </div>
    </section>
    <script type="text/javascript">
      function getCatalogo(val) {
        var id = val.value;
        var precioLista = $("#precio_lista").val()
        var costo = $("#costo").val()
        var cat1 = [.70, .65, .60, .57]
        var cat2 = [.40, .37, .36, .35]
        var cat3 = [.70, .75, .80, .85]
        var newRes = []
        //
        $.ajax({
          url: '/producto-catalogo/'+id,
          type: 'GET',
          dataType : 'json',
          success: function (res){
            $('#tipo_producto').val(res.categoria.tipo);
            $('#letra').val(res.categoria.letra);
            $('#proveedor').val(res.proveedor.nombre_empresa);
            $('#proveedor_id').val(res.proveedor.id);
            $('#unidad_medida').val(res.unidad_medida);
            $('#descripcion').val(res.descripcion);
            $('#categoria').val(res.categoria.categorias);
            $('#categoria_id').val(res.categoria.id);

            if (res.categoria.categorias === 'Petrolera | Industrial') {
              $('#costo').attr('readonly', 'readonly');
              $('#precio_lista').removeAttr('readonly');
              // bloqueando campos de precios
              $("#precio_venta1").attr('readonly', 'readonly');
              $("#precio_venta2").attr('readonly', 'readonly');
              $("#precio_venta3").attr('readonly', 'readonly');
              $("#precio_venta4").attr('readonly', 'readonly');
              for (var i = 0; i < cat1.length; i++) {
                var res = cat1[i] * precioLista
                newRes.push(res)
                $('#pv1').text("(x0.70)")
                $('#pv2').text("(x0.65)")
                $('#pv3').text("(x0.60)")
                $('#pv4').text("(x0.57)")
              }
            }else if (res.categoria.categorias === 'Hidraulica') {
              $('#costo').attr('readonly', 'readonly');
              $('#precio_lista').removeAttr('readonly');
              // bloqueando campos de precios
              $("#precio_venta1").attr('readonly', 'readonly');
              $("#precio_venta2").attr('readonly', 'readonly');
              $("#precio_venta3").attr('readonly', 'readonly');
              $("#precio_venta4").attr('readonly', 'readonly');
              for (var i = 0; i < cat2.length; i++) {
                var res = cat2[i] * costo
                newRes.push(res)
                $('#pv1').text("(x0.40)")
                $('#pv2').text("(x0.37)")
                $('#pv3').text("(x0.36)")
                $('#pv4').text("(x0.35)")
              }
            }else if (res.categoria.categorias === 'Otro') {
              $('#costo').removeAttr('readonly');
              $('#precio_lista').attr('readonly', 'readonly');
              // bloqueando campos de precios
              $("#precio_venta1").attr('readonly', 'readonly');
              $("#precio_venta2").attr('readonly', 'readonly');
              $("#precio_venta3").attr('readonly', 'readonly');
              $("#precio_venta4").attr('readonly', 'readonly');
              for (var i = 0; i < cat3.length; i++) {
                var res = costo / cat3[i]
                newRes.push(res)
                $('#pv1').text("(/ 0.70)")
                $('#pv2').text("(/ 0.75)")
                $('#pv3').text("(/ 0.80)")
                $('#pv4').text("(/ 0.85)")
              }
            }else if (res.categoria.categorias === 'Servicios') {
              // desbloqueando precios si son de servicios
              $("#precio_venta1").removeAttr("readonly");
              $("#precio_venta2").removeAttr("readonly");
              $("#precio_venta3").removeAttr("readonly");
              $("#precio_venta4").removeAttr("readonly");
              $('#precio_lista').removeAttr('readonly');
              $('#pv1').text("")
              $('#pv2').text("")
              $('#pv3').text("")
              $('#pv4').text("")
              $('#costo').removeAttr('readonly');
            }

            $('#precio_venta1').val(newRes[0].toFixed(2))
            $('#precio_venta2').val(newRes[1].toFixed(2))
            $('#precio_venta3').val(newRes[2].toFixed(2))
            $('#precio_venta4').val(newRes[3].toFixed(2))
          }
        })
      }
    </script>
    <script type="text/javascript">
      function getPrecios() {
        var categoria = $("#categoria").val()
        var precioLista = $("#precio_lista").val()
        var costo = $("#costo").val()
        var cat1 = [.70, .65, .60, .57]
        var cat2 = [.40, .37, .36, .35]
        var cat3 = [.70, .75, .80, .85]
        var newRes = []

        if (categoria === 'Petrolera | Industrial') {
          var newCosto = precioLista * .50
          $('#costo').val(newCosto.toFixed(2))
          for (var i = 0; i < cat1.length; i++) {
            var res = cat1[i] * precioLista
            newRes.push(res)
            $('#pv1').text("(x0.70)")
            $('#pv2').text("(x0.65)")
            $('#pv3').text("(x0.60)")
            $('#pv4').text("(x0.57)")
          }
        }else if (categoria === 'Hidraulica') {
          var newCosto = precioLista * .29
          $('#costo').val(newCosto.toFixed(2))
          for (var i = 0; i < cat2.length; i++) {
            var res = cat2[i] * newCosto
            newRes.push(res)
            $('#pv1').text("(x0.40)")
            $('#pv2').text("(x0.37)")
            $('#pv3').text("(x0.36)")
            $('#pv4').text("(x0.35)")
          }
        }else if (categoria === 'Otro') {
          for (var i = 0; i < cat3.length; i++) {
            var res = costo / cat3[i]
            $("#precio_lista").val('')
            newRes.push(res)
            $('#pv1').text("(/ 0.70)")
            $('#pv2').text("(/ 0.75)")
            $('#pv3').text("(/ 0.80)")
            $('#pv4').text("(/ 0.85)")
          }
        }

        if (categoria.length > 0) {
          $('#precio_venta1').val(newRes[0].toFixed(2))
          $('#precio_venta2').val(newRes[1].toFixed(2))
          $('#precio_venta3').val(newRes[2].toFixed(2))
          $('#precio_venta4').val(newRes[3].toFixed(2))
        }
      }
    </script>

@endsection
