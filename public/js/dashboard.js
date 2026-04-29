document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById("tablaDatos")) {
        $('#tablaDatos').DataTable({
                destroy: true,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            }
        });
    }

    const btnExport = document.getElementById("btnExport");
    if (btnExport) {
        btnExport.addEventListener("click", function () {
            let table = document.getElementById("tablaDatos");
            if (!table) {
                alert("No se encontró la tabla");
                return;
            }
            let html = table.outerHTML;
            let blob = new Blob([html], { type: "application/vnd.ms-excel" });
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
            fileInput.click();
        });

        fileInput.addEventListener("change", function () {
            let file = fileInput.files[0];
            if (!file) return;

            let reader = new FileReader();
            reader.onload = function (e) {
                let rows = e.target.result.split("\n");
                let tbody = document.querySelector("#tablaDatos tbody");
                if (!tbody) {
                    alert("No se encontró el cuerpo de la tabla");
                    return;
                }
                tbody.innerHTML = ""; 

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
