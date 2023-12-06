@section('page_title', 'Data Harga Pasang')
<x-app-layout>
    <div class="mt-16 p-4 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="mt-8">
                @include('unit.tl-teknik.harga.harga-pasang.tables.index-harga-pasang')
            </div>
        </div>
    </div>
</x-app-layout>
