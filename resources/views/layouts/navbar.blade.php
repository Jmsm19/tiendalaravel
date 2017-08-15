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
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('store') }}">About</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('store') }}">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-default">0</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>