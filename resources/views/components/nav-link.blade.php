@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'text-white no-underline border-b-2 border-indigo-400 text-[#01cbe1] focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'text-white no-underline border-b-2 border-transparent hover:text-[#01cbe1] hover:border-gray-300 focus:outline-none focus:text-[#01cbe1] focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
