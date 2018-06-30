<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SIYC RayosX</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/png" href="/img/icono1.png"/>
    {{-- <link rel="stylesheet" href="{{ url('css/style.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200" rel="stylesheet">
    <link rel="stylesheet" href="{!! asset('dist/css/AdminLTE.min.css') !!}">


  </head>
  <body class="hold-transition login-page" style="height: 50vh !important;">
    <div class="login-box">
      @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-ban"></i> Error!</h4>
          {{ $message }}
        </div>
      @endif
      @if ($message = Session::get('flash'))
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Error!</h4>
          {{ $message }}
        </div>
      @endif
      @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Exitoso!</h4>
          {{ $message }}
        </div>
      @endif
      <div class="login-logo">
        <b>SIYC</b>RayosX <img src="{{ url('img/LogoRX.png')}}" alt="logo" style="width: 60px; height:40px; margin-top: -15px;">
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Inicia sesión</p>
        <form method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}
          <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
            <input type="email" placeholder="Correo" id="email" name="email" value="{{ old('email') }}" class="form-control" autofocus>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            {!! $errors->first('email','<span class="help-block">:message</span>')!!}
          </div>
          <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
            <input type="password" class="form-control" placeholder="Contraseña" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            {!! $errors->first('password','<span class="help-block">:message</span>')!!}
          </div>
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar Sesión</button>
            </div>
          </div>
        </form><br>
        <a data-toggle="modal" data-target="#myModal" style="cursor: pointer";>Olvidé mi contraseña</a><br>
      </div>
      <!-- /.login-box-body -->
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <form class="modal-content" method="POST" action="{{route('password.new')}}" onsubmit="changeButton();">
          {{ csrf_field() }}
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Enviar correo</h4>
          </div>
          <div class="modal-body">
            <p>Ingresa tu correo electrónico.</p>
            <div class="form-group">
              <input type="email" name="correo" class="form-control" placeholder="correo" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="submit"><i class="fa fa-envelope"></i> Enviar</button>
            <button type="button" class="btn btn-primary pull-right disabled" style="display: none;" id="loading"><i class="fa fa-spinner fa-spin"></i> Enviando</button>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
          </div>
        </form>
      </div>
    </div>
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript">
      function changeButton() {
        document.getElementById('submit').style.display = 'none'
        document.getElementById('loading').style.display = 'block'
      }
    </script>
  </body>
</html>
