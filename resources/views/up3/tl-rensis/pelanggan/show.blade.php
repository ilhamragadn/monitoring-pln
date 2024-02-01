@section('page_title', 'Detail Data Calon Pelanggan')
<x-app-layout>
    @if (
        $dataPelanggan->persetujuan_unit === 'SETUJU' &&
            $dataPelanggan->persetujuan_rensis == 'TUNGGU' &&
            $dataPelanggan->persetujuan_ren == 'TUNGGU')
        <div class="sticky top-2 z-10">
            <div
                class="max-w-7xl mx-auto mb-6 p-2 sm:px-6 lg:px-8 bg-sky-200 overflow-hidden shadow sm:rounded-lg border-sky-800 dark:border-sky-800 dark:bg-sky-200">
                <x-danger-button x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-tolak-data-pelanggan')" class="float-right m-1">
                    {{ __('TOLAK') }}
                </x-danger-button>
                <x-modal class="flex items-center justify-center" name="confirm-tolak-data-pelanggan" focusable>
                    <form action="{{ route('pelanggan-tl-rensis.UpdateApprovalRensis', $dataPelanggan->id) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="p-6">
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Cantumkan alasan penolakan dari data calon pelanggan ini.') }}
                            </h2>
                            <div>
                                <x-textarea-input class="w-full m-2" id="alasan_tolak_rensis"
                                    placeholder="Tuliskan alasan penolakannya disini" name="alasan_tolak_rensis"
                                    required>
                                </x-textarea-input>
                            </div>
                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Batal') }}
                                </x-secondary-button>
                                <x-danger-button class="ml-3" id="persetujuan_rensis" name="persetujuan_rensis"
                                    value="TOLAK">
                                    {{ __('Tolak Data Calon Pelanggan') }}
                                    <input id="id_tl_rensis" type="hidden" name="id_tl_rensis"
                                        value="{{ Auth::user()->id }}" />
                                </x-danger-button>
                            </div>
                        </div>
                    </form>
                </x-modal>

                <x-safe-button x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-setuju-data-pelanggan')"
                    class="float-right m-1">
                    {{ __('SETUJU') }}
                </x-safe-button>
                <x-modal class="flex items-center justify-center" name="confirm-setuju-data-pelanggan" focusable>
                    <form action="{{ route('pelanggan-tl-rensis.UpdateApprovalRensis', $dataPelanggan->id) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="p-6">
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Apakah Anda yakin menyetujui data calon pelanggan ini?') }}
                            </h2>
                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Batal') }}
                                </x-secondary-button>
                                <x-safe-button class="ml-3" id="persetujuan_rensis" name="persetujuan_rensis"
                                    value="SETUJU">
                                    {{ __('Setuju Data Calon Pelanggan') }}
                                    <input id="id_tl_rensis" type="hidden" name="id_tl_rensis"
                                        value="{{ Auth::user()->id }}" />
                                </x-safe-button>
                            </div>
                        </div>
                    </form>
                </x-modal>

                <div class="flex mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-6 h-6 float-left m-1 text-sky-800 dark:text-sky-800">
                        <path fill-rule="evenodd"
                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z"
                            clip-rule="evenodd" />
                    </svg>
                    <p class="mt-2 font-medium text-sm text-sky-800 dark:text-sky-800">
                        Jika Anda yakin dengan data pelanggan berikut ini, Anda dapat menyetujuinya agar dapat
                        ditindaklanjuti.
                    </p>
                </div>
            </div>

        </div>
    @endif

    @if (
        $dataPelanggan->persetujuan_unit == 'SETUJU' &&
            $dataPelanggan->persetujuan_rensis == 'SETUJU' &&
            $dataPelanggan->persetujuan_ren == 'TUNGGU')
        <div
            class="max-w-7xl mx-auto mb-6 p-2 sticky top-2 z-10 sm:px-6 lg:px-8 bg-sky-200 overflow-hidden shadow sm:rounded-lg border-sky-800 dark:border-sky-800 dark:bg-sky-200">
            <div class="flex">
                @method('PUT')
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-6 h-6 float-left mb-1 mr-1 text-sky-800 dark:text-sky-800">
                    <path fill-rule="evenodd"
                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z"
                        clip-rule="evenodd" />
                </svg>
                <p class="mt-1 font-medium text-sm text-sky-800 dark:text-sky-800">
                    Data pelanggan berikut ini telah Anda setujui sebelumnya, terima kasih.
                </p>
            </div>
        </div>
    @endif

    @if (
        $dataPelanggan->persetujuan_unit == 'SETUJU' &&
            $dataPelanggan->persetujuan_rensis == 'TOLAK' &&
            $dataPelanggan->persetujuan_ren == 'TUNGGU')
        <div
            class="max-w-7xl mx-auto mb-6 p-2 sticky top-2 z-10 sm:px-6 lg:px-8 bg-sky-200 overflow-hidden shadow sm:rounded-lg border-sky-800 dark:border-sky-800 dark:bg-sky-200">
            <div class="flex">
                @method('PUT')
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-6 h-6 float-left mb-1 mr-1 text-sky-800 dark:text-sky-800">
                    <path fill-rule="evenodd"
                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z"
                        clip-rule="evenodd" />
                </svg>
                <p class="mt-1 font-medium text-sm text-sky-800 dark:text-sky-800">
                    Data pelanggan berikut ini telah Anda tolak sebelumnya dengan alasan: <br>
                    - {{ $dataPelanggan->alasan_tolak_rensis }} <br>
                    Terima kasih.
                </p>
            </div>
        </div>
    @endif

    @if (
        $dataPelanggan->persetujuan_unit == 'SETUJU' &&
            $dataPelanggan->persetujuan_rensis == 'SETUJU' &&
            $dataPelanggan->persetujuan_ren == 'TOLAK')
        <div
            class="max-w-7xl mx-auto mb-6 p-2 sticky top-2 z-10 sm:px-6 lg:px-8 bg-sky-200 overflow-hidden shadow sm:rounded-lg border-sky-800 dark:border-sky-800 dark:bg-sky-200">
            <div class="flex">
                @method('PUT')
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-6 h-6 float-left mb-1 mr-1 text-sky-800 dark:text-sky-800">
                    <path fill-rule="evenodd"
                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z"
                        clip-rule="evenodd" />
                </svg>
                <p class="mt-1 font-medium text-sm text-sky-800 dark:text-sky-800">
                    Mohon maaf. Data pelanggan berikut ini telah Anda setujui sebelumnya. Namun, telah ditolak oleh
                    Manager Perencanaan dengan alasan: <br>
                    - {{ $dataPelanggan->alasan_tolak_ren }} <br>
                    Terima kasih.
                </p>
            </div>
        </div>
    @endif

    @if (
        $dataPelanggan->persetujuan_unit == 'SETUJU' &&
            $dataPelanggan->persetujuan_rensis == 'SETUJU' &&
            $dataPelanggan->persetujuan_ren == 'SETUJU')
        <div
            class="max-w-7xl mx-auto mb-6 p-2 sticky top-2 z-10 sm:px-6 lg:px-8 bg-sky-200 overflow-hidden shadow sm:rounded-lg border-sky-800 dark:border-sky-800 dark:bg-sky-200">
            <div class="flex">
                @method('PUT')
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-6 h-6 float-left mb-1 mr-1 text-sky-800 dark:text-sky-800">
                    <path fill-rule="evenodd"
                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z"
                        clip-rule="evenodd" />
                </svg>
                <p class="mt-1 font-medium text-sm text-sky-800 dark:text-sky-800">
                    Data pelanggan berikut ini telah Anda setujui sebelumnya dan Manager Perencanaan menyetujui
                    juga, terima kasih.
                </p>
            </div>
        </div>
    @endif

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @if ($dataPelanggan->tl_teknik_name != null)
            <x-input-label class="border-b-2 border-dashed m-1 text-lg text-center"
                value="Penanggung Jawab: {{ $dataPelanggan->tl_teknik_name }} sebagai {{ $dataPelanggan->tl_teknik_role }} {{ $dataPelanggan->tl_teknik_ulp }}" />
            <x-input-label class="border-b-2 border-dashed m-1 text-lg text-center"
                value="Tanggal dibuat: {{ $formatDate }}" />
        @else
            <x-input-label class="border-b-2 border-dashed m-1 text-lg text-center"
                value="Penanggung Jawab: {{ $dataPelanggan->tl_rensis_name }} sebagai {{ $dataPelanggan->tl_rensis_role }}" />
            <x-input-label class="border-b-2 border-dashed m-1 text-lg text-center"
                value="Tanggal dibuat: {{ $formatDate }}" />
        @endif
        <div class="grid grid-cols-2 gap-4 my-6">
            <div>
                <x-input-label for="no_regis" :value="__('No. Regis')" />
                <x-text-input id="no_regis" class="block mt-1 w-full" type="text" name="no_regis" readonly
                    value="{{ $dataPelanggan->no_regis }}" />
            </div>
            <div>
                <x-input-label for="nama_pelanggan" :value="__('Nama Pelanggan')" />
                <x-text-input id="nama_pelanggan" class="block mt-1 w-full" name="nama_pelanggan"
                    value="{{ $dataPelanggan->nama_pelanggan }}" readonly />
            </div>
            <div>
                <x-input-label for="alamat_pelanggan" :value="__('Alamat Pelanggan')" />
                <x-text-input id="alamat_pelanggan" class="block mt-1 w-full" name="alamat_pelanggan"
                    value="{{ $dataPelanggan->alamat_pelanggan }}" readonly />
            </div>
            <div>
                <x-input-label for="ulp" :value="__('ULP')" />
                <x-text-input id="ulp" class="block mt-1 w-full" value="{{ $dataPelanggan->ulp }}" readonly />
            </div>
            <div>
                <x-input-label for="jenis_permohonan" :value="__('Jenis Permohonan')" />
                <x-text-input id="jenis_permohonan" class="block mt-1 w-full"
                    value="{{ $dataPelanggan->jenis_permohonan }}" readonly />
            </div>
            <div>
                <x-input-label for="tarif_lama" :value="__('Tarif Lama')" />
                <x-text-input id="tarif_lama" class="block mt-1 w-full" value="{{ $dataPelanggan->tarif_lama }}"
                    readonly />
            </div>
            <div>
                <x-input-label for="daya_lama" :value="__('Daya Lama')" />
                <x-text-input id="daya_lama" class="block mt-1 w-full" value="{{ $dataPelanggan->daya_lama }}"
                    readonly />
            </div>
            <div>
                <x-input-label for="tarif_baru" :value="__('Tarif Baru')" />
                <x-text-input id="tarif_baru" class="block mt-1 w-full" value="{{ $dataPelanggan->tarif_baru }}"
                    readonly />
            </div>
            <div>
                <x-input-label for="daya_baru" :value="__('Daya Baru')" />
                <x-text-input id="daya_baru" class="block mt-1 w-full" value="{{ $dataPelanggan->daya_baru }}"
                    readonly />
            </div>
            <div>
                <x-input-label for="delta" :value="__('DELTA')" />
                <x-text-input id="delta" name="delta" class="block mt-1 w-full"
                    value="{{ $dataPelanggan->delta }}" readonly />
            </div>
            <div>
                <x-input-label for="jumlah_pelanggan" :value="__('Jumlah Pelanggan')" />
                <x-text-input class="block mt-1 w-full" value="{{ $dataPelanggan->jumlah_pelanggan }}" readonly />
            </div>
            <div>
                <x-input-label for="nilai_bp" :value="__('Nilai BP')" />
                <x-text-input id="nilai_bp" name="nilai_bp" class="block mt-1 w-full"
                    value="{{ $dataPelanggan->nilai_bp }}" readonly />
            </div>
            <div>
                <x-input-label for="kepastian_pelanggan" :value="__('Kepastian Pelanggan')" />
                <x-text-input id="kepastian_pelanggan" class="block mt-1 w-full" type="text"
                    name="kepastian_pelanggan" readonly value="{{ $dataPelanggan->kepastian_pelanggan }}" />
            </div>
            <div>
                <x-input-label for="vendor" :value="__('Vendor')" />
                <x-text-input id="vendor" class="block mt-1 w-full" type="text" name="vendor" readonly
                    value="{{ $dataPelanggan->vendor }}" />
            </div>
            <div>
                <x-input-label for="lama_bayar" :value="__('Lama Bayar')" />
                <x-text-input id="lama_bayar" class="block mt-1 w-full" type="text" name="lama_bayar" readonly
                    value="{{ $dataPelanggan->lama_bayar }}" />
            </div>
            <div>
                <x-input-label for="tgl_dpb_ulp" :value="__('Tanggal DPB (ULP)')" />
                <x-date-input id="tgl_dpb_ulp" name="tgl_dpb_ulp" class="block mt-1 w-full" readonly
                    value="{{ $dataPelanggan->tgl_dpb_ulp }}" />
            </div>
            <div>
                <x-input-label for="tgl_kajian_ren" :value="__('Tanggal Kajian (Ren)')" />
                <x-date-input id="tgl_kajian_ren" name="tgl_kajian_ren" class="block mt-1 w-full" readonly
                    value="{{ $dataPelanggan->tgl_kajian_ren }}" />
            </div>
            <div>
                <x-input-label for="tgl_logistik_kons" :value="__('Tanggal Logistik (Kons)')" />
                <x-date-input id="tgl_logistik_kons" name="tgl_logistik_kons" class="block mt-1 w-full" readonly
                    value="{{ $dataPelanggan->tgl_logistik_kons }}" />
            </div>
            <div>
                <x-input-label for="tgl_reservasi_kons" :value="__('Tanggal Reservasi (Kons)')" />
                <x-date-input id="tgl_reservasi_kons" name="tgl_reservasi_kons" class="block mt-1 w-full" readonly
                    value="{{ $dataPelanggan->tgl_reservasi_kons }}" />
            </div>
            <div>
                <x-input-label for="tgl_register_pp" :value="__('Tanggal Register (PP)')" />
                <x-date-input id="tgl_register_pp" name="tgl_register_pp" class="block mt-1 w-full" readonly
                    value="{{ $dataPelanggan->tgl_register_pp }}" />
            </div>
            <div>
                <x-input-label for="tgl_bayar_pp" :value="__('Tanggal Bayar (PP)')" />
                <x-date-input id="tgl_bayar_pp" name="tgl_bayar_pp" class="block mt-1 w-full" readonly
                    value="{{ $dataPelanggan->tgl_bayar_pp }}" />
            </div>
            <div>
                <x-input-label for="tgl_pdl_pp" :value="__('Tanggal PDL (PP)')" />
                <x-date-input id="tgl_pdl_pp" name="tgl_pdl_pp" class="block mt-1 w-full" readonly
                    value="{{ $dataPelanggan->tgl_pdl_pp }}" />
            </div>
        </div>


        <div class="mt-2 mb-4">
            <x-input-label for="foto_survei" :value="__('Hasil Gambar Survei')" />
            @if (!empty(json_decode($dataPelanggan->foto_survei)))
                <div class="flex overflow-x-scroll hide-scroll-bar">
                    <div class="flex flex-nowrap">
                        @foreach (json_decode($dataPelanggan->foto_survei) as $foto_survei)
                            <div class="inline-block p-2">
                                <div
                                    class="p-2 w-64 h-64 max-w-xs overflow-hidden rounded-lg shadow-md border-gray-300 bg-gray-400 dark:bg-gray-900 hover:shadow-xl transition-shadow duration-300 ease-in-out ">
                                    <div class="flex justify-center items-center h-full group/item">
                                        <div>
                                            <div class="flex justify-center items-center">
                                                @if (pathinfo($foto_survei, PATHINFO_EXTENSION) == 'pdf')
                                                    <div class="relative">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="currentColor"
                                                            class="w-40 h-40 text-white dark:text-gray-800">
                                                            <path
                                                                d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0 0 16.5 9h-1.875a1.875 1.875 0 0 1-1.875-1.875V5.25A3.75 3.75 0 0 0 9 1.5H5.625Z" />
                                                            <path
                                                                d="M12.971 1.816A5.23 5.23 0 0 1 14.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 0 1 3.434 1.279 9.768 9.768 0 0 0-6.963-6.963Z" />
                                                        </svg>
                                                        <div class="absolute inset-0 flex items-center justify-center">
                                                            <a class="flex items-center justify-center text-white font-medium group/edit invisible hover:bg-green-400 hover:text-black bg-gray-500 rounded-full py-2 px-4 group-hover/item:visible"
                                                                href="{{ route('download-survei-rensis', ['fileName' => $foto_survei]) }}">
                                                                <span class="mr-2">Unduh</span>
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24" fill="currentColor"
                                                                    class="w-5 h-5">
                                                                    <path fill-rule="evenodd"
                                                                        d="M12 2.25a.75.75 0 0 1 .75.75v11.69l3.22-3.22a.75.75 0 1 1 1.06 1.06l-4.5 4.5a.75.75 0 0 1-1.06 0l-4.5-4.5a.75.75 0 1 1 1.06-1.06l3.22 3.22V3a.75.75 0 0 1 .75-.75Zm-9 13.5a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="relative">
                                                        <img class="max-h-40 p-1"
                                                            src="{{ asset('storage/pelanggans/' . $foto_survei) }}"
                                                            alt="Gambar Survei">
                                                        <div class="absolute inset-0 flex items-center justify-center">
                                                            <a class="flex items-center justify-center text-white font-medium group/edit invisible hover:bg-green-400 hover:text-black bg-gray-500 rounded-full py-2 px-4 group-hover/item:visible"
                                                                href="{{ route('download-survei-rensis', ['fileName' => $foto_survei]) }}">
                                                                <span class="mr-2">Unduh</span>
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24" fill="currentColor"
                                                                    class="w-5 h-5">
                                                                    <path fill-rule="evenodd"
                                                                        d="M12 2.25a.75.75 0 0 1 .75.75v11.69l3.22-3.22a.75.75 0 1 1 1.06 1.06l-4.5 4.5a.75.75 0 0 1-1.06 0l-4.5-4.5a.75.75 0 1 1 1.06-1.06l3.22 3.22V3a.75.75 0 0 1 .75-.75Zm-9 13.5a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div
                                                class="text-white text-center py-1 mt-2 bg-gray-700 dark:bg-gray-800 rounded-md">
                                                <p>{{ $foto_survei }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <x-text-input class="mt-1 block w-full" value="- Tidak Ada Gambar atau File Hasil Survei." disabled />
            @endif
        </div>

        <style>
            .hide-scroll-bar {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }

            .hide-scroll-bar::-webkit-scrollbar {
                display: none;
            }
        </style>

        <div class="my-4">
            <x-input-label for="" :value="__('Pemesanan Material')" class="my-2" />
            <div class="p-2 border border-gray-300 dark:border-none dark:bg-gray-900 rounded-md shadow-sm">
                @include('up3.tl-rensis.pelanggan.tables.detail-table-pasang')
            </div>
        </div>

        <x-primary-button onclick="window.history.back()" class="mb-6 mr-6 float-right">
            {{ __('Kembali') }}
        </x-primary-button>

        @if ($dataPelanggan->persetujuan_unit == 'SETUJU' && $dataPelanggan->persetujuan_rensis == 'TUNGGU')
            <x-update-button class="mb-6 mr-2 float-right"
                href="{{ route('pelanggan-tl-rensis.edit', $dataPelanggan->id) }}">
                {{ __('Edit Data') }}
            </x-update-button>

            <x-danger-button x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-data-pelanggan-deletion')">
                {{ __('Hapus Data') }}
            </x-danger-button>
            <x-modal class="flex items-center justify-center" name="confirm-data-pelanggan-deletion" focusable>
                <form method="post" action="{{ route('pelanggan-tl-rensis.destroy', $dataPelanggan->id) }}"
                    class="p-6">
                    @csrf
                    @method('delete')
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Apakah Anda yakin ingin menghapus data ini?') }}
                    </h2>
                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Batal') }}
                        </x-secondary-button>

                        <x-danger-button class="ml-3">
                            {{ __('Hapus Data Calon Pelanggan') }}
                        </x-danger-button>
                    </div>
                </form>
            </x-modal>
        @endif

        @if ($dataPelanggan->persetujuan_unit == 'SETUJU' && $dataPelanggan->persetujuan_rensis == 'TOLAK')
            <x-update-button class="mb-6 mr-2 float-right"
                href="{{ route('pelanggan-tl-rensis.edit', $dataPelanggan->id) }}">
                {{ __('Edit Data') }}
            </x-update-button>

            <x-danger-button x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-data-pelanggan-deletion')">
                {{ __('Hapus Data') }}
            </x-danger-button>
            <x-modal class="flex items-center justify-center " name="confirm-data-pelanggan-deletion" focusable>
                <form method="post" action="{{ route('pelanggan-tl-rensis.destroy', $dataPelanggan->id) }}"
                    class="p-6">
                    @csrf
                    @method('delete')
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Apakah Anda yakin ingin menghapus data ini?') }}
                    </h2>
                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Batal') }}
                        </x-secondary-button>

                        <x-danger-button class="ml-3">
                            {{ __('Hapus Data Calon Pelanggan') }}
                        </x-danger-button>
                    </div>
                </form>
            </x-modal>
        @endif

        @if (
            $dataPelanggan->persetujuan_unit == 'SETUJU' &&
                $dataPelanggan->persetujuan_rensis == 'SETUJU' &&
                $dataPelanggan->persetujuan_ren == 'TOLAK')
            <x-update-button class="mb-6 mr-2 float-right"
                href="{{ route('pelanggan-tl-rensis.edit', $dataPelanggan->id) }}">
                {{ __('Edit Data') }}
            </x-update-button>

            <x-danger-button x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-data-pelanggan-deletion')">
                {{ __('Hapus Data') }}
            </x-danger-button>
            <x-modal class="flex items-center justify-center " name="confirm-data-pelanggan-deletion" focusable>
                <form method="post" action="{{ route('pelanggan-tl-rensis.destroy', $dataPelanggan->id) }}"
                    class="p-6">
                    @csrf
                    @method('delete')
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Apakah Anda yakin ingin menghapus data ini?') }}
                    </h2>
                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Batal') }}
                        </x-secondary-button>

                        <x-danger-button class="ml-3">
                            {{ __('Hapus Data Calon Pelanggan') }}
                        </x-danger-button>
                    </div>
                </form>
            </x-modal>
        @endif

        @if (
            $dataPelanggan->persetujuan_unit == 'SETUJU' &&
                $dataPelanggan->persetujuan_rensis == 'SETUJU' &&
                $dataPelanggan->persetujuan_ren == 'SETUJU')
            <x-update-button class="mb-6 mr-2 float-right"
                href="{{ route('pelanggan-tl-rensis.edit', $dataPelanggan->id) }}">
                {{ __('Edit Data') }}
            </x-update-button>

            <x-danger-button x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-data-pelanggan-deletion')">
                {{ __('Hapus Data') }}
            </x-danger-button>
            <x-modal class="flex items-center justify-center " name="confirm-data-pelanggan-deletion" focusable>
                <form method="post" action="{{ route('pelanggan-tl-rensis.destroy', $dataPelanggan->id) }}"
                    class="p-6">
                    @csrf
                    @method('delete')
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Apakah Anda yakin ingin menghapus data ini?') }}
                    </h2>
                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Batal') }}
                        </x-secondary-button>

                        <x-danger-button class="ml-3">
                            {{ __('Hapus Data Calon Pelanggan') }}
                        </x-danger-button>
                    </div>
                </form>
            </x-modal>
        @endif

    </div>
</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const daya_lama = document.getElementById("daya_lama");
        const daya_baru = document.getElementById("daya_baru");
        const delta = document.getElementById("delta");
        const nilai_bp = document.getElementById("nilai_bp");

        function formatAngka(inputElement) {
            let valueInput = inputElement.value;
            let formattedValue = new Intl.NumberFormat("id-ID").format(valueInput);
            inputElement.value = formattedValue;
        }
        formatAngka(daya_lama);
        formatAngka(daya_baru);
        formatAngka(delta);

        function formatBP(e) {
            let NilaiBP = e.value;
            let formatBP = new Intl.NumberFormat('id-ID', {
                style: "currency",
                currency: "IDR"
            }).format(NilaiBP);
            e.value = formatBP;
        }
        formatBP(nilai_bp);
    });
</script>
