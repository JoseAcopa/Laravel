@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Administrador
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
        <form role="form" method="POST" action="/admin/quotation">
          {{ csrf_field() }}
          <div class="box-body">
            <div class="col-md-4">
              <div class="form-group {{ $errors->has('folio') ? 'has-error' : '' }}">
                <label for="folio">Folio:</label>
                <input type="text" name="folio" class="form-control" placeholder="Folio">
              </div>
              <div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
                <label for="date">Fecha:</label>
                <input type="text" name="fecha" class="form-control" id="datepicker" placeholder="dd/mm/aaaa">
              </div>
              <div class="form-group {{ $errors->has('empresa') ? 'has-error' : '' }}">
                <label for="company">Nombre de la empresa:</label>
                <input type="text" name="empresa" class="form-control" placeholder="nombre de la empresa">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group {{ $errors->has('RFC') ? 'has-error' : '' }}">
                <label for="RFC">RFC:</label>
                <input type="text" name="RFC" class="form-control" placeholder="RFC">
              </div>
              <div class="form-group {{ $errors->has('telefono') ? 'has-error' : '' }}">
                <label for="telephone">Teléfono:</label>
                <input type="text" name="telefono" class="form-control" placeholder="telefono">
              </div>
              <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="name">Nombre Completo:</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre Completo">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group {{ $errors->has('puesto') ? 'has-error' : '' }}">
                <label for="job">Puesto:</label>
                <input type="text" name="puesto" class="form-control" placeholder="Puesto">
              </div>
              <div class="form-group {{ $errors->has('correo') ? 'has-error' : '' }}">
                <label for="mail">E-mail:</label>
                <input type="text" name="correo" class="form-control" placeholder="E-mail">
              </div>
              <div class="form-group {{ $errors->has('licitacion') ? 'has-error' : '' }}">
                <label for="nBidding">Número de Licitación:</label>
                <input type="text" name="licitacion" class="form-control" placeholder="Numero de Licitación">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('direccion') ? 'has-error' : '' }}">
                <label for="direction">Dirección:</label>
                <textarea type="text" rows="4" name="direccion" class="form-control" placeholder="dirección"></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('observaciones') ? 'has-error' : '' }}">
                <label for="observation">Observaciones:</label>
                <textarea type="text" rows="4" name="observaciones" class="form-control" placeholder="Observaciones"></textarea>
              </div>
            </div>

            <div class="col-md-12">
              <hr>
              <h3><i class="fa fa-plus"></i> Agregar Producto</h3>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Buscar Producto</label>
                <select id="searchProduct" class="form-control select2" onchange="getProduct(this);">
                  <option selected="selected" value="null">Buscar...</option>
                  @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->description }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label>Producto:</label>
                <input type="text" class="form-control" placeholder="producto" id="producto">
                <input type="text" id="description" hidden>
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
                <select class="form-control" id="precioUnitario">
                  <option selected="selected" value="">Selecciona precio</option>
                  <option id="price1"></option>
                  <option id="price2"></option>
                  <option id="price3"></option>
                  <option id="price4"></option>
                  <option id="price5"></option>
                </select>
              </div>
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
                    <th>Cantidad</th>
                    <th>Descripción</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                    <th>Eliminar</th>
                 </tr>
                </thead>
                <tbody id="tabla">

                </tbody>
              </table>
              <input type="text" name="neto" id="neto" hidden>
              <input type="text" name="iva" id="IVA" hidden>
              <input type="text" name="total" id="totalAmount" hidden>
              <input type="text" name="nombre" value="{{Auth::user()->name}}">
              <input type="text" name="correo" value="{{Auth::user()->email}}">
              <input type="text" name="phone" value="{{Auth::user()->phone}}">
              <h4 style="text-align: right">Neto: $<span id="neto1">0.00</span> </h4>
              <h4 style="text-align: right">IVA: $<span id="IVA1">0.00</span> </h4>
              <h3 style="text-align: right">Total: $<span id="totalAmount1">0.00</span> </h3>
            </div>
          </div>
          <div class="box-footer">
            <div class="pull-right">
              <a href="{{ url('/admin/quotation') }}" class="btn btn-danger"><i class="fa fa-times-rectangle-o"></i> Cancelar</a>
              <button type="submit" class="btn btn-primary"><i class="fa fa-file-pdf-o"></i>  Guardar e imprimir</button>
            </div>
          </div>
        </form>
      </div>
    </section>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#searchProduct").select2();
        $('#datepicker').datepicker({
          pickTime: false,
          autoclose: true,
          language: 'es',
          format: 'dd/mm/yyyy'
        });
      });
    </script>
    <script type="text/javascript">
      function getProduct(val) {
        var id = val.value
        $.ajax({
          url: '/producto/'+id,
          type: 'GET',
          success: (res)=>{
            $('#price1').text('$'+res.priceSales1+' '+res.coin.type);
            $('#price2').text('$'+res.priceSales2+' '+res.coin.type);
            $('#price3').text('$'+res.priceSales3+' '+res.coin.type);
            $('#price4').text('$'+res.priceSales4+' '+res.coin.type);
            $('#price5').text('$'+res.priceSales5+' '+res.coin.type);

            $('#producto').val(res.category.type);
            $('#description').val(res.description);
            $('#price1').val(res.priceSales1);
            $('#price2').val(res.priceSales2);
            $('#price3').val(res.priceSales3);
            $('#price4').val(res.priceSales4);
            $('#price5').val(res.priceSales5);
          }
        })
      }
    </script>
    <script type="text/javascript">
      var products = []

      function addProduct() {
        var id = $('#searchProduct').val()
        var producto = $('#producto').val()
        var descripcion = $('#description').val()
        var precio = $('#precioUnitario').val()
        var cantidad = $('#cantidad').val()

        if (precio != '' && cantidad != '') {
          var findProduct = _.find(products,{ 'id' : id })
          if (findProduct != undefined && findProduct != null) {
            findProduct.quantity = Number(findProduct.quantity) + Number(cantidad)
            findProduct.price = precio
            findProduct.total = Number(findProduct.price) * Number(findProduct.quantity)

            products.map((item, i)=>{
              $('#fila'+i).remove();

              var iter = '';
              iter += '<tr id="fila'+i+'"><td><input name="producto'+i+'" class="form-control" value="'+item.product+'" readonly></td><td><input name="cantidad'+i+'" class="form-control" value="'+item.quantity+'" readonly></td><td><input name="descripcion'+i+'" value="'+item.description+'" class="form-control" readonly></td><td><input name="precio'+i+'" class="form-control" value="$'+item.price+'" readonly></td><td><input name="subtotal'+i+'" class="form-control" value="$'+item.total.toFixed(2)+'" readonly></td><td><a class="btn btn-danger" onclick="deleteProduct(fila'+i+', '+i+');"><i class="fa fa-trash"></i></a></td></tr>'
              $('#tabla').append(iter)
            })
            totalAmount()
          }else {
            const product = {
              id: id,
              product: producto,
              description: descripcion,
              price: precio,
              quantity: cantidad,
              total: Number(precio) * Number(cantidad)
            }

            products.push(product)

            products.map((item, i)=>{
              $('#fila'+i).remove();

              var iter = '';
              iter += '<tr id="fila'+i+'"><td><input name="producto'+i+'" class="form-control" value="'+item.product+'" readonly></td><td><input name="cantidad'+i+'" class="form-control" value="'+item.quantity+'" readonly></td><td><input name="descripcion'+i+'" value="'+item.description+'" class="form-control" readonly></td><td><input name="precio'+i+'" class="form-control" value="$'+item.price+'" readonly></td><td><input name="subtotal'+i+'" class="form-control" value="$'+item.total.toFixed(2)+'" readonly></td><td><a class="btn btn-danger" onclick="deleteProduct(fila'+i+', '+i+');"><i class="fa fa-trash"></i></a></td></tr>'

              $('#tabla').append(iter)
              totalAmount()
            })
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
        }).then(() => {
          products.splice(i, i === 0 ? 1 : i)
          $('#'+id).remove();
          totalAmount()
          swal(
            '¡Eliminado!',
            'El Producto ha sido eliminado.',
            'success'
          )
        })

      }

      function totalAmount() {
        let neto = 0;
        let iva = 0
        products.map((item)=>{
          neto += Number(item.total)
        })


        iva = neto * .16
        total = neto + iva

        $('#neto1').text(neto.toFixed(2))
        $('#IVA1').text(iva.toFixed(2))
        $('#totalAmount1').text(total.toFixed(2))

        $('#neto').val(neto.toFixed(2))
        $('#IVA').val(iva.toFixed(2))
        $('#totalAmount').val(total.toFixed(2))
      }
    </script>

@endsection
