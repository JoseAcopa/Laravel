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
            <h3 class="box-title"><i class="fa fa-edit"></i>Editar Salida de Producto</h3>
          </div>
        </div>
        {!! Form::model($checkout, ['method' => 'POST','route' => ['salida.update', $checkout->id], 'role' => 'form']) !!}
          {{ csrf_field() }}
          <div class="box-body">
            <div class="col-md-4">
              <div class="form-group">
                <label for="factura">N° de Factura:</label>
                <input type="text" name="factura" class="form-control" placeholder="Número Factura" value="{{$checkout->nInvoice}}">
                <input type="text" name="idProduct" value="{{$checkout->keyProduct}}" hidden>
              </div>
              <div class="form-group {{ $errors->has('categoria-view') ? 'has-error' : '' }}">
                <div class="row">
                  <div class="col-xs-8">
                    <label for="categoria-view">Tipo de Producto:</label>
                    <input type="text" name="categoria-view" id="categoria-view" value="{{ $checkout->category->type }}" class="form-control" readonly>
                    <input type="text" name="categoria" id="categoria" value="{{ $checkout->category->id }}" hidden>
                    {!! $errors->first('categoria-view','<span class="help-block">:message</span>')!!}
                  </div>
                  <div class="col-xs-4 top-copasat">
                    <input type="text" id="letter" class="form-control" name="iniciales" value="{{ $checkout->initials }}" readonly>
                  </div>
                </div>
              </div>
              <div class="form-group {{ $errors->has('proveedor-view') ? 'has-error' : '' }}">
                <label for="proveedor-view">Proveedor:</label>
                <input type="text" name="proveedor-view" id="proveedor-view" value="{{ $checkout->supplier->business }}" class="form-control" readonly>
                <input type="text" name="proveedor" id="proveedor" value="{{ $checkout->supplier->id }}" hidden>
                {!! $errors->first('proveedor-view','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('unidad') ? 'has-error' : '' }}">
                <label for="unidad">Unidad de Medida:</label>
                <input type="text" name="unidad" id="unidad" value="{{ $checkout->unit }}" class="form-control" readonly>
                {!! $errors->first('unidad','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group {{ $errors->has('salida') ? 'has-error' : '' }}">
                <label for="salida">Fecha de Salida:</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input type="text" value="{{ $checkout->date_out }}" name="salida" class="form-control" id="datepickerSalida" placeholder="dd/mm/aaaa">
                </div>
                {!! $errors->first('salida','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('stock') ? 'has-error' : '' }}">
                <label for="stock">Existencia:</label>
                <input type="number" name="stock" id="stock" value="{{$product[0]->stock}}" class="form-control" readonly>
                {!! $errors->first('stock','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('cantidad') ? 'has-error' : '' }}">
                <label for="cantidad">Cantidad de Salida:</label>
                <input type="number" name="cantidad" min="0" id="cantidad" value="{{ $checkout->quantity_output }}" class="form-control" placeholder="cantidad" onchange="quantity(this)">
                {!! $errors->first('cantidad','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('precio') ? 'has-error' : '' }}">
                <label for="precio">Precio de venta:</label>
                <select name="precio" class="form-control">
                  <option value="{{ $checkout->price_output }}">{{ $checkout->price_output }}</option>
                  <option id="pv1">{{$product[0]->priceSales1}}</option>
                  <option id="pv2">{{$product[0]->priceSales2}}</option>
                  <option id="pv3">{{$product[0]->priceSales3}}</option>
                  <option id="pv4">{{$product[0]->priceSales4}}</option>
                  <option id="pv5">{{$product[0]->priceSales5}}</option>
                </select>
                {!! $errors->first('precio','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group {{ $errors->has('precio_lista') ? 'has-error' : '' }}">
                <label for="pricelist">Precio Lista:</label>
                <input type="number" name="precio_lista" id="priceList" value="{{ $checkout->priceList }}" class="form-control" readonly>
                {!! $errors->first('precio_lista','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('costo') ? 'has-error' : '' }}">
                <label for="cost">Costo:</label>
                <input type="number" name="costo" id="cost" value="{{ $checkout->cost }}" class="form-control" readonly>
                {!! $errors->first('costo','<span class="help-block">:message</span>')!!}
              </div>
              <div class="form-group {{ $errors->has('moneda') ? 'has-error' : '' }}">
                <label for="moneda">Moneda:</label>
                <input type="text" name="moneda" id="moneda" value="{{ $checkout->coin->type }}" class="form-control" readonly>
                <input type="text" name="idMoneda" id="idMoneda" value="{{ $checkout->coin->id }}" hidden>
                {!! $errors->first('moneda','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">Descripción:</label>
                <textarea type="text" rows="4" name="description" id="description" placeholder="Descripción" class="form-control" readonly>{{ $checkout->description }}</textarea>
                {!! $errors->first('description','<span class="help-block">:message</span>')!!}
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-lg"></i> Guardar</button>
            <a href="{{url('admin/salidas')}}" class="btn btn-danger"><i class="fa fa-times-rectangle-o fa-lg"></i> Cancelar</a>
          </div>
        {!! Form::close() !!}
      </div>
    </section>
    <script type="text/javascript">
      // funcion se ejecuta al hacer cambio con clic
      function quantity(val) {
        var stock = {{$product[0]->stock}}
        var quantity = {{$checkout->quantity_output}}
        var value = val.value
        var newStock

        if (Number(value) <= (Number(stock) + Number(quantity))) {
          if (value > quantity) {
            var newQuantity = quantity - value
            newStock = stock + newQuantity
          }else {
            var newQuantity = quantity - value
            newStock = stock + newQuantity
          }
          document.getElementById('stock').value = newStock
        }else {
          document.getElementById('stock').value = stock
          document.getElementById('cantidad').value = quantity
          swal({
            type: 'error',
            title: 'Producto en stock',
            text: '¡Solo hay {{$product[0]->stock}} productos en existencia!'
          })
        }
      }

      // funcion se ejecuta al hacer cambio manual
      setTimeout(function() {
        $("#cantidad").keyup(function() {
          var stock = {{$product[0]->stock}}
          var quantity = {{$checkout->quantity_output}}
          var value = document.getElementById('cantidad').value
          var newStock

          if (Number(value) <= (Number(stock) + Number(quantity))) {
            if (value > quantity) {
              var newQuantity = quantity - value
              newStock = stock + newQuantity
            }else {
              var newQuantity = quantity - value
              newStock = stock + newQuantity
            }
            document.getElementById('stock').value = newStock
          }else {
            document.getElementById('stock').value = stock
            document.getElementById('cantidad').value = quantity
            swal({
              type: 'error',
              title: 'Producto en stock',
              text: '¡Solo hay {{$product[0]->stock}} productos en existencia!'
            })
          }
        });
      },1000)
    </script>

@endsection
