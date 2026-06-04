

<div class="relative w-full mb-2">

    <input
        {{ $attributes->merge([
            'class' => 'peer w-full border-0 border-b border-gray-300 bg-transparent focus:outline-none focus:ring-0 py-2'
        ]) }}
    >

    <!-- línea base -->
    <span class="absolute left-0 bottom-0 w-full h-[1px] bg-blue-400"></span>

    <!-- línea animada -->
    <span class="absolute left-1/2 bottom-0 w-0 h-[2px] bg-blue-600 
                 transition-all duration-500 ease-out 
                 peer-focus:w-full peer-focus:left-0">
    </span>

</div>