<?php
function current_page($url = '/'){
  return request()->path() == $url;
}
?>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
        @if (Auth::user()->avatar == null)
          <img src="{{ url('img/LogoRX.png')}}"  alt="User Image">
        @else
          <img src="{{Auth::user()->avatar}}" class="img-circle" alt="User Image">
        @endif
        </div>
        <div class="pull-left info">
          <a href="#"><i class="fa fa-circle text-success"></i> Online </a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree"><br>
        <li class="header">MENU DE NAVEGACION</li>
        <li <?php echo current_page('admin/admin-welcome') ? "class='active'" : "";?>><a href="{{ url('/admin/admin-welcome') }}"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
        @can ('client.index')
          <li <?php echo current_page('admin/clientes') ? "class='active'" : "";?>><a href="{{ url('/admin/clientes') }}"><i class="fa fa-users"></i> <span>Clientes</span></a></li>
        @endcan
        @can ('suppliers.index')
          <li <?php echo current_page('admin/proveedores') ? "class='active'" : "";?>><a href="{{ url('/admin/proveedores') }}"><i class="fa fa-address-card-o"></i> <span>Proveedores</span></a></li>
        @endcan
        <li class="header">ROLES Y PERMISOS</li>
        @can ('roles.index')
          <li <?php echo current_page('admin/roles') ? "class='active'" : "";?>><a href="{{ url('/admin/roles') }}"><i class="fa fa-list"></i> <span>Roles</span></a></li>
        @endcan
        @can ('employee.index')
          <li <?php echo current_page('admin/usuario') ? "class='active'" : "";?>><a href="{{ url('/admin/usuario') }}"><i class="fa fa-address-book-o"></i> <span>Empleados</span></a></li>
        @endcan
        <li class="header">INVENTARIO Y COTIZACIONES</li>
        <li class="treeview <?php echo current_page('admin/catalogo') || current_page('admin/clasificationProduct') || current_page('admin/alta-producto-catalogo') || strpos(request()->path(), 'editar-producto-catalogo')
                                  || current_page('admin/inventary') || current_page('admin/add-product') || strpos(request()->path(), 'edit-product') || current_page('admin/product-output') || current_page('admin/add-product-output') || strpos(request()->path(), 'edit-product-output')? "active" : "";?>">
          <a href="#"><i class="fa fa-pencil-square"></i> <span>Inventario</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li <?php echo current_page('admin/clasificationProduct') ? "class='active'" : "";?>>
              <a href="{{url('admin/clasificationProduct')}}">
                <i class="fa fa-circle-o <?php echo current_page('admin/clasificationProduct') ? "text-aqua" : "";?>"></i>
                <span>Tipos de Productos</span>
                <span class="pull-right-container">
                  <?php echo current_page('admin/clasificationProduct') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
                </span>
              </a>
            </li>
            <li <?php echo current_page('admin/catalogo') || current_page('admin/alta-producto-catalogo') || strpos(request()->path(), 'editar-producto-catalogo') ? "class='active'" : "";?>>
              <a href="{{url('admin/catalogo')}}">
                <i class="fa fa-circle-o <?php echo current_page('admin/catalogo') || current_page('admin/alta-producto-catalogo') || strpos(request()->path(), 'editar-producto-catalogo') ? "text-aqua" : "";?>"></i>
                <span>Catálogo</span>
                <span class="pull-right-container">
                  <?php echo current_page('admin/catalogo') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
                  <?php echo current_page('admin/alta-producto-catalogo') ? '<small class="label pull-right bg-green">nuevo</small>' : "";?>
                  <?php echo strpos(request()->path(), 'editar-producto-catalogo') ? '<small class="label pull-right bg-green">editar</small>' : "";?>
                </span>
              </a>
            </li>
            <li <?php echo current_page('admin/inventary') || current_page('admin/add-product') || strpos(request()->path(), 'edit-product') ? "class='active'" : "";?>>
              <a href="{{url('admin/inventary')}}">
                <i class="fa fa-circle-o <?php echo current_page('admin/inventary') || current_page('admin/add-product') || strpos(request()->path(), 'edit-product') ? "text-aqua" : "";?>"></i>
                <span>Productos</span>
                <span class="pull-right-container">
                  <?php echo current_page('admin/inventary') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
                  <?php echo current_page('admin/add-product') ? '<small class="label pull-right bg-green">nuevo</small>' : "";?>
                  <?php echo strpos(request()->path(), 'edit-product') ? '<small class="label pull-right bg-green">editar</small>' : "";?>
                </span>
              </a>
            </li>
            <li <?php echo current_page('admin/product-output') || current_page('admin/add-product-output') || strpos(request()->path(), 'edit-product-output') ? "class='active'" : "";?>>
              <a href="{{url('admin/product-output')}}">
                <i class="fa fa-circle-o <?php echo current_page('admin/product-output') || current_page('admin/add-product-output') || strpos(request()->path(), 'edit-product-output') ? "text-aqua" : "";?>"></i>
                <span>Salidas de Productos</span>
                <span class="pull-right-container">
                  <?php echo current_page('admin/product-output') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
                  <?php echo current_page('admin/add-product-output') ? '<small class="label pull-right bg-green">nuevo</small>' : "";?>
                  <?php echo strpos(request()->path(), 'edit-product-output') ? '<small class="label pull-right bg-green">editar</small>' : "";?>
                </span>
              </a>
            </li>
          </ul>
        </li>
        <li <?php echo current_page('admin/quotation') ? "class='active'" : "";?>><a href="{{url('/admin/quotation')}}"><i class="fa fa-book"></i> <span>Cotización</span></a></li>
        <li class="header">REPORTES</li>
        <li <?php echo current_page('admin/facturas') ? "class='active'" : "";?>><a href="/admin/facturas"><i class="fa fa-clipboard"></i> <span>Facturas</span></a></li>
      </ul>
    </section>
  </aside>
