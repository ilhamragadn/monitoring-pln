import DataTable from "datatables.net-dt";

const showDapelId = window.location.pathname.split("/").pop();
let jumlah_total_mdu = 0;
let jumlah_total_jasa = 0;
let nilai_rab_mdu = 0;
let nilai_rab_jasa = 0;
let ratio = 0;

let tableShowPelangganPasangTLRensis = new DataTable(
    "#detail-pelangganpasang-rensis",
    {
        processing: true,
        responsive: true,
        serverSide: true,
        destroy: true,
        scrollX: true,
        ajax: {
            url: base_url + "/detail-dapel-rensis/" + showDapelId,
            type: "get",
            dataType: "json",
            data: {
                _token: web_token,
            },
        },
        columns: [
            {
                data: "id",
                name: "id",
                searchable: false,
                className: "text-center",
                render: function (data, type, row) {
                    const isChecked = row.banyak_material !== null;
                    return (
                        '<input id="checkbox" disabled name="material_id[]" value="' +
                        row.id +
                        '" type="checkbox" ' +
                        (isChecked ? "checked" : row.banyak_material) +
                        ' class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-green-600 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-5 h-5" />'
                    );
                },
            },
            {
                data: "material",
                name: "material",
                className: "text-center",
            },
            {
                data: "satuan",
                name: "satuan",
                className: "text-center",
            },
            {
                data: "rp_mdu",
                name: "rp_mdu",
                className: "text-center",
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
                className: "text-center",
                render: function (data, type, row) {
                    // Format data sebagai nominal rupiah
                    return new Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR",
                    }).format(data);
                },
            },
            {
                data: "banyak_material",
                name: "banyak_material",
                orderable: false,
                searchable: false,
                className: "",
                render: function (data, type, row) {
                    return (
                        '<input id="input-number" readonly name="banyak_material[]" value="' +
                        data +
                        '" class="w-36 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm text-center text-sm" type="number" />'
                    );
                },
            },
            {
                data: "total_rp_mdu",
                name: "total_rp_mdu",
                className: "text-center",
                render: function (data, type, row) {
                    return (
                        '<span id="total-rp-mdu">' +
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                        }).format(data) +
                        "</span>"
                    );
                },
            },
            {
                data: "jumlah_total_mdu",
                name: "jumlah_total_mdu",
                className: "text-center",
                render: function (data, type, row) {
                    return (
                        '<input id="jumlah_total_mdu" name="jumlah_total_mdu[' +
                        row.id +
                        ']" class="w-40 bg-transparent border-transparent rounded-md text-center text-sm" readonly value="' +
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                        }).format(row.jumlah_total_mdu) +
                        '" />'
                    );
                },
            },
            {
                data: "total_rp_jasa",
                name: "total_rp_jasa",
                className: "text-center",
                render: function (data, type, row) {
                    return (
                        '<span id="total-rp-jasa" >' +
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                        }).format(data) +
                        "</span>"
                    );
                },
            },
            {
                data: "jumlah_total_jasa",
                name: "jumlah_total_jasa",
                className: "text-center",
                render: function (data, type, row) {
                    return (
                        '<input id="jumlah_total_jasa" name="jumlah_total_jasa[' +
                        row.id +
                        ']" class="w-40 bg-transparent border-transparent rounded-md text-center text-sm" readonly value="' +
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                        }).format(row.jumlah_total_jasa) +
                        '" />'
                    );
                },
            },
            {
                data: "nilai_rab_mdu",
                name: "nilai_rab_mdu",
                className: "text-center",
                render: function (data, type, row) {
                    return (
                        '<input id="nilai_rab_mdu" name="nilai_rab_mdu[' +
                        row.id +
                        ']" class="w-40 bg-transparent border-transparent rounded-md text-center text-sm" readonly value="' +
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                        }).format(data) +
                        '" />'
                    );
                },
            },
            {
                data: "nilai_rab_jasa",
                name: "nilai_rab_jasa",
                className: "text-center",
                render: function (data, type, row) {
                    return (
                        '<input id="nilai_rab_jasa"  name="nilai_rab_jasa[' +
                        row.id +
                        ']" class=" w-40 bg-transparent border-transparent rounded-md text-center text-sm" readonly value="' +
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                        }).format(data) +
                        '" />'
                    );
                },
            },
            {
                data: "ratio",
                name: "ratio",
                className: "text-center",
                render: function (data, type, row) {
                    return (
                        '<input id="ratio" name="ratio[' +
                        row.id +
                        ']" class="w-28 bg-transparent border-transparent rounded-md text-center text-sm" readonly value="' +
                        new Intl.NumberFormat("id-ID").format(data) +
                        '" />'
                    );
                },
            },
        ],
    }
);

