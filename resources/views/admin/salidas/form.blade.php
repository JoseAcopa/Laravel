<div class="box-body">
  @if (isset($newProductos))
    <div class="col-md-12">
      <div class="col-md-8 pull-right">
        <div class="form-group">
          {{ Form::label('producto_id', 'Buscar Producto') }}
          {!! Form::select('producto_id', $newProductos,  null, ['class' => 'form-control select2', 'placeholder' => 'Seleccione', 'onchange' => 'getProducto(this);']); !!}
        </div>
      </div>
    </div>
  @endif
  <div class="col-md-4">
    <div class="form-group">
      {{ Form::label('numero_factura', 'N° de Factura') }}
      {{ Form::text('numero_factura', null, ['class' => 'form-control', 'placeholder' => 'número factura']) }}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group {{ $errors->has('fecha_salida') ? 'has-error' : '' }}">
      {{ Form::label('fecha_salida', 'Fecha de Salida:') }}
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        {{ Form::text('fecha_salida', null, ['class' => 'form-control', 'placeholder' => 'dd/mm/aaaa', 'id' => 'datepickerSalida']) }}
      </div>
      {!! $errors->first('fecha_salida','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group {{ $errors->has('precio_lista') ? 'has-error' : '' }}">
      {{ Form::label('precio_lista', 'Precio Lista:') }}
      {{ Form::number('precio_lista', null, ['class' => 'form-control', 'placeholder' => 'precio lista', 'id' => 'precio_lista', 'step' => '.01', 'readonly']) }}
      {!! $errors->first('precio_lista','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group {{ $errors->has('categoria') ? 'has-error' : '' }}">
      <div class="row">
        <div class="col-xs-8">
          {{ Form::label('categoria', 'Tipo de Producto:') }}
          {{ Form::text('categoria', null, ['class' => 'form-control', 'placeholder' => 'tipo de producto', 'id' => 'categoria', 'readonly']) }}
          {!! $errors->first('categoria','<span class="help-block">:message</span>')!!}
        </div>
        <div class="col-xs-4" style="margin-top: 25px;">
          {{ Form::text('letra', null, ['class' => 'form-control', 'id' => 'letra', 'readonly']) }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group {{ $errors->has('stock') ? 'has-error' : '' }}">
      {{ Form::label('stock', 'Existencia:') }}
      {{ Form::number('stock', null, ['class' => 'form-control', 'placeholder' => 'stock', 'id' => 'stock']) }}
      {!! $errors->first('stock','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group {{ $errors->has('costo') ? 'has-error' : '' }}">
      {{ Form::label('costo', 'Costo:') }}
      {{ Form::number('costo', null, ['class' => 'form-control', 'placeholder' => 'costo', 'id' => 'costo', 'readonly']) }}
      {!! $errors->first('costo','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group {{ $errors->has('proveedor') ? 'has-error' : '' }}">
      {{ Form::label('proveedor', 'Proveedor:') }}
      {{ Form::text('proveedor', null, ['class' => 'form-control', 'placeholder' => 'proveedor', 'id' => 'proveedor', 'readonly']) }}
      {!! $errors->first('proveedor','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group {{ $errors->has('cantidad_salida') ? 'has-error' : '' }}">
      {{ Form::label('cantidad_salida', 'Cantidad de Salida:') }}
      {{ Form::number('cantidad_salida', null, ['class' => 'form-control', 'placeholder' => 'cantidad de salida', 'id' => 'cantidad_salida', 'min' => '1', 'onchange' => 'cantidadSalida(this)']) }}
      {!! $errors->first('cantidad_salida','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group {{ $errors->has('moneda') ? 'has-error' : '' }}">
      {{ Form::label('moneda', 'Moneda:') }}
      {!! Form::select('moneda', ['MXP' => 'MXP', 'USD' => 'USD'],  null, ['class' => 'form-control', 'placeholder' => 'Seleccione']); !!}
      {!! $errors->first('moneda','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group {{ $errors->has('unidad_medida') ? 'has-error' : '' }}">
      {{ Form::label('unidad_medida', 'Unidad de Medida:') }}
      {{ Form::text('unidad_medida', null, ['class' => 'form-control', 'placeholder' => 'unidad de medida', 'id' => 'unidad_medida', 'readonly']) }}
      {!! $errors->first('unidad_medida','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group {{ $errors->has('precio') ? 'has-error' : '' }}">
      <div class="row">
        <div class="col-xs-7">
          {{ Form::label('precio_venta', 'Precio de venta:') }}
          {!! Form::select('precio', isset($precios) ? $precios : [],  null, ['class' => 'form-control', 'placeholder' => 'Seleccione', 'id' => 'precio', 'onchange' => 'precioVenta(this);']); !!}
        </div>
        <div class="col-xs-5" style="margin-top: 25px;">
          {{ Form::number('precio_venta', null, ['class' => 'form-control', 'placeholder' => 'precio', 'id' => 'precio_venta', 'step' => '.01', 'readonly']) }}
        </div>
      </div>
      {!! $errors->first('precio_venta','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
      {{ Form::label('descripcion', 'Descripción:') }}
      {{ Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'descripción', 'rows'=> '4', 'id' => 'descripcion', 'readonly']) }}
      {!! $errors->first('descripcion','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  {{ Form::number('existencia', null, ['id' => 'existencia', 'style' => 'display: none;']) }}
  {{ Form::number('categoria_id', null, ['id' => 'categoria_id', 'style' => 'display: none;']) }}
  {{ Form::number('proveedor_id', null, ['id' => 'proveedor_id', 'style' => 'display: none;']) }}
</div>
<div class="box-footer">
  <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save fa-lg"></i> Guardar</button>
  <a href="{{ url('/salida-producto') }}" class="btn btn-default pull-left"><i class="fa fa-reply fa-lg"></i> Regresar</a>
</div>
