<div>

    <div class="dashboard__sidebar" id="dashboard__sidebar">
        {{-- Sidebar content goes here --}}
        <h2 class='p-4 text-center'>System Dashboard</h2>

        {{-- end --}}
        <ul class="p-2">
            @if (Auth::check())
                <li class="mb-4">
                    <a href="{{ route('dashboard') }}" class="flex items-center p-2 rounded hover:bg-blue-300 "
                        wire:navigate='dashboard'>
                        <x-heroicon-o-home class="w-6  text-[10px]" />
                        <span class="ml-2">Dashboard</span>
                    </a>
                </li>

                @can('admin')
                    <li class="mb-4">
                        <a href="{{ route('permissions.user-role-manager') }}"
                            class="flex items-center p-2 rounded hover:bg-blue-300 "
                            wire:navigate='permissions.user-role-manager'>
                            <x-heroicon-o-home class="w-6  text-[10px]" />
                            <span class="ml-2">Grant Permissions</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('permissions.create') }}" class="flex items-center p-2 rounded hover:bg-blue-300 "
                            wire:navigate='permissions'>
                            <x-heroicon-o-cube class="w-6  text-[10px]" />
                            <span class="ml-2">Create Permission</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('permissions.index') }}" class="flex items-center p-2 rounded hover:bg-blue-300 "
                            wire:navigate='permissions'>
                            <x-heroicon-o-cloud-arrow-up class="w-6  text-[10px]" />

                            <span class="ml-2">Show Permission</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('academic.create') }}" class="flex items-center p-2 rounded hover:bg-blue-300 "
                            wire:navigate='academic'>
                            <x-heroicon-o-academic-cap class="w-6 " />
                            <span class="ml-2">Academic Year</span>
                        </a>
                    </li>
                @endcan
                {{-- Academic list --}}
                @can('teacher')
                    <li class="mb-4">
                        <a href="{{ route('scores.create') }}" class="flex items-center p-2 rounded hover:bg-blue-300 "
                            wire:navigate='scores'>
                            <x-iconpark-scoreboard-o class="w-6  text-[10px]" />
                            <span class="ml-2">Scores</span>
                        </a>
                    </li>
                    <livewire:academic.index />
                @endcan
            @endif
        </ul>
    </div>

    <div class="flex items-center justify-between dashboard__navbar" id="dashboard__navbar">
        {{-- Navbar content goes here --}}
        <div>
            <button class="burger-button" id="burgerButton" onclick="toggleSidebar()">&#9776;</button>
        </div>

        {{-- dropdown --}}
        <div class="dropdown" id="dropdownMenu">
            <button class="rounded default-button">Profile</button>
            <div class="dropdown__content">
                <div class="profile__item">
                    <img src="{{ asset('css/img/apple-icon.png') }}" alt="Profile" class="profile__image">
                    <span class="profile__name">John Doe</span>
                </div>
                <a href="{{ route('user-profile.index') }}" wire:navigate='user-profile'>Profile</a>
                <a href="{{ route('profile') }}" wire:navigate='profile'>Update Detailts</a>
                <a href="#">Settings</a>
                <a href="#">@livewire('logout.logout')</a>
            </div>
        </div>

        <script>
            // Toggle dropdown on click
            document.getElementById('dropdownMenu').addEventListener('click', function(event) {
                var dropdownContent = this.querySelector('.dropdown__content');

                // Check if the clicked target is the button or the dropdown content itself
                if (dropdownContent.style.display === 'block') {
                    dropdownContent.style.display = 'none'; // Close if it's open
                } else {
                    dropdownContent.style.display = 'block'; // Open if it's closed
                }

                // Prevent the dropdown from closing if clicking inside the content
                event.stopPropagation();
            });

            // Close dropdown if clicking outside of it
            document.addEventListener('click', function(event) {
                var dropdown = document.getElementById('dropdownMenu');
                var dropdownContent = dropdown.querySelector('.dropdown__content');
                if (!dropdown.contains(event.target)) {
                    dropdownContent.style.display = 'none'; // Close if clicking outside
                }
            });
        </script>
        {{-- end --}}
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('dashboard__sidebar');
            const navbar = document.getElementById('dashboard__navbar');
            const content = document.getElementById('dashboard__content');
            const isOpen = sidebar.classList.toggle('dashboard__open');
            if (isOpen) {
                navbar.classList.add('shifted');
            } else {
                navbar.classList.remove('shifted');
                content.classList.remove('shifted');
            }
        }
        document.addEventListener('DOMContentLoaded', toggleSidebar);
        document.addEventListener('livewire:navigated', toggleSidebar);
    </script>
</div>
