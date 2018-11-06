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
          <img src="{{ url('img/image.png')}}"  alt="User Image">
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
        <li class="active">
          <a href="{{ url('/home') }}"><i class="fa fa-home"></i> <span>Inicio</span>
            <small class="label pull-right bg-green">activo</small>
          </a>
        </li>
        <li class="header">MENU TOGGLE</li>
        <li class="treeview">
          <a href="#"><i class="fa fa-pencil-square"></i>
            <span>Toggle</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="#">
                <i class="fa fa-circle-o text-aqua"></i>
                <span>Nivel 1</span>
                <span class="pull-right-container"></span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-circle-o text-aqua"></i>
                <span>Nivel 2</span>
                <span class="pull-right-container"></span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-circle-o text-aqua"></i>
                <span>Nivel 3</span>
                <span class="pull-right-container"></span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </section>
  </aside>
