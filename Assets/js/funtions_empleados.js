let divLoading = document.querySelector("#divLoading");

let tabla_empleados;

/* let tabla_usuarios; */

document.addEventListener("DOMContentLoaded", function () {
  tabla_empleados = $("#tabla_empleados").dataTable({
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
      url: " " + base_url + "/Empleados/getEmpleados",
      dataSrc: "",
    },
    columns: [
      { data: "numRegistro" },
      { data: "num_id_persona" },
      { data: "nom_persona" },
      { data: "eda_persona" },
      { data: "gen_persona" },
      { data: "options" },
    ],
    'dom': 'lBfrtip',
            'buttons': [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
            ],

  });

  if (document.querySelector("#formEmpleado")) {
    let formEmpleado = document.querySelector("#formEmpleado");
    formEmpleado.onsubmit = function (e) {
      e.preventDefault();
      let nombre_empleado = document.querySelector("#nombreEmpleado").value;
      let apellido_empleado = document.querySelector("#apellido").value;
      let edad_empleado = document.querySelector("#edad").value;
      let identidad_empleado = document.querySelector("#identidad").value;
      let nacimiento_empleado = document.querySelector("#nacimiento").value;
      let correo_empleado = document.querySelector("#correo").value;
      let genero_empleado = document.querySelector("#genero").value;
      let telefono_empleado = document.querySelector("#telefono").value;
      let direccion_empleado = document.querySelector("#direccion").value;
      let salario_empleado = document.querySelector("#salario").value;
      let ingreso_empleado = document.querySelector("#ingreso").value;
      let cargo_empleado = document.querySelector("#cargo").value;
      let salida_empleado = document.querySelector("#salida").value;
      let motivo_empleado = document.querySelector("#motivo").value;
      let estatus_empleado = document.querySelector("#estatus").value;
      let tipo_empleado = document.querySelector("#tipo").value;

      /* VALIDAR QUE LOS CAMPOS ESTEN LLENOS */
      if (
        nombre_empleado == "" ||
        apellido_empleado == "" ||
        edad_empleado == "" ||
        identidad_empleado == "" ||
        nacimiento_empleado == "" ||
        correo_empleado == "" ||
        genero_empleado == "" ||
        telefono_empleado == "" ||
        direccion_empleado == "" ||
        salario_empleado == "" ||
        cargo_empleado == "" ||
        estatus_empleado == "" ||
        tipo_empleado == ""
      ) {
        swal("Atención", "Todos los campos son obligatorios", "error");
        return false;
      }
    
      divLoading.style.display = "flex";
      let request = window.XMLHttpRequest ?
          new XMLHttpRequest() :
          new ActiveXObject("Microsoft.XMLHTTP");
      let ajaxUrl = base_url + "/Empleados/setEmpleado";
      let formData = new FormData(formEmpleado);
      request.open("POST", ajaxUrl, true);
      request.send(formData);

      request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
          let objData = JSON.parse(request.responseText);
          if (objData.status) {
            swal("Exito", objData.msg, "success");
            document.querySelector("#formEmpleado").reset();
            nombre_empleado.value = "";
            apellido_empleado.value = "";
            edad_empleado.value = "";
            identidad_empleado.value = "";
            nacimiento_empleado.value = "";
            correo_empleado.value = "";
            genero_empleado.value = "";
            telefono_empleado.value = "";
            direccion_empleado.value = "";
            salario_empleado.value = "";
            cargo_empleado.value = "";
            estatus_empleado.value = "";
            tipo_empleado.value = "";
          } else {
            swal("Error", objData.msg, "error");
          }
        }

        divLoading.style.display = "none";
        return false;
      };
    };
  }

  if (document.querySelector("#formEditarEmpleado")) {
    let formEditarEmpleado = document.querySelector("#formEditarEmpleado");
    formEditarEmpleado.onsubmit = function (e) {
      e.preventDefault();
      let nombre_empleado = document.querySelector("#nombreEmpleado").value;
      let apellido_empleado = document.querySelector("#apellido").value;
      let edad_empleado = document.querySelector("#edad").value;
      let identidad_empleado = document.querySelector("#identidad").value;
      let nacimiento_empleado = document.querySelector("#nacimiento").value;
      let correo_empleado = document.querySelector("#correo").value;
      let genero_empleado = document.querySelector("#genero").value;
      let telefono_empleado = document.querySelector("#telefono").value;
      let direccion_empleado = document.querySelector("#direccion").value;
      let salario_empleado = document.querySelector("#salario").value;
      let ingreso_empleado = document.querySelector("#ingreso").value;
      let cargo_empleado = document.querySelector("#cargou").value;
      let salida_empleado = document.querySelector("#salida").value;
      let motivo_empleado = document.querySelector("#motivo").value;
      let estatus_empleado = document.querySelector("#estatus").value;
      let tipo_empleado = document.querySelector("#tipou").value;

      /* VALIDAR QUE LOS CAMPOS ESTEN LLENOS */
      if (
        nombre_empleado == "" ||
        apellido_empleado == "" ||
        edad_empleado == "" ||
        identidad_empleado == "" ||
        nacimiento_empleado == "" ||
        correo_empleado == "" ||
        genero_empleado == "" ||
        telefono_empleado == "" ||
        direccion_empleado == "" ||
        salario_empleado == "" ||
        cargo_empleado == "" ||
        estatus_empleado == "" ||
        tipo_empleado == ""
      ) {
        swal("Atención", "Todos los campos son obligatorios", "error");
        return false;
      }

      divLoading.style.display = "flex";
      let request = window.XMLHttpRequest
        ? new XMLHttpRequest()
        : new ActiveXObject("Microsoft.XMLHTTP");
      let ajaxUrl = base_url + "/Empleados/setUpdateEmpleado";
      let formData = new FormData(formEditarEmpleado);
      request.open("POST", ajaxUrl, true);
      request.send(formData);

      request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
          let objData = JSON.parse(request.responseText);
          if (objData.status) {
            swal("Exito", objData.msg, "success");
            window.location = base_url + "/Empleados/Tabla";
            document.querySelector("#formEditarEmpleado").reset();
            nombre_empleado.value = "";
            apellido_empleado.value = "";
            edad_empleado.value = "";
            identidad_empleado.value = "";
            nacimiento_empleado.value = "";
            correo_empleado.value = "";
            genero_empleado.value = "";
            telefono_empleado.value = "";
            direccion_empleado.value = "";
            salario_empleado.value = "";
            cargo_empleado.value = "";
            estatus_empleado.value = "";
            tipo_empleado.value = "";
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

function fntDelEmpleados(idpersona) {
  swal({
    title: "Eliminar empleado",
    text: "¿Realmente quiere eliminar este empleado?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, eliminar!",
    cancelButtonText: "No, cancelar!",
    preConfirm: false,
  }).then((result) => {
    if (result.value) {
      let request = window.XMLHttpRequest
        ? new XMLHttpRequest()
        : new ActiveXObject("Microsoft.XMLHTTP");
      let ajaxUrl = base_url + "/Empleados/eliminarEmpleado/";
      let strData = "idUsuario=" + idpersona;
      request.open("POST", ajaxUrl, true);
      request.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
      );
      request.send(strData);
      request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
          let objData = JSON.parse(request.responseText);
          if (objData.status) {
            swal("Eliminado!", objData.msg, "success");
            tabla_empleados.api().ajax.reload(function () {});
          } else {
            swal("Atención!", objData.msg, "error");
          }
        }
      };
    }
  });
}

