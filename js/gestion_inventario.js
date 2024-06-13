$(document).ready(function() {
    // Función para obtener los productos desde el backend y mostrarlos en la tabla
    $("#tablaProductos").DataTable({
        lengthMenu: true,
        paging: true,
        lengthChange: true,
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "All"],
        ],
        searching: true,
        ordering: true,
        info: true,
        autoWidth: true,
        responsive: true,
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
        },
        // div <>, "clase", f = buscar, t = tabla, i = info, p = paginado, B = botones, l = filas por página
        dom: '<"text-center"B><<"mb-2"<"alineacion-botones"l> f> <t> <"mt-2"<"alineacion-botones"i><"d-flex justify-content-end"p>>>',
        buttons: [
            {
                titleAttr: "Nuevo Producto",
                text: '<i class="fa-solid fa-circle-plus"></i>',
                className: "btn btn-primary insertarProducto",
                action: function () {
                    $('.agregarNuevoProducto').trigger('click');
                },
            },
            {
                extend: "excel",
                titleAttr: "Exportar a Excel",
                text: '<i class="fa-regular fa-file-excel"></i>',
                className: "btn btn-success",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6],
                    search: "applied",
                    order: "applied",
                },
            },
            {
                extend: "pdfHtml5",
                title: "Productos en Inventario",
                titleAttr: "Exportar a PDF",
                text: '<i class="fas fa-file-pdf"></i>',
                className: "btn btn-danger",
                orientation: "portrait",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6],
                    search: "applied",
                    order: "applied",
                },
            },
        ]
    });
});
