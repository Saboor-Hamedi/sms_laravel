<div class="py-2">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="container mx-auto p-4">
                    <h2 class="text-2xl font-bold mb-4">Manage User Roles and Permissions</h2>

                    @if (session()->has('message'))
                        <div class="bg-green-100 text-green-800 p-2 mb-4">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if (session()->has('error'))
                        <div class="bg-red-100 text-red-800 p-2 mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">User Email:</label>
                        <input type="email" id="email" wire:model="email"
                            class="w-full p-2 border border-gray-300 rounded">
                        @error('email')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                        <button wire:click="rolesAndPermissions"
                            class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Load Roles & Permissions</button>
                    </div>

                    <div class="flex flex-row gap-3 max-w-full ">
                        <div class="mb-4">
                            <h3 class="text-xl font-bold mb-2">Roles</h3>
                            @foreach ($roles as $role)
                                <label class="block">
                                    <input type="checkbox" wire:click="toggleRole('{{ $role->name }}')"
                                        @if (in_array($role->name, $userRoles)) checked @endif>

                                    {{ $role->name }}
                                </label>
                            @endforeach
                        </div>

                        <div class="mb-4">
                            <h3 class="text-xl font-bold mb-2">Permissions</h3>
                            @foreach ($permissions as $permission)
                                <label class="block">
                                    <input type="checkbox" wire:click="togglePermission('{{ $permission->name }}')"
                                        @if (in_array($permission->name, $userPermissions)) checked @endif>
                                    {{ $permission->name }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
