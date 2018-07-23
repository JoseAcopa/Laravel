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
                <input type="text" value="{{ old('correo') }}" id="correo" name="correo" class="form-control" placeholder="e-mail">
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
                <textarea type="text" rows="16" id="observacion" name="observaciones" class="form-control" placeholder="observaciones">{{ old('observaciones') }}</textarea>
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
                  <option selected="selected" value="">Selecciona</option>
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
    <script type="text/javascript" src="{{ asset('js/queryCotizacion.js') }}"></script>
    <script type="text/javascript">
      // funciones para agregar datos del formulario
      function typeProduct(val){
        var priceList = $("#priceList").val()
        var cost = $("#cost").val()
        var cat1 = [.70, .65, .60, .57]
        var cat2 = [.40, .37, .36, .35]
        var cat3 = [.70, .75, .80, .85]
        var newRes = []
        var categories = <?php echo$categories;?>;
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
    </script>
@endsection
