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
            type: "post",
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
                orderable: false,
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
                render: function (data, type, row) {
                    return (
                        '<input id="checkedOne" name="selected_data[]" value="' +
                        row.id +
                        '" type="checkbox" class="w-5 h-5 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-green-600 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" />'
                    );
                },
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
                data: "created_at",
                name: "created_at",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "ratio",
                name: "ratio",
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

tableIndexPelangganPasangTLRensis.on("init.dt", function () {
    let checkedAll = document.getElementById("checkedAll");
    let downloadButtonDapel = document.getElementById("downloadDapel");
    let checkOne = document.querySelectorAll("#checkedOne");

    checkedAll.addEventListener("change", function () {
        if (this.checked) {
            checkOne.forEach(function (checkbox) {
                checkbox.checked = true;
                downloadButtonDapel.style.visibility = "visible";
            });
        } else {
            checkOne.forEach(function (checkbox) {
                checkbox.checked = false;
                downloadButtonDapel.style.visibility = "hidden";
            });
        }
    });

    checkOne.forEach((checkbox) => {
        checkbox.addEventListener("change", function () {
            let allChecked = true;
            checkOne.forEach(function (checkbox) {
                if (!checkbox.checked) {
                    allChecked = false;
                }
            });
            checkedAll.checked = allChecked;
            if (checkbox.checked) {
                downloadButtonDapel.style.visibility = "visible";
            } else {
                downloadButtonDapel.style.visibility = "hidden";
            }
        });
    });
});

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
                orderable: false,
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
                render: function (data, type, row) {
                    return (
                        '<input id="checkedOne" name="selected_data[]" value="' +
                        row.id +
                        '" type="checkbox" class="w-5 h-5 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-green-600 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" />'
                    );
                },
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
                data: "created_at",
                name: "created_at",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "ratio",
                name: "ratio",
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

tableIndexPelangganPasangTLTeknik.on("init.dt", function () {
    let checkedAll = document.getElementById("checkedAll");
    let downloadButtonDapel = document.getElementById("downloadDapel");
    let checkOne = document.querySelectorAll("#checkedOne");

    checkedAll.addEventListener("change", function () {
        if (this.checked) {
            checkOne.forEach(function (checkbox) {
                checkbox.checked = true;
                downloadButtonDapel.style.visibility = "visible";
            });
        } else {
            checkOne.forEach(function (checkbox) {
                checkbox.checked = false;
                downloadButtonDapel.style.visibility = "hidden";
            });
        }
    });

    checkOne.forEach((checkbox) => {
        checkbox.addEventListener("change", function () {
            let allChecked = true;
            checkOne.forEach(function (checkbox) {
                if (!checkbox.checked) {
                    allChecked = false;
                }
            });
            checkedAll.checked = allChecked;
            if (checkbox.checked) {
                downloadButtonDapel.style.visibility = "visible";
            } else {
                downloadButtonDapel.style.visibility = "hidden";
            }
        });
    });
});

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
                orderable: false,
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
                render: function (data, type, row) {
                    return (
                        '<input id="checkedOne" name="selected_data[]" value="' +
                        row.id +
                        '" type="checkbox" class="w-5 h-5 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-green-600 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" />'
                    );
                },
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
                data: "created_at",
                name: "created_at",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "ratio",
                name: "ratio",
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

tableIndexPelangganPasangMNGRUnit.on("init.dt", function () {
    let checkedAll = document.getElementById("checkedAll");
    let downloadButtonDapel = document.getElementById("downloadDapel");
    let checkOne = document.querySelectorAll("#checkedOne");

    checkedAll.addEventListener("change", function () {
        if (this.checked) {
            checkOne.forEach(function (checkbox) {
                checkbox.checked = true;
                downloadButtonDapel.style.visibility = "visible";
            });
        } else {
            checkOne.forEach(function (checkbox) {
                checkbox.checked = false;
                downloadButtonDapel.style.visibility = "hidden";
            });
        }
    });

    checkOne.forEach((checkbox) => {
        checkbox.addEventListener("change", function () {
            let allChecked = true;
            checkOne.forEach(function (checkbox) {
                if (!checkbox.checked) {
                    allChecked = false;
                }
            });
            checkedAll.checked = allChecked;
            if (checkbox.checked) {
                downloadButtonDapel.style.visibility = "visible";
            } else {
                downloadButtonDapel.style.visibility = "hidden";
            }
        });
    });
});

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
                orderable: false,
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
                render: function (data, type, row) {
                    return (
                        '<input id="checkedOne" name="selected_data[]" value="' +
                        row.id +
                        '" type="checkbox" class="w-5 h-5 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-green-600 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" />'
                    );
                },
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
                data: "created_at",
                name: "created_at",
                className:
                    "whitespace-nowrap text-center border-b dark:border-slate-400",
            },
            {
                data: "ratio",
                name: "ratio",
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

tableIndexPelangganPasangMNGRRen.on("init.dt", function () {
    let checkedAll = document.getElementById("checkedAll");
    let downloadButtonDapel = document.getElementById("downloadDapel");
    let checkOne = document.querySelectorAll("#checkedOne");

    checkedAll.addEventListener("change", function () {
        if (this.checked) {
            checkOne.forEach(function (checkbox) {
                checkbox.checked = true;
                downloadButtonDapel.style.visibility = "visible";
            });
        } else {
            checkOne.forEach(function (checkbox) {
                checkbox.checked = false;
                downloadButtonDapel.style.visibility = "hidden";
            });
        }
    });

    checkOne.forEach((checkbox) => {
        checkbox.addEventListener("change", function () {
            let allChecked = true;
            checkOne.forEach(function (checkbox) {
                if (!checkbox.checked) {
                    allChecked = false;
                }
            });
            checkedAll.checked = allChecked;
            if (checkbox.checked) {
                downloadButtonDapel.style.visibility = "visible";
            } else {
                downloadButtonDapel.style.visibility = "hidden";
            }
        });
    });
});
