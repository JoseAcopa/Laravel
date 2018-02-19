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
            <a id="inventary" ><i class="fa fa-pencil-square"></i>Inventario <i class="fa fa-chevron-down"></i></a>
            <ul class="submenu-active" id="submenu-list" >
              <li class="activo" ><a href="{{url('admin/catalogo')}}">Catálogo</a><small class="bg-indicator">Registrar</small></li>
              <li><a href="{{url('admin/inventary')}}">Productos</a></li>
              <li><a href="{{url('admin/checkin')}}">  Entradas de Productos </a></li>
              <li><a href="{{url('admin/inventary-out')}}"> Salidas de Productos</a></li>
              <li><a href="{{url('admin/clasificationProduct')}}">  Tipos de Productos</a></li>
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
              <li class="ol-active"><i class="fa fa-pencil"></i>Registrar Productos en Catálogo</li>
            </ol>
          </div>
        </div>
        <div class="for-container">
          <h2><i class="fa fa-pencil"></i> Registrar Producto en Catálogo</h2>
          <form class="container-add-clients" method="POST" action="/admin/catalogo">
            {{ csrf_field() }}
            <div class="date-clients">
              <label for="category">Tipo de Producto:</label>
              <select class="{{ $errors->has('category') ? 'has-error' : 'select-design' }}" name="category" onchange="typeProduct(this);">
                <option value="">Seleccione Tipo Producto</option>
                @foreach ($categories as $categorie)
                  <option value="{{$categorie->id}}">{{$categorie->type}}</option>
                @endforeach
              </select>
              {!! $errors->first('category','<span class="data-error">:message</span>')!!}
              <label for="initials" >Iniciales</label>
              <input class="{{ $errors->has('letter') ? 'has-error' : '' }}" type="text" id="letter" name="letter" readonly>
              <input type="text" id="categoria" name="tipo_categoria" hidden>
            </div>
            <div class="date-clients">
              <label for="proveedor">Proveedor:</label>
              <select class="{{ $errors->has('proveedor') ? 'has-error' : 'select-design' }}" name="proveedor">
                <option value="">Seleccione Proveedor</option>
                @foreach ($suppliers as $supplier)
                  <option value="{{$supplier->id}}">{{$supplier->business}}</option>
                @endforeach
              </select>
              {!! $errors->first('proveedor','<span class="data-error">:message</span>')!!}
              <label for="unidad">Unidad de Medida:</label>
              <select class="{{ $errors->has('unidad') ? 'has-error' : 'select-design' }}" name="unidad">
                <option value="">Seleccione Unidad de Medida</option>
                @foreach ($units as $unit)
                  <option value="{{$unit->id}}">{{$unit->type}}</option>
                @endforeach
              </select>
              {!! $errors->first('unidad','<span class="data-error">:message</span>')!!}
            </div>
            <div class="date-clients">
              <label for="description">Descripción:</label>
              <textarea type="text" rows="6" name="description" id="description" class="{{ $errors->has('description') ? 'has-error' : '' }}" placeholder="Descripción">{{ old('description') }}</textarea>
              {!! $errors->first('description','<span class="data-error">:message</span>')!!}
            </div>

            <div class="button-client">
              <button href="#" class="btn-save"><i class="fa fa-save fa-lg"></i>  Guardar</button>
              <a href="{{url('admin/catalogo')}}"  class="btn-danger"><i class="fa fa-times-rectangle-o fa-lg"></i>  Cancelar</a>
            </div>
          </form>
          <div class="button-pdf">
          </div>
        </div>
      </div>
    </main>
    <footer id="footer-form">
      <h3>© 2017 Todos Los Derechos Reservados</h3>
    </footer>
    <script src="{{ url('js/datatable/jQuery-2.1.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/menu-vertical.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/inventary.js') }}"></script>
    <script type="text/javascript">
      function typeProduct(val){
        var categories = <?php echo$categories;?>;
        var newVal = {};

        categories.map((item)=>{
          newVal[item.id] = item
        })

        var category = newVal[val.value]
        document.getElementById('letter').value = category.letters;
        document.getElementById('categoria').value = category.categorias;
      }
    </script>
  </body>
</html>
