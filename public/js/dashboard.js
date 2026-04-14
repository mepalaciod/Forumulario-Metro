document.addEventListener("DOMContentLoaded", function () {
    const btnExport = document.getElementById("btnExport");
    if (btnExport) {
        btnExport.addEventListener("click", function () {
            let table = document.getElementById("tablaDatos").outerHTML;
            let blob = new Blob([table], { type: "application/vnd.ms-excel" });
            let url = URL.createObjectURL(blob);

            let a = document.createElement("a");
            a.href = url;
            a.download = "tabla.xls";
            a.click();
        });
    }

const btnImport = document.getElementById("btnImport");
    const fileInput = document.getElementById("fileInput");

    if (btnImport && fileInput) {
        btnImport.addEventListener("click", function () {
            let file = fileInput.files[0];
            if (!file) {
                alert("Selecciona un archivo primero");
                return;
            }

            let reader = new FileReader();
            reader.onload = function (e) {
                let rows = e.target.result.split("\n");
                let tbody = document.querySelector("#tablaDatos tbody");
                tbody.innerHTML = ""; // limpiar tabla

                rows.forEach(function (row) {
                    let cols = row.split(",");
                    if (cols.length > 1) {
                        let tr = document.createElement("tr");
                        cols.forEach(function (col) {
                            let td = document.createElement("td");
                            td.textContent = col.trim();
                            tr.appendChild(td);
                        });
                        tbody.appendChild(tr);
                    }
                });
            };
            reader.readAsText(file);
        });
    }
});
