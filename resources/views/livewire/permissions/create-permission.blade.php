<div class="p-2">
    <section class="flex flex-col gap-1 bg-white border border-gray-300 rounded-md shadow-md lg:max-w-full">
        <div class="flex items-center justify-between p-2 bg-gray-900 ">
            <h5 class="text-white lg:[22px] md:text-[18] sm:[14px]">Permissions Name</ht>
        </div>
        <div class="p-2 flex flex-col gap-2">
            <form wire:submit.prevent="save">
                <div class="w-full">
                    <input type="text" name="name" id="name" wire:model="name"
                        class="w-full p-2 mt-1 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter permission name" />
                    @error('name')
                        <small class="text-xs text-red-600">{{ $message }}</small>
                    @enderror
                </div>

                <div class="flex justify-start mt-2">
                    <button class="rounded default-button flex justify-center items-center" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9" />
                        </svg>
                        Save
                    </button>
                    <button class="ml-2 rounded default-button flex justify-center items-center" type="button"
                        wire:click.prevent='cancel'>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>
