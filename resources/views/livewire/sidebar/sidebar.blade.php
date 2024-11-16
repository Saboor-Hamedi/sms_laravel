<aside id="sidebar"
    class="z-10 fixed w-64 h-full p-4 transition-transform duration-300 transform -translate-x-full bg-[#e2e0e0] md:w-1/4 lg:w-1/5 md:relative md:translate-x-0 sm:z-10 lg:z-0">
    <ul>

        <li class="mb-4">
            <a href="#" class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-300">
                <i class="fas fa-tachometer-alt"></i>
                <span class="ml-2">Dashboard</span>
            </a>
        </li>
        <li class="mb-4">
            <a href="{{ route('score.scores') }}" class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-300">
                <i class="fas fa-user"></i>
                <span class="ml-2">Scores</span>
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
        <li class="mb-4">
            <a href="#" class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-300">
                <i class="fas fa-cog"></i>
                <span class="ml-2">Logout</span>
            </a>
        </li>
    </ul>
</aside>
