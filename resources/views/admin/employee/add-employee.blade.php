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
            <li ><a href="{{ url('/admin/client') }}"><i class="fa fa-users"></i>Clientes</a></li>
          @endif
          @if (auth()->user()->proveedores === 1)
            <li ><a href="{{ url('/admin/suppliers') }}"><i class="fa fa-address-card-o"></i>Proveedores</a></li>
          @endif
          @if (auth()->user()->empleados === 1)
            <li class="active"><a href="{{ url('/admin/employee') }}"><i class="fa fa-address-book-o"></i>Empleados <small class="bg-indicator">Registrar</small></a></li>
          @endif
          <li class="li-menu-nav">INVENTARIO</li>
          @if (auth()->user()->inventario === 1)
            <li>
              <a id="inventary"><i class="fa fa-pencil-square"></i>Inventario <i class="fa fa-chevron-down"></i></a>
              <ul class="submenu-list" id="submenu-list">
                <li><a href="{{url('admin/catalogo')}}"><i class="fa fa-list"></i>Catálogo</a></li>
                <li><a href="{{url('admin/inventary')}}"><i class="fa fa-list"></i>Productos </a></li>
                <li><a href="{{url('admin/checkin')}}"><i class="fa fa-list"></i>Entradas de Productos</a></li>
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
              <li class="ol-active"><i class="fa fa-user-plus"></i>Registar Empleados</li>
            </ol>
          </div>
        </div>
        <div class="for-container">
          <h2><i class="fa fa-user-plus"></i> Registrar Empleados</h2>
          <form class="container-add-clients" method="POST" action="/admin/employee">
            {{ csrf_field() }}
            <div class="date-client">
              <label for="name">Nombre Completo:</label>
              <input type="text" name="name" value="{{ old('name') }}" id="name" class="{{ $errors->has('name') ? 'has-error' : '' }}" placeholder="Nombre Completo">
              {!! $errors->first('name','<span class="data-error">:message</span>')!!}
              <label for="phone">Teléfono:</label>
              <input type="tel" name="phone" value="{{ old('phone') }}" id="phone" class="{{ $errors->has('phone') ? 'has-error' : '' }}" placeholder="Teléfono">
              {!! $errors->first('phone','<span class="data-error">:message</span>')!!}
              <label for="email">Correo:</label>
              <input type="email" name="email" value="{{ old('email') }}" id="email" class="{{ $errors->has('email') ? 'has-error' : '' }}" placeholder="Email">
              {!! $errors->first('email','<span class="data-error">:message</span>')!!}
            </div>
            <div class="date-client">
              <label for="user">Usuario:</label>
              <input type="text" name="user" value="{{ old('user') }}" id="user" class="{{ $errors->has('user') ? 'has-error' : '' }}" placeholder="Usuario">
              {!! $errors->first('user','<span class="data-error">:message</span>')!!}
              <label for="password">Contraseña:</label>
              <input type="password" name="password" id="password" class="{{ $errors->has('password') ? 'has-error' : '' }}">
              {!! $errors->first('password','<span class="data-error">:message</span>')!!}
              <label for="user">Tipo de Usuario:</label>
              <select name="tipo" class="{{ $errors->has('tipo') ? 'has-error' : 'select-design' }}" onchange="tipoUser(this);">
                <option value=""></option>
                <option value="admin">Administrador</option>
                <option value="user">Usuario</option>
              </select>
              {!! $errors->first('tipo','<span class="data-error">:message</span>')!!}
            </div>
            <div class="date-client" id="permisos-accesos">
              <h3>Accesos al sistema</h3>
              <hr>
              <label for="cliente">Clientes</label>
              <input id="cliente" type="checkbox" name="accesos[]" value="clientes">
              <label for="proveedores">Proveedores</label>
              <input id="proveedores" type="checkbox" name="accesos[]" value="proveedores">
              <label for="empleados">Empleados</label>
              <input id="empleados" type="checkbox" name="accesos[]" value="empleados">
              <label for="inventario">Inventario</label>
              <input id="inventario" type="checkbox" name="accesos[]" value="inventario">
              <label for="cotizacion">Cotización</label>
              <input id="cotizacion" type="checkbox" name="accesos[]" value="cotizacion">
            </div>
            <div class="date-client" id="accesos-permisos">
              <h3>Permisos</h3>
              <hr>
              <label for="create">Crear</label>
              <input id="create" type="checkbox" name="permisos[]" value="create">
              <label for="read">Leer</label>
              <input id="read" type="checkbox" name="permisos[]" value="read">
              <label for="update">Editar</label>
              <input id="update" type="checkbox" name="permisos[]" value="update">
              <label for="delete">Eliminar</label>
              <input id="delete" type="checkbox" name="permisos[]" value="delete">
            </div>
            <div class="button-client">
              <button type="submit" class="btn-save"><i class="fa fa-save fa-lg"></i> Guardar</button>
              <a href="{{ url('/admin/employee') }}" class="btn-danger"><i class="fa fa-times-rectangle-o fa-lg"></i> Cancelar</a>
            </div>
          </form>
        </div>
      </div>
    </main>
    <footer id="footer">
      <h3>© 2017 Todos Los Derechos Reservados</h3>
    </footer>
    <script src="{{ url('js/datatable/jQuery-2.1.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/menu-vertical.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/inventary.js') }}"></script>
    <script type="text/javascript">
      function tipoUser(val) {
        if (val.value === 'admin') {
          document.getElementById('permisos-accesos').style.display = "none"
          document.getElementById('accesos-permisos').style.display = "none"
        }else {
          document.getElementById('permisos-accesos').style.display = "block"
          document.getElementById('accesos-permisos').style.display = "block"
        }
      }
    </script>
  </body>
</html>
