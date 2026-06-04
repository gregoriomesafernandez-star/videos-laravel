<button {{ $attributes->merge(['type' => 'submit', 'class' => '
                                            inline-flex justify-center items-center w-full py-4
                                            bg-blue-700 text-white
                                            font-semibold text-xs uppercase tracking-widest
                                            hover:bg-blue-600
                                            focus:ring-2 focus:ring-indigo-500
                                            transition ease-in-out duration-300'
                             ]) }}>
    {{ $slot }}
</button>
