let TablaMarcas;
let TablaCategorias;
let TablaGrupos;
let TablaUnidades;
let TablaImpuestos;
let TablaCargos;
let TablaEmpleados;
let TablaRol;
let TablaFacturacion;
let TablaEmpresa;
let TablaBitacora;
let divLoading = document.querySelector('#divLoading');
document.addEventListener('DOMContentLoaded', function() {
    //TABLA DE MARCAS//
    if (document.querySelector("#TablaMarcas")) {
        TablaMarcas = $('#TablaMarcas').dataTable({
            scrollCollapse: true,
            autoWidth: false,
            responsive: true,
            columnDefs: [{
                targets: "datatable-nosort",
                orderable: false,
            }],
            "lengthMenu": [
                [5, 10, 15, -1],
                [5, 10, 15, "Todos"]
            ],
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "_START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando del 0 al 0 de un total de 0",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": '<i class="ion-chevron-right"></i>',
                    "sPrevious": '<i class="ion-chevron-left"></i>'
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
            },
            "ajax": {
                "url": " " + base_url + "/Configuracion/getMarcas",
                "dataSrc": ""
            },
            "columns": [
                { "data": "numRegistro" },
                { "data": "marca" },
                { "data": "options" }
            ],
            'dom': 'lBfrtip',
            'buttons': [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
            ],
        });
    }
    if (document.querySelector("#TablaCategorias")) {
        //TABLA DE CATEGORIAS//
        TablaCategorias = $('#TablaCategorias').dataTable({
            scrollCollapse: true,
            autoWidth: false,
            responsive: true,
            columnDefs: [{
                targets: "datatable-nosort",
                orderable: false,
            }],
            "lengthMenu": [
                [5, 10, 15, -1],
                [5, 10, 15, "Todos"]
            ],
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "_START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando del 0 al 0 de un total de 0",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": '<i class="ion-chevron-right"></i>',
                    "sPrevious": '<i class="ion-chevron-left"></i>'
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
            },
            "ajax": {
                "url": " " + base_url + "/Configuracion/getCategorias",
                "dataSrc": ""
            },
            "columns": [
                { "data": "numRegistro" },
                { "data": "categoria" },
                { "data": "options" }
            ],
            'dom': 'lBfrtip',
            'buttons': [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
            ],
        });
    }
    if (document.querySelector("#TablaGrupos")) {
        //TABLA DE GRUPOS//
        TablaGrupos = $('#TablaGrupos').dataTable({
            scrollCollapse: true,
            autoWidth: false,
            responsive: true,
            columnDefs: [{
                targets: "datatable-nosort",
                orderable: false,
            }],
            "lengthMenu": [
                [5, 10, 15, -1],
                [5, 10, 15, "Todos"]
            ],
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "_START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando del 0 al 0 de un total de 0",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": '<i class="ion-chevron-right"></i>',
                    "sPrevious": '<i class="ion-chevron-left"></i>'
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
            },
            "ajax": {
                "url": " " + base_url + "/Configuracion/getGrupos",
                "dataSrc": ""
            },
            "columns": [
                { "data": "numRegistro" },
                { "data": "grupo" },
                { "data": "options" }
            ],
            'dom': 'lBfrtip',
            'buttons': [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
            ],

        });
    }
    if (document.querySelector("#TablaUnidades")) {
        //TABLA DE UNIDADES MEDIDAS//
        TablaUnidades = $('#TablaUnidades').dataTable({
            scrollCollapse: true,
            autoWidth: false,
            responsive: true,
            columnDefs: [{
                targets: "datatable-nosort",
                orderable: false,
            }],
            "lengthMenu": [
                [5, 10, 15, -1],
                [5, 10, 15, "Todos"]
            ],
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "_START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando del 0 al 0 de un total de 0",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": '<i class="ion-chevron-right"></i>',
                    "sPrevious": '<i class="ion-chevron-left"></i>'
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
            },
            "ajax": {
                "url": " " + base_url + "/Configuracion/getUnidades",
                "dataSrc": ""
            },
            "columns": [
                { "data": "numRegistro" },
                { "data": "uni_medida" },
                { "data": "options" }
            ],
            'dom': 'lBfrtip',
            'buttons': [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
            ],
        });
    }
    if (document.querySelector("#TablaImpuestos")) {
        //TABLA DE IMPUESTOS//
        TablaImpuestos = $('#TablaImpuestos').dataTable({
            scrollCollapse: true,
            autoWidth: false,
            responsive: true,
            columnDefs: [{
                targets: "datatable-nosort",
                orderable: false,
            }],
            "lengthMenu": [
                [5, 10, 15, -1],
                [5, 10, 15, "Todos"]
            ],
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "_START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando del 0 al 0 de un total de 0",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": '<i class="ion-chevron-right"></i>',
                    "sPrevious": '<i class="ion-chevron-left"></i>'
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
            },
            "ajax": {
                "url": " " + base_url + "/Configuracion/getImpuestos",
                "dataSrc": ""
            },
            "columns": [
                { "data": "numRegistro" },
                { "data": "nom_isv" },
                { "data": "porcentaje" },
                { "data": "options" }
            ],
            'dom': 'lBfrtip',
            'buttons': [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
            ],

        });
    }
    if (document.querySelector("#TablaCargos")) {
        //TABLA DE CARGOS//
        TablaCargos = $('#TablaCargos').dataTable({
            scrollCollapse: true,
            autoWidth: false,
            responsive: true,
            columnDefs: [{
                targets: "datatable-nosort",
                orderable: false,
            }],
            "lengthMenu": [
                [5, 10, 15, -1],
                [5, 10, 15, "Todos"]
            ],
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "_START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando del 0 al 0 de un total de 0",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": '<i class="ion-chevron-right"></i>',
                    "sPrevious": '<i class="ion-chevron-left"></i>'
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
            },
            "ajax": {
                "url": " " + base_url + "/Configuracion/getCargos",
                "dataSrc": ""
            },
            "columns": [
                { "data": "numRegistro" },
                { "data": "cargo" },
                { "data": "options" }
            ],
            'dom': 'lBfrtip',
            'buttons': [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
            ],

        });
    }
    if (document.querySelector("#TablaEmpleados")) {
        //TABLA DE EMPLEADOS//
        TablaEmpleados = $('#TablaEmpleados').dataTable({
            scrollCollapse: true,
            autoWidth: false,
            responsive: true,
            columnDefs: [{
                targets: "datatable-nosort",
                orderable: false,
            }],
            "lengthMenu": [
                [5, 10, 15, -1],
                [5, 10, 15, "Todos"]
            ],
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "_START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando del 0 al 0 de un total de 0",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": '<i class="ion-chevron-right"></i>',
                    "sPrevious": '<i class="ion-chevron-left"></i>'
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
            },
            "ajax": {
                "url": " " + base_url + "/Configuracion/getEmpleados",
                "dataSrc": ""
            },
            "columns": [
                { "data": "numRegistro" },
                { "data": "tipo_empleado" },
                { "data": "options" }
            ],
            'dom': 'lBfrtip',
            'buttons': [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
            ],

        });
    }
    if (document.querySelector("#TablaRol")) {
        //TABLA DE ROLES//
        TablaRol = $('#TablaRol').dataTable({
            scrollCollapse: true,
            autoWidth: false,
            responsive: true,
            columnDefs: [{
                targets: "datatable-nosort",
                orderable: false,
            }],
            "lengthMenu": [
                [5, 10, 15, -1],
                [5, 10, 15, "Todos"]
            ],
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "_START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando del 0 al 0 de un total de 0",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": '<i class="ion-chevron-right"></i>',
                    "sPrevious": '<i class="ion-chevron-left"></i>'
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
            },
            "ajax": {
                "url": " " + base_url + "/Configuracion/getRoles",
                "dataSrc": ""
            },
            "columns": [
                { "data": "numRegistro" },
                { "data": "rol" },
                { "data": "options" }
            ],
            'dom': 'lBfrtip',
            'buttons': [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
            ],

        });
    }
    if (document.querySelector("#TablaFacturacion")) {
        //TABLA DE FACTURACION//
        TablaFacturacion = $('#TablaFacturacion').dataTable({
            scrollCollapse: true,
            autoWidth: false,
            responsive: true,
            columnDefs: [{
                targets: "datatable-nosort",
                orderable: false,
            }],
            "lengthMenu": [
                [5, 10, 15, -1],
                [5, 10, 15, "Todos"]
            ],
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "_START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando del 0 al 0 de un total de 0",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": '<i class="ion-chevron-right"></i>',
                    "sPrevious": '<i class="ion-chevron-left"></i>'
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
            },
            "ajax": {
                "url": " " + base_url + "/Configuracion/getFacturacion",
                "dataSrc": ""
            },
            "columns": [
                { "data": "numRegistro" },
                { "data": "cai" },
                { "data": "cor_inic" },
                { "data": "cor_fin" },
                { "data": "fec_lim_emi" },
                { "data": "options" }
            ],
            'dom': 'lBfrtip',
            'buttons': [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
            ],
        });
    }
    if (document.querySelector("#TablaEmpresa")) {
        //TABLA DE EMPRESA//
        TablaEmpresa = $('#TablaEmpresa').dataTable({
            scrollCollapse: true,
            autoWidth: false,
            responsive: true,
            columnDefs: [{
                targets: "datatable-nosort",
                orderable: false,
            }],
            "lengthMenu": [
                [5, 10, 15, -1],
                [5, 10, 15, "Todos"]
            ],
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "_START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando del 0 al 0 de un total de 0",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": '<i class="ion-chevron-right"></i>',
                    "sPrevious": '<i class="ion-chevron-left"></i>'
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
            },
            "ajax": {
                "url": " " + base_url + "/Configuracion/getEmpresa",
                "dataSrc": ""
            },
            "columns": [
                { "data": "numRegistro" },
                { "data": "rtn_empresa" },
                { "data": "nom_empresa" },
                { "data": "options" }
            ],
            'dom': 'Bfrtip',
            'buttons': [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
            ],

        });
    }
    //TABLA DE BITACORA//
    if (document.querySelector("#TablaBitacora")) {
        TablaBitacora = $('#TablaBitacora').dataTable({
            scrollCollapse: true,
            autoWidth: false,
            responsive: true,
            columnDefs: [{
                targets: "datatable-nosort",
                orderable: false,
            }],
            "scrollX": true,
            "lengthMenu": [
                [5, 10, 15, -1],
                [5, 10, 15, "Todos"]
            ],
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "_START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando del 0 al 0 de un total de 0",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": '<i class="ion-chevron-right"></i>',
                    "sPrevious": '<i class="ion-chevron-left"></i>'
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
            },
            "ajax": {
                "url": " " + base_url + "/Configuracion/getBitacora",
                "dataSrc": ""
            },
            "columns": [
                { "data": "numRegistro" },
                { "data": "fec_registro" },
                { "data": "accion_realizada" },
                { "data": "usr_registro" },
                { "data": "usr_anterior" },
                { "data": "registro_actual" },
                { "data": "registro_anterior" },
                { "data": "tabla_modificada" },
                { "data": "fila_modificada" },
                { "data": "cam_modificado" },
                // { "data": "options" }
            ],
            'dom': 'lBfrtip',
            'buttons': [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
            ],
        });
    }

    //***********MODALES**********//
    if (document.querySelector("#formMarca")) {
        //MODAL DE MARCAS//
        let formMarca = document.querySelector("#formMarca");
        formMarca.onsubmit = function(e) {
            e.preventDefault();
            let marca = document.querySelector("#marca").value;
            if (marca == "") {
                swal("Atención", "Todos los campos son obligatorios.", "error");
                return false;

            }
            let elemtedValid = document.getElementsByClassName("valid");
            for (let i = 0; i < elemtedValid.length; i++) {
                if (elemtedValid[i].classList.contains('form-control-danger')) {
                    swal("Atención", "Por favor verifica los campos en rojo.", "error");
                    return false;
                }
            }

            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Configuracion/setMarcas';
            let formData = new FormData(formMarca);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        $('#marca-modal').modal("hide");
                        formMarca.reset();
                        swal("Marcas", objData.msg, "success");
                        TablaMarcas.api().ajax.reload();
                    } else {
                        swal("Error", objData.msg, "error");
                    }


                }
                divLoading.style.display = "none";
                return false;


            }

        }
    }
    if (document.querySelector("#formCategoria")) {
        //MODAL DE CATEGORIAS//
        let formCategoria = document.querySelector("#formCategoria");
        formCategoria.onsubmit = function(e) {
            e.preventDefault();
            let categoria = document.querySelector("#categoria").value;
            if (categoria == "") {
                swal("Atención", "Todos los campos son obligatorios.", "error");
                return false;

            }
            //linea nueva agregada para validar
            let elemtedValid = document.getElementsByClassName("valid");
            for (let i = 0; i < elemtedValid.length; i++) {
                if (elemtedValid[i].classList.contains('form-control-danger')) {
                    swal("Atención", "Por favor verifica los campos en rojo.", "error");
                    return false;
                }
            } //cierra aqui y se coloca arriba de divLoading.style.display


            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Configuracion/setCategorias';
            let formData = new FormData(formCategoria);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        $('#categoria-modal').modal("hide");
                        formCategoria.reset();
                        swal("Categorias", objData.msg, "success");
                        TablaCategorias.api().ajax.reload();
                    } else {
                        swal("Error", objData.msg, "error");
                    }


                }
                divLoading.style.display = "none";
                return false;


            }

        }
    }
    if (document.querySelector("#formGrupo")) {
        //MODAL DE GRUPOS//
        let formGrupo = document.querySelector("#formGrupo");
        formGrupo.onsubmit = function(e) {
            e.preventDefault();
            let grupo = document.querySelector("#grupo").value;
            if (grupo == "") {
                swal("Atención", "Todos los campos son obligatorios.", "error");
                return false;

            }
            //linea nueva agregada para validar
            let elemtedValid = document.getElementsByClassName("valid");
            for (let i = 0; i < elemtedValid.length; i++) {
                if (elemtedValid[i].classList.contains('form-control-danger')) {
                    swal("Atención", "Por favor verifica los campos en rojo.", "error");
                    return false;
                }
            } //cierra aqui y se coloca arriba de divLoading.style.display


            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Configuracion/setGrupos';
            let formData = new FormData(formGrupo);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        $('#grupo-modal').modal("hide");
                        formGrupo.reset();
                        swal("Grupos", objData.msg, "success");
                        TablaGrupos.api().ajax.reload();
                    } else {
                        swal("Error", objData.msg, "error");
                    }


                }
                divLoading.style.display = "none";
                return false;


            }

        }
    }
    if (document.querySelector("#formMedida")) {
        //MODAL DE UNIDADES MEDIDAS//
        let formMedida = document.querySelector("#formMedida");
        formMedida.onsubmit = function(e) {
            e.preventDefault();
            let uni_medida = document.querySelector("#uni_medida").value;
            if (uni_medida == "") {
                swal("Atención", "Todos los campos son obligatorios.", "error");
                return false;

            }
            //linea nueva agregada para validar
            let elemtedValid = document.getElementsByClassName("valid");
            for (let i = 0; i < elemtedValid.length; i++) {
                if (elemtedValid[i].classList.contains('form-control-danger')) {
                    swal("Atención", "Por favor verifica los campos en rojo.", "error");
                    return false;
                }
            } //cierra aqui y se coloca arriba de divLoading.style.display


            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Configuracion/setUnidades_Medidas';
            let formData = new FormData(formMedida);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        $('#unidadMedida-modal').modal("hide");
                        formGrupo.reset();
                        swal("Unidades", objData.msg, "success");
                        TablaUnidades.api().ajax.reload();
                    } else {
                        swal("Error", objData.msg, "error");
                    }


                }
                divLoading.style.display = "none";
                return false;


            }

        }
    }
    if (document.querySelector("#formImpuesto")) {
        //MODAL DE IMPUESTOS//
        let formImpuesto = document.querySelector("#formImpuesto");
        formImpuesto.onsubmit = function(e) {
            e.preventDefault();
            let nom_isv = document.querySelector("#nom_isv").value;
            let porcentaje = document.querySelector("#porcentaje").value;
            if (nom_isv == "" || porcentaje == "") {
                swal("Atención", "Todos los campos son obligatorios.", "error");
                return false;

            }
            //linea nueva agregada para validar
            let elemtedValid = document.getElementsByClassName("valid");
            for (let i = 0; i < elemtedValid.length; i++) {
                if (elemtedValid[i].classList.contains('form-control-danger')) {
                    swal("Atención", "Por favor verifica los campos en rojo.", "error");
                    return false;
                }
            } //cierra aqui y se coloca arriba de divLoading.style.display
            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Configuracion/setImpuestos';
            let formData = new FormData(formImpuesto);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        $('#impuesto-modal').modal("hide");
                        formGrupo.reset();
                        swal("Impuestos", objData.msg, "success");
                        TablaImpuestos.api().ajax.reload();
                    } else {
                        swal("Error", objData.msg, "error");
                    }


                }
                divLoading.style.display = "none";
                return false;


            }

        }
    }
    if (document.querySelector("#formCargo")) {
        //MODAL DE CARGOS
        let formCargo = document.querySelector("#formCargo");
        formCargo.onsubmit = function(e) {
            e.preventDefault();
            let cargo = document.querySelector("#cargo").value;
            if (cargo == "") {
                swal("Atención", "Todos los campos son obligatorios.", "error");
                return false;

            }
            //linea nueva agregada para validar
            let elemtedValid = document.getElementsByClassName("valid");
            for (let i = 0; i < elemtedValid.length; i++) {
                if (elemtedValid[i].classList.contains('form-control-danger')) {
                    swal("Atención", "Por favor verifica los campos en rojo.", "error");
                    return false;
                }
            } //cierra aqui y se coloca arriba de divLoading.style.display
            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Configuracion/setCargos';
            let formData = new FormData(formCargo);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        $('#modalCargo').modal("hide");
                        formCargo.reset();
                        swal("Cargos", objData.msg, "success");
                        TablaCargos.api().ajax.reload();
                    } else {
                        swal("Error", objData.msg, "error");
                    }


                }
                divLoading.style.display = "none";
                return false;


            }

        }
    }
    if (document.querySelector("#formTipoEmpleado")) {
        //MODAL DE EMPLEADOS
        let formTipoEmpleado = document.querySelector("#formTipoEmpleado");
        formTipoEmpleado.onsubmit = function(e) {
            e.preventDefault();
            let tipo_empleado = document.querySelector("#tipo_empleado").value;
            if (tipo_empleado == "") {
                swal("Atención", "Todos los campos son obligatorios.", "error");
                return false;

            }
            //linea nueva agregada para validar
            let elemtedValid = document.getElementsByClassName("valid");
            for (let i = 0; i < elemtedValid.length; i++) {
                if (elemtedValid[i].classList.contains('form-control-danger')) {
                    swal("Atención", "Por favor verifica los campos en rojo.", "error");
                    return false;
                }
            } //cierra aqui y se coloca arriba de divLoading.style.display
            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Configuracion/setEmpleados';
            let formData = new FormData(formTipoEmpleado);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        $('#modalTipoEm').modal("hide");
                        formTipoEmpleado.reset();
                        swal("Empleados", objData.msg, "success");
                        TablaEmpleados.api().ajax.reload();
                    } else {
                        swal("Error", objData.msg, "error");
                    }


                }
                divLoading.style.display = "none";
                return false;


            }

        }

    } //fin del if de empleado
    if (document.querySelector("#formRol")) {
        //MODAL DE ROL
        let formRol = document.querySelector("#formRol");
        formRol.onsubmit = function(e) {
            e.preventDefault();
            let rol = document.querySelector("#rol").value;
            if (rol == "") {
                swal("Atención", "Todos los campos son obligatorios.", "error");
                return false;

            }
            //linea nueva agregada para validar
            let elemtedValid = document.getElementsByClassName("valid");
            for (let i = 0; i < elemtedValid.length; i++) {
                if (elemtedValid[i].classList.contains('form-control-danger')) {
                    swal("Atención", "Por favor verifica los campos en rojo.", "error");
                    return false;
                }
            } //cierra aqui y se coloca arriba de divLoading.style.display
            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Configuracion/setRol';
            let formData = new FormData(formRol);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        $('#modalRol').modal("hide");
                        formRol.reset();
                        swal("Rol", objData.msg, "success");
                        TablaRol.api().ajax.reload();
                    } else {
                        swal("Error", objData.msg, "error");
                    }


                }
                divLoading.style.display = "none";
                return false;


            }

        }

    } //fin del if de rol
    if (document.querySelector("#formRegimen")) {
        //MODAL DE FACTURACION
        let formRegimen = document.querySelector("#formRegimen");
        formRegimen.onsubmit = function(e) {
            e.preventDefault();
            let cai = document.querySelector("#cai").value;
            let cor_inic = document.querySelector("#cor_inic").value;
            let cor_final = document.querySelector("#cor_final").value;
            let fecha_limite = document.querySelector("#fecha_limite").value;
            if (cai == "" || cor_inic == "" || cor_final == "" || fecha_limite == "") {
                swal("Atención", "Todos los campos son obligatorios.", "error");
                return false;

            }
            //linea nueva agregada para validar
            let elemtedValid = document.getElementsByClassName("valid");
            for (let i = 0; i < elemtedValid.length; i++) {
                if (elemtedValid[i].classList.contains('form-control-danger')) {
                    swal("Atención", "Por favor verifica los campos en rojo.", "error");
                    return false;
                }
            } //cierra aqui y se coloca arriba de divLoading.style.display
            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Configuracion/setFacturacion';
            let formData = new FormData(formRegimen);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        $('#small-modaladdbanco').modal("hide");
                        formRegimen.reset();
                        swal("Facturacion", objData.msg, "success");
                        TablaFacturacion.api().ajax.reload();
                    } else {
                        swal("Error", objData.msg, "error");
                    }


                }
                divLoading.style.display = "none";
                return false;


            }

        }

    } //fin del if de FACTURACION
    if (document.querySelector("#formEmpresa")) {
        //MODAL DE EMPRESAS
        let formEmpresa = document.querySelector("#formEmpresa");
        formEmpresa.onsubmit = function(e) {
            e.preventDefault();
            let rtn_empresa = document.querySelector("#rtn_empresa").value;
            let nom_empresa = document.querySelector("#nom_empresa").value;
            if (rtn_empresa == "" || nom_empresa == "") {
                swal("Atención", "Todos los campos son obligatorios.", "error");
                return false;


            }

            //linea nueva agregada para validar
            let elemtedValid = document.getElementsByClassName("valid");
            for (let i = 0; i < elemtedValid.length; i++) {
                if (elemtedValid[i].classList.contains('form-control-danger')) {
                    swal("Atención", "Por favor verifica los campos en rojo.", "error");
                    return false;
                }
            } //cierra aqui y se coloca arriba de divLoading.style.display
            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Configuracion/setEmpresa';
            let formData = new FormData(formEmpresa);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        $('#small-modaladdEmpresa').modal("hide");
                        formEmpresa.reset();
                        swal("Empresas", objData.msg, "success");
                        TablaEmpresa.api().ajax.reload();
                    } else {
                        swal("Error", objData.msg, "error");
                    }


                }
                divLoading.style.display = "none";
                return false;


            }

        }
    }
}, false);


