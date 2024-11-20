<div>
    @foreach ($posts as $post)
        <div class="p-4 transition-shadow duration-300 ease-in-out shadow-md hover:shadow-sm">
            @if ($editingPostId === $post->id)
                <form wire:submit.prevent="save" class="space-y-1">
                    <textarea wire:model.defer="editingPostContent" id="name" placeholder="Edit the message..."></textarea>
                    <div class="flex space-x-2">
                        <button type="submit" class="rounded default-button text-[10px]">Update</button>
                        <button type="button" onclick="cancelEdit()"
                            class="ml-2 rounded default-button text-[10px]">Cancel</button>
                    </div>
                </form>
            @else
                <div class="flex items-center justify-between ">
                    <div>
                        <p class="font-medium text-gray-900">{{ $post->name }}</p>
                        <span class="text-sm text-gray-500">{{ $post->created_at->format('H:i') }}</span>
                    </div>
                    <button wire:click="edit({{ $post->id }})" class=" default-button text-[10px] ">Edit</button>
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
