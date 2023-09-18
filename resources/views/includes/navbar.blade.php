<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">

      {{ config('app.name', 'Laravel') }}
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav me-auto">
        {{-- home --}}
        <li class="nav-item">
          <a class="nav-link @if (request()->routeIs('guest.home')) active @endif"
            href="{{ route('guest.home') }}">{{ __('Home') }}</a>
        </li>
        @auth
          {{-- projects --}}
          <li class="nav-item">
            <a class="nav-link @if (request()->routeIs('admin.projects*')) active @endif"
              href="{{ route('admin.projects.index') }}">Projects</a>
          </li>

          {{-- technologies --}}
          <li class="nav-item">
            <a class="nav-link @if (request()->routeIs('admin.technologies*')) active @endif"
              href="{{ route('admin.technologies.index') }}">Technologies</a>
          </li>

          {{-- types --}}
          <li class="nav-item">
            <a class="nav-link @if (request()->routeIs('admin.types*')) active @endif"
              href="{{ route('admin.types.index') }}">Types</a>
          </li>
        @endauth
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          {{-- @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif --}}
        @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
              data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ url('admin') }}">Home</a>
              <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
