@extends('layouts.app')

@section('content')
    <section class="content-header">
      <h1>
        Administrador
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Editar Productos</li>
      </ol>
    </section>

    <section class="content container-fluid">
      <div class="box box-primary">
        <div class="box-header with-border">
          <div class="col-md-4">
            <h3 class="box-title"><i class="fa fa-edit"></i> Editar Producto</h3>
          </div>
        </div>
        {!! Form::model($product, ['method' => 'PATCH','route' => ['inventary.update', $product->id], 'role' => 'form']) !!}
          {{ csrf_field() }}
          <div class="box-body">
            <div class="col-md-4">
              <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                <div class="row">
                  <div class="col-xs-8">
                    <label for="TProduct">Tipo de Producto:</label>
                    <input type="text" value="{{$product->category->type}}" class="form-control" readonly>
                    <input type="text" value="{{$product->category->id}}" name="category" hidden>
                    {!! $errors->first('category','<span class="help-block">:message</span>')!!}
                  </div>
                  <div class="col-xs-4 top-copasat">
                    <input type="text" class="form-control" name="initials" value="{{$product->initials}}" readonly>
                  </div>
                </div>
              </div>
              <div class="form-group {{ $errors->has('proveedor-view') ? 'has-error' : '' }}">
                <label for="proveedor">Proveedor:</label>
                <input type="text" name="proveedor-view" id="proveedor" value="{{$product->supplier->business}}" class="form-control" readonly>
                <input name="proveedor" value="{{$product->supplier->id}}" hidden>
                {!! $errors->first('proveedor-view','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group {{ $errors->has('fecha_entrada') ? 'has-error' : '' }}">
                <label for="fecha_entrada">Fecha de Entrada:</label>
                <input type="date" name="fecha_entrada" id="fecha_entrada" value="{{$product->checkin}}" class="form-control">
                {!! $errors->first('fecha_entrada','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('cantidad_entrada') ? 'has-error' : '' }}">
                <label for="cantidad_entrada">Stock:</label>
                <input type="number" name="cantidad_entrada" id="cantidad_entrada" value="{{$product->stock}}" class="form-control" placeholder="Cantidad Entrada" min="0">
                {!! $errors->first('cantidad_entrada','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('unidad') ? 'has-error' : '' }}">
                <label for="unidad">Unidad de Medida:</label>
                <input type="text" name="unidad" id="unidad" value="{{$product->unit}}" class="form-control" readonly>
                {!! $errors->first('unidad','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group {{ $errors->has('precio_lista') ? 'has-error' : '' }}">
                <label for="pricelist">Precio Lista:</label>
                <input type="number" name="precio_lista" id="priceList" placeholder="Precio Lista" onchange="priceSales();" value="{{$product->priceList}}" class="form-control">
                {!! $errors->first('precio_lista','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('costo') ? 'has-error' : '' }}">
                <label for="cost">Costo:</label>
                <input type="number" name="costo" id="cost" placeholder="Costo" onchange="priceSales();" value="{{$product->cost}}" class="form-control">
                {!! $errors->first('costo','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('moneda') ? 'has-error' : '' }}">
                <label for="moneda">Tipo de moneda:</label>
                <select name="moneda" value="{{ old('moneda') }}" class="form-control">
                  <option value="{{$product->coin->id}}">{{$product->coin->type}}</option>
                  @foreach ($coins as $coin)
                    <option value="{{$coin->id}}">{{$coin->type}}</option>
                  @endforeach
                </select>
                {!! $errors->first('moneda','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">Descripción:</label>
                <textarea type="text" rows="4" name="description" id="description" placeholder="Descripción" class="form-control" readonly>{{$product->description}}</textarea>
                {!! $errors->first('description','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <hr>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Categoria Precio Venta</label>
                <input type="text" id="categoria" class="form-control" value="{{$product->category->categorias}}" readonly>
              </div>
              <div class="form-group {{ $errors->has('priceSales3') ? 'has-error' : '' }}">
                <label for="priceSales3" id='ps'>Precio de Venta 3 <label id="pv3"></label></label>
                <input type="text" name="priceSales3" id="priceSales3" placeholder="Precio de Venta 3" value="{{$product->priceSales3}}" class="form-control" readonly>
                {!! $errors->first('priceSales3','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group {{ $errors->has('priceSales1') ? 'has-error' : '' }}">
                <label for="priceSales1" id='ps'>Precio de Venta 1<label id="pv1"></label></label>
                <input type="text" name="priceSales1" id="priceSales1" placeholder="Precio de Venta 1" value="{{$product->priceSales1}}" class="form-control" readonly>
                {!! $errors->first('priceSales1','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('priceSales4') ? 'has-error' : '' }}">
                <label for="priceSales4" id='ps'>Precio de Venta 4 <label id="pv4"></label></label>
                <input type="text" name="priceSales4" id="priceSales4" placeholder="Precio de Venta 4" value="{{$product->priceSales4}}" class="form-control" readonly>
                {!! $errors->first('priceSales4','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group {{ $errors->has('priceSales2') ? 'has-error' : '' }}">
                <label for="priceSales2" id='ps'>Precio de Venta 2 <label id="pv2"></label></label>
                <input type="text" name="priceSales2" id="priceSales2" placeholder="Precio de Venta 2" value="{{$product->priceSales2}}" class="form-control" readonly>
                {!! $errors->first('priceSales2','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('priceSales5') ? 'has-error' : '' }}">
                <label for="priceSales5">Precio de Venta 5:</label>
                <input type="text" name="priceSales5" id='priceSales5' placeholder="Precio de Venta 5" value="{{$product->priceSales5}}" class="form-control">
                {!! $errors->first('priceSales5','<span class="help-block">:message</span>')!!}
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-lg"></i> Guardar</button>
            <a href="{{url('admin/inventary')}}" class="btn btn-danger"><i class="fa fa-times-rectangle-o fa-lg"></i> Cancelar</a>
          </div>
        {!! Form::close() !!}
      </div>
    </section>
    <script type="text/javascript">
      function priceSales() {
        var categoria = $("#categoria").val()
        var priceList = $("#priceList").val()
        var cost = $("#cost").val()
        var cat1 = [.70, .65, .60, .57]
        var cat2 = [.40, .37, .36, .35]
        var cat3 = [.70, .75, .80, .85]
        var newRes = []

        if (categoria === 'Petrolera | Industrial') {
          for (var i = 0; i < cat1.length; i++) {
            var res = cat1[i] * priceList
            newRes.push(res)
            $('#pv1').text("(x0.70)")
            $('#pv2').text("(x0.65)")
            $('#pv3').text("(x0.60)")
            $('#pv4').text("(x0.57)")
          }
        }else if (categoria === 'Hidraulica') {
          for (var i = 0; i < cat2.length; i++) {
            var res = cat2[i] * cost
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
    </script>

@endsection
