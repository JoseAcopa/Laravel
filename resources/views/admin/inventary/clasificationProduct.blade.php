@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Categorias
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Categorias de Producto</li>
      </ol>
    </section>

    <section class="content container-fluid">
      @if ($message = Session::get('success'))
        <div class="box box-success box-solid">
          <div class="box-header">
            <h3 class="box-title"><i class="icon fa fa-check"></i> {{ $message }}</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
        </div>
      @endif

      <div class="box">
        <div class="box-header">
          <h4><i class="fa fa-pencil-square"></i> Categorias de Producto</h4>
        </div>

        <div class="box-body">
          <div class="col-md-4">
            <form rol="form" method="POST" action="{{route('categoria.store')}}">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                  <label for="typeP">Tipo de Producto:</label>
                  <input type="text" name="type" id="type" class="form-control" >
                  {!! $errors->first('type','<span class="help-block">:message</span>')!!}
                </div>
                <div class="form-group {{ $errors->has('letters') ? 'has-error' : '' }}">
                  <label for="ini">Iniciales:</label>
                  <input type="text" name="letters" id="name" class="form-control" >
                  {!! $errors->first('letters','<span class="help-block">:message</span>')!!}
                </div>
                <div class="form-group {{ $errors->has('categorias') ? 'has-error' : '' }}">
                  <label for="ini">Categorias:</label>
                  <select name="categorias" id="name" class="form-control" >
                    <option value="">Seleccione Categoria</option>
                    <option value="Petrolera | Industrial">Petrolera | Industrial</option>
                    <option value="Hidraulica">Hidraulica</option>
                    <option value="Otro">Otro</option>
                  </select>
                  {!! $errors->first('categorias','<span class="help-block">:message</span>')!!}
                </div>
              </div>
              <div class="box-footer">
                @can ('clasificationProduct.create')
                  <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-lg"></i> Guardar</button>
                @endcan
              </div>
            </form>
          </div>
          <div class="col-md-8">
            <table class="table table-bordered table-hover dataTable">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tipo de Producto</th>
                  <th>Letra Inicial</th>
                  <th>Categoria</th>
                  <th>Acciones</th>
               </tr>
              </thead>
              <tbody>
                @foreach ($categories as $key)
                  <tr>
                    <td>{{$key->id}}</td>
                    <td>{{$key->type}}</td>
                    <td>{{$key->letters}}</td>
                    <td>{{$key->categorias}}</td>
                    <td class="row-copasat">
                      @can ('clasificationProduct.destroy')
                        <a type="submit" class="btn btn-danger" onclick="destroy('{{route('categoria.destroy', $key->id)}}');"><i class="fa fa-trash-o"></i></a>
                      @endcan
                    </td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Tipo de Producto</th>
                  <th>Letra Inicial</th>
                  <th>Categoria</th>
                  <th>Acciones</th>
               </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </section>
    <script type="text/javascript">
      function destroy(url){
        event.preventDefault();
        swal({
          title: '¿Desea eliminar esta categoria?',
          text: "¡No podra revertir esto!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3c8dbc',
          cancelButtonColor: '#dd4b39',
          confirmButtonText: 'Sí, eliminarlo!',
          cancelButtonText: 'No, cancelar!'
        }).then((res) => {
          if (res.value) {
            $.ajax({
              url: url,
              method: "POST",
              data: {
                  _token: "{{csrf_token()}}",
                  _method: "DELETE"
              },
              success: function(data){
                swal(
                  '¡Eliminado!',
                  'El registro ha sido eliminado.',
                  'success'
                ).then(()=>{
                  location.reload();
                })
              }
            })
          }else if (res.dismiss === "cancel") {
            swal(
              '¡Cancelado!',
              'La accion fue cancelada.',
              'error'
            )
          }
        })
      }
    </script>

@endsection
