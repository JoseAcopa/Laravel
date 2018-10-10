<br>
<div class="col-md-12">
  <div class="box box-primary box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Buscar cliente</h3>
    </div>
    <div class="box-body" style="">
      <div class="form-group">
        <a href="#" data-toggle="modal" data-target=".bd-example-modal-cliente" class="pull-right"><i class="fa fa-plus"></i> Nuevo cliente</a>
        {{ Form::label('cliente_id', 'Clientes') }}
        <div class="input-group">
          {!! Form::select('cliente_id', $clients, null, ['class' => 'form-control select2', 'placeholder' => 'Seleccione', 'style' => 'width: 100%;', 'onchange' => 'getClient(this)']); !!}
          {{-- <select class="form-control select2" style="width: 100%;" onchange="getClient(this)">
            <option selected="selected" value="null">Buscar...</option>
            @foreach ($clients as $client)
              <option value="{{ $client->id }}">{{$client->business}} | {{$client->email}} | {{$client->phone}}</option>
            @endforeach
          </select> --}}
          <span class="input-group-addon"><i class="fa fa-search"></i></span>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="box-body">
  <div class="col-md-4">
    <div class="form-group {{ $errors->has('numero_cotizacion') ? 'has-error' : '' }}">
      {{ Form::label('numero_cotizacion', 'No. de Cotización:') }}
      {{ Form::text('numero_cotizacion', null, ['class' => 'form-control', 'placeholder' => 'no. de cotización', 'id' => 'numero_cotizacion', 'readonly']) }}
      {!! $errors->first('numero_cotizacion','<span class="help-block">:message</span>')!!}
    </div>
    <div class="form-group {{ $errors->has('rfc') ? 'has-error' : '' }}">
      {{ Form::label('rfc', 'RFC:') }}
      {{ Form::text('rfc', null, ['class' => 'form-control', 'placeholder' => 'RFC', 'id' => 'rfc', 'readonly']) }}
      {!! $errors->first('rfc','<span class="help-block">:message</span>')!!}
    </div>
    <div class="form-group {{ $errors->has('empresa') ? 'has-error' : '' }}">
      {{ Form::label('empresa', 'Nombre de la empresa:') }}
      {{ Form::text('empresa', null, ['class' => 'form-control', 'placeholder' => 'nombre de la empresa', 'id' => 'empresa', 'readonly']) }}
      {!! $errors->first('empresa','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
      {{ Form::label('fecha', 'Fecha:') }}
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        {{ Form::text('fecha', null, ['class' => 'form-control', 'placeholder' => 'dd/mm/aaaa', 'id' => 'datepicker']) }}
      </div>
      {!! $errors->first('fecha','<span class="help-block">:message</span>')!!}
    </div>
    <div class="form-group {{ $errors->has('telefono') ? 'has-error' : '' }}">
      {{ Form::label('telefono', 'Teléfono:') }}
      {{ Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'teléfono', 'id' => 'telefono', 'readonly']) }}
      {!! $errors->first('telefono','<span class="help-block">:message</span>')!!}
    </div>
    <div class="form-group {{ $errors->has('nombre_cotizar') ? 'has-error' : '' }}">
      {{ Form::label('nombre_cotizar', 'Nombre Completo:') }}
      {{ Form::text('nombre_cotizar', null, ['class' => 'form-control', 'placeholder' => 'nombre completo']) }}
      {!! $errors->first('nombre_cotizar','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group {{ $errors->has('licitacion') ? 'has-error' : '' }}">
      {{ Form::label('licitacion', 'Número de Licitación:') }}
      {{ Form::text('licitacion', null, ['class' => 'form-control', 'placeholder' => 'número de licitación']) }}
      {!! $errors->first('licitacion','<span class="help-block">:message</span>')!!}
    </div>
    <div class="form-group {{ $errors->has('correo') ? 'has-error' : '' }}">
      {{ Form::label('correo', 'E-mail:') }}
      {{ Form::email('correo', null, ['class' => 'form-control', 'placeholder' => 'e-mail', 'id' => 'correo']) }}
      {!! $errors->first('correo','<span class="help-block">:message</span>')!!}
    </div>
    <div class="form-group {{ $errors->has('puesto') ? 'has-error' : '' }}">
      {{ Form::label('puesto', 'Puesto:') }}
      {{ Form::text('puesto', null, ['class' => 'form-control', 'placeholder' => 'puesto']) }}
      {!! $errors->first('puesto','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group {{ $errors->has('direccion') ? 'has-error' : '' }}">
      {{ Form::label('direccion', 'Dirección:') }}
      {{ Form::textarea('direccion', null, ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'dirección', 'id' => 'direccion', 'readonly']) }}
      {!! $errors->first('direccion','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      {{ Form::label('observaciones', 'Observaciones:') }}
      {!! Form::select('observaciones', ['obs1' => 'Suministro', 'obs2' => 'Plataforma', 'obs3' => 'Trabajos en tierra'], null,  ['class' => 'form-control', 'placeholder' => 'Seleccione', 'onchange' => 'changeObservacion(this)']); !!}
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group {{ $errors->has('observaciones') ? 'has-error' : '' }}">
      {{ Form::textarea('observaciones', null, ['class' => 'form-control', 'rows' => '14', 'placeholder' => 'observaciones', 'id' => 'observacion']) }}
      {!! $errors->first('observaciones','<span class="help-block">:message</span>')!!}
    </div>
  </div>

{{-- cotizador de los productos --}}
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
      </select>
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <label>Producto:</label>
      <input type="text" class="form-control" placeholder="producto" id="producto" readonly>
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

<input type="text" name="total" id="totalAmount">
<input type="text" id="currency">
<input type="text" id="unit">
<input type="text" name="total_poductos" id="total_poductos">
<input type="text" id="description">
