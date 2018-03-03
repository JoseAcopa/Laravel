<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rayos X y Servicios Induxtriales</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/datatable/dataTables.bootstrap.css') }}">
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
          <li ><a href="{{ url('/admin/client') }}"><i class="fa fa-users"></i>Clientes</a></li>
          <li ><a href="{{ url('/admin/suppliers') }}"><i class="fa fa-address-card-o"></i>Proveedores</a></li>
          <li ><a href="{{ url('/admin/employee') }}"><i class="fa fa-address-book-o"></i>Empleados</a></li>
          <li class="li-menu-nav">INVENTARIO</li>
          <li >
            <a id="inventary"><i class="fa fa-pencil-square"></i>Inventario <i class="fa fa-chevron-down"></i></a>
              <ul class="submenu-list" id="submenu-list">
                <li><a href="{{url('admin/inventary')}}"><i class="fa fa-list-ol "></i>Productos </a></li>
                <li><a href="{{url('admin/checkin')}}"> <i class="fa fa-sign-in fa-lg"></i> Entradas de Productos</a></li>
                <li><a href="{{url('admin/inventary-out')}}"> <i class="fa fa-sign-out"></i> Salidas de Productos</a></li>
                <li><a href="{{url('admin/clasificationProduct')}}"> <i class="fa fa-list-alt "></i> Tipos de Productos</a></li>
              </ul>
          </li>
          <li class="li-menu-nav">COTIZACION</li>
          <li><a href="{{url('admin/quotation')}}"><i class="fa fa-book"></i>Cotización</a></li>
          <li class="li-menu-nav">REPORTES</li>
          <li class="active"><a href="#"><i class="fa fa-book"></i>Reportes</a></li>
        </ul>
      </aside>
      <div class="container" id="container">
        <div class="location">
          <h1 class="title">Administrador</h1>
          <div class="breadcrumb">
            <ol>
              Se encuentra en
              <li><i class="fa fa-home"></i>Inicio</li>
              <li class="ol-active"><i class="fa fa-book"></i>Cotización</li>
            </ol>
          </div>
        </div>
          <!-- <div class="message-danger">
            <p></p>
          </div> -->
        <div class="table-container">
          <div class="for-container-quotitation">
            <div class="container-add-clients">
              <div class="date-clients">
                <label for="nInvoice">N° de Factura:</label>
                <input type="text" name="nInvoice" value="" placeholder="Número Factura" required>
                <div class="clasification">
                  <div class="select">
                    <label for="TProduct">Tipo de Producto:</label>
                    <input type="text" class="inicialesInput" name="TProduct" value="" id='TProducts' readonly="readonly">
                  </div>
                  <div class="iniciales">
                    <input type="text" class="inicialesInput" name="NProduct" value="" id='letters' readonly="readonly">
                  </div>
                </div>
                <label for="provider">Proveedor:</label>
                <select class="select-design" name="provider" id='provider'>
                  <option value="" id='provider'></option>
                    <option value=""></option>
                </select>
              </div>
              <div class="date-clients">
                <label for="checkin">Fecha de Inicio:</label>
                <input class="date-design" type="date" name="checkin" value="" required>
                <label for="quantity">Cantidad de Entrada:</label>
                <input type="tel" pattern="[0-9]*" title="numero invalido" name="quantity" value="0"  placeholder="Cantidad Entrada" onchange="mySuma(this)" required>
                <label for="stock">Existencia:</label>
                <input type="text" name="stock" value="" id='stock'  placeholder="Existencia" readonly="readonly">
                <input type="text" name="" value="" id='stockFixe'  placeholder="Existencia" hidden="">
              </div>
              <div class="date-clients">
                <label for="priceList">Precio Lista:</label>
                <input type="text" name="priceList" value="" id='priceList' placeholder="Precio Lista">
                <label for="cost">Costo:</label>
                <input type="text" name="cost" value="" id='cost' placeholder="Costo">
                <label for="unit">Unidad de Medida:</label>
                <input type="text"  name="unit" value="" id='unit'  placeholder="Unidad de medida" readonly="readonly">
              </div>
              <div class="chekinText">
                <div class="add-chekinTextArea">
                  <label for="description">Descripción:</label>
                  <textarea type="text" rows="4" name="description" id='description' placeholder="Descripción" readonly="readonly"></textarea>
                </div>
                <div class="checkinMoney">
                  <label for="money">Tipo de moneda:</label>
                  <select class="select-design" name="">
                    <option value="">Seleccione tipo de moneda</option>
                  </select>
                </div>
              </div>
              <div class="date-clients">
                <label for="">Categoria Precio Venta</label>
                <select class="select-design" name="" onchange="priceSales(this);">
                  <option value="">Seleccione categoria</option>
                  <option value="Categoria 1">Categoria 1</option>
                  <option value="Categoria 2">Categoria 2</option>
                  <option value="Categoria 3">Categoria 3</option>
                </select>
                <label for="priceSales1" id='ps'>Precio de Venta 1<p id="pv1"></p></label>
                <input type="text" name="priceSales1" value="" id="priceSales1" placeholder="Precio de Venta 1" readonly="" required>
              </div>
              <div class="date-clients">
                <label for="priceSales2" id='ps'>Precio de Venta 2 <p id="pv2"></p></label>
                <input type="text" name="priceSales2" value="" id="priceSales2" placeholder="Precio de Venta 2" readonly="" required>
                <label for="priceSales3" id='ps'>Precio de Venta 3 <p id="pv3"></p></label>
                <input type="text" name="priceSales3" value="" id="priceSales3" placeholder="Precio de Venta 3" readonly="" required>
              </div>
              <div class="date-clients">
                <label for="priceSales4" id='ps'>Precio de Venta 4 <p id="pv4"></p></label>
                <input type="text" name="priceSales4" value="" id="priceSales4" placeholder="Precio de Venta 4" readonly="" required>
                <label for="priceSales5">Precio de Venta 5:</label>
                <input type="text" name="priceSales5" value="" id="priceSales5" placeholder="Precio de Venta 5" required>
              </div>
            </div>
          </div>
          <div>
            <table id="Jtabla">
              <thead>
                <tr class="theader">
                  <th>Acciones</th>
                  <th>Folio</th>
                  <th>Fecha</th>
                  <th>Número de Cliente</th>
                  <th>Nombre de la Empresa</th>
                  <th>RFC</th>
               </tr>
              </thead>
              <tbody class="tbodymain">
                <tr class="tbody">
                  <td class="action">
                    <a class="btn-info" href="#" alt="Ver mas.."><i class="fa fa-eye fa-lg"></i></a>
                    <a class="btn-green" href="#"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                    <button type="submit" class="btn-danger"><i class="fa fa-trash-o fa-lg"></i></button>
                  </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>
    <footer id="footer">
      <h3>© 2017 Todos Los Derechos Reservados</h3>
    </footer>
    <script type="text/javascript" src="{{ url('js/menu-vertical.js') }}"></script>
    <script src="{{ url('js/datatable/jQuery-2.1.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/inventary.js') }}"></script>
    <script src="{{ url('js/datatable/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/datatable/dataTables.bootstrap.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
      $(function () {
        $('#Jtabla').dataTable({
          "bPaginate": true,
          "bLengthChange": true,
          "bFilter": true,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": true
        });
      });
    </script>
  </body>
</html>
