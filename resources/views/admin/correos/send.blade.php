<div class="modal fade" id="myModalEdit" role="dialog">
  <div class="modal-dialog">
    <form class="modal-content" method="POST" action="{{route('correo.update')}}" onsubmit="changeButton()">
      {{ csrf_field() }}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Enviar correo</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="para">Para:</label>
          <input id="para" type="text" name="nombre" class="form-control" placeholder="para" readonly>
        </div>
        <div class="form-group">
          <label for="">Correo:</label>
          <input id="correo" type="text" name="correo" class="form-control" placeholder="correo" readonly>
        </div>
        <div class="form-group">
          <label for="">Nueva Contraseña:</label>
          <input type="text" class="form-control" name="contrasena" placeholder="contraseña" required>
          <input type="text" value="no-activo" name="status" hidden>
          <input type="text" id="id" name="id" hidden>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary pull-right disabled" style="display: none;" id="loading"><i class="fa fa-spinner fa-spin"></i> Enviando</button>
        <button type="submit" class="btn btn-primary" id="submit"><i class="fa fa-envelope-o"></i> Enviar</button>
      </div>
    </form>
  </div>
</div>
