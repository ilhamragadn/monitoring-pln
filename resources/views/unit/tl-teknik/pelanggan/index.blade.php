@section('page_title', 'Data Calon Pelanggan')
<x-app-layout>
    <div class="mt-16 p-4 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <x-success-button href="{{ route('pelanggan-tl-teknik.create') }}"
                class="my-6 mr-6 float-right">{{ __('Tambah Data') }}
            </x-success-button>
            @include('unit.tl-teknik.pelanggan.tables.index-table-pasang')
        </div>
    </div>
</x-app-layout>
