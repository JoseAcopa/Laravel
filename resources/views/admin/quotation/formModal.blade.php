<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Nuevo Producto</h4>
      </div>
      <div class="modal-body">
        <div class="form-group col-md-6">
          <label for="exampleInputEmail1">Tipo de Producto</label>
          <select class="form-control" name="">
            <option value=""></option>
            @foreach ($categories as $category)
              <option value="{{$category->id}}">{{$category->type}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="iniciales">Iniciales</label>
          <input type="text" class="form-control" id="iniciales" placeholder="iniciales" readonly>
        </div>
        <div class="form-group col-md-6">
          <label for="proveedor">Proveedor</label>
          <input type="text" class="form-control" id="proveedor" placeholder="proveedor">
        </div>
        <div class="form-group col-md-6">
          <select class="form-control">
            <option value="">Seleccione Unidad de Medida</option>
            @foreach ($units as $unit)
              <option value="{{$unit->type}}">{{$unit->type}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-12">
          <label for="exampleInputEmail1">Descripción</label>
          <textarea class="form-control" name="name" rows="8" cols="80" placeholder="descripción"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">cerrar</button>
        <button type="button" class="btn btn-primary">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>
