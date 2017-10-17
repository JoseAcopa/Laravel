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
          <li class="active"><a href="{{url('admin/inventary')}}"><i class="fa fa-pencil-square"></i>Inventario <small class="bg-indicator">Registrar</small></a></li>
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
              <li class="ol-active"><i class="fa fa-pencil"></i>Registrar Productos</li>
            </ol>
          </div>
        </div>
        <div class="for-container">
          <h2><i class="fa fa-pencil"></i> Registrar Producto</h2>
          <form class="container-add-clients" method="POST" action="/admin/inventary">
            {{ csrf_field() }}
            <div class="date-clients">
              <label for="nInvoice">N° de Factura:</label>
              <input type="text" name="nInvoice" value=""  placeholder="Número Factura" required>
              <label for="nProducts">N° de Producto:</label>
              <input type="text" name="nProducts" value=""  placeholder="Número Productos" required>
              <label for="provider">Proveedor:</label>
              <select class="" name="provider">
                <option value="null">Seleccione Proveedor</option>
                <option value="Proveedor1">Proveedor1</option>
                <option value="Proveedor2">Proveedor2</option>
              </select>
              <label for="description">Descripción:</label>
              <textarea type="text" rows="6" name="description" placeholder="Dirección"></textarea>
            </div>
            <div class="date-clients">
              <label for="checkin">Fecha de Entrada:</label>
              <input type="date" name="checkin" value="" required>
              <label for="quantity">Cantidad de Entrada:</label>
              <input type="text" name="quantity" value=""  placeholder="Cantidad Entrada" required>
              <label for="stock">Existencia:</label>
              <input type="text" name="stock" value=""  placeholder="Existencia" required>
              <label for="unit">Unidad de Medida:</label>
              <select class="" name="unit">
                <option value="null">Seleccione Unidad de Medida</option>
                <option value="Piezas">Piezas</option>
                <option value="Metros">Metros</option>
              </select>
              <label for="cost">Costo:</label>
              <input type="text" name="cost" value=""  placeholder="Costo" required>
            </div>
            <div class="date-clients">
              <label for="price1">Precio de Venta 1:</label>
              <input type="text" name="price1" value=""  placeholder="Precio de Venta 1" required>
              <label for="price2">Precio de Venta 2:</label>
              <input type="text" name="price2" value=""  placeholder="Precio de Venta 2" required>
              <label for="price3">Precio de Venta 3:</label>
              <input type="text" name="price3" value=""  placeholder="Precio de Venta 3" required>
              <label for="price4">Precio de Venta 4:</label>
              <input type="text" name="price4" value=""  placeholder="Precio de Venta 4" required>
            </div>
            <div class="button-client">
              <button href="#" class="btn-success"><i class="fa fa-save"></i>  Guardar</button>
              <a href="{{url('admin/inventary')}}"  class="btn-danger"><i class="fa fa-times-rectangle-o"></i>  Cancelar</a>
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
