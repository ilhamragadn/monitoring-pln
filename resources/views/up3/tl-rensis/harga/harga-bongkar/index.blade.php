@section('page_title', 'Data Harga Bongkar')
<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <x-success-button href="{{ route('hargabongkar-mngr-ren.create') }}"
            class="my-6 mr-6 float-right">{{ __('Tambah Data') }}
        </x-success-button>
        <div class="mb-8 text-gray-900 dark:text-white ">
            <table id="hargabongkar-mngr-ren" class=" table-auto min-w-full text-left text-sm pt-2">
                <thead class="dark:bg-indigo-600">
                    <tr>
                        <th scope="col" class="px-6 py-4 ">
                            NO.</th>
                        <th scope="col" class="px-6 py-4 ">
                            MATERIAL</th>
                        <th scope="col" class="px-6 py-4 ">
                            SATUAN</th>
                        <th scope="col" class="px-6 py-4 ">
                            RP MDU</th>
                        <th scope="col" class="px-6 py-4 ">
                            RP NON MDU + JASA</th>
                        <th scope="col" class="px-6 py-4 ">
                            RP JASA</th>
                        <th scope="col" class="px-6 py-4 ">
                            RP TOTAL</th>
                        <th scope="col" class="px-6 py-4 ">
                            KLASIFIKASI</th>
                        <th scope="col" class="px-6 py-4 ">
                            TINDAKAN</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
