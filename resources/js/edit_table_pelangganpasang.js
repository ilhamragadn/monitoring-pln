import DataTable from "datatables.net-dt";

const pathSegments = window.location.pathname.split("/");
const editDapelId =
    pathSegments[pathSegments.indexOf("pelanggan-tl-rensis") + 1];

let nilai_rab_mdu = 0;
let nilai_rab_jasa = 0;
nilai_rab_jasa = new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
}).format(nilai_rab_jasa);
let ratio = 0;

let tableEditPelangganPasangTLRensis = new DataTable(
    "#edit-pelangganpasang-rensis",
    {
        processing: true,
        responsive: true,
        serverSide: true,
        destroy: true,
        scrollX: true,
        ajax: {
            url: base_url + "/edit-dapel-rensis/" + editDapelId,
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
                className: "text-center",
                render: function (data, type, row) {
                    const isChecked = row.banyak_material !== null;
                    return (
                        '<input id="checkbox" name="material_id[]" value="' +
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
                    const banyakMaterial =
                        row.banyak_material !== null ? row.banyak_material : 0;
                    return (
                        '<input id="input-number" disabled name="banyak_material[]" value="' +
                        banyakMaterial +
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
                        }).format(row.nilai_rab_mdu) +
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
                        }).format(row.nilai_rab_jasa) +
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
                        new Intl.NumberFormat("id-ID").format(row.ratio) +
                        '" />'
                    );
                },
            },
        ],
    }
);

tableEditPelangganPasangTLRensis.on("init.dt", function () {
    let checkbox = document.querySelectorAll("#checkbox");
    let banyak_material = document.querySelectorAll("#input-number");
    let total_mdu = document.querySelectorAll("#total-rp-mdu");
    let total_jasa = document.querySelectorAll("#total-rp-jasa");
    let RAB_MDU = document.querySelectorAll("#nilai_rab_mdu");
    let RAB_JASA = document.querySelectorAll("#nilai_rab_jasa");
    let Ratio = document.querySelectorAll("#ratio");
    let nilai_bp = document.getElementById("nilai_bp");
    checkbox.forEach(function (checkboxElement, index) {
        if (checkboxElement.checked) {
            const dataTable = tableEditPelangganPasangTLRensis
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
                    //console.log(parsedMDU);
                }
            }
            rab_MDU = Math.round(allTotalMDU * 1.11);
            nilai_rab_mdu = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            }).format(rab_MDU);
            //console.log(typeof nilai_rab_mdu);
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
                    //console.log(parsedJASA);
                    allTotalJASA += parsedJASA;
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
            const ratioFormula = BPParse / totalAllRAB;
            ratio = new Intl.NumberFormat("id-ID").format(ratioFormula);
            if (!isNaN(totalAllRAB) && !isNaN(ratioFormula)) {
                Ratio[index].value = ratio;
                dataTable.ratio = ratio;
            }
            //console.log(ratio);

            banyak_material[index].addEventListener("input", function () {
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
                        //console.log(parsedMDU);
                    }
                }
                rab_MDU = Math.round(allTotalMDU * 1.11);
                nilai_rab_mdu = new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                }).format(rab_MDU);
                //console.log(typeof nilai_rab_mdu);
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
                        //console.log(parsedJASA);
                        allTotalJASA += parsedJASA;
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
                const ratioFormula = BPParse / totalAllRAB;
                ratio = new Intl.NumberFormat("id-ID").format(ratioFormula);
                if (!isNaN(totalAllRAB) && !isNaN(ratioFormula)) {
                    Ratio[index].value = ratio;
                    dataTable.ratio = ratio;
                }
                //console.log(ratio);
            });
        }

        checkboxElement.addEventListener("change", function () {
            const isChecked = this.checked;
            const dataTable = tableEditPelangganPasangTLRensis
                .row(this.closest("tr"))
                .data();
            const rp_mduValue = dataTable.rp_mdu;
            const rp_jasaValue = dataTable.rp_jasa;

            if (isChecked) {
                banyak_material[index].disabled = false;
                banyak_material[index].addEventListener("input", function () {
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
                            //console.log(parsedMDU);
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
                            //console.log(parsedJASA);
                            allTotalJASA += parsedJASA;
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
                    const ratioFormula = BPParse / totalAllRAB;
                    ratio = new Intl.NumberFormat("id-ID").format(ratioFormula);
                    if (!isNaN(totalAllRAB) && !isNaN(ratioFormula)) {
                        Ratio[index].value = ratio;
                        dataTable.ratio = ratio;
                    }
                    //console.log(ratio);
                });
            } else {
                banyak_material[index].disabled = true;
                let resetVal = new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                }).format(0);
                banyak_material[index].value = 0;
                total_mdu[index].textContent = resetVal;
                total_jasa[index].textContent = resetVal;
                RAB_MDU[index].value = resetVal;
                RAB_JASA[index].value = resetVal;
                Ratio[index].value = "0";
                dataTable.total_rp_mdu = resetVal;
                dataTable.total_rp_jasa = resetVal;
                dataTable.nilai_rab_mdu = resetVal;
                dataTable.nilai_rab_jasa = resetVal;
                dataTable.ratio = "0";
            }
        });
    });
});

