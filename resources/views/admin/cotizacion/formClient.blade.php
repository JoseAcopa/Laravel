<div class="modal fade bd-example-modal-cliente" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form class="modal-content" method="POST" action="{{route('cliente.cotizacion')}}">
      {{ csrf_field() }}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Nuevo Cliente</h4>
      </div>
      <div class="modal-body">
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
      <div class="modal-footer">
        <div class="col-md-12">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </form>
  </div>
</div>
