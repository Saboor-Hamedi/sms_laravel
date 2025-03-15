<header class="front-header">
        <div class="front-header-container">
            <div class="front-header-brand">
                <h1 class="front-header-title">
                    <a href="{{ route('welcome') }}">
                    <i class="mr-2 fa-solid fa-globe"></i>
                        {{ __('Sphere') }}
                    </a>
                </h1>
            <button class="front-menu-toggle"><i class="fas fa-bars"></i></button>
            </div>
            <nav class="front-nav">
                @if(!Auth::check())
                    <a href="{{ route(name: 'login') }}" class="front-nav-link">{{ __('Login') }}</a>
                    <a href="{{ route('register') }}" class="front-nav-link">{{ __('Register') }}</a>
                @endif
                @if(Auth::check())
                <a href="{{ route('dashboard') }}" class="front-nav-link">{{ __('Dashboard') }}</a>
                @endif
                <a href="#" class="front-nav-link">{{ __('Contact') }}</a>
                <a href="#" class="front-nav-link">{{ __('Contact') }}</a>
            </nav>
            <div class="front-header-actions">
                <input type="search" placeholder="Search..." class="front-search-input">
                <button class="front-theme-toggle"><i class="fas fa-moon"></i></button>
            </div>
        </div>
    </header>