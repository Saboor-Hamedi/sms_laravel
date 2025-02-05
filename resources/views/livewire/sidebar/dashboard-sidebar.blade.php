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
                {{-- Students --}}
                @can('admin')
                    <x-admin-link :href="route('user-profile.index')" :active="request()->routeIs('user-profile.index')">
                        <x-heroicon-o-document-text class="hero__icons" />
                        {{ __('Profile') }}
                    </x-admin-link>
                    <x-admin-link :href="route('user-profile.update')" :active="request()->routeIs('user-profile.update')">
                        <x-heroicon-o-document-text class="hero__icons" />
                        {{ __('Update Profile') }}
                    </x-admin-link>
                @endcan
                @can('student')
                    <x-admin-link :href="route('user-profile.index')" :active="request()->routeIs('user-profile.index')">
                        <x-heroicon-o-document-text class="hero__icons" />
                        {{ __('Profile') }}
                    </x-admin-link>
                    <x-admin-link :href="route('user-profile.update')" :active="request()->routeIs('user-profile.update')">
                        <x-heroicon-o-document-text class="hero__icons" />
                        {{ __('Update Profile') }}
                    </x-admin-link>
                @endcan
                {{-- Teachers --}}
                @can('teacher')
                    <x-admin-link :href="route('teachers.profile')" :active="request()->routeIs('teachers.profile')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class=" hero__icons">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        {{ __('Profile') }}
                    </x-admin-link>

                    <x-admin-link :href="route('teachers.register')" :active="request()->routeIs('teachers.register')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="hero__icons">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                        {{ __('Update Profile') }}
                    </x-admin-link>

                    <x-admin-link :href="route('scores.create')" :active="request()->routeIs('scores.create')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="hero__icons">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V13.5Zm0 2.25h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V18Zm2.498-6.75h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V13.5Zm0 2.25h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V18Zm2.504-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5Zm0 2.25h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V18Zm2.498-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5ZM8.25 6h7.5v2.25h-7.5V6ZM12 2.25c-1.892 0-3.758.11-5.593.322C5.307 2.7 4.5 3.65 4.5 4.757V19.5a2.25 2.25 0 0 0 2.25 2.25h10.5a2.25 2.25 0 0 0 2.25-2.25V4.757c0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0 0 12 2.25Z" />
                        </svg>
                        <span class="ml-2">{{ __(key: 'Scores') }}</span>
                    </x-admin-link>

                    <livewire:academic.index />
                @endcan

                {{-- parent details  --}}
                @can('parent')
                    {{-- Register Profile --}}
                    <x-admin-link :href="route('parent.profile')" :active="request()->routeIs('parent.profile')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="hero__icons">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        {{ __('Profile') }}
                    </x-admin-link>


                    <x-admin-link :href="route('parent.register-profile')" :active="request()->routeIs('parent.register-profile')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="hero__icons">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        {{ __('Register Profile') }}
                    </x-admin-link>


                    <x-admin-link :href="route('profile')" :active="request()->routeIs('profile')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="hero__icons">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                        {{ __('Update Details') }}
                    </x-admin-link>
                @endcan
                {{-- admin --}}
                @can('admin')
                    {{-- nested menu --}}
                    <div>
                        <h4 class="lg:text-[20px] md:text[15px] sm:text-[12px] py-3 ">
                            {{ __('Register Users') }}
                        </h4>
                    </div>
                    <li class="mb-1" onclick="menuToggle()">
                        <a href="javascript:void(0)"
                            class="flex items-center p-2 rounded hover:bg-gray-700 lg:text-[13px] md:text[11px] sm:text-[10px]">
                            <x-heroicon-o-home class="hero__icons" />
                            <span class="ml-2">{{ __('Users') }}</span>
                        </a>
                    </li>

                    <ul id="dropdown__menu" class="hidden">
                        <li class="ml-4">
                            <x-admin-link :href="route('users.user')" :active="request()->routeIs('users.user')">
                                <x-heroicon-o-user class="hero__icons" />
                                <span>{{ __('Add New User') }}</span>
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
                    {{-- Academic  --}}
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
                    {{-- <livewire:academic.index /> --}}
                @endcan
            @endif
        </ul>
    </div>

    <div class="flex items-center justify-between dashboard__navbar" id="dashboard__navbar">
        {{-- Navbar content goes here --}}
        <div>
            <button class="burger-button" id="burgerButton" onclick="toggleSidebar()">&#9776;</button>
        </div>

        {{-- dropdown show names --}}
        <div class="dropdown" id="dropdownMenu">
            <button class="flex items-center rounded default-button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="hero__icons">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                </svg>
            </button>
            <div class="dropdown__content">
                <div class="profile__item">
                    <img src="{{ asset('css/img/logo.png') }}" alt="Profile" class="profile__image">
                    <span class="profile__name">{{ Str::ucfirst(Auth::user()->name ?? 'Ananymous') }}</span>
                </div>
                {{-- admin --}}
                @can('admin')
                    <a href="{{ route('user-profile.index') }}" wire:navigate='user-profile'>
                        {{ Str::ucfirst(Auth::user()->name ?? 'Ananymous') }}
                    </a>
                @endcan
                {{-- teacher --}}
                @can('teacher')
                    <a href="{{ route('teachers.profile') }}" wire:navigate='profile'>
                        {{ Str::ucfirst(Auth::user()->name ?? 'Ananymous') }}
                    </a>
                @endcan
                {{-- student --}}
                @can('student')
                    <a href="{{ route('user-profile.index') }}" wire:navigate='user-profile'>
                        {{ Str::ucfirst(Auth::user()->name ?? 'Ananymous') }}
                    </a>
                @endcan
                {{-- parent --}}
                @can('parent')
                    <a href="{{ route('parent.profile') }}" wire:navigate='profile'>
                        {{ Str::ucfirst(Auth::user()->name ?? 'Ananymous') }}
                    </a>
                @endcan

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
