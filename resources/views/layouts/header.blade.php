<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
      <span class="logo-mini"><b>A</b>LT</span>
      <span class="logo-lg"><b>Admin</b>LTE</span>
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
            @can ('correos.index')
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">1</span>
              </a>
            @endcan
            <ul class="dropdown-menu">
              <li class="header">Tiene 1 mensajes</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="">
                      <div class="pull-left">
                        <img src="{{ url('img/image.png')}}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Jose Acopa
                        <small><i class="fa fa-clock-o"></i> 4</small>
                      </h4>
                      <p>jose.acopa.martinez@gmail.com</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="">Ver todos los mensajes</a></li>
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
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-12 text-center">
                    {{ Auth::user()->email}}
                  </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                {{-- <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> --}}
                <div class="pull-right">
                  <a class="btn btn-danger btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> Cerrar Sesión
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
