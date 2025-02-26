<x-custom-section title="Register New User">

    @section('title', 'Add New User')
    <div class=" bg-white  border-gray-200 dark:bg-gray-800 dark:border-gray-700 ">
        <small class=" text-center text-gray-600">
            This is the place where you register new users, such teacher, student, parents, etc.
        </small>
    </div>
    <div class="grid w-full grid-cols-1 mx-auto p-6">
        @if (session()->has('success'))
            <div class="px-4 py-3 mb-2 text-blue-700 bg-blue-100 border-t border-b border-blue-500" role="alert">
                <p class="font-bold">Informational message</p>
                <p class="text-sm">{{ session('success') }}</p>
            </div>
        @endif
        {{-- error --}}
        @if (session()->has('error'))
            <div class="px-4 py-3 mb-2 text-red-700 bg-red-100 border-t border-b border-blue-500" role="alert">
                <p class="font-bold">Informational message</p>
                <p class="text-sm">{{ session('error') }}</p>
            </div>
        @endif

        <form wire:submit="save">
            <div class="flex flex-col gap-2 md:flex-row">
                {{-- NAME --}}
                <div class="flex-1">
                    <label for="name" class="block text-[10px] text-gray-700 ">Name</label>
                    <input type="text" placeholder="First Name" id="name" name="name" wire:model="name"
                        class=" @error('name') is-invalid border-red-500 @enderror w-full p-2 mt-1 bg-white border  rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('name')
                        <small class="text-xs text-red-600">{{ $message }}</small>
                    @enderror
                </div>

                {{-- COUNTRY --}}

                <div class="flex-1">
                    <label for="email" class="block text-[10px] text-gray-700 ">Email</label>
                    <input type="text" placeholder="Email" id="email" wire:model="email"
                        class=" @error('email') is-invalid border-red-500 @enderror w-full p-2 mt-1 bg-white border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('email')
                        <small class="text-xs text-red-600">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            {{--  --}}
            <div class="flex flex-col gap-2 mt-2 md:flex-row">
                {{-- STATE --}}
                <div class="flex-1">
                    <label for="password" class="block text-[10px] text-gray-700 ">Password</label>

                    <input type="password" placeholder="Password" id="password" wire:model="password"
                        class="@error('password') is-invalid border-red-500 @enderror w-full p-2 mt-1 bg-white border  rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('password')
                        <small class="text-xs text-red-600">{{ $message }}</small>
                    @enderror
                </div>

                {{-- CURRENT ADDRESS --}}
                <div class="flex-1">
                    <label for="password" class="block text-[10px] text-gray-700 ">Confirm Password</label>

                    <input type="password" placeholder="Confirm Password" id='password_confirmation'
                        wire:model='password_confirmation'
                        class=" @error('password_confirmation') is-invalid border-red-500 @enderror 
                            w-full p-2 mt-1 bg-white border  rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('password_confirmation')
                        <small class="text-xs text-red-600">{{ $message }}</small>
                    @enderror
                </div>

            </div>
            {{-- PERMISSIONS --}}
            <div class="flex-1 mt-2">
                <label for="permission_name" class="block text-[10px] text-gray-700 ">Rule</label>
                <select wire:model="permission_name" id="permission_name" name="permission_name"
                    class="w-full p-2 mt-1 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="0">Select A Role</option>
                    @if ($permissions->isNotEmpty())
                        @foreach ($permissions as $id => $name)
                            <option value="{{ $name }}">{{ $name }}</option>
                        @endforeach
                    @else
                        <option value="">No permissions available</option>
                    @endif
                </select>
                @error('permission_name')
                    <small class="text-xs text-red-600">{{ $message }}</small>
                @enderror
            </div>
            {{-- BUTTONS --}}
            <div class="flex w-ful gap-2 mt-2">
                <button class="rounded default-button text-[10px] "
                    wire:loading.attr="disabled">{{ __('Save') }}</button>
                <button class="rounded default-button text-[10px] " wire:loading.attr="disabled"
                    wire:click="cancel">{{ __('Cancel') }}
                </button>
            </div>
            <div wire:loading wire:target="save">
                <small class="text-xs text-gray-500 mt-2 text-[10px]">{{ __('Please wait...') }}</small>
            </div>
        </form>
    </div>

</x-custom-section>
