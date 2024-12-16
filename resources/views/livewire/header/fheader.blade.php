<header class="fixed top-0 z-50 w-full text-white bg-gray-800">
    <div class="container flex items-center justify-between p-5 mx-auto">
        <div class="text-2xl font-bold cursor-pointer">
            <span class="text-[#2a9be7] cursor-pointer">{{ __('SMS') }}</span>
        </div>
        <nav class="hidden space-x-4 md:flex">
            @if (Auth::check())
                <a class="hover:text-gray-400" href="{{ route('dashboard') }}" wire:navigate='dashboard'>
                    {{ __('Dashboard') }}
                </a>
            @endif

            @if (!Auth::check())
                <a class="hover:text-gray-400" href="#" wire:navigate='login'>
                    {{ __('About') }}
                </a>
                <a class="hover:text-gray-400" href="{{ route('register') }}" wire:navigate='register'>
                    {{ __('Register') }}
                </a>
                <a class="hover:text-gray-400" href="{{ route('login') }}" wire:navigate='login'>
                    {{ __('Login') }}
                </a>
            @endif
        </nav>
        <div class="md:hidden">
            <button class="text-white focus:outline-none" id="menu-btn">
                <x-css-menu class="hero__icons" />
            </button>
        </div>
    </div>
    <div class="hidden md:hidden" id="mobile-menu">
        <nav class="flex flex-col p-5 space-y-2">
            @if (Auth::check())
                <a class="hover:text-gray-400" href="{{ route('dashboard') }}" wire:navigate='dashboard'>
                    {{ __('Dashboard') }}
                </a>
            @endif

            @if (!Auth::check())
                <a class="hover:text-gray-400" href="#" wire:navigate='login'>
                    {{ __('About') }}
                </a>
                <a class="hover:text-gray-400" href="{{ route('register') }}" wire:navigate='register'>
                    {{ __('Register') }}
                </a>
                <a class="hover:text-gray-400" href="{{ route('login') }}" wire:navigate='login'>
                    {{ __('Login') }}
                </a>
            @endif
        </nav>
    </div>

    <script>
        document.getElementById('menu-btn').addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
            }
        });
    </script>
</header>