function fnt_cargo() {
  if (document.querySelector("#cargo")) {
    let request = window.XMLHttpRequest
      ? new XMLHttpRequest()
      : new ActiveXObject("Microsoft.XMLHTTP");
    let ajaxUrl = base_url + "/Empleados/getSelectCargo";

    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        document.querySelector("#cargo").innerHTML = request.responseText;
        document.querySelector("#cargo").value = 1;
        $("#cargo").selectpicker("refresh");
      }
    };
  }
}


function fnt_tipo_empleado() {
  if (document.querySelector("#tipo")) {
      let request = window.XMLHttpRequest ?
          new XMLHttpRequest() :
          new ActiveXObject("Microsoft.XMLHTTP");
      let ajaxUrl = base_url + "/Empleados/getSelectTipo_empleado";

      request.open("GET", ajaxUrl, true);
      request.send();
      request.onreadystatechange = function() {
          if (request.readyState == 4 && request.status == 200) {
              document.querySelector("#tipo").innerHTML = request.responseText;
              document.querySelector("#tipo").value = 1;
              $("#tipo").selectpicker("refresh");
          }
      };
  }
}

function fnt_Rol() {
  if (document.querySelector("#rol")) {
    let request = window.XMLHttpRequest
      ? new XMLHttpRequest()
      : new ActiveXObject("Microsoft.XMLHTTP");
    let ajaxUrl = base_url + "/Empleados/getSelectRol";

    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        document.querySelector("#rol").innerHTML = request.responseText;
        document.querySelector("#rol").value = 1;

        $("#rol").selectpicker("refresh");
      }
    };
  }
}

