<div>
    <section class="w-full p-4">
        <div class="flex flex-col gap-4 p-6 border border-gray-300 rounded-md shadow-md lg:max-w-full">
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
                    <button class="ml-2 rounded default-button" type="button"
                        wire:click.prevent='cancel'>Cancel</button>
                </div>

            </form>
        </div>
    </section>
</div>
