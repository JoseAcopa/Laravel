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
                <li class="active" ><a href="{{url('admin/inventary')}}">Productos </a></li>
                <li><a href="{{url('admin/checkin')}}">  Entradas de Productos </a></li>
                <li><a href="{{url('admin/inventary-out')}}">  Salidas de Productos</a></li>
                <li><a href="{{url('admin/clasificationProduct')}}">  Tipos de Productos <small class="bg-indicator">Consulta</small></a></li>
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
              <li class="ol-active"><i class="fa fa-pencil-square"></i>Clasificación de Producto</li>
            </ol>
          </div>
        </div>
        <div class="for-container">
          <h2><i class="fa fa-pencil-square"></i> Clasificación de Producto</h2>
          <div class="clasific">
            <form class="container-add-clientsClasific" method="POST" action="/admin/clasificationProduct">
              {{ csrf_field() }}
              <div class="date-clientsClasific">
                <label for="typeP">Tipo de Producto:</label>
                <input type="text" name="typeP" value="" >
                <label for="ini">Iniciales:</label>
                <input type="text" name="ini" value=""  >
              </div>
              <div class="button-clientClasific">
                <button href="#" class="btn-save"><i class="fa fa-save fa-lg"></i>  Guardar</button>
                <a href="{{url('admin/inventary')}}"  class="btn-danger"><i class="fa fa-times-rectangle-o fa-lg"></i>  Cancelar</a>
              </div>
            </form>
            <div class="container-add-clientsClasificTable">
              <div>
                  <table id="Jtabla">
                    <thead>
                      <tr class="theader">
                        <th>Acciones</th>
                        <th>Tipo de Producto</th>
                        <th>N° de Producto</th>
                     </tr>
                    </thead>
                    <tbody class="tbodymain">
                      @foreach ($typesProducts as $key)
                        <tr class="tbody">
                          <td class="action">
                            {{-- <a href="{{url('/admin/edit-out',$key->id_Producto)}}" class="btn-green"><i class="fa fa-pencil-square-o fa-lg"></i></a> --}}
                            {!! Form::open(['method' => 'DELETE','route' => ['clasificationProduct.destroy', $key->id_Producto]]) !!}
                              <button type="submit" class="btn-danger"><i class="fa fa-trash-o fa-lg"></i></button>
                            {!! Form::close() !!}
                          </td>
                          <td>{{$key->type}}</td>
                          <td>{{$key->letters}}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
              </div>
            </div>

          </div>
        </div>
      </div>
    </main>
    <footer id="footer">
      <h3>© 2017 Todos Los Derechos Reservados</h3>
    </footer>
    <script src="{{ url('js/datatable/jQuery-2.1.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/menu-vertical.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/inventary.js') }}"></script>
  </body>
</html>
