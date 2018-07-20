<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Nuevo Producto</h4>
      </div>
      <div class="modal-body">
        <div class="form-group col-md-6">
          <label for="exampleInputEmail1">Tipo de Producto</label>
          <select class="form-control" name="category" onchange="typeProduct(this);" required>
            <option value="">Seleccione</option>
            @foreach ($categories as $category)
              <option value="{{$category->id}}">{{$category->type}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="iniciales">Iniciales</label>
          <input type="text" class="form-control" id="letter" name="letter" placeholder="iniciales" readonly>
        </div>
        <div class="form-group col-md-6">
          <label for="proveedor">Proveedor</label>
          <select class="form-control" name="proveedor" required>
            <option value="">Seleccione</option>
            @foreach ($proveedores as $proveedor)
              <option value="{{$proveedor->id}}">{{$proveedor->business}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-6">
          <div class="row">
            <div class="col-xs-6">
              <label for="unidad">Unidad de Medida:</label>
              <select class="form-control" onchange="getUnidad(this);" required>
                <option value="">Seleccione</option>
                @foreach ($units as $unit)
                  <option value="{{$unit->type}}">{{$unit->type}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-xs-6 top-copasat">
              <input type="text" class="form-control" name="unidad" id="unidad" readonly>
            </div>
          </div>
        </div>
        <div class="form-group col-md-12">
          <label for="exampleInputEmail1">Descripción</label>
          <textarea class="form-control" name="name" rows="8" cols="80" placeholder="descripción" required></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
  </div>
</div>