tableShowPelangganPasangTLRensis.on("init.dt", function () {
    let checkbox = document.querySelectorAll("#checkbox");
    let banyak_material = document.querySelectorAll("#input-number");
    let total_mdu = document.querySelectorAll("#total-rp-mdu");
    let total_jasa = document.querySelectorAll("#total-rp-jasa");
    let jumlahTotalMDU = document.querySelectorAll("#jumlah_total_mdu");
    let jumlahTotalJASA = document.querySelectorAll("#jumlah_total_jasa");
    let RAB_MDU = document.querySelectorAll("#nilai_rab_mdu");
    let RAB_JASA = document.querySelectorAll("#nilai_rab_jasa");
    let Ratio = document.querySelectorAll("#ratio");
    let nilai_bp = document.getElementById("nilai_bp");

    checkbox.forEach(function (checkboxElement, index) {
        if (checkboxElement.checked) {
            const dataTable = tableShowPelangganPasangTLRensis
                .row(checkboxElement.closest("tr"))
                .data();
            const rp_mduValue = dataTable.rp_mdu;
            const rp_jasaValue = dataTable.rp_jasa;
            banyak_material[index].disabled = false;
            const banyakMaterialVal = banyak_material[index].value;
            const BPValue = nilai_bp.value.replace(/[^\d,]/g, "");
            const BPParse = parseInt(BPValue);

            //total MDU
            const totalMDU = rp_mduValue * banyakMaterialVal;
            const total_rp_mduVal = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            }).format(totalMDU);
            total_mdu[index].textContent = total_rp_mduVal;
            dataTable.total_rp_mdu = total_rp_mduVal;

            //total Jasa
            const totalJASA = rp_jasaValue * banyakMaterialVal;
            const total_rp_jasaVal = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            }).format(totalJASA);
            total_jasa[index].textContent = total_rp_jasaVal;
            dataTable.total_rp_jasa = total_rp_jasaVal;

            //nilai RAB MDU
            let allTotalMDU = 0;
            let rab_MDU = 0;
            for (let i = 0; i < total_mdu.length; i++) {
                const mduValue = total_mdu[i].textContent;
                const cleanedMDU = mduValue.replace(/[^\d,]/g, "");
                const parsedMDU = parseInt(cleanedMDU);
                if (!isNaN(parsedMDU)) {
                    allTotalMDU += parsedMDU;
                    jumlah_total_mdu = new Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR",
                    }).format(allTotalMDU);
                    jumlahTotalMDU[index].value = jumlah_total_mdu;
                    dataTable.jumlah_total_mdu = jumlah_total_mdu;
                }
            }
            rab_MDU = Math.round(allTotalMDU * 1.11);
            nilai_rab_mdu = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            }).format(rab_MDU);
            RAB_MDU[index].value = nilai_rab_mdu;
            dataTable.nilai_rab_mdu = nilai_rab_mdu;

            //nilai RAB JASA
            let allTotalJASA = 0;
            let rab_JASA = 0;
            for (let i = 0; i < total_jasa.length; i++) {
                const jasaValue = total_jasa[i].textContent;
                const cleanedJASA = jasaValue.replace(/[^\d,]/g, "");
                const parsedJASA = parseInt(cleanedJASA);
                if (!isNaN(parsedJASA)) {
                    allTotalJASA += parsedJASA;
                    jumlah_total_jasa = new Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR",
                    }).format(allTotalJASA);
                    jumlahTotalJASA[index].value = jumlah_total_jasa;
                    dataTable.jumlah_total_jasa = jumlah_total_jasa;
                }
            }
            rab_JASA = Math.round(allTotalJASA * 1.11);
            nilai_rab_jasa = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            }).format(rab_JASA);
            RAB_JASA[index].value = nilai_rab_jasa;
            dataTable.nilai_rab_jasa = nilai_rab_jasa;

            const totalAllRAB = rab_MDU + rab_JASA;
            if (banyakMaterialVal == 0 && totalAllRAB == 0) {
                Ratio[index].value = "0";
                dataTable.ratio = "0";
            } else {
                const ratioFormula = BPParse / totalAllRAB;
                ratio = new Intl.NumberFormat("id-ID").format(ratioFormula);
                if (!isNaN(totalAllRAB) && !isNaN(ratioFormula)) {
                    Ratio[index].value = ratio;
                    dataTable.ratio = ratio;
                }
            }
        }
    });
});

