@props(['selected' => false, 'variant' => 'default'])
@php
    $colors = [
        'default' => $selected ? 'bg-groc' : 'bg-white',
        'create' => 'bg-blue-500 hover:bg-blue-600 text-white'
    ];
    $color = $colors[$variant] ?? $colors['default'];
@endphp

<a
    {{ $attributes->merge(['class' =>  $color . ' flex items-center justify-center py-1 px-2 border border-black rounded-full uppercase text-sm']) }}>
    {{ $slot }}
</a>
