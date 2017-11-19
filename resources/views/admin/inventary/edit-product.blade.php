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
          <li class="active"><a href="{{url('admin/inventaryMenu')}}"><i class="fa fa-pencil-square"></i>Inventario <small class="bg-indicator">Editar</small></a></li>
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
              <li class="ol-active"><i class="fa fa-pencil-square-o"></i>Editar Productos</li>
            </ol>
          </div>
        </div>
        <div class="for-container">
          <h2><i class="fa fa-pencil-square-o"></i> Editar Productos</h2>
          {!! Form::model($product, ['method' => 'PATCH','route' => ['inventary.update', $product->id], 'class' => 'container-add-clients']) !!}
            {{ csrf_field() }}
            <div class="date-clients">
              <label for="nInvoice">N° de Factura:</label>
              <input type="text" name="nInvoice" value="{{ $product->nInvoice }}" required>
              <div class="clasification">
                <div class="select">
                  <label for="TProducts">Tipo de Producto:</label>
                  <input type="text" id="TProducts" value="{{ $product->TProducts }}" name="TProducts" readonly="readonly" hidden="">
                  <select class="tproductSelect" name="" onchange="myTProduct(this);" id='test'>
                    <option value="{{ $product->TProducts }}">{{ $product->TProducts }}</option>
                    @foreach ($typeProducts as $typeProduct)
                      <option value="{{ $typeProduct->id_Producto }}">{{ $typeProduct->type }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="iniciales">
                  {{-- <label for="VM">Iniciales:</label> --}}
                  <input type="text" class="inicialesInput" id="VM" value="{{ $product->initials }}" name="initials" readonly="readonly">
                </div>
              </div>
              <label for="provider">Proveedor:</label>
              <select class="" name="provider">
                <option value="{{ $product->provider }}">{{ $product->provider }}</option>
                @foreach ($suppliers as $supplier)
                  <option value="{{ $supplier->business }}">{{ $supplier->business }}</option>
                @endforeach
              </select>
            </div>
            <div class="date-clients">
              <label for="checkin">Fecha de Entrada:</label>
              <input type="date" name="checkin" value="{{ $product->checkin }}" required>
              <label for="quantity">Cantidad de Entrada:</label>
              <input type="text" name="quantity" value="{{ $product->quantity }}" required>
              <label for="unit">Unidad de Medida:</label>
              <select class="" name="unit">
                <option value="{{ $product->unit }}">{{ $product->unit }}</option>
                @foreach ($units as $unit)
                  <option value="{{ $unit->type }}">{{ $unit->type }}</option>
                @endforeach
              </select>
            </div>
            <div class="date-clients">
              <label for="pricelist">Precio Lista:</label>
              <input type="text" name="priceList" id='priceList' value="{{ $product->priceList }}" required>
              <label for="cost">Costo:</label>
              <input type="text" name="cost" id='cost' value="{{ $product->cost }}" required>
              <label for="description">Descripción:</label>
              <textarea type="text" rows="6" name="description" >{{ $product->description }}</textarea>
            </div>
            <div class="date-clients">
              <label for="">Categoria Precio Venta</label>
              <select class="" name="" onchange="priceSales(this);">
                <option value="">Seleccione categoria</option>
                <option value="Categoria 1">Categoria 1</option>
                <option value="Categoria 2">Categoria 2</option>
                <option value="Categoria 3">Categoria 3</option>
              </select>
              <label for="priceSales1" id='ps'>Precio de Venta 1<p id="pv1"></p></label>
              <input type="text" name="priceSales1" value="{{ $product->priceSales1 }}" id="priceSales1" placeholder="Precio de Venta 1" readonly="" required>
            </div>
            <div class="date-clients">
              <label for="priceSales2" id='ps'>Precio de Venta 2 <p id="pv2"></p></label>
              <input type="text" name="priceSales2" value="{{ $product->priceSales2 }}" id="priceSales2" placeholder="Precio de Venta 2" readonly="" required>
              <label for="priceSales3" id='ps'>Precio de Venta 3 <p id="pv3"></p></label>
              <input type="text" name="priceSales3" value="{{ $product->priceSales3 }}" id="priceSales3" placeholder="Precio de Venta 3" readonly="" required>
            </div>
            <div class="date-clients">
              <label for="priceSales4" id='ps'>Precio de Venta 4 <p id="pv4"></p></label>
              <input type="text" name="priceSales4" value="{{ $product->priceSales4 }}" id="priceSales4" placeholder="Precio de Venta 4" readonly="" required>
              <label for="priceSales5">Precio de Venta 5:</label>
              <input type="text" name="priceSales5" value="{{ $product->priceSales5 }}" placeholder="Precio de Venta 5" required>
            </div>
            <div class="button-client">
              <button type="submit" href="#" class="btn-save"><i class="fa fa-save fa-lg"></i> Guardar</button>
              <a href="{{url('admin/inventary')}}"  class="btn-danger"><i class="fa fa-times-rectangle-o fa-lg"></i>  Cancelar</a>
            </div>
          {!! Form::close() !!}
          <div class="button-pdf">

          </div>
        </div>
      </div>
    </main>
    <footer id="footer">
      <h3>© 2017 Todos Los Derechos Reservados</h3>
    </footer>
    <script type="text/javascript" src="{{ url('js/menu-vertical.js') }}"></script>
    <script type="text/javascript">
      function myTProduct(e){
        var val = <?php echo$typeProducts;?>;
        var newVal = {};
        val.map((item)=>{
          newVal[item.id_Producto] = item
        })
        var typeProduct = newVal[e.value]
        var lettersManguera = document.getElementById('VM').value=typeProduct.letters;
        var typeManguera = document.getElementById('TProducts').value=typeProduct.type;
      }
    </script>
    <script type="text/javascript">
      function priceSales(val) {
        var value = val.value
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
        document.getElementById('priceSales1').value='$'+newRes[0].toFixed(2)
        document.getElementById('priceSales2').value='$'+newRes[1].toFixed(2)
        document.getElementById('priceSales3').value='$'+newRes[2].toFixed(2)
        document.getElementById('priceSales4').value='$'+newRes[3].toFixed(2)
      }
    </script>
  </body>
</html>
