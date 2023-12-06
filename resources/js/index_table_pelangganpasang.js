import DataTable from "datatables.net-dt";

let tableIndexPelangganPasangTLRensis = new DataTable(
    "#index-pelangganpasang-rensis",
    {
        processing: true,
        responsive: true,
        serverSide: true,
        destroy: true,
        scrollX: true,
        ajax: {
            url: base_url + "/index-dapel-rensis",
            type: "get",
            dataType: "json",
            data: {
                _token: web_token,
            },
        },
        columns: [
            {
                data: "DT_RowIndex",
                name: "id",
                searchable: false,
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "tindakan",
                orderable: false,
                searchable: false,
                className: "whitespace-nowrap border-b dark:border-slate-400",
            },
            {
                data: "nama_pelanggan",
                name: "nama_pelanggan",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "alamat_pelanggan",
                name: "alamat_pelanggan",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "jumlah_pelanggan",
                name: "jumlah_pelanggan",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "ulp",
                name: "ulp",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "jenis_permohonan",
                name: "jenis_permohonan",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "delta",
                name: "delta",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
                render: function (data, type, row) {
                    return new Intl.NumberFormat("id-ID").format(data);
                },
            },
            {
                data: "nilai_bp",
                name: "nilai_bp",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
                render: function (data, type, row) {
                    return new Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR",
                    }).format(data);
                },
            },
        ],
    }
);

let tableIndexPelangganPasangTLTeknik = new DataTable(
    "#index-pelangganpasang-teknik",
    {
        processing: true,
        responsive: true,
        serverSide: true,
        destroy: true,
        scrollX: true,
        ajax: {
            url: base_url + "/index-dapel-teknik",
            type: "get",
            dataType: "json",
            data: {
                _token: web_token,
            },
        },
        columns: [
            {
                data: "DT_RowIndex",
                name: "id",
                searchable: false,
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "tindakan",
                orderable: false,
                searchable: false,
                className: "whitespace-nowrap border-b dark:border-slate-400",
            },
            {
                data: "nama_pelanggan",
                name: "nama_pelanggan",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "alamat_pelanggan",
                name: "alamat_pelanggan",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "jumlah_pelanggan",
                name: "jumlah_pelanggan",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "ulp",
                name: "ulp",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "jenis_permohonan",
                name: "jenis_permohonan",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "delta",
                name: "delta",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
                render: function (data, type, row) {
                    return new Intl.NumberFormat("id-ID").format(data);
                },
            },
            {
                data: "nilai_bp",
                name: "nilai_bp",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
                render: function (data, type, row) {
                    return new Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR",
                    }).format(data);
                },
            },
        ],
    }
);

let tableIndexPelangganPasangMNGRUnit = new DataTable(
    "#index-pelangganpasang-unit",
    {
        processing: true,
        responsive: true,
        serverSide: true,
        destroy: true,
        scrollX: true,
        ajax: {
            url: base_url + "/index-dapel-unit",
            type: "get",
            dataType: "json",
            data: {
                _token: web_token,
            },
        },
        columns: [
            {
                data: "DT_RowIndex",
                name: "id",
                searchable: false,
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "tindakan",
                orderable: false,
                searchable: false,
                className: "whitespace-nowrap border-b dark:border-slate-400",
            },
            {
                data: "nama_pelanggan",
                name: "nama_pelanggan",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "alamat_pelanggan",
                name: "alamat_pelanggan",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "jumlah_pelanggan",
                name: "jumlah_pelanggan",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "ulp",
                name: "ulp",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "jenis_permohonan",
                name: "jenis_permohonan",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "delta",
                name: "delta",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
                render: function (data, type, row) {
                    return new Intl.NumberFormat("id-ID").format(data);
                },
            },
            {
                data: "nilai_bp",
                name: "nilai_bp",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
                render: function (data, type, row) {
                    return new Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR",
                    }).format(data);
                },
            },
        ],
    }
);

let tableIndexPelangganPasangMNGRRen = new DataTable(
    "#index-pelangganpasang-ren",
    {
        processing: true,
        responsive: true,
        serverSide: true,
        destroy: true,
        scrollX: true,
        ajax: {
            url: base_url + "/index-dapel-ren",
            type: "get",
            dataType: "json",
            data: {
                _token: web_token,
            },
        },
        columns: [
            {
                data: "DT_RowIndex",
                name: "id",
                searchable: false,
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "tindakan",
                orderable: false,
                searchable: false,
                className: "whitespace-nowrap border-b dark:border-slate-400",
            },
            {
                data: "nama_pelanggan",
                name: "nama_pelanggan",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "alamat_pelanggan",
                name: "alamat_pelanggan",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "jumlah_pelanggan",
                name: "jumlah_pelanggan",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "ulp",
                name: "ulp",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "jenis_permohonan",
                name: "jenis_permohonan",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "delta",
                name: "delta",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
                render: function (data, type, row) {
                    return new Intl.NumberFormat("id-ID").format(data);
                },
            },
            {
                data: "nilai_bp",
                name: "nilai_bp",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
                render: function (data, type, row) {
                    return new Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR",
                    }).format(data);
                },
            },
        ],
    }
);
