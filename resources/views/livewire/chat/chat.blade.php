<div class="flex flex-col gap-4 p-4 bg-gray-100">

    @foreach ($posts as $post)
        <div class="flex flex-col gap-4 p-4 bg-white border border-gray-200 rounded-md shadow-md">


            @if ($editingPostId === $post->id)
                <form wire:submit.prevent="save" class="space-y-2">
                    <textarea wire:model.defer="name" id="name" placeholder="Edit the message..."
                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"></textarea>
                    @error('name')
                        <small class="text-xs text-red-600">{{ $message }}</small>
                    @enderror
                    <div class="flex justify-end space-x-2">
                        <button type="submit" class="px-4 py-2 rounded default-button text-[10px]">Update</button>
                        <button type="button" onclick="cancelEdit()"
                            class="px-4 py-2 default-button rounded text-[10px]">Cancel</button>
                    </div>
                </form>
            @else
                <div>
                    <div class="flex items-center justify-between mb-2">

                        <small class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</small>
                        @if (Auth::check())
                            <button wire:click="edit({{ $post->id }})"
                                class="px-2 py-1 default-button rounded text-[10px]">Edit</button>
                        @endif
                    </div>
                    <p class="text-gray-900">{{ $post->name }}</p>
                    <small class="text-xs text-gray-500">{{ $post->user->name }}</small>
                </div>
            @endif
        </div>
    @endforeach
    <script>
        function cancelEdit() {
            @this.call('cancel');
        }
    </script>

</div>
