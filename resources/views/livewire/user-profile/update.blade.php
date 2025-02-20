<x-custom-section title="Update Your Profile">
    @section('title', 'Update Profile')

    <div class="grid w-full grid-cols-1 mx-auto p-6">
        @if (session()->has('success'))
            <div class="px-4 py-3 mb-2 text-blue-700 bg-blue-100 border-t border-b border-blue-500" role="alert">
                <p class="font-bold">Informational message</p>
                <p class="text-sm">{{ session('success') }}</p>
            </div>
        @endif
        <form wire:submit.prevent="update">
            <div class="flex flex-col gap-3 md:flex-row">
                {{-- NAME --}}
                <div class="flex-1">
                    <label for="lastname" class="block text-[10px] text-gray-700 ">Last Name</label>
                    <input type="text" wire:model.defer="lastname" id="lastname" name="lastname"
                        placeholder="Last Name"
                        class="@error('lastname') is-invalid border-red-500 @enderror w-full p-2 
                         bg-white border  rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 ">
                    @error('lastname')
                        <small class="text-xs text-red-600">{{ $message }}</small>
                    @enderror
                </div>
                {{-- COUNTRY --}}
                <div class="flex-1">
                    <label for="country" class="block text-[10px] text-gray-700 ">Country</label>
                    <input type="text" id="country" name="country" wire:model.defer="country" placeholder="Country"
                        class="@error('country') is-invalid border-red-500 @enderror w-full p-2  bg-white border  rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('country')
                        <small class="text-xs text-red-600">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            {{--  --}}
            <div class="flex flex-col gap-3 mt-2 md:flex-row">
                {{-- STATE --}}
                <div class="flex-1">
                    <label for="state" class="block text-[10px] text-gray-700 ">State</label>

                    <input type="text" id="state" name="state" wire:model.defer="state" placeholder="State"
                        class="@error('state') is-invalid border-red-500 @enderror w-full p-2  bg-white border  rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('state')
                        <small class="text-xs text-red-600">{{ $message }}</small>
                    @enderror
                </div>

                {{-- CURRENT ADDRESS --}}
                <div class="flex-1">
                    <label for="address" class="block text-[10px] text-gray-700 ">Address</label>
                    <input type="text" id="address" name="address" wire:model.defer="address" placeholder="Address"
                        class=" @error('address') is-invalid border-red-500 @enderror 
                            w-full p-2 bg-white border  rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('address')
                        <small class="text-xs text-red-600">{{ $message }}</small>
                    @enderror
                </div>

            </div>
            <div class="w-full mt-2">
                <label for="description" class="block text-[10px] text-gray-700 ">Description</label>

                <textarea wire:model.defer="description" id="description" placeholder="About Me..."
                    class="w-full p-2  bg-white border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                @error('description')
                    <small class="text-xs text-red-600">{{ $message }}</small>
                @enderror
            </div>
            <div class="flex gap-2 w-ful">
                <button class="rounded default-button text-[10px] mt-2">{{ __('Register') }}</button>
                <button class="rounded default-button text-[10px] mt-2" wire:click="cancel">{{ __('Cancel') }}</button>
            </div>
            <div wire:loading.delay wire:target="update">
                <small class="text-xs text-gray-500 mt-2 text-[10px]">{{ __('Please wait...') }}</small>
            </div>
        </form>
    </div>
</x-custom-section>
