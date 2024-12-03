<x-app-layout>

    <section class="w-full p-2 flex flex-col gap-2 ">
        <div class="  bg-white rounded-sm shadow-sm p-2 dark:bg-gray-800">
            <div class="max-w-full">
                <livewire:profile.update-profile-information-form />
            </div>
        </div>

        <div class="  bg-white rounded-sm shadow-sm p-2 dark:bg-gray-800">
            <div class="max-w-full">
                <livewire:profile.update-password-form />
            </div>
        </div>

        <div class="  bg-white rounded-sm shadow-sm p-2 dark:bg-gray-800">
            <div class="max-w-full">
                <livewire:profile.delete-user-form />
            </div>
        </div>
    </section>
</x-app-layout>
