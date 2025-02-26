<section class="w-full p-2">
    <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="container p-4 mx-auto">
                <h2 class="mb-4 text-2xl font-bold">Manage User Roles and Permissions</h2>

                @if (session()->has('message'))
                    <div class="p-2 mb-4 text-green-800 bg-green-100">
                        {{ session('message') }}
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="p-2 mb-4 text-red-800 bg-red-100">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="mb-4">
                    <label for="email" class="block text-gray-700">User Email:</label>
                    <input type="email" id="email" wire:model.live="email" placeholder='Enter user email'
                        class="w-full p-2 border border-gray-300 rounded">
                    @error('email')
                        <small class="text-xs text-red-600">{{ $message }}</small>
                    @enderror
                    <button wire:click="rolesAndPermissions" class="mt-2 rounded default-button">
                        Load Roles & Permissions</button>
                </div>

                <div class="flex flex-row max-w-full gap-3 ">
                    <div class="mb-4">
                        <h3 class="mb-2 text-xl font-bold">Roles</h3>
                        @foreach ($roles as $id => $roleName)
                            <label class="block">
                                <input type="checkbox" wire:click="toggleRole('{{ $roleName }}')"
                                    @if (in_array($roleName, $userRoles)) checked @endif>
                                {{ $roleName }}
                            </label>
                        @endforeach
                    </div>

                    <div class="mb-4">
                        <h3 class="mb-2 text-xl font-bold">Permissions</h3>
                        @foreach ($permissions as $id => $permissionName)
                            <label class="block">
                                <input type="checkbox" wire:click="togglePermission('{{ $permissionName }}')"
                                    @if (in_array($permissionName, $userPermissions)) checked @endif>
                                {{ $permissionName }}
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