$(document).ready(function() {
    $('#TablaMarcas').dataTable();
    $('#TablaCategorias').dataTable();
    $('#TablaGrupos').dataTable();
    $('#TablaUnidades').dataTable();
    $('#TablaImpuestos').dataTable();
    $('#TablaCargos').dataTable();
    $('#TablaEmpleados').dataTable();
    $('#TablaRol').dataTable();
    $('#TablaFacturacion').dataTable();
    $('#TablaEmpresa').dataTable();
    $('#TablaBitacora').dataTable();
});

//UPDATE PARA MARCAS//
function fntEditMarca(id_marca) {

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Configuracion/getMarca/' + id_marca;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector('#UMarca').value = objData.Data.id_marca;
                document.querySelector('#marca').value = objData.Data.marca;
                $('#marca-modal').modal("show");
            } else {
                swal("Error", objData.msj, "error");
            }
        }
    }
}
//DELETE DE MARCAS//
function fntDelMarca(id_marca) { //se obtiene del inspeccionar
    var id_marca = id_marca;
    /* alert(idrol); */
    swal({
        title: 'Eliminar Marca ',
        text: "¿Realmente quiere eliminar este registro?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        preConfirm: false
    }).then((result) => {
        if (result.value) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + '/Configuracion/delMarcas/';
            var strData = "id_marca=" + id_marca;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminado!", objData.msg, "success");
                        TablaMarcas.api().ajax.reload();
                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }
    })
}
//UPDATE PARA CATEGORIAS//
function fntEditCategoria(id_categoria) {
    document.querySelector('#TituloModalC').innerHTML = "Actualizar Categoria";
    document.querySelector('#btnTexC').innerHTML = "Actualizar";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Configuracion/getCategoria/' + id_categoria;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector('#UCategoria').value = objData.Data.id_categoria;
                document.querySelector('#categoria').value = objData.Data.categoria;
                $('#categoria-modal').modal("show");
            } else {
                swal("Error", objData.msj, "error");
            }
        }
    }
}
//DELETE DE CATEGORIAS//
function fntDelCategoria(id_categoria) { //se obtiene del inspeccionar
    var id_categoria = id_categoria;
    /* alert(idrol); */
    swal({
        title: 'Eliminar Categoría ',
        text: "¿Realmente quiere eliminar este registro?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        preConfirm: false
    }).then((result) => {
        if (result.value) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + '/Configuracion/delCategorias/';
            var strData = "id_categoria=" + id_categoria;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminado!", objData.msg, "success");
                        TablaCategorias.api().ajax.reload();
                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }
    })
}
//UPDATE PARA GRUPOS
function fntEditGrupo(id_grupo) {
    document.querySelector('#TituloModalG').innerHTML = "Actualizar Grupo";
    document.querySelector('#btnTexG').innerHTML = "Actualizar";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Configuracion/getGrupo/' + id_grupo;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector('#UGrupo').value = objData.Data.id_grupo;
                document.querySelector('#grupo').value = objData.Data.grupo;
                $('#grupo-modal').modal("show");
            } else {
                swal("Error", objData.msj, "error");
            }
        }
    }
}
//DELETE DE GRUPOS//
function fntDelGrupo(id_grupo) { //se obtiene del inspeccionar
    var id_grupo = id_grupo;
    /* alert(idrol); */
    swal({
        title: 'Eliminar Grupo ',
        text: "¿Realmente quiere eliminar este registro?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        preConfirm: false
    }).then((result) => {
        if (result.value) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + '/Configuracion/delGrupos/';
            var strData = "id_grupo=" + id_grupo;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminado!", objData.msg, "success");
                        TablaGrupos.api().ajax.reload();
                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }
    })
}

