@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Cotización
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Realizar Cotización</li>
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
          <h3 class="box-title"><i class="fa fa-book"></i> Realizar Cotización</h3>
        </div>

        {!! Form::open(['method' => 'POST', 'route' => 'cotizacion.get']) !!}
          {{ csrf_field() }}

          @include('admin.quotation.formSearchQuotation')

        {!! Form::close() !!}

        {!! Form::open(['method' => 'POST', 'route' => 'cotizacion.store']) !!}
          {{ csrf_field() }}

          @include('admin.quotation.form')

        {!! Form::close() !!}

      </div>
      @include('admin.quotation.formModal')
      @include('admin.quotation.formClient')
    </section>
    <script type="text/javascript" src="{{ asset('js/queryCotizacion.js') }}"></script>
@endsection

<script type="text/javascript">
  // agregando cliente con el generador de cotizacion
  function getClient(val) {
    var id = val.value

    $.ajax({
      url: '/cliente/'+id,
      type: 'GET',
      success: (res)=>{
        var count = res.count.length + 1
        $('#cliente').val(res.client.id)
        $('#rfc').val(res.client.RFC)
        $('#empresa').val(res.client.business)
        $('#telefono').val(res.client.phone)
        $('#correo').val(res.client.email)
        $('#direccion').val(res.client.address)
        $('#numero_cotizacion').val('RXS-'+("000" + count).substr(-3,3)+'-'+res.year+'-'+'{{ Auth::user()->user}}'+'-'+res.client.siglas)
      }
    })
  }

  // funciones para agregar datos del formulario
  function typeProduct(val){
    var priceList = $("#priceList").val()
    var cost = $("#cost").val()
    var cat1 = [.70, .65, .60, .57]
    var cat2 = [.40, .37, .36, .35]
    var cat3 = [.70, .75, .80, .85]
    var newRes = []
    var categories = <?php echo $categories;?>;
    var newVal = {};

    categories.map((item)=>{
      newVal[item.id] = item
    })

    if (val.value != '') {
      var category = newVal[val.value]
      document.getElementById('letter').value = category.letters;

      document.getElementById('mostrar-form').style.display = 'block'
      document.getElementById('categoria-view').value = category.categorias

      if (category.categorias === 'Petrolera | Industrial') {
        $('#cost').attr('readonly', 'readonly');
        $('#priceList').removeAttr('readonly');
        for (var i = 0; i < cat1.length; i++) {
          var res = cat1[i] * priceList
          newRes.push(res)
          $('#pv1').text("(x0.70)")
          $('#pv2').text("(x0.65)")
          $('#pv3').text("(x0.60)")
          $('#pv4').text("(x0.57)")
        }
      }else if (category.categorias === 'Hidraulica') {
        $('#cost').attr('readonly', 'readonly');
        $('#priceList').removeAttr('readonly');
        for (var i = 0; i < cat2.length; i++) {
          var res = cat2[i] * cost
          newRes.push(res)
          $('#pv1').text("(x0.40)")
          $('#pv2').text("(x0.37)")
          $('#pv3').text("(x0.36)")
          $('#pv4').text("(x0.35)")
        }
      }else if (category.categorias === 'Otro') {
        $('#cost').removeAttr('readonly');
        $('#priceList').attr('readonly', 'readonly');
        for (var i = 0; i < cat3.length; i++) {
          var res = cost / cat3[i]
          newRes.push(res)
          $('#pv1').text("(/ 0.70)")
          $('#pv2').text("(/ 0.75)")
          $('#pv3').text("(/ 0.80)")
          $('#pv4').text("(/ 0.85)")
        }
      }

      $('#priceSales1').val(newRes[0].toFixed(2))
      $('#priceSales2').val(newRes[1].toFixed(2))
      $('#priceSales3').val(newRes[2].toFixed(2))
      $('#priceSales4').val(newRes[3].toFixed(2))
    }else {
      document.getElementById('mostrar-form').style.display = 'none'
    }
  }

  // guardando nuevo producto
  setTimeout(function() {
    $(document).ready(function() {
      // obteniendo los productos para rellenar el select
      $.ajax({
        url: '/productos',
        type: 'GET',
        success: (res)=>{
          $('#searchProduct').append('<option class="options" selected="selected">Selecciona</option>')
          for (var i = 0; i < res.length; i++) {
            $('#searchProduct').append('<option class="options" value="'+res[i].id+'">'+res[i].category.type+' | '+res[i].description+'</option>')
          }
        }
      })

      $("#save-new-product").click(function(){

        var data = {
          "category": document.getElementById('category').value,
          "letter": document.getElementById('letter').value,
          "proveedor": document.getElementById('proveedor').value,
          "unidad": document.getElementById('unidad').value,
          "description": $('textarea[id="description"]').val(),
          "nInvoice": document.getElementById('nInvoice').value ? document.getElementById('nInvoice').value : null,
          "fecha_entrada": document.getElementById('datepickerProduct').value,
          "cantidad_entrada": document.getElementById('cantidad_entrada').value,
          "precio_lista": document.getElementById('priceList').value ? document.getElementById('priceList').value : null,
          "costo": document.getElementById('cost').value ? document.getElementById('cost').value : null,
          "moneda": document.getElementById('moneda').value,
          "categoria-view": document.getElementById('categoria-view').value,
          "priceSales1": document.getElementById('priceSales1').value,
          "priceSales2": document.getElementById('priceSales2').value,
          "priceSales3": document.getElementById('priceSales3').value,
          "priceSales4": document.getElementById('priceSales4').value,
          "priceSales5": document.getElementById('priceSales5').value ? document.getElementById('priceSales5').value : null
        }

        $.ajax({
          url: '/guardar-producto-cotizacion',
          method: "POST",
          data: {
              _token: "{{csrf_token()}}",
              _method: "POST",
              data: data
          },
          success: function(res){
            swal(
              'Datos Guardados!',
              'ELos datos se guardaron correctamente.',
              'success'
            )
            $('#formProducto')[0].reset();
            $('.bd-example-modal-lg').modal('hide');
            document.getElementById('mostrar-form').style.display = 'none'

            // limpiamos el select
            $('.options').remove();
            // cargamos los productos actualizados
            $.ajax({
              url: '/productos',
              type: 'GET',
              success: (res)=>{
                $('#searchProduct').append('<option class="options" selected="selected">Selecciona</option>')
                for (var i = 0; i < res.length; i++) {
                  $('#searchProduct').append('<option class="options" value="'+res[i].id+'">'+res[i].category.type+' | '+res[i].description+'</option>')
                }
              }
            })

          }
        })
      });
    })
  },500)
</script>
