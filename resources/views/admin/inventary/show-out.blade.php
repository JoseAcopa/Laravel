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
      @include('../layouts/nav')
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
          <li class="active">
            <a id="inventary"><i class="fa fa-pencil-square"></i>Inventario <i class="fa fa-chevron-down"></i></a>
              <ul class="submenu-list" id="submenu-list">
                <li class="active" ><a href="{{url('admin/inventary')}}">Productos </a></li>
                <li><a href="{{url('admin/checkin')}}">  Entradas de Productos </a></li>
                <li><a href="{{url('admin/inventary-out')}}">  Salidas de Productos <small class="bg-indicator">Visualizar</small></a></li>
                <li><a href="{{url('admin/clasificationProduct')}}">  Tipos de Productos</a></li>
              </ul>
          </li>
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
              <li class="ol-active"><i class="fa fa-eye"></i>Mostrar Producto de Entrada</li>
            </ol>
          </div>
        </div>
        <div class="for-container">
          <h2><i class="fa fa-eye"></i> Mostrar Producto de Salida</h2>
          <div class="line"></div>
          <div class="show">
            <div class="view">
              <div class="show-product">
                <label for="">N° de Factura:</label>
                <p>{{ $checkout->nInvoice }}</p>
              </div>
              <div class="show-product">
                <label for="">Tipo de Producto:</label>
                <p>{{ $checkout->TProduct }}</p>
              </div>
              <div class="show-product">
                <label for="">Numero de Producto:</label>
                <p>{{ $checkout->NProduct }}</p>
              </div>
              <div class="show-product">
                <label for="">Proveedor:</label>
                <p>{{ $checkout->provider }}</p>
              </div>
              <div class="show-product">
                <label for="">Fecha de salida:</label>
                <p>{{ $checkout->checkout }}</p>
              </div>
            </div>
            <div class="view">
              <div class="show-product">
                <label for="">Cantidad de Salida:</label>
                <p>{{ $checkout->quantity }}</p>
              </div>
              <div class="show-product">
                <label for="">Merma:</label>
                <p>{{ $checkout->merma }}</p>
              </div>
              <div class="show-product">
                <label for="">Existencia:</label>
                <p>{{ $checkout->stock }}</p>
              </div>
              <div class="show-product">
                <label for="">Unidad de Medida:</label>
                <p>{{ $checkout->unit }}</p>
              </div>
              <div class="show-product">
                <label for="">Precio Lista:</label>
                <p>{{ $checkout->priceList }}</p>
              </div>
            </div>
            <div class="view">
              <div class="show-product">
                <label for="">Costo:</label>
                <p>{{ $checkout->cost }}</p>
              </div>
              <div class="show-product">
                <label for="">Precio Venta:</label>
                <p>{{ $checkout->priceSales }}</p>
              </div>
              <div class="show-product">
                <label for="">Descripción:</label>
                <p>{{ $checkout->description }}</p>
              </div>
              <div class="show-product">
                <label for="">Monto Total:</label>
                <p>{{ $checkout->totalAmount }}</p>
              </div>
            </div>
          </div>
          <div class="btn-show">
            <a href="{{url('admin/inventary-out')}}"  class="btn-green"><i class="fa fa-chevron-circle-left"></i> Atras</a>
          </div>
        </div>
      </div>
    </main>
    <footer id="footer-form">
      <h3>© 2017 Todos Los Derechos Reservados</h3>
    </footer>
    <script src="{{ url('js/datatable/jQuery-2.1.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/menu-vertical.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/inventary.js') }}"></script>
  </body>
</html>
