@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Administrador
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Realizar Cotización</li>
      </ol>
    </section>

    <section class="content container-fluid">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-book"></i> Realizar Cotización</h3>
        </div>
        <form role="form" method="POST" action="/admin/quotation">
          {{ csrf_field() }}
          <div class="box-body">
            <div class="col-md-4">
              <div class="form-group {{ $errors->has('folio') ? 'has-error' : '' }}">
                <label for="folio">Folio:</label>
                <input type="text" name="folio" class="form-control" placeholder="Folio">
              </div>
              <div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
                <label for="date">Fecha:</label>
                <input type="date" name="fecha" class="form-control">
              </div>
              <div class="form-group {{ $errors->has('empresa') ? 'has-error' : '' }}">
                <label for="company">Nombre de la empresa:</label>
                <input type="text" name="empresa" class="form-control" placeholder="nombre de la empresa">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group {{ $errors->has('RFC') ? 'has-error' : '' }}">
                <label for="RFC">RFC:</label>
                <input type="text" name="RFC" class="form-control" placeholder="RFC">
              </div>
              <div class="form-group {{ $errors->has('telefono') ? 'has-error' : '' }}">
                <label for="telephone">Teléfono:</label>
                <input type="text" name="telefono" class="form-control" placeholder="telefono">
              </div>
              <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="name">Nombre Completo:</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre Completo">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group {{ $errors->has('puesto') ? 'has-error' : '' }}">
                <label for="job">Puesto:</label>
                <input type="text" name="puesto" class="form-control" placeholder="Puesto">
              </div>
              <div class="form-group {{ $errors->has('correo') ? 'has-error' : '' }}">
                <label for="mail">E-mail:</label>
                <input type="text" name="correo" class="form-control" placeholder="E-mail">
              </div>
              <div class="form-group {{ $errors->has('licitacion') ? 'has-error' : '' }}">
                <label for="nBidding">Número de Licitación:</label>
                <input type="text" name="licitacion" class="form-control" placeholder="Numero de Licitación">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('direccion') ? 'has-error' : '' }}">
                <label for="direction">Dirección:</label>
                <textarea type="text" rows="4" name="direccion" class="form-control" placeholder="dirección"></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('observaciones') ? 'has-error' : '' }}">
                <label for="observation">Observaciones:</label>
                <textarea type="text" rows="4" name="observaciones" class="form-control" placeholder="Observaciones"></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <a href="#" class="btn btn-primary"><i class="fa fa-file-pdf-o"></i> Imprimir PDF</a>
            </div>
            <div class="col-md-6">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i> Buscar Producto</button>
            </div>
            <div class="col-md-12">
              <br>
              <table class="table table-bordered table-striped">
                <thead>
                  <tr class="info">
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Descripción</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                    <th>Eliminar</th>
                 </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>Manguera Industrial</td>
                      <td>4</td>
                      <td>Este es un producto de gates que se esta cotizando</td>
                      <td>100</td>
                      <td>400</td>
                      <td><a><i class="fa fa-times fa-lg"></i></a></td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
            <a href="{{ url('/admin/quotation') }}" class="btn btn-danger"><i class="fa fa-times-rectangle-o"></i> Cancelar</a>
          </div>

          <!-- Modal -->
          <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Seleccione el producto a cotizar</h4>
                </div>
                <div class="modal-body">
                  <table id="Jtabla" class="table table-bordered table-striped">
                    <thead>
                      <tr class="success">
                        <th>Producto</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Agregar</th>
                     </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td>Manguera Industrial</td>
                          <td>Este es un producto de gates que se esta cotizando</td>
                          <td>
                            <select class="form-control">
                              <option value="">1</option>
                              <option value="">2</option>
                              <option value="">3</option>
                              <option value="">4</option>
                            </select>
                          </td>
                          <td>
                            <input class="form-control" type="number"/>
                          </td>
                          <td>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="agregar[]" value="producto">
                                Agregar
                              </label>
                            </div>
                          </td>
                        </tr>
                    </tbody>
                  </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>

@endsection
