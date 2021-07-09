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

$(document).ready(function() {
    /* Burcar a los clientes por el id */
    $("#id_cliente").keyup(function(e) {
        e.preventDefault();
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url + '/Facturacion/getCliente';
        var cl = $(this).val();
        let strData = "idCliente=" + cl;
        request.open("POST", ajaxUrl, true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send(strData);
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                let objData = JSON.parse(request.responseText);
                if (objData.status) {
                    document.querySelector('#nom_cliente').value = objData.data.nom_persona + " " + objData.data.ape_persona;
                    document.querySelector('#tel_cliente').value = objData.data.telefono;
                    document.querySelector('#direccion').innerHTML = objData.data.direccion;
                } else {
                    document.querySelector('#nom_cliente').value = "";
                    document.querySelector('#tel_cliente').value = "";
                    document.querySelector('#direccion').innerHTML = "";
                }
            }
            return false;
        }
    });
    /* Burcar  productos por codigo */
    $("#txt_cod_producto").keyup(function(e) {
        e.preventDefault();
        if (pro != "") {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Facturacion/getProducto';
            var pro = $(this).val();
            let strData = "idProducto=" + pro;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        $('#txt_descripcion').html(objData.data.nom_producto + " " + objData.data.des_producto);
                        $('#txt_existencia').html(objData.data.cantidad);
                        $('#txt_cant_producto').attr('max', objData.data.cantidad);
                        $('#txt_precio').html(objData.data.pre_reventa);
                        $('#txt_precio_total').html(objData.data.pre_reventa);
                        $('#txt_cant_producto').removeAttr('disabled');
                        $('#txt_des_producto').removeAttr('disabled');
                        $('#add_product_venta').slideDown();
                    } else {
                        $('#txt_descripcion').html('-');
                        $('#txt_existencia').html('-');
                        $('#txt_existencia').val(0);
                        $('#txt_precio').html(0.00);
                        $('#txt_precio_total').html(0.00);

                        $('#txt_cant_producto').attr('disabled', 'disabled');
                        $('#txt_des_producto').attr('disabled', 'disabled');
                        $('#add_product_venta').slideUp();
                    }
                }
                return false;
            }
        }
    });
    //Validar Cantidad
    $("#txt_cant_producto").change(function(e) {
        e.preventDefault();
        var precioTotal = $("#txt_cant_producto").val() * $("#txt_precio").html();
        var descuento = (($("#txt_des_producto").val()) / 100);
        var conDecimal = descuento.toFixed(2);
        var ValDes = precioTotal * conDecimal;
        var PrecioconDes = precioTotal - ValDes;
        $("#txt_precio_total").html(PrecioconDes);
    });
    $("#txt_des_producto").change(function(e) {
        e.preventDefault();
        var descuento = (($("#txt_des_producto").val()) / 100);
        var conDecimal = descuento.toFixed(2);
        var precio = $("#txt_cant_producto").val() * $("#txt_precio").html();
        var precioDes = precio * conDecimal;
        var precioTotal = precio - precioDes;
        $("#txt_precio_total").html(precioTotal);
    });
    //agregar productos al detalle
    $('#add_product_venta').click(function(e) {
        e.preventDefault();
        if ($("#txt_cant_producto").val() > 0) {
            var codproducto = $('#txt_cod_producto').val();
            var cantidad = $('#txt_cant_producto').val();
            var descuento = $('#txt_des_producto').val();
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Facturacion/setProducto';
            let formData = new FormData();
            request.open("POST", ajaxUrl, true);
            formData.append("codproducto", codproducto);
            formData.append("cantidad", cantidad);
            formData.append("descuento", descuento);
            request.send(formData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        $('#detalle_venta').html(objData.data.detalle);
                        $('#detalle_Totales').html(objData.data.totales);

                        $('#txt_cod_producto').val('');
                        $('#txt_descripcion').html('-');
                        $('#txt_existencia').html('-');
                        $('#txt_cant_producto').val('1');
                        $('#txt_des_producto').val('0');
                        $('#txt_precio').html('0.00');
                        $('#txt_precio_total').html('0.00')

                        $('#txt_cant_producto').attr('disabled', 'disabled');
                        $('#txt_des_producto').attr('disabled', 'disabled');
                        $('#add_product_venta').slideUp();
                    }
                    viewProesar();
                }
                return false;
            }
        }
    });
    //Anular Factura
    $('#btn_anular_venta').click(function(e) {
        var row = $('#detalle_venta tr').length;
        if (row > 0) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Facturacion/deleteFactura';
            request.open("POST", ajaxUrl, true);
            request.send();
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        location.reload();
                    }
                }
                return false;
            }
        }
    });
    // Facturar Venta
    $('#btn_factura_venta').click(function(e) {
        e.preventDefault();
        var row = $('#detalle_venta tr').length;
        var codcliente = $('#idcliente').val();
        if (row > 0) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Facturacion/getFactura';
            let strData = "codcliente=" + codcliente;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {} else {}
                }
                return false;
            }
        }
    });
});

function viewProesar() {
    if ($('#detalle_venta tr').length > 0) {
        $('#btn_factura_venta').show();
    } else {
        $('#btn_factura_venta').hide();
    }
}