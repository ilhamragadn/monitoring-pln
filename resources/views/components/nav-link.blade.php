@props(['active'])

@php
    $classes = $active ?? false ? 'bg-gray-100 dark:bg-gray-900 rounded-md flex items-center px-1 pt-1 border-b-2 border-indigo-400 dark:border-red-700 text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out' : 'flex items-center px-1 pt-1 border-b-2 rounded-md dark:border-yellow-400 text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 dark:bg-gray-700 hover:bg-gray-700 hover:dark:bg-gray-900 hover:rounded-md hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
