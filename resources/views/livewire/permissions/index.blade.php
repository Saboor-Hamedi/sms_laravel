<div class="py-2">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">

            <div class="px-6 py-4 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <h1 class="ml-1 text-xl font-bold text-gray-800 sm:text-md">Permissions Name</h1>
            </div>
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @if (session()->has('success'))
                    <div class="px-4 py-3 text-blue-700 bg-blue-100 border-t border-b border-blue-500" role="alert">
                        <p class="font-bold">Informational message</p>
                        <p class="text-sm">{{ session('success') }}.</p>
                    </div>
                @endif
                <section class="flex flex-1 w-full gap-2 mt-2 mb-2">
                    @if ($permissions->count() > 0)
                        <table class="w-full border border-collapse border-gray-300 table-auto ">
                            <thead>
                                <tr class="text-xs text-center bg-gray-100">
                                    <th class="px-4 py-2 border border-gray-300">Role</th>
                                    <th class="px-4 py-2 border border-gray-300">Create</th>
                                    <th class="px-4 py-2 border border-gray-300">Edit</th>
                                    <th class="px-4 py-2 border border-gray-300">Delete</th>
                                </tr>
                            </thead>
                            @foreach ($permissions as $permission)
                                <tbody class="text-xs">
                                    <tr class="text-xs text-center bg-gray-100">
                                        <td class="px-4 py-2 border border-gray-300">{{ $permission->name }}</td>

                                        <td class="px-4 py-2 border border-gray-300 ">
                                            <a class="default-button text-[10px] rounded"
                                                href="{{ route('permissions.create') }}"
                                                wire:navigate="permissions.create">Create</a>
                                        </td>
                                        <td class="px-4 py-2 border border-gray-300 ">
                                            <a class="default-button text-[10px] rounded"
                                                href="{{ route('permissions.edit', $permission->id) }}">Edit</a>
                                        </td>
                                        <td class="px-4 py-2 border border-gray-300 ">
                                            <button type="submit" class="default-button text-[10px] rounded"
                                                wire:click="delete({{ $permission->id }})"
                                                wire:confirm="Are you sure you want to delete this permission?">Delete</button>
                                        </td>

                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="flex items-center justify-center">
                            <p class="text-center text-gray-500">No permissions found.</p>
                        </div>
                    @endif
                </section>
                {{ $permissions->links() }}
            </div>
        </div>
    </div>
</div>
