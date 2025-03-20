<nav class="front-navbar">
    <div class="front-navbar-links">
        <div class="front-navbar-logo">
            <a href="{{ route('welcome') }}">Shpere Blog</a>
        </div>
        <ul class="ul-list">
            <li class="li-list">
                @if (!Auth::check())
                    <a href="{{ route('login') }}" class="nav-link">{{ __('Login') }}</a>
                    <a href="{{ route('register') }}" class="nav-link">{{ __('Register') }}</a>
                @else
                    <a href="{{ route('dashboard') }}" class="nav-link">{{ __('Dashboard') }}</a>
                @endif

            </li>
        </ul>
        <div class="front-header-theme">
            <input type="checkbox" id="theme-toggle" class="theme-toggle">
            <label for="theme-toggle" class="theme-toggle-label" id="theme-toggle-label">
                <a class="fas fa-moon"></a>
                <a class="fas fa-sun"></a>
                <div class="ball"></div>
            </label>
        </div>
        <button class="menu-toggle" aria-label="Toggle menu" aria-expanded="false">
            <i class="fas fa-bars"></i>
        </button>
    </div>
</nav>
