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

        @include('admin.cotizacion.form')

      {!! Form::close() !!}

    </div>
    @include('admin.cotizacion.formClient')
    @include('admin.cotizacion.newProducto')
  </section>

@endsection
<script type="text/javascript" src="{{ asset('js/queryCotizacion.js') }}"></script>
<script type="text/javascript">
  var cliente = (JSON.parse(sessionStorage.getItem('cliente')) != null) ? JSON.parse(sessionStorage.getItem('cliente')) : []
  function guardandoCliente() {
    var clientes = {
      numero_cotizacion: document.getElementById('numero_cotizacion').value,
      rfc: document.getElementById('rfc').value,
      empresa: document.getElementById('empresa').value,
      datepicker: document.getElementById('datepicker').value,
      telefono: document.getElementById('telefono').value,
      nombre_cotizar: document.getElementById('nombre_cotizar').value,
      licitacion: document.getElementById('licitacion').value,
      correo: document.getElementById('correo').value,
      puesto: document.getElementById('puesto').value,
      direccion: document.getElementById('direccion').value,
      moneda: document.getElementById('moneda').value,
      observacion: document.getElementById('observacion').value,
      cliente_id: document.getElementById('cliente_id').value
    }
    // guardando cliente en sessionStorage
    sessionStorage.setItem('cliente',JSON.stringify(clientes))
  }

  if (cliente.length == undefined) {
    setTimeout(function() {
      document.getElementById('numero_cotizacion').value = cliente.numero_cotizacion
      document.getElementById('rfc').value = cliente.rfc
      document.getElementById('empresa').value = cliente.empresa
      document.getElementById('datepicker').value = cliente.datepicker
      document.getElementById('telefono').value = cliente.telefono
      document.getElementById('nombre_cotizar').value = cliente.nombre_cotizar
      document.getElementById('licitacion').value = cliente.licitacion
      document.getElementById('correo').value = cliente.correo
      document.getElementById('puesto').value = cliente.puesto
      document.getElementById('direccion').value = cliente.direccion
      document.getElementById('moneda').value = cliente.moneda
      document.getElementById('observacion').value = cliente.observacion
      document.getElementById('cliente_id').value = cliente.cliente_id
    }, 500)
  }
