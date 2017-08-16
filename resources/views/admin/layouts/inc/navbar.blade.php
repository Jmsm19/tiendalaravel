<nav class="navbar navbar-toggleable-md navbar-light">
  <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
              data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
              aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="{{ url('/admin/product') }}">
          <img src="{{ asset('/img/logo.png') }}" height="35px" alt="Manten Dev logo">
      </a>
      <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                aria-expanded="false">
                    <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu bg-light" role="menu">
                    <li>
                        <a class="nav-link" href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                            style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
          </ul>
      </div>
  </div>
</nav>