<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rayos X y Servicios Induxtriales</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}">
  </head>
  <body>
    <header>
      <nav class="nav">
        <ul class="ul-nav">
          <li onclick="menuVertical()"><i  class="fa fa-bars" aria-hidden="true"></i></li>
          <li>RAYOS X Y SERVICIOS INDUSTRIALES S.A. DE C.V.</li>
          <div class="sesion">
            <ul>
              <li><img src="{{ url('img/image.png')}}" alt="" class="popout">
                <ul>
                  <div class="photo">
                    <img src="{{ url('img/image.png')}}" alt="">
                  </div>
                  <div class="name">
                    <h3>Nirandelli Patricio Mayo</h3>
                    <h3></h3>
                  </div>
                  <li></li>
                  <div class="footerSingout">
                    <a href="#" class="sign-out"><i class="fa fa-sign-out"></i> Cerrar Sesión</a>
                  </div>
                </ul>
              </li>
            </ul>
          </div>
        </ul>
      </nav>
    </header>
    <main class="wrapper">
      <aside class="menu" id="aside">
        <div class="logo">
          <a href="{{ url('/users/users-welcome') }}"><img class="img-menu" src="{{ url('img/LogoRX.png')}}" alt=""></a>
        </div>
        <ul class="ul-menu">
          <li class="li-menu-nav">MENU DE NAVEGACION</li>
          <li ><a href="{{ url('/users/users-welcome') }}"><i class="fa fa-home"></i>Inicio</a></li>
          <li class="active"><a href="{{ url('/users/client') }}"><i class="fa fa-users"></i>Proveedores <small class="bg-indicator">Editar</small></a></li>
          <li class="li-menu-nav">INVENTARIO</li>
          <li class="i"><a href="{{url('/users/inventaryMenu')}}"><i class="fa fa-pencil-square"></i>Inventario</a></li>
          <li class="li-menu-nav">COTIZACION</li>
          <li><a href="{{url('/users/quotation')}}"><i class="fa fa-book"></i>Cotización</a></li>
        </ul>
      </aside>
      <div class="container" id="container">
        <div class="location">
          <h1 class="title">Invitado</h1>
          <div class="breadcrumb">
            <ol>
              Se encuentra en
              <li><i class="fa fa-home"></i>Inicio</li>
              <li class="ol-active"><i class="fa fa-edit"></i>Editar Proveedores</li>
            </ol>
          </div>
        </div>
        <div class="for-container">
          <h2><i class="fa fa-edit"></i> Editar Proveedores</h2>
          <form class="container-add-clients">
            <div class="date-clients">
              <label for="namBbusiness">Nombre de la Empresa:</label>
              <input type="text" name="nameBusiness" value="">
              <label for="rfc">RFC:</label>
              <input type="text" name="rfc" value="">
            </div>
            <div class="date-clients">
              <label for="telephone">Teléfono:</label>
              <input type="text" name="telephone" value="">
              <label for="correo">E-mail:</label>
              <input type="text" name="correo" value="">
            </div>
            <div class="date-clients">
              <label for="adress">Dirección:</label>
              <textarea type="text" rows="6" name="adress"></textarea>
            </div>
            <div class="button-client">
              <a href="#" class="btn-success"><i class="fa fa-save"></i> Guardar</a>
              <a href="{{ url('/admin/client') }}"  class="btn-danger"><i class="fa fa-times-rectangle-o"></i> Cancelar</a>
            </div>
          </form>
        </div>
      </div>
    </main>
    <footer id="footer">
      <h3>© 2017 Todos Los Derechos Reservados</h3>
    </footer>
    <script type="text/javascript" src="{{ url('js/menu-vertical.js') }}"></script>
  </body>
</html>
