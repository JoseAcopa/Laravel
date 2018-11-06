<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SIYC RayosX</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/png" href="/img/icono1.png"/>
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
        <b>Admin</b>LTE <img src="{{ url('img/image.png')}}" alt="logo" style="width: 60px; height:40px; margin-top: -15px;">
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
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  </body>
</html>
