  <header>

      <div class="container">

          <nav class="navbar">

              <a href="{{ route('welcome') }}">
                  <img src="{{ asset('storage/logo/logo.png') }}" alt="Devblog's logo" class="logo-light">
                  <img src="{{ asset('storage/logo/logo.png') }}" alt="Devblog's logo" class="logo-dark">
              </a>

              <div class="btn-group">
                  <button class="theme-btn theme-btn-mobile light">
                      {{-- moon --}}
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                          stroke="currentColor" class="size-6 moon">
                          <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                      </svg>
                  </button>
                  <button class="nav-menu-btn">
                      <i class="fa-solid fa-bars" name="menu-outline"></i>
                  </button>
              </div>
              <div class="flex-wrapper">
                  <ul class="desktop-nav">

                    @if(!Auth::check())
                    <li>
                          <a href="{{ route('login') }}" class="nav-link">{{ __('Login') }}</a>
                      </li>

                      <li>
                          <a href="{{ route('register') }}" class="nav-link">{{ __('Register') }}</a>
                      </li>

                      @else
                      <li>
                          <a href="{{ route('dashboard') }}" class="nav-link">{{ __('Dashboard') }}</a>
                      </li>
                    
                    @endif
                      <li>
                          <a href="#" class="nav-link">{{ __('Contact') }}</a>
                      </li>
                  </ul>

                  <button class="theme-btn theme-btn-desktop light">
                      {{-- <ion-icon name="moon" class="moon"></ion-icon>
            <ion-icon name="sunny" class="sun"></ion-icon> --}}
                      <i class="fa fa-moon"></i>
                      <i class="fa fa-sun"></i>
                  </button>

              </div>

              <div class="mobile-nav">

                  <button class="nav-close-btn">
                      <ion-icon name="close-outline"></ion-icon>
                  </button>

                  <div class="wrapper">

                      <p class="h3 nav-title">Main Menu</p>

                      <ul>
                          <li class="nav-item">
                              <a href="#" class="nav-link">Home</a>
                          </li>

                          <li class="nav-item">
                              <a href="#" class="nav-link">About Me</a>
                          </li>

                          <li class="nav-item">
                              <a href="#" class="nav-link">Contact</a>
                          </li>
                      </ul>

                  </div>

                  <div>

                      <p class="h3 nav-title">Topics</p>

                      <ul>
                          <li class="nav-item">
                              <a href="#" class="nav-link">Database</a>
                          </li>

                          <li class="nav-item">
                              <a href="#" class="nav-link">Accessibility</a>
                          </li>

                          <li class="nav-item">
                              <a href="#" class="nav-link">Web Performance</a>
                          </li>
                      </ul>

                  </div>

              </div>

          </nav>

      </div>

  </header>
