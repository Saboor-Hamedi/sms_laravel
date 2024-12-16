<div>

    <div class="dashboard__sidebar" id="dashboard__sidebar">
        {{-- Sidebar content goes here --}}
        <h2 class='w-full p-4 text-center bg-gray-700'>SMS Dashboard</h2>
        {{-- end --}}
        <ul class="p-2">
            @if (Auth::check())
                <x-admin-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <x-heroicon-o-home class="hero__icons" /> {{ __('Dashboard') }}
                </x-admin-link>
                {{-- profile update --}}
                <div>
                    <h4 class="lg:text-[20px] md:text[15px] sm:text-[12px] py-3 ">
                        Personal Details
                    </h4>
                </div>
                <x-admin-link :href="route('user-profile.index')" :active="request()->routeIs('user-profile.index')">
                    <x-heroicon-o-document-text class="hero__icons" />
                    {{ __('Profile') }}
                </x-admin-link>
                <x-admin-link :href="route('user-profile.update')" :active="request()->routeIs('user-profile.update')">
                    <x-heroicon-o-document-text class="hero__icons" />
                    {{ __('Update Profile') }}
                </x-admin-link>
                @can('admin')
                    {{-- nested menu --}}
                    <div>
                        <h4 class="lg:text-[20px] md:text[15px] sm:text-[12px] py-3 ">
                            {{ __('Register Students') }}
                        </h4>
                    </div>
                    <li class="mb-1" onclick="menuToggle()">
                        <a href="javascript:void(0)"
                            class="flex items-center p-2 rounded hover:bg-gray-700 lg:text-[13px] md:text[11px] sm:text-[10px]">
                            <x-heroicon-o-home class="hero__icons" />
                            <span class="ml-2">{{ __('Details') }}</span>
                        </a>
                    </li>

                    <ul id="dropdown__menu" class="hidden ">
                        <li class="ml-4">
                            <x-admin-link :href="route('students.register')" :active="request()->routeIs('students.register')">
                                <x-heroicon-o-user class="hero__icons" />
                                <span>{{ __('Register Students') }}</span>
                            </x-admin-link>
                        </li>
                        <li class="ml-4">
                            <a href="#"
                                class="flex items-center p-2 rounded hover:bg-gray-700 lg:text-[13px] md:text[11px] sm:text-[10px]">{{ __('Password') }}</a>
                        </li>
                        <li class="ml-4">
                            <a href="#"
                                class="flex items-center p-2 rounded hover:bg-gray-700 lg:text-[13px] md:text[11px] sm:text-[10px]">
                                {{ __('Posts') }}
                            </a>
                        </li>
                    </ul>

                    {{-- start dropdown --}}
                    <li class="pl-3 dropdown-menu" onclick="toggleDropdown()"></li>
                    {{-- Permissions --}}
                    <div>
                        <h4 class="lg:text-[20px] md:text[15px] sm:text-[12px] mb-2 ">
                            {{ __('Permissions') }}
                        </h4>
                    </div>
                    {{-- drop down end --}}
                    <li class="mb-1">
                        <x-admin-link :href="route('permissions.user-role-manager')" :active="request()->routeIs('permissions.user-role-manager')">
                            <x-heroicon-o-home class="hero__icons" />
                            <span class="ml-2">{{ __('Grant Permissions') }}</span>
                        </x-admin-link>
                    </li>
                    <li class="mb-1">
                        <x-admin-link :href="route('permissions.create')" :active="request()->routeIs('permissions.create')">
                            <x-heroicon-o-cube class="hero__icons" />
                            <span class="ml-2">{{ __('Create Permission') }}</span>
                        </x-admin-link>
                    </li>
                    <li class="mb-1">
                        <x-admin-link :href="route('permissions.index')" :active="request()->routeIs('permissions.index')">
                            <x-heroicon-o-cloud-arrow-up class="hero__icons" />
                            <span class="ml-2">{{ __('Show Permission') }}</span>
                        </x-admin-link>
                    </li>
                    <div>
                        <h4 class="lg:text-[20px] md:text[15px] sm:text-[12px] mb-3 ">
                            {{ __('Academic Year') }}
                        </h4>
                    </div>
                    {{-- Academics  --}}
                    <li class="mb-4">
                        <x-admin-link :href="route('academic.create')" :active="request()->routeIs('academic.create')">
                            <x-heroicon-o-academic-cap class="hero__icons" />
                            <span class="ml-2">{{ __('Academic Year') }}</span>
                        </x-admin-link>
                    </li>

                    {{-- Add Grades/classes  --}}
                    <div>
                        <h4 class="lg:text-[20px] md:text[15px] sm:text-[12px] mb-3 ">
                            {{ __('Grades') }}
                        </h4>
                    </div>
                    <li>
                        <x-admin-link :href="route('grades.index')" :active="request()->routeIs('grades.index')">
                            <x-heroicon-o-academic-cap class="hero__icons" />
                            <span class="ml-2">{{ __('Grade Lists') }}</span>
                        </x-admin-link>
                    </li>
                    <li class="mb-4">
                        <x-admin-link :href="route('grades.create')" :active="request()->routeIs('grades.create')">
                            <x-heroicon-o-academic-cap class="hero__icons" />
                            <span class="ml-2">{{ __('Add Grade') }}</span>
                        </x-admin-link>
                    </li>

                    {{-- grades end --}}
                @endcan
                {{-- Academic list --}}
                @can('teacher')
                    <li class="mb-1">
                        <x-admin-link :href="route('scores.create')" :active="request()->routeIs('scores.create')">
                            <x-iconpark-scoreboard-o class="hero__icons" />
                            <span class="ml-2">{{ __('Scores') }}</span>
                        </x-admin-link>
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
                    <img src="{{ asset('css/img/logo.png') }}" alt="Profile" class="profile__image">
                    <span class="profile__name">{{ Str::ucfirst(Auth::user()->name ?? 'Ananymous') }}</span>
                </div>
                <a href="{{ route('user-profile.index') }}" wire:navigate='user-profile'>
                    {{ Str::ucfirst(Auth::user()->name ?? 'Ananymous') }}
                </a>
                <a href="{{ route('profile') }}" wire:navigate='profile'>Update Detailts</a>
                <a href="#" wire:navigate='settings'>Settings</a>
                @livewire('logout.logout')
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
</div>
