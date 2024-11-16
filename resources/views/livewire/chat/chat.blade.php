<div>
    @foreach ($posts as $post)
        <div class="p-4 mt-2 transition-shadow duration-300 ease-in-out shadow-md hover:shadow-sm">
            @if ($editingPostId === $post->id)
                <form wire:submit.prevent="save" class="space-y-4">
                    <textarea wire:model.defer="editingPostContent" id="name"
                        class="w-full p-3 bg-gray-100 border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Type your message here..."></textarea>
                    <div class="flex space-x-2">
                        <button type="submit" class="px-4 py-2 rounded default-button ">Update</button>
                        <button type="button" onclick="cancelEdit()"
                            class="px-4 py-2 ml-2 rounded default-button ">Cancel</button>
                    </div>
                </form>
            @else
                <div class="flex items-center justify-between ">
                    <div>
                        <p class="font-medium text-gray-900">{{ $post->name }}</p>
                        <span class="text-sm text-gray-500">{{ $post->created_at->format('H:i') }}</span>
                    </div>
                    <button wire:click="edit({{ $post->id }})" class="px-4 py-2 default-button ">Edit</button>
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
