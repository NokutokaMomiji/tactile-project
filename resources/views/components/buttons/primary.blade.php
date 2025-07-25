@props(['selected' => false])
@php
    $color = (bool) $selected ? 'bg-groc' : 'bg-white';

@endphp
<button
    {{ $attributes->merge(['class' => $color . ' flex items-center justify-center py-1 px-2 border border-black  rounded-full hover:bg-groc uppercase text-sm']) }}>
    {{ $slot }}
</button>
