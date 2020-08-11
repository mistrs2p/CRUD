<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
  <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'CRUDapp') }}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">خانه <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about">درباره ما</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/services" tabindex="-1" aria-disabled="true">خدمات ما</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/posts" tabindex="-1" aria-disabled="true">وبلاگ</a>
          </li>
          
        </ul>
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

          </ul>
          <ul class="nav navbar-nav justify-content-center">
            <li class="nav-item"><a href="/posts/create" class="nav-link">ایجاد پست</a></li>
          </ul>

          
          <ul class="navbar-nav">
              <!-- Authentication Links -->
              @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('ورود') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('ثبت نام') }}</a>
                      </li>
                  @endif
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest
          </ul>
      </div>
  </div>
</nav>