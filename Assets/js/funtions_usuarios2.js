let divLoading = document.querySelector("#divLoading");

let tabla_usuarios2;

document.addEventListener("DOMContentLoaded", function() {
    tabla_usuarios2 = $("#tabla_usuarios").dataTable({
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
            url: " " + base_url + "/Usuarios2/getUsuarios",
            dataSrc: "",
        },
        columns: [
            { data: "numRegistro" },
            { data: "nom_persona" },
            { data: "rol" },
            { data: "nom_usuario" },
            { data: "activacion" },
            { data: "options" },
        ],
        dom: "lBfrtip",
        buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
    });

    if (document.querySelector("#formUsuario")) {
        let formUsuario = document.querySelector("#formUsuario");
        formUsuario.onsubmit = function(e) {
            e.preventDefault();
            let nombre_persona = document.querySelector("#NombrePer").value;
            let usuario_empleado = document.querySelector("#usuario").value;
            let rol_usuario = document.querySelector("#Rol").value;
            let password_empleado = document.querySelector("#password").value;

            console.log(nombre_persona);
            console.log(usuario_empleado);
            console.log(rol_usuario);
            console.log(password_empleado);


            /* VALIDAR QUE LOS CAMPOS ESTEN LLENOS */
            if (nombre_persona == "" || usuario_empleado == "" || rol_usuario == "") {

                swal("Atención", "Todos los campos son obligatorios", "error");
                return false;
            }


            divLoading.style.display = "flex";
            let request = window.XMLHttpRequest ?
                new XMLHttpRequest() :
                new ActiveXObject("Microsoft.XMLHTTP");
            let ajaxUrl = base_url + "/Usuarios2/setUsuarios2";
            let formData = new FormData(formUsuario);
            request.open("POST", ajaxUrl, true);
            request.send(formData);

            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Exito", objData.msg, "success");
                        document.querySelector("#formUsuario").reset();
                        nombre_persona.value = "";
                        usuario_empleado.value = "";
                        rol_usuario.value = "";
                    } else {
                        swal("Error", objData.msg, "error");
                    }
                }

                divLoading.style.display = "none";
                return false;
            };
        };
    }


    if (document.querySelector("#formEditarUsuario")) {
        let formEditarUsuario = document.querySelector("#formEditarUsuario");
        formEditarUsuario.onsubmit = function(e) {
            e.preventDefault();
            let usuario_empleado = document.querySelector("#usuario").value;
            let rol_usuario = document.querySelector("#Rolu").value;


            /* VALIDAR QUE LOS CAMPOS ESTEN LLENOS */
            if (usuario_empleado == "" || rol_usuario == "") {
                swal("Atención", "Todos los campos son obligatorios", "error");
                return false;
            }

            divLoading.style.display = "flex";
            let request = window.XMLHttpRequest ?
                new XMLHttpRequest() :
                new ActiveXObject("Microsoft.XMLHTTP");
            let ajaxUrl = base_url + "/Usuarios2/setUpdateUsuarios2";
            let formData = new FormData(formEditarUsuario);
            request.open("POST", ajaxUrl, true);
            request.send(formData);

            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Exito", objData.msg, "success");
                        window.location = base_url + "/Usuarios2/Tabla";
                        document.querySelector("#formEditarUsuario").reset();
                        usuario_empleado.value = "";
                        rol_usuario.value = "";


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

function fnt_Rol() {
    if (document.querySelector("#Rol")) {
        let request = window.XMLHttpRequest ?
            new XMLHttpRequest() :
            new ActiveXObject("Microsoft.XMLHTTP");
        let ajaxUrl = base_url + "/Usuarios2/getSelectRol";

        request.open("GET", ajaxUrl, true);
        request.send();
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                document.querySelector("#Rol").innerHTML = request.responseText;
                document.querySelector("#Rol").value = 1;

                $("#Rol").selectpicker("refresh");
            }
        };
    }
}

function fnt_Persona() {
    if (document.querySelector("#NombrePer")) {
        let request = window.XMLHttpRequest ?
            new XMLHttpRequest() :
            new ActiveXObject("Microsoft.XMLHTTP");
        let ajaxUrl = base_url + "/Usuarios2/getSelectPersona";

        request.open("GET", ajaxUrl, true);
        request.send();
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                document.querySelector("#NombrePer").innerHTML = request.responseText;
                document.querySelector("#NombrePer").value = 1;

                $("#NombrePer").selectpicker("refresh");
            }
        };
    }
}

/* ELIMINAR USUARIO */
function fntDelUsuarios2(idpersona) {
    swal({
        title: "Eliminar usuario",
        text: "¿Realmente quiere eliminar este usuario?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        preConfirm: false,
    }).then((result) => {
        if (result.value) {
            let request = window.XMLHttpRequest ?
                new XMLHttpRequest() :
                new ActiveXObject("Microsoft.XMLHTTP");
            let ajaxUrl = base_url + "/Usuarios2/eliminarUsuario/";
            let strData = "idUsuario=" + idpersona;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader(
                "Content-type",
                "application/x-www-form-urlencoded"
            );
            request.send(strData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminado!", objData.msg, "success");
                        tabla_usuarios2.api().ajax.reload(function() {});
                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            };
        }
    });
}

window.addEventListener(
    "load",
    function() {
        fnt_Rol();
        fnt_Persona();
    },
    false
);

$(document).ready(function() {
    $("#tabla_usuarios").DataTable();
});