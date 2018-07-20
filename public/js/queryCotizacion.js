function changeObservacion(val) {
  var suministro = "RESUMEN DE CONDICIONES DE VENTA \nCONDICIONES DE PAGO: 30 días a presentación de factura. \nPrecios Sin I.V.A.: Se agrega al Facturar"
                  + "\nVIGENCIA DE PRECIOS: 15 días \nLUGAR DE ENTREGA: LAB su almacén \nTIEMPO DE ENTREGA: \nPartida 1 y 2: 15 días hábiles una vez recibida su orden de compra."
                  + "\nPartida 3: 3 a 5 días hábiles una vez recibida su orden de compra, salvo previa venta."
                  + "\nMONEDA: USD Americanos pagaderosal tipo de cambio DOF vigente del dia de su pago ó directamente a nuestra cuenta en USD."
                  + "\n\nDATOS FISCALES \nRayos X y Servicios Industriales S.A. de C.V. \nCalle Júpiter No. 115 \nFracc. Galaxia \nVillahermosa, Tab. \nCP 86035 \nRFC: RXS050608SY3"
                  + "\n\nNo. de Cuenta BANAMEX: 8004175 SUC: 820 \nCLABE INTERBANCARIA: 002790082080041755 \nCuenta en USD: 7000 / 9669750"
  var plataforma = "OBSERVACIONES: \n1. EL CLIENTE se hará cargo de los permisos de trabajo y de las aportaciones sindicales que se llegaran a presentar."
                    + "\n2. EL CLIENTE preferentemente deberá confirmar con dos días de anticipación los trabajos para que RX prepare el Material, personal y equipo con oportunidad para la movilización a la obra."
                    + "\n3. EL CLIENTE suministra iluminación y de requerirse andamios seguros, asi como la preparación de los elementos a inspeccionar, lo que incluye el retiro"
                    + "de pintura nivel macro. De requerirse pintura, será responsabilidad del CLIENTE."
                    + "\n4. La unidad de trabajo causará renta desde el momento en que se presente en el puerto del Cliente y hasta que salga del mismo."
                    + "\n5. La jornada de trabajo contempla 12hrs."
                    + "\n6. EL CLIENTE se hará carga de la transportación muelle-costa afuera-muelle."
                    + "\n7. EL CLIENTE se hará cargo de la alimentación y hospedaje."
                    + "\n8. Cada Técnica de inspección implica una jornada diaria independientemente de que sea realizada por el mismo personal Técnico."
  var trabajos = ""

  switch (val.value) {
    case 'obs1':
      $('#observacion').val(suministro)
      break;
    case 'obs2':
      $('#observacion').val(plataforma)
      break;
    case 'obs3':
      $('#observacion').val(trabajos)
      break;
    default:
      $('#observacion').val('')
  }
}

function getProduct(val) {
  var id = val.value
  $.ajax({
    url: '/producto/'+id,
    type: 'GET',
    success: (res)=>{
      $('#price1').text('$'+res.priceSales1);
      $('#price2').text('$'+res.priceSales2);
      $('#price3').text('$'+res.priceSales3);
      $('#price4').text('$'+res.priceSales4);
      $('#price5').text('$'+res.priceSales5);

      $('#producto').val(res.category.type);
      $('#description').val(res.description);
      $('#price1').val(res.priceSales1);
      $('#price2').val(res.priceSales2);
      $('#price3').val(res.priceSales3);
      $('#price4').val(res.priceSales4);
      $('#price5').val(res.priceSales5);
      $('#currency').val(res.coin.type);
      $('#unit').val(res.unit);
      $('#precioUnitario').val("");
      $('#cantidad').val(1);
    }
  })
}

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
      $('#noCotizacion').val('RXS-0'+count+'-'+res.year+'-'+'{{ Auth::user()->user}}'+'-'+res.client.siglas)
    }
  })
}

var products = (JSON.parse(sessionStorage.getItem('products')) != null) ? JSON.parse(sessionStorage.getItem('products')) : []
if (products.length != 0) {
  products.map((item, i)=>{
    var iter = '';
    iter += '<tr id="fila'+i+'"><td><input name="producto'+i+'" class="form-control" value="'+item.product+'" readonly></td><td><input name="cantidad'+i+'" class="form-control" value="'+item.quantity+'" readonly></td><td><input name="unidad'+i+'" class="form-control" value="'+item.unit+'" readonly></td><td><input name="descripcion'+i+'" value="'+item.description+'" class="form-control" readonly></td><td><input name="precio'+i+'" class="form-control" value="$'+item.price+' '+item.currency+'" readonly></td><td><input name="subtotal'+i+'" class="form-control" value="$'+item.total.toFixed(2)+' '+item.currency+'" readonly></td><td><a class="btn btn-danger" onclick="deleteProduct(fila'+i+', '+i+');"><i class="fa fa-trash"></i></a></td><td style="display: none;"><input name="idProduct'+i+'" class="form-control" value="'+item.id+'" readonly></td></tr>'

    setTimeout(()=>{
      $('#count').val(products.length)
      $('#tabla').append(iter)
      totalAmount()
    },500)
  })
}

