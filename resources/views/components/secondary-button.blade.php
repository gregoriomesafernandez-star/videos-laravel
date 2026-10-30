<a {{ $attributes->merge(['type' => 'button', 'class' => '
                                                        inline-flex flex-row items-center justify-center gap-2
                                                        text-base font-medium
                                                        border border-gray-500 rounded-sm
                                                        px-5 py-2
                                                        text-gray-500
                                                        cursor-pointer
                                                        transition-all duration-300 ease-in-out
                                                        hover:text-white
                                                        hover:border-gray-700
                                                        hover:bg-gray-700
                                                        hover:shadow-md
                                                        active:scale-95'
                        ]) }}>
    {{ $slot }}
</a>
