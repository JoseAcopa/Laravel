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
      <form class="login">
        <img src="{{ url('img/LogoRX.png')}}" alt="">
        <h1>Login</h1>
        <label for="users">Usuario</label>
        <div class="icon">
          <input type="text" id="users" value="" placeholder="usuario">
          <i class="fa fa-user" aria-hidden="true"></i>
        </div>
        <label for="pass">Contraseña</label>
        <div class="icon">
          <input type="password" id="pass" value="" placeholder="contraseña">
          <i class="fa fa-key" aria-hidden="true"></i>
        </div>
        <div class="button-client">
          <a href="{{ url('/admin/admin-welcome') }}" class="btn-success"><i class="fa fa-sign-in" aria-hidden="true"></i>Iniciar Sesion</a>
          <a href="" class="lost"><p>Olvidaste tu contraseña?</p></a>
        </div>
      </form>
    </main>
    <footer id="footer-login">
      <p>© 2017 Todos Los Derechos Reservados</p>
    </footer>
  </body>
</html>
