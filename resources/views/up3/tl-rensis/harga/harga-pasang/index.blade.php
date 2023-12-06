@section('page_title', 'Data Harga Pasang')
<x-app-layout>
    <div class="mt-16 p-4 ">
        <div
            class="max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-hidden sm:rounded-lg p-4 my-1 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <x-success-button href="{{ route('hargapasang-tl-rensis.create') }}"
                class="my-6 mr-6 float-right">{{ __('Tambah Data') }}
            </x-success-button>
            @include('up3.tl-rensis.harga.harga-pasang.tables.index-harga-pasang')
        </div>
    </div>
</x-app-layout>
