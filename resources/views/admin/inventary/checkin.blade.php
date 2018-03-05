<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rayos X y Servicios Induxtriales</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/datatable/dataTables.bootstrap.css') }}">
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
              <ul class="submenu-list" id="submenu-list">
                <li><a href="{{url('admin/inventary')}}">Productos </a></li>
                <li><a href="{{url('admin/checkin')}}">Entrada de Productos<small class="bg-indicator">Consulta </small></a></li>
                <li><a href="{{url('admin/inventary-out')}}">Salida </a></li>
                <li><a href="{{url('admin/clasificationProduct')}}">Tipo Producto</a></li>
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
                <li class="ol-active"><i class="fa fa-sign-in"></i>Entradas</li>
            </ol>
          </div>
        </div>
        <div class="table-container">
          <div class="container-search">
            <a href="{{url('admin/add-checkin')}}" class="btn-green" ><i class="fa fa-pencil"></i> Registrar Producto de entrada</a>
            {{-- <a href="{{url('admin/inventary')}}"  class="btn-green"><i class="fa fa-chevron-circle-left"></i> Atras</a> --}}
          </div>
          @if ($message = Session::get('success'))
            <div class="message-danger">
              <p>{{ $message }}</p>
            </div>
          @endif
          <div class="">
            <table id="Jtabla">
              <thead>
                <tr class="theader">
                  <th>Acciones</th>
                  <th>N° de Factura</th>
                  <th>N° de Producto</th>
                  <th>Tipo de Producto</th>
                  <th>Proveedores</th>
                  <th>Descripción</th>
                  <th>Fecha de Entrada</th>
               </tr>
              </thead>
              <tbody class="tbodymain">
                @foreach ($checkins as $checkin)
                  <tr class="tbody">
                    <td class="action">
                      <a class="btn-info" href="{{url('/admin/show-checkin',$checkin->id)}}" alt="Ver mas.."><i class="fa fa-eye fa-lg"></i></a>
                      <a class="btn-edit" href="{{url('/admin/edit-checkin',$checkin->id)}}"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                      {!! Form::open(['method' => 'DELETE','route' => ['checkin.destroy', $checkin->id]]) !!}
                        <button type="submit" class="btn-danger"><i class="fa fa-trash-o fa-lg"></i></button>
                      {!! Form::close() !!}
                    </td>
                    <td>{{ $checkin->nInvoice }}</td>
                    <td>{{ $checkin->NProduct }}</td>
                    <td>{{ $checkin->TProduct }}</td>
                    <td>{{ $checkin->provider }}</td>
                    <td>{{ $checkin->description }}</td>
                    <td>{{ $checkin->checkin }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>
    <footer id="footer">
      <h3>© 2017 Todos Los Derechos Reservados</h3>
    </footer>
    <script type="text/javascript" src="{{ url('js/menu-vertical.js') }}"></script>
    <script src="{{ url('js/datatable/jQuery-2.1.3.min.js') }}"></script>
    <script src="{{ url('js/datatable/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/datatable/dataTables.bootstrap.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
      $(function () {
        $('#Jtabla').dataTable({
          "bPaginate": true,
          "bLengthChange": true,
          "bFilter": true,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": true
        });
      });
    </script>
    <script type="text/javascript" src="{{ url('js/inventary.js') }}"></script>
  </body>
</html>