let tableShowPelangganPasangTLTeknik = new DataTable(
    "#detail-pelangganpasang-teknik",
    {
        processing: true,
        responsive: true,
        serverSide: true,
        destroy: true,
        scrollX: true,
        ajax: {
            url: base_url + "/detail-dapel-teknik/" + showDapelId,
            type: "get",
            dataType: "json",
            data: {
                _token: web_token,
            },
        },
        columns: [
            {
                data: "id",
                name: "id",
                searchable: false,
                className: "text-center",
                render: function (data, type, row) {
                    const isChecked = row.banyak_material !== null;
                    return (
                        '<input id="checkbox" disabled name="material_id[]" value="' +
                        row.id +
                        '" type="checkbox" ' +
                        (isChecked ? "checked" : row.banyak_material) +
                        ' class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-green-600 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-5 h-5" />'
                    );
                },
            },
            {
                data: "material",
                name: "material",
                className: "text-center",
            },
            {
                data: "satuan",
                name: "satuan",
                className: "text-center",
            },
            {
                data: "rp_mdu",
                name: "rp_mdu",
                className: "text-center",
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
                className: "text-center",
                render: function (data, type, row) {
                    // Format data sebagai nominal rupiah
                    return new Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR",
                    }).format(data);
                },
            },
            {
                data: "banyak_material",
                name: "banyak_material",
                orderable: false,
                searchable: false,
                className: "",
                render: function (data, type, row) {
                    return (
                        '<input id="input-number" readonly name="banyak_material[]" value="' +
                        data +
                        '" class="w-36 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm text-center text-sm" type="number" />'
                    );
                },
            },
            {
                data: "total_rp_mdu",
                name: "total_rp_mdu",
                className: "text-center whitespace-nowrap",
                render: function (data, type, row) {
                    return (
                        '<span id="total-rp-mdu">' +
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                        }).format(data) +
                        "</span>"
                    );
                },
            },
            {
                data: "jumlah_total_mdu",
                name: "jumlah_total_mdu",
                className: "text-center",
                render: function (data, type, row) {
                    return (
                        '<input id="jumlah_total_mdu" name="jumlah_total_mdu[' +
                        row.id +
                        ']" class="w-40 bg-transparent border-transparent rounded-md text-center text-sm" readonly value="' +
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                        }).format(row.jumlah_total_mdu) +
                        '" />'
                    );
                },
            },
            {
                data: "total_rp_jasa",
                name: "total_rp_jasa",
                className: "text-center",
                render: function (data, type, row) {
                    return (
                        '<span id="total-rp-jasa" >' +
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                        }).format(data) +
                        "</span>"
                    );
                },
            },
            {
                data: "jumlah_total_jasa",
                name: "jumlah_total_jasa",
                className: "text-center",
                render: function (data, type, row) {
                    return (
                        '<input id="jumlah_total_jasa" name="jumlah_total_jasa[' +
                        row.id +
                        ']" class="w-40 bg-transparent border-transparent rounded-md text-center text-sm" readonly value="' +
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                        }).format(row.jumlah_total_jasa) +
                        '" />'
                    );
                },
            },
            {
                data: "nilai_rab_mdu",
                name: "nilai_rab_mdu",
                className: "text-center",
                render: function (data, type, row) {
                    return (
                        '<input id="nilai_rab_mdu" name="nilai_rab_mdu[' +
                        row.id +
                        ']" class="w-40 bg-transparent border-transparent rounded-md text-center text-sm" readonly value="' +
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                        }).format(data) +
                        '" />'
                    );
                },
            },
            {
                data: "nilai_rab_jasa",
                name: "nilai_rab_jasa",
                className: "text-center",
                render: function (data, type, row) {
                    return (
                        '<input id="nilai_rab_jasa"  name="nilai_rab_jasa[' +
                        row.id +
                        ']" class=" w-40 bg-transparent border-transparent rounded-md text-center text-sm" readonly value="' +
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                        }).format(data) +
                        '" />'
                    );
                },
            },
            {
                data: "ratio",
                name: "ratio",
                className: "text-center",
                render: function (data, type, row) {
                    return (
                        '<input id="ratio" name="ratio[' +
                        row.id +
                        ']" class="w-28 bg-transparent border-transparent rounded-md text-center text-sm" readonly value="' +
                        new Intl.NumberFormat("id-ID").format(data) +
                        '" />'
                    );
                },
            },
        ],
    }
);