//UPDATE PARA UNIDADES MEDIDAS
function fntEditUnidades(id_uni_medida) {
    document.querySelector('#TituloModalU').innerHTML = "Actualizar Unidades";
    document.querySelector('#btnTexU').innerHTML = "Actualizar";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Configuracion/getUnidad/' + id_uni_medida;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector('#UUnidades').value = objData.Data.id_uni_medida;
                document.querySelector('#uni_medida').value = objData.Data.uni_medida;
                $('#unidadMedida-modal').modal("show");
            } else {
                swal("Error", objData.msj, "error");
            }
        }
    }
}

//DELETE DE UNIDADES MEDIDAS//
function fntDelUnidades(id_uni_medida) { //se obtiene del inspeccionar
    var id_uni_medida = id_uni_medida;
    /* alert(idrol); */
    swal({
        title: 'Eliminar Unidad ',
        text: "¿Realmente quiere eliminar este registro?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        preConfirm: false
    }).then((result) => {
        if (result.value) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + '/Configuracion/delUnidades/';
            var strData = "id_uni_medida=" + id_uni_medida;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminado!", objData.msg, "success");
                        TablaUnidades.api().ajax.reload();
                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }
    })
}

//UPDATE PARA IMPUESTOS
function fntEditImpuestos(id_tip_impuestos) {
    document.querySelector('#TituloModalI').innerHTML = "Actualizar Impuestos";
    document.querySelector('#btnTexI').innerHTML = "Actualizar";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Configuracion/getImpuesto/' + id_tip_impuestos;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector('#UImpuesto').value = objData.Data.id_tip_impuestos;
                document.querySelector('#nom_isv').value = objData.Data.nom_isv;
                document.querySelector('#porcentaje').value = objData.Data.porcentaje;
                $('#impuesto-modal').modal("show");
            } else {
                swal("Error", objData.msj, "error");
            }
        }
    }
}

