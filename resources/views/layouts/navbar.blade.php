<nav class="navbar navbar-toggleable-md navbar-light fixed-top">
  <div class="container">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ route('store') }}">
      <img src="{{ asset('/img/logo.png') }}" height="35px" alt="Manten Dev logo">
    </a>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">     
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @if (Auth::guest())
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-user" aria-hidden="true"></i> Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>
        </li>
        @else
        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu" role="menu">
                @if(Auth::user()->isAdmin())
                  <a class="dropdown-item" href="{{ route('admin') }}">
                      <i class="fa fa-users" aria-hidden="true"></i> Admin
                  </a>
                @endif
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                </a>
                

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
            </div>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="{{ route('store') }}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/cart') }}">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-success">{{ Cart::count() }}</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>