const editDapelIdTeknik =
    pathSegments[pathSegments.indexOf("pelanggan-tl-teknik") + 1];

let tableEditPelangganPasangTLTeknik = new DataTable(
    "#edit-pelangganpasang-teknik",
    {
        processing: true,
        responsive: true,
        serverSide: true,
        destroy: true,
        scrollX: true,
        ajax: {
            url: base_url + "/edit-dapel-teknik/" + editDapelIdTeknik,
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
                className: "text-center",
                render: function (data, type, row) {
                    const isChecked = row.banyak_material !== null;
                    return (
                        '<input id="checkbox" name="material_id[]" value="' +
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
                    const banyakMaterial =
                        row.banyak_material !== null ? row.banyak_material : 0;
                    return (
                        '<input id="input-number" disabled name="banyak_material[]" value="' +
                        banyakMaterial +
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
                        }).format(row.nilai_rab_mdu) +
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
                        }).format(row.nilai_rab_jasa) +
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
                        new Intl.NumberFormat("id-ID").format(row.ratio) +
                        '" />'
                    );
                },
            },
        ],
    }
);

tableEditPelangganPasangTLTeknik.on("init.dt", function () {
    let checkbox = document.querySelectorAll("#checkbox");
    let banyak_material = document.querySelectorAll("#input-number");
    let total_mdu = document.querySelectorAll("#total-rp-mdu");
    let total_jasa = document.querySelectorAll("#total-rp-jasa");
    let RAB_MDU = document.querySelectorAll("#nilai_rab_mdu");
    let RAB_JASA = document.querySelectorAll("#nilai_rab_jasa");
    let Ratio = document.querySelectorAll("#ratio");
    let nilai_bp = document.getElementById("nilai_bp");
    checkbox.forEach(function (checkboxElement, index) {
        if (checkboxElement.checked) {
            const dataTable = tableEditPelangganPasangTLTeknik
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
                    //console.log(parsedMDU);
                }
            }
            rab_MDU = Math.round(allTotalMDU * 1.11);
            nilai_rab_mdu = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            }).format(rab_MDU);
            //console.log(typeof nilai_rab_mdu);
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
                    //console.log(parsedJASA);
                    allTotalJASA += parsedJASA;
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
            const ratioFormula = BPParse / totalAllRAB;
            ratio = new Intl.NumberFormat("id-ID").format(ratioFormula);
            if (!isNaN(totalAllRAB) && !isNaN(ratioFormula)) {
                Ratio[index].value = ratio;
                dataTable.ratio = ratio;
            }
            //console.log(ratio);

            banyak_material[index].addEventListener("input", function () {
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
                        //console.log(parsedMDU);
                    }
                }
                rab_MDU = Math.round(allTotalMDU * 1.11);
                nilai_rab_mdu = new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                }).format(rab_MDU);
                //console.log(typeof nilai_rab_mdu);
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
                        //console.log(parsedJASA);
                        allTotalJASA += parsedJASA;
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
                const ratioFormula = BPParse / totalAllRAB;
                ratio = new Intl.NumberFormat("id-ID").format(ratioFormula);
                if (!isNaN(totalAllRAB) && !isNaN(ratioFormula)) {
                    Ratio[index].value = ratio;
                    dataTable.ratio = ratio;
                }
                //console.log(ratio);
            });
        }

        checkboxElement.addEventListener("change", function () {
            const isChecked = this.checked;
            const dataTable = tableEditPelangganPasangTLTeknik
                .row(this.closest("tr"))
                .data();
            const rp_mduValue = dataTable.rp_mdu;
            const rp_jasaValue = dataTable.rp_jasa;

            if (isChecked) {
                banyak_material[index].disabled = false;
                banyak_material[index].addEventListener("input", function () {
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
                            //console.log(parsedMDU);
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
                            //console.log(parsedJASA);
                            allTotalJASA += parsedJASA;
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
                    const ratioFormula = BPParse / totalAllRAB;
                    ratio = new Intl.NumberFormat("id-ID").format(ratioFormula);
                    if (!isNaN(totalAllRAB) && !isNaN(ratioFormula)) {
                        Ratio[index].value = ratio;
                        dataTable.ratio = ratio;
                    }
                    //console.log(ratio);
                });
            } else {
                banyak_material[index].disabled = true;
                let resetVal = new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                }).format(0);
                banyak_material[index].value = 0;
                total_mdu[index].textContent = resetVal;
                total_jasa[index].textContent = resetVal;
                RAB_MDU[index].value = resetVal;
                RAB_JASA[index].value = resetVal;
                Ratio[index].value = "0";
                dataTable.total_rp_mdu = resetVal;
                dataTable.total_rp_jasa = resetVal;
                dataTable.nilai_rab_mdu = resetVal;
                dataTable.nilai_rab_jasa = resetVal;
                dataTable.ratio = "0";
            }
        });
    });
});

// setInterval(() => {
//     tablePelangganPasangTLRensis.ajax.reload();
// }, 5000);