tableShowPelangganPasangTLTeknik.on("init.dt", function () {
    let checkbox = document.querySelectorAll("#checkbox");
    let banyak_material = document.querySelectorAll("#input-number");
    let total_mdu = document.querySelectorAll("#total-rp-mdu");
    let total_jasa = document.querySelectorAll("#total-rp-jasa");
    let jumlahTotalMDU = document.querySelectorAll("#jumlah_total_mdu");
    let jumlahTotalJASA = document.querySelectorAll("#jumlah_total_jasa");
    let RAB_MDU = document.querySelectorAll("#nilai_rab_mdu");
    let RAB_JASA = document.querySelectorAll("#nilai_rab_jasa");
    let Ratio = document.querySelectorAll("#ratio");
    let nilai_bp = document.getElementById("nilai_bp");
    checkbox.forEach(function (checkboxElement, index) {
        if (checkboxElement.checked) {
            const dataTable = tableShowPelangganPasangTLTeknik
                .row(checkboxElement.closest("tr"))
                .data();
            const rp_mduValue = dataTable.rp_mdu;
            const rp_jasaValue = dataTable.rp_jasa;
            banyak_material[index].disabled = false;
            const banyakMaterialVal = banyak_material[index].value;
            const BPValue = nilai_bp.value.replace(/[^\d,]/g, "");
            const BPParse = parseInt(BPValue);

            //total MDU
            const totalMDU = rp_mduValue * banyakMaterialVal;
            const total_rp_mduVal = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            }).format(totalMDU);
            total_mdu[index].textContent = total_rp_mduVal;
            dataTable.total_rp_mdu = total_rp_mduVal;

            //total Jasa
            const totalJASA = rp_jasaValue * banyakMaterialVal;
            const total_rp_jasaVal = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            }).format(totalJASA);
            total_jasa[index].textContent = total_rp_jasaVal;
            dataTable.total_rp_jasa = total_rp_jasaVal;

            //nilai RAB MDU
            let allTotalMDU = 0;
            let rab_MDU = 0;
            for (let i = 0; i < total_mdu.length; i++) {
                const mduValue = total_mdu[i].textContent;
                const cleanedMDU = mduValue.replace(/[^\d,]/g, "");
                const parsedMDU = parseInt(cleanedMDU);
                if (!isNaN(parsedMDU)) {
                    allTotalMDU += parsedMDU;
                    jumlah_total_mdu = new Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR",
                    }).format(allTotalMDU);
                    jumlahTotalMDU[index].value = jumlah_total_mdu;
                    dataTable.jumlah_total_mdu = jumlah_total_mdu;
                }
            }
            rab_MDU = Math.round(allTotalMDU * 1.11);
            nilai_rab_mdu = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            }).format(rab_MDU);
            RAB_MDU[index].value = nilai_rab_mdu;
            dataTable.nilai_rab_mdu = nilai_rab_mdu;

            //nilai RAB JASA
            let allTotalJASA = 0;
            let rab_JASA = 0;
            for (let i = 0; i < total_jasa.length; i++) {
                const jasaValue = total_jasa[i].textContent;
                const cleanedJASA = jasaValue.replace(/[^\d,]/g, "");
                const parsedJASA = parseInt(cleanedJASA);
                if (!isNaN(parsedJASA)) {
                    allTotalJASA += parsedJASA;
                    jumlah_total_jasa = new Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR",
                    }).format(allTotalJASA);
                    jumlahTotalJASA[index].value = jumlah_total_jasa;
                    dataTable.jumlah_total_jasa = jumlah_total_jasa;
                }
            }
            rab_JASA = Math.round(allTotalJASA * 1.11);
            nilai_rab_jasa = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            }).format(rab_JASA);
            RAB_JASA[index].value = nilai_rab_jasa;
            dataTable.nilai_rab_jasa = nilai_rab_jasa;

            const totalAllRAB = rab_MDU + rab_JASA;
            if (banyakMaterialVal == 0 && totalAllRAB == 0) {
                Ratio[index].value = "0";
                dataTable.ratio = "0";
            } else {
                const ratioFormula = BPParse / totalAllRAB;
                ratio = new Intl.NumberFormat("id-ID").format(ratioFormula);
                if (!isNaN(totalAllRAB) && !isNaN(ratioFormula)) {
                    Ratio[index].value = ratio;
                    dataTable.ratio = ratio;
                }
            }
        }
    });
});

