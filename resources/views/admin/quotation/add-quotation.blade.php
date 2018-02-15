<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rayos X y Servicios Induxtriales</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}">
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

             <div class="button-inventary">
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
                    <th>Precios</th>
                 </tr>
                </thead>
                <tbody class="tbodymain">
                  @foreach ($products as $product)
                    <tr class="tbody">
                      <td class="action">
                        <input type="checkbox" id="{{$product->id}}" value="" onchange="getDataTAble(this);">
                        <button type="submit" class="btn-danger"><i class="fa fa-trash-o fa-lg"></i></button>
                      </td>
                      <td>{{$product->TProducts}}</td>
                      <td>{{$product->provider}}</td>
                      <td>{{$product->cost}}</td>
                      <td>
                        <select class="" name="">
                          <option value="">Precio</option>
                          <option value="">{{$product->priceSales1}}</option>
                          <option value="">{{$product->priceSales2}}</option>
                          <option value="">{{$product->priceSales3}}</option>
                          <option value="">{{$product->priceSales4}}</option>
                          <option value="">{{$product->priceSales5}}</option>
                        </select>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

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
    <script src="{{ url('js/datatable/jQuery-2.1.3.min.js') }}"></script>
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
      function getDataTAble(val) {
        var value = document.getElementsByClassName('tbody')
        var checkbox = document.getElementById(val.id).checked
        var arry = []
         if (checkbox === true) {
           arry.push(value[val.id-1].innerText)
         }

        console.log(arry);
      }
    </script>
  </body>
</html>
