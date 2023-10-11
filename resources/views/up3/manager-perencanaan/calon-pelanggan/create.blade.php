@section('page_title', 'Tambah Data Calon Pelanggan')
<x-app-layout>
    <div class="mt-16 p-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <form method="POST" action="{{ route('capel-mngr-ren.store') }}">
                @csrf
                <div class="grid grid-cols-2 gap-4 my-6">
                    <div>
                        <x-input-label for="nama_pelanggan" :value="__('Nama Pelanggan')" />
                        <x-text-input id="nama_pelanggan" class="block mt-1 w-full" type="text" name="nama_pelanggan"
                            :value="old('nama_pelanggan')" required autofocus autocomplete="nama_pelanggan" />
                        <x-input-error :messages="$errors->get('nama_pelanggan')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="alamat_pelanggan" :value="__('Alamat Pelanggan')" />
                        <x-text-input id="alamat_pelanggan" class="block mt-1 w-full" type="text"
                            name="alamat_pelanggan" :value="old('alamat_pelanggan')" autocomplete="alamat_pelanggan" />
                        <x-input-error :messages="$errors->get('alamat_pelanggan')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="ulp" :value="__('ULP')" />
                        <x-select-input class="block mt-1 w-full" name="ulp" id="ulp" required>
                            <option value="ULP Bangil">ULP Bangil</option>
                            <option value="ULP Gondang Wetan">ULP Gondang Wetan</option>
                            <option value="ULP Grati">ULP Grati</option>
                            <option value="ULP Kraksaan">ULP Kraksaan</option>
                            <option value="ULP Pandaan">ULP Pandaan</option>
                            <option value="ULP Pasuruan Kota">ULP Pasuruan Kota</option>
                            <option value="ULP Prigen">ULP Prigen</option>
                            <option value="ULP Probolinggo">ULP Probolinggo</option>
                            <option value="ULP Sukorejo">ULP Sukorejo</option>
                        </x-select-input>
                        <x-input-error :messages="$errors->get('ulp')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="jenis_permohonan" :value="__('Jenis Permohonan')" />
                        <x-select-input class="block mt-1 w-full" name="jenis_permohonan" id="jenis_permohonan"
                            required>
                            <option value="Migrasi">Migrasi</option>
                            <option value="Pasang Baru">Pasang Baru</option>
                            <option value="Perubahan Daya">Perubahan Daya</option>
                        </x-select-input>
                        <x-input-error :messages="$errors->get('jenis_permohonan')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="tarif_lama" :value="__('Tarif Lama')" />
                        <x-select-input id="tarif_lama" class="block mt-1 w-full" name="tarif_lama">
                            <option value="B1">B1</option>
                            <option value="B1T">B1T</option>
                            <option value="B2">B2</option>
                            <option value="B2T">B2T</option>
                            <option value="B3">B3</option>
                            <option value="I1">I1</option>
                            <option value="I1T">I1T</option>
                            <option value="I2">I2</option>
                            <option value="I3">I3</option>
                            <option value="P1">P1</option>
                            <option value="P1T">P1T</option>
                            <option value="P3">P3</option>
                            <option value="R1">R1</option>
                            <option value="R1M">R1M</option>
                            <option value="R1MT">R1MT</option>
                            <option value="R1T">R1T</option>
                            <option value="R2">R2</option>
                            <option value="R2T">R2T</option>
                            <option value="R3">R3</option>
                            <option value="R3T">R3T</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S2T">S2T</option>
                            <option value="S3">S3</option>
                        </x-select-input>
                        <x-input-error :messages="$errors->get('tarif_lama')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="daya_lama" :value="__('Daya Lama')" />
                        <x-text-input id="daya_lama" class="block mt-1 w-full" type="text" name="daya_lama"
                            autocomplete="daya_lama" />
                        <x-input-error :messages="$errors->get('daya_lama')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="tarif_baru" :value="__('Tarif Baru')" />
                        <x-select-input id="tarif_baru" class="block mt-1 w-full" name="tarif_baru">
                            <option value="B1">B1</option>
                            <option value="B1T">B1T</option>
                            <option value="B2">B2</option>
                            <option value="B2T">B2T</option>
                            <option value="I1">I1</option>
                            <option value="I1T">I1T</option>
                            <option value="I2">I2</option>
                            <option value="I2T">I2T</option>
                            <option value="I3">I3</option>
                            <option value="L">L</option>
                            <option value="L2">L2</option>
                            <option value="LB2">LB2</option>
                            <option value="LB2T">LB2T</option>
                            <option value="LI2">LI2</option>
                            <option value="LT">LT</option>
                            <option value="P1">P1</option>
                            <option value="P1T">P1T</option>
                            <option value="P2">P2</option>
                            <option value="P3">P3</option>
                            <option value="P3T">P3T</option>
                            <option value="R1M">R1M</option>
                            <option value="R1MT">R1MT</option>
                            <option value="R1T">R1T</option>
                            <option value="R2">R2</option>
                            <option value="R2T">R2T</option>
                            <option value="R3">R3</option>
                            <option value="R3T">R3T</option>
                            <option value="S2">S2</option>
                            <option value="S2T">S2T</option>
                            <option value="S3">S3</option>
                        </x-select-input>
                        <x-input-error :messages="$errors->get('tarif_baru')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="daya_baru" :value="__('Daya Baru')" />
                        <x-text-input id="daya_baru" class="block mt-1 w-full" type="text" name="daya_baru"
                            autocomplete="daya_baru" />
                        <x-input-error :messages="$errors->get('daya_baru')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="delta" :value="__('DELTA')" />
                        <x-text-input id="delta" class="block mt-1 w-full" type="text" name="delta"
                            autocomplete="delta" readonly placeholder="Daya Baru - Daya Lama" />
                        <x-input-error :messages="$errors->get('delta')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="jumlah_pelanggan" :value="__('Jumlah Pelanggan')" />
                        <x-text-input id="jumlah_pelanggan" class="block mt-1 w-full" type="number"
                            name="jumlah_pelanggan" autocomplete="jumlah_pelanggan" />
                        <x-input-error :messages="$errors->get('jumlah_pelanggan')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="nilai_bp" :value="__('Nilai BP')" />
                        <div class="relative">
                            <div class="absolute pointer-events-auto inset-y-0 left-0 flex items-center pl-2">
                                <span class="text-gray-700 dark:text-gray-300">Rp. </span>
                            </div>
                            <x-text-input id="nilai_bp" class="block mt-1 w-full pl-10" type="text"
                                name="nilai_bp" autocomplete="nilai_bp" readonly />
                        </div>
                        <x-input-error :messages="$errors->get('nilai_bp')" class="mt-2" />
                    </div>
                </div>
                <x-primary-button onclick="window.history.back()" class="mb-6 mr-6 float-right">
                    {{ __('Kembali') }}
                </x-primary-button>
                <button type="submit" class="mb-6 mr-2 float-right">
                    <x-success-button>
                        {{ __('Simpan') }}
                    </x-success-button>
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
<script>
    const daya_lama = document.getElementById('daya_lama');
    const daya_baru = document.getElementById('daya_baru');
    const delta = document.getElementById('delta');
    const tarif_baru = document.getElementById('tarif_baru');
    const nilai_bp = document.getElementById('nilai_bp')

    function rumusDeltaNilaiBP() {
        const daya_lamaValue = daya_lama.value.replace(/[^\d]/g, '');
        const daya_baruValue = daya_baru.value.replace(/[^\d]/g, '');
        const tarif_baruValue = tarif_baru.value.charAt(0);


        const daya_lamaParse = parseInt(daya_lamaValue) || 0;
        const daya_baruParse = parseInt(daya_baruValue) || 0;

        const deltaParse = daya_baruParse - daya_lamaParse;
        //console.log(deltaParse);
        let deltaValue = new Intl.NumberFormat("id-ID").format(deltaParse);
        delta.value = deltaValue;
        // console.log(typeof deltaValue);

        if (daya_baruParse < 2500 && deltaParse > 0) {
            const nilai_bpParse = deltaParse * 937;
            let nilai_bpValue = new Intl.NumberFormat("id-ID").format(nilai_bpParse);
            nilai_bp.value = nilai_bpValue;
        } else if (daya_baruParse > 200000 && deltaParse > 0) {
            const nilai_bpParse = deltaParse * 631;
            let nilai_bpValue = new Intl.NumberFormat("id-ID").format(nilai_bpParse);
            nilai_bp.value = nilai_bpValue;
        } else {
            if ((tarif_baruValue === 'B' || tarif_baruValue === 'I') && daya_baruParse > 100000 && daya_baruParse <
                200000 && deltaParse > 0) {
                const nilai_bpParse = deltaParse * 775;
                let nilai_bpValue = new Intl.NumberFormat("id-ID").format(nilai_bpParse);
                nilai_bp.value = nilai_bpValue;
            } else if (deltaParse > 0) {
                const nilai_bpParse = deltaParse * 969;
                let nilai_bpValue = new Intl.NumberFormat("id-ID").format(nilai_bpParse);
                nilai_bp.value = nilai_bpValue;
            } else {
                nilai_bp.value = "0";
            }
        }
    }

    daya_lama.addEventListener('input', rumusDeltaNilaiBP);
    daya_baru.addEventListener('input', rumusDeltaNilaiBP);
    tarif_baru.addEventListener('input', rumusDeltaNilaiBP)


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

    formatAngkaRibuan(daya_lama);
    formatAngkaRibuan(daya_baru);
    //formatAngkaRibuan(nilai_bp);
</script>
