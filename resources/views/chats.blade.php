<x-layout>
    <section class="flex h-screen gap-2">
        <!-- Sidebar -->
        <livewire:sidebar.sidebar />
        <!-- Main Content -->
        <div class="flex flex-col flex-1">
            <!-- Header without Padding -->
            <div>
                <livewire:header.header />
            </div>

            <!-- Chat Section with Padding -->
            <div class="flex flex-1 mt-3 mb-3 overflow-hidden bg-[#f3f4f6] ">
                <div class="flex-1 overflow-auto rounded shadow scrollbar-thin scrollbar-thumb scrollbar-track"
                    wire:scroll id="posts" wire:scroll="loadMore">
                    <livewire:chat.chat />
                </div>
            </div>

            <!-- Chat Input Form without Padding -->
            <div class="flex-shrink-0 p-2 bg-[#f3f4f6]">
                <livewire:chat.create />
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('livewire:load', function() {
            // Scroll chat box to the bottom
            const chatBox = document.getElementById('posts');
            chatBox.scrollTop = chatBox.scrollHeight;

            Livewire.on('messageSent', function() {
                chatBox.scrollTop = chatBox.scrollHeight;
            });
        });
    </script>
</x-layout>
