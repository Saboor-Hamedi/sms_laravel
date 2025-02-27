<div class="p-2">
    @section('title', 'Update Profile')
    <section class="flex flex-col gap-1 bg-white border border-gray-300 rounded-md shadow-md lg:max-w-full">
        <!-- Header -->
        <div class="flex items-center justify-between p-2 bg-gray-900 text-white lg:[22px] md:text-[18] sm:[14px]">
            <h5>Update Profile</h5>
        </div>
        <div class="flex flex-col gap-2 p-4">
            @if (session()->has('success'))
                <div class="px-4 py-3 mb-2 text-blue-700 bg-blue-100 border-t border-b border-blue-500" role="alert">
                    <p class="font-bold">Informational message</p>
                    <p class="text-sm">{{ session('success') }}</p>
                </div>
            @endif
            <form wire:submit="update">
                <div class="flex flex-col gap-4 md:flex-row">
                    {{-- NAME --}}
                    <div class="w-full">
                        <label for="lastname" class="block text-[10px] text-gray-700 ">
                            Last Name
                        </label>
                        <input type="text" wire:model="lastname" id="lastname" name="lastname"
                            placeholder="Last Name"
                            class="@error('lastname') is-invalid  @enderror w-full p-2 mt-1 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('lastname')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- COUNTRY --}}
                    <div class="w-full">
                        <label for="birthdate" class="block text-[10px] text-gray-700 ">
                            Birthdate
                        </label>
                        <input type="text" id="birthdate" name="birthdate" wire:model="birthdate"
                            placeholder="Birthdate"
                            class="@error('birthdate') is-invalid  @enderror w-full p-2 mt-1 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('country')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                {{--  --}}
                <div class="flex flex-col gap-4 md:flex-row">
                    {{-- STATE --}}
                    <div class="w-full">
                        <label for="phone" class="block text-[10px] text-gray-700 ">
                            Phone
                        </label>
                        <input type="text" id="phone" name="phone" wire:model="phone"
                            placeholder="Phone Number"
                            class="@error('phone') is-invalid  @enderror w-full p-2 mt-1 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('phone')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                    {{-- CURRENT ADDRESS --}}
                    <div class="w-full">
                        <label for="country" class="block text-[10px] text-gray-700 ">
                            Country
                        </label>
                        <input type="text" id="country" name="country" wire:model="country"
                            placeholder="Country"
                            class="@error('country') is-invalid  @enderror 
                            w-full p-2 mt-1 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('country')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                <div class="flex flex-col gap-4 md:flex-row">
                    {{-- state --}}
                    <div class="w-full">
                        <label for="state" class="block text-[10px] text-gray-700 ">
                            State
                        </label>
                        <input type="text" id="state" name="state" wire:model="state" placeholder="State"
                            class="@error('state') is-invalid  @enderror 
                            w-full p-2 mt-1 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('state')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                    {{-- ADDRESS --}}
                    <div class="w-full">
                        <label for="address" class="block text-[10px] text-gray-700 ">
                            Address
                        </label>
                        <input type="text" id="address" name="address" wire:model="address"
                            placeholder="Address"
                            class="@error('address') is-invalid  @enderror 
                            w-full p-2 mt-1 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('address')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                {{-- DESCRIPTION --}}

                <div class="w-full">
                    <label for="description" class="block text-[10px] text-gray-700 ">
                        description
                    </label>
                    <textarea wire:model="description" id="description" placeholder="About Me..."
                        class="w-full p-2 mt-1 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    @error('description')
                        <small class="text-xs text-red-600">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex justify-start gap-2">
                    <button class="rounded default-button text-[10px] mt-2 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="hero__icons">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9" />
                        </svg>
                        {{ __('Register') }}
                    </button>
                    <button class="rounded default-button text-[10px] mt-2 flex items-center" wire:click="cancel">
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

    </section>
</div>
