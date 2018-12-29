<div class="box-body">
  <div class="col-md-6">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
      {{ Form::label('name', 'Nombre') }}
      {{ Form::text('name', null, ['class' => 'form-control']) }}
      {!! $errors->first('name','<span class="help-block">:message</span>')!!}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
      {{ Form::label('slug', 'Descripcion') }}
      {{ Form::text('slug', null, ['class' => 'form-control']) }}
      {!! $errors->first('slug','<span class="help-block">:message</span>')!!}
      <input type="text" value="null" name="description" hidden>
    </div>
  </div>
  <div class="col-md-12 form-group">
    <div class="radio">
      <label>{{ Form::radio('special', 'all-access', false, ['onclick' => 'activateRadio(this)']) }} Accesso total</label>
      <label>{{ Form::radio('special', 'no-access', false, ['onclick' => 'activateRadio(this)']) }} Ningùn acceso</label>
    </div>
  </div>
  <div class="col-md-12">
    <h4>Lista Permisos</h4>
    @foreach ($permissions as $permission)
      <div class="checkbox">
        <label>
          {{ Form::checkbox('permissions[]', $permission->id, null, ['onclick' => 'activateCheckbox()']) }}
          {{$permission->description}}
        </label>
      </div>
    @endforeach
  </div>
</div>
<div class="box-footer">
  <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save fa-lg"></i> Guardar</button>
  <a href="{{ url('admin/roles') }}" class="btn btn-default pull-left"><i class="fa fa-reply fa-lg"></i> Regresar</a>
</div>
