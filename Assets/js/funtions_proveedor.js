let divLoading = document.querySelector("#divLoading");

let tabla_proveedores;
 
 document.addEventListener("DOMContentLoaded", function () {
 	tabla_proveedores = $("#tabla_proveedores").dataTable({
    scrollCollapse: true,
    autoWidth: false,
    responsive: true,
    columnDefs: [
      {
        targets: "datatable-nosort",
        orderable: false,
      },
    ],
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
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
      buttons: {
        copy: "Copiar",
        colvis: "Visibilidad",
      },
    },
    ajax: {
      url: " " + base_url + "/Proveedores/getProveedores",
      dataSrc: "",
    },
    columns: [
      { data: "id_proveedor" },
      { data: "nom_empresa" },
      { data: "con_empresa" },
      { data: "nom_banco" },
      { data: "num_cuenta" },
      { data: "telefono" },
      { data: "options" },
    ],
 	});
 	if (document.querySelector("#registrarproveedor")) {
 		let registrarproveedor = document.querySelector("#registrarproveedor");
 		registrarproveedor.onsubmit=function(e)	{
 			e.preventDefault();
 		let nombre_proveedor = document.querySelector("#conempresa").value;
 		let nombre_empresa = document.querySelector("#nomempresa").value;
 		let nacionalidad = document.querySelector("#nacionalidad").value;
 		let telefono = document.querySelector("#telefono").value;
 		let rtnempresa = document.querySelector("#rtnempresa").value;
 		let direccion = document.querySelector("#direccion").value;
 		let correo = document.querySelector("#correo").value;
 		let banco = document.querySelector("#banco").value;
 		let numcuenta = document.querySelector("#numcuenta").value;
 		if (nombre_proveedor==""||nombre_empresa==""||nacionalidad==""||telefono==""||rtnempresa==""||direccion==""||correo==""||numcuenta=="") {
 			swal("!Atencion!","Todos los campos son obligatorios","error");
 			return false;
 		}
 		divLoading.style.display = "flex";
            let request = window.XMLHttpRequest ?
                new XMLHttpRequest() :
                new ActiveXObject("Microsoft.XMLHTTP");
            let ajaxUrl = base_url + "/Proveedores/setProveedores";
            let formData = new FormData(registrarproveedor);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange=function(){
            	if (request.readyState == 4 && request.status == 200) {
            		let objData=JSON.parse(request.responseText);
            		if (objData.status) {
                      swal("Exito", objData.msg, "success");
                        document.querySelector('#registrarproveedor').reset();
            		}
            		else {
                     swal("Error", objData.msg, "error");
            		}

            	}
            	divLoading.style.display = "none";
                return false;
            }
 		}
 	}
 	if (document.querySelector("#actualizarproveedor")) {
 		let actualizarproveedor = document.querySelector("#actualizarproveedor");
 		actualizarproveedor.onsubmit=function(e)	{
 			e.preventDefault();
 		let nombre_proveedor = document.querySelector("#conempresa").value;
 		let nombre_empresa = document.querySelector("#nomempresa").value;
 		let nacionalidad = document.querySelector("#nacionalidad").value;
 		let telefono = document.querySelector("#telefono").value;
 		let rtnempresa = document.querySelector("#rtnempresa").value;
 		let direccion = document.querySelector("#direccion").value;
 		let correo = document.querySelector("#correo").value;
 		let banco = document.querySelector("#banco").value;
 		let numcuenta = document.querySelector("#numcuenta").value;
 		if (nombre_proveedor==""||nombre_empresa==""||nacionalidad==""||telefono==""||rtnempresa==""||direccion==""||correo==""||numcuenta=="") {
 			swal("!Atencion!","Todos los campos son obligatorios","error");
 			return false;
 		}
 		divLoading.style.display = "flex";
            let request = window.XMLHttpRequest ?
                new XMLHttpRequest() :
                new ActiveXObject("Microsoft.XMLHTTP");
            let ajaxUrl = base_url + "/Proveedores/actualizarProveedores";
            let formData = new FormData(actualizarproveedor);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange=function(){
            	if (request.readyState == 4 && request.status == 200) {
            		let objData=JSON.parse(request.responseText);
            		if (objData.status) {
                      swal("Exito", objData.msg, "success");
                        document.querySelector('#actualizarproveedor').reset();
                        window.location = base_url + '/Proveedores/Tabla';
            		}
            		else {
                     swal("Error", objData.msg, "error");
            		}

            	}
            	divLoading.style.display = "none";
                return false;
            }
 		}
 	}
 });
 $(document).ready(function() {
    $("#tabla_proveedores").DataTable();
});
function fntDelProveedores(id_proveedor)
{
	swal({
        title: 'Eliminar proveedor',
        text: "¿Realmente quiere eliminar este proveedor?",
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
            let ajaxUrl = base_url + '/Proveedores/eliminarProveedor/';
            let strData = "idproveedor=" + id_proveedor;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminado!", objData.msg, "success");
                        tabla_proveedores.api().ajax.reload(function() {});
                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }
    })
}
  function Halarbanco() {
  	let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Proveedores/getBancos/';
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {
    if (request.readyState == 4 && request.status == 200) {
    	document.querySelector("#banco").innerHTML=request.responseText;
    	document.querySelector("#banco").value=1;
    	$("#banco").selectpicker("refresh");

    }
    }
  }
 window.addEventListener(
    "load",
    function() {
     Halarbanco();
    },
    false
);
