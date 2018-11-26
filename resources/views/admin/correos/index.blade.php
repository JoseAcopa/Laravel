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
                    <td class="mailbox-name">
                      <?php
                        $url = json_encode(route('correo.send', ['idUser' => $correo->idUsuario, 'id' => $correo->id]));
                        echo $correo->status == "activo" ? "<a data-toggle='modal' data-target='#myModalEdit' onclick='edit($url);' style='cursor: pointer;'>$correo->nombre</a>" : $correo->nombre;?>
                    </td>
                    <td class="mailbox-subject">
                      <?php echo $correo->status == "activo" ? '<b>Restablecer Contraseña</b>' : 'Restablecer Contraseña'; ?>
                    </td>
                    <td class="mailbox-attachment"><?php echo $correo->status == "activo" ? '<i class="fa fa-paperclip"></i>' : ''; ?></td>
                    <td class="mailbox-date"><i class="fa fa-clock-o"></i> {{ Carbon\Carbon::parse($correo->created_at)->diffForHumans() }}</td>
                    @can ('correo.destroy')
                      <td class="mailbox-date"><i class="fa fa-trash-o" onclick="destroy('{{route('correo.destroy', $correo->id)}}');" style="color: #dd4b39; cursor: pointer;"></i></td>
                    @endcan
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
            $('#para').val(data.user.name)
            $('#correo').val(data.user.email)
            $('#id').val(data.correo.id)
          }
        })
      }
    </script>
    <script type="text/javascript">
      function changeButton() {
        document.getElementById('submit').style.display = 'none'
        document.getElementById('loading').style.display = 'block'
      }
    </script>

@endsection
