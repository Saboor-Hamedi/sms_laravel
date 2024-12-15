<header class="bg-gray-800 text-white fixed w-full z-50 top-0">
    <div class="container mx-auto flex justify-between items-center p-5">
        <div class="text-2xl font-bold cursor-pointer">
            <span class="text-[#2a9be7] cursor-pointer">SMS</span>
        </div>
        <nav class="hidden md:flex space-x-4">
            @if (Auth::check())
                <a class="hover:text-gray-400" href="{{ route('dashboard') }}" wire:navigate='dashboard'>
                    Dashboard
                </a>
            @endif

            @if (!Auth::check())
                <a class="hover:text-gray-400" href="#" wire:navigate='login'>
                    About
                </a>
                <a class="hover:text-gray-400" href="{{ route('register') }}" wire:navigate='register'>
                    Register
                </a>
                <a class="hover:text-gray-400" href="{{ route('login') }}" wire:navigate='login'>
                    Login
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
        <nav class="flex flex-col space-y-2 p-5">
            @if (Auth::check())
                <a class="hover:text-gray-400" href="{{ route('dashboard') }}" wire:navigate='dashboard'>
                    Dashboard
                </a>
            @endif

            @if (!Auth::check())
                <a class="hover:text-gray-400" href="#" wire:navigate='login'>
                    About
                </a>
                <a class="hover:text-gray-400" href="{{ route('register') }}" wire:navigate='register'>
                    Register
                </a>
                <a class="hover:text-gray-400" href="{{ route('login') }}" wire:navigate='login'>
                    Login
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
