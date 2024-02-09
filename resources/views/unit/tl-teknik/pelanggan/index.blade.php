@section('page_title', 'Data Calon Pelanggan')
<x-app-layout>
    <div
        class="max-w-7xl mx-auto mb-6 p-2 sticky top-2 z-10 sm:px-6 lg:px-8 bg-sky-200 overflow-hidden shadow rounded-lg border-sky-800 dark:border-sky-800 dark:bg-sky-200">
        <div class="flex">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="w-6 h-6 float-left mb-1 mr-1 text-sky-800 dark:text-sky-800">
                <path fill-rule="evenodd"
                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z"
                    clip-rule="evenodd" />
            </svg>
            <p class="mt-1 font-medium text-sm text-sky-800 dark:text-sky-800">
                Data calon pelanggan berikut ini adalah data yang telah dibuat oleh TL Teknik.
            </p>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <form action="{{ route('download-dapel-teknik.downloadData') }}" method="post">
            @csrf
            <div class="grid grid-cols-2">
                <div class="col-span-1">
                    <div class="flex justify-start my-6 mx-2">
                        <div id="downloadDapel" class="invisible">
                            <button type="submit"
                                class="flex items-center justify-center text-white font-medium hover:bg-green-400 hover:text-black bg-gray-500 rounded-full py-1 px-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-5 h-5 mb-1">
                                    <path fill-rule="evenodd"
                                        d="M12 2.25a.75.75 0 0 1 .75.75v11.69l3.22-3.22a.75.75 0 1 1 1.06 1.06l-4.5 4.5a.75.75 0 0 1-1.06 0l-4.5-4.5a.75.75 0 1 1 1.06-1.06l3.22 3.22V3a.75.75 0 0 1 .75-.75Zm-9 13.5a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="ml-1">Unduh .zip</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex justify-end my-6 mx-2">
                        <x-success-button href="{{ route('pelanggan-tl-teknik.create') }}"
                            class="">{{ __('Tambah Data') }}
                        </x-success-button>
                    </div>
                </div>
            </div>
            <div class="mx-2">
                @include('unit.tl-teknik.pelanggan.tables.index-table-pasang')
            </div>
        </form>
    </div>
</x-app-layout>
