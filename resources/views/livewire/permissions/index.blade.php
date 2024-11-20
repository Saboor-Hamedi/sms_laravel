<div class="py-2">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">

            <div class="p-6 text-gray-900 dark:text-gray-100">
                @if (session()->has('success'))
                    <div class="px-4 py-3 text-blue-700 bg-blue-100 border-t border-b border-blue-500" role="alert">
                        <p class="font-bold">Informational message</p>
                        <p class="text-sm">{{ session('success') }}.</p>
                    </div>
                @endif
                <section class="flex flex-1 w-full gap-2 mt-2 mb-2">
                    <table class="w-full border border-collapse border-gray-300 table-auto ">
                        <thead>
                            <tr class="text-xs text-center bg-gray-100">
                                <th class="px-4 py-2 border border-gray-300">Role</th>
                                <th class="px-4 py-2 border border-gray-300">Edit</th>
                                <th class="px-4 py-2 border border-gray-300">Delete</th>
                            </tr>
                        </thead>
                        <tbody class="text-xs">
                            @foreach ($permissions as $permission)
                                <tr class="text-xs text-center bg-gray-100">
                                    <td class="px-4 py-2 border border-gray-300">{{ $permission->name }}</td>

                                    <td class="px-4 py-2 border border-gray-300 ">
                                        <a class="default-button text-[10px]"
                                            href="{{ route('permissions.edit', $permission->id) }}">Edit</a>
                                    </td>
                                    <td class="px-4 py-2 border border-gray-300 ">
                                        <button type="submit" class="default-button text-[10px]"
                                            wire:click="delete({{ $permission->id }})"
                                            wire:confirm="Are you sure you want to delete this permission?">Delete</button>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
                {{ $permissions->links() }}
            </div>
        </div>
    </div>
</div>
