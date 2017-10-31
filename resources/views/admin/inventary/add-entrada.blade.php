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
          <li class="active"><a href="{{url('admin/inventary')}}"><i class="fa fa-pencil-square"></i>Inventario <small class="bg-indicator">Entradas</small></a></li>
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
              <li class="ol-active"><i class="fa fa-pencil-square"></i>Registrar Entradas</li>
            </ol>
          </div>
        </div>
        <div class="for-container">
          <h2><i class="fa fa-pencil-square"></i> Registrar Entrada</h2>
          <form class="container-add-clients" method="POST" action="/admin/checkin">
            {{ csrf_field() }}
            <div class="date-clients">
              <label for="nInvoice">N° de Factura:</label>
              <input type="text" name="nInvoice" value=""  placeholder="Número Factura" required>
              <label for="TProducts">N° de Producto:</label>
              <select class="" name="" onchange="myProduct(this)">
                <option value="null">Seleccione Producto</option>
                @foreach ($products as $product)
                  <option value="{{ $product->id }}">{{ $product->initials }}-{{ $product->id }}</option>
                @endforeach
              </select>
              <label for="TProducts">Nombre de Producto:</label>
              <input type="text" name="TProducts" value="" id='TProducts'  placeholder="Producto" readonly="readonly">
              <label for="provider">Proveedor:</label>
              <input type="text" name="provider" value="" id='provider' placeholder="Provedor" readonly="readonly">
            </div>
            <div class="date-clients">
              <label for="checkin">Fecha de Entrada:</label>
              <input type="date" name="checkin" value="" required>
              <label for="quantity">Cantidad de Entrada:</label>
              <input type="number" name="quantity" value="0"  placeholder="Cantidad Entrada" onchange="mySuma(this)" required>
              <label for="stock">Existencia:</label>
              <input type="text" name="stock" value="" id='stock'  placeholder="Existencia" readonly="readonly">
            </div>
            <div class="date-clients">
              <label for="unit">Unidad de Medida:</label>
              <input type="text" name="unit" value="" id='unit'  placeholder="Unidad de medida" readonly="readonly">
              <label for="cost">Costo:</label>
              <input type="text" name="cost" value="" id='cost' placeholder="Costo" readonly="readonly">
              <label for="price">Precio:</label>
              <input type="text" name="price" placeholder="Costo">
              <label for="description">Descripción:</label>
              <textarea type="text" rows="4" name="description" id='description' placeholder="Descripción" readonly="readonly"></textarea>
            </div>
            <div class="button-client">
              <button href="#" class="btn-save"><i class="fa fa-save fa-lg"></i>  Guardar</button>
              <a href="{{url('admin/checkin')}}"  class="btn-danger"><i class="fa fa-times-rectangle-o fa-lg"></i>  Cancelar</a>
            </div>
          </form>
        </div>
      </div>
    </main>
    <footer id="footer-form">
      <h3>© 2017 Todos Los Derechos Reservados</h3>
    </footer>
    <script type="text/javascript" src="{{ url('js/menu-vertical.js') }}"></script>
    <script type="text/javascript">
      function myProduct(e) {
        var val = <?php echo$products;?>;
        var newVal = {};

        val.map((item)=>{
          newVal[item.id] = item
        })

        var product = newVal[e.value]
        var newProduct = product.TProducts
        var newStock = parseInt(product.quantity)
        var newProvider = product.provider
        var newCost = product.cost
        var newDescription = product.description
        var newUnit = product.unit

        document.getElementById('TProducts').value=newProduct
        document.getElementById('stock').value=newStock
        document.getElementById('provider').value=newProvider
        document.getElementById('cost').value=newCost
        document.getElementById('description').value=newDescription
        document.getElementById('unit').value=newUnit
      }
    </script>
    <script type="text/javascript">
      function mySuma(e) {
        var stock = document.getElementById('stock').value
        var quantity = e.value
        var newStock = parseInt(stock) + parseInt(quantity)

        document.getElementById('stock').value=newStock
      }
    </script>
  </body>
</html>
