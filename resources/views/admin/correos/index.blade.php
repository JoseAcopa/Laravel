@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Restablecer Contraseña
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">restablecer contraseña</li>
      </ol>
    </section>

    <section class="content container-fluid">
      @if ($message = Session::get('success'))
        <div class="box box-success box-solid">
          <div class="box-header">
            <h3 class="box-title">{{ $message }}</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
        </div>
      @endif

      <div class="col-md-9">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Inbox</h3>
          </div>
          <div class="box-body">
            <table id="correos" class="table table-hover table-striped">
              <thead>
                <tr style="display:none;">
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($correos as $correo)
                  <tr>
                    <td class="mailbox-star"><?php echo $correo->status == "activo" ? '<i class="fa fa-star text-yellow"></i>' : '<i class="fa fa-star-o text-yellow"></i>'; ?></td>
                    <td class="mailbox-name"><a data-toggle="modal" data-target="#myModalEdit" onclick="edit('{{route('correo.send', ['idUser' => $correo->idUsuario, 'id' => $correo->id])}}');">{{$correo->nombre}}</a></td>
                    <td class="mailbox-subject">
                      <?php echo $correo->status == "activo" ? '<b>Restablecer Contraseña</b>' : 'Restablecer Contraseña'; ?>
                    </td>
                    <td class="mailbox-attachment"><?php echo $correo->status == "activo" ? '<i class="fa fa-paperclip"></i>' : ''; ?></td>
                    <td class="mailbox-date"><i class="fa fa-clock-o"></i> {{ Carbon\Carbon::parse($correo->created_at)->diffForHumans() }}</td>
                    <td class="mailbox-date"><i class="fa fa-trash-o" onclick="destroy('{{route('correo.destroy', $correo->id)}}');" style="color: #dd4b39; cursor: pointer;" ></i></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            @include('admin.correos.send')
          </div>
          <div class="box-footer">
            <button type="button" class="btn btn-default btn-sm pull-right"><i class="fa fa-refresh"></i></button>
          </div>
        </div>
      </div>
    </section>
    <script type="text/javascript">
      function destroy(url){
        event.preventDefault();
        swal({
          title: '¿Desea eliminar este registro?',
          text: "¡No podra revertir esto!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3c8dbc',
          cancelButtonColor: '#dd4b39',
          confirmButtonText: 'Sí, eliminar!',
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
            console.log(data);
            $('#para').val(data.user.name)
            $('#correo').val(data.user.email)
            $('#id').val(data.correo.id)
          }
        })
      }
    </script>

@endsection