function fnt_pregunta() {
  if (document.querySelector("#pregunta1")) {
    let request = window.XMLHttpRequest
      ? new XMLHttpRequest()
      : new ActiveXObject("Microsoft.XMLHTTP");
    let ajaxUrl = base_url + "/Empleados/getSelectPregunta";

    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        document.querySelector("#pregunta1").innerHTML = request.responseText;
        document.querySelector("#pregunta1").value = 1;
        $("#pregunta1").selectpicker("refresh");
      }
    };
  }
}

/* // Accedemos al botón
 var emailInput = document.querySelectorAll('.emailInput');

// evento para el input radio del "si"
document.getElementById('interesadoPositivo').addEventListener('click', function(e) {
  console.log('Vamos a habilitar el input text');
  emailInput.disabled = false;
});

// evento para el input radio del "no"
document.getElementById('interesadoNegativo').addEventListener('click', function(e) {
  console.log('Vamos a deshabilitar el input text');
  emailInput.disabled = true;
}); */  

/* function habilitar(value)
		{
			if(value=="1")
			{
				// habilitamos
				document.getElementById("segundo").disabled=false;
			}else if(value=="2"){
				// deshabilitamos
				document.getElementById("segundo").disabled=true;
			}
		}
 */
/* $("input[name='gender']" ).change(function() {
  if ($(this).val() == 'texto') {
  $('#imagen').show();
  $('#nota').hide();
}
else {
  $('#imagen').hide();
  $('#nota').show();
}
}); */

/* $(function(){
  $(".op").click(function(){
    if ($(this).val()== 'si') {
      $("#usuario").removeAttr('disabled');
      $("#usuario").focus();    
      $("#password").removeAttr('disabled');
      $("#password").focus(); 
      $("#NombrePer").removeAttr('disabled');
      $("#NombrePer").focus(); 
      $("#Rol").removeAttr('disabled');
      $("#Rol").focus();   
    }else{
      $("#usuario").attr('disabled','disabled');
      $("#password").attr('disabled','disabled');
      $("#NombrePer").attr('disabled','');
      $("#Rol").attr('disabled','');
    }

  })
  
}) */


window.addEventListener(
  "load",
  function () {
    fnt_cargo();
    fnt_tipo_empleado();
    fnt_Rol();
    /* fnt_pregunta(); */
  },
  false
);

$(document).ready(function () {
  $("#tabla_empleados").DataTable();
   $("#tabla_usuarios").DataTable(); 
});
