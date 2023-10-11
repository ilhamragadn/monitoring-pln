import DataTable from "datatables.net-dt";

// TABLE DATA HARGA BONGKAR MANAGER PERENCANAAN
let tableHargaBongkarMNGRRen = new DataTable("#hargabongkar-mngr-ren", {
    responsive: true,
    columns: [
        {
            data: "DT_RowIndex",
            name: "id",
            className: "border dark:border-slate-400 text-center",
        },
        {
            data: "material",
            name: "material",
            className: "border dark:border-slate-400 text-center",
        },
        {
            data: "satuan",
            name: "satuan",
            className: "border dark:border-slate-400 text-center",
        },
        {
            data: "rp_mdu",
            name: "rp_mdu",
            className: "border dark:border-slate-400 text-center",
            render: function (data, type, row) {
                // Format data sebagai nominal rupiah
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                }).format(data);
            },
        },
        {
            data: "rp_non_mdu_dan_jasa",
            name: "rp_non_mdu_dan_jasa",
            className: "border dark:border-slate-400 text-center",
            render: function (data, type, row) {
                // Format data sebagai nominal rupiah
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                }).format(data);
            },
        },
        {
            data: "rp_jasa",
            name: "rp_jasa",
            className: "border dark:border-slate-400 text-center",
            render: function (data, type, row) {
                // Format data sebagai nominal rupiah
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                }).format(data);
            },
        },
        {
            data: "rp_total",
            name: "rp_total",
            className: "border dark:border-slate-400 text-center",
            render: function (data, type, row) {
                // Format data sebagai nominal rupiah
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                }).format(data);
            },
        },
        {
            data: "klasifikasi",
            name: "klasifikasi",
            className: "border dark:border-slate-400 text-center",
        },
        {
            data: "tindakan",
            orderable: false,
            searchable: false,
            className: "border dark:border-slate-400",
        },
    ],
    ajax: {
        url: "/hargabongkar-mngr-ren",
        type: "GET",
        dataType: "json",
    },
});

setInterval(() => {
    tableHargaBongkarMNGRRen.ajax.reload();
}, 5000);