let tableShowPelangganPasangMNGRUnit = new DataTable(
    "#detail-pelangganpasang-unit",
    {
        processing: true,
        responsive: true,
        serverSide: true,
        destroy: true,
        scrollX: true,
        ajax: {
            url: base_url + "/detail-dapel-unit/" + showDapelId,
            type: "get",
            dataType: "json",
            data: {
                _token: web_token,
            },
        },
        columns: [
            {
                data: "id",
                name: "id",
                searchable: false,
                className: "text-center",
                render: function (data, type, row) {
                    const isChecked = row.banyak_material !== null;
                    return (
                        '<input id="checkbox" disabled name="material_id[]" value="' +
                        row.id +
                        '" type="checkbox" ' +
                        (isChecked ? "checked" : row.banyak_material) +
                        ' class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-green-600 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-5 h-5" />'
                    );
                },
            },
            {
                data: "material",
                name: "material",
                className: "text-center",
            },
            {
                data: "satuan",
                name: "satuan",
                className: "text-center",
            },
            {
                data: "rp_mdu",
                name: "rp_mdu",
                className: "text-center",
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
                className: "text-center",
                render: function (data, type, row) {
                    // Format data sebagai nominal rupiah
                    return new Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR",
                    }).format(data);
                },
            },
            {
                data: "banyak_material",
                name: "banyak_material",
                orderable: false,
                searchable: false,
                className: "",
                render: function (data, type, row) {
                    return (
                        '<input id="input-number" readonly name="banyak_material[]" value="' +
                        data +
                        '" class="w-36 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm text-center text-sm" type="number" />'
                    );
                },
            },
            {
                data: "total_rp_mdu",
                name: "total_rp_mdu",
                className: "text-center whitespace-nowrap",
                render: function (data, type, row) {
                    return (
                        '<span id="total-rp-mdu">' +
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                        }).format(data) +
                        "</span>"
                    );
                },
            },
            {
                data: "jumlah_total_mdu",
                name: "jumlah_total_mdu",
                className: "text-center",
                render: function (data, type, row) {
                    return (
                        '<input id="jumlah_total_mdu" name="jumlah_total_mdu[' +
                        row.id +
                        ']" class="w-40 bg-transparent border-transparent rounded-md text-center text-sm" readonly value="' +
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                        }).format(row.jumlah_total_mdu) +
                        '" />'
                    );
                },
            },
            {
                data: "total_rp_jasa",
                name: "total_rp_jasa",
                className: "text-center",
                render: function (data, type, row) {
                    return (
                        '<span id="total-rp-jasa" >' +
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                        }).format(data) +
                        "</span>"
                    );
                },
            },
            {
                data: "jumlah_total_jasa",
                name: "jumlah_total_jasa",
                className: "text-center",
                render: function (data, type, row) {
                    return (
                        '<input id="jumlah_total_jasa" name="jumlah_total_jasa[' +
                        row.id +
                        ']" class="w-40 bg-transparent border-transparent rounded-md text-center text-sm" readonly value="' +
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                        }).format(row.jumlah_total_jasa) +
                        '" />'
                    );
                },
            },
            {
                data: "nilai_rab_mdu",
                name: "nilai_rab_mdu",
                className: "text-center",
                render: function (data, type, row) {
                    return (
                        '<input id="nilai_rab_mdu" name="nilai_rab_mdu[' +
                        row.id +
                        ']" class="w-40 bg-transparent border-transparent rounded-md text-center text-sm" readonly value="' +
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                        }).format(data) +
                        '" />'
                    );
                },
            },
            {
                data: "nilai_rab_jasa",
                name: "nilai_rab_jasa",
                className: "text-center",
                render: function (data, type, row) {
                    return (
                        '<input id="nilai_rab_jasa"  name="nilai_rab_jasa[' +
                        row.id +
                        ']" class=" w-40 bg-transparent border-transparent rounded-md text-center text-sm" readonly value="' +
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                        }).format(data) +
                        '" />'
                    );
                },
            },
            {
                data: "ratio",
                name: "ratio",
                className: "text-center",
                render: function (data, type, row) {
                    return (
                        '<input id="ratio" name="ratio[' +
                        row.id +
                        ']" class="w-28 bg-transparent border-transparent rounded-md text-center text-sm" readonly value="' +
                        new Intl.NumberFormat("id-ID").format(data) +
                        '" />'
                    );
                },
            },
        ],
    }
);

