import DataTable from "datatables.net-dt";

let tableIndexHargaPasangTLRensis = new DataTable("#index-hargapasang-rensis", {
    processing: true,
    responsive: true,
    serverSide: true,
    destroy: true,
    scrollX: true,
    ajax: {
        url: base_url + "/index-hargapasang-rensis",
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
            data: "material",
            name: "material",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
        },
        {
            data: "satuan",
            name: "satuan",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
        },
        {
            data: "rp_mdu",
            name: "rp_mdu",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
            render: function (data, type, row) {
                // Format data sebagai nominal rupiah
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                }).format(row.rp_mdu);
            },
        },
        {
            data: "rp_non_mdu_dan_jasa",
            name: "rp_non_mdu_dan_jasa",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
            render: function (data, type, row) {
                // Format data sebagai nominal rupiah
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                }).format(row.rp_non_mdu_dan_jasa);
            },
        },
        {
            data: "rp_jasa",
            name: "rp_jasa",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
            render: function (data, type, row) {
                // Format data sebagai nominal rupiah
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                }).format(row.rp_jasa);
            },
        },
        {
            data: "rp_total",
            name: "rp_total",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
            render: function (data, type, row) {
                // Format data sebagai nominal rupiah
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                }).format(row.rp_total);
            },
        },
        {
            data: "klasifikasi",
            name: "klasifikasi",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
        },
    ],
});

let tableIndexHargaPasangTLTeknik = new DataTable("#index-hargapasang-teknik", {
    processing: true,
    responsive: true,
    serverSide: true,
    destroy: true,
    scrollX: true,
    ajax: {
        url: base_url + "/index-hargapasang-teknik",
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
            data: "material",
            name: "material",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
        },
        {
            data: "satuan",
            name: "satuan",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
        },
        {
            data: "rp_mdu",
            name: "rp_mdu",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
            render: function (data, type, row) {
                // Format data sebagai nominal rupiah
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                }).format(row.rp_mdu);
            },
        },
        {
            data: "rp_non_mdu_dan_jasa",
            name: "rp_non_mdu_dan_jasa",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
            render: function (data, type, row) {
                // Format data sebagai nominal rupiah
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                }).format(row.rp_non_mdu_dan_jasa);
            },
        },
        {
            data: "rp_jasa",
            name: "rp_jasa",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
            render: function (data, type, row) {
                // Format data sebagai nominal rupiah
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                }).format(row.rp_jasa);
            },
        },
        {
            data: "rp_total",
            name: "rp_total",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
            render: function (data, type, row) {
                // Format data sebagai nominal rupiah
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                }).format(row.rp_total);
            },
        },
        {
            data: "klasifikasi",
            name: "klasifikasi",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
        },
    ],
});

let tableIndexHargaPasangMNGRUnit = new DataTable("#index-hargapasang-unit", {
    processing: true,
    responsive: true,
    serverSide: true,
    destroy: true,
    scrollX: true,
    ajax: {
        url: base_url + "/index-hargapasang-unit",
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
            data: "material",
            name: "material",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
        },
        {
            data: "satuan",
            name: "satuan",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
        },
        {
            data: "rp_mdu",
            name: "rp_mdu",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
            render: function (data, type, row) {
                // Format data sebagai nominal rupiah
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                }).format(row.rp_mdu);
            },
        },
        {
            data: "rp_non_mdu_dan_jasa",
            name: "rp_non_mdu_dan_jasa",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
            render: function (data, type, row) {
                // Format data sebagai nominal rupiah
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                }).format(row.rp_non_mdu_dan_jasa);
            },
        },
        {
            data: "rp_jasa",
            name: "rp_jasa",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
            render: function (data, type, row) {
                // Format data sebagai nominal rupiah
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                }).format(row.rp_jasa);
            },
        },
        {
            data: "rp_total",
            name: "rp_total",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
            render: function (data, type, row) {
                // Format data sebagai nominal rupiah
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                }).format(row.rp_total);
            },
        },
        {
            data: "klasifikasi",
            name: "klasifikasi",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
        },
    ],
});

let tableIndexHargaPasangMNGRRen = new DataTable("#index-hargapasang-ren", {
    processing: true,
    responsive: true,
    serverSide: true,
    destroy: true,
    scrollX: true,
    ajax: {
        url: base_url + "/index-hargapasang-ren",
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
            data: "material",
            name: "material",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
        },
        {
            data: "satuan",
            name: "satuan",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
        },
        {
            data: "rp_mdu",
            name: "rp_mdu",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
            render: function (data, type, row) {
                // Format data sebagai nominal rupiah
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                }).format(row.rp_mdu);
            },
        },
        {
            data: "rp_non_mdu_dan_jasa",
            name: "rp_non_mdu_dan_jasa",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
            render: function (data, type, row) {
                // Format data sebagai nominal rupiah
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                }).format(row.rp_non_mdu_dan_jasa);
            },
        },
        {
            data: "rp_jasa",
            name: "rp_jasa",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
            render: function (data, type, row) {
                // Format data sebagai nominal rupiah
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                }).format(row.rp_jasa);
            },
        },
        {
            data: "rp_total",
            name: "rp_total",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
            render: function (data, type, row) {
                // Format data sebagai nominal rupiah
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                }).format(row.rp_total);
            },
        },
        {
            data: "klasifikasi",
            name: "klasifikasi",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
        },
    ],
});
