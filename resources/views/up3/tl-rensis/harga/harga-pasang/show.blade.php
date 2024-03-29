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
        <div class="grid grid-cols-3">
            <div class="col-span-1">
                <div class="flex lg:justify-start justify-center">
                    <x-danger-button class="mb-4 mx-2" x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-data-harga-pasang-deletion')">
                        {{ __('Hapus') }}
                    </x-danger-button>
                </div>
            </div>
            <div class="col-span-2">
                <div class="flex lg:justify-end justify-center">
                    <x-update-button class="mb-4 mx-2"
                        href="{{ route('hargapasang-tl-rensis.edit', $dataHargaPasang->id) }}">
                        {{ __('Edit') }}
                    </x-update-button>
                    <x-primary-button onclick="window.history.back()" class="mb-4 mx-2">
                        {{ __('Kembali') }}
                    </x-primary-button>
                </div>
            </div>
        </div>
        <x-modal class="flex items-center justify-center" name="confirm-data-harga-pasang-deletion" focusable>
            <form method="post" action="{{ route('hargapasang-tl-rensis.destroy', $dataHargaPasang->id) }}"
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
                        {{ __('Hapus Data Harga Pasang') }}
                    </x-danger-button>
                </div>
            </form>
        </x-modal>
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
