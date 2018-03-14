<?php
function current_page($url = '/'){
  return request()->path() == $url;
}
?>
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
        @if (Auth::user()->avatar == null)
          <img src="{{ url('img/LogoRX.png')}}"  alt="User Image">
        @else
          <img src="{{Auth::user()->avatar}}" class="img-circle" alt="User Image">
        @endif
        </div>
        <div class="pull-left info">
          <p>
          {{-- @if (Auth::user()->social_name == null)
            {{ Auth::user()->name}}
          @else
            {{ Auth::user()->social_name}}
          @endif --}}
          </p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online </a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree"><br>
        <li class="header">MENU DE NAVEGACION</li>
        <!-- Optionally, you can add icons to the links -->
        <li <?php echo current_page('admin/admin-welcome') ? "class='active'" : "";?>><a href="{{ url('/admin/admin-welcome') }}"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
        <li <?php echo current_page('admin/client') ? "class='active'" : "";?>><a href="{{ url('/admin/client') }}"><i class="fa fa-users"></i> <span>Clientes</span></a></li>
        <li <?php echo current_page('admin/suppliers') ? "class='active'" : "";?>><a href="{{ url('/admin/suppliers') }}"><i class="fa fa-address-card-o"></i> <span>Proveedores</span></a></li>
        <li <?php echo current_page('admin/employee') ? "class='active'" : "";?>><a href="{{ url('/admin/employee') }}"><i class="fa fa-address-book-o"></i> <span>Empleados</span></a></li>
        <li class="header">INVENTARIO</li>
        <li class="treeview <?php echo current_page('admin/catalogo') || current_page('admin/clasificationProduct') || current_page('admin/inventary') || current_page('admin/inventary-out') ? "active" : "";?>">
          <a href="#"><i class="fa fa-pencil-square"></i> <span>Inventario</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li <?php echo current_page('admin/clasificationProduct') ? "class='active'" : "";?>><a href="{{url('admin/clasificationProduct')}}">Tipos de Productos</a></li>
            <li <?php echo current_page('admin/catalogo') ? "class='active'" : "";?>><a href="{{url('admin/catalogo')}}">Catálogo</a></li>
            <li <?php echo current_page('admin/inventary') ? "class='active'" : "";?>><a href="{{url('admin/inventary')}}">Productos</a></li>
            {{-- <li><a href="{{url('admin/inventary-out')}}">Salidas de Productos</a></li> --}}
            <li <?php echo current_page('admin/inventary-out') ? "class='active'" : "";?>><a href="#">Salidas de Productos</a></li>
          </ul>
        </li>
        <li <?php echo current_page('admin/facturas') ? "class='active'" : "";?>><a href="/admin/facturas"><i class="fa fa-clipboard"></i> <span>Facturas</span></a></li>
        <li class="header">COTIZACION</li>
        <li <?php echo current_page('admin/quotation') ? "class='active'" : "";?>><a href="{{url('/admin/quotation')}}"><i class="fa fa-book"></i> <span>Cotización</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
