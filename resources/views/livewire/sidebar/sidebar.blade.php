<aside id="sidebar"
    class="z-10 fixed w-64 h-full p-4 transition-transform duration-300 transform -translate-x-full bg-[#f3f4f6] md:w-1/4 lg:w-1/5 md:relative md:translate-x-0 sm:z-10 lg:z-0">
    <ul>

        @if (!Auth::check())
            <li class="mb-4">
                <a href="#" class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-300">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="ml-2">Dashboard</span>
                </a>
            </li>

            <li class="mb-4">
                <a href="{{ route('register') }}" class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-300"
                    wire:navigate='register'>
                    <i class="fas fa-cog"></i>
                    <span class="ml-2">Register</span>
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('login') }}" class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-300"
                    wire:navigate='register'>
                    <i class="fas fa-cog"></i>
                    <span class="ml-2">Login</span>
                </a>
            </li>
        @endif
        @if (Auth::check())
            <li class="mb-4">
                <a href="{{ route('scores.create') }}"
                    class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-300" wire:navigate='scores'>
                    <i class="fas fa-user"></i>
                    <span class="ml-2">Scores</span>
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('permissions.create') }}"
                    class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-300" wire:navigate='permissions'>
                    <i class="fas fa-cog"></i>
                    <span class="ml-2">Permission</span>
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('permissions.index') }}"
                    class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-300" wire:navigate='permissions'>
                    <i class="fas fa-cog"></i>
                    <span class="ml-2">Show Permission</span>
                </a>
            </li>
        @endif

    </ul>
</aside>
