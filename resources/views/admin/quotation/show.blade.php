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
          <li><a href="{{ url('/admin/client') }}"><i class="fa fa-users"></i>Clientes</a></li>
          <li ><a href="{{ url('/admin/suppliers') }}"><i class="fa fa-address-card-o"></i>Proveedores</a></li>
          <li><a href="{{ url('/admin/employee') }}"><i class="fa fa-address-book-o"></i>Empleados</a></li>
          <li class="li-menu-nav">INVENTARIO</li>
          <li >
            <a id="inventary"><i class="fa fa-pencil-square"></i>Inventario <i class="fa fa-chevron-down"></i></a>
              <ul class="submenu-list" id="submenu-list">
                <li><a href="{{url('admin/catalogo')}}"><i class="fa fa-list"></i>Catálogo</a></li>
                <li><a href="{{url('admin/inventary')}}"><i class="fa fa-list"></i>Productos </a></li>
                <li><a href="{{url('admin/checkin')}}"><i class="fa fa-list"></i>Entradas de Productos</a></li>
                <li><a href="{{url('admin/inventary-out')}}"><i class="fa fa-list"></i>Salidas de Productos</a></li>
                <li><a href="{{url('admin/clasificationProduct')}}"><i class="fa fa-list"></i>Tipos de Productos</a></li>
              </ul>
          </li>
          <li class="li-menu-nav">COTIZACION</li>
          <li><a href="{{url('admin/quotation')}}"><i class="fa fa-book"></i>Cotización <small class="bg-indicator">Mostrar</small></a></li>
        </ul>
      </aside>
      <div class="container" id="container">
        <div class="location">
          <h1 class="title">Administrador</h1>
          <div class="breadcrumb">
            <ol>
              Se encuentra en
              <li><i class="fa fa-home"></i>Inicio</li>
              <li class="ol-active"><i class="fa fa-eye"></i>Mostrar Contenido Cotizacion</li>
            </ol>
          </div>
        </div>
        <div class="for-container">
          <h2><i class="fa fa-eye"></i> Mostrar Cotizacion</h2>
          <div class="line"></div>
          <div class="show">
            <div class="view">
              <div class="show-product">
                <label for="">Folio</label>
                <p>{{ $quotation->folio }}</p>
              </div>
              <div class="show-product">
                <label for="">RFC:</label>
                <p>{{ $quotation->RFC }}</p>
              </div>
              <div class="show-product">
                <label for="">Nombre:</label>
                <p>{{ $quotation->name }}</p>
              </div>
              <div class="show-product">
                <label for="">Fecha:</label>
                <p>{{ $quotation->date }}</p>
              </div>
              <div class="show-product">
                <label for="">Puesto:</label>
                <p>{{ $quotation->job }}</p>
              </div>
            </div>
            <div class="view">
              <div class="show-product">
                <label for="">Cliente:</label>
                <p>{{ $quotation->nClient }}</p>
              </div>
              <div class="show-product">
                <label for="">Dirección:</label>
                <p>{{ $quotation->direction }}</p>
              </div>
              <div class="show-product">
                <label for="">Correo:</label>
                <p>{{ $quotation->mail }}</p>
              </div>
              <div class="show-product">
                <label for="">Empresa:</label>
                <p>{{ $quotation->company }}</p>
              </div>
              <div class="show-product">
                <label for="">Numero Licitacion</label>
                <p>{{ $quotation->nBindding }}</p>
              </div>
            </div>
            <div class="view">
              <div class="show-product">
                <label for="">Descripción:</label>
                <p>{{ $quotation->description }}</p>
              </div>
              <div class="show-product">
                <label for="">Total:</label>
                <p>{{ $quotation->total }}</p>
              </div>
              <div class="show-product">
                <label for="">IVA:</label>
                <p>{{ $quotation->IVA }}</p>
              </div>
              <div class="show-product">
                <label for="">Monto Total:</label>
                <p>{{ $quotation->totalAmount }}</p>
              </div>
            </div>
          </div>
          <div class="btn-show">
            <a href="{{url('admin/quotation')}}"  class="btn-green"><i class="fa fa-chevron-circle-left"></i> Atras</a>
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
