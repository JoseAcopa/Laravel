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
              <input type="text" name="nInvoice" value="-" placeholder="Número Factura">
              <div class="clasification">
                <div class="select">
                  <label for="TProduct">Tipo de Producto:</label>
                  <input type="text" name="category" id='TProduct' value="{{ old('category') }}" class="{{ $errors->has('category') ? 'has-error' : 'inicialesInput' }}" readonly>
                  {!! $errors->first('category','<span class="data-error">:message</span>')!!}
                  <input type="text" name="idProduct" id="idProduct" hidden>
                </div>
                <div class="iniciales">
                  <input type="text" id="letter" name="initials" value="{{ old('initials') }}" readonly>
                </div>
              </div>
              <label for="proveedor">Proveedor:</label>
              <input type="text" name="proveedor" id="proveedor" value="{{ old('proveedor') }}" class="{{ $errors->has('proveedor') ? 'has-error' : '' }}" readonly>
              {!! $errors->first('proveedor','<span class="data-error">:message</span>')!!}
            </div>
            <div class="date-clients">
              <label for="fecha_entrada">Fecha de Entrada:</label>
              <input type="date" name="fecha_entrada" id="fecha_entrada" value="{{ old('fecha_entrada') }}" class="{{ $errors->has('fecha_entrada') ? 'has-error' : 'date-design' }}">
              {!! $errors->first('fecha_entrada','<span class="data-error">:message</span>')!!}
              <label for="cantidad_entrada">Cantidad de Entrada:</label>
              <input type="number" name="cantidad_entrada" id="cantidad_entrada" value="{{ old('cantidad_entrada') }}" class="{{ $errors->has('cantidad_entrada') ? 'has-error' : '' }}" placeholder="Cantidad Entrada" min="0">
              {!! $errors->first('cantidad_entrada','<span class="data-error">:message</span>')!!}
              <label for="unidad">Unidad de Medida:</label>
              <input type="text" name="unidad" id="unidad" value="{{ old('unidad') }}" class="{{ $errors->has('unidad') ? 'has-error' : '' }}" readonly>
              {!! $errors->first('unidad','<span class="data-error">:message</span>')!!}
            </div>
            <div class="date-clients">
              <label for="pricelist">Precio Lista:</label>
              <input type="number" name="precio_lista" id="priceList" placeholder="Precio Lista" onchange="priceSales();" value="{{ old('precio_lista') }}" class="{{ $errors->has('precio_lista') ? 'has-error' : '' }}">
              {!! $errors->first('precio_lista','<span class="data-error">:message</span>')!!}
              <label for="cost">Costo:</label>
              <input type="number" name="costo" id="cost" placeholder="Costo" onchange="priceSales();" value="{{ old('costo') }}" class="{{ $errors->has('costo') ? 'has-error' : '' }}">
              {!! $errors->first('costo','<span class="data-error">:message</span>')!!}
              <label for="moneda">Tipo de moneda:</label>
              <select name="moneda" value="{{ old('moneda') }}" class="{{ $errors->has('moneda') ? 'has-error' : 'select-design' }}">
                <option value="">Seleccione tipo de moneda</option>
                @foreach ($coins as $coin)
                  <option value="{{$coin->id}}">{{$coin->type}}</option>
                @endforeach
              </select>
              {!! $errors->first('moneda','<span class="data-error">:message</span>')!!}
            </div>
            <div class="date-clientstextA">
              <label for="description">Descripción:</label>
              <textarea type="text" rows="4" name="description" id="description" placeholder="Descripción" class="{{ $errors->has('description') ? 'has-error' : '' }}" readonly>{{ old('description') }}</textarea>
              {!! $errors->first('description','<span class="data-error">:message</span>')!!}
            </div>
            <div class="date-clients">
              <label for="">Categoria Precio Venta</label>
              <input type="text" id="categoria" readonly>
              <label for="priceSales3" id='ps'>Precio de Venta 3 <p id="pv3"></p></label>
              <input type="text" name="priceSales3" id="priceSales3" placeholder="Precio de Venta 3" value="{{ old('priceSales3') }}" class="{{ $errors->has('priceSales3') ? 'has-error' : '' }}" readonly>
              {!! $errors->first('priceSales3','<span class="data-error">:message</span>')!!}
            </div>
            <div class="date-clients">
              <label for="priceSales1" id='ps'>Precio de Venta 1<p id="pv1"></p></label>
              <input type="text" name="priceSales1" id="priceSales1" placeholder="Precio de Venta 1" value="{{ old('priceSales1') }}" class="{{ $errors->has('priceSales1') ? 'has-error' : '' }}" readonly>
              {!! $errors->first('priceSales1','<span class="data-error">:message</span>')!!}
              <label for="priceSales4" id='ps'>Precio de Venta 4 <p id="pv4"></p></label>
              <input type="text" name="priceSales4" id="priceSales4" placeholder="Precio de Venta 4" value="{{ old('priceSales4') }}" class="{{ $errors->has('priceSales4') ? 'has-error' : '' }}" readonly>
              {!! $errors->first('priceSales4','<span class="data-error">:message</span>')!!}
            </div>
            <div class="date-clients">
              <label for="priceSales2" id='ps'>Precio de Venta 2 <p id="pv2"></p></label>
              <input type="text" name="priceSales2" id="priceSales2" placeholder="Precio de Venta 2" value="{{ old('priceSales2') }}" class="{{ $errors->has('priceSales2') ? 'has-error' : '' }}" readonly>
              {!! $errors->first('priceSales2','<span class="data-error">:message</span>')!!}
              <label for="priceSales5">Precio de Venta 5:</label>
              <input type="text" name="priceSales5" id='priceSales5' placeholder="Precio de Venta 5" value="{{ old('priceSales5') }}" class="{{ $errors->has('priceSales5') ? 'has-error' : '' }}">
              {!! $errors->first('priceSales5','<span class="data-error">:message</span>')!!}
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
        var id = val.value;
        var priceList = $("#priceList").val()
        var cost = $("#cost").val()
        var cat1 = [.70, .65, .60, .57]
        var cat2 = [.40, .37, .36, .35]
        var cat3 = [.70, .75, .80, .85]
        var newRes = []

        $.ajax({
          url: '/producto/'+id,
          type: 'GET',
          success: (res)=>{
            $('#idProduct').val(res.id);
            $('#letter').val(res.letter);
            $('#TProduct').val(res.category.type);
            $('#categoria').val(res.categoria);
            $('#proveedor').val(res.supplier.business);
            $('#unidad').val(res.unit.type);
            $('#description').val(res.description);

            if (res.categoria === 'Petrolera | Industrial') {
              for (var i = 0; i < cat1.length; i++) {
                var res = cat1[i] * priceList
                newRes.push(res)
                $('#pv1').text("(x0.70)")
                $('#pv2').text("(x0.65)")
                $('#pv3').text("(x0.60)")
                $('#pv4').text("(x0.57)")
              }
            }else if (res.categoria === 'Hidraulica') {
              for (var i = 0; i < cat2.length; i++) {
                var res = cat2[i] * cost
                newRes.push(res)
                $('#pv1').text("(x0.40)")
                $('#pv2').text("(x0.37)")
                $('#pv3').text("(x0.36)")
                $('#pv4').text("(x0.35)")
              }
            }else if (res.categoria === 'Otro') {
              for (var i = 0; i < cat3.length; i++) {
                var res = cost / cat3[i]
                newRes.push(res)
                $('#pv1').text("(/ 0.70)")
                $('#pv2').text("(/ 0.75)")
                $('#pv3').text("(/ 0.80)")
                $('#pv4').text("(/ 0.85)")
              }
            }

            $('#priceSales1').val(newRes[0].toFixed(2))
            $('#priceSales2').val(newRes[1].toFixed(2))
            $('#priceSales3').val(newRes[2].toFixed(2))
            $('#priceSales4').val(newRes[3].toFixed(2))
          }
        })
      }
    </script>
    <script type="text/javascript">
      function priceSales() {
        var categoria = $("#categoria").val()
        var priceList = $("#priceList").val()
        var cost = $("#cost").val()
        var cat1 = [.70, .65, .60, .57]
        var cat2 = [.40, .37, .36, .35]
        var cat3 = [.70, .75, .80, .85]
        var newRes = []

        if (categoria === 'Petrolera | Industrial') {
          for (var i = 0; i < cat1.length; i++) {
            var res = cat1[i] * priceList
            newRes.push(res)
            $('#pv1').text("(x0.70)")
            $('#pv2').text("(x0.65)")
            $('#pv3').text("(x0.60)")
            $('#pv4').text("(x0.57)")
          }
        }else if (categoria === 'Hidraulica') {
          for (var i = 0; i < cat2.length; i++) {
            var res = cat2[i] * cost
            newRes.push(res)
            $('#pv1').text("(x0.40)")
            $('#pv2').text("(x0.37)")
            $('#pv3').text("(x0.36)")
            $('#pv4').text("(x0.35)")
          }
        }else if (categoria === 'Otro') {
          for (var i = 0; i < cat3.length; i++) {
            var res = cost / cat3[i]
            newRes.push(res)
            $('#pv1').text("(/ 0.70)")
            $('#pv2').text("(/ 0.75)")
            $('#pv3').text("(/ 0.80)")
            $('#pv4').text("(/ 0.85)")
          }
        }

        if (categoria.length > 0) {
          $('#priceSales1').val(newRes[0].toFixed(2))
          $('#priceSales2').val(newRes[1].toFixed(2))
          $('#priceSales3').val(newRes[2].toFixed(2))
          $('#priceSales4').val(newRes[3].toFixed(2))
        }
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
