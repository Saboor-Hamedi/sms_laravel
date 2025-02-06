<section class="w-full p-2">
    <div class="flex flex-col gap-4 p-6 bg-white rounded-md shadow-sm lg:max-w-full">
        <div class="py-4 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <h1 class="ml-1 text-xl font-bold text-gray-800 sm:text-md">Permissions Name</h1>
        </div>
        <form wire:submit.prevent="save" class="flex flex-col gap-4">
            <!-- Name Input -->
            <div class="w-full">
                <input type="text" name="name" id="name" wire:model="name"
                    class="w-full p-3 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter permission name" />
                @error('name')
                    <small class="text-xs text-red-600">{{ $message }}</small>
                @enderror
            </div>

            <div class="flex justify-start">
                <button class="rounded default-button" type="submit">Submit</button>
                <button class="ml-2 rounded default-button" type="button" wire:click.prevent='cancel'>Cancel</button>
            </div>

        </form>
    </div>
</section>
