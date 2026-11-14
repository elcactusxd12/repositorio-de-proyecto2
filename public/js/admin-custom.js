$(document).ready(function() {
    // Inicializar tooltips de Bootstrap en todo el sistema
    $('[data-toggle="tooltip"]').tooltip();

    // Configuración global de DataTables para cualquier tabla con id="example" o clase .datatable
    if ($.fn.DataTable) {
        $('#example, .datatable').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            },
            "responsive": true,
            "autoWidth": false,
            "pageLength": 5,
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]]
        });
    }
});