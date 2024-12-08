<div class="p-2">
    @section('title', 'Add New Student')
    <section class="w-full p-2 bg-white shadow-sm dark:bg-gray-800">
        @if (session()->has('success'))
            <div class="px-4 py-3 mb-2 text-blue-700 bg-blue-100 border-t border-b border-blue-500" role="alert">
                <p class="font-bold">Informational message</p>
                <p class="text-sm">{{ session('success') }}</p>
            </div>
        @endif
        <div class="grid w-full grid-cols-1 mx-auto">
            <form wire:submit.prevent="save">
                <div class="flex flex-col gap-3 md:flex-row">
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
                <div class="flex flex-col gap-3 mt-4 md:flex-row">
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
                <div class="flex w-ful gap-2">
                    <button class="rounded default-button text-[10px] mt-2">{{ __('Register') }}</button>
                    <button class="rounded default-button text-[10px] mt-2"
                        wire:click="cancel">{{ __('Cancel') }}</button>
                </div>
            </form>
        </div>

    </section>
</div>
