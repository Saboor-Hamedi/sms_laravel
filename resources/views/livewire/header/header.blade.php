<div class="relative flex items-center justify-between w-full row-span-1">
    <header class="relative top-0 z-0 w-full bg-white shadow-md">
        <div class="container flex items-center justify-between px-4 mx-auto">
            <!-- Logo and Title -->
            <h1 class="text-xl font-semibold text-gray-800">Chat</h1>

            <!-- Sidebar Toggle Button for Mobile -->
            <button id="sidebarToggle" class="text-gray-700 md:hidden hover:text-gray-900 focus:outline-none">
                &#9776; <!-- Hamburger Icon -->
            </button>

            <!-- Navigation Menu (Hidden on Small Screens) -->
            <nav class="items-center hidden p-2 space-x-4 bg-white rounded-lg md:flex">
                <ul class="flex space-x-4">
                    <!-- Dashboard Link (only visible when authenticated) -->
                    @if (Auth::check())
                        <li>
                            <a href="{{ route('dashboard') }}"
                                class="text-gray-700 transition-colors duration-300 hover:text-gray-900"
                                wire:navigate="dashboard">
                                Dashboard
                            </a>
                        </li>
                    @endif

                    <!-- About Link -->
                    <li>
                        <a href="#"
                            class="text-gray-700 transition-colors duration-300 hover:text-gray-900">About</a>
                    </li>

                    <!-- Logout Button (only visible when authenticated) -->
                    @if (Auth::check())
                        <li>
                            @livewire('logout.logout')
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>
</div>
