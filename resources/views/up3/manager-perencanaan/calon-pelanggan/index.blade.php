@section('page_title', 'Data Calon Pelanggan')
<x-app-layout>
    <div class="mt-16 p-4 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <x-success-button href="{{ route('capel-mngr-ren.create') }}"
                class="my-6 mr-6 float-right">{{ __('Tambah Data') }}
            </x-success-button>
            <div class="mb-8 text-gray-900 dark:text-white ">
                <table id="capel-mngr-ren" class=" table-auto min-w-full text-center pt-2">
                    <thead class="dark:bg-teal-600 ">
                        <tr>
                            <th scope="col" class="px-6 py-4 ">
                                No.</th>
                            <th scope="col" class="px-6 py-4 ">
                                Nama Pelanggan</th>
                            <th scope="col" class="px-6 py-4 ">
                                Alamat Pelanggan</th>
                            <th scope="col" class="px-6 py-4 ">
                                Jumlah Pelanggan</th>
                            <th scope="col" class="px-6 py-4 ">
                                ULP</th>
                            <th scope="col" class="px-6 py-4 ">
                                Jenis Permohonan</th>
                            <th scope="col" class="px-6 py-4 ">
                                DELTA</th>
                            <th scope="col" class="px-6 py-4 ">
                                NILAI BP</th>
                            <th scope="col" class="px-6 py-4 ">
                                Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
