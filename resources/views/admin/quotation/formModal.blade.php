<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form class="modal-content" method="POST" action="{{route('producto.newProducto')}}">
      {{ csrf_field() }}
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
          <textarea class="form-control" name="description" rows="6" cols="80" placeholder="descripción" required></textarea>
        </div>
        <div id="mostrar-form" hidden>
          <div class="form-group col-md-4">
            <label for="nInvoice">N° de Factura:</label>
            <input type="text" name="nInvoice" class="form-control" placeholder="Número Factura">
          </div>
          <div class="form-group col-md-4">
            <label for="fecha_entrada">Fecha de Entrada:</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input type="text" name="fecha_entrada" class="form-control" id="datepickerProduct" placeholder="dd/mm/aaaa" required>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label for="cantidad_entrada">Cantidad de Entrada:</label>
            <input type="number" name="cantidad_entrada" id="cantidad_entrada" class="form-control" placeholder="Cantidad Entrada" min="0" required>
          </div>
          <div class="form-group col-md-4">
            <label for="pricelist">Precio Lista:</label>
            <input type="number" name="precio_lista" id="priceList" placeholder="Precio Lista" onchange="priceSales();" class="form-control" step=".01" required>
          </div>
          <div class="form-group col-md-4">
            <label for="cost">Costo:</label>
            <input type="number" name="costo" id="cost" placeholder="Costo" onchange="priceSales();" class="form-control" step=".01" required>
          </div>
          <div class="form-group col-md-4">
            <label for="moneda">Tipo de moneda:</label>
            <select name="moneda" class="form-control" required>
              <option value="">Seleccione</option>
              @foreach ($coins as $coin)
                <option value="{{$coin->id}}">{{$coin->type}}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group col-md-4">
            <label for="">Categoria Precio Venta</label>
            <input type="text" id="categoria-view" name="categoria-view" class="form-control" readonly>
          </div>
          <div class="form-group col-md-4">
            <label for="priceSales1" id='ps'>Precio de Venta 1<label id="pv1"></label></label>
            <input type="text" name="priceSales1" id="priceSales1" placeholder="Precio de Venta 1" class="form-control" readonly>
          </div>
          <div class="form-group col-md-4">
            <label for="priceSales2" id='ps'>Precio de Venta 2 <label id="pv2"></label></label>
            <input type="text" name="priceSales2" id="priceSales2" placeholder="Precio de Venta 2" class="form-control" readonly>
          </div>
          <div class="form-group col-md-4">
            <label for="priceSales3" id='ps'>Precio de Venta 3 <label id="pv3"></label></label>
            <input type="text" name="priceSales3" id="priceSales3" placeholder="Precio de Venta 3" class="form-control" readonly>
          </div>
          <div class="form-group col-md-4">
            <label for="priceSales4" id='ps'>Precio de Venta 4 <label id="pv4"></label></label>
            <input type="text" name="priceSales4" id="priceSales4" placeholder="Precio de Venta 4" class="form-control" readonly>
          </div>
          <div class="form-group col-md-4">
            <label for="priceSales5">Precio de Venta 5:</label>
            <input type="text" name="priceSales5" id='priceSales5' placeholder="Precio de Venta 5" class="form-control">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
  </div>
</div>
