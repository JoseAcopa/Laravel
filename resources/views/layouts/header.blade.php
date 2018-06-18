<?php
 $id =  Auth::user()->id
?>

<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/admin/admin-welcome') }}" class="logo">
      <span class="logo-mini"><b>R</b>X</span>
      <span class="logo-lg"><b>SIYC</b>RayosX</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">{{$count}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tienes {{$count}} mensajes</li>
              <li>
                <ul class="menu">
                  {{-- mensajes nuevos --}}
                  @foreach ($users as $user)
                    <li>
                      <a href="{{ route('employee.edit', $user->idUsuario) }}">
                        <div class="pull-left">
                          <img src="{{ url('img/image.png')}}" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          {{$user->nombre}}
                          <small><i class="fa fa-clock-o"></i> {{ Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</small>
                        </h4>
                        <p>{{$user->correo}}</p>
                      </a>
                    </li>
                  @endforeach
                </ul>
              </li>
              <li class="footer"><a href="{{ route('correo.index') }}">Ver todos los mensajes</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{ url('img/image.png')}}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">
                {{ Auth::user()->name}} ({{ Auth::user()->user}})
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
              @if (Auth::user()->name == null)
                <img src="{{ url('img/image.png')}}" class="img-circle" alt="User Image">
              @else
                <img src="{{ url('img/image.png')}}" class="img-circle" alt="User Image">
              @endif

                <p>
                  {{ Auth::user()->name}}
                  {{ Auth::user()->email}}
                </p>
              </li>
              <!-- Menu Body -->
              {{-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li> --}}
              <!-- Menu Footer-->
              <li class="user-footer">
                {{-- <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> --}}
                <div class="pull-left">
                  <a class="btn btn-primary btn-flat" href="{{ route('employee.edit', $id) }}">
                    <i class="fa fa-user"></i> Perfil
                  </a>
                </div>
                <div class="pull-right">
                  <a class="btn btn-danger btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> Salir
                  </a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
          {{ csrf_field() }}
          </form>

          {{-- <li>
            <a href="#"><i class="fa fa-gears"></i></a>
          </li> --}}
        </ul>
      </div>
    </nav>
  </header>
