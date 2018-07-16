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
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-book"></i> Realizar Cotización</h3>
        </div>
        <form role="form" method="POST" action="{{route('cotizacion.store')}}">
          {{ csrf_field() }}
          <br>
          <div class="col-md-12">
            <div class="box box-primary box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Buscar cliente</h3>
              </div>
              <div class="box-body" style="">
                <div class="form-group">
                  <label>Clientes</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <select class="form-control select2" style="width: 100%;" onchange="getClient(this)">
                      <option selected="selected" value="null">Buscar...</option>
                      @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{$client->business}} | {{$client->email}} | {{$client->phone}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box-body">
            <div class="col-md-4">
              <input type="text" name="total" id="totalAmount" hidden>
              <input type="text" name="count" id="count" hidden>
              <input type="text" name="cliente" value="{{ old('cliente') }}" id="cliente" hidden>
              <div class="form-group {{ $errors->has('cotizacion') ? 'has-error' : '' }}">
                <label for="cotizacion">No. de Cotización:</label>
                <input type="text" value="{{ old('cotizacion') }}" name="cotizacion" class="form-control" placeholder="no. de cotización" id="noCotizacion" readonly>
                {!! $errors->first('cotizacion','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('RFC') ? 'has-error' : '' }}">
                <label for="RFC">RFC:</label>
                <input type="text" id="rfc" value="{{ old('RFC') }}" name="RFC" class="form-control" placeholder="RFC" readonly>
                {!! $errors->first('RFC','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('empresa') ? 'has-error' : '' }}">
                <label for="empresa">Nombre de la empresa:</label>
                <input type="text" value="{{ old('empresa') }}" id="empresa" name="empresa" class="form-control" placeholder="nombre de la empresa" readonly>
                {!! $errors->first('empresa','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
                <label for="date">Fecha:</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input type="text" value="{{ old('fecha') }}" name="fecha" class="form-control" id="datepicker" placeholder="dd/mm/aaaa">
                </div>
                {!! $errors->first('fecha','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('telefono') ? 'has-error' : '' }}">
                <label for="telefono">Teléfono:</label>
                <input type="text" value="{{ old('telefono') }}" id="telefono" name="telefono" class="form-control" placeholder="telefono" readonly>
                {!! $errors->first('telefono','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">Nombre Completo:</label>
                <input type="text" value="{{ old('nombre') }}" name="nombre" class="form-control" placeholder="nombre completo">
                {!! $errors->first('nombre','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group {{ $errors->has('licitacion') ? 'has-error' : '' }}">
                <label for="licitacion">Número de Licitación:</label>
                <input type="text" value="{{ old('licitacion') }}" name="licitacion" class="form-control" placeholder="numero de licitación">
                {!! $errors->first('licitacion','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('correo') ? 'has-error' : '' }}">
                <label for="correo">E-mail:</label>
                <input type="text" value="{{ old('correo') }}" id="correo" name="correo" class="form-control" placeholder="e-mail" readonly>
                {!! $errors->first('correo','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('puesto') ? 'has-error' : '' }}">
                <label for="puesto">Puesto:</label>
                <input type="text" value="{{ old('puesto') }}" name="puesto" class="form-control" placeholder="puesto">
                {!! $errors->first('puesto','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('direccion') ? 'has-error' : '' }}">
                <label for="direction">Dirección:</label>
                <textarea type="text" id="direccion" rows="3" name="direccion" class="form-control" placeholder="dirección" readonly>{{ old('direccion') }}</textarea>
                {!! $errors->first('direccion','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="observaciones">Observaciones:</label>
                <select class="form-control" onchange="changeObservacion(this)">
                  <option value="null"> seleccione</option>
                  <option value="obs1">Suministro</option>
                  <option value="obs2">Plataforma</option>
                  <option value="obs3">Trabajos en tierra</option>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group {{ $errors->has('observaciones') ? 'has-error' : '' }}">
                <textarea type="text" rows="8" id="observacion" name="observaciones" class="form-control" placeholder="observaciones">{{ old('observaciones') }}</textarea>
                {!! $errors->first('observaciones','<span class="help-block">:message</span>')!!}
              </div>
            </div>

            <div class="col-md-12">
              <hr>
              <h4><i class="fa fa-book"></i> Cotizar Producto</h4>
              <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> Nuevo Producto</a>
              <br><br>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Buscar Producto</label>
                <select id="searchProduct" class="form-control select2" style="width: 100%;" onchange="getProduct(this);">
                  <option selected="selected" value="null">Buscar...</option>
                  @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->category->type }} | {{ $product->description }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label>Producto:</label>
                <input type="text" class="form-control" placeholder="producto" id="producto" readonly>
                <input type="text" id="description" hidden>
                <input type="text" id="currency" hidden>
                <input type="text" id="unit" hidden>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group">
                <label>Cantidad:</label>
                <input type="number" id="cantidad" class="form-control" placeholder="0" min="1" value="">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label>Precios:</label>
                <select class="form-control" id="" onchange="cambiarPrecio(this.value);" >
                  <option selected="selected" value="">Selecciona precio</option>
                  <option id="price1"></option>
                  <option id="price2"></option>
                  <option id="price3"></option>
                  <option id="price4"></option>
                  <option id="price5" value="price5"></option>
                </select>
              </div>
            </div>
            <div class="col-md-2" style="margin-top: 25px;">
              <input type="text" name="" class="form-control" id="precioUnitario" readonly>
            </div>
            <div class="col-md-1">
              <label>Agregar:</label>
              <button type="button" class="btn btn-block btn-primary btn-flat" onclick="addProduct()"><i class="fa fa-plus fa-lg"></i></button>
            </div>

            <div class="col-md-12">
              <br>
              <table class="table table-bordered table-striped">
                <thead>
                  <tr style="background-color: #a5b1c2 !important; color: #fff !important;">
                    <th>Producto</th>
                    <th>Cant.</th>
                    <th>Unidad</th>
                    <th>Descripción del producto</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                    <th>Eliminar</th>
                 </tr>
                </thead>
                <tbody id="tabla">

                </tbody>
              </table>
              <h3 style="text-align: right">Total: $<span id="totalAmount1">0.00</span> </h3>
            </div>
          </div>
          <div class="box-footer">
            <div class="pull-right">
              <a href="{{ url('/admin/cotizacion') }}" class="btn btn-danger"><i class="fa fa-times-rectangle-o"></i> Cancelar</a>
              <button type="submit" class="btn btn-primary"><i class="fa fa-file-pdf-o"></i>  Guardar e imprimir</button>
            </div>
          </div>
        </form>
      </div>
      @include('admin.quotation.formModal')
    </section>
    <script type="text/javascript">
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
    </script>
    <script type="text/javascript">
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
    </script>
@endsection
