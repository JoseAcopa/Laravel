@extends('layouts.app')

@section('content')
    <section class="content-header">
      <h1>
        Salidas
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Salidas de Productos</li>
      </ol>
    </section>

    <section class="content container-fluid">
      <div class="box box-primary">
        <div class="box-header with-border">
          <div class="col-md-4">
            <h3 class="box-title"><i class="fa fa-plus"></i> Salida de Producto</h3>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <label>Buscar Producto</label>
              <select id="searchProduct" class="form-control select2" onchange="producto(this)">
                <option selected="selected" value="null">Buscar...</option>
                @foreach ($products as $product)
                  <option value="{{ $product->id }}">{{ $product->category->type }} | {{ $product->description }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <form role="form" method="POST" action="{{route('salida.store')}}">
          {{ csrf_field() }}
          <div class="box-body">
            <div class="col-md-4">
              <div class="form-group">
                <label for="factura">N° de Factura:</label>
                <input type="text" name="factura" class="form-control" placeholder="Número Factura">
                <input type="text" name="idProduct" id="idProduct" value="{{ old('idProduct') }}" hidden>
              </div>
              <div class="form-group {{ $errors->has('categoria-view') ? 'has-error' : '' }}">
                <div class="row">
                  <div class="col-xs-8">
                    <label for="categoria-view">Tipo de Producto:</label>
                    <input type="text" name="categoria-view" id="categoria-view" value="{{ old('categoria-view') }}" class="form-control" readonly>
                    <input type="text" name="categoria" id="categoria" value="{{ old('categoria') }}" hidden>
                    {!! $errors->first('categoria-view','<span class="help-block">:message</span>')!!}
                  </div>
                  <div class="col-xs-4 top-copasat">
                    <input type="text" id="letter" class="form-control" name="iniciales" value="{{ old('iniciales') }}" readonly>
                  </div>
                </div>
              </div>
              <div class="form-group {{ $errors->has('proveedor-view') ? 'has-error' : '' }}">
                <label for="proveedor-view">Proveedor:</label>
                <input type="text" name="proveedor-view" id="proveedor-view" value="{{ old('proveedor-view') }}" class="form-control" readonly>
                <input type="text" name="proveedor" id="proveedor" value="{{ old('proveedor') }}" hidden>
                {!! $errors->first('proveedor-view','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('unidad') ? 'has-error' : '' }}">
                <label for="unidad">Unidad de Medida:</label>
                <input type="text" name="unidad" id="unidad" value="{{ old('unidad') }}" class="form-control" readonly>
                {!! $errors->first('unidad','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group {{ $errors->has('salida') ? 'has-error' : '' }}">
                <label for="salida">Fecha de Salida:</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input type="text" value="{{ old('salida') }}" name="salida" class="form-control" id="datepickerSalida" placeholder="dd/mm/aaaa">
                </div>
                {!! $errors->first('salida','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('stock') ? 'has-error' : '' }}">
                <label for="stock">Existencia:</label>
                <input type="number" name="stock" id="stock" value="{{ old('stock') }}" class="form-control" readonly>
                {!! $errors->first('stock','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('cantidad') ? 'has-error' : '' }}">
                <label for="cantidad">Cantidad de Salida:</label>
                <input type="number" name="cantidad" id="cantidad" value="{{ old('cantidad') }}" class="form-control" placeholder="cantidad">
                {!! $errors->first('cantidad','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('precio') ? 'has-error' : '' }}">
                <div class="row">
                  <div class="col-xs-7">
                    <label for="precio">Precio de venta:</label>
                    <select name="precio1" value="{{ old('precio') }}" class="form-control" onchange="precioVenta(this);">
                      <option value="">Seleccione precio</option>
                      <option id="pv1"></option>
                      <option id="pv2"></option>
                      <option id="pv3"></option>
                      <option id="pv4"></option>
                      <option id="pv5" value="precioVenta5"></option>
                    </select>
                  </div>
                  <div class="col-xs-5 top-copasat">
                    <input type="number" class="form-control" name="precio" id="precio" value="{{ old('precio') }}" readonly step=".01">
                  </div>
                </div>
                {!! $errors->first('precio','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group {{ $errors->has('precio_lista') ? 'has-error' : '' }}">
                <label for="pricelist">Precio Lista:</label>
                <input type="number" name="precio_lista" id="priceList" value="{{ old('precio_lista') }}" class="form-control" readonly step=".01">
                {!! $errors->first('precio_lista','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('costo') ? 'has-error' : '' }}">
                <label for="cost">Costo:</label>
                <input type="number" name="costo" id="cost" value="{{ old('costo') }}" class="form-control" readonly>
                {!! $errors->first('costo','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('moneda') ? 'has-error' : '' }}">
                <label for="moneda">Moneda:</label>
                <input type="text" name="moneda" id="moneda" value="{{ old('moneda') }}" class="form-control" readonly>
                <input type="text" name="idMoneda" id="idMoneda" value="{{ old('idMoneda') }}" hidden>
                {!! $errors->first('moneda','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">Descripción:</label>
                <textarea type="text" rows="4" name="description" id="description" placeholder="Descripción" class="form-control" readonly>{{ old('description') }}</textarea>
                {!! $errors->first('description','<span class="help-block">:message</span>')!!}
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-lg"></i> Guardar</button>
            <a href="{{url('admin/salidas')}}" class="btn btn-danger"><i class="fa fa-times-rectangle-o fa-lg"></i> Cancelar</a>
          </div>
        </form>
      </div>
    </section>
    <script type="text/javascript">
      function producto(val) {
        var id = val.value;
        $('#idProduct').val(id);
        $.ajax({
          url: '/producto/'+id,
          type: 'GET',
          success: (res)=>{
            $('#categoria-view').val(res.category.type);
            $('#categoria').val(res.category.id);
            $('#letter').val(res.category.letters);
            $('#proveedor-view').val(res.supplier.business);
            $('#proveedor').val(res.supplier.id);
            $('#unidad').val(res.unit);
            $('#stock').val(res.stock);
            $('#pv1').text(res.priceSales1);
            $('#pv2').text(res.priceSales2);
            $('#pv3').text(res.priceSales3);
            $('#pv4').text(res.priceSales4);
            $('#pv5').text(res.priceSales5);
            $('#priceList').val(res.priceList);
            $('#cost').val(res.cost);
            $('#moneda').val(res.coin.type);
            $('#idMoneda').val(res.coin.id);
            $('#description').val(res.description);
          }
        })
      }
    </script>
    <script>
      function precioVenta(val) {

        if (val.value === "precioVenta5") {
          $('#precio').val('')
          $('#precio').removeAttr('readonly')
        }else {
          $('#precio').val(val.value)
          $('#precio').attr('readonly', 'readonly')
        }
      }
    </script>

@endsection
