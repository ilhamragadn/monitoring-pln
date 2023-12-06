<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/dashboard_table.js', 'resources/js/index_table_hargapasang.js', 'resources/js/table_hargabongkar.js', 'resources/js/index_table_pelangganpasang.js', 'resources/js/create_table_pelangganpasang.js', 'resources/js/show_table_pelangganpasang.js', 'resources/js/edit_table_pelangganpasang.js'])

        <script>
            const base_url = '{{ url('') }}';
            const web_token = '{{ csrf_token() }}';
        </script>
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-400 dark:bg-gray-900">
            @include('layouts.navigation')

            {{-- <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}

            <!-- Page Content -->
            <main class="p-2 sm:ml-64">
                {{ $slot }}
            </main>
        </div>

    </body>

</html>
