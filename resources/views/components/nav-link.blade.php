@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-3  m-2 rounded-sm bg-custom-beige text-sm font-semibold text-gray-900 '
            : 'inline-flex items-center px-3 text-sm text-gray-700 hover:text-gray-900 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
