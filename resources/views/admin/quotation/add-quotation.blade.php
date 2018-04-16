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
                <input type="date" name="fecha" class="form-control">
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
                <select id="searchProduct" class="form-control select2" onchange="product(this);">
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
                <input type="text" name="producto" class="form-control" placeholder="producto" id="producto">
                <input type="text" name="description" id="description" hidden>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group">
                <label>Cantidad:</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="0" min="0">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label>Precios:</label>
                <select class="form-control" id="precioUnitario">
                  <option selected="selected" value="null">Selecciona precio</option>
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
              <button type="button" name="button" class="btn btn-primary" onclick="addProduct()"><i class="fa fa-plus fa-lg"></i></button>
            </div>

            <div class="col-md-12">
              <br>
              <table class="table table-bordered table-striped">
                <thead>
                  <tr class="info">
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Descripción</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                    <th>Eliminar</th>
                 </tr>
                </thead>
                <tbody id="tabla">

                </tbody>
              </table>
              <a href="#" class="btn btn-default"><i class="fa fa-file-pdf-o"></i> Imprimir PDF</a>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
            <a href="{{ url('/admin/quotation') }}" class="btn btn-danger"><i class="fa fa-times-rectangle-o"></i> Cancelar</a>
          </div>
        </form>
      </div>
    </section>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#searchProduct").select2();
      });
    </script>
    <script type="text/javascript">
      function product(val) {
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
      // _.find(products,{ 'id' : id })
      function addProduct() {
        var id = $('#searchProduct').val()
        var producto = $('#producto').val()
        var descripcion = $('#description').val()
        var precio = $('#precioUnitario').val()
        var cantidad = $('#cantidad').val()

        const product = {
          id: id,
          product: producto,
          description: descripcion,
          price: precio,
          quantity: cantidad,
          total: Number(precio) * Number(cantidad)
        }

        products.push(product)

        products.map((item)=>{
          var iter = '';
          iter += '<tr><td>'+item.product+'</td><td>'+item.quantity+'</td><td>'+item.description+'</td><td>$'+item.price+'</td><td>$'+item.total+'</td><td><a class="btn btn-danger"><i class="fa fa-times"></i></a></td></tr>'
          console.log(iter);
          document.getElementById('tabla').innerHTML = iter;
        })
      }
    </script>

@endsection
