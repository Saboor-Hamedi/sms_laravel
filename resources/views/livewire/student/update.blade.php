<x-custom-section title="Update Your Profile">
    @section('title', 'Update Profile')

    <div class="grid w-full grid-cols-1 p-6 mx-auto">
        @if (session()->has('success'))
            <div class="px-4 py-3 mb-2 text-blue-700 bg-blue-100 border-t border-b border-blue-500" role="alert">
                <p class="font-bold">Informational message</p>
                <p class="text-sm">{{ session('success') }}</p>
            </div>
        @endif
        <form wire:submit="update">
            <div class="flex flex-col gap-3 md:flex-row">
                {{-- NAME --}}
                <div class="flex-1">
                    <label for="lastname" class="block text-[10px] text-gray-700 ">Last Name</label>
                    <input type="text" wire:model="lastname" id="lastname" name="lastname" placeholder="Last Name"
                        class="@error('lastname') is-invalid border-red-500 @enderror w-full p-2 mt-1 bg-white border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 ">
                    @error('lastname')
                        <small class="text-xs text-red-600">{{ $message }}</small>
                    @enderror
                </div>
                {{-- COUNTRY --}}
                <div class="flex-1">
                    <label for="country" class="block text-[10px] text-gray-700 ">Country</label>
                    <input type="text" id="country" name="country" wire:model="country" placeholder="Country"
                        class="@error('country') is-invalid border-red-500 @enderror w-full p-2 mt-1 bg-white border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
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

                    <input type="text" id="state" name="state" wire:model="state" placeholder="State"
                        class="@error('state') is-invalid border-red-500 @enderror w-full p-2 mt-1 bg-white border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('state')
                        <small class="text-xs text-red-600">{{ $message }}</small>
                    @enderror
                </div>

                {{-- CURRENT ADDRESS --}}
                <div class="flex-1">
                    <label for="address" class="block text-[10px] text-gray-700 ">Address</label>
                    <input type="text" id="address" name="address" wire:model="address" placeholder="Address"
                        class=" @error('address') is-invalid border-red-500 @enderror 
                            w-full p-2 mt-1 bg-white border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('address')
                        <small class="text-xs text-red-600">{{ $message }}</small>
                    @enderror
                </div>

            </div>
            <div class="w-full mt-2">
                <label for="description" class="block text-[10px] text-gray-700 ">Description</label>

                <textarea wire:model="description" id="description" placeholder="About Me..."
                    class="w-full p-2 mt-1 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                @error('description')
                    <small class="text-xs text-red-600">{{ $message }}</small>
                @enderror
            </div>
            <div class="flex gap-2 w-ful">
                <button class="rounded default-button text-[10px] mt-2 flex justify-center items-center" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="hero__icons">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>

                    {{ __('Update') }}</button>
                <button class="rounded default-button text-[10px] mt-2 flex justify-center items-center"
                    wire:click="cancel" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="hero__icons">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                    {{ __('Cancel') }}
                </button>
            </div>
            <div wire:loading.delay wire:target="update">
                <small class="text-xs text-gray-500 mt-2 text-[10px]">{{ __('Please wait...') }}</small>
            </div>
        </form>
    </div>
</x-custom-section>
