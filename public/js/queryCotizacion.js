function changeObservacion(val) {
  var suministro = "RESUMEN DE CONDICIONES DE VENTA \nCONDICIONES DE PAGO: 30 días a presentación de factura. \nPrecios Sin I.V.A.: Se agrega al Facturar"
                  + "\nVIGENCIA DE PRECIOS: 15 días \nLUGAR DE ENTREGA: LAB su almacén \nTIEMPO DE ENTREGA: \nPartida 1 y 2: 15 días hábiles una vez recibida su orden de compra."
                  + "\nPartida 3: 3 a 5 días hábiles una vez recibida su orden de compra, salvo previa venta."
                  + "\nMONEDA: USD Americanos pagaderosal tipo de cambio DOF vigente del dia de su pago ó directamente a nuestra cuenta en USD."
                  + "\n\nDATOS FISCALES \nRayos X y Servicios Industriales S.A. de C.V. \nCalle Júpiter No. 115 \nFracc. Galaxia \nVillahermosa, Tab. \nCP 86035 \nRFC: RXS050608SY3"
                  + "\n\nNo. de Cuenta BANAMEX: 8004175 SUC: 820 \nCLABE INTERBANCARIA: 002790082080041755 \nCuenta en USD: 7000 / 9669750"
  var plataforma = "OBSERVACIONES: \n1. EL CLIENTE se hará cargo de los permisos de trabajo y de las aportaciones sindicales que se llegaran a presentar."
                          + "\n2. EL CLIENTE preferentemente deberá confirmar con dos días de anticipación los trabajos para que RX prepare el Material, personal y equipo con oportunidad para la movilización a la obra."
                          + "\n3. EL CLIENTE suministra iluminación y de requerirse andamios seguros, así como la preparación de los elementos a inspeccionar, lo que incluye el retiro"
                          + " de pintura nivel macro. De requerirse pintura, será responsabilidad del CLIENTE."
                          + "\n4. La unidad de trabajo causará renta desde el momento en que se presente en el puerto del Cliente y hasta que salga del mismo."
                          + "\n5. La jornada de trabajo contempla 12hrs."
                          + "\n6. EL CLIENTE se hará carga de la transportación muelle-costa afuera-muelle."
                          + "\n7. EL CLIENTE se hará cargo de la alimentación y hospedaje."
                          + "\n8. Cada Técnica de inspección implica una jornada diaria independientemente de que sea realizada por el mismo personal Técnico."
                          + "\n\n1). Partículas Magnéticas"
                          + "\n1. Se utilizarán partículas húmedas y/o secas, por el método de bobina y/o yugo."
                          + "\n2. Se cobrará jornada + metro lineal inspeccionado."
                          + "\n3. Rendimientos máximos por jornada a nivel de piso: 40 metros lineales."
                          + "\n4. Si el CLIENTE requiere un avance mayor al establecido, se cobrará una jornada adicional."
                          + "\n5. Los avances estarán condicionados a la entrega del avance por parte del cliente, altura, condiciones de acceso y condiciones climatológicas por lo que deberá considerarse en campo."
                          + "\n\n2). Líquidos Penetrantes"
                          + "\n1. Se utilizarán líquidos penetrantes de acuerdo al tipo de soldadura y material."
                          + "\n2. Se cobrará jornada + metro lineal inspeccionado."
                          + "\n3. Rendimientos máximos por jornada a nivel de piso: 40 metros lineales."
                          + "\n4. Si el CLIENTE requiere un avance mayor al establecido, se cobrará una jornada adicional."
                          + "\n5. Los avances estarán condicionados a la entrega del avance por parte del cliente, altura, condiciones de acceso y condiciones climatológicas por lo que deberá considerarse en campo."
                          + "\n\n3). Radiografías"
                          + "\n1. Se utilizará el equipo de inspección de Rayos Gamma de acuerdo a la necesidad y solicitud del Cliente."
                          + "\n2. Se cobrará jornada + junta inspeccionada para linea regular."
                          + "\n3. Se cobrará jornada + placa tomada para tanques ó ."
                          + "\n4. Se cobrará jornada + placa tomada para calificación de soldador."
                          + "\n5. Rendimientos máximos por jornada en cédula y nivel de piso:"
                          + "\n Juntas de 1' a 4' 18 por jornada."
                          + "\n Juntas de 6' a 14' 15 por jornada."
                          + "\n Juntas de 16' a 22' 8 por jornada."
                          + "\n Juntas de 24' a 30' 4 por jornada."
                          + "\n Juntas de 36' a 42' 2 por jornada."
                          + "\n Juntas de 44' a 48' 1 por jornada."
                          + "\n6. Si el CLIENTE requiere un avance mayor al establecido, se cobrará una jornada adicional."
                          + "\n7. Los avances estarán condicionados a la entrega del avance por parte del cliente, altura, condiciones de acceso y condiciones climatológicas por lo que deberá considerarse en campo."
                          + "\n\n4). Ultrasonido"
                          + "\n1. Se utilizarán transductores con ángulo de 45°, 60°o 70° para la detección de discontinuidades de uniones a tope para detección de fallas."
                          + "\n2. Se cobrará jornada + metro lineal inspeccionado en el caso de haz angular."
                          + "\n3. Se cobrará jornada + metro lineal inspeccionado en el caso de haz recto."
                          + "\n4. Se cobrará jornada + metro lineal inspeccionado en el caso medición de espesores."
                          + "\n5. Rendimientos máximos por jornada en cédula y nivel de piso para haz recto: 7 metros 2."
                          + "\n6. Rendimientos máximos por jornada en cédula y nivel de piso para haz angular: 20 metros lineales."
                          + "\n7. Rendimientos máximos por jornada en cédula y nivel de piso para medición de espesores: 250 puntos."
                          + "\n8. Si el CLIENTE requiere un avance mayor al establecido, se cobrará una jornada adicional."
                          + "\n9. Los avances estarán condicionados a la entrega del avance por parte del cliente, altura, condiciones de acceso y condiciones climatológicas por lo que deberá considerarse en campo."
                          + "\n\n5). Inspección Visual"
                          + "\n1. Se cobrará jornada + metro lineal inspeccionado."
                          + "\n2. Rendimientos máximos por jornada a nivel de piso: 40 metros lineales."
                          + "\n3. Si el CLIENTE requiere un avance mayor al establecido, se cobrará una jornada adicional."
                          + "\n4. Los avances estarán condicionados a la entrega del avance por parte del cliente, altura, condiciones de acceso y condiciones climatológicas por lo que deberá considerarse en campo."
                          + "\n\n6). Metalografía "
                          + "\n1. Se determinará el tipo de grano y material a la base de pulido en la zona especificada por el cliente."
                          + "\n2. Se cobrará  por muestra analizada."
                          + "\n\n7). Prueba de Dureza "
                          + "\n1. Se tomará lectura en la escuela que el Cliente decida."
                          + "\n2. Se cobrará jornada + junta tomada."
                          + "\n3. Rendimientos máximos por jornada a nivel de piso: 30 puntos."
                          + "\n4. Si el CLIENTE requiere un avance mayor al establecido, se cobrará una jornada adicional."
                          + "\n5. Los avances estarán condicionados a la entrega del avance por parte del cliente, altura, condiciones de acceso y condiciones climatológicas por lo que deberá considerarse en campo."
                          + "\n\nII) LAS INSPECCIONES SERÁN REALIZADAS POR PERSONAL CERTIFICADO DE ACUERDO  A SNT-TC-1A EN: "
                          + "\n1). Partículas Magnéticas en NIVEL II"
                          + "\n2). Líquidos Penetrantes  en NIVEL II"
                          + "\n3). Radiografías en NIVEL II"
                          + "\n4). Ultrasonido en NIVEL II"
                          + "\n5). Inspección Visual en NIVEL II"
  var trabajos = "OBSERVACIONES: \n1. EL CLIENTE se hará cargo de los permisos de trabajo y de las aportaciones sindicales que se llegaran a presentar."
                          + "\n2. EL CLIENTE preferentemente deberá confirmar con dos días de anticipación los trabajos para que RX prepare el Material, personal y equipo con oportunidad para la movilización a la obra."
                          + "\n3. EL CLIENTE suministra iluminación y de requerirse andamios seguro. Además deberá suministrar la preparación de las secciones a inspeccionar, eso implica, retiro"
                          + " de pintura nivel macro. De requerirse pintura, será responsabilidad del CLIENTE."
                          + "\n4. Las reparaciones serán cobradas como junta al 100%."
                          + "\n5. La jornada de trabajo contempla 8hrs, siendo 6 hrs de trabajo de campo y 2 de laboratorio para elaboración de reporte. En caso de realizar el avance en menos tiempo estipulado,"
                          + "indistintamente se cobrará la jornada indicada en la partida correspondiente."
                          + "\n6. En caso de cancelar el servicio el CLIENTE deberá hacerlo al menos dos horas antes de la hr solicitada, ya que una vez que salga la unidad de la base se cargará la jornada correspondiente."
                          + "\n7. El horario de atención es de lunes a viernes de 18:00 a 14 hrs, para servicios fuera del horario de atención, favor de considerar el 30% de incremento en el precio a cada partida."
                          + "\n8. En caso de solicitar a la unidad que permanezca más allá de sus 6 horas de trabajo de campo, se cobrará una jornada adicional."
                          + "\n9. Cada Técnica genera jornada independientemente de que sea realizada por el mismo personal Técnico."
                          + "\n10. En caso de tiempos muertos no imputables a RX como libranzas, mal tiempo, permisos de accesos, paros de emergencia, se cobrará la jornada indicada en la partida correspondiente."
                          + "\n11. Para trabajos foráneos que impliquen traslados mayores a 100 km de la base operativa ó lla estancia del personal Técnico en la zona de trabajo, por favor de contactar a la Gerencia para cotizar traslados viáticos."
                          + "\n\n1). Partículas Magnéticas"
                          + "\n1. Se utilizarán partículas húmedas y/o secas, por el método de bobina y/o yugo."
                          + "\n2. Se cobrará jornada + metro lineal inspeccionado."
                          + "\n3. Rendimientos máximos por jornada a 40 metros lineales."
                          + "\n4. Si el CLIENTE requiere un avance mayor al establecido, se cobrará una jornada adicional."
                          + "\n5. Los avances estarán condicionados a la entrega del avance por parte del cliente, altura, condiciones de acceso y condiciones climatológicas por lo que deberá considerarse en campo."
                          + "\n\n2). Líquidos Penetrantes"
                          + "\n1. Se utilizarán líquidos penetrantes de acuerdo al tipo de soldadura y material."
                          + "\n2. Se cobrará jornada + metro lineal inspeccionado."
                          + "\n3. Rendimientos máximos por jornada a nivel de piso: 40 metros lineales."
                          + "\n4. Si el CLIENTE requiere un avance mayor al establecido, se cobrará una jornada adicional."
                          + "\n5. Los avances estarán condicionados a la entrega del avance por parte del cliente, altura, condiciones de acceso y condiciones climatológicas por lo que deberá considerarse en campo."
                          + "\n\n3). Radiografías"
                          + "\n1. Se utilizará el equipo de inspección de Rayos Gamma de acuerdo a la necesidad y solicitud del Cliente."
                          + "\n2. Se cobrará jornada + junta inspeccionada para linea regular."
                          + "\n3. Se cobrará jornada + placa tomada para tanques ó ."
                          + "\n4. Se cobrará jornada + placa tomada para calificación de soldador."
                          + "\n5. Rendimientos máximos por jornada en cédula y nivel de piso:"
                          + "\n Juntas de 1' a 4' 18 por jornada."
                          + "\n Juntas de 6' a 14' 15 por jornada."
                          + "\n Juntas de 16' a 22' 8 por jornada."
                          + "\n Juntas de 24' a 30' 4 por jornada."
                          + "\n Juntas de 36' a 42' 2 por jornada."
                          + "\n Juntas de 44' a 48' 1 por jornada."
                          + "\n6. Si el CLIENTE requiere un avance mayor al establecido, se cobrará una jornada adicional."
                          + "\n7. Los avances estarán condicionados a la entrega del avance, cédula, altura y vida de la fuente, por lo que deberá considerarse en campo."
                          + "\n\n4). Ultrasonido"
                          + "\n1. Se utilizarán transductores con ángulo de 45°, 60°o 70° para la detección de discontinuidades de uniones a tope para detección de discontinuidades de uniones a tope para detección de fallas."
                          + "\n2. Se cobrará jornada + metro lineal inspeccionado en el caso de haz angular."
                          + "\n3. Se cobrará jornada + metro lineal inspeccionado en el caso de haz recto."
                          + "\n4. Se cobrará jornada + metro lineal inspeccionado en el caso medición de espesores."
                          + "\n5. Rendimientos máximos por jornada en cédula y nivel de piso para haz recto: 7 metros 2."
                          + "\n6. Rendimientos máximos por jornada en cédula y nivel de piso para haz angular: 20 metros lineales."
                          + "\n7. Rendimientos máximos por jornada en cédula y nivel de piso para medición de espesores: 250 puntos."
                          + "\n8. Si el CLIENTE requiere un avance mayor al establecido, se cobrará una jornada adicional."
                          + "\n9. Los avances estarán condicionados a la entrega del avance por parte del cliente, altura, condiciones de acceso y condiciones climatológicas por lo que deberá considerarse en campo."
                          + "\n\n5). Inspección Visual"
                          + "\n1. Se cobrará jornada + metro lineal inspeccionado."
                          + "\n2. Rendimientos máximos por jornada a nivel de piso: 40 metros lineales."
                          + "\n3. Si el CLIENTE requiere un avance mayor al establecido, se cobrará una jornada adicional."
                          + "\n4. Los avances estarán condicionados a la entrega del avance por parte del cliente, altura, condiciones de acceso y condiciones climatológicas por lo que deberá considerarse en campo."
                          + "\n\n6). Metalografía "
                          + "\n1. Se determinará el tipo de grano y material a la base de pulido en la zona especificada por el cliente."
                          + "\n2. Se cobrará  por muestra analizada."
                          + "\n\n7). Prueba de Dureza "
                          + "\n1. Se tomará lectura en la escuela que el Cliente decida."
                          + "\n2. Se cobrará jornada + junta tomada."
                          + "\n3. Rendimientos máximos por jornada a nivel de piso: 30 puntos."
                          + "\n4. Si el CLIENTE requiere un avance mayor al establecido, se cobrará una jornada adicional."
                          + "\n5. Los avances estarán condicionados a la entrega del avance por parte del cliente, altura, condiciones de acceso y condiciones climatológicas por lo que deberá considerarse en campo."
                          + "\n\nII) LAS INSPECCIONES SERÁN REALIZADAS POR PERSONAL CERTIFICADO DE ACUERDO  A SNT-TC-1A EN: "
                          + "\n1). Partículas Magnéticas en NIVEL II"
                          + "\n2). Líquidos Penetrantes  en NIVEL II"
                          + "\n3). Radiografías en NIVEL II"
                          + "\n4). Ultrasonido en NIVEL II"
                          + "\n5). Inspección Visual en NIVEL II"

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

function priceSales() {
  var categoria = $("#categoria-view").val()
  var priceList = $("#priceList").val()
  var cost = $("#cost").val()
  var cat1 = [.70, .65, .60, .57]
  var cat2 = [.40, .37, .36, .35]
  var cat3 = [.70, .75, .80, .85]
  var newRes = []

  if (categoria === 'Petrolera | Industrial') {
    var newCost = priceList * .50
    $('#cost').val(newCost)
    for (var i = 0; i < cat1.length; i++) {
      var res = cat1[i] * priceList
      newRes.push(res)
      $('#pv1').text("(x0.70)")
      $('#pv2').text("(x0.65)")
      $('#pv3').text("(x0.60)")
      $('#pv4').text("(x0.57)")
    }
  }else if (categoria === 'Hidraulica') {
    var newCost = priceList * .29
    console.log(newCost);
    $('#cost').val(newCost)
    for (var i = 0; i < cat2.length; i++) {
      var res = cat2[i] * newCost
      newRes.push(res)
      $('#pv1').text("(x0.40)")
      $('#pv2').text("(x0.37)")
      $('#pv3').text("(x0.36)")
      $('#pv4').text("(x0.35)")
    }
  }else if (categoria === 'Otro') {
    for (var i = 0; i < cat3.length; i++) {
      var res = cost / cat3[i]
      newRes.push(res)
      $('#pv1').text("(/ 0.70)")
      $('#pv2').text("(/ 0.75)")
      $('#pv3').text("(/ 0.80)")
      $('#pv4').text("(/ 0.85)")
    }
  }

  if (categoria.length > 0) {
    $('#priceSales1').val(newRes[0].toFixed(2))
    $('#priceSales2').val(newRes[1].toFixed(2))
    $('#priceSales3').val(newRes[2].toFixed(2))
    $('#priceSales4').val(newRes[3].toFixed(2))
  }
}