//DELETE DE IMPUESTOS//
function fntDelImpuestos(id_tip_impuestos) { //se obtiene del inspeccionar
    var id_tip_impuestos = id_tip_impuestos;
    /* alert(idrol); */
    swal({
        title: 'Eliminar Impuesto ',
        text: "¿Realmente quiere eliminar este registro?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        preConfirm: false
    }).then((result) => {
        if (result.value) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + '/Configuracion/delImpuestos/';
            var strData = "id_tip_impuestos=" + id_tip_impuestos;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminado!", objData.msg, "success");
                        TablaImpuestos.api().ajax.reload();
                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }
    })
}

//UPDATE PARA CARGOS
function fntEditCargos(id_cargo) {
    document.querySelector('#TituloModalCA').innerHTML = "Actualizar Cargos";
    document.querySelector('#btnTexCA').innerHTML = "Actualizar";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Configuracion/getCargo/' + id_cargo;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector('#UCargo').value = objData.Data.id_cargo;
                document.querySelector('#cargo').value = objData.Data.cargo;
                $('#modalCargo').modal("show");
            } else {
                swal("Error", objData.msj, "error");
            }
        }
    }
}

//DELETE DE CARGOS//
function fntDelCargos(id_cargo) { //se obtiene del inspeccionar
    var id_cargo = id_cargo;
    /* alert(idrol); */
    swal({
        title: 'Eliminar Cargo ',
        text: "¿Realmente quiere eliminar este registro?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        preConfirm: false
    }).then((result) => {
        if (result.value) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + '/Configuracion/delCargos/';
            var strData = "id_cargo=" + id_cargo;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminado!", objData.msg, "success");
                        TablaCargos.api().ajax.reload();
                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }
    })
}

