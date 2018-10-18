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

        {!! Form::open(['method' => 'POST', 'route' => 'cotizacion.store']) !!}
          {{ csrf_field() }}

          @include('admin.quotation.form')

        {!! Form::close() !!}

      </div>
      @include('admin.quotation.formClient')
    </section>

@endsection
<script type="text/javascript" src="{{ asset('js/queryCotizacion.js') }}"></script>
<script type="text/javascript">
  // agregando cliente con el generador de cotizacion
  function getClient(val) {
    var id = val.value

    $.ajax({
      url: '/cliente-cotizacion/'+id,
      type: 'GET',
      success: (res)=>{
        var total_cotizacion = res.total_cotizacion.length + 1
        $('#cliente').val(res.cliente.id)
        $('#rfc').val(res.cliente.rfc)
        $('#empresa').val(res.cliente.nombre_empresa)
        $('#telefono').val(res.cliente.telefono)
        $('#correo').val(res.cliente.correo)
        $('#direccion').val(res.cliente.direccion)
        $('#numero_cotizacion').val('RXS-'+("000" + total_cotizacion).substr(-3,3)+'-'+res.fecha+'-'+'{{ Auth::user()->user}}'+'-'+res.cliente.siglas)
      }
    })
  }

  // obteniendo producto para cotizar
  function getProducto(val) {
    var id = val.value
    $.ajax({
      url: '/producto/'+id,
      type: 'GET',
      success: (res)=>{
        console.log(res);
        $('#descripcion').val(res.description);
        $('#producto_cotizar').val(res.category.type);
        $('#stock').val(+res.stock);
        $('.selectPrecios').remove();
        $('#precios').append('<option class="selectPrecios">$'+res.priceSales1+'</option><option class="selectPrecios">$'+res.priceSales2+'</option class="selectPrecios"><option>$'+res.priceSales3+'</option><option class="selectPrecios">$'+res.priceSales4+'</option><option class="selectPrecios">$'+res.priceSales5+'</option>')
        // sessionStorage.setItem('products',JSON.stringify(products))
      }
    })
  }
</script>
