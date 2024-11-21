<div class="flex gap-2 flex-col">

    @foreach ($posts as $post)
        <div class="flex flex-col gap-2 ">

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
                <div
                    class="flex flex-col  p-1 border border-gray-300 rounded-sm shadow-sm lg:max-w-full bg-white border-b-2 border-bg-gray-200">
                    <div class="mb-2">
                        <small class="text-gray-300 text-xs">{{ $post->created_at->format('H:i') }}</small>
                        <p class="font-medium text-gray-900 mt-4">{{ $post->name }}</p>
                    </div>
                    <div>
                        <button wire:click="edit({{ $post->id }})"
                            class=" rounded default-button text-[10px] ">Edit</button>
                    </div>
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
