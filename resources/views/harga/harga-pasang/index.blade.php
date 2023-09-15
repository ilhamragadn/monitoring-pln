<x-app-layout>
    <div class="mt-16 p-4 border border-white">
        <div
            class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-white">
            <div class="p-4 text-gray-900 dark:text-gray-100">
                <table id="hargapasang-tabel"
                    class="table-auto border-collapse border border-slate-500 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="border border-slate-600 px-6 py-3" scope="col">NO.</th>
                            <th class="border border-slate-600 px-6 py-3" scope="col">MATERIAL</th>
                            <th class="border border-slate-600 px-6 py-3" scope="col">SATUAN</th>
                            <th class="border border-slate-600 px-6 py-3" scope="col">RP MDU</th>
                            <th class="border border-slate-600 px-6 py-3" scope="col">RP NON MDU & JASA</th>
                            <th class="border border-slate-600 px-6 py-3" scope="col">RP JASA</th>
                            <th class="border border-slate-600 px-6 py-3" scope="col">RP TOTAL</th>
                            <th class="border border-slate-600 px-6 py-3" scope="col">KLASIFIKASI</th>
                            <th class="border border-slate-600 px-6 py-3" scope="col">TINDAKAN</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    $(function() {
        $('#hargapasang-tabel').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('harga-pasang.data') }}',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'material',
                    name: 'material'
                },
                {
                    data: 'satuan',
                    name: 'satuan'
                },
                {
                    data: 'rp_mdu',
                    name: 'rp_mdu'
                },
                {
                    data: 'rp_non_mdu_dan_jasa',
                    name: 'rp_non_mdu_dan_jasa'
                },
                {
                    data: 'jasa',
                    name: 'jasa'
                },
                {
                    data: 'rp_total',
                    name: 'rp_total'
                },
                {
                    data: 'klasifikasi',
                    name: 'klasifikasi'
                },
            ]
        });
    });
</script>