tableShowPelangganPasangMNGRUnit.on("init.dt", function () {
    let checkbox = document.querySelectorAll("#checkbox");
    let banyak_material = document.querySelectorAll("#input-number");
    let total_mdu = document.querySelectorAll("#total-rp-mdu");
    let total_jasa = document.querySelectorAll("#total-rp-jasa");
    let jumlahTotalMDU = document.querySelectorAll("#jumlah_total_mdu");
    let jumlahTotalJASA = document.querySelectorAll("#jumlah_total_jasa");
    let RAB_MDU = document.querySelectorAll("#nilai_rab_mdu");
    let RAB_JASA = document.querySelectorAll("#nilai_rab_jasa");
    let Ratio = document.querySelectorAll("#ratio");
    let nilai_bp = document.getElementById("nilai_bp");
    checkbox.forEach(function (checkboxElement, index) {
        if (checkboxElement.checked) {
            const dataTable = tableShowPelangganPasangMNGRUnit
                .row(checkboxElement.closest("tr"))
                .data();
            const rp_mduValue = dataTable.rp_mdu;
            const rp_jasaValue = dataTable.rp_jasa;
            banyak_material[index].disabled = false;
            const banyakMaterialVal = banyak_material[index].value;
            const BPValue = nilai_bp.value.replace(/[^\d,]/g, "");
            const BPParse = parseInt(BPValue);

            //total MDU
            const totalMDU = rp_mduValue * banyakMaterialVal;
            const total_rp_mduVal = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            }).format(totalMDU);
            total_mdu[index].textContent = total_rp_mduVal;
            dataTable.total_rp_mdu = total_rp_mduVal;

            //total Jasa
            const totalJASA = rp_jasaValue * banyakMaterialVal;
            const total_rp_jasaVal = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            }).format(totalJASA);
            total_jasa[index].textContent = total_rp_jasaVal;
            dataTable.total_rp_jasa = total_rp_jasaVal;

            //nilai RAB MDU
            let allTotalMDU = 0;
            let rab_MDU = 0;
            for (let i = 0; i < total_mdu.length; i++) {
                const mduValue = total_mdu[i].textContent;
                const cleanedMDU = mduValue.replace(/[^\d,]/g, "");
                const parsedMDU = parseInt(cleanedMDU);
                if (!isNaN(parsedMDU)) {
                    allTotalMDU += parsedMDU;
                    jumlah_total_mdu = new Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR",
                    }).format(allTotalMDU);
                    jumlahTotalMDU[index].value = jumlah_total_mdu;
                    dataTable.jumlah_total_mdu = jumlah_total_mdu;
                }
            }
            rab_MDU = Math.round(allTotalMDU * 1.11);
            nilai_rab_mdu = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            }).format(rab_MDU);
            RAB_MDU[index].value = nilai_rab_mdu;
            dataTable.nilai_rab_mdu = nilai_rab_mdu;

            //nilai RAB JASA
            let allTotalJASA = 0;
            let rab_JASA = 0;
            for (let i = 0; i < total_jasa.length; i++) {
                const jasaValue = total_jasa[i].textContent;
                const cleanedJASA = jasaValue.replace(/[^\d,]/g, "");
                const parsedJASA = parseInt(cleanedJASA);
                if (!isNaN(parsedJASA)) {
                    allTotalJASA += parsedJASA;
                    jumlah_total_jasa = new Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR",
                    }).format(allTotalJASA);
                    jumlahTotalJASA[index].value = jumlah_total_jasa;
                    dataTable.jumlah_total_jasa = jumlah_total_jasa;
                }
            }
            rab_JASA = Math.round(allTotalJASA * 1.11);
            nilai_rab_jasa = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            }).format(rab_JASA);
            RAB_JASA[index].value = nilai_rab_jasa;
            dataTable.nilai_rab_jasa = nilai_rab_jasa;

            const totalAllRAB = rab_MDU + rab_JASA;
            if (banyakMaterialVal == 0 && totalAllRAB == 0) {
                Ratio[index].value = "0";
                dataTable.ratio = "0";
            } else {
                const ratioFormula = BPParse / totalAllRAB;
                ratio = new Intl.NumberFormat("id-ID").format(ratioFormula);
                if (!isNaN(totalAllRAB) && !isNaN(ratioFormula)) {
                    Ratio[index].value = ratio;
                    dataTable.ratio = ratio;
                }
            }
        }
    });
});

