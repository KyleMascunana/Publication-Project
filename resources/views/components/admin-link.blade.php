@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block py-2 mt-2 pl-4 text-sm text-white bg-transparent hover:text-black-700 rounded-lg dark:bg-blue-700 dark:hover:bg-blue-600 dark:focus:bg-blue-600 dark:focus:text-white dark:hover:text-white dark:text-blue-200 hover:text-blue-900 focus:text-blue-900 hover:bg-blue-200 focus:bg-blue-200 focus:outline-none focus:shadow-outline'
            : 'block py-2 mt-2 pl-4 text-sm text-white bg-transparent hover:text-black-700 rounded-lg dark:bg-blue-700 dark:hover:bg-blue-600 dark:focus:bg-blue-600 dark:focus:text-white dark:hover:text-white dark:text-blue-200 hover:text-blue-900 focus:text-blue-900 hover:bg-blue-200 focus:bg-blue-200 focus:outline-none focus:shadow-outline';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
