<div class="w-full border rounded">
    <form wire:submit.prevent="save">
        <textarea wire:model.defer="name" id="name" class="w-full p-2 rounded resize-none"
            placeholder="Type your message here..." @keydown.enter.exact.prevent="save()">
        </textarea>
    </form>

    @script
        <script>
            document.getElementById("name").addEventListener("keypress", e => {
                if (e.key === "Enter" && !e.shiftKey) {
                    e.preventDefault();
                    @this.save();
                }
            });

            Livewire.on('posts-updated', () => {
                setTimeout(() => {
                    const postsContainer = document.querySelector('[x-ref=postsContainer]');
                    postsContainer.scrollTop = postsContainer.scrollHeight;
                }, 100);
            });
        </script>
    @endscript
</div>
