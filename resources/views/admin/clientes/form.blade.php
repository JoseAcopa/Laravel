<div class="box-body">
  <div class="col-md-6">
    <div class="form-group {{ $errors->has('nombre_empresa') ? 'has-error' : '' }}">
      {{ Form::label('nombre_empresa', 'Nombre de la Empresa:') }}
      {{ Form::text('nombre_empresa', null, ['class' => 'form-control', 'placeholder' => 'nombre de la empresa']) }}
      {!! $errors->first('nombre_empresa','<span class="help-block">:message</span>')!!}
    </div>
    <div class="form-group {{ $errors->has('rfc') ? 'has-error' : '' }}">
      {{ Form::label('rfc', 'RFC:') }}
      {{ Form::text('rfc', null, ['class' => 'form-control', 'placeholder' => 'RFC']) }}
      {!! $errors->first('rfc','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group {{ $errors->has('siglas') ? 'has-error' : '' }}">
      {{ Form::label('siglas', 'Siglas:') }}
      {{ Form::text('siglas', null, ['class' => 'form-control', 'placeholder' => 'siglas']) }}
      {!! $errors->first('siglas','<span class="help-block">:message</span>')!!}
    </div>
    <div class="form-group">
      {{ Form::label('correo', 'Correo:') }}
      {{ Form::email('correo', null, ['class' => 'form-control', 'placeholder' => 'correo']) }}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      {{ Form::label('telefono', 'Teléfono:') }}
      {{ Form::number('telefono', null, ['class' => 'form-control', 'placeholder' => 'teléfono']) }}
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
      {{ Form::label('direccion', 'Dirección:') }}
      {{ Form::textarea('direccion', null, ['class' => 'form-control', 'placeholder' => 'dirección', 'rows' => '6']) }}
      {!! $errors->first('address','<span class="help-block">:message</span>')!!}
    </div>
  </div>
</div>
<div class="box-footer">
  <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save fa-lg"></i> Guardar</button>
  <a href="{{ url('/clientes') }}" class="btn btn-default pull-left"><i class="fa fa-reply fa-lg"></i> Regresar</a>
</div>
