@section('page_title', 'Ubah Data Harga Pasang')
<x-app-layout>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <form method="POST" action="{{ route('hargapasang-tl-rensis.update', $dataHargaPasang->id) }}">
            @csrf
            @method('PUT')
            <div class="lg:grid grid-cols-2 gap-4 my-6 mx-2">
                <div class="mb-2">
                    <x-input-label for="material" :value="__('Material')" />
                    <x-text-input id="material" class="block mt-1 w-full" type="text" name="material"
                        value="{{ old('material', $dataHargaPasang->material) }}" required autofocus
                        autocomplete="material" />
                    <x-input-error :messages="$errors->get('material')" class="mt-2" />
                </div>
                <div class="mb-2">
                    <x-input-label for="satuan" :value="__('Satuan')" />
                    <x-text-input id="satuan" class="block mt-1 w-full" type="text" name="satuan"
                        value="{{ old('satuan', $dataHargaPasang->satuan) }}" required autocomplete="satuan" />
                    <x-input-error :messages="$errors->get('satuan')" class="mt-2" />
                </div>
                <div class="mb-2">
                    <x-input-label for="klasifikasi" :value="__('Klasifikasi')" />
                    <x-select-input class="block mt-1 w-full" name="klasifikasi" id="klasifikasi">
                        <option value="JTM"
                            {{ old('klasifikasi', $dataHargaPasang->klasifikasi) === 'JTM' ? 'selected' : '' }}>JTM
                        </option>
                        <option value="GTT"
                            {{ old('klasifikasi', $dataHargaPasang->klasifikasi) === 'GTT' ? 'selected' : '' }}>GTT
                        </option>
                        <option value="KEYPOINT"
                            {{ old('klasifikasi', $dataHargaPasang->klasifikasi) === 'KEYPOINT' ? 'selected' : '' }}>
                            KEYPOINT</option>
                        <option value="AKSESORIS JTM JTR"
                            {{ old('klasifikasi', $dataHargaPasang->klasifikasi) === 'AKSESORIS JTM JTR' ? 'selected' : '' }}>
                            AKSESORIS JTM JTR</option>
                        <option value="JTR"
                            {{ old('klasifikasi', $dataHargaPasang->klasifikasi) === 'JTR' ? 'selected' : '' }}>JTR
                        </option>
                        <option value="TIANG"
                            {{ old('klasifikasi', $dataHargaPasang->klasifikasi) === 'TIANG' ? 'selected' : '' }}>
                            TIANG</option>
                        <option value="KONDUKTOR"
                            {{ old('klasifikasi', $dataHargaPasang->klasifikasi) === 'KONDUKTOR' ? 'selected' : '' }}>
                            KONDUKTOR</option>
                        <option value="TERMINASI DAN JOINTING"
                            {{ old('klasifikasi', $dataHargaPasang->klasifikasi) === 'TERMINASI DAN JOINTING' ? 'selected' : '' }}>
                            TERMINASI DAN JOINTING</option>
                        <option value="SR DAN APP"
                            {{ old('klasifikasi', $dataHargaPasang->klasifikasi) === 'SR DAN APP' ? 'selected' : '' }}>
                            SR DAN APP</option>
                    </x-select-input>
                </div>
                <div class="mb-2">
                    <x-input-label for="rp_jasa" :value="__('RP Jasa')" />
                    <x-text-input id="rp_jasa" class="block mt-1 w-full" type="text" name="rp_jasa"
                        autocomplete="rp_jasa" value="{{ old('rp_jasa', $dataHargaPasang->rp_jasa) }}" />
                    <x-input-error :messages="$errors->get('rp_jasa')" class="mt-2" />
                </div>
                <div class="mb-2">
                    <x-input-label for="rp_mdu" :value="__('RP MDU')" />
                    <x-text-input id="rp_mdu" class="block mt-1 w-full" type="text" name="rp_mdu"
                        autocomplete="rp_mdu" value="{{ old('rp_mdu', $dataHargaPasang->rp_mdu) }}" />
                    <x-input-error :messages="$errors->get('rp_mdu')" class="mt-2" />
                </div>
                <div class="mb-2">
                    <x-input-label for="rp_non_mdu_dan_jasa" :value="__('RP NON MDU + Jasa')" />
                    <x-text-input id="rp_non_mdu_dan_jasa" class="block mt-1 w-full" type="text"
                        name="rp_non_mdu_dan_jasa" autocomplete="rp_non_mdu_dan_jasa"
                        value="{{ old('rp_non_mdu_dan_jasa', $dataHargaPasang->rp_non_mdu_dan_jasa) }}" />
                    <x-input-error :messages="$errors->get('rp_non_mdu_dan_jasa')" class="mt-2" />
                </div>
                <div class="mb-2">
                    <x-input-label for="rp_total" :value="__('RP Total')" />
                    <x-text-input id="rp_total" class="block mt-1 w-full" type="text" name="rp_total"
                        autocomplete="rp_total" value="{{ old('rp_total', $dataHargaPasang->rp_total) }}" readonly />
                    <x-input-error :messages="$errors->get('rp_total')" class="mt-2" />
                </div>
            </div>
            <x-primary-button onclick="window.history.back()" class="mb-6 mr-6 float-right">
                {{ __('Kembali') }}
            </x-primary-button>
            <button type="submit" class="mb-6 mr-2 float-right">
                <x-success-button>
                    {{ __('Perbarui Data') }}
                </x-success-button>
            </button>
        </form>
    </div>
