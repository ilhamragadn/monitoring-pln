@section('page_title', 'Detail Data Calon Pelanggan')
<x-app-layout>
    <div class="mt-16 p-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="grid grid-cols-2 gap-4 my-6">
                <div>
                    <x-input-label for="nama_pelanggan" :value="__('Nama Pelanggan')" />
                    <x-text-input id="nama_pelanggan" class="block mt-1 w-full" name="nama_pelanggan"
                        value="{{ $dataCaPel->nama_pelanggan }}" readonly />
                </div>
                <div>
                    <x-input-label for="alamat_pelanggan" :value="__('Alamat Pelanggan')" />
                    <x-text-input id="alamat_pelanggan" class="block mt-1 w-full" name="alamat_pelanggan"
                        value="{{ $dataCaPel->alamat_pelanggan }}" readonly />
                </div>
                <div>
                    <x-input-label for="ulp" :value="__('ULP')" />
                    <x-text-input id="ulp" class="block mt-1 w-full" value="{{ $dataCaPel->ulp }}" readonly />
                </div>
                <div>
                    <x-input-label for="jenis_permohonan" :value="__('Jenis Permohonan')" />
                    <x-text-input id="jenis_permohonan" class="block mt-1 w-full"
                        value="{{ $dataCaPel->jenis_permohonan }}" readonly />
                </div>
                <div>
                    <x-input-label for="tarif_lama" :value="__('Tarif Lama')" />
                    <x-text-input id="tarif_lama" class="block mt-1 w-full" value="{{ $dataCaPel->tarif_lama }}"
                        readonly />
                </div>
                <div>
                    <x-input-label for="daya_lama" :value="__('Daya Lama')" />
                    <x-text-input id="daya_lama" class="block mt-1 w-full" value="{{ $dataCaPel->daya_lama }}"
                        readonly />
                </div>
                <div>
                    <x-input-label for="tarif_baru" :value="__('Tarif Baru')" />
                    <x-text-input id="tarif_baru" class="block mt-1 w-full" value="{{ $dataCaPel->tarif_baru }}"
                        readonly />
                </div>
                <div>
                    <x-input-label for="daya_baru" :value="__('Daya Baru')" />
                    <x-text-input id="daya_baru" class="block mt-1 w-full" value="{{ $dataCaPel->daya_baru }}"
                        readonly />
                </div>
                <div>
                    <x-input-label for="delta" :value="__('DELTA')" />
                    <x-text-input id="delta" name="delta" class="block mt-1 w-full"
                        value="{{ $dataCaPel->delta }}" readonly />
                </div>
                <div>
                    <x-input-label for="jumlah_pelanggan" :value="__('Jumlah Pelanggan')" />
                    <x-text-input class="block mt-1 w-full" value="{{ $dataCaPel->jumlah_pelanggan }}" readonly />
                </div>
                <div>
                    <x-input-label for="nilai_bp" :value="__('Nilai BP')" />
                    <div class="relative">
                        <div class="absolute pointer-events-auto inset-y-0 left-0 flex items-center pl-2">
                            <span class="text-gray-700 dark:text-gray-300">Rp. </span>
                        </div>
                        <x-text-input id="nilai_bp" name="nilai_bp" class="block mt-1 w-full pl-10"
                            value="{{ $dataCaPel->nilai_bp }}" readonly />
                    </div>
                </div>
            </div>
            <x-primary-button onclick="window.history.back()" class="mb-6 mr-6 float-right">
                {{ __('Kembali') }}
            </x-primary-button>
            <x-update-button class="mb-6 mr-2 float-right" href="{{ route('capel-mngr-ren.edit', $dataCaPel->id) }}">
                {{ __('Edit Data') }}
            </x-update-button>

            <x-danger-button x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-data-calon-pelanggan-deletion')">
                {{ __('Hapus Data') }}
            </x-danger-button>
            <x-modal class="flex items-center justify-center " name="confirm-data-calon-pelanggan-deletion" focusable>
                <form method="post" action="{{ route('capel-mngr-ren.destroy', $dataCaPel->id) }}" class="p-6">
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
        </div>
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
        formatAngka(nilai_bp);
        formatAngka(delta);
    });
</script>
