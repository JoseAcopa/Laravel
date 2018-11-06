<nav class="nav">
  <ul class="ul-nav">
    <li onclick="menuVertical()"><i  class="fa fa-bars" aria-hidden="true"></i></li>
    <li>Admin LTE</li>
    <div class="sesion">
      <ul>
        <li><img src="{{ url('img/image.png')}}" alt="" class="popout">
          <ul>
            <div class="photo">
              <img src="{{ url('img/image.png')}}" alt="">
            </div>
            <div class="name">
              <h3>{{auth()->user()->name}}</h3>
              <h5>{{auth()->user()->email}}</h5>
              <h3></h3>
            </div>
            <li></li>
            <form class="footerSingout" method="POST" action="{{ route('logout') }}">
              {{ csrf_field() }}
              <button class="btn-danger"><i class="fa fa-sign-out fa-xl"></i> Cerrar Sesión</button>
            </form>
          </ul>
        </li>
      </ul>
    </div>
  </ul>
</nav>