let tableShowPelangganPasangMNGRRen = new DataTable(
    "#detail-pelangganpasang-ren",
    {
        processing: true,
        responsive: true,
        serverSide: true,
        destroy: true,
        scrollX: true,
        ajax: {
            url: base_url + "/detail-dapel-ren/" + showDapelId,
            type: "get",
            dataType: "json",
            data: {
                _token: web_token,
            },
        },
        columns: [
            {
                data: "id",
                name: "id",
                searchable: false,
                className: "text-center",
                render: function (data, type, row) {
                    const isChecked = row.banyak_material !== null;
                    return (
                        '<input id="checkbox" disabled name="material_id[]" value="' +
                        row.id +
                        '" type="checkbox" ' +
                        (isChecked ? "checked" : row.banyak_material) +
                        ' class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-green-600 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-5 h-5" />'
                    );
                },
            },
            {
                data: "material",
                name: "material",
                className: "text-center",
            },
            {
                data: "satuan",
                name: "satuan",
                className: "text-center",
            },
            {
                data: "rp_mdu",
                name: "rp_mdu",
                className: "text-center",
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
                className: "text-center",
                render: function (data, type, row) {
                    // Format data sebagai nominal rupiah
                    return new Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR",
                    }).format(data);
                },
            },
            {
                data: "banyak_material",
                name: "banyak_material",
                orderable: false,
                searchable: false,
                className: "",
                render: function (data, type, row) {
                    return (
                        '<input id="input-number" readonly name="banyak_material[]" value="' +
                        data +
                        '" class="w-36 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm text-center text-sm" type="number" />'
                    );
                },
            },
            {
                data: "total_rp_mdu",
                name: "total_rp_mdu",
                className: "text-center whitespace-nowrap",
                render: function (data, type, row) {
                    return (
                        '<span id="total-rp-mdu">' +
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                        }).format(data) +
                        "</span>"
                    );
                },
            },
            {
                data: "jumlah_total_mdu",
                name: "jumlah_total_mdu",
                className: "text-center",
                render: function (data, type, row) {
                    return (
                        '<input id="jumlah_total_mdu" name="jumlah_total_mdu[' +
                        row.id +
                        ']" class="w-40 bg-transparent border-transparent rounded-md text-center text-sm" readonly value="' +
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                        }).format(row.jumlah_total_mdu) +
                        '" />'
                    );
                },
            },
            {
                data: "total_rp_jasa",
                name: "total_rp_jasa",
                className: "text-center",
                render: function (data, type, row) {
                    return (
                        '<span id="total-rp-jasa" >' +
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                        }).format(data) +
                        "</span>"
                    );
                },
            },
            {
                data: "jumlah_total_jasa",
                name: "jumlah_total_jasa",
                className: "text-center",
                render: function (data, type, row) {
                    return (
                        '<input id="jumlah_total_jasa" name="jumlah_total_jasa[' +
                        row.id +
                        ']" class="w-40 bg-transparent border-transparent rounded-md text-center text-sm" readonly value="' +
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                        }).format(row.jumlah_total_jasa) +
                        '" />'
                    );
                },
            },
            {
                data: "nilai_rab_mdu",
                name: "nilai_rab_mdu",
                className: "text-center",
                render: function (data, type, row) {
                    return (
                        '<input id="nilai_rab_mdu" name="nilai_rab_mdu[' +
                        row.id +
                        ']" class="w-40 bg-transparent border-transparent rounded-md text-center text-sm" readonly value="' +
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                        }).format(data) +
                        '" />'
                    );
                },
            },
            {
                data: "nilai_rab_jasa",
                name: "nilai_rab_jasa",
                className: "text-center",
                render: function (data, type, row) {
                    return (
                        '<input id="nilai_rab_jasa"  name="nilai_rab_jasa[' +
                        row.id +
                        ']" class=" w-40 bg-transparent border-transparent rounded-md text-center text-sm" readonly value="' +
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                        }).format(data) +
                        '" />'
                    );
                },
            },
            {
                data: "ratio",
                name: "ratio",
                className: "text-center",
                render: function (data, type, row) {
                    return (
                        '<input id="ratio" name="ratio[' +
                        row.id +
                        ']" class="w-28 bg-transparent border-transparent rounded-md text-center text-sm" readonly value="' +
                        new Intl.NumberFormat("id-ID").format(data) +
                        '" />'
                    );
                },
            },
        ],
    }
);