</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const rp_mdu = document.getElementById("rp_mdu");
        const rp_jasa = document.getElementById("rp_jasa");
        const rp_non_mdu_dan_jasa = document.getElementById("rp_non_mdu_dan_jasa");
        const rp_total = document.getElementById("rp_total");

        function formatRupiah(inputElement) {
            let valueInput = inputElement.value;
            let formattedValue = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
                minimumFractionDigits: 0,
                maximumFractionDigits: 0,
            }).format(valueInput);
            inputElement.value = formattedValue;
        }

        formatRupiah(rp_mdu);
        formatRupiah(rp_jasa);
        formatRupiah(rp_total);
        formatRupiah(rp_non_mdu_dan_jasa);
    });


    const rp_mdu = document.getElementById('rp_mdu');
    const rp_jasa = document.getElementById('rp_jasa');
    const rp_non_mdu_dan_jasa = document.getElementById('rp_non_mdu_dan_jasa');
    const rp_total = document.getElementById('rp_total');

    function totalHargaPasang() {
        const rp_mduValue = rp_mdu.value.replace(/[^\d]/g, ''); // Bersihkan karakter non-angka
        const rp_jasaValue = rp_jasa.value.replace(/[^\d]/g, ''); // Bersihkan karakter non-angka
        const rp_non_mdu_dan_jasaValue = rp_non_mdu_dan_jasa.value.replace(/[^\d]/g,
            ''); // Bersihkan karakter non-angka

        const rp_mduParse = parseInt(rp_mduValue) || 0;
        const rp_jasaParse = parseInt(rp_jasaValue) || 0;
        const rp_non_mdu_dan_jasaParse = parseInt(rp_non_mdu_dan_jasaValue) || 0;

        let rp_mduVal = new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        }).format(rp_mduParse);
        rp_mdu.value = rp_mduVal;

        let rp_jasaVal = new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        }).format(rp_jasaParse);
        rp_jasa.value = rp_jasaVal;

        let rp_non_mdu_dan_jasaVal = new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        }).format(rp_non_mdu_dan_jasaParse);
        rp_non_mdu_dan_jasa.value = rp_non_mdu_dan_jasaVal;


        const totalParse = rp_mduParse + rp_non_mdu_dan_jasaParse;
        let totalValue = new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        }).format(totalParse); // Format sebagai Rupiah
        rp_total.value = totalValue;

    }

    rp_mdu.addEventListener('input', totalHargaPasang);
    rp_jasa.addEventListener('input', totalHargaPasang);
    rp_non_mdu_dan_jasa.addEventListener('input', totalHargaPasang);
    rp_total.addEventListener('input', totalHargaPasang)
</script>
