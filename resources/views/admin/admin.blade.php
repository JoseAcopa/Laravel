@extends('layouts.app')

@section('content')
    <section class="content-header">
      <h1>
        Usuario:
        <small>{{Auth::user()->name}}</small>
        <small>({{Auth::user()->user}})</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Inicio</li>
      </ol>
    </section>

    <section class="content container-fluid">
      {{-- <div class="col-md-12">
        <div class="callout callout-info">
          <h1>RX EL EQUIPO QUE SE MUEVE A DONDE TU LO NECESITES!</h1>
        </div>
      </div> --}}

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{$users}}</h3>

            <p>Registros de usuarios</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{ url('/admin/usuario') }}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{$quotations}}</h3>

            <p>Cotizaciones del dia</p>
          </div>
          <div class="icon">
            <i class="fa fa-list"></i>
          </div>
          <a href="{{ url('/admin/cotizacion') }}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{$customers}}</h3>

            <p>Registros de clientes</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-people-outline"></i>
          </div>
          <a href="{{ url('/admin/clientes') }}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{$providers}}</h3>

            <p>Registros de proveedores</p>
          </div>
          <div class="icon">
            <i class="fa fa-address-card-o"></i>
          </div>
          <a href="{{ url('/admin/proveedores') }}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-md-5">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Misión</h3>
          </div>
          <div class="box-body">
            Generar servicios, transformar y comercializar  en forma eficiente el Servicio de Inspección No Destructiva,
            así como nuestros productos a la Industria Nacional, fomentando la diversificación productiva que propicie
            un valor agregado a cada uno de nuestros Clientes, siendo promotores de la tecnología de punta y apuntalando
            la economía tanto del Estado como del País.
          </div>
        </div>

        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Visión</h3>
          </div>
          <div class="box-body">
            Posicionar a Rayos X y Servicios Industriales S.A. de C.V. como empresa líder en la aplicación de
            Ensayos No Destructivos y soluciones vía el suministro a las instalaciones petroleras y de la
            iniciativa privada en la República Mexicana, proporcionando el servicio requerido, dentro de las
            normas de calidad y seguridad que  satisfagan a todos nuestros Clientes.
          </div>
        </div>
      </div>

      <div class="col-md-7">
        <div class="box box-primary">
            <div class="box-header ui-sortable-handle">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Lista por hacer</h3>
              <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                  @for ($i = 1; $i < $activities->lastPage()+1; $i++)
                    @if ($i == 1)
                      @if ($activities->currentPage() == 1)
                        <li class="disabled" ><a>«</a></li>
                      @else
                        <li><a href="{{$activities->url($activities->currentPage()-1)}}">«</a></li>
                      @endif
                    @endif
                    <li <?php echo $activities->currentPage() == $i ? 'class="active"': ''?>><a href="{{$activities->url($i)}}">{{$i}}</a></li>
                    @if ($i == $activities->lastPage())
                      @if ($activities->lastPage() == $activities->currentPage())
                        <li class="disabled"><a>»</a></li>
                      @else
                        <li><a href="{{$activities->nextPageUrl()}}">»</a></li>
                      @endif
                    @endif
                  @endfor
                </ul>
                {{-- {{ $activities->links() }} --}}
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              <ul class="todo-list ui-sortable">
              @foreach ($activities as $activity)
                <li <?php echo $activity->status == "1" ? 'class="done"' : ''?>>
                  <span class="handle ui-sortable-handle" style="cursor: default !important;">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                  </span>
                  <input type="checkbox" disabled <?php echo $activity->status == "1" ? 'checked' : ''?> style="cursor: default !important;">
                  <span class="text">{{$activity->titulo}}</span>
                  <small class="label <?php echo Carbon\Carbon::parse($activity->created_at)->diffForHumans() === "hace 1 día" || Carbon\Carbon::parse($activity->created_at)->diffForHumans() === "hace 2 días" ? "label-warning" : "label-success";?>"><i class="fa fa-clock-o"></i> {{ Carbon\Carbon::parse($activity->created_at)->diffForHumans()}}</small>
                  <div class="tools">
                    <i class="fa fa-edit" data-toggle="modal" data-target="#myModalEdit" onclick="edit('{{route('actividad.edit', $activity->id)}}');"></i>
                    <i class="fa fa-trash-o" onclick="destroy('{{route('actividad.destroy', $activity->id)}}');"></i>
                  </div>
                </li>
              @endforeach
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Nuevo</button>
              <!-- Modal -->
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                  <form class="modal-content" method="POST" action="{{route('actividad.store')}}">
                    {{ csrf_field() }}
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Agregar actividad</h4>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="titulo" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">{{Auth::user()->name}}</h3>
              <h5 class="widget-user-desc">{{Auth::user()->email}}</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Projects <span class="pull-right badge bg-blue">31</span></a></li>
                <li><a href="#">Tasks <span class="pull-right badge bg-aqua">5</span></a></li>
                <li><a href="#">Completed Projects <span class="pull-right badge bg-green">12</span></a></li>
                <li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li>
              </ul>
            </div>
          </div>
          </div>
          <div class="col-md-8">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Application Buttons</h3>
              </div>
              <div class="box-body">
                <p>Add the classes <code>.btn.btn-app</code> to an <code>&lt;a&gt;</code> tag to achieve the following:</p>
                <a class="btn btn-app">
                  <i class="fa fa-edit"></i> Edit
                </a>
                <a class="btn btn-app">
                  <i class="fa fa-play"></i> Play
                </a>
                <a class="btn btn-app">
                  <i class="fa fa-repeat"></i> Repeat
                </a>
                <a class="btn btn-app">
                  <i class="fa fa-pause"></i> Pause
                </a>
                <a class="btn btn-app">
                  <i class="fa fa-save"></i> Save
                </a>
                <a class="btn btn-app">
                  <span class="badge bg-yellow">3</span>
                  <i class="fa fa-bullhorn"></i> Notifications
                </a>
                <a class="btn btn-app">
                  <span class="badge bg-green">300</span>
                  <i class="fa fa-barcode"></i> Products
                </a>
                <a class="btn btn-app">
                  <span class="badge bg-purple">891</span>
                  <i class="fa fa-users"></i> Users
                </a>
                <a class="btn btn-app">
                  <span class="badge bg-teal">67</span>
                  <i class="fa fa-inbox"></i> Orders
                </a>
                <a class="btn btn-app">
                  <span class="badge bg-aqua">12</span>
                  <i class="fa fa-envelope"></i> Inbox
                </a>
                <a class="btn btn-app">
                  <span class="badge bg-red">531</span>
                  <i class="fa fa-heart-o"></i> Likes
                </a>
              </div>
              <!-- /.box-body -->
            </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="myModalEdit" role="dialog">
            <div class="modal-dialog">
              <form class="modal-content" method="POST" action="{{route('actividad.update')}}">
                {{ csrf_field() }}
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Editar actividad</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input type="text" class="form-control" id="tituloEdit" name="tituloEdit" placeholder="titulo">
                    <input type="text" name="idActividad" id="idActividad" hidden>
                  </div>
                  <div class="">
                    <input type="checkbox" value="false" id="check" name="check">
                    <label for="check">Desactivar</label>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </form>
            </div>
          </div>
        {{-- <img src="{{ url('img/MV1.jpg')}}" width="100%"> --}}
      </div>
    </section>
    <script type="text/javascript">
      function destroy(url){
        event.preventDefault();
        swal({
          title: '¿Desea eliminar esta actividad?',
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

      function edit(url){
        event.preventDefault();
        $.ajax({
          url: url,
          method: "GET",
          data: {
              _token: "{{csrf_token()}}",
              _method: "GET"
          },
          success: function(data){
            console.log(data.status);
            $('#tituloEdit').val(data.titulo)
            $('#idActividad').val(data.id)
            document.getElementById('check').checked = data.status === "0" ? false : true
          }
        })
      }
    </script>

@endsection
