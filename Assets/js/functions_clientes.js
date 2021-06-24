let divLoading = document.querySelector("#divLoading");

let tabla_clientes;

document.addEventListener("DOMContentLoaded", function() {

    tabla_clientes = $("#tabla_clientes").dataTable({
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
            url: " " + base_url + "/Clientes/getClientes",
            dataSrc: "",
        },
        columns: [
            { data: "numRegistro" },
            { data: "rtn_empresa" },
            { data: "nom_persona" },
            { data: "nom_empresa" },
            { data: "tip_cliente" },
            { data: "options" },
        ],
    });

    if (document.querySelector("#formCliente")) {
        let formCliente = document.querySelector("#formCliente");
        formCliente.onsubmit = function(e) {
            e.preventDefault();
            let identidad_cliente = document.querySelector("#idnum").value;
            let nombre_cliente = document.querySelector("#nomper").value;
            let apellido_cliente = document.querySelector("#apeper").value;
            let edad_cliente = document.querySelector("#edad").value;
            let nacimiento_cliente = document.querySelector("#fecnac").value;
            let genero_cliente = document.querySelector("#gene").value;
            let correo_cliente = document.querySelector("#correo").value;
            let telefono_cliente = document.querySelector("#telefono").value;
            let tipo_cliente = document.querySelector("#tipo").value;
            let rtn_cliente = document.querySelector("#rtn").value;
            let nombre_empresa = document.querySelector("#nomempre").value;

            /* VALIDAR QUE LOS CAMPOS ESTEN LLENOS */
            if (
                identidad_cliente == "" ||
                nombre_cliente == "" ||
                apellido_cliente == "" ||
                edad_cliente == "" ||
                nacimiento_cliente == "" ||
                genero_cliente == "" ||
                correo_cliente == "" ||
                telefono_cliente == "" ||
                tipo_cliente == "" ||
                rtn_cliente == "" ||
                nombre_empresa == ""
            ) {
                swal("Atención", "Todos los campos son obligatorios", "error");
                return false;
            }

            divLoading.style.display = "flex";
            let request = window.XMLHttpRequest ?
                new XMLHttpRequest() :
                new ActiveXObject("Microsoft.XMLHTTP");
            let ajaxUrl = base_url + "/Clientes/setCliente";
            let formData = new FormData(formCliente);
            request.open("POST", ajaxUrl, true);
            request.send(formData);

            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Exito", objData.msg, "success");
                        document.querySelector('#formCliente').reset();
                        identidad_cliente.value = "";
                        nombre_cliente.value = "";
                        apellido_cliente.value = "";
                        edad_cliente.value = "";
                        nacimiento_cliente.value = "";
                        genero_cliente.value ="";
                        correo_cliente.value = "";
                        telefono_cliente.value = "";
                        tipo_cliente.value = "";
                        rtn_cliente.value = "";
                        nombre_empresa.value = "";
                    } else {
                        swal("Error", objData.msg, "error");
                    }
                }

                divLoading.style.display = "none";
                return false;

            };
        };
    }

    if (document.querySelector("#formEditarCliente")) {
        let formEditarCliente = document.querySelector("#formEditarCliente");
        formEditarCliente.onsubmit = function(e) {
            e.preventDefault();
            let identidad_cliente = document.querySelector("#idnum").value;
            let nombre_cliente = document.querySelector("#nomper").value;
            let apellido_cliente = document.querySelector("#apeper").value;
            let edad_cliente = document.querySelector("#edad").value;
            let nacimiento_cliente = document.querySelector("#fecnac").value;
            let genero_cliente = document.querySelector("#gene").value;
            let correo_cliente = document.querySelector("#correo").value;
            let telefono_cliente = document.querySelector("#telefono").value;
            let tipo_cliente = document.querySelector("#tipo").value;
            let rtn_cliente = document.querySelector("#rtn").value;
            let nombre_empresa = document.querySelector("#nomempre").value;

            /* VALIDAR QUE LOS CAMPOS ESTEN LLENOS */
            if (
                identidad_cliente == "" ||
                nombre_cliente == "" ||
                apellido_cliente == "" ||
                edad_cliente == "" ||
                nacimiento_cliente == "" ||
                genero_cliente == "" ||
                correo_cliente == "" ||
                telefono_cliente == "" ||
                tipo_cliente == "" ||
                rtn_cliente == "" ||
                nombre_empresa == ""
            ) {
                swal("Atención", "Todos los campos son obligatorios", "error");
                return false;
            }

            divLoading.style.display = "flex";
            let request = window.XMLHttpRequest ?
                new XMLHttpRequest() :
                new ActiveXObject("Microsoft.XMLHTTP");
            let ajaxUrl = base_url + "/Clientes/setUpdateCliente";
            let formData = new FormData(formEditarCliente);
            request.open("POST", ajaxUrl, true);
            request.send(formData);

            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Exito", objData.msg, "success");
                        window.location = base_url + '/Clientes/Tabla';
                        document.querySelector('#formEditarCliente').reset();
                        identidad_cliente.value = "";
                        nombre_cliente.value = "";
                        apellido_cliente.value = "";
                        edad_cliente.value = "";
                        nacimiento_cliente.value = "";
                        genero_cliente.value ="";
                        correo_cliente.value = "";
                        telefono_cliente.value = "";
                        tipo_cliente.value = "";
                        rtn_cliente.value = "";
                        nombre_empresa.value = "";
                    } else {
                        swal("Error", objData.msg, "error");
                    }
                }

                divLoading.style.display = "none";
                return false;

            };
        };
    }

});

function fntDelClientes(idcliente) {
    swal({
        title: 'Eliminar Cliente',
        text: "¿Realmente quiere eliminar este Cliente?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        preConfirm: false
    }).then((result) => {
        if (result.value) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Clientes/eliminarClientes/';
            let strData = "idUsuario=" + idcliente;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminado!", objData.msg, "success");
                        tabla_clientes.api().ajax.reload(function() {});
                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }
    })
}

$(document).ready(function() {
    $("#tabla_clientes").DataTable();
});

