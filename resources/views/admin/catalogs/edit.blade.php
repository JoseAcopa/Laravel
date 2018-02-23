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
            <li class="active">
              <a id="inventary"><i class="fa fa-pencil-square"></i>Inventario <i class="fa fa-chevron-down"></i></a>
              <ul class="submenu-active" id="submenu-list" >
                <li class="activo"><a href="{{url('admin/catalogo')}}"><i class="fa fa-list"></i>Catálogo</a><small class="bg-indicator">Editar</small></li>
                <li><a href="{{url('admin/inventary')}}"><i class="fa fa-list"></i>Productos</a></li>
                <li><a href="{{url('admin/checkin')}}"><i class="fa fa-list"></i>Entradas de Productos </a></li>
                <li><a href="{{url('admin/inventary-out')}}"><i class="fa fa-list"></i>Salidas de Productos</a></li>
                <li><a href="{{url('admin/clasificationProduct')}}"><i class="fa fa-list"></i>Tipos de Productos</a></li>
              </ul>
            </li>
          @endif
          <li class="li-menu-nav">COTIZACION</li>
          @if (auth()->user()->cotizacion === 1)
            <li><a href="{{url('/admin/quotation')}}"><i class="fa fa-book"></i>Cotización</a></li>
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
              <li class="ol-active"><i class="fa fa-pencil"></i>Editar Productos en Catálogo</li>
            </ol>
          </div>
        </div>
        <div class="for-container">
          <h2><i class="fa fa-pencil"></i> Editar Producto en Catálogo</h2>
          {!! Form::model($catalog, ['method' => 'PATCH','route' => ['catalogo.update', $catalog->id], 'class' => 'container-add-clients']) !!}
            {{ csrf_field() }}
            <div class="date-clients">
              <label for="category">Tipo de Producto:</label>
              <select class="{{ $errors->has('category') ? 'has-error' : 'select-design' }}" name="category" id='tipo_producto' onchange="typeProduct(this);">
                <option value="{{$catalog->category_id}}">{{$catalog->category->type}}</option>
                @foreach ($categories as $categorie)
                  <option value="{{$categorie->id}}">{{$categorie->type}}</option>
                @endforeach
              </select>
              <label for="initials" >Iniciales</label>
              <input type="text" id="letter" name="letter" value="{{$catalog->letter}}" readonly>
              <input type="text" id="categoria" name="categoria" value="{{$catalog->categoria}}" hidden>
            </div>
            <div class="date-clients">
              <label for="proveedor">Proveedor:</label>
              <select class="{{ $errors->has('proveedor') ? 'has-error' : 'select-design' }}" name="proveedor">
                <option value="{{$catalog->supplier_id}}">{{$catalog->supplier->business}}</option>
                @foreach ($suppliers as $supplier)
                  <option value="{{$supplier->business}}">{{$supplier->business}}</option>
                @endforeach
              </select>
              <label for="unidad">Unidad de Medida:</label>
              <select class="{{ $errors->has('unidad') ? 'has-error' : 'select-design' }}" name="unidad">
                <option value="{{$catalog->unit_id}}">{{$catalog->unit->type}}</option>
                @foreach ($units as $unit)
                  <option value="{{$unit->type}}">{{$unit->type}}</option>
                @endforeach
              </select>
            </div>
            <div class="date-clients">
              <label for="description">Descripción:</label>
              <textarea type="text" rows="6" name="description" id="description" class="{{ $errors->has('description') ? 'has-error' : '' }}" placeholder="Descripción">{{$catalog->description}}</textarea>
              {!! $errors->first('description','<span class="data-error">:message</span>')!!}
            </div>
            <div class="button-client">
              <button href="#" class="btn-save"><i class="fa fa-save fa-lg"></i>  Guardar</button>
              <a href="{{url('admin/catalogo')}}"  class="btn-danger"><i class="fa fa-times-rectangle-o fa-lg"></i>  Cancelar</a>
            </div>
          {!! Form::close() !!}
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
        document.getElementById('categoria').value = category.categoria;
      }
    </script>
  </body>
</html>
