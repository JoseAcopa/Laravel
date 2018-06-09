<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rayos X y Servicios Induxtriales</title>
    <link rel="icon" type="image/png" href="/img/icono1.png"/>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  </head>
  <body class="fondo">
    <header>
      <nav class="nav-login">
        <ul class="ul">
          <li>RAYOS X Y SERVICIOS INDUSTRIALES S.A. DE C.V.</li>
        </ul>
      </nav>
    </header>
    @if ($message = Session::get('error'))
      <div class="panel panel-danger" style="width: 30%; margin-top: 20px !important; margin: 0 auto; background: #f2dede;">
        <div class="panel-body" style="color: #a94442; text-align: center; font-size: 20px;">{{ $message }}</div>
      </div>
    @endif
    @if ($message = Session::get('flash'))
      <div class="panel panel-danger" style="width: 30%; margin-top: 20px !important; margin: 0 auto; background: #f2dede;">
        <div class="panel-body" style="color: #a94442; text-align: center; font-size: 20px;">{{ $message }}</div>
      </div>
    @endif
    @if ($message = Session::get('success'))
      <div class="panel panel-success" style="width: 30%; margin-top: 20px !important; margin: 0 auto; background: #dff0d8;">
        <div class="panel-body" style="color: #3c763d; text-align: center; font-size: 20px;">{{ $message }}</div>
      </div>
    @endif
    <main class="wrapper">
      <form class="login" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <img src="{{ url('img/LogoRX.png')}}" alt="">
        <h1>Login</h1>
        <div>
          <label for="email">Correo</label>
          <div class="icon">
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="{{ $errors->has('email') ? 'has-error' : '' }}" placeholder="email" autofocus>
            <i class="fa fa-user" aria-hidden="true"></i>
          </div>
          {!! $errors->first('email','<span class="help-block">El correo electrónico no es válido</span>')!!}
        </div>
        <div>
          <label for="password">Contraseña</label>
          <div class="icon">
            <input type="password" name="password" id="password" value="" class="{{ $errors->has('password') ? 'has-error' : '' }}" placeholder="password">
            <i class="fa fa-key" aria-hidden="true"></i>
          </div>
          {!! $errors->first('password','<span class="help-block">:message</span>')!!}
        </div>
        <div class="login-button-lost">
          <button type="submit" class="btn-login">Login</button>
          <a data-toggle="modal" data-target="#myModal" class="lost"><p>Olvidaste tu contraseña?</p></a>
        </div>
      </form>
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <form class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Enviar correo</h4>
            </div>
            <div class="modal-body">
              <p>Has olvidado tu contraseña?, solo envia tu nombre de usuario o correo.</p>
              <div class="form-group">
                <input type="text" name="correo" value="" class="form-control" placeholder="usuario o correo">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary pull-left">Enviar</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">cerrar</button>
            </div>
          </form>
        </div>
      </div>
    </main>
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  </body>
</html>
