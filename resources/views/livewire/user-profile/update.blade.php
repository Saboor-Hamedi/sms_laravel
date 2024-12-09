<div class="p-2">
    @section('title', 'Update Profile')
    <section class="w-full p-2 bg-white shadow-sm dark:bg-gray-800">
        @if (session()->has('success'))
            <div class="px-4 py-3 mb-2 text-blue-700 bg-blue-100 border-t border-b border-blue-500" role="alert">
                <p class="font-bold">Informational message</p>
                <p class="text-sm">{{ session('success') }}</p>
            </div>
        @endif
        <div class="grid w-full grid-cols-1 mx-auto">
            <form wire:submit.prevent="update">
                <div class="flex flex-col gap-3 md:flex-row">
                    {{-- NAME --}}
                    <div class="flex-1">
                        <input type="text" wire:model.defer="lastname" id="lastname" name="lastname"
                            placeholder="Last Name"
                            class="@error('lastname') is-invalid border-red-500 @enderror w-full p-2 bg-white border  rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 ">
                        @error('lastname')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- COUNTRY --}}

                    <div class="flex-1">
                        <input type="text" id="country" name="country" wire:model.defer="country"
                            placeholder="Country"
                            class="@error('country') is-invalid border-red-500 @enderror w-full p-2 bg-white border  rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('country')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                {{--  --}}
                <div class="flex flex-col gap-3 mt-4 md:flex-row">
                    {{-- STATE --}}
                    <div class="flex-1">
                        <input type="text" id="state" name="state" wire:model.defer="state" placeholder="State"
                            class="@error('state') is-invalid border-red-500 @enderror w-full p-2 bg-white rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('state')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- CURRENT ADDRESS --}}
                    <div class="flex-1">
                        <input type="text" id="address" name="address" wire:model.defer="address"
                            placeholder="Address"
                            class=" @error('address') is-invalid border-red-500 @enderror 
                            w-full p-2 bg-white rounded-lg resize-none focus:outline-none 
                            focus:ring-2 focus:ring-blue-500">
                        @error('address')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
                <div class="w-full mt-4">
                    <textarea wire:model.defer="description" id="description" placeholder="About Me..."
                        class="w-full p-2 bg-white rounded-lg resize-none focus:outline-none "></textarea>
                    @error('description')
                        <small class="text-xs text-red-600">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex w-ful gap-2">
                    <button class="rounded default-button text-[10px] mt-2">{{ __('Register') }}</button>
                    <button class="rounded default-button text-[10px] mt-2"
                        wire:click="cancel">{{ __('Cancel') }}</button>
                </div>
            </form>
        </div>

    </section>
</div>
