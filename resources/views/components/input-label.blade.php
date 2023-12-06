@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-base text-gray-900 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
