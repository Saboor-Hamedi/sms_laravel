<div>
    <ul>
        <li class="mb-2" onclick="toggleNestedList(event, this)">
            <a href="" class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-300">
                <x-heroicon-m-queue-list class="w-6 text-gray-500 text-[10px]" />
                <span class="ml-2">Lists of Academic Year</span>
            </a>
        </li>

        <ul class="hidden mt-2 ml-6 custom__scroll__x" style="overflow-y: auto; max-height: 100px;">
            @if ($scores->count() > 0)
                @foreach ($scores as $score)
                    <li class="mb-2">
                        <a href="{{ route('academic.show', $score->academic->year) }}"
                            class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-300"
                            wire:navigate='overview'>
                            <i class="fas fa-eye"></i>
                            <span class="ml-2">{{ $score->academic->year ?? '' }}</span>
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>
    </ul>

    <script>
        function toggleNestedList(event, button) {
            event.preventDefault();
            const nestedList = button.nextElementSibling;
            if (nestedList.classList.contains('hidden')) {
                nestedList.classList.remove('hidden');
            } else {
                nestedList.classList.add('hidden');
            }
        }
    </script>

    <style>
        .custom__scroll__x::-webkit-scrollbar {
            width: 2px;
            height: 5px;
        }

        .custom__scroll__x::-webkit-scrollbar-track {
            background: #f3f4f6;
            border-radius: 10px;
        }

        .custom__scroll__x::-webkit-scrollbar-thumb {
            background: #000000;
            border-radius: 10px;
        }
    </style>
</div>