//UPDATE PARA EMPLEADOS
function fntEditEmpleados(id_tip_empleado) {
    document.querySelector('#TituloModalEm').innerHTML = "Actualizar Empleado";
    document.querySelector('#btnTexEm').innerHTML = "Actualizar";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Configuracion/getEmpleado/' + id_tip_empleado;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector('#UEmpleado').value = objData.Data.id_tip_empleado;
                document.querySelector('#tipo_empleado').value = objData.Data.tipo_empleado;
                $('#modalTipoEm').modal("show");
            } else {
                swal("Error", objData.msj, "error");
            }
        }
    }
}

//DELETE DE EMPLEADOS//
function fntDelEmpleados(id_tip_empleado) { //se obtiene del inspeccionar
    var id_tip_empleado = id_tip_empleado;
    /* alert(idrol); */
    swal({
        title: 'Eliminar Empleado ',
        text: "¿Realmente quiere eliminar este registro?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        preConfirm: false
    }).then((result) => {
        if (result.value) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + '/Configuracion/delEmpleados/';
            var strData = "id_tip_empleado=" + id_tip_empleado;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminado!", objData.msg, "success");
                        TablaEmpleados.api().ajax.reload();
                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }
    })
}

//UPDATE PARA ROL
function fntEditRol(id_rol) {
    document.querySelector('#TituloModalR').innerHTML = "Actualizar Rol";
    document.querySelector('#btnTexR').innerHTML = "Actualizar";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Configuracion/getRol/' + id_rol;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector('#URol').value = objData.Data.id_rol;
                document.querySelector('#rol').value = objData.Data.rol;
                $('#modalRol').modal("show");
            } else {
                swal("Error", objData.msj, "error");
            }
        }
    }
}

