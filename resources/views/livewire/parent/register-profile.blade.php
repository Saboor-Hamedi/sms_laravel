<section class="w-full p-2">
    <div class="flex flex-col flex-1 gap-2">
        <div class="flex flex-col gap-4 p-4 border rounded-md shadow-md lg:max-w-full">
            {{-- Flash message --}}
            @if (session('status'))
                <div
                    class="p-3 mb-4 border rounded-lg
                    {{ session('status.type') === 'success' ? 'bg-green-100 border-green-500 text-green-700' : '' }}
                        {{ session('status.type') === 'error' ? 'bg-red-100 border-red-500 text-red-700' : '' }}">
                    <p class="font-bold">{{ session('status.type') === 'success' ? '✓' : '!' }}
                        {{ session('status.message') }}
                    </p>
                </div>
            @endif
            <form class="flex flex-col gap-2" wire:submit.prevent="save">
                <!-- First Row -->
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div class="w-full">
                        <label for="lastname" class="block  text-[10px] font-medium text-gray-700">
                            Last Name
                        </label>
                        <input type="text" wire:model='lastname' id="lastname" name="lastname"
                            class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Your Lastname">
                        @error('lastname')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="phone" class="block text-[10px] font-medium text-gray-700">
                            Phone
                        </label>
                        <input type="text" wire:model='phone' id="phone" name="phone"
                            class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Your Phone Number">
                        @error('phone')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <!-- Average -->
                <div class="w-full">
                    <label for="address" class="block  text-[10px] font-medium text-gray-700">Address</label>
                    <input type="text" wire:model='address' id="address" name="address"
                        class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Your Address">
                    @error('address')
                        <small class="text-xs text-red-600">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Report -->
                <div class="w-full">
                    <label for="bio" class="block text-[10px] font-medium text-gray-700">Bio</label>
                    <textarea wire:model='bio' id="bio" name="bio"
                        class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Your Bio">
                    </textarea>
                    @error('bio')
                        <small class="text-xs text-red-600">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex justify-start gap-2">
                    <button class="rounded default-button flex items-center" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class=" hero__icons">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9" />
                        </svg>
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
