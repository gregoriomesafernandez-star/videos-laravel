@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-2 my-3 border-b-2 tracking-wider border-blue-600 text-lg font-medium text-blue-600 transition duration-250 ease-in-out'
            : 'inline-flex items-center px-2 my-3 border-b-2 text-lg tracking-wider rounded-sm font-medium text-blue-600 hover:border-blue-600 transition duration-250 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
