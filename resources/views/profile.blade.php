<x-app-layout>
    @include('components.header')
    <!-- Sidebar -->
    @include('components.sidebar')
    <div class="main-content">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8 ">
            <div class="p-4 shadow sm:p-8 dark:text-white sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            <div class="p-4 shadow sm:p-8 dark:text-white sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.update-password-form />
                </div>
            </div>

            <div class="p-4 shadow sm:p-8 dark:text-white sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.delete-user-form />
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
</x-app-layout>
