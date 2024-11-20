<div class="relative flex items-center justify-center w-full row-span-1 p-2 shadow-md bg-[#f3f4f6]">
    <header class="relative top-0 z-0 w-full ">
        <div class="container flex items-center justify-between px-2 mx-auto">
            <h1 class="text-xl font-bold text-gray-800">Chat</h1>
            <button id="sidebarToggle" class="text-gray-700 md:hidden hover:text-gray-900 focus:outline-none">
                &#9776; <!-- Menu icon -->
            </button>
            <nav class="hidden space-x-4 md:flex">
                <ul class="flex space-x-4">

                    @if (Auth::check())
                        <li><a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-gray-900"
                                wire:navigate="dashboard">Dashboard</a>
                        </li>
                    @endif

                    <li><a href="#" class="text-gray-700 hover:text-gray-900">About</a></li>
                    @if (Auth::check())
                        @livewire('logout.logout')
                    @endif
                </ul>
            </nav>
        </div>
    </header>
</div>
