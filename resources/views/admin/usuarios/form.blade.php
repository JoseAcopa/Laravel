<div class="box-body">
  <div class="col-md-6">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
      {{ Form::label('name', 'Nombre Completo:') }}
      {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nombre completo']) }}
      {!! $errors->first('name','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
      <label for="phone"></label>
      {{ Form::label('phone', 'Teléfono:') }}
      {{ Form::number('phone', null, ['class' => 'form-control', 'placeholder' => 'teléfono']) }}
      {!! $errors->first('phone','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
      {{ Form::label('email', 'Correo:') }}
      {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'correo']) }}
      {!! $errors->first('email','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
      {{ Form::label('user', 'Iniciales:') }}
      {{ Form::text('user', null, ['class' => 'form-control', 'placeholder' => 'iniciales de su nombre completo']) }}
      {!! $errors->first('user','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
      {{ Form::label('password', 'Contraseña:') }}
      {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'contraseña']) }}
      {!! $errors->first('password','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group {{ $errors->has('role_id') ? 'has-error' : '' }}">
      {{ Form::label('role_id', 'Tipo de usuario:') }}
      {!! Form::select('role_id', $roles,  null, ['class' => 'form-control', 'placeholder' => 'Seleccione']); !!}
      {!! $errors->first('role_id','<span class="help-block">:message</span>')!!}
    </div>
  </div>
</div>
<div class="box-footer">
  <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save fa-lg"></i> Guardar</button>
  <a href="{{ url('/usuarios') }}" class="btn btn-default pull-left"><i class="fa fa-reply fa-lg"></i> Regresar</a>
</div>
