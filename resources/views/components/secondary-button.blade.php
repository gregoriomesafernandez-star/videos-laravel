<a {{ $attributes->merge(['type' => 'button', 'class' => 'text-lg font-medium border border-gray-500 rounded-sm 
                                                                px-5 py-1  mr-5 text-gray-500 
                                                                transition duration-350 ease-in-out 
                                                                hover:text-white hover:border-white hover:bg-gray-400']) }}>
    {{ $slot }}
</a>
