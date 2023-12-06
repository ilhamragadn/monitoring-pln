@section('page_title', 'Ubah Data Calon Pelanggan')
<x-app-layout>
    <div class="mt-16 p-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <form method="POST" action="{{ route('pelanggan-tl-rensis.update', $dataPelanggan->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-4 my-6">
                    <div>
                        <x-input-label for="no_regis" :value="__('No. Regis')" />
                        <x-text-input id="no_regis" class="block mt-1 w-full" type="text" name="no_regis" autofocus
                            value="{{ old('no_regis', $dataPelanggan->no_regis) }}" />
                    </div>
                    <div>
                        <x-input-label for="nama_pelanggan" :value="__('Nama Pelanggan')" />
                        <x-text-input id="nama_pelanggan" class="block mt-1 w-full" type="text" name="nama_pelanggan"
                            value="{{ old('nama_pelanggan', $dataPelanggan->nama_pelanggan) }}" required
                            autocomplete="nama_pelanggan" />
                        <x-input-error :messages="$errors->get('nama_pelanggan')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="alamat_pelanggan" :value="__('Alamat Pelanggan')" />
                        <x-text-input id="alamat_pelanggan" class="block mt-1 w-full" type="text"
                            name="alamat_pelanggan"
                            value="{{ old('alamat_pelanggan', $dataPelanggan->alamat_pelanggan) }}"
                            autocomplete="alamat_pelanggan" />
                        <x-input-error :messages="$errors->get('alamat_pelanggan')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="ulp" :value="__('ULP')" />
                        <x-select-input class="block mt-1 w-full" name="ulp" id="ulp" required>
                            <option value="ULP Bangil"
                                {{ old('ulp', $dataPelanggan->ulp) === 'ULP Bangil' ? 'selected' : '' }}>ULP Bangil
                            </option>
                            <option value="ULP Gondang Wetan"
                                {{ old('ulp', $dataPelanggan->ulp) === 'ULP Gondang Wetan' ? 'selected' : '' }}>ULP
                                Gondang
                                Wetan</option>
                            <option value="ULP Grati"
                                {{ old('ulp', $dataPelanggan->ulp) === 'ULP Grati' ? 'selected' : '' }}>ULP Grati
                            </option>
                            <option value="ULP Kraksaan"
                                {{ old('ulp', $dataPelanggan->ulp) === 'ULP Kraksaan' ? 'selected' : '' }}>ULP Kraksaan
                            </option>
                            <option value="ULP Pandaan"
                                {{ old('ulp', $dataPelanggan->ulp) === 'ULP Pandaan' ? 'selected' : '' }}>ULP Pandaan
                            </option>
                            <option value="ULP Pasuruan Kota"
                                {{ old('ulp', $dataPelanggan->ulp) === 'ULP Pasuruan Kota' ? 'selected' : '' }}>ULP
                                Pasuruan
                                Kota</option>
                            <option value="ULP Prigen"
                                {{ old('ulp', $dataPelanggan->ulp) === 'ULP Prigen' ? 'selected' : '' }}>ULP Prigen
                            </option>
                            <option value="ULP Probolinggo"
                                {{ old('ulp', $dataPelanggan->ulp) === 'ULP Probolinggo' ? 'selected' : '' }}>ULP
                                Probolinggo</option>
                            <option value="ULP Sukorejo"
                                {{ old('ulp', $dataPelanggan->ulp) === 'ULP Sukorejo' ? 'selected' : '' }}>ULP Sukorejo
                            </option>
                        </x-select-input>
                        <x-input-error :messages="$errors->get('ulp')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="jenis_permohonan" :value="__('Jenis Permohonan')" />
                        <x-select-input id="jenis_permohonan" class="block mt-1 w-full" name="jenis_permohonan"
                            required>
                            <option value="Migrasi"
                                {{ old('jenis_permohonan', $dataPelanggan->jenis_permohonan) === 'Migrasi' ? 'selected' : '' }}>
                                Migrasi</option>
                            <option value="Pasang Baru"
                                {{ old('jenis_permohonan', $dataPelanggan->jenis_permohonan) === 'Pasang Baru' ? 'selected' : '' }}>
                                Pasang Baru</option>
                            <option value="Perubahan Daya"
                                {{ old('jenis_permohonan', $dataPelanggan->jenis_permohonan) === 'Perubahan Daya' ? 'selected' : '' }}>
                                Perubahan Daya</option>
                        </x-select-input>
                        <x-input-error :messages="$errors->get('jenis_permohonan')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="tarif_lama" :value="__('Tarif Lama')" />
                        <x-select-input id="tarif_lama" class="block mt-1 w-full" name="tarif_lama">
                            <option value="B1"
                                {{ old('tarif_lama', $dataPelanggan->tarif_lama) === 'B1' ? 'selected' : '' }}>B1
                            </option>
                            <option value="B1T"
                                {{ old('tarif_lama', $dataPelanggan->tarif_lama) === 'B1T' ? 'selected' : '' }}>B1T
                            </option>
                            <option value="B2"
                                {{ old('tarif_lama', $dataPelanggan->tarif_lama) === 'B2' ? 'selected' : '' }}>B2
                            </option>
                            <option value="B2T"
                                {{ old('tarif_lama', $dataPelanggan->tarif_lama) === 'B2T' ? 'selected' : '' }}>B2T
                            </option>
                            <option value="B3"
                                {{ old('tarif_lama', $dataPelanggan->tarif_lama) === 'B3' ? 'selected' : '' }}>B3
                            </option>
                            <option value="I1"
                                {{ old('tarif_lama', $dataPelanggan->tarif_lama) === 'I1' ? 'selected' : '' }}>I1
                            </option>
                            <option value="I1T"
                                {{ old('tarif_lama', $dataPelanggan->tarif_lama) === 'I1T' ? 'selected' : '' }}>I1T
                            </option>
                            <option value="I2"
                                {{ old('tarif_lama', $dataPelanggan->tarif_lama) === 'I2' ? 'selected' : '' }}>I2
                            </option>
                            <option
                                value="I3"{{ old('tarif_lama', $dataPelanggan->tarif_lama) === 'I3' ? 'selected' : '' }}>
                                I3</option>
                            <option value="P1"
                                {{ old('tarif_lama', $dataPelanggan->tarif_lama) === 'P1' ? 'selected' : '' }}>P1
                            </option>
                            <option value="P1T"
                                {{ old('tarif_lama', $dataPelanggan->tarif_lama) === 'P1T' ? 'selected' : '' }}>P1T
                            </option>
                            <option value="P3"
                                {{ old('tarif_lama', $dataPelanggan->tarif_lama) === 'P3' ? 'selected' : '' }}>P3
                            </option>
                            <option value="R1"
                                {{ old('tarif_lama', $dataPelanggan->tarif_lama) === 'R1' ? 'selected' : '' }}>R1
                            </option>
                            <option value="R1M"
                                {{ old('tarif_lama', $dataPelanggan->tarif_lama) === 'R1M' ? 'selected' : '' }}>R1M
                            </option>
                            <option value="R1MT"
                                {{ old('tarif_lama', $dataPelanggan->tarif_lama) === 'R1MT' ? 'selected' : '' }}>R1MT
                            </option>
                            <option value="R1T"
                                {{ old('tarif_lama', $dataPelanggan->tarif_lama) === 'R1T' ? 'selected' : '' }}>R1T
                            </option>
                            <option value="R2"
                                {{ old('tarif_lama', $dataPelanggan->tarif_lama) === 'R2' ? 'selected' : '' }}>R2
                            </option>
                            <option value="R2T"
                                {{ old('tarif_lama', $dataPelanggan->tarif_lama) === 'R2T' ? 'selected' : '' }}>R2T
                            </option>
                            <option value="R3"
                                {{ old('tarif_lama', $dataPelanggan->tarif_lama) === 'R3' ? 'selected' : '' }}>R3
                            </option>
                            <option value="R3T"
                                {{ old('tarif_lama', $dataPelanggan->tarif_lama) === 'R3T' ? 'selected' : '' }}>R3T
                            </option>
                            <option value="S1"
                                {{ old('tarif_lama', $dataPelanggan->tarif_lama) === 'S1' ? 'selected' : '' }}>S1
                            </option>
                            <option value="S2"
                                {{ old('tarif_lama', $dataPelanggan->tarif_lama) === 'S2' ? 'selected' : '' }}>S2
                            </option>
                            <option value="S2T"
                                {{ old('tarif_lama', $dataPelanggan->tarif_lama) === 'S2T' ? 'selected' : '' }}>S2T
                            </option>
                            <option value="S3"
                                {{ old('tarif_lama', $dataPelanggan->tarif_lama) === 'S3' ? 'selected' : '' }}>S3
                            </option>
                        </x-select-input>
                        <x-input-error :messages="$errors->get('tarif_lama')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="daya_lama" :value="__('Daya Lama')" />
                        <x-text-input id="daya_lama" class="block mt-1 w-full"
                            value="{{ old('daya_lama', $dataPelanggan->daya_lama) }}" type="text" name="daya_lama"
                            autocomplete="daya_lama" />
                        <x-input-error :messages="$errors->get('daya_lama')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="tarif_baru" :value="__('Tarif Baru')" />
                        <x-select-input id="tarif_baru" class="block mt-1 w-full" name="tarif_baru" required>
                            <option value="B1"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'B1' ? 'selected' : '' }}>B1
                            </option>
                            <option value="B1T"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'B1T' ? 'selected' : '' }}>B1T
                            </option>
                            <option value="B2"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'B2' ? 'selected' : '' }}>B2
                            </option>
                            <option value="B2T"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'B2T' ? 'selected' : '' }}>B2T
                            </option>
                            <option value="I1"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'I1' ? 'selected' : '' }}>I1
                            </option>
                            <option value="I1T"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'I1T' ? 'selected' : '' }}>I1T
                            </option>
                            <option value="I2"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'I2' ? 'selected' : '' }}>I2
                            </option>
                            <option value="I2T"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'I2T' ? 'selected' : '' }}>I2T
                            </option>
                            <option value="I3"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'I3' ? 'selected' : '' }}>I3
                            </option>
                            <option value="L"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'L' ? 'selected' : '' }}>L
                            </option>
                            <option value="L2"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'L2' ? 'selected' : '' }}>L2
                            </option>
                            <option value="LB2"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'LB2' ? 'selected' : '' }}>LB2
                            </option>
                            <option value="LB2T"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'LB2T' ? 'selected' : '' }}>LB2T
                            </option>
                            <option value="LI2"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'LI2' ? 'selected' : '' }}>LI2
                            </option>
                            <option value="LT"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'LT' ? 'selected' : '' }}>LT
                            </option>
                            <option value="P1"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'P1' ? 'selected' : '' }}>P1
                            </option>
                            <option value="P1T"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'P1T' ? 'selected' : '' }}>P1T
                            </option>
                            <option value="P2"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'P2' ? 'selected' : '' }}>P2
                            </option>
                            <option value="P3"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'P3' ? 'selected' : '' }}>P3
                            </option>
                            <option value="P3T"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'P3T' ? 'selected' : '' }}>P3T
                            </option>
                            <option value="R1M"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'R1M' ? 'selected' : '' }}>R1M
                            </option>
                            <option value="R1MT"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'R1MT' ? 'selected' : '' }}>R1MT
                            </option>
                            <option value="R1T"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'R1T' ? 'selected' : '' }}>R1T
                            </option>
                            <option value="R2"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'R2' ? 'selected' : '' }}>R2
                            </option>
                            <option value="R2T"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'R2T' ? 'selected' : '' }}>R2T
                            </option>
                            <option value="R3"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'R3' ? 'selected' : '' }}>R3
                            </option>
                            <option value="R3T"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'R3T' ? 'selected' : '' }}>R3T
                            </option>
                            <option value="S2"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'S2' ? 'selected' : '' }}>S2
                            </option>
                            <option value="S2T"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'S2T' ? 'selected' : '' }}>S2T
                            </option>
                            <option value="S3"
                                {{ old('tarif_baru', $dataPelanggan->tarif_baru) === 'S3' ? 'selected' : '' }}>S3
                            </option>
                        </x-select-input>
                        <x-input-error :messages="$errors->get('tarif_baru')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="daya_baru" :value="__('Daya Baru')" />
                        <x-text-input id="daya_baru" class="block mt-1 w-full" name="daya_baru" type="text"
                            value="{{ old('daya_baru', $dataPelanggan->daya_baru) }}" required />
                        <x-input-error :messages="$errors->get('daya_baru')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="delta" :value="__('DELTA')" />
                        <x-text-input id="delta" class="block mt-1 w-full" name="delta"
                            placeholder="Daya Baru - Daya Lama" value="{{ old('delta', $dataPelanggan->delta) }}"
                            readonly />
                    </div>
                    <div>
                        <x-input-label for="jumlah_pelanggan" :value="__('Jumlah Pelanggan')" />
                        <x-text-input id="jumlah_pelanggan" class="block mt-1 w-full" type="number"
                            value="{{ old('jumlah_pelanggan', $dataPelanggan->jumlah_pelanggan) }}"
                            name="jumlah_pelanggan" required />
                    </div>
                    <div>
                        <x-input-label for="nilai_bp" :value="__('Nilai BP')" />
                        <x-text-input id="nilai_bp" class="block mt-1 w-full"
                            value="{{ old('nilai_bp', $dataPelanggan->nilai_bp) }}" type="text" name="nilai_bp"
                            readonly />
                    </div>
                    <div>
                        <x-input-label for="kepastian_pelanggan" :value="__('Kepastian Pelanggan')" />
                        <x-text-input id="kepastian_pelanggan" class="block mt-1 w-full" type="text"
                            name="kepastian_pelanggan"
                            value="{{ old('kepastian_pelanggan', $dataPelanggan->kepastian_pelanggan) }}" />
                    </div>
                    <div>
                        <x-input-label for="vendor" :value="__('Vendor')" />
                        <x-text-input id="vendor" class="block mt-1 w-full" type="text" name="vendor"
                            value="{{ old('vendor', $dataPelanggan->vendor) }}" />
                    </div>
                    <div>
                        <x-input-label for="lama_bayar" :value="__('Lama Bayar')" />
                        <x-text-input id="lama_bayar" class="block mt-1 w-full" type="text" name="lama_bayar"
                            value="{{ old('lama_bayar', $dataPelanggan->lama_bayar) }}" />
                    </div>
                    <div>
                        <x-input-label for="tgl_dpb_ulp" :value="__('Tanggal DPB (ULP)')" />
                        <x-date-input id="tgl_dpb_ulp" name="tgl_dpb_ulp" class="block mt-1 w-full"
                            value="{{ old('tgl_dpb_ulp', $dataPelanggan->tgl_dpb_ulp) }}" />
                    </div>
                    <div>
                        <x-input-label for="tgl_kajian_ren" :value="__('Tanggal Kajian (Ren)')" />
                        <x-date-input id="tgl_kajian_ren" name="tgl_kajian_ren" class="block mt-1 w-full"
                            value="{{ old('tgl_kajian_ren', $dataPelanggan->tgl_kajian_ren) }}" />
                    </div>
                    <div>
                        <x-input-label for="tgl_logistik_kons" :value="__('Tanggal Logistik (Kons)')" />
                        <x-date-input id="tgl_logistik_kons" name="tgl_logistik_kons" class="block mt-1 w-full"
                            value="{{ old('tgl_logistik_kons', $dataPelanggan->tgl_logistik_kons) }}" />
                    </div>
                    <div>
                        <x-input-label for="tgl_reservasi_kons" :value="__('Tanggal Reservasi (Kons)')" />
                        <x-date-input id="tgl_reservasi_kons" name="tgl_reservasi_kons" class="block mt-1 w-full"
                            value="{{ old('tgl_reservasi_kons', $dataPelanggan->tgl_reservasi_kons) }}" />
                    </div>
                    <div>
                        <x-input-label for="tgl_register_pp" :value="__('Tanggal Register (PP)')" />
                        <x-date-input id="tgl_register_pp" name="tgl_register_pp" class="block mt-1 w-full"
                            value="{{ old('tgl_register_pp', $dataPelanggan->tgl_register_pp) }}" />
                    </div>
                    <div>
                        <x-input-label for="tgl_bayar_pp" :value="__('Tanggal Bayar (PP)')" />
                        <x-date-input id="tgl_bayar_pp" name="tgl_bayar_pp" class="block mt-1 w-full"
                            value="{{ old('tgl_bayar_pp', $dataPelanggan->tgl_bayar_pp) }}" />
                    </div>
                    <div>
                        <x-input-label for="tgl_pdl_pp" :value="__('Tanggal PDL (PP)')" />
                        <x-date-input id="tgl_pdl_pp" name="tgl_pdl_pp" class="block mt-1 w-full"
                            value="{{ old('tgl_pdl_pp', $dataPelanggan->tgl_pdl_pp) }}" />
                    </div>
                </div>
                <div class="my-2">
                    <x-input-label for="foto_survei" :value="__('Gambar Survei Sebelumnya')" />
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
                <div class="mt-2 mb-4">
                    <x-input-label for="foto_survei" :value="__('Update Gambar Survei')" />
                    <x-text-input id="foto_survei" name="foto_survei[]" class="block mt-1 p-2 w-full border"
                        type="file" multiple />
                    <small class="text-base text-red-600 dark:text-red-500 font-semibold">Dapat unggah lebih dari 1
                        foto dengan ukuran maksimal setiap
                        foto 3 MB</small>
                    <x-input-error :messages="$errors->get('foto_survei.*')" class="mt-2" />
                </div>
                <div class="my-2">
                    <x-input-label for="" :value="__('Update Pemesanan Material')" class="my-2" />
                    <div class="p-2 border rounded-md shadow-sm">
                        @include('up3.tl-rensis.pelanggan.tables.edit-table-pasang')
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

    const daya_lama = document.getElementById('daya_lama');
    const daya_baru = document.getElementById('daya_baru');
    const delta = document.getElementById('delta');
    const jumlah_pelanggan = document.getElementById('jumlah_pelanggan');
    const tarif_baru = document.getElementById('tarif_baru');
    const nilai_bp = document.getElementById('nilai_bp')

    function rumusDeltaNilaiBP() {
        const daya_lamaValue = daya_lama.value.replace(/[^\d]/g, '');
        const daya_baruValue = daya_baru.value.replace(/[^\d]/g, '');
        const tarif_baruValue = tarif_baru.value.charAt(0);
        const jumlah_pelangganValue = jumlah_pelanggan.value;

        const daya_lamaParse = parseInt(daya_lamaValue) || 0;
        const daya_baruParse = parseInt(daya_baruValue) || 0;

        const deltaParse = (daya_baruParse - daya_lamaParse) * jumlah_pelangganValue;
        //console.log(deltaParse);
        let deltaValue = new Intl.NumberFormat("id-ID").format(deltaParse);
        delta.value = deltaValue;
        // console.log(typeof deltaValue);

        if (daya_baruParse < 2500) {
            const nilai_bpParse = deltaParse * 937;
            let nilai_bpValue = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(nilai_bpParse);
            nilai_bp.value = nilai_bpValue;
        } else if (daya_baruParse > 200000) {
            const nilai_bpParse = deltaParse * 631;
            let nilai_bpValue = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(nilai_bpParse);
            nilai_bp.value = nilai_bpValue;
        } else {
            if ((tarif_baruValue === 'B' || tarif_baruValue === 'I') && daya_baruParse > 100000 && daya_baruParse <
                200000) {
                const nilai_bpParse = deltaParse * 775;
                let nilai_bpValue = new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR"
                }).format(nilai_bpParse);
                nilai_bp.value = nilai_bpValue;
            } else if (deltaParse > 0) {
                const nilai_bpParse = deltaParse * 969;
                let nilai_bpValue = new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR"
                }).format(nilai_bpParse);
                nilai_bp.value = nilai_bpValue;
            } else {
                nilai_bp.value = new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR"
                }).format(0);
            }
        }
    }

    daya_lama.addEventListener('input', rumusDeltaNilaiBP);
    daya_baru.addEventListener('input', rumusDeltaNilaiBP);
    tarif_baru.addEventListener('input', rumusDeltaNilaiBP);
    delta.addEventListener('input', rumusDeltaNilaiBP);
    jumlah_pelanggan.addEventListener('input', rumusDeltaNilaiBP);


    function formatAngkaRibuan(inputElement) {
        inputElement.addEventListener('input', function() {
            let valueInput = inputElement.value;
            valueInput = valueInput.replace(/[^\d]/g, '');
            const formatValue = parseInt(valueInput);

            // Memeriksa apakah angka adalah NaN (tidak valid)
            if (!isNaN(formatValue)) {
                // Memformat angka ke dalam format ribuan
                const formatInput = new Intl.NumberFormat("id-ID").format(
                    formatValue); // id-ID untuk format rupiah
                inputElement.value = formatInput;

            } else {
                // Jika input tidak valid, tampilkan pesan kesalahan
                inputElement.value = '0';
            }
        });
    }

    formatAngkaRibuan(daya_lama);
    formatAngkaRibuan(daya_baru);
</script>