function addProduct() {

  var id = $('#searchProduct').val()
  var producto = $('#producto').val()
  var descripcion = $('#description').val()
  var precio = $('#precioUnitario').val()
  var cantidad = $('#cantidad').val()
  var moneda = $('#currency').val()
  var unidad = $('#unit').val()

  if (precio != '' && cantidad != '') {
    // validando que sean del mismo tipo de moneda
    if (products.length != 0) {
      if (products[0].currency != moneda) {
        swal({
          type: 'error',
          title: 'Error al cotizar',
          text: '¡Los productos cotizados deben ser del mismo tipo de moneda!'
        })
        return
      }
    }
    var findProduct = _.find(products,{ 'id' : id })
    // si el producto existe lo editamos
    if (findProduct != undefined && findProduct != null) {
      findProduct.quantity = Number(findProduct.quantity) + Number(cantidad)
      findProduct.price = precio
      findProduct.total = Number(findProduct.price) * Number(findProduct.quantity)

      products.map((item, i)=>{
        $('#fila'+i).remove();

        var iter = '';
        iter += '<tr id="fila'+i+'"><td><input name="producto'+i+'" class="form-control" value="'+item.product+'" readonly></td><td><input name="cantidad'+i+'" class="form-control" value="'+item.quantity+'" readonly></td><td><input name="unidad'+i+'" class="form-control" value="'+item.unit+'" readonly></td><td><input name="descripcion'+i+'" value="'+item.description+'" class="form-control" readonly></td><td><input name="precio'+i+'" class="form-control" value="$'+item.price+' '+item.currency+'" readonly></td><td><input name="subtotal'+i+'" class="form-control" value="$'+item.total.toFixed(2)+' '+item.currency+'" readonly></td><td><a class="btn btn-danger" onclick="deleteProduct(fila'+i+', '+i+');"><i class="fa fa-trash"></i></a></td><td style="display: none;"><input name="idProduct'+i+'" class="form-control" value="'+item.id+'" readonly></td></tr>'
        $('#tabla').append(iter)
      })
      sessionStorage.setItem('products',JSON.stringify(products))
      totalAmount()
    }else {
      // si no existe el producto lo creamos
      const product = {
        id: id,
        product: producto,
        description: descripcion,
        price: precio,
        quantity: cantidad,
        currency: moneda,
        unit: unidad,
        total: Number(precio) * Number(cantidad)
      }

      products.push(product)
      sessionStorage.setItem('products',JSON.stringify(products))

      products.map((item, i)=>{
        $('#fila'+i).remove();

        var iter = '';
        iter += '<tr id="fila'+i+'"><td><input name="producto'+i+'" class="form-control" value="'+item.product+'" readonly></td><td><input name="cantidad'+i+'" class="form-control" value="'+item.quantity+'" readonly></td><td><input name="unidad'+i+'" class="form-control" value="'+item.unit+'" readonly></td><td><input name="descripcion'+i+'" value="'+item.description+'" class="form-control" readonly></td><td><input name="precio'+i+'" class="form-control" value="$'+item.price+' '+item.currency+'" readonly></td><td><input name="subtotal'+i+'" class="form-control" value="$'+item.total.toFixed(2)+' '+item.currency+'" readonly></td><td><a class="btn btn-danger" onclick="deleteProduct(fila'+i+', '+i+');"><i class="fa fa-trash"></i></a></td><td style="display: none;"><input name="idProduct'+i+'" class="form-control" value="'+item.id+'" readonly></td></tr>'

        $('#tabla').append(iter)
        totalAmount()
      })
      $('#count').val(products.length)
    }
  }else {
    if (precio === '') {
      swal({
        type: 'error',
        title: 'Oops...',
        text: '¡El campo precio esta vacio!'
      })
    }
    if (cantidad === '') {
      swal({
        type: 'error',
        title: 'Oops...',
        text: '¡El campo cantidad esta vacio!'
      })
    }
  }
}

function deleteProduct(val, i) {
  var id = val.id
  swal({
    title: '¿Desea eliminar este producto?',
    text: "¡El producto se eliminara de la cotización!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3c8dbc',
    cancelButtonColor: '#dd4b39',
    confirmButtonText: 'Sí, eliminarlo!',
    cancelButtonText: 'No, cancelar!'
  }).then((res) => {
    if (res.value) {
      products.splice(i, i === 0 ? 1 : i)
      $('#'+id).remove();
      totalAmount()
      sessionStorage.clear();
      swal(
        '¡Eliminado!',
        'El Producto ha sido eliminado.',
        'success'
      )
      $('#count').val(products.length)
    }else if (res.dismiss === "cancel") {
      swal(
        '¡Cancelado!',
        'La accion fue cancelada.',
        'error'
      )
    }
  })
}

function totalAmount() {
  let neto = 0;

  products.map((item)=>{
    neto += Number(item.total)
  })

  $('#totalAmount1').text(neto.toFixed(2))
  $('#totalAmount').val(neto.toFixed(2))
}

function cambiarPrecio(val) {
  var price = Number(val)
  $('#precioUnitario').val(val)
  if (price === 0) {
    $('#precioUnitario').removeAttr('readonly')
    return
  }
  $('#precioUnitario').attr('readonly', 'readonly')
}

function getUnidad(val) {
  var value = val.value
  if (value === 'Otros') {
    $('#unidad').val('')
    $('#unidad').removeAttr('readonly');
  }else {
    $('#unidad').val(value)
    $('#unidad').attr('readonly', 'readonly');
  }
}
