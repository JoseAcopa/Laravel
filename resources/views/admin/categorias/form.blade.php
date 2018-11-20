<div class="box-body">
  <div class="form-group {{ $errors->has('tipo') ? 'has-error' : '' }}">
    {{ Form::label('tipo', 'Tipo de Producto:') }}
    {{ Form::text('tipo', null, ['class' => 'form-control', 'placeholder' => 'tipo de Producto']) }}
    {!! $errors->first('tipo','<span class="help-block">:message</span>')!!}
  </div>
  <div class="form-group {{ $errors->has('letra') ? 'has-error' : '' }}">
    {{ Form::label('letra', 'Iniciales:') }}
    {{ Form::text('letra', null, ['class' => 'form-control', 'placeholder' => 'iniciales']) }}
    {!! $errors->first('letra','<span class="help-block">:message</span>')!!}
  </div>
  <div class="form-group {{ $errors->has('categorias') ? 'has-error' : '' }}">
    {{ Form::label('categorias', 'Categorias:') }}
    {!! Form::select('categorias', ['Petrolera | Industrial' => 'Petrolera | Industrial', 'Hidraulica' => 'Hidraulica', 'Servicios' => 'Servicios', 'Otro' => 'Otro'],  null, ['class' => 'form-control', 'placeholder' => 'Seleccione']); !!}
    {!! $errors->first('categorias','<span class="help-block">:message</span>')!!}
  </div>
</div>
<div class="box-footer">
  @can ('categoria.create')
    <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-lg"></i> Guardar</button>
  @endcan
</div>
