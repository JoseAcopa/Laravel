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
          <div class="form-group">
            <label for="business">Nombre de la Empresa:</label>
            <input type="text" name="business" class="form-control" placeholder="Nombre de la empresa" required>
          </div>
          <div class="form-group">
            <label for="RFC">RFC:</label>
            <input type="text" name="RFC" class="form-control" placeholder="RFC" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="siglas">Siglas:</label>
            <input type="text" name="siglas" class="form-control" placeholder="siglas" required>
          </div>
          <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" name="email" class="form-control" placeholder="E-mail" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="phone">Teléfono:</label>
            <input type="tel" name="phone" class="form-control" placeholder="Teléfono" required>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="address">Dirección:</label>
            <textarea type="text" rows="6" class="form-control" name="address" placeholder="Dirección" required></textarea>
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
