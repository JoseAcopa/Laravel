<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rayos X y Servicios Induxtriales</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}">
  </head>
  <body class="fondo">
    <header>
      <nav class="nav-login">
        <ul class="ul">
          <li>RAYOS X Y SERVICIOS INDUSTRIALES S.A. DE C.V.</li>
        </ul>
      </nav>
    </header>
    <main class="wrapper">
      <form class="login" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <img src="{{ url('img/LogoRX.png')}}" alt="">
        <h1>Login</h1>
        <div class="{{ $errors->has('user') ? ' has-error' : '' }}">
          <label for="user">Usuario</label>
          <div class="icon">
            <input type="text" name="user" id="user" value="{{ old('user') }}" placeholder="usuario" autofocus>
            <i class="fa fa-user" aria-hidden="true"></i>
          </div>
          {!! $errors->first('user','<span class="help-block">El Usuario debe ser válido</span>')!!}
        </div>
        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
          <label for="password">Contraseña</label>
          <div class="icon">
            <input type="password" name="password" id="password" value="" placeholder="contraseña">
            <i class="fa fa-key" aria-hidden="true"></i>
          </div>
          {!! $errors->first('password','<span class="help-block">La contraseña es obligatorio</span>')!!}
        </div>
        <div class="login-button-lost">
          <button type="submit" class="btn-login">Login</button>
          <a href="#" class="lost"><p>Olvidaste tu contraseña?</p></a>
        </div>
      </form>
    </main>
    <footer id="footer-login">
      <p>© 2017 Todos Los Derechos Reservados</p>
    </footer>
  </body>
</html>
