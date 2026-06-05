<div class="relative w-full mb-2">

    <textarea
        rows="1"
        {{ $attributes->merge([
            'class' => 'peer w-full border-0 bg-transparent focus:outline-none focus:ring-0 -mb-4'
        ]) }}
    >{{ $slot }}</textarea>

    <span class="absolute left-0 bottom-[-12px] w-full h-[1px] bg-blue-400"></span>

    <span class="absolute left-1/2 bottom-[-12px] w-0 h-[2px] bg-blue-600 
                 transition-all duration-500 ease-out 
                 peer-focus:w-full peer-focus:left-0">
    </span>

</div>