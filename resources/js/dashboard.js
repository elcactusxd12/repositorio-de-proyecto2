
(function () {
    "use strict";

    document.addEventListener("DOMContentLoaded", function () {

        // =====================================================
        // 1. GRÁFICO DE DISTRIBUCIÓN POR EMPRESA
        // =====================================================

        var canvas = document.getElementById("companyDoughnutChart");

        if (canvas && typeof Chart !== "undefined") {

            var labels = JSON.parse(
                canvas.getAttribute("data-labels") || "[]"
            );

            var totals = JSON.parse(
                canvas.getAttribute("data-totals") || "[]"
            );

            var percentages = JSON.parse(
                canvas.getAttribute("data-percentages") || "[]"
            );

            // Colores del gráfico
            var palette = [
                "#1769d2",
                "#13a66a",
                "#f28a1b",
                "#7544d8",
                "#10a9c7",
                "#f2bd22",
                "#e05278",
                "#64748b",
                "#0d9488",
                "#8b5cf6",
                "#d97706",
                "#2563eb"
            ];

            // Crear gráfico Doughnut
            var chart = new Chart(canvas, {
                type: "doughnut",

                data: {
                    labels: labels,

                    datasets: [
                        {
                            data: totals,

                            backgroundColor: labels.map(function (_, index) {
                                return palette[index % palette.length];
                            }),

                            borderColor: "#ffffff",
                            borderWidth: 3,
                            hoverOffset: 6
                        }
                    ]
                },

                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: "69%",

                    animation: {
                        duration: 700
                    },

                    plugins: {
                        legend: {
                            display: false
                        },

                        tooltip: {
                            backgroundColor: "#173b68",
                            padding: 10,

                            callbacks: {
                                label: function (context) {
                                    var index = context.dataIndex;
                                    var value = Number(context.raw || 0);
                                    var percentage = percentages[index] || 0;

                                    // Mostrar contactos y porcentaje
                                    return " " + value +
                                        " contactos (" + percentage + "%)";
                                }
                            }
                        }
                    }
                }
            });

            // Asignar colores a los puntos de la leyenda
            var legendItems = document.querySelectorAll(
                "#companyChartLegend .dashboard-legend-item"
            );

            legendItems.forEach(function (item, index) {

                var dot = item.querySelector(".dashboard-legend-dot");

                if (dot) {
                    dot.style.backgroundColor =
                        palette[index % palette.length];
                }
            });
        }


        // =====================================================
        // 2. BARRAS DE PROGRESO DEL DASHBOARD
        // =====================================================

        var progressBars = document.querySelectorAll(
            ".dashboard-progress-fill[data-progress]"
        );

        progressBars.forEach(function (bar) {

            var percentage = Number(bar.dataset.progress);

            // Limitar el porcentaje entre 0 y 100
            var safePercentage = Number.isFinite(percentage)
                ? Math.min(100, Math.max(0, percentage))
                : 0;

            bar.style.width = safePercentage + "%";
        });


        // =====================================================
        // 3. DATATABLES: TABLA DE CONTACTOS RECIENTES
        // =====================================================

        if (
            window.jQuery &&
            jQuery.fn &&
            jQuery.fn.DataTable
        ) {

            var table = jQuery("#tablaHomeContactos");

            // Evitar inicializar DataTables más de una vez
            if (
                table.length &&
                !jQuery.fn.DataTable.isDataTable("#tablaHomeContactos")
            ) {

                table.DataTable({

                    language: {
                        url: "https://cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json",
                        search: "",
                        searchPlaceholder: "Ingrese para buscar..."
                    },

                    pageLength: 5,
                    lengthChange: false,
                    searching: true,
                    ordering: true,
                    info: true,
                    paging: true,
                    responsive: true,
                    autoWidth: false,

                    // Ordenar por la primera columna, descendente
                    order: [[0, "desc"]],

                    columnDefs: [
                        {
                            targets: 0,
                            width: "65px"
                        }
                    ],

                    // Distribución de los elementos de DataTables
                    dom:
                        '<"row mb-3"<"col-12 d-flex justify-content-end"f>>' +
                        't' +
                        '<"row mt-2"<"col-6"i><"col-6"p>>',

                    // Personalización del buscador
                    initComplete: function () {

                        var container = jQuery(
                            "#tablaHomeContactos_wrapper .dataTables_filter"
                        );

                        var label = container.find("label");
                        var searchInput = container.find("input");

                        container.css({
                            width: "100%",
                            display: "flex",
                            "justify-content": "flex-end"
                        });

                        label.css({
                            width: "100%",
                            display: "flex",
                            "justify-content": "flex-end",
                            margin: "0"
                        });

                        searchInput.css({
                            width: "450px",
                            "min-width": "450px",
                            "max-width": "450px",
                            height: "40px",
                            "box-sizing": "border-box"
                        });

                        searchInput.attr(
                            "placeholder",
                            "Ingrese para buscar..."
                        );

                        searchInput.attr(
                            "aria-label",
                            "Ingrese para buscar"
                        );
                    }
                });
            }
        }

    });

})();
