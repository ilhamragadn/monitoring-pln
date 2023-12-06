@props(['messages'])

@if ($messages && is_array($messages))
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400 space-y-1']) }}>
        @foreach ($messages as $Message)
            @if (is_array($Message))
                @foreach ($Message as $message)
                    <li>{{ $message }}</li>
                @endforeach
            @else
                <li>{{ $Message }}</li>
            @endif
        @endforeach
    </ul>
@endif