</script>
<script type="text/javascript">
  // funciones de modal agregar catalogo
  function getUnidad(val) {
    var value = val.value

    if (value === 'Otros') {
      $('#unidad_medida').val('')
      $('#unidad_medida').removeAttr('readonly');
    }else {
      $('#unidad_medida').val(value)
      $('#unidad_medida').attr('readonly', 'readonly');
    }
  }
  function categoria(val){
    var categorias = <?php echo $todas_categorias;?>;
    var newVal = {};

    categorias.map((item)=>{
      newVal[item.id] = item
    })

    var categoria = newVal[val.value]
    document.getElementById('letra').value = categoria.letra;
    var hoy = moment().format('X')
    $('#sku').val(categoria.letra+'-'+hoy)
  }

  // funcions al cambiar precios
  function cambiarPrecio(val) {
    var precio = val.value

    if (precio == "precioVenta5") {
      $('#precio').val(0)
      $('#precio').removeAttr('readonly')
    }else {
      $('#precio').val(precio.substr(1, precio.length))
      $('#precio').attr('readonly', 'readonly')
    }

  }

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
      url: '/producto-cotizacion/'+id,
      type: 'GET',
      success: (res)=>{
        $('#descripcion').val(res.descripcion);
        $('#producto_cotizar').val(res.categoria.tipo);
        if (res.productos.length != 0) {
          $('#precio').attr('readonly', 'readonly')
          $('#stock').val(+res.productos[0].stock);
          $('#precios').empty();
          $('#precios').append('<option class="precio1">$'+res.productos[0].precio_venta1+'</option><option class="precio2">$'+res.productos[0].precio_venta2+'</option><option class="precio3">$'+res.productos[0].precio_venta3+'</option><option class="precio4">$'+res.productos[0].precio_venta4+'</option><option class="precio5" value="precioVenta5">$'+res.productos[0].precio_venta5+'</option>')
        }else {
          $('#precio').val("")
          $('#precio').removeAttr('readonly')
          $('#precios').empty();
          $('#stock').val(0);
        }
      }
    })
  }

  // variable para guardar los datos en sesionstorage y en cotizacion
  var productos = (JSON.parse(sessionStorage.getItem('productos')) != null) ? JSON.parse(sessionStorage.getItem('productos')) : []

  // agregando productos si se recarga la pagina
  setTimeout(function() {
    // llenando el campo de los productos a cotizar para enviarlo
    $('#cotizar_productos').val(JSON.stringify(productos));
    productos.map((item, i)=>{
      var precio = item.precio.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")
      var subtotal = item.subtotal.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")
      $('#fila'+i).remove();
      var iter = '';
      iter += '<tr id="fila'+i+'"><td style="width: 10px;">'+Number(i+1)+'.</td><td>'+item.descripcion+'</td><td>'+item.cantidad+'</td><td style="width: 30px;">$'+precio+'</td><td style="width: 30px;">$'+subtotal+'</td><td><button type="button" class="btn btn-danger" onclick="eliminarProductoCotizado('+i+')"><i class="fa fa-trash"></i></button></td></tr>'
      $('#tabla').append(iter)
    })
    total()
  }, 600)

  // agregando productos a la tabla
  function agregarProducto() {
    var descripcion = $('#descripcion').val()
    var cantidad = Number($('#cantidad').val())
    var precio = Number($('#precio').val().replace(/[$]/gi, ''))
    var subtotal = cantidad * precio
    var productoId = Number($('#producto_id').val())

    if (cantidad == '') {
      swal(
        '¡Campos requeridos!',
        'Algunos campos son requeridos.',
        'warning'
      )
      return
    }
    var producto = {
      cantidad: cantidad,
      precio: precio,
      subtotal: subtotal,
      producto_id: productoId,
      descripcion: descripcion
    }
    productos.push(producto)
    sessionStorage.setItem('productos',JSON.stringify(productos))
    // llenando el campo de los productos a cotizar para enviarlo
    $('#cotizar_productos').val(JSON.stringify(productos));
    // creando tabla de productos cotizados
    productos.map((item, i)=>{
      var precio = item.precio.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")
      var subtotal = item.subtotal.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")
      $('#fila'+i).remove();
      var iter = '';
      iter += '<tr id="fila'+i+'"><td style="width: 10px;">'+Number(i+1)+'.</td><td>'+item.descripcion+'</td><td>'+item.cantidad+'</td><td style="width: 30px;">$'+precio+'</td><td style="width: 30px;">$'+subtotal+'</td><td><button type="button" class="btn btn-danger" onclick="eliminarProductoCotizado('+i+')"><i class="fa fa-trash"></i></button></td></tr>'
      $('#tabla').append(iter)
    })
    total()
  }

// obteniendo el total de los productos cotizados
function total() {
  let total = 0;

  productos.map((item)=>{
    total += Number(item.subtotal)
  })
  $('#total').val(total.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))
}

// eliminar producto de la tabla de cotizacion
function eliminarProductoCotizado(index) {
  swal({
    title: '¿Desea eliminar este producto?',
    text: "¡El producto se eliminara de la cotización!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3c8dbc',
    cancelButtonColor: '#dd4b39',
    confirmButtonText: 'Sí, eliminar!',
    cancelButtonText: 'No, cancelar!'
  }).then((res) => {
    if (res.value) {
      // eliminando los datos de la tabla
      productos.map((item, i)=>{
        $('#fila'+i).remove();
      })

      // refrescando tabla
      setTimeout(function() {
        productos.splice(index, 1)
        total()

        sessionStorage.setItem('productos',JSON.stringify(productos))
        // llenando el campo de los productos a cotizar para enviarlo
        $('#cotizar_productos').val(JSON.stringify(productos));
        productos.map((item, i)=>{
          var precio = item.precio.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")
          var subtotal = item.subtotal.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")
          $('#fila'+i).remove();
          var iter = '';
          iter += '<tr id="fila'+i+'"><td style="width: 10px;">'+Number(i+1)+'.</td><td>'+item.descripcion+'</td><td>'+item.cantidad+'</td><td style="width: 30px;">$'+precio+'</td><td style="width: 30px;">$'+subtotal+'</td><td><button type="button" class="btn btn-danger" onclick="eliminarProductoCotizado('+i+')"><i class="fa fa-trash"></i></button></td></tr>'
          $('#tabla').append(iter)
        })
      }, 400)

      swal(
        '¡Eliminado!',
        'El Producto ha sido eliminado.',
        'success'
      )
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