//DELETE DE ROL//
function fntDelRol(id_rol) { //se obtiene del inspeccionar
    var id_rol = id_rol;
    /* alert(idrol); */
    swal({
        title: 'Eliminar Rol ',
        text: "¿Realmente quiere eliminar este registro?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        preConfirm: false
    }).then((result) => {
        if (result.value) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + '/Configuracion/delRoles/';
            var strData = "id_rol=" + id_rol;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminado!", objData.msg, "success");
                        TablaRol.api().ajax.reload();
                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }
    })
}

//UPDATE PARA REGIMEN DE FACTURACION
function fntEditFacturacion(id_regi_fact) {
    document.querySelector('#TituloModalRF').innerHTML = "Actualizar CAI";
    document.querySelector('#btnTexRF').innerHTML = "Actualizar";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Configuracion/getFacturaciones/' + id_regi_fact;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector('#UFacturacion').value = objData.Data.id_regi_fact;
                document.querySelector('#cai').value = objData.Data.cai;
                document.querySelector('#cor_inic').value = objData.Data.cor_inic;
                document.querySelector('#cor_final').value = objData.Data.cor_fin;
                document.querySelector('#fecha_limite').value = objData.Data.fec_lim_emi;
                $('#small-modaladdbanco').modal("show");
            } else {
                swal("Error", objData.msj, "error");
            }
        }
    }
}

