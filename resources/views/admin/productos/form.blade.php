<div class="box-body">
  @if (isset($productos))
    <div class="col-md-12">
      <div class="col-md-8 pull-right">
        <div class="form-group">
          {{ Form::label('catalogo_id', 'Buscar Producto en Catálogo') }}
          {!! Form::select('catalogo_id', $productos,  null, ['class' => 'form-control select2', 'placeholder' => 'Seleccione', 'onchange' => 'getCatalogo(this);']); !!}
        </div>
      </div>
    </div>
  @endif
  @if (isset($productos))
    <div class="col-md-4">
      <div class="form-group">
        {{ Form::label('numero_factura', 'N° de Factura:') }}
        {{ Form::text('numero_factura', null, ['class' => 'form-control', 'placeholder' => 'número Factura']) }}
      </div>
    </div>
  @endif
  <div class="col-md-4">
    <div class="form-group {{ $errors->has('fecha_entrada') ? 'has-error' : '' }}">
      {{ Form::label('fecha_entrada', 'Fecha de Entrada:') }}
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        {{ Form::text('fecha_entrada', null, ['class' => 'form-control', 'placeholder' => 'dd/mm/aaaa', 'id' => 'datepickerProduct']) }}
      </div>
      {!! $errors->first('fecha_entrada','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-4">
      <div class="form-group {{ $errors->has('precio_lista') ? 'has-error' : '' }}">
      {{ Form::label('precio_lista', 'Precio Lista:') }}
      {{ Form::number('precio_lista', null, ['class' => 'form-control', 'placeholder' => 'precio lista', 'id' => 'precio_lista', 'step' => '.01', 'onchange' => 'getPrecios();']) }}
      {!! $errors->first('precio_lista','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group {{ $errors->has('tipo_producto') ? 'has-error' : '' }}">
      <div class="row">
        <div class="col-xs-8">
          {{ Form::label('tipo_producto', 'Tipo de Producto:') }}
          {{ Form::text('tipo_producto', null, ['class' => 'form-control', 'placeholder' => 'tipo de producto', 'id' => 'tipo_producto', 'readonly']) }}
          {!! $errors->first('tipo_producto','<span class="help-block">:message</span>')!!}
        </div>
        <div class="col-xs-4" style="margin-top: 25px;">
          {{ Form::text('letra', null, ['class' => 'form-control', 'id' => 'letra', 'readonly']) }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group {{ $errors->has('cantidad_entrada') ? 'has-error' : '' }}">
      @if (isset($productos))
        {{ Form::label('cantidad_entrada', 'Cantidad de Entrada:') }}
      @else
        {{ Form::label('cantidad_entrada', 'Stock:') }}
      @endif
      {{ Form::number('cantidad_entrada', null, ['class' => 'form-control', 'placeholder' => 'cantidad entrada', 'id' => 'cantidad_entrada', 'min' => '1']) }}
      {!! $errors->first('cantidad_entrada','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group {{ $errors->has('costo') ? 'has-error' : '' }}">
      {{ Form::label('costo', 'Costo:') }}
      {{ Form::number('costo', null, ['class' => 'form-control', 'placeholder' => 'costo', 'id' => 'costo', 'step' => '.01', 'onchange' => 'getPrecios();']) }}
      {!! $errors->first('costo','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group {{ $errors->has('proveedor') ? 'has-error' : '' }}">
      {{ Form::label('proveedor', 'Proveedor:') }}
      {{ Form::text('proveedor', null, ['class' => 'form-control', 'placeholder' => 'proveedor', 'id' => 'proveedor', 'readonly']) }}
      {{ Form::text('proveedor_id', null, ['class' => 'form-control', 'id' => 'proveedor_id', 'style' => 'display: none;']) }}
      {!! $errors->first('proveedor','<span class="help-block">:message</span>')!!}
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
    <div class="form-group {{ $errors->has('moneda') ? 'has-error' : '' }}">
      {{ Form::label('moneda', 'Moneda:') }}
      {!! Form::select('moneda', ['MXP' => 'MXP', 'USD' => 'USD'],  null, ['class' => 'form-control', 'placeholder' => 'Seleccione']); !!}
      {!! $errors->first('moneda','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
      {{ Form::label('descripcion', 'Descripción:') }}
      {{ Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'descripción', 'rows'=> '4', 'id' => 'descripcion', 'readonly']) }}
      {!! $errors->first('descripcion','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <hr>
  <div class="col-md-4">
    <div class="form-group {{ $errors->has('categoria') ? 'has-error' : '' }}">
      {{ Form::label('categoria', 'Categoria precio venta:') }}
      {{ Form::text('categoria', null, ['class' => 'form-control', 'placeholder' => 'categoria', 'id' => 'categoria', 'readonly']) }}
      {{ Form::text('categoria_id', null, ['class' => 'form-control', 'id' => 'categoria_id', 'style' => 'display: none;']) }}
      {!! $errors->first('categoria','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group {{ $errors->has('precio_venta1') ? 'has-error' : '' }}">
      {{ Form::label('precio_venta1', 'Precio de venta 1:') }} {{ Form::label('pv1', '', ['id' => 'pv1']) }}
      {{ Form::number('precio_venta1', null, ['class' => 'form-control', 'placeholder' => 'precio venta 1', 'id' => 'precio_venta1', 'readonly']) }}
      {!! $errors->first('precio_venta1','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group {{ $errors->has('precio_venta2') ? 'has-error' : '' }}">
      {{ Form::label('precio_venta2', 'Precio de venta 2:') }} {{ Form::label('pv2', '', ['id' => 'pv2']) }}
      {{ Form::number('precio_venta2', null, ['class' => 'form-control', 'placeholder' => 'precio venta 2', 'id' => 'precio_venta2', 'readonly']) }}
      {!! $errors->first('precio_venta2','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group {{ $errors->has('precio_venta3') ? 'has-error' : '' }}">
      {{ Form::label('precio_venta3', 'Precio de venta 3:') }} {{ Form::label('pv3', '', ['id' => 'pv3']) }}
      {{ Form::number('precio_venta3', null, ['class' => 'form-control', 'placeholder' => 'precio venta 3', 'id' => 'precio_venta3', 'readonly']) }}
      {!! $errors->first('precio_venta3','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group {{ $errors->has('precio_venta4') ? 'has-error' : '' }}">
      {{ Form::label('precio_venta4', 'Precio de venta 4:') }} {{ Form::label('pv4', '', ['id' => 'pv4']) }}
      {{ Form::number('precio_venta4', null, ['class' => 'form-control', 'placeholder' => 'precio venta 4', 'id' => 'precio_venta4', 'readonly']) }}
      {!! $errors->first('precio_venta4','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group {{ $errors->has('precio_venta5') ? 'has-error' : '' }}">
      {{ Form::label('precio_venta5', 'Precio de venta 5:') }}
      {{ Form::number('precio_venta5', null, ['class' => 'form-control', 'placeholder' => 'precio venta 5', 'id' => 'precio_venta5']) }}
      {!! $errors->first('precio_venta5','<span class="help-block">:message</span>')!!}
    </div>
  </div>
</div>
<div class="box-footer">
  <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save fa-lg"></i> Guardar</button>
  <a href="{{ url('/entrada-productos') }}" class="btn btn-default pull-left"><i class="fa fa-reply fa-lg"></i> Regresar</a>
</div>
