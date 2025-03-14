<header class="front-header">
        <div class="front-header-container">
            <div class="front-header-brand">
                <h1 class="front-header-title">
                    <i class="mr-2 fa-solid fa-globe"></i>Sphere
                </h1>
            <button class="front-menu-toggle"><i class="fas fa-bars"></i></button>
            </div>
            <nav class="front-nav">
                @if(!Auth::check())
                    <a href="{{ route(name: 'login') }}" class="front-nav-link">Login</a>
                    <a href="{{ route('register') }}" class="front-nav-link">Register</a>
                @endif
                <a href="{{ route('dashboard') }}" class="front-nav-link">Dashboard</a>
                <a href="#" class="front-nav-link">Contact</a>
                <a href="#" class="front-nav-link">Contact</a>
            </nav>
            <div class="front-header-actions">
                <input type="search" placeholder="Search..." class="front-search-input">
                <button class="front-theme-toggle"><i class="fas fa-moon"></i></button>
            </div>
        </div>
    </header>