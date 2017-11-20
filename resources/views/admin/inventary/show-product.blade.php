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
          <a href="{{ url('/admin/admin-welcome') }}"><img class="img-menu" src="{{ url('img/LogoRX.png')}}" alt=""></a>
        </div>
        <ul class="ul-menu">
          <li class="li-menu-nav">MENU DE NAVEGACION</li>
          <li><a href="{{ url('/admin/admin-welcome') }}"><i class="fa fa-home"></i>Inicio</a></li>
          <li ><a href="{{ url('/admin/client') }}"><i class="fa fa-users"></i> Clientes</a></li>
          <li ><a href="{{ url('/admin/suppliers') }}"><i class="fa fa-address-card-o"></i>Proveedores</a></li>
          <li ><a href="{{ url('/admin/employee') }}"><i class="fa fa-user"></i>Empleados</a></li>
          <li class="li-menu-nav">INVENTARIO</li>
          <li class="active"><a href="{{url('admin/inventaryMenu')}}"><i class="fa fa-pencil-square"></i>Inventario <small class="bg-indicator">Mostrar</small></a></li>
          <li class="li-menu-nav">COTIZACION</li>
          <li><a href="{{url('admin/quotation')}}"><i class="fa fa-book"></i>Cotización</a></li>
        </ul>
      </aside>
      <div class="container" id="container">
        <div class="location">
          <h1 class="title">Administrador</h1>
          <div class="breadcrumb">
            <ol>
              Se encuentra en
              <li><i class="fa fa-home"></i>Inicio</li>
              <li class="ol-active"><i class="fa fa-eye"></i>Mostrar Productos</li>
            </ol>
          </div>
        </div>
        <div class="for-container">
          <h2><i class="fa fa-eye"></i> Mostrar Producto</h2>
          <div class="line"></div>
          <div class="show">
            <div class="view">
              <div class="show-product">
                <label for="">N° de Producto:</label>
                <p>{{ $product->initials }}-{{ $product->id }}</p>
              </div>
              <div class="show-product">
                <label for="">N° de Factura:</label>
                <p>{{ $product->nInvoice }}</p>
              </div>
              <div class="show-product">
                <label for="">Tipo de Producto:</label>
                <p>{{ $product->TProducts }}</p>
              </div>

              <div class="show-product">
                <label for="">Proveedor:</label>
                <p>{{ $product->provider }}</p>
              </div>
              <div class="show-product">
                <label for="">Descripción:</label>
                <p>{{ $product->description }}</p>
              </div>
              <div class="show-product">
                <label for="">Fecha de Entrada:</label>
                <p>{{ $product->checkin }}</p>
              </div>
            </div>
            <div class="view">

              <div class="show-product">
                <label for="">Cantidad de Entrada:</label>
                <p>{{ $product->quantity }}</p>
              </div>
              <div class="show-product">
                <label for="">Unidad de Medida:</label>
                <p>{{ $product->unit }}</p>
              </div>
              <div class="show-product">
                <label for="">Precio Lista:</label>
                <p>${{ $product->priceList }}</p>
              </div>
              <div class="show-product">
                <label for="">Costo:</label>
                <p>${{ $product->cost }}</p>
              </div>
              <div class="show-product">
                <label for="">Tipo de moneda:</label>
                <p></p>
              </div>
            </div>
            <div class="view">
              <div class="show-product">
                <label for="">Precio de Venta 1:</label>
                <p>{{ $product->priceSales1 }}</p>
              </div>
              <div class="show-product">
                <label for="">Precio de Venta 2:</label>
                <p>{{ $product->priceSales2 }}</p>
              </div>
              <div class="show-product">
                <label for="">Precio de Venta 3:</label>
                <p>{{ $product->priceSales3 }}</p>
              </div>
              <div class="show-product">
                <label for="">Precio de Venta 4:</label>
                <p>{{ $product->priceSales4 }}</p>
              </div>
              <div class="show-product">
                <label for="">Precio de Venta 5:</label>
                <p>{{ $product->priceSales5 }}</p>
              </div>
            </div>
          </div>
            <div class="btn-show">
              <a href="{{url('admin/inventary')}}"  class="btn-green"><i class="fa fa-chevron-circle-left"></i> Atras</a>
            </div>
        </div>
      </div>
    </main>
    <footer id="footer-form">
      <h3>© 2017 Todos Los Derechos Reservados</h3>
    </footer>
    <script type="text/javascript" src="{{ url('js/menu-vertical.js') }}"></script>
  </body>
</html>
