<div class="relative flex items-center justify-between w-full row-span-1">
    <header class="relative top-0 z-0 w-full bg-white shadow-md">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <!-- Logo and Title -->
            <h1 class="text-xl font-semibold text-gray-800">Chat</h1>

            <!-- Sidebar Toggle Button for Mobile -->
            <button id="sidebarToggle" class="md:hidden text-gray-700 hover:text-gray-900 focus:outline-none">
                &#9776; <!-- Hamburger Icon -->
            </button>

            <!-- Navigation Menu (Hidden on Small Screens) -->
            <nav class="hidden md:flex space-x-4 items-center bg-white p-2 rounded-lg">
                <ul class="flex space-x-4">

                    <!-- Dashboard Link (only visible when authenticated) -->
                    @if (Auth::check())
                        <li>
                            <a href="{{ route('dashboard') }}"
                                class="text-gray-700 hover:text-gray-900 transition-colors duration-300"
                                wire:navigate="dashboard">
                                Dashboard
                            </a>
                        </li>
                    @endif

                    <!-- About Link -->
                    <li>
                        <a href="#"
                            class="text-gray-700 hover:text-gray-900 transition-colors duration-300">About</a>
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
