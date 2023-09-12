<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Harga MDU</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">

    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <x-sidebar></x-sidebar>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-3 bg-slate-400 border border-gray-200">
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
    </body>

</html>
<script>
    $(function() {
        $('#hargapasang-tabel').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('harga.data') }}',
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
