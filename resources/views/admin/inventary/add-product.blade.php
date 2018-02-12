<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rayos X y Servicios Induxtriales</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/select2.css') }}"/>
    <script src="{{ url('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ url('js/select2.js') }}"></script>
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
          <li class="active">
            <a id="inventary"><i class="fa fa-pencil-square"></i>Inventario <i class="fa fa-chevron-down"></i></a>
            <ul class="submenu-active" id="submenu-list" >
              <li><a href="{{url('admin/catalogo')}}"><i class="fa fa-list"></i>Catálogo</a></li>
              <li class="activo"><a href="{{url('admin/inventary')}}"><i class="fa fa-list"></i>Productos</a><small class="bg-indicator">Registrar</small></li>
              <li><a href="{{url('admin/checkin')}}"><i class="fa fa-list"></i>Entradas de Productos </a></li>
              <li><a href="{{url('admin/inventary-out')}}"><i class="fa fa-list"></i>Salidas de Productos</a></li>
              <li><a href="{{url('admin/clasificationProduct')}}"><i class="fa fa-list"></i>Tipos de Productos</a></li>
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
              <li class="ol-active"><i class="fa fa-pencil"></i>Registrar Productos</li>
            </ol>
          </div>
        </div>
        <div class="for-container">
          @if (count($errors) > 0)
            <ul class="message-errors">
              <strong>Corrija los Siguientes datos!</strong>
              @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
          @endif
          <h2><i class="fa fa-pencil"></i> Registrar Producto</h2>
          <div class="searchDescription">
            <i class="fa fa-search"></i>
            <select id="search" onchange="catalogo(this)">
              <option value="null">Buscar Producto en Catálogo</option>
              @foreach ($catalog as $products)
                <option value="{{ $products->id }}">{{ $products->description }}</option>
              @endforeach
            </select>
          </div>
          <form class="container-add-clients" method="POST" action="/admin/inventary">
            {{ csrf_field() }}
            <div class="date-clients">
              <label for="nInvoice">N° de Factura:</label>
              <input type="text" name="nInvoice" placeholder="Número Factura">
              <div class="clasification">
                <div class="select">
                  <label for="TProduct">Tipo de Producto:</label>
                  <input type="text" class="inicialesInput" name="tipo_producto" value="" id='TProduct' readonly="">
                </div>
                <div class="iniciales">
                  <input type="text" class="inicialesInput" id="letter" name="initials" readonly>
                </div>
              </div>
              <label for="proveedor">Proveedor:</label>
              <input type="text" name="proveedor" id="proveedor" value="" readonly>
              {{-- <select class="select-design" name="proveedor">
                <option value="">Seleccione Proveedor</option>
                @foreach ($suppliers as $supplier)
                  <option value="{{$supplier->id}}">{{$supplier->business}}</option>
                @endforeach
              </select> --}}
            </div>
            <div class="date-clients">
              <label for="fecha_entrada">Fecha de Entrada:</label>
              <input type="date" class="date-design" name="fecha_entrada" id="fecha_entrada">
              <label for="cantidad_entrada">Cantidad de Entrada:</label>
              <input type="number" name="cantidad_entrada" id="cantidad_entrada" placeholder="Cantidad Entrada">
              <label for="unidad">Unidad de Medida:</label>
              <input type="text" name="unidad" value="" id="unidad" readonly>
              {{-- <select class="select-design" name="unidad">
                <option value="">Seleccione Unidad de Medida</option>
                @foreach ($units as $unit)
                  <option value="{{$unit->id}}">{{$unit->type}}</option>
                @endforeach
              </select> --}}
            </div>
            <div class="date-clients">
              <label for="pricelist">Precio Lista:</label>
              <input type="number" name="precio_lista" value="" id="priceList" placeholder="Precio Lista" onchange="priceSales();">
              <label for="cost">Costo:</label>
              <input type="number" name="costo" value="" id="cost" placeholder="Costo" onchange="priceSales();">
              <label for="moneda">Tipo de moneda:</label>
              <select class="select-design" name="moneda">
                <option value="">Seleccione tipo de moneda</option>
                @foreach ($coins as $coin)
                  <option value="{{$coin->id}}">{{$coin->type}}</option>
                @endforeach
              </select>
            </div>
            <div class="date-clientstextA">
              <label for="description">Descripción:</label>
              <textarea type="text" rows="4" name="description" id="description" placeholder="Descripción" readonly></textarea>
            </div>
            <div class="date-clients">
              <label for="">Categoria Precio Venta</label>
              <input type="text" id="categoria" readonly="">
              <label for="priceSales3" id='ps'>Precio de Venta 3 <p id="pv3"></p></label>
              <input type="text" name="priceSales3" value="" id="priceSales3" placeholder="Precio de Venta 3" readonly>
            </div>
            <div class="date-clients">
              <label for="priceSales1" id='ps'>Precio de Venta 1<p id="pv1"></p></label>
              <input type="text" name="priceSales1" value="" id="priceSales1" placeholder="Precio de Venta 1" readonly>
              <label for="priceSales4" id='ps'>Precio de Venta 4 <p id="pv4"></p></label>
              <input type="text" name="priceSales4" value="" id="priceSales4" placeholder="Precio de Venta 4" readonly>
            </div>
            <div class="date-clients">
              <label for="priceSales2" id='ps'>Precio de Venta 2 <p id="pv2"></p></label>
              <input type="text" name="priceSales2" value="" id="priceSales2" placeholder="Precio de Venta 2" readonly>
              <label for="priceSales5">Precio de Venta 5:</label>
              <input type="text" name="priceSales5" id='priceSales5' value="0.00" placeholder="Precio de Venta 5" onchange="priceFive(this);">
            </div>
            <div class="button-client">
              <button href="#" class="btn-save"><i class="fa fa-save fa-lg"></i>  Guardar</button>
              <a href="{{url('admin/inventary')}}"  class="btn-danger"><i class="fa fa-times-rectangle-o fa-lg"></i>  Cancelar</a>
            </div>
          </form>
          <div class="button-pdf">

          </div>
        </div>
      </div>
    </main>
    <footer id="footer">
      <h3>© 2017 Todos Los Derechos Reservados</h3>
    </footer>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#search").select2();
      });
    </script>
    <script type="text/javascript">
      function catalogo(val) {
        var catalog = <?php echo$catalog;?>;
        var orderCatalog = {}
        var priceList = document.getElementById('priceList').value
        var cost = document.getElementById('cost').value
        var cat1 = [.70, .65, .60, .57]
        var cat2 = [.40, .37, .36, .35]
        var cat3 = [.70, .75, .80, .85]
        var newRes = []

        catalog.map((item)=>{
          orderCatalog[val.value] = item
        })

        console.log(catalog);
        var newCatalog = orderCatalog[val.value]

        if (newCatalog.categoria === 'Petrolera | Industrial') {
          for (var i = 0; i < cat1.length; i++) {
            var res = cat1[i] * priceList
            newRes.push(res)
            document.getElementById('pv1').innerHTML = ' (x0.70)'
            document.getElementById('pv2').innerHTML = ' (x0.65)'
            document.getElementById('pv3').innerHTML = ' (x0.60)'
            document.getElementById('pv4').innerHTML = ' (x0.57)'
          }
        }else if (newCatalog.categoria === 'Hidraulica') {
          for (var i = 0; i < cat2.length; i++) {
            var res = cat2[i] * priceList
            newRes.push(res)
            document.getElementById('pv1').innerHTML = ' (x0.40)'
            document.getElementById('pv2').innerHTML = ' (x0.37)'
            document.getElementById('pv3').innerHTML = ' (x0.36)'
            document.getElementById('pv4').innerHTML = ' (x0.35)'
          }
        }else if (newCatalog.categoria === 'Otro') {
          for (var i = 0; i < cat3.length; i++) {
            var res = cost / cat3[i]
            newRes.push(res)
            document.getElementById('pv1').innerHTML = ' (/ 0.70)'
            document.getElementById('pv2').innerHTML = ' (/ 0.75)'
            document.getElementById('pv3').innerHTML = ' (/ 0.80)'
            document.getElementById('pv4').innerHTML = ' (/ 0.85)'
          }
        }

        document.getElementById('letter').value = newCatalog.letter
        document.getElementById('TProduct').value = newCatalog.typeProduct_id
        document.getElementById('categoria').value = newCatalog.categoria
        document.getElementById('proveedor').value = newCatalog.supplier_id
        document.getElementById('unidad').value = newCatalog.unit_id
        document.getElementById('description').value = newCatalog.description

        document.getElementById('priceSales1').value=newRes[0].toFixed(2)
        document.getElementById('priceSales2').value=newRes[1].toFixed(2)
        document.getElementById('priceSales3').value=newRes[2].toFixed(2)
        document.getElementById('priceSales4').value=newRes[3].toFixed(2)
      }
    </script>









    <script type="text/javascript">
      function priceSales() {
        var value = document.getElementById('categoria').value
        var priceList = document.getElementById('priceList').value
        var cost = document.getElementById('cost').value
        var cat1 = [.70, .65, .60, .57]
        var cat2 = [.40, .37, .36, .35]
        var cat3 = [.70, .75, .80, .85]
        var newRes = []

        if (value === 'Categoria 1') {
          for (var i = 0; i < cat1.length; i++) {
            var res = cat1[i] * priceList
            newRes.push(res)
            document.getElementById('pv1').innerHTML = ' (x0.70)'
            document.getElementById('pv2').innerHTML = ' (x0.65)'
            document.getElementById('pv3').innerHTML = ' (x0.60)'
            document.getElementById('pv4').innerHTML = ' (x0.57)'
          }
        }else if (value === 'Categoria 2') {
          for (var i = 0; i < cat2.length; i++) {
            var res = cat2[i] * cost
            newRes.push(res)
            document.getElementById('pv1').innerHTML = ' (x0.40)'
            document.getElementById('pv2').innerHTML = ' (x0.37)'
            document.getElementById('pv3').innerHTML = ' (x0.36)'
            document.getElementById('pv4').innerHTML = ' (x0.35)'
          }
        }else if (value === 'Categoria 3') {
          for (var i = 0; i < cat3.length; i++) {
            var res = cost / cat3[i]
            newRes.push(res)
            document.getElementById('pv1').innerHTML = ' (/ 0.70)'
            document.getElementById('pv2').innerHTML = ' (/ 0.75)'
            document.getElementById('pv3').innerHTML = ' (/ 0.80)'
            document.getElementById('pv4').innerHTML = ' (/ 0.85)'
          }
        }
        document.getElementById('priceSales1').value=newRes[0].toFixed(2)
        document.getElementById('priceSales2').value=newRes[1].toFixed(2)
        document.getElementById('priceSales3').value=newRes[2].toFixed(2)
        document.getElementById('priceSales4').value=newRes[3].toFixed(2)
      }
    </script>
    <script type="text/javascript">
      function priceFive(val) {
        var value = val.value
        var valueDefault = 0
        if(value === ''){
          document.getElementById('priceSales5').value=valueDefault.toFixed(2)
        }
      }
    </script>
    {{-- <script src="{{ url('js/datatable/jQuery-2.1.3.min.js') }}"></script> --}}
    <script type="text/javascript" src="{{ url('js/menu-vertical.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/inventary.js') }}"></script>
  </body>
</html>
