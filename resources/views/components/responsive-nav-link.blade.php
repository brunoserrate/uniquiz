@props(['active'])

@php
$classes = ($active ?? false)
            ? 'pl-3 pr-4 py-2 hover:bg-uni_primary hover:text-white rounded-full w-full text-left'
            : 'pl-3 pr-4 py-2 hover:bg-uni_primary hover:text-white rounded-full w-full text-left';
@endphp

<button {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>
