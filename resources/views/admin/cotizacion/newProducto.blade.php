<div class="modal fade bd-example-modal-producto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    {!! Form::open(['class' => 'modal-content', 'method' => 'POST', 'route' => 'catalogo.newProducto']) !!}
      {{ csrf_field() }}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Nuevo Producto</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4 pull-right">
            <div class="form-group">
              {{ Form::text('sku', null, ['class' => 'form-control', 'placeholder' => 'SKU', 'id' => "sku", 'readonly']) }}
            </div>
          </div>
          <br><br><br>
          <div class="col-md-6">
            <div class="form-group {{ $errors->has('categoria_id') ? 'has-error' : '' }}">
              {{ Form::label('categoria_id', 'Categoria:') }}
              {!! Form::select('categoria_id', $categorias,  null, ['class' => 'form-control', 'placeholder' => 'Seleccione', 'onchange' => 'categoria(this)']); !!}
              {!! $errors->first('categoria_id','<span class="help-block">:message</span>')!!}
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group {{ $errors->has('letra') ? 'has-error' : '' }}">
              {{ Form::label('letra', 'Inicales:') }}
              {{ Form::text('letra', null, ['class' => 'form-control', 'placeholder' => 'inicales', 'id' => "letra", 'readonly']) }}
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group {{ $errors->has('proveedor_id') ? 'has-error' : '' }}">
              {{ Form::label('proveedor_id', 'Proveedores:') }}
              {!! Form::select('proveedor_id', $proveedores,  null, ['class' => 'form-control', 'placeholder' => 'Seleccione']); !!}
              {!! $errors->first('proveedor_id','<span class="help-block">:message</span>')!!}
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group {{ $errors->has('unidad') ? 'has-error' : '' }}">
              <div class="row">
                <div class="col-xs-6">
                  {{ Form::label('unidad', 'Unidad de Medida:') }}
                  {!! Form::select('unidad', ['Metros' => 'Metros', 'Pies' => 'Pies', 'Piezas' => 'Piezas', 'Otros' => 'Otros'],  null, ['class' => 'form-control', 'placeholder' => 'Seleccione', 'onchange' => 'getUnidad(this)']); !!}
                  {!! $errors->first('unidad','<span class="help-block">:message</span>')!!}
                </div>
                <div class="col-xs-6" style="margin-top: 25px;">
                  {{ Form::text('unidad_medida', null, ['class' => 'form-control', 'placeholder' => 'unidad', 'id' => "unidad_medida", 'readonly']) }}
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
              {{ Form::label('descripcion', 'Descripción:') }}
              {{ Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'descripción', 'id' => "descripcion", 'rows' => '5']) }}
              {!! $errors->first('descripcion','<span class="help-block">:message</span>')!!}
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="col-md-12">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    {!! Form::close() !!}
  </div>
</div>
