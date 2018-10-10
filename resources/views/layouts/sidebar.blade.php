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
        <li <?php echo current_page('admin/admin-welcome') ? "class='active'" : "";?>>
          <a href="{{ url('/admin/admin-welcome') }}"><i class="fa fa-home"></i> <span>Inicio</span>
            <?php echo current_page('admin/admin-welcome') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
          </a>
        </li>
        @can ('clientes.index')
          <li <?php echo current_page('clientes') || current_page('crear-cliente') || isset($editarCliente) ? "class='active'" : "";?>>
            <a href="{{ url('/clientes') }}"><i class="fa fa-users"></i> <span>Clientes</span>
              <?php echo current_page('clientes') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
              <?php echo current_page('crear-cliente') ? '<small class="label pull-right bg-green">nuevo</small>' : "";?>
              <?php echo isset($editarCliente) ? '<small class="label pull-right bg-green">editar</small>' : "";?>
            </a>
          </li>
        @endcan
        @can ('proveedor.index')
          <li <?php echo current_page('proveedores') || current_page('crear-proveedor') || isset($editarProveedor) ? "class='active'" : "";?>>
            <a href="{{ url('/proveedores') }}"><i class="fa fa-address-card-o"></i> <span>Proveedores</span>
              <?php echo current_page('proveedores') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
              <?php echo current_page('crear-proveedor') ? '<small class="label pull-right bg-green">nuevo</small>' : "";?>
              <?php echo isset($editarProveedor)  ? '<small class="label pull-right bg-green">editar</small>' : "";?>
            </a>
          </li>
        @endcan
        @can ('roles.index')
          <li class="header">ROLES Y PERMISOS</li>
        @endcan
        @can ('roles.index')
          <li <?php echo current_page('admin/roles') || current_page('admin/create-rol') || strpos(request()->path(), 'edit-rol') ? "class='active'" : "";?>>
            <a href="{{ url('/admin/roles') }}"><i class="fa fa-list"></i> <span>Roles</span>
              <?php echo current_page('admin/roles') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
              <?php echo current_page('admin/create-rol') ? '<small class="label pull-right bg-green">nuevo</small>' : "";?>
              <?php echo strpos(request()->path(), 'edit-rol') ? '<small class="label pull-right bg-green">editar</small>' : "";?>
            </a>
          </li>
        @endcan
        @can ('employee.index')
          <li <?php echo current_page('admin/usuario') || current_page('admin/create-usuario') || strpos(request()->path(), 'edit-usuario') ? "class='active'" : "";?>>
            <a href="{{ url('/admin/usuario') }}"><i class="fa fa-address-book-o"></i> <span>Empleados</span>
              <?php echo current_page('admin/usuario') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
              <?php echo current_page('admin/create-usuario') ? '<small class="label pull-right bg-green">nuevo</small>' : "";?>
              <?php echo strpos(request()->path(), 'edit-usuario') ? '<small class="label pull-right bg-green">editar</small>' : "";?>
            </a></li>
        @endcan
        <li class="header">INVENTARIO Y COTIZACIONES</li>
        <li class="treeview <?php echo current_page('admin/catalogo') || current_page('admin/categoria') || current_page('admin/create-producto-catalogo') || strpos(request()->path(), 'editar-producto-catalogo') || current_page('admin/productos') || current_page('admin/crear-producto')
                                  || strpos(request()->path(), 'edita-producto') || strpos(request()->path(), 'ver-producto') || current_page('admin/salidas') || current_page('admin/crear-salida') || strpos(request()->path(), 'editar-salida') || strpos(request()->path(), 'ver-salida')
                                  || strpos(request()->path(), 'show-product-output') ? "active" : "";?>">
          <a href="#"><i class="fa fa-pencil-square"></i> <span>Inventario</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            @can ('clasificationProduct.index')
              <li <?php echo current_page('admin/categoria') ? "class='active'" : "";?>>
                <a href="{{url('admin/categoria')}}">
                  <i class="fa fa-circle-o <?php echo current_page('admin/categoria') ? "text-aqua" : "";?>"></i>
                  <span>Tipos de Productos</span>
                  <span class="pull-right-container">
                    <?php echo current_page('admin/categoria') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
                  </span>
                </a>
              </li>
            @endcan
            @can ('catalogo.index')
              <li <?php echo current_page('admin/catalogo') || current_page('admin/create-producto-catalogo') || strpos(request()->path(), 'editar-producto-catalogo') ? "class='active'" : "";?>>
                <a href="{{url('admin/catalogo')}}">
                  <i class="fa fa-circle-o <?php echo current_page('admin/catalogo') || current_page('admin/create-producto-catalogo') || strpos(request()->path(), 'editar-producto-catalogo') ? "text-aqua" : "";?>"></i>
                  <span>Catálogo</span>
                  <span class="pull-right-container">
                    <?php echo current_page('admin/catalogo') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
                    <?php echo current_page('admin/create-producto-catalogo') ? '<small class="label pull-right bg-green">nuevo</small>' : "";?>
                    <?php echo strpos(request()->path(), 'editar-producto-catalogo') ? '<small class="label pull-right bg-green">editar</small>' : "";?>
                  </span>
                </a>
              </li>
            @endcan
            @can ('inventary.index')
              <li <?php echo current_page('admin/productos') || current_page('admin/crear-producto') || strpos(request()->path(), 'edita-producto') || strpos(request()->path(), 'ver-producto') ? "class='active'" : "";?>>
                <a href="{{url('admin/productos')}}">
                  <i class="fa fa-circle-o <?php echo current_page('admin/productos') || current_page('admin/crear-producto') || strpos(request()->path(), 'edita-producto') || strpos(request()->path(), 'ver-producto') ? "text-aqua" : "";?>"></i>
                  <span>Productos</span>
                  <span class="pull-right-container">
                    <?php echo current_page('admin/productos') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
                    <?php echo current_page('admin/crear-producto') ? '<small class="label pull-right bg-green">nuevo</small>' : "";?>
                    <?php echo strpos(request()->path(), 'edita-producto') ? '<small class="label pull-right bg-green">editar</small>' : "";?>
                    <?php echo strpos(request()->path(), 'ver-producto') ? '<small class="label pull-right bg-green">ver</small>' : "";?>
                  </span>
                </a>
              </li>
            @endcan
            @can ('inventary.index')
              <li <?php echo current_page('admin/salidas') || current_page('admin/crear-salida') || strpos(request()->path(), 'editar-salida') || strpos(request()->path(), 'ver-salida') ? "class='active'" : "";?>>
                <a href="{{url('admin/salidas')}}">
                  <i class="fa fa-circle-o <?php echo current_page('admin/salidas') || current_page('admin/crear-salida') || strpos(request()->path(), 'editar-salida') || strpos(request()->path(), 'ver-salida') ? "text-aqua" : "";?>"></i>
                  <span>Salidas de Productos</span>
                  <span class="pull-right-container">
                    <?php echo current_page('admin/salidas') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
                    <?php echo current_page('admin/crear-salida') ? '<small class="label pull-right bg-green">nuevo</small>' : "";?>
                    <?php echo strpos(request()->path(), 'editar-salida') ? '<small class="label pull-right bg-green">editar</small>' : "";?>
                    <?php echo strpos(request()->path(), 'ver-salida') ? '<small class="label pull-right bg-green">ver</small>' : "";?>
                  </span>
                </a>
              </li>
            @endcan
          </ul>
        </li>
        @can ('quotation.index')
          <li <?php echo current_page('admin/cotizacion') || current_page('admin/crear-cotizacion') || strpos(request()->path(), 'ver-cotizacion') ? "class='active'" : "";?>>
            <a href="{{url('/admin/cotizacion')}}"><i class="fa fa-book"></i> <span>Cotización</span>
              <?php echo current_page('admin/cotizacion') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
              <?php echo current_page('admin/crear-cotizacion') ? '<small class="label pull-right bg-green">nuevo</small>' : "";?>
              <?php echo strpos(request()->path(), 'ver-cotizacion') ? '<small class="label pull-right bg-green">ver</small>' : "";?>
            </a>
          </li>
        @endcan
        @can ('facturas.index')
          <li class="header">REPORTES</li>
        @endcan
        @can ('facturas.index')
          <li <?php echo current_page('admin/facturas') ? "class='active'" : "";?>>
            <a href="/admin/facturas"><i class="fa fa-clipboard"></i> <span>Reportes de ingreso</span>
              <?php echo current_page('admin/facturas') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
            </a>
          </li>
        @endcan
      </ul>
    </section>
  </aside>
