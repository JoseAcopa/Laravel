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
              <ul class="submenu-list" id="submenu-list">
                <li class="active" ><a href="{{url('admin/inventary')}}">Productos </a></li>
                <li><a href="{{url('admin/checkin')}}">Entradas de Productos </a></li>
                <li><a href="{{url('admin/inventary-out')}}"> Salidas de Productos <small class="bg-indicator">Agregar</small></a></li>
                <li><a href="{{url('admin/clasificationProduct')}}"> Tipos de Productos</a></li>
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
              <li class="ol-active"><i class="fa fa-pencil-square fa-lg"></i>Registrar Salidas</li>
            </ol>
          </div>
        </div>
        <div class="for-container">
          <h2><i class="fa fa-pencil-square"></i>Registrar Salidas</h2>
          <div class="searchDescription">
            <i class="fa fa-search"></i>
            <select id="search" onchange="myProduct(this)">
              <<option value="null">Buscar Producto</option>
              @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->description }}</option>
              @endforeach
            </select>
          </div>
          <form class="container-add-clients" method="POST" action="/admin/inventary-out">
            {{ csrf_field() }}
            <div class="date-clients">
              <label for="nInvoice">N° de Factura:</label>
              <input type="text" name="nInvoice" value="" required>
              <div class="clasification">
                <div class="select">
                  <label for="TProduct">Tipo de Producto:</label>
                  <input type="text" class="inicialesInput" name="TProduct" value="" id='TProduct' readonly="">
                </div>
                <div class="iniciales">
                  <input type="text" class="inicialesInput" name="NProduct" value="" id='letters'  readonly="readonly">
                </div>
              </div>
              <label for="provider">Proveedor:</label>
              <input type="text" name="provider" value="" id='provider'readonly="readonly">
              <label for="description">Descripción:</label>
              <textarea type="text" rows="4" name="description" id='description'readonly="readonly"></textarea>
            </div>
            <div class="date-clients">
              <label for="checkout">Fecha de Salida:</label>
              <input type="date" class="date-design" name="checkout" value="" class="date">
              <label for="unit">Unidad de Medida:</label>
              <input type="text" name="unit" value="" id='unit' readonly="readonly">
              <label for="stock">Existencia:</label>
              <input type="text" name="stock" value="" id='stock' readonly="readonly">
              <input type="text" name="" value="" id='stockFixe' hidden="">
              <label for="quantity">Cantidad de Salida:</label>
              <input type="number" name="quantity" value="0" id="quantity" placeholder="Cantidad Entrada" onchange="myResta(this)" required>
              <label for="merma">Merma:</label>
              <input type="number" name="merma" value="" placeholder="Merma" onchange="myResta(this)">
            </div>
            <div class="date-clients">
              <label for="priceList">Precio Lista:</label>
              <input type="text" name="priceList" value="" id='priceList' placeholder="Precio Lista" readonly="">
              <label for="cost">Costo:</label>
              <input type="text" name="cost" id="cost" value="" placeholder="Costo" readonly="">
              <label for="priceSales">Precio de Venta:</label>
              <div class="input-radio">
                <input onchange="checkbox(this);" type="radio" name="priceSales1" id="pv1" value=""><label for="pv1">Venta 1</label>
                <input onchange="checkbox(this);" type="radio" name="priceSales1" id="pv2" value=""><label for="pv2">Venta 2</label>
                <input onchange="checkbox(this);" type="radio" name="priceSales1" id="pv3" value=""><label for="pv3">Venta 3</label>
              </div>
              <div class="input-radio">
                <input onchange="checkbox(this);" type="radio" name="priceSales1" id="pv4" value=""><label for="pv4">Venta 4</label>
                <input onchange="checkbox(this);" type="radio" name="priceSales1" id="pv5" value=""><label for="pv5">Venta 5</label>
              </div>
              <input type="text" name="priceSales" value="" id='priceSales' placeholder="Precio Venta" readonly="">
              <label for="totalAmount">Precio Total:</label>
              <input type="text" name="totalAmount" value="" id="totalAmount" placeholder="Precio Total">
            </div>
            <div class="button-client">
              <button href="#" class="btn-save"><i class="fa fa-save fa-lg"></i>  Guardar</button>
              <a href="{{url('admin/inventary-out')}}"  class="btn-danger "><i class="fa fa-times-rectangle-o fa-lg"></i> Cancelar</a>
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
    <script type="text/javascript">
      $(document).ready(function() {
        $("#search").select2();
      });
    </script>
    {{-- <script src="{{ url('js/datatable/jQuery-2.1.3.min.js') }}"></script> --}}
    <script type="text/javascript" src="{{ url('js/menu-vertical.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/inventary.js') }}"></script>
    <script type="text/javascript">
      function myProduct(e) {
        var val = <?php echo$products;?>;
        var newVal = {};

        val.map((item)=>{
          newVal[item.id] = item
        })

        var product = newVal[e.value]
        var newTProduct = product.TProducts
        var newInitials = product.initials+"-"+product.id
        var newStock = parseInt(product.quantity)
        var newProvider = product.provider
        var newCost = product.cost
        var newDescription = product.description
        var newUnit = product.unit
        var newPriceList = product.priceList
        var newPriceSales1 = product.priceSales1
        var newPriceSales2 = product.priceSales2
        var newPriceSales3 = product.priceSales3
        var newPriceSales4 = product.priceSales4
        var newPriceSales5 = product.priceSales5

        document.getElementById('TProduct').value=newTProduct
        document.getElementById('letters').value=newInitials
        document.getElementById('stock').value=newStock
        document.getElementById('stockFixe').value=newStock
        document.getElementById('provider').value=newProvider
        document.getElementById('cost').value=newCost
        document.getElementById('description').value=newDescription
        document.getElementById('unit').value=newUnit
        document.getElementById('priceList').value=newPriceList
        document.getElementById('pv1').value=newPriceSales1
        document.getElementById('pv2').value=newPriceSales2
        document.getElementById('pv3').value=newPriceSales3
        document.getElementById('pv4').value=newPriceSales4
        document.getElementById('pv5').value=newPriceSales5
      }
    </script>
    <script type="text/javascript">
      function myResta(e) {
        var stock = document.getElementById('stockFixe').value
        var quantity = e.value
        var newStock = parseInt(stock) - parseInt(quantity)

        document.getElementById('stock').value=newStock
      }
    </script>
    <script type="text/javascript">
      function checkbox(val) {
        var checked = val.checked
        var value = val.value
        var checkout = document.getElementById('quantity').value
        var totalAmount = value * checkout

        document.getElementById('totalAmount').value=totalAmount.toFixed(2)

        if (checked === true) {
          document.getElementById('priceSales').value=value
        }
      }
    </script>
  </body>
</html>
