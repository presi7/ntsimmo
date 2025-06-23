@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-nts-cyan text-sm font-medium leading-5 text-nts-blue-dark dark:text-nts-cyan focus:outline-none focus:border-nts-cyan transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-nts-blue-dark dark:text-nts-cyan hover:text-nts-cyan dark:hover:text-nts-cyan hover:border-nts-cyan focus:outline-none focus:text-nts-cyan focus:border-nts-cyan transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