tableShowPelangganPasangMNGRRen.on("init.dt", function () {
    let checkbox = document.querySelectorAll("#checkbox");
    let banyak_material = document.querySelectorAll("#input-number");
    let total_mdu = document.querySelectorAll("#total-rp-mdu");
    let total_jasa = document.querySelectorAll("#total-rp-jasa");
    let jumlahTotalMDU = document.querySelectorAll("#jumlah_total_mdu");
    let jumlahTotalJASA = document.querySelectorAll("#jumlah_total_jasa");
    let RAB_MDU = document.querySelectorAll("#nilai_rab_mdu");
    let RAB_JASA = document.querySelectorAll("#nilai_rab_jasa");
    let Ratio = document.querySelectorAll("#ratio");
    let nilai_bp = document.getElementById("nilai_bp");
    checkbox.forEach(function (checkboxElement, index) {
        if (checkboxElement.checked) {
            const dataTable = tableShowPelangganPasangMNGRRen
                .row(checkboxElement.closest("tr"))
                .data();
            const rp_mduValue = dataTable.rp_mdu;
            const rp_jasaValue = dataTable.rp_jasa;
            banyak_material[index].disabled = false;
            const banyakMaterialVal = banyak_material[index].value;
            const BPValue = nilai_bp.value.replace(/[^\d,]/g, "");
            const BPParse = parseInt(BPValue);

            //total MDU
            const totalMDU = rp_mduValue * banyakMaterialVal;
            const total_rp_mduVal = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            }).format(totalMDU);
            total_mdu[index].textContent = total_rp_mduVal;
            dataTable.total_rp_mdu = total_rp_mduVal;

            //total Jasa
            const totalJASA = rp_jasaValue * banyakMaterialVal;
            const total_rp_jasaVal = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            }).format(totalJASA);
            total_jasa[index].textContent = total_rp_jasaVal;
            dataTable.total_rp_jasa = total_rp_jasaVal;

            //nilai RAB MDU
            let allTotalMDU = 0;
            let rab_MDU = 0;
            for (let i = 0; i < total_mdu.length; i++) {
                const mduValue = total_mdu[i].textContent;
                const cleanedMDU = mduValue.replace(/[^\d,]/g, "");
                const parsedMDU = parseInt(cleanedMDU);
                if (!isNaN(parsedMDU)) {
                    allTotalMDU += parsedMDU;
                    jumlah_total_mdu = new Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR",
                    }).format(allTotalMDU);
                    jumlahTotalMDU[index].value = jumlah_total_mdu;
                    dataTable.jumlah_total_mdu = jumlah_total_mdu;
                }
            }
            rab_MDU = Math.round(allTotalMDU * 1.11);
            nilai_rab_mdu = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            }).format(rab_MDU);
            RAB_MDU[index].value = nilai_rab_mdu;
            dataTable.nilai_rab_mdu = nilai_rab_mdu;

            //nilai RAB JASA
            let allTotalJASA = 0;
            let rab_JASA = 0;
            for (let i = 0; i < total_jasa.length; i++) {
                const jasaValue = total_jasa[i].textContent;
                const cleanedJASA = jasaValue.replace(/[^\d,]/g, "");
                const parsedJASA = parseInt(cleanedJASA);
                if (!isNaN(parsedJASA)) {
                    allTotalJASA += parsedJASA;
                    jumlah_total_jasa = new Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR",
                    }).format(allTotalJASA);
                    jumlahTotalJASA[index].value = jumlah_total_jasa;
                    dataTable.jumlah_total_jasa = jumlah_total_jasa;
                }
            }
            rab_JASA = Math.round(allTotalJASA * 1.11);
            nilai_rab_jasa = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            }).format(rab_JASA);
            RAB_JASA[index].value = nilai_rab_jasa;
            dataTable.nilai_rab_jasa = nilai_rab_jasa;

            const totalAllRAB = rab_MDU + rab_JASA;
            if (banyakMaterialVal == 0 && totalAllRAB == 0) {
                Ratio[index].value = "0";
                dataTable.ratio = "0";
            } else {
                const ratioFormula = BPParse / totalAllRAB;
                ratio = new Intl.NumberFormat("id-ID").format(ratioFormula);
                if (!isNaN(totalAllRAB) && !isNaN(ratioFormula)) {
                    Ratio[index].value = ratio;
                    dataTable.ratio = ratio;
                }
            }
        }
    });
});
