<br>
<div class="box-body">
  <div class="col-md-4">
    <div class="form-group {{ $errors->has('numero_cotizacion') ? 'has-error' : '' }}">
      {{ Form::label('numero_cotizacion', 'No. de Cotización:') }}
      {{ Form::text('numero_cotizacion', null, ['class' => 'form-control', 'placeholder' => 'no. de cotización', 'id' => 'numero_cotizacion', 'readonly']) }}
      {!! $errors->first('numero_cotizacion','<span class="help-block">:message</span>')!!}
    </div>
    <div class="form-group {{ $errors->has('rfc_cliente') ? 'has-error' : '' }}">
      {{ Form::label('rfc_cliente', 'RFC:') }}
      {{ Form::text('rfc_cliente', null, ['class' => 'form-control', 'placeholder' => 'RFC', 'id' => 'rfc', 'readonly']) }}
      {!! $errors->first('rfc_cliente','<span class="help-block">:message</span>')!!}
    </div>
    <div class="form-group {{ $errors->has('nombre_empresa') ? 'has-error' : '' }}">
      {{ Form::label('empresa', 'Nombre de la empresa:') }}
      {{ Form::text('nombre_empresa', null, ['class' => 'form-control', 'placeholder' => 'nombre de la empresa', 'id' => 'empresa', 'readonly']) }}
      {!! $errors->first('nombre_empresa','<span class="help-block">:message</span>')!!}
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
    <div class="form-group {{ $errors->has('telefono_cliente') ? 'has-error' : '' }}">
      {{ Form::label('telefono', 'Teléfono:') }}
      {{ Form::text('telefono_cliente', null, ['class' => 'form-control', 'placeholder' => 'teléfono', 'id' => 'telefono', 'readonly']) }}
      {!! $errors->first('telefono_cliente','<span class="help-block">:message</span>')!!}
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
    <div class="form-group {{ $errors->has('correo_cliente') ? 'has-error' : '' }}">
      {{ Form::label('correo', 'E-mail:') }}
      {{ Form::email('correo_cliente', null, ['class' => 'form-control', 'placeholder' => 'e-mail', 'id' => 'correo']) }}
      {!! $errors->first('correo_cliente','<span class="help-block">:message</span>')!!}
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
  <div class="col-md-2">
    <div class="form-group">
      {{ Form::label('moneda', 'Moneda:') }}
      {!! Form::select('moneda', ['MXP' => 'MXP', 'USD' => 'USD'], null,  ['class' => 'form-control', 'placeholder' => 'Seleccione']); !!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      {{ Form::label('select', 'Observaciones:') }}
      {!! Form::select('select', ['obs1' => 'Suministro', 'obs2' => 'Plataforma', 'obs3' => 'Trabajos en tierra'], null,  ['class' => 'form-control', 'placeholder' => 'Seleccione', 'onchange' => 'changeObservacion(this)']); !!}
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group {{ $errors->has('observaciones') ? 'has-error' : '' }}">
      {{ Form::textarea('observaciones', null, ['class' => 'form-control', 'rows' => '14', 'placeholder' => 'observaciones', 'id' => 'observacion']) }}
      {!! $errors->first('observaciones','<span class="help-block">:message</span>')!!}
    </div>
  </div>

  <div class="col-md-12">
    <div class="box box-primary box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Buscar Producto</h3>
      </div>
      <div class="box-body" style="">
        <div class="form-group">
          <a href="#"  class="pull-right"><i class="fa fa-plus"></i> Nuevo producto</a>
          {{ Form::label('producto', 'Productos') }}
          <div class="input-group">
            {!! Form::select('producto', $productos, null, ['class' => 'form-control select2', 'id' => 'producto_id', 'placeholder' => 'Seleccione', 'style' => 'width: 100%;', 'onchange' => 'getProducto(this)']); !!}
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    {{ Form::label('descripcion_producto', 'Descripción:') }}
    {!! Form::text('descripcion_producto', null,  ['class' => 'form-control', 'placeholder' => 'descripción', 'id' => 'descripcion', 'readonly']); !!}
  </div>
  <div class="col-md-3">
    {{ Form::label('producto_cotizar', 'Producto:') }}
    {!! Form::text('producto_cotizar', null,  ['class' => 'form-control', 'placeholder' => 'producto_cotizar', 'id' => 'producto_cotizar', 'readonly']); !!}
  </div>
  <div class="col-md-2">
    {{ Form::label('precio', 'Precio:') }}
    <select class="form-control" id="precios">

    </select>
  </div>
  <div class="col-md-1">
    {{ Form::label('stock', 'Stock:') }}
    {!! Form::number('stock', null,  ['class' => 'form-control', 'placeholder' => 'stock', 'id' => 'stock', 'readonly']); !!}
  </div>
  <div class="col-md-1">
    {{ Form::label('cantidad', 'Cantidad:') }}
    {!! Form::number('cantidad', null,  ['class' => 'form-control', 'placeholder' => 'cantidad', 'id' => 'cantidad', 'min' => '1']); !!}
  </div>
  <div class="col-md-1">
    {{ Form::label('Agregar', 'Agregar:') }}
    <button type="button" class="btn btn-block bg-navy btn-flat" onclick="agregarProducto()"><i class="fa fa-plus"></i></button>
  </div>
  <div class="col-md-12">
    <br>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th style="width: 10px;">#</th>
          <th>Descripción</th>
          <th style="width: 30px;">Cantidad</th>
          <th style="width: 30px;">Precio</th>
          <th style="width: 30px;">Subtotal</th>
          <th style="width: 30px;">Accion</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($productos_cotizados as $key => $producto_cotizado)
          <tr>
            <td style="width: 10px;">{{$key+1}}</td>
            <td>{{$producto_cotizado->producto->description}}</td>
            <td style="width: 30px;">{{$producto_cotizado->cantidad}}</td>
            <td style="width: 30px;">{{$producto_cotizado->precio}}</td>
            <td style="width: 30px;">{{$producto_cotizado->subtotal}}</td>
            <td>
              <button type="button" class="btn btn-danger" onclick=""><i class="fa fa-trash"></i></button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="col-md-3 pull-right">
    {{ Form::label('total', 'Total:') }}
    {!! Form::text('total', null,  ['class' => 'form-control', 'placeholder' => 'total', 'id' => 'total', 'readonly']); !!}
  </div>
</div>
<div class="box-footer">
  <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save fa-lg"></i> Guardar</button>
  <a href="{{ url('/admin/cotizacion') }}" class="btn btn-default pull-left"><i class="fa fa-reply fa-lg"></i> Regresar</a>
</div>
