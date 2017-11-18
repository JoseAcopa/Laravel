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
          <li ><a href="{{ url('/admin/client') }}"><i class="fa fa-users"></i>Clientes</a></li>
          <li ><a href="{{ url('/admin/suppliers') }}"><i class="fa fa-address-card-o"></i>Proveedores</a></li>
          <li ><a href="{{ url('/admin/employee') }}"><i class="fa fa-address-book-o"></i>Empleados</a></li>
          <li class="li-menu-nav">INVENTARIO</li>
          <li class="active"><a href="{{url('admin/inventaryMenu')}}"><i class="fa fa-pencil-square"></i>Inventario <small class="bg-indicator">Precios</small></a></li>
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
              <li class="ol-active"><i class="fa fa-pencil-square fa-lg"></i>Registrar Precios</li>
            </ol>
          </div>
        </div>
        <div class="for-container">
          <h2><i class="fa fa-pencil-square"></i>Registrar Precios de Ventas</h2>
          <form class="container-add-clients" method="POST" action="/admin/inventary-out">
            <div class="date-clients">
              <label for="nInvoice">N° de Factura:</label>
              <input type="text" name="nInvoice" value="" required>
              <div class="clasification">
                <div class="select">
                  <label for="TProducts">Tipo de Producto:</label>
                  <input type="text" class="inicialesInput"  name="TProducts" value="" id='TProducts' hidden="">
                  <select class="" name="">
                    <option value="">Seleccione producto</option
                      <option value=""></option>
                  </select>
                </div>
                <div class="iniciales">
                  <input type="text" class="inicialesInput" name="letters" value="" id='letters'  readonly="readonly">
                </div>
              </div>
              <label for="provider">Proveedor:</label>
              <input type="text" name="provider" value="" id='provider'  readonly="readonly">
            </div>
            <div class="date-clients">
              {{-- <label for="rfc">RFC:</label>
              <input type="text" name="rfc" value="" id='rfc' readonly="readonly"> --}}
              <label for="unit">Unidad de Medida:</label>
              <input type="text" name="unit" value="" id='unit' readonly="readonly">
              <label for="cost">Costo:</label>
              <input type="text" name="cost" value="" id='cost' readonly="readonly">
            </div>
            <div class="date-clients">
              <label for="description">Descripción:</label>
              <textarea type="text" rows="6" name="description" id='description' readonly="readonly"></textarea>
            </div>

            <div class="salePrice">
              <h2>Precio de Venta 1</h2>
              <label for="precio1">Porcentaje:</label>
              <input type="text" name="Porcentaje" value="" id='Porcentaje' placeholder="Porcentaje">
              <label for="precio1">Precio de Venta:</label>
              <input type="text" name="precio1" value="" id='precio1' placeholder="Precio de  Venta 1">
            </div>
            <div class="salePrice">
              <h2>Precio de Venta 2</h2>
              <label for="precio1">Porcentaje:</label>
              <input type="text" name="Porcentaje" value="" id='Porcentaje' placeholder="Porcentaje">
              <label for="precio2">Precio de Venta:</label>
              <input type="text" name="precio2" value="" id='precio2' placeholder="Precio de  Venta 2">
            </div>
            <div class="salePrice">
              <h2>Precio de Venta 3</h2>
              <label for="precio1">Porcentaje:</label>
              <input type="text" name="Porcentaje" value="" id='Porcentaje' placeholder="Porcentaje">
              <label for="precio3">Precio de Venta:</label>
              <input type="text" name="precio3" value="" id='precio3' placeholder="Precio de  Venta 3">
            </div>

            <div class="button-client">
              <button href="#" class="btn-save"><i class="fa fa-save fa-lg"></i>  Guardar</button>
              <a href="{{url('admin/inventary/price/price')}}"  class="btn-danger "><i class="fa fa-times-rectangle-o fa-lg"></i> Cancelar</a>
            </div>
          </form>
          <div class="button-pdf">

          </div>
        </div>
      </div>
    </main>
    <footer id="footerQuotation">
      <h3>© 2017 Todos Los Derechos Reservados</h3>
    </footer>
    <script type="text/javascript" src="{{ url('js/menu-vertical.js') }}"></script>
  </body>
</html>
