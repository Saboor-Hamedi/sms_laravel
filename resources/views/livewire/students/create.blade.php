<div class="p-2">
    <section class="w-full p-2 bg-white shadow-sm dark:bg-gray-800">
        <div class="grid w-full grid-cols-1 mx-auto">
            <form wire:submit.prevent="save">
                <div class="flex flex-col gap-3 md:flex-row">
                    {{-- NAME --}}
                    <div class="flex-1">
                        <input type="text" placeholder="Last Name" id="lastname" name="lastname"
                            wire:model.defer="lastname"
                            class=" @error('lastname') is-invalid border-red-500 @enderror w-full p-2 bg-white border  rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 ">
                        @error('lastname')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- COUNTRY --}}

                    <div class="flex-1">
                        <input type="text" placeholder="Country" id="country" wire:model.defer="country"
                            class=" @error('country') is-invalid border-red-500 @enderror w-full p-2 bg-white border  rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('country')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                {{--  --}}
                <div class="flex flex-col gap-3 mt-4 md:flex-row">
                    {{-- STATE --}}
                    <div class="flex-1">
                        <input type="text" placeholder="Stete" id="state" wire:model.defer="state"
                            class="@error('country') is-invalid border-red-500 @enderror w-full p-2 bg-white rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('state')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- CURRENT ADDRESS --}}
                    <div class="flex-1">
                        <input type="text" placeholder="Current Address" id='address' wire:model.defer='address'
                            class=" @error('country') is-invalid border-red-500 @enderror 
                            w-full p-2 bg-white rounded-lg resize-none focus:outline-none 
                            focus:ring-2 focus:ring-blue-500">
                        @error('address')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="flex w-ful">
                    <button class="rounded default-button text-[10px] mt-2">Save student</button>
                </div>
            </form>
        </div>

    </section>
</div>
