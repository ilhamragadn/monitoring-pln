@props(['disabled' => false])

@php
    $valueToday = now()->format('Y-m-d');
@endphp

<input type="date" value="{{ $valueToday }}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 dark:focus:bg-gray-300 dark:focus:text-gray-900 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm',
]) !!}>
