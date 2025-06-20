@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-white border-b-2 border-indigo-200 hover:text-indigo-200 font-medium transition'
            : 'text-white hover:text-indigo-200 font-medium transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>