//UPDATE PARA EMPRESAS
function fntEditEmpresas(id_empresa) {
    document.querySelector('#TituloModalEP').innerHTML = "Actualizar Empresa";
    document.querySelector('#btnTexEP').innerHTML = "Actualizar";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Configuracion/getEmpresas/' + id_empresa;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector('#UEmpresa').value = objData.Data.id_empresa;
                document.querySelector('#rtn_empresa').value = objData.Data.rtn_empresa;
                document.querySelector('#nom_empresa').value = objData.Data.nom_empresa;
                $('#small-modaladdEmpresa').modal("show");
            } else {
                swal("Error", objData.msj, "error");
            }
        }
    }
}

//DELETE DE EMPRESA//
function fntDelEmpresas(id_empresa) { //se obtiene del inspeccionar
    var id_empresa = id_empresa;
    /* alert(idrol); */
    swal({
        title: 'Eliminar Empresa ',
        text: "¿Realmente quiere eliminar este registro?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        preConfirm: false
    }).then((result) => {
        if (result.value) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + '/Configuracion/delEmpresas/';
            var strData = "id_empresa=" + id_empresa;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminado!", objData.msg, "success");
                        TablaEmpresa.api().ajax.reload();
                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }
    })
}

function fntPermisos(idRol) {
    var idrol = idRol;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Permisos/getPermisosRol/' + idrol;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            document.querySelector('#contentAjax').innerHTML = request.responseText;
            $('#permisos-modal').modal('show');
            document.querySelector('#formPermisos').addEventListener('submit', fntSavePermisos, false);
        }
    }
}

function fntSavePermisos(evnet) {
    evnet.preventDefault();
    divLoading.style.display = "flex";
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Permisos/setPermisos';
    var formElement = document.querySelector("#formPermisos");
    var formData = new FormData(formElement);
    request.open("POST", ajaxUrl, true);
    request.send(formData);
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                swal("Permisos de usuario", objData.msg, "success");
                $('#permisos-modal').modal("hide");
            } else {
                swal("Error", objData.msg, "error");
            }
        }
        divLoading.style.display = "none";
        return false;
    }


}

function seleccionar_todo() {
    for (i = 0; i < document.formPermisos.elements.length; i++)
        if (document.formPermisos.elements[i].type == "checkbox")
            document.formPermisos.elements[i].checked = 1
}

function deseleccionar_todo() {
    for (i = 0; i < document.formPermisos.elements.length; i++)
        if (document.formPermisos.elements[i].type == "checkbox")
            document.formPermisos.elements[i].checked = 0
}