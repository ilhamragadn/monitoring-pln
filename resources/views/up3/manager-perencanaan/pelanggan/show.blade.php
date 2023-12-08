@section('page_title', 'Detail Data Calon Pelanggan')
<x-app-layout>
    @if (
        $dataPelanggan->persetujuan_unit == 'SETUJU' &&
            $dataPelanggan->persetujuan_rensis == 'SETUJU' &&
            $dataPelanggan->persetujuan_ren == 'TUNGGU')
        <form action="{{ route('pelanggan-mngr-ren.UpdateApprovalRen', $dataPelanggan->id) }}" method="post"
            class="sticky top-2">
            @csrf
            @method('PUT')
            <div
                class="max-w-7xl mx-auto mb-6 p-2 sm:px-6 lg:px-8 bg-sky-200 overflow-hidden shadow sm:rounded-lg border-sky-800 dark:border-sky-800 dark:bg-sky-200">
                <x-danger-button id="persetujuan_ren" name="persetujuan_ren" value="TOLAK"
                    class="float-right m-1">{{ __('TOLAK') }}
                    <input type="hidden" name="id_mngr_ren" value="{{ Auth::user()->id }}" />
                </x-danger-button>
                <x-safe-button id="persetujuan_ren" name="persetujuan_ren" value="SETUJU" class="float-right m-1">
                    {{ __('SETUJU') }}
                    <input type="hidden" name="id_mngr_ren" value="{{ Auth::user()->id }}" />

                </x-safe-button>

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
        </form>
    @endif

    @if (
        $dataPelanggan->persetujuan_unit == 'SETUJU' &&
            $dataPelanggan->persetujuan_rensis == 'SETUJU' &&
            $dataPelanggan->persetujuan_ren == 'SETUJU')
        <div
            class="max-w-7xl mx-auto mb-6 p-2 sticky top-2 sm:px-6 lg:px-8 bg-sky-200 overflow-hidden shadow sm:rounded-lg border-sky-800 dark:border-sky-800 dark:bg-sky-200">
            <div class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-6 h-6 float-left mb-1 mr-1 text-sky-800 dark:text-sky-800">
                    <path fill-rule="evenodd"
                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z"
                        clip-rule="evenodd" />
                </svg>
                <p class="mt-1 font-medium text-sm text-sky-800 dark:text-sky-800">
                    Data pelanggan berikut ini telah Anda setujui.
                </p>
            </div>
        </div>
    @endif

    @if (
        $dataPelanggan->persetujuan_unit == 'SETUJU' &&
            $dataPelanggan->persetujuan_rensis == 'SETUJU' &&
            $dataPelanggan->persetujuan_ren == 'TOLAK')
        <div
            class="max-w-7xl mx-auto mb-6 p-2 sticky top-2 sm:px-6 lg:px-8 bg-sky-200 overflow-hidden shadow sm:rounded-lg border-sky-800 dark:border-sky-800 dark:bg-sky-200">
            <div class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-6 h-6 float-left mb-1 mr-1 text-sky-800 dark:text-sky-800">
                    <path fill-rule="evenodd"
                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z"
                        clip-rule="evenodd" />
                </svg>
                <p class="mt-1 font-medium text-sm text-sky-800 dark:text-sky-800">
                    Data pelanggan berikut ini telah Anda tolak.
                </p>
            </div>
        </div>
    @endif

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @if ($dataPelanggan->tl_teknik_name == null)
            <x-input-label class="border-b-2 border-dashed m-1 text-lg text-center"
                value="Penanggung Jawab: {{ $dataPelanggan->tl_rensis_name }}" />
        @else
            <x-input-label class="border-b-2 border-dashed m-1 text-lg text-center"
                value="Penanggung Jawab: {{ $dataPelanggan->tl_teknik_name }}" />
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
                <div class="grid grid-cols-2 gap-4 my-2">
                    @foreach (json_decode($dataPelanggan->foto_survei) as $foto_survei)
                        <img class="block w-full h-auto max-h-72 mb-2"
                            src="{{ asset('storage/pelanggans/' . $foto_survei) }}" alt="Gambar Survei">
                    @endforeach
                </div>
            @else
                <x-text-input class="mt-1 block w-full" value="- Tidak Ada Gambar Hasil Survei." disabled />
            @endif
        </div>
        <div class="my-2">
            <x-input-label for="" :value="__('Pemesanan Material')" class="my-2" />
            @include('up3.manager-perencanaan.pelanggan.tables.detail-table-pasang')
        </div>
        <x-primary-button onclick="window.history.back()" class="mb-6 mr-6 float-right">
            {{ __('Kembali') }}
        </x-primary-button>
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
        //formatAngka(nilai_bp);
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
