<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'inline-flex items-center px-4 py-2 
                    bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-white
                    border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest  
                    hover:bg-gray-200 dark:hover:bg-gray-700 
                    focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 
                    transition ease-in-out duration-150',
    ]) }}>
    {{ $slot }}
</button>
