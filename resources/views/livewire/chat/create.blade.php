<div class="w-full ">
    <form wire:submit="save">

        <textarea wire:model="name" id="name" placeholder="Type your message here..."
            @keydown.enter.exact.prevent="save()">
        </textarea>
        @if (session()->has('error'))
            <small class="text-red-500 text-[8px] text-center">{{ session('error') }}</small>
        @endif
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
