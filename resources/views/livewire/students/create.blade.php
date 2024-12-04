<div class="py-2">
    <section class="w-full p-2 bg-white shadow-sm dark:bg-gray-800">

        <div class="grid w-full grid-cols-1 mx-auto">
            <form wire:submit.prevent="save">
                <div class="flex flex-col gap-3 md:flex-row">
                    {{-- NAME --}}
                    <div class="flex-1">
                        <input type="text" placeholder="Enter Name" id="name" wire:model.defer="name"
                            class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('name')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- LAST NAME --}}

                    <div class="flex-1">
                        <input type="text" placeholder="Last Name" id="name" wire:model.defer="name"
                            class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('name')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                {{--  --}}
                <div class="flex flex-col gap-3 mt-4 md:flex-row">
                    {{-- NAME --}}
                    <div class="flex-1">
                        <input type="text" placeholder="Enter Name" id="name" wire:model.defer="name"
                            class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('name')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- LAST NAME --}}

                    <div class="flex-1">
                        <input type="text" placeholder="Last Name" id="name" wire:model.defer="name"
                            class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('name')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </form>
        </div>

    </section>
</div>
