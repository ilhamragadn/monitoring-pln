@props(['disabled' => false])

<input type="checkbox" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-green-600 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-5 h-5',
]) !!}>
