@section('page_title', 'Data Calon Pelanggan')
<x-app-layout>

    <div
        class="max-w-7xl mx-auto mb-6 p-2 sticky top-16 sm:px-6 lg:px-8 bg-sky-200 overflow-hidden shadow sm:rounded-lg border-sky-800 dark:border-sky-800 dark:bg-sky-200">
        <div class="flex">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="w-6 h-6 float-left mb-1 mr-1 text-sky-800 dark:text-sky-800">
                <path fill-rule="evenodd"
                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z"
                    clip-rule="evenodd" />
            </svg>
            <p class="mt-1 font-medium text-sm text-sky-800 dark:text-sky-800">
                Data calon pelanggan berikut ini adalah data yang telah dibuat oleh TL Rensis atau TL Teknik
                dengan
                persetujuan Manager Unit.
            </p>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <x-success-button href="{{ route('pelanggan-tl-rensis.create') }}"
            class="my-6 mr-6 float-right">{{ __('Tambah Data') }}
        </x-success-button>
        @include('up3.tl-rensis.pelanggan.tables.index-table-pasang')
    </div>
</x-app-layout>
