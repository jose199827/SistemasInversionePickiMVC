let tabla_factura;
let divLoading = document.querySelector("#divLoading");
document.addEventListener("DOMContentLoaded", function() {
    tabla_factura = $("#tabla_factura").dataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        columnDefs: [{
            targets: "datatable-nosort",
            orderable: false,
        }, ],
        lengthMenu: [
            [5, 10, 15, -1],
            [5, 10, 15, "Todos"],
        ],
        language: {
            sProcessing: "Procesando...",
            sLengthMenu: "Mostrar _MENU_ registros",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ningún dato disponible en esta tabla",
            sInfo: "_START_ al _END_ de un total de _TOTAL_ registros",
            sInfoEmpty: "Mostrando del 0 al 0 de un total de 0",
            sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
            sSearch: "Buscar:",
            sInfoThousands: ",",
            sLoadingRecords: "Cargando...",
            oPaginate: {
                sFirst: "Primero",
                sLast: "Último",
                sNext: '<i class="ion-chevron-right"></i>',
                sPrevious: '<i class="ion-chevron-left"></i>',
            },
            oAria: {
                sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                sSortDescending: ": Activar para ordenar la columna de manera descendente",
            },
            buttons: {
                copy: "Copiar",
                colvis: "Visibilidad",
            },
        },
        ajax: {
            url: " " + base_url + "/Facturacion/getFacturas",
            dataSrc: "",
        },
        columns: [
            { data: "id_factura" },
            { data: "fec_factura" },
            { data: "id_cliente" },
            { data: "totalFactura" },
            { data: "options" },
        ],
    });
});

$(document).ready(function() {
    $("#tabla_factura").DataTable();
});

/* if (document.querySelector("#idcliente")) {
    let idcliente = document.querySelectorAll("#idcliente");
    idcliente.addEventListener('keyup', function(e) {
        e.preventDefault();
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url + '/Login/getUsuarioPreguntas';
        let strData = "nombreUsuario=" + usuaioReset;
        request.open("POST", ajaxUrl, true);
    });
} */