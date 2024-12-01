<aside id="sidebar"
    class="z-10 fixed w-64 h-full transition-transform duration-300 transform -translate-x-full bg-[#f3f4f6] md:w-1/4 lg:w-1/5 md:relative md:translate-x-0 sm:z-10 lg:z-0">

    <div class="flex items-center justify-between w-full p-4 ">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>

            {{-- chat icons --}}

        </div>
        <div>SMS</div>
    </div>
    <ul class="p-2">

        @if (!Auth::check())
            <li class="mb-4">
                <a href="{{ route('register') }}" class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-300 "
                    wire:navigate='register'>
                    <x-heroicon-o-user class="w-6 text-gray-500 text-[10px]" />
                    <span class="ml-2">Register</span>
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('login') }}" class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-300 "
                    wire:navigate='register'>
                    <x-heroicon-o-lock-closed class="w-6 text-gray-500 text-[10px]" />
                    <span class="ml-2">Login</span>
                </a>
            </li>
        @endif
        @if (Auth::check())
            <li class="mb-4">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-300 " wire:navigate='dashboard'>
                    <x-heroicon-o-home class="w-6 text-gray-500 text-[10px]" />
                    <span class="ml-2">Dashboard</span>
                </a>
            </li>

            @can('admin')
                <li class="mb-4">
                    <a href="{{ route('permissions.user-role-manager') }}"
                        class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-300 "
                        wire:navigate='permissions.user-role-manager'>
                        <x-heroicon-o-home class="w-6 text-gray-500 text-[10px]" />
                        <span class="ml-2">Grant Permissions</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('permissions.create') }}"
                        class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-300 " wire:navigate='permissions'>
                        <x-heroicon-o-cube class="w-6 text-gray-500 text-[10px]" />
                        <span class="ml-2">Create Permission</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('permissions.index') }}"
                        class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-300 " wire:navigate='permissions'>
                        <x-heroicon-o-cloud-arrow-up class="w-6 text-gray-500 text-[10px]" />

                        <span class="ml-2">Show Permission</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('academic.create') }}"
                        class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-300 " wire:navigate='academic'>
                        <x-heroicon-o-academic-cap class="w-6 text-gray-500 " />
                        <span class="ml-2">Academic Year</span>
                    </a>
                </li>
            @endcan
            {{-- Academic list --}}
            @can('teacher')
                <li class="mb-4">
                    <a href="{{ route('scores.create') }}"
                        class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-300 " wire:navigate='scores'>
                        <x-iconpark-scoreboard-o class="w-6 text-gray-500 text-[10px]" />
                        <span class="ml-2">Scores</span>
                    </a>
                </li>
                <livewire:academic.index />
            @endcan
        @endif
    </ul>
</aside>
