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
    <link rel="stylesheet" type="text/css" href="{{ url('css/select2.css') }}"/>
    <script src="{{ url('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ url('js/select2.js') }}"></script>
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
          @if (auth()->user()->cliente === 1)
            <li><a href="{{ url('/admin/client') }}"><i class="fa fa-users"></i>Clientes</a></li>
          @endif
          @if (auth()->user()->proveedores === 1)
            <li><a href="{{ url('/admin/suppliers') }}"><i class="fa fa-address-card-o"></i>Proveedores</a></li>
          @endif
          @if (auth()->user()->empleados === 1)
            <li><a href="{{ url('/admin/employee') }}"><i class="fa fa-address-book-o"></i>Empleados</a></li>
          @endif
          <li class="li-menu-nav">INVENTARIO</li>
          @if (auth()->user()->inventario === 1)
            <li>
              <a id="inventary"><i class="fa fa-pencil-square"></i>Inventario <i class="fa fa-chevron-down"></i></a>
              <ul class="submenu-list" id="submenu-list">
                <li><a href="{{url('admin/catalogo')}}"><i class="fa fa-list"></i>Catálogo</a></li>
                <li><a href="{{url('admin/inventary')}}"><i class="fa fa-list"></i>Productos </a></li>
                <li><a href="{{url('admin/checkin')}}"><i class="fa fa-list"></i>Entradas de Productos</a></li>
                <li><a href="{{url('admin/inventary-out')}}"><i class="fa fa-list"></i>Salidas de Productos</a></li>
                <li><a href="{{url('admin/clasificationProduct')}}"><i class="fa fa-list"></i>Tipos de Productos</a></li>
              </ul>
            </li>
          @endif
          <li class="li-menu-nav">COTIZACION</li>
          @if (auth()->user()->cotizacion === 1)
            <li class="active"><a href="{{url('/admin/quotation')}}"><i class="fa fa-book"></i>Cotización <small class="bg-indicator">Cotizar</small></a></li>
          @endif
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
              <input type="text" name="folio" placeholder="Folio">
              <label for="date">Fecha:</label>
              <input type="date" name="fecha">
              <label for="company">Nombre de la empresa:</label>
              <input type="text" name="empresa" placeholder="nombre de la empresa">
            </div>
            <div class="date-clients">
              <label for="RFC">RFC:</label>
              <input type="text" name="RFC" placeholder="RFC">
              <label for="telephone">Teléfono:</label>
              <input type="text" name="telefono" placeholder="telefono">
              <label for="direction">Dirección:</label>
              <textarea type="text" rows="4" name="direccion" placeholder="dirección"></textarea>
            </div>
            <div class="date-clients">
              <label for="name">Nombre Completo:</label>
              <input type="text" name="nombre" placeholder="Nombre Completo">
              <label for="job">Puesto:</label>
              <input type="text" name="puesto" placeholder="Puesto">
              <label for="mail">E-mail:</label>
              <input type="text" name="correo" placeholder="E-mail">
              <label for="nBidding">Número de Licitación:</label>
              <input type="text" name="licitacion" placeholder="Numero de Licitación">
            </div>
            <div class="obs-Total">
              <div class="observation-clients">
                <label for="observation">Observaciones:</label>
                <textarea type="text" rows="8" name="observaciones" placeholder="Observaciones"></textarea>
              </div>
            </div>
            <button type="submit" class="btn-edit"><i class="fa fa-save fa-lg"></i> Guardar</button>
            <a href="#" class="pdf"><i class="fa fa-file-pdf-o fa-lg"></i> Imprimir PDF</a>
            <a class="btn-save" id="buscar-producto"><i class="fa fa-search fa-lg"></i> Buscar Producto</a>
            <div class="for-container-quotitation">
              <table id="tablaCotizacion">
                <thead>
                  <tr class="theader">
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Descripción</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                    <th>Eliminar</th>
                 </tr>
                </thead>
                <tbody class="tbodymain">
                    <tr class="tbody">
                      <td>Manguera Industrial</td>
                      <td>4</td>
                      <td>Este es un producto de gates que se esta cotizando</td>
                      <td>100</td>
                      <td>400</td>
                      <td><a><i class="fa fa-times fa-lg"></i></a></td>
                    </tr>
                </tbody>
              </table>
            </div>
          </form>
          <div class="cotizar-total">
            <a href="{{ url('/admin/quotation') }}"  class="btn-danger fa-lg"><i class="fa fa-times-rectangle-o"></i> Cancelar</a>
            <label>TOTAL: $400</label>
          </div>
          <div id="modal-producto">
            <div class="container-getProduct">
              <i id="cerrar-producto" class="fa fa-times fa-lg"></i>
              <table id="Jtabla">
                <thead>
                  <tr class="theader">
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Proveedor</th>
                    <th>Stock</th>
                    <th>Precios</th>
                    <th>Cantidad</th>
                    <th>Agregar</th>
                 </tr>
                </thead>
                <tbody class="tbodymain">
                    @foreach ($products as $product)
                      <tr class="tbody">
                        <td>{{$product->category}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->supplier}}</td>
                        <td>{{$product->stock}}</td>
                        <td>
                          <select>
                            <option value="">test</option>
                          </select>
                        </td>
                        <td>
                          <input type="number" class="select-product">
                        </td>
                        <td>
                          <input type="checkbox" name="elemento2" value="2">
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              <a href="#" onclick="checked();">agregar</a>
            </div>
          </div>
        </div>
      </div>
    </main>
    <footer id="footerQuotation">
      <h3>© 2018 Todos Los Derechos Reservados</h3>
    </footer>

    <script type="text/javascript" src="{{ url('js/menu-vertical.js') }}"></script>
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
    <script type="text/javascript">
      $(document).ready(function() {
        $("#search").select2();
      });
    </script>
    <script type="text/javascript">
      function checked() {
        $("input[type=checkbox]:checked").each(function(){
        	$(this).closest('td').siblings().each(function(){
            console.log($(this).text());
          });
        });
      }
    </script>
  </body>
</html>
