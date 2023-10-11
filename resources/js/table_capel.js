import DataTable from "datatables.net-dt";

// TABLE DATA CALON PELANGGAN MANAGER PERENCANAAN
let tableCaPelMNGRRen = new DataTable("#capel-mngr-ren", {
    responsive: true,
    columns: [
        {
            data: "DT_RowIndex",
            name: "id",
            className: "border dark:border-slate-400 text-center",
        },
        {
            data: "nama_pelanggan",
            name: "nama_pelanggan",
            className: "border dark:border-slate-400 text-center",
        },
        {
            data: "alamat_pelanggan",
            name: "alamat_pelanggan",
            className: "border dark:border-slate-400 text-center",
        },
        {
            data: "jumlah_pelanggan",
            name: "jumlah_pelanggan",
            className: "border dark:border-slate-400 text-center",
        },
        {
            data: "ulp",
            name: "ulp",
            className: "border dark:border-slate-400 text-center",
        },
        {
            data: "jenis_permohonan",
            name: "jenis_permohonan",
            className: "border dark:border-slate-400 text-center",
        },
        {
            data: "delta",
            name: "delta",
            className: "border dark:border-slate-400 text-center",
            render: function (data, type, row) {
                return new Intl.NumberFormat("id-ID").format(data);
            },
        },
        {
            data: "nilai_bp",
            name: "nilai_bp",
            className: "border dark:border-slate-400 text-center",
            render: function (data, type, row) {
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                }).format(data);
            },
        },
        {
            data: "tindakan",
            orderable: false,
            searchable: false,
            className: "border dark:border-slate-400",
        },
    ],
    ajax: {
        url: "/capel-mngr-ren",
        type: "GET",
        dataType: "json",
    },
});

setInterval(() => {
    tableCaPelMNGRRen.ajax.reload();
}, 5000);
