@section('page_title', 'Detail Data Harga Pasang')
<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="lg:grid grid-cols-2 gap-4 my-6 mx-2">
            <div class="mb-2">
                <x-input-label for="material" :value="__('Material')" />
                <x-text-input id="material" class="block mt-1 w-full" name="material"
                    value="{{ $dataHargaPasang->material }}" readonly />
            </div>
            <div class="mb-2">
                <x-input-label for="satuan" :value="__('Satuan')" />
                <x-text-input id="satuan" class="block mt-1 w-full" name="satuan"
                    value="{{ $dataHargaPasang->satuan }}" readonly />
            </div>
            <div class="mb-2">
                <x-input-label for="klasifikasi" :value="__('Klasifikasi')" />
                <x-text-input class="block mt-1 w-full" value="{{ $dataHargaPasang->klasifikasi }}" readonly />
            </div>
            <div class="mb-2">
                <x-input-label for="rp_jasa" :value="__('RP Jasa')" />
                <x-text-input id="rp_jasa" class="block mt-1 w-full" value="{{ $dataHargaPasang->rp_jasa }}"
                    readonly />
            </div>
            <div class="mb-2">
                <x-input-label for="rp_mdu" :value="__('RP MDU')" />
                <x-text-input id="rp_mdu" class="block mt-1 w-full" value="{{ $dataHargaPasang->rp_mdu }}"
                    readonly />
            </div>
            <div class="mb-2">
                <x-input-label for="rp_non_mdu_dan_jasa" :value="__('RP NON MDU + Jasa')" />
                <x-text-input id="rp_non_mdu_dan_jasa" class="block mt-1 w-full"
                    value="{{ $dataHargaPasang->rp_non_mdu_dan_jasa }}" readonly />
            </div>
            <div class="mb-2">
                <x-input-label for="rp_total" :value="__('RP Total')" />
                <x-text-input id="rp_total" class="block mt-1 w-full" value="{{ $dataHargaPasang->rp_total }}"
                    readonly />
            </div>
        </div>
        <x-primary-button onclick="window.history.back()" class="mb-6 mr-6 float-right">
            {{ __('Kembali') }}
        </x-primary-button>
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
                currency: "IDR"
            }).format(valueInput);
            inputElement.value = formattedValue;

        }

        formatRupiah(rp_mdu);
        formatRupiah(rp_jasa);
        formatRupiah(rp_total);
        formatRupiah(rp_non_mdu_dan_jasa);
    });
</script>
