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
          <li class="active">
            <a id="inventary"><i class="fa fa-pencil-square"></i>Inventario <i class="fa fa-chevron-down"></i></a>
              <ul class="submenu-list" id="submenu-list">
                <li class="active" ><a href="{{url('admin/inventary')}}">Productos <small class="bg-indicator">Registrar</small></a></li>
                <li><a href="{{url('admin/checkin')}}"> Entradas de Productos</a></li>
                <li><a href="{{url('admin/inventary-out')}}"> Salidas de Productos</a></li>
                <li><a href="{{url('admin/clasificationProduct')}}">Tipos de Productos</a></li>
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
          <form class="container-add-clients" method="POST" action="/admin/inventary">
            {{ csrf_field() }}
            <div class="date-clients">
              <label for="nInvoice">N° de Factura:</label>
              <input type="text" name="nInvoice" value="" placeholder="Número Factura">
              <div class="clasification">
                <div class="select">
                  <label for="TProducts">Tipo de Producto:</label>
                  <input type="text" id="TProducts" value="" name="TProducts" readonly="readonly" hidden="">
                  <select class="select-design" name="" onchange="typeProduct(this);" id='test'>
                    <option value="">Seleccione Tipo Producto</option>
                    @foreach ($typeProducts as $typeProduct)
                      <option value="{{$typeProduct->id}}">{{$typeProduct->type}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="iniciales">
                  <input type="text" class="inicialesInput" id="VM" value="" name="initials" readonly="readonly">
                </div>
              </div>
              <label for="provider">Proveedor:</label>
              <select class="select-design" name="provider">
                <option value="">Seleccione Proveedor</option>
                @foreach ($suppliers as $supplier)
                  <option value="{{$supplier->business}}">{{$supplier->business}}</option>
                @endforeach
              </select>
            </div>
            <div class="date-clients">
              <label for="checkin">Fecha de Entrada:</label>
              <input type="date" class="date-design" name="checkin" value="">
              <label for="quantity">Cantidad de Entrada:</label>
              <input type="text" name="quantity" value="" placeholder="Cantidad Entrada">
              <label for="unit">Unidad de Medida:</label>
              <select class="select-design" name="unit">
                <option value="">Seleccione Unidad de Medida</option>
                @foreach ($units as $unit)
                  <option value="{{$unit->type}}">{{$unit->type}}</option>
                @endforeach
              </select>
            </div>
            <div class="date-clients">
              <label for="pricelist">Precio Lista:</label>
              <input type="text" name="priceList" value="" id="priceList" placeholder="Precio Lista" onchange="priceSales();">
              <label for="cost">Costo:</label>
              <input type="text" name="cost" value="" id="cost" placeholder="Costo" onchange="priceSales();">
              <label for="money">Tipo de moneda:</label>
              <select class="select-design" name="coin">
                <option value="">Seleccione tipo de moneda</option>
                @foreach ($coins as $coin)
                  <option value="{{$coin->type}}">{{$coin->type}}</option>
                @endforeach
              </select>
            </div>
            <div class="date-clientstextA">
              <label for="description">Descripción:</label>
              <textarea type="text" rows="4" name="description" placeholder="Descripción"></textarea>
            </div>
            <div class="date-clients">
              <label for="">Categoria Precio Venta</label>
              <input type="text" name="" id="categoria" value="" readonly="">
              <label for="priceSales3" id='ps'>Precio de Venta 3 <p id="pv3"></p></label>
              <input type="text" name="priceSales3" value="" id="priceSales3" placeholder="Precio de Venta 3" readonly="">
            </div>
            <div class="date-clients">
              <label for="priceSales1" id='ps'>Precio de Venta 1<p id="pv1"></p></label>
              <input type="text" name="priceSales1" value="" id="priceSales1" placeholder="Precio de Venta 1" readonly="">
              <label for="priceSales4" id='ps'>Precio de Venta 4 <p id="pv4"></p></label>
              <input type="text" name="priceSales4" value="" id="priceSales4" placeholder="Precio de Venta 4" readonly="">
            </div>
            <div class="date-clients">
              <label for="priceSales2" id='ps'>Precio de Venta 2 <p id="pv2"></p></label>
              <input type="text" name="priceSales2" value="" id="priceSales2" placeholder="Precio de Venta 2" readonly="">
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
      function typeProduct(val){
        var typeProducts = <?php echo$typeProducts;?>;
        var newVal = {};
        typeProducts.map((item)=>{
          newVal[item.id] = item
        })
        var typeProduct = newVal[val.value]
        document.getElementById('VM').value = typeProduct.letters;
        document.getElementById('TProducts').value = typeProduct.type;
        document.getElementById('categoria').value = typeProduct.categorias;
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
        console.log(value);
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
    <script src="{{ url('js/datatable/jQuery-2.1.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/menu-vertical.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/inventary.js') }}"></script>
  </body>
</html>
