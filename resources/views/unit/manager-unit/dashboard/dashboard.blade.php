@section('page_title', 'Dashboard | ' . Auth::user()->role)
<x-app-layout>
    <div
        class="max-w-7xl mx-auto mt-14 sm:px-6 lg:px-8 overflow-hidden shadow-sm p-4 bg-gradient-to-r from-emerald-500 to-cyan-500 text-gray-100 sm:rounded-b-lg">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="mr-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-8 h-8 text-gray-400 dark:text-gray-900">
                        <path fill-rule="evenodd"
                            d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <span class="text-lg font-semibold">{{ __('Selamat Datang, ') }}</span>
                    <span>{{ Auth::user()->name }}</span>
                </div>
            </div>
            <div>
                <span class="text-sm">{{ Auth::user()->role }}</span>
            </div>
        </div>
    </div>
    <div class="p-4">
        <div
            class="max-w-7xl mx-auto mb-1 pb-1 sm:px-6 lg:px-8 bg-gradient-to-r from-emerald-700 to-cyan-800 dark:text-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
        </div>
        <div class="grid grid-cols-3 gap-2 my-4">
            <div>
                <a href="hargapasang-mngr-unit"
                    class="block max-w-sm p-6 my-1 bg-gray-200  rounded-lg shadow-md hover:bg-gray-50 dark:bg-gray-800  dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Daftar Harga Pasang
                        Material</h5>
                    <div class="inline-flex items-center justify-between">
                        <p class="inline-flex font-normal text-gray-700 dark:text-gray-400">Selengkapnya disini
                            <svg class="w-4 h-4 ml-2 mt-1 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </p>
                    </div>
                </a>
            </div>
        </div>
        <div
            class="max-w-7xl mx-auto mb-1 pb-1 sm:px-6 lg:px-8 bg-gradient-to-r from-emerald-700 to-cyan-800 dark:text-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
        </div>
        <div class="grid grid-cols-3 gap-3 my-4">
            <div class="my-auto">
                <a href="pelanggan-mngr-unit"
                    class="block max-w-sm p-6 my-1 bg-gray-200  rounded-lg shadow-md hover:bg-gray-50 dark:bg-gray-800  dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Daftar Data Calon
                        Pelanggan</h5>
                    <div class="inline-flex items-center justify-between">
                        <p class="inline-flex font-normal text-gray-700 dark:text-gray-400">Selengkapnya disini
                            <svg class="w-4 h-4 ml-2 mt-1 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </p>
                    </div>
                </a>
            </div>
            <div>
                <a href="#dashboard-unit-persetujuan-tunggu"
                    class="block max-w-sm p-6 my-1 bg-gray-200  rounded-lg shadow-md hover:bg-gray-50 dark:bg-gray-800  dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Data
                        Pelanggan Belum Disetujui</h5>
                    <div class="inline-flex items-center justify-between">
                        <p class="inline-flex font-normal text-gray-700 dark:text-gray-400">Lihat disini statusnya
                            <svg class="w-4 h-4 ml-2 mt-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1v12m0 0 4-4m-4 4L1 9" />
                            </svg>
                        </p>
                    </div>
                </a>
            </div>
            <div>
                <a href="#dashboard-unit-persetujuan-terkonfirmasi"
                    class="block max-w-sm p-6 my-1 bg-gray-200  rounded-lg shadow-md hover:bg-gray-50 dark:bg-gray-800  dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Persetujuan Data
                        Pelanggan oleh Anda</h5>
                    <div class="inline-flex items-center justify-between">
                        <p class="inline-flex font-normal text-gray-700 dark:text-gray-400">Lihat disini statusnya
                            <svg class="w-4 h-4 ml-2 mt-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1v12m0 0 4-4m-4 4L1 9" />
                            </svg>
                        </p>
                    </div>
                </a>
            </div>
        </div>
        <div
            class="max-w-7xl mx-auto mb-1 pb-1 sm:px-6 lg:px-8 bg-gradient-to-r from-emerald-700 to-cyan-800 dark:text-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
        </div>
        <div class="p-4 my-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
            @include('unit.manager-unit.dashboard.tables.persetujuan-mngr-unit-tunggu')
        </div>
        <div
            class="max-w-7xl mx-auto mb-1 pb-1 sm:px-6 lg:px-8 bg-gradient-to-r from-emerald-700 to-cyan-800 dark:text-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
        </div>
        <div class="p-4 my-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
            @include('unit.manager-unit.dashboard.tables.persetujuan-mngr-unit-terkonfirmasi')
        </div>
        <div
            class="max-w-7xl mx-auto mb-1 pb-1 sm:px-6 lg:px-8 bg-gradient-to-r from-emerald-700 to-cyan-800 dark:text-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
        </div>
    </div>
</x-app-layout>
