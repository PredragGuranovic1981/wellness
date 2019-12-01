<div>
  <nav class="navbar navbar-expand-sm navbar-custom navigacija" id="navigacija">
      <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">
              {{ 'Wellness & Spa' }}
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->
              <ul class="navbar-nav mr-auto">
                <li class="{{ (request()->is('/')) ? 'active' : '' }}">
                  <a class="nav-link" href="/">Početna strana <span class="sr-only">(current)</span></a>
                </li>
                <li class="{{ (request()->is('/about')) ? 'active' : '' }}">
                  <a class="nav-link" href="/about">Strana o nama</a>
                </li>
                <li class="{{ (request()->is('/treatment')) ? 'active' : '' }}">
                  <a class="nav-link" href="/treatment">Tretman</a>
                <li class="{{ (request()->is('/contact')) ? 'active' : '' }}">
                  <a class="nav-link" href="/contact">Contact</a>
                </li>
              </ul>

              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">
                  <!-- Authentication Links -->
                  @if (Route::has('login'))
                        @auth
                            <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">{{Auth::user()->name }}</a></li>
                        @else
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>

                        @if (Route::has('register'))
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @endif
                        @endauth
                  @endif
              </ul>
          </div>
      </div>
  </nav>
</div>
