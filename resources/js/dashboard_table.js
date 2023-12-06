import DataTable from "datatables.net-dt";

let tableDashboardPersetujuanRen = new DataTable(
    "#dashboard-rensis-persetujuan-ren",
    {
        processing: true,
        responsive: true,
        serverSide: true,
        destroy: true,
        scrollX: true,
        ajax: {
            url: base_url + "/dashboard-rensis-persetujuan-ren",
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
                data: "persetujuan_ren",
                name: "persetujuan_ren",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
                render: function (data, type, row) {
                    if (row.persetujuan_ren == "SETUJU") {
                        return (
                            '<h5 class="text-green-500 font-semibold">' +
                            row.persetujuan_ren +
                            "</h5>"
                        );
                    } else {
                        return (
                            '<h5 class="text-red-500 font-semibold">' +
                            row.persetujuan_ren +
                            "</h5>"
                        );
                    }
                },
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

let tableDashboardPersetujuanRensis = new DataTable(
    "#dashboard-rensis-persetujuan-rensis",
    {
        processing: true,
        responsive: true,
        serverSide: true,
        destroy: true,
        scrollX: true,
        ajax: {
            url: base_url + "/dashboard-rensis-persetujuan-rensis",
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
                data: "persetujuan_rensis",
                name: "persetujuan_rensis",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
                render: function (data, type, row) {
                    if (row.persetujuan_rensis == "SETUJU") {
                        return (
                            '<h5 class="text-green-500 font-semibold">' +
                            row.persetujuan_rensis +
                            "</h5>"
                        );
                    } else if (row.persetujuan_rensis == "TUNGGU") {
                        return (
                            '<h5 class="text-blue-500 font-semibold">' +
                            row.persetujuan_rensis +
                            "</h5>"
                        );
                    } else {
                        return (
                            '<h5 class="text-red-500 font-semibold">' +
                            row.persetujuan_rensis +
                            "</h5>"
                        );
                    }
                },
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

let tableDashboardRensisProgress = new DataTable("#dashboard-rensis-progress", {
    processing: true,
    responsive: true,
    serverSide: true,
    destroy: true,
    scrollX: true,
    ajax: {
        url: base_url + "/dashboard-rensis-progress",
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
            data: "persetujuan_unit",
            name: "persetujuan_unit",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
            render: function (data, type, row) {
                if (row.persetujuan_unit == "SETUJU") {
                    return (
                        '<h5 class="text-green-500 font-semibold">' +
                        row.persetujuan_unit +
                        "</h5>"
                    );
                } else if (row.persetujuan_unit == "TUNGGU") {
                    return (
                        '<h5 class="text-blue-500 font-semibold">' +
                        row.persetujuan_unit +
                        "</h5>"
                    );
                } else {
                    return (
                        '<h5 class="text-red-500 font-semibold">' +
                        row.persetujuan_unit +
                        "</h5>"
                    );
                }
            },
        },
        {
            data: "persetujuan_rensis",
            name: "persetujuan_rensis",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
            render: function (data, type, row) {
                if (row.persetujuan_rensis == "SETUJU") {
                    return (
                        '<h5 class="text-green-500 font-semibold">' +
                        row.persetujuan_rensis +
                        "</h5>"
                    );
                } else if (
                    row.persetujuan_unit == "TOLAK" &&
                    row.persetujuan_rensis == "TUNGGU"
                ) {
                    return (
                        '<h5 class="text-gray-300 font-semibold flex justify-center">' +
                        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10">' +
                        '<path fill-rule="evenodd" d="M3.75 12a.75.75 0 01.75-.75h15a.75.75 0 010 1.5h-15a.75.75 0 01-.75-.75z" clip-rule="evenodd" />' +
                        "</svg>" +
                        "</h5>"
                    );
                } else if (
                    row.persetujuan_unit == "SETUJU" &&
                    row.persetujuan_rensis == "TUNGGU"
                ) {
                    return (
                        '<h5 class="text-blue-500 font-semibold">' +
                        row.persetujuan_rensis +
                        "</h5>"
                    );
                } else if (
                    row.persetujuan_unit == "TUNGGU" &&
                    row.persetujuan_rensis == "TUNGGU"
                ) {
                    return (
                        '<h5 class="text-blue-500 font-semibold">' +
                        row.persetujuan_rensis +
                        "</h5>"
                    );
                } else {
                    return (
                        '<h5 class="text-red-500 font-semibold">' +
                        row.persetujuan_rensis +
                        "</h5>"
                    );
                }
            },
        },
        {
            data: "persetujuan_ren",
            name: "persetujuan_ren",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
            render: function (data, type, row) {
                if (row.persetujuan_ren == "SETUJU") {
                    return (
                        '<h5 class="text-green-500 font-semibold">' +
                        row.persetujuan_ren +
                        "</h5>"
                    );
                } else if (
                    row.persetujuan_unit == "TUNGGU" &&
                    row.persetujuan_rensis == "TUNGGU"
                ) {
                    return (
                        '<h5 class="text-blue-500 font-semibold">' +
                        row.persetujuan_ren +
                        "</h5>"
                    );
                } else if (
                    row.persetujuan_unit == "SETUJU" &&
                    row.persetujuan_rensis == "TUNGGU"
                ) {
                    return (
                        '<h5 class="text-blue-500 font-semibold">' +
                        row.persetujuan_ren +
                        "</h5>"
                    );
                } else if (
                    row.persetujuan_unit == "TOLAK" &&
                    row.persetujuan_rensis == "TUNGGU"
                ) {
                    return (
                        '<h5 class="text-gray-300 font-semibold flex justify-center">' +
                        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10">' +
                        '<path fill-rule="evenodd" d="M3.75 12a.75.75 0 01.75-.75h15a.75.75 0 010 1.5h-15a.75.75 0 01-.75-.75z" clip-rule="evenodd" />' +
                        "</svg>" +
                        "</h5>"
                    );
                } else if (
                    row.persetujuan_unit == "SETUJU" &&
                    row.persetujuan_rensis == "TOLAK"
                ) {
                    return (
                        '<h5 class="text-gray-300 font-semibold flex justify-center">' +
                        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10">' +
                        '<path fill-rule="evenodd" d="M3.75 12a.75.75 0 01.75-.75h15a.75.75 0 010 1.5h-15a.75.75 0 01-.75-.75z" clip-rule="evenodd" />' +
                        "</svg>" +
                        "</h5>"
                    );
                } else if (
                    row.persetujuan_unit == "SETUJU" &&
                    row.persetujuan_rensis == "SETUJU" &&
                    row.persetujuan_ren == "TUNGGU"
                ) {
                    return (
                        '<h5 class="text-blue-500 font-semibold">' +
                        row.persetujuan_ren +
                        "</h5>"
                    );
                } else {
                    return (
                        '<h5 class="text-red-500 font-semibold">' +
                        row.persetujuan_ren +
                        "</h5>"
                    );
                }
            },
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
});

let tableDashboardUnitPersetujuanKonfirmasi = new DataTable(
    "#dashboard-unit-persetujuan-terkonfirmasi",
    {
        processing: true,
        responsive: true,
        serverSide: true,
        destroy: true,
        scrollX: true,
        ajax: {
            url: base_url + "/dashboard-unit-persetujuan-terkonfirmasi",
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
                data: "persetujuan_unit",
                name: "persetujuan_unit",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
                render: function (data, type, row) {
                    if (row.persetujuan_unit == "SETUJU") {
                        return (
                            '<h5 class="text-green-500 font-semibold">' +
                            row.persetujuan_unit +
                            "</h5>"
                        );
                    } else {
                        return (
                            '<h5 class="text-red-500 font-semibold">' +
                            row.persetujuan_unit +
                            "</h5>"
                        );
                    }
                },
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

let tableDashboardUnitPersetujuanTunggu = new DataTable(
    "#dashboard-unit-persetujuan-tunggu",
    {
        processing: true,
        responsive: true,
        serverSide: true,
        destroy: true,
        scrollX: true,
        ajax: {
            url: base_url + "/dashboard-unit-persetujuan-tunggu",
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
                data: "persetujuan_unit",
                name: "persetujuan_unit",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
                render: function (data, type, row) {
                    if (row.persetujuan_unit == "TUNGGU") {
                        return (
                            '<h5 class="text-blue-500 font-semibold">' +
                            "BELUM DIKONFIRMASI" +
                            "</h5>"
                        );
                    }
                },
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

let tableDashboardTeknikProgress = new DataTable("#dashboard-teknik-progress", {
    processing: true,
    responsive: true,
    serverSide: true,
    destroy: true,
    scrollX: true,
    ajax: {
        url: base_url + "/dashboard-teknik-progress",
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
            data: "persetujuan_unit",
            name: "persetujuan_unit",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
            render: function (data, type, row) {
                if (row.persetujuan_unit == "SETUJU") {
                    return (
                        '<h5 class="text-green-500 font-semibold">' +
                        row.persetujuan_unit +
                        "</h5>"
                    );
                } else if (row.persetujuan_unit == "TUNGGU") {
                    return (
                        '<h5 class="text-blue-500 font-semibold">' +
                        row.persetujuan_unit +
                        "</h5>"
                    );
                } else {
                    return (
                        '<h5 class="text-red-500 font-semibold">' +
                        row.persetujuan_unit +
                        "</h5>"
                    );
                }
            },
        },
        {
            data: "persetujuan_rensis",
            name: "persetujuan_rensis",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
            render: function (data, type, row) {
                if (row.persetujuan_rensis == "SETUJU") {
                    return (
                        '<h5 class="text-green-500 font-semibold">' +
                        row.persetujuan_rensis +
                        "</h5>"
                    );
                } else if (
                    row.persetujuan_unit == "TOLAK" &&
                    row.persetujuan_rensis == "TUNGGU"
                ) {
                    return (
                        '<h5 class="text-gray-300 font-semibold flex justify-center">' +
                        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10">' +
                        '<path fill-rule="evenodd" d="M3.75 12a.75.75 0 01.75-.75h15a.75.75 0 010 1.5h-15a.75.75 0 01-.75-.75z" clip-rule="evenodd" />' +
                        "</svg>" +
                        "</h5>"
                    );
                } else if (
                    row.persetujuan_unit == "SETUJU" &&
                    row.persetujuan_rensis == "TUNGGU"
                ) {
                    return (
                        '<h5 class="text-blue-500 font-semibold">' +
                        row.persetujuan_rensis +
                        "</h5>"
                    );
                } else if (
                    row.persetujuan_unit == "TUNGGU" &&
                    row.persetujuan_rensis == "TUNGGU"
                ) {
                    return (
                        '<h5 class="text-blue-500 font-semibold">' +
                        row.persetujuan_rensis +
                        "</h5>"
                    );
                } else {
                    return (
                        '<h5 class="text-red-500 font-semibold">' +
                        row.persetujuan_rensis +
                        "</h5>"
                    );
                }
            },
        },
        {
            data: "persetujuan_ren",
            name: "persetujuan_ren",
            className:
                "whitespace-nowrap text-center border-b dark:border-slate-400",
            render: function (data, type, row) {
                if (row.persetujuan_ren == "SETUJU") {
                    return (
                        '<h5 class="text-green-500 font-semibold">' +
                        row.persetujuan_ren +
                        "</h5>"
                    );
                } else if (
                    row.persetujuan_unit == "TUNGGU" &&
                    row.persetujuan_rensis == "TUNGGU"
                ) {
                    return (
                        '<h5 class="text-blue-500 font-semibold">' +
                        row.persetujuan_ren +
                        "</h5>"
                    );
                } else if (
                    row.persetujuan_unit == "SETUJU" &&
                    row.persetujuan_rensis == "TUNGGU"
                ) {
                    return (
                        '<h5 class="text-blue-500 font-semibold">' +
                        row.persetujuan_ren +
                        "</h5>"
                    );
                } else if (
                    row.persetujuan_unit == "TOLAK" &&
                    row.persetujuan_rensis == "TUNGGU"
                ) {
                    return (
                        '<h5 class="text-gray-300 font-semibold flex justify-center">' +
                        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10">' +
                        '<path fill-rule="evenodd" d="M3.75 12a.75.75 0 01.75-.75h15a.75.75 0 010 1.5h-15a.75.75 0 01-.75-.75z" clip-rule="evenodd" />' +
                        "</svg>" +
                        "</h5>"
                    );
                } else if (
                    row.persetujuan_unit == "SETUJU" &&
                    row.persetujuan_rensis == "TOLAK"
                ) {
                    return (
                        '<h5 class="text-gray-300 font-semibold flex justify-center">' +
                        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10">' +
                        '<path fill-rule="evenodd" d="M3.75 12a.75.75 0 01.75-.75h15a.75.75 0 010 1.5h-15a.75.75 0 01-.75-.75z" clip-rule="evenodd" />' +
                        "</svg>" +
                        "</h5>"
                    );
                } else if (
                    row.persetujuan_unit == "SETUJU" &&
                    row.persetujuan_rensis == "SETUJU" &&
                    row.persetujuan_ren == "TUNGGU"
                ) {
                    return (
                        '<h5 class="text-blue-500 font-semibold">' +
                        row.persetujuan_ren +
                        "</h5>"
                    );
                } else {
                    return (
                        '<h5 class="text-red-500 font-semibold">' +
                        row.persetujuan_ren +
                        "</h5>"
                    );
                }
            },
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
});

let tableDashboardRenPersetujuanKonfirmasi = new DataTable(
    "#dashboard-ren-persetujuan-terkonfirmasi",
    {
        processing: true,
        responsive: true,
        serverSide: true,
        destroy: true,
        scrollX: true,
        ajax: {
            url: base_url + "/dashboard-ren-persetujuan-terkonfirmasi",
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
                data: "persetujuan_ren",
                name: "persetujuan_ren",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
                render: function (data, type, row) {
                    if (row.persetujuan_ren == "SETUJU") {
                        return (
                            '<h5 class="text-green-500 font-semibold">' +
                            row.persetujuan_ren +
                            "</h5>"
                        );
                    } else {
                        return (
                            '<h5 class="text-red-500 font-semibold">' +
                            row.persetujuan_ren +
                            "</h5>"
                        );
                    }
                },
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

let tableDashboardRenPersetujuanTunggu = new DataTable(
    "#dashboard-ren-persetujuan-tunggu",
    {
        processing: true,
        responsive: true,
        serverSide: true,
        destroy: true,
        scrollX: true,
        ajax: {
            url: base_url + "/dashboard-ren-persetujuan-tunggu",
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
                data: "persetujuan_ren",
                name: "persetujuan_ren",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
                render: function (data, type, row) {
                    if (row.persetujuan_ren == "TUNGGU") {
                        return (
                            '<h5 class="text-blue-500 font-semibold">' +
                            "BELUM DIKONFIRMASI" +
                            "</h5>"
                        );
                    }
                },
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
