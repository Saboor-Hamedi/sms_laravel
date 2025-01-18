<div class="p-2">
    @section('title', 'Add New User')

    <section class="w-full p-2 bg-white shadow-sm dark:bg-gray-800">
        <div class="py-4 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700 mb-3">
            <h1 class="ml-1 text-xl font-bold text-gray-800 sm:text-md">Register New User</h1>
            <p>
                <span class="mr-2 font-bold text-gray-600">#NOTE</span>
                <small class="ml-5 text-gray-600">
                    This is the place where you register new users, such teacher, student, parents, etc.
                </small>
            </p>
        </div>
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
        <div class="grid w-full grid-cols-1 mx-auto">
            <form wire:submit.prevent="save">
                <div class="flex flex-col gap-2 md:flex-row">
                    {{-- NAME --}}
                    <div class="flex-1">
                        <input type="text" placeholder="First Name" id="name" name="name"
                            wire:model.defer="name"
                            class=" @error('name') is-invalid border-red-500 @enderror w-full p-2 bg-white border  rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 ">
                        @error('name')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- COUNTRY --}}

                    <div class="flex-1">
                        <input type="text" placeholder="Email" id="email" wire:model.defer="email"
                            class=" @error('email') is-invalid border-red-500 @enderror w-full p-2 bg-white border  rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('email')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                {{--  --}}
                <div class="flex flex-col gap-2 mt-2 md:flex-row">
                    {{-- STATE --}}
                    <div class="flex-1">
                        <input type="password" placeholder="Password" id="password" wire:model.defer="password"
                            class="@error('password') is-invalid border-red-500 @enderror w-full p-2 bg-white rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('password')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- CURRENT ADDRESS --}}
                    <div class="flex-1">
                        <input type="password" placeholder="Confirm Password" id='password_confirmation'
                            wire:model.defer='password_confirmation'
                            class=" @error('password_confirmation') is-invalid border-red-500 @enderror 
                            w-full p-2 bg-white rounded-lg resize-none focus:outline-none 
                            focus:ring-2 focus:ring-blue-500">
                        @error('password_confirmation')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
                {{-- PERMISSIONS --}}
                <div class="flex-1 mt-2">
                    <select wire:model.defer="permission_name" id="permission_name" name="permission_name"
                        class="w-full p-2 bg-white border rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500">
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

    </section>
</div>
