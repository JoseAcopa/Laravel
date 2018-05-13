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
    @if ($message = Session::get('error'))
      <div class="login-errors">
        <p>{{ $message }}</p>
      </div>
    @endif
    @if ($message = Session::get('flash'))
      <div class="login-errors">
        <p>{{ $message }}</p>
      </div>
    @endif
    @if ($message = Session::get('success'))
      <div class="login-success">
        <p>{{ $message }}</p>
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
          <a href="#" class="lost"><p>Olvidaste tu contraseña?</p></a>
        </div>
      </form>
    </main>
    <footer id="footer-login">
      <p>© 2018 Todos Los Derechos Reservados</p>
    </footer>
  </body>
</html>
