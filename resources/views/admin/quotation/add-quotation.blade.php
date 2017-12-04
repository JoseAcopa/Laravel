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
          <li><a href="{{url('admin/inventaryMenu')}}"><i class="fa fa-pencil-square"></i>Inventario</a></li>
          <li class="li-menu-nav">COTIZACION</li>
          <li class="active"><a href="{{url('admin/quotation')}}"><i class="fa fa-book"></i>Cotización <small class="bg-indicator">Cotizar</small></a></li>
        </ul>
      </aside>
      <div class="container" id="container">
        <div class="location">
          <h1 class="title">Administrador</h1>
          <div class="breadcrumb">
            <ol>
              Se encuentra en
              <li><i class="fa fa-home"></i>Inicio</li>
              <li class="ol-active"><i class="fa fa-book"></i>Realizar Cotización</li>
            </ol>
          </div>
        </div>
        <div class="for-container">
          <h2><i class="fa fa-book"></i> Realizar Cotización</h2>
          <form class="container-add-clients" method="POST" action="/admin/quotation">
            {{ csrf_field() }}
            <div class="date-clients">
              <label for="folio">Folio:</label>
              <input type="text" name="folio" value=""  placeholder="Folio">
              <label for="date">Fecha:</label>
              <input type="date" name="date" value=""  placeholder="">
              <label for="nClient">Número de Cliente:</label>
              <select class="" name="nClient">
                <option value="test">test</option>
              </select>
              <label for="company">Nombre de la empresa:</label>
              <input type="text" name="company" value="">
            </div>
            <div class="date-clients">
              <label for="RFC">RFC:</label>
              <input type="text" name="RFC" value="">
              <label for="telephone">Teléfono:</label>
              <input type="text" name="phone" value="">
              <label for="direction">Dirección:</label>
              <textarea type="text" rows="6" name="direction"></textarea>
            </div>
            <div class="date-clients">
              <label for="name">Nombre Completo:</label>
              <input type="text" name="name" value="" placeholder="Nombre Completo">
              <label for="job">Puesto:</label>
              <input type="text" name="job" value="" placeholder="Puesto">
              <label for="mail">E-mail:</label>
              <input type="text" name="mail" value="" placeholder="E-mail">
              <label for="nBidding">Número de Licitación:</label>
              <input type="text" name="nBidding" value="" placeholder="Numero de Licitación">
            </div>
            <div class="obs-Total">
              <div class="observation-clients">
                <label for="observation">Observaciones:</label>
                <textarea type="text" rows="13" name="description"  placeholder="Observaciones"></textarea>
              </div>
              <div class="quotationTotal">
                <label for="total">SubTotal:</label>
                <input type="text" name="total" value=""  placeholder="SubTotal">
                <label for="IVA">IVA:</label>
                <input type="text" name="IVA" value=""  placeholder="IVA">
                <label for="totalAmount">TOTAL:</label>
                <input type="text" name="totalAmount" value=""  placeholder="Total">
              </div>
            </div>

            {{-- <div class="button-inventary">
              <a href="#" class="searchProduct"><i class="fa fa-search fa-1x"></i>  Buscar Productos</a>
            </div>
            <div class="">
              <table id="Jtabla">
                <thead>
                  <tr class="theader">
                    <th>Acciones</th>
                    <th>Tipo de Producto</th>
                    <th>Proveedor</th>
                    <th>Costo</th>
                    <th>Precio 1</th>
                    <th>Precio 2</th>
                    <th>Precio 3</th>
                 </tr>
                </thead>
                <tbody class="tbodymain">
                  <tr class="tbody">
                    <td class="action">
                      <button type="submit" class="btn-danger"><i class="fa fa-trash-o fa-lg"></i></button>
                    </td>
                    <td>00078</td>
                    <td>metros</td>
                    <td>Encargado de sistemas</td>
                    <td>delli.patricio.mayo@gmail.com</td>
                    <td>Encargado de sistemas</td>
                    <td>delli.patricio.mayo@gmail.com</td>
                  </tr>
                </tbody>
              </table>
            </div> --}}

            <div class="button-inventary">
              <button type="submit" class="btn-save"><i class="fa fa-save fa-lg"></i> Guardar</button>
              <a href="#" class="pdf"><i class="fa fa-file-pdf-o fa-lg"></i>  Imprimir PDF</a>
              <a href="{{ url('/admin/quotation') }}"  class="btn-danger fa-lg"><i class="fa fa-times-rectangle-o"></i> Cancelar</a>
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
