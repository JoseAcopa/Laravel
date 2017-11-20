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
          <li class="active"><a href="{{url('admin/inventaryMenu')}}"><i class="fa fa-pencil-square"></i>Inventario <small class="bg-indicator">Salidas</small></a></li>
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
                  <label for="TProducts">Tipo de Producto:</label>
                  <input type="text" class="inicialesInput"  name="TProducts" value="" id='TProducts' hidden="">
                  <select class="select-design" name="" onchange="myProduct(this)">
                    <option value="">Seleccione producto</option>
                    @foreach ($products as $product)
                      <option value="{{ $product->id }}">{{ $product->TProducts }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="iniciales">
                  <input type="text" class="inicialesInput" name="letters" value="" id='letters'  readonly="readonly">
                </div>
              </div>
              <label for="provider">Proveedor:</label>
              <input type="text" name="provider" value="" id='provider'readonly="readonly">
              <label for="description">Descripción:</label>
              <textarea type="text" rows="4" name="description" id='description'readonly="readonly"></textarea>
            </div>
            <div class="date-clients">
              <label for="unit">Unidad de Medida:</label>
              <input type="text" name="unit" value="" id='unit' readonly="readonly">
              <label for="checkout">Fecha de Salida:</label>
              <input type="date" class="date-design" name="checkout" value="" class="date">
              <label for="cost">Costo:</label>
              <input type="text" name="cost" value="" id='cost' readonly="readonly">
              {{-- <label for="precio1">Porcentaje:</label>
              <input type="text" name="Porcentaje" value="" id='Porcentaje' placeholder="Porcentaje"> --}}
              <label for="stock">Existencia:</label>
              <input type="text" name="stock" value="" id='stock'  readonly="readonly">
            </div>
            <div class="date-clients">
              <label for="quantityCO">Cantidad de Salida:</label>
              <input type="number" name="quantityCO" value="0"  placeholder="Cantidad Entrada" onchange="mySuma(this)" required>
              <label for="merma">Merma:</label>
              <input type="text" name="merma" value=""  placeholder="Merma" onclick="resta()">
              <label for="price">Precio de Venta:</label>
              <select class="select-design" name="">
                <option value=""></option>
              </select>
              {{-- <input type="text" name="price" value="" placeholder="Precio de Venta"> --}}
              {{-- <input type="text" name="" value="" id='stockFixe'  placeholder="Existencia" hidden=""> --}}
              <label for="totalAmount">Precio Total:</label>
              <input type="text" name="totalAmount" value=""  placeholder="Precio Total">
              <input type="text" name="totalMult" value="100"  placeholder="Precio Total" hidden="">
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
    <script type="text/javascript" src="{{ url('js/menu-vertical.js') }}"></script>
    <script type="text/javascript">
      function myProduct(e) {
        var val = <?php echo$products;?>;
        var newVal = {};

        val.map((item)=>{
          newVal[item.id] = item
        })

        var product = newVal[e.value]
        var newTProducts = product.TProducts
        var newInitials = product.initials+"-"+product.id
        var newStock = parseInt(product.quantity)
        var newProvider = product.provider
        var newCost = product.cost
        var newDescription = product.description
        var newUnit = product.unit

        document.getElementById('TProducts').value=newTProducts
        document.getElementById('letters').value=newInitials
        document.getElementById('stock').value=newStock
        document.getElementById('stockFixe').value=newStock
        document.getElementById('provider').value=newProvider
        document.getElementById('cost').value=newCost
        document.getElementById('description').value=newDescription
        document.getElementById('unit').value=newUnit
      }
    </script>
    <script type="text/javascript">
      function mySuma(e) {
        var stock = document.getElementById('stockFixe').value
        var quantity = e.value
        var newStock = parseInt(stock) - parseInt(quantity)

        document.getElementById('stock').value=newStock
      }
    </script>
    <script type="text/javascript">
    function resta() {
      var decrase= Number (document.getElementById('merma').value);
      var out= Number (document.getElementById('quantityCO').value);
      var result = decrase-out ;

      document.getElementById('quantityCO').value=result;
    }

    </script>
  </body>
</html>
