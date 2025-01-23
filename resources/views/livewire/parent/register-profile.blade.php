<section class="w-full p-2">
    <div class="flex flex-col flex-1 gap-2">
        <div class="flex flex-col gap-4 p-4 border rounded-md shadow-md lg:max-w-full">
            {{-- Flash message --}}
            @if (session()->has('success'))
                <div class="px-4 py-3 text-blue-700 bg-blue-100 border-t border-b border-blue-500" role="alert">
                    <p class="font-bold">Informational message</p>
                    <p class="text-[10px]">{{ session('success') }}.</p>
                </div>
            @endif
            @if (session()->has('error'))
                <div class="px-4 py-3 text-red-700 bg-blue-100 border-t border-b border-red-500" role="alert">
                    <p class="font-bold">Informational message</p>
                    <p class="text-[10px]">{{ session('error') }}.</p>
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
                    <button class="rounded default-button" type="submit">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
