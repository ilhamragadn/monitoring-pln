@section('page_title', 'Ubah Data Harga Bongkar')
<x-app-layout>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <form method="POST" action="{{ route('hargabongkar-mngr-ren.update', $dataHargaBongkar->id) }}">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-4 my-6">
                <div>
                    <x-input-label for="material" :value="__('Material')" />
                    <x-text-input id="material" class="block mt-1 w-full" type="text" name="material"
                        value="{{ old('material', $dataHargaBongkar->material) }}" required autofocus
                        autocomplete="material" />
                    <x-input-error :messages="$errors->get('material')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="satuan" :value="__('Satuan')" />
                    <x-text-input id="satuan" class="block mt-1 w-full" type="text" name="satuan"
                        value="{{ old('satuan', $dataHargaBongkar->satuan) }}" required autocomplete="satuan" />
                    <x-input-error :messages="$errors->get('satuan')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="klasifikasi" :value="__('Klasifikasi')" />
                    <x-select-input class="block mt-1 w-full" name="klasifikasi" id="klasifikasi">
                        <option value="JTM"
                            {{ old('klasifikasi', $dataHargaBongkar->klasifikasi) === 'JTM' ? 'selected' : '' }}>JTM
                        </option>
                        <option value="GTT"
                            {{ old('klasifikasi', $dataHargaBongkar->klasifikasi) === 'GTT' ? 'selected' : '' }}>GTT
                        </option>
                        <option value="KEYPOINT"
                            {{ old('klasifikasi', $dataHargaBongkar->klasifikasi) === 'KEYPOINT' ? 'selected' : '' }}>
                            KEYPOINT</option>
                        <option value="AKSESORIS JTM JTR"
                            {{ old('klasifikasi', $dataHargaBongkar->klasifikasi) === 'AKSESORIS JTM JTR' ? 'selected' : '' }}>
                            AKSESORIS JTM JTR</option>
                        <option value="JTR"
                            {{ old('klasifikasi', $dataHargaBongkar->klasifikasi) === 'JTR' ? 'selected' : '' }}>JTR
                        </option>
                        <option value="TIANG"
                            {{ old('klasifikasi', $dataHargaBongkar->klasifikasi) === 'TIANG' ? 'selected' : '' }}>
                            TIANG</option>
                        <option value="KONDUKTOR"
                            {{ old('klasifikasi', $dataHargaBongkar->klasifikasi) === 'KONDUKTOR' ? 'selected' : '' }}>
                            KONDUKTOR</option>
                        <option value="TERMINASI DAN JOINTING"
                            {{ old('klasifikasi', $dataHargaBongkar->klasifikasi) === 'TERMINASI DAN JOINTING' ? 'selected' : '' }}>
                            TERMINASI DAN JOINTING</option>
                        <option value="SR DAN APP"
                            {{ old('klasifikasi', $dataHargaBongkar->klasifikasi) === 'SR DAN APP' ? 'selected' : '' }}>
                            SR DAN APP</option>
                    </x-select-input>
                </div>
                <div>
                    <x-input-label for="rp_jasa" :value="__('RP Jasa')" />
                    <div class="relative">
                        <div class="absolute pointer-events-auto inset-y-0 left-0 flex items-center pl-2">
                            <span class="text-gray-700 dark:text-gray-300">Rp. </span>
                        </div>
                        <x-text-input id="rp_jasa" class="block mt-1 w-full pl-10" type="text" name="rp_jasa"
                            autocomplete="rp_jasa" value="{{ old('rp_jasa', $dataHargaBongkar->rp_jasa) }}" />
                    </div>
                    <x-input-error :messages="$errors->get('rp_jasa')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="rp_mdu" :value="__('RP MDU')" />
                    <div class="relative">
                        <div class="absolute pointer-events-auto inset-y-0 left-0 flex items-center pl-2">
                            <span class="text-gray-700 dark:text-gray-300">Rp. </span>
                        </div>
                        <x-text-input id="rp_mdu" class="block mt-1 w-full pl-10" type="text" name="rp_mdu"
                            autocomplete="rp_mdu" value="{{ old('rp_mdu', $dataHargaBongkar->rp_mdu) }}" />
                    </div>
                    <x-input-error :messages="$errors->get('rp_mdu')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="rp_non_mdu_dan_jasa" :value="__('RP NON MDU + Jasa')" />
                    <div class="relative">
                        <div class="absolute pointer-events-auto inset-y-0 left-0 flex items-center pl-2">
                            <span class="text-gray-700 dark:text-gray-300">Rp. </span>
                        </div>
                        <x-text-input id="rp_non_mdu_dan_jasa" class="block mt-1 w-full pl-10" type="text"
                            name="rp_non_mdu_dan_jasa" autocomplete="rp_non_mdu_dan_jasa"
                            value="{{ old('rp_non_mdu_dan_jasa', $dataHargaBongkar->rp_non_mdu_dan_jasa) }}" />
                    </div>
                    <x-input-error :messages="$errors->get('rp_non_mdu_dan_jasa')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="rp_total" :value="__('RP Total')" />
                    <div class="relative">
                        <div class="absolute pointer-events-auto inset-y-0 left-0 flex items-center pl-2">
                            <span class="text-gray-700 dark:text-gray-300">Rp. </span>
                        </div>
                        <x-text-input id="rp_total" class="block mt-1 w-full pl-10" type="text" name="rp_total"
                            autocomplete="rp_total" value="{{ old('rp_total', $dataHargaBongkar->rp_total) }}"
                            readonly />
                    </div>
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
            let formattedValue = new Intl.NumberFormat("id-ID").format(valueInput);
            inputElement.value = formattedValue;

        }

        formatRupiah(rp_mdu);
        formatRupiah(rp_jasa);
        formatRupiah(rp_total);
        formatRupiah(rp_non_mdu_dan_jasa);
    });
    //KODE INI YANG JALAN
    //Ambil elemen - elemen input yang memerlukan format angka ribuan
    const rp_mdu = document.getElementById('rp_mdu');
    const rp_jasa = document.getElementById('rp_jasa');
    const rp_non_mdu_dan_jasa = document.getElementById('rp_non_mdu_dan_jasa');
    const rp_total = document.getElementById('rp_total');

    function totalHargaBongkar() {
        const rp_mduValue = rp_mdu.value.replace(/[^\d]/g, ''); // Bersihkan karakter non-angka
        const rp_jasaValue = rp_jasa.value.replace(/[^\d]/g, ''); // Bersihkan karakter non-angka
        const rp_non_mdu_dan_jasaValue = rp_non_mdu_dan_jasa.value.replace(/[^\d]/g,
            ''); // Bersihkan karakter non-angka

        const rp_mduParse = parseInt(rp_mduValue) || 0;
        const rp_jasaParse = parseInt(rp_jasaValue) || 0;
        const rp_non_mdu_dan_jasaParse = parseInt(rp_non_mdu_dan_jasaValue) || 0;

        const totalParse = rp_mduParse + rp_non_mdu_dan_jasaParse;
        let totalValue = new Intl.NumberFormat("id-ID").format(totalParse); // Format sebagai Rupiah
        rp_total.value = totalValue;

    }

    rp_mdu.addEventListener('input', totalHargaBongkar);
    rp_jasa.addEventListener('input', totalHargaBongkar);
    rp_non_mdu_dan_jasa.addEventListener('input', totalHargaBongkar);
    rp_total.addEventListener('input', totalHargaBongkar)

    // Buat fungsi untuk memformat angka ribuan
    function formatAngkaRibuan(inputElement) {
        inputElement.addEventListener('input', function() {
            let valueInput = inputElement.value;
            valueInput = valueInput.replace(/[^\d]/g, '');
            const formatValue = parseInt(valueInput);

            // Memeriksa apakah angka adalah NaN (tidak valid)
            if (!isNaN(formatValue)) {
                // Memformat angka ke dalam format ribuan
                const formatInput = formatValue.toLocaleString('id-ID'); // id-ID untuk format rupiah
                inputElement.value = formatInput;

            } else {
                // Jika input tidak valid, tampilkan pesan kesalahan
                inputElement.value = '0';
            }
        });
    }

    formatAngkaRibuan(rp_mdu);
    formatAngkaRibuan(rp_jasa);
    formatAngkaRibuan(rp_total);
    formatAngkaRibuan(rp_non_mdu_dan_jasa);
</script>
