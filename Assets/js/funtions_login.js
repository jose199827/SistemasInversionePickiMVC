var divLoading = document.querySelector('#divLoading');
let divPregunta = document.querySelector('#divPregunta');
document.addEventListener('DOMContentLoaded', function() {
    if (document.querySelector("#formLogin")) {
        let formLogin = document.querySelector("#formLogin");
        formLogin.onsubmit = function(e) {
            e.preventDefault();
            let strEmail = document.querySelector('#txtEmail').value;
            let strPassword = document.querySelector('#txtPassword').value;
            if (strEmail == '' || strPassword == '') {
                swal("Atención", "Escribe un correo y contraseña.", "error");
                return false;
            } else {
                let elemtedValid = document.getElementsByClassName("valid");
                for (let i = 0; i < elemtedValid.length; i++) {
                    if (elemtedValid[i].classList.contains('form-control-danger')) {
                        swal("Atención", "Por favor verifica los campos en rojo.", "error");
                        return false;
                    }
                }
                divLoading.style.display = "flex";
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url + '/Login/loginUser';
                var formData = new FormData(formLogin);
                request.open("POST", ajaxUrl, true);
                request.send(formData);
                request.onreadystatechange = function() {
                    if (request.readyState != 4) return;
                    if (request.status == 200) {
                        var objData = JSON.parse(request.responseText);
                        if (objData.status) {
                            /* window.location = base_url + '/Dashboard'; */
                            swal({
                                position: 'center',
                                title: 'Bienvenido al Sistema',
                                text: objData.msg,
                                type: 'success',
                                showConfirmButton: false,
                                timer: 1000
                            });
                            window.location.reload(false);
                        } else {
                            swal("Atención", objData.msg, "error");
                            document.querySelector('#txtPassword').value = "";
                            document.querySelector('#txtEmail').value = "";
                        }
                    } else {
                        swal("Atención", "Error en el proceso.", "error");

                    }
                    divLoading.style.display = "none";
                    return false;
                }
            }
        }
    }
    if (document.querySelector("#formResetPass")) {
        let formResetPass = document.querySelector("#formResetPass");
        formResetPass.onsubmit = function(e) {
            e.preventDefault();
            let strEmailReset = document.querySelector('#txtEmailReset').value;
            if (strEmailReset == '') {
                swal("Atención", "Escribe tu correo electrónico.", "error");
                return false;
            } else {
                let elemtedValid = document.getElementsByClassName("valid");
                for (let i = 0; i < elemtedValid.length; i++) {
                    if (elemtedValid[i].classList.contains('form-control-danger')) {
                        swal("Atención", "Por favor verifica los campos en rojo.", "error");
                        return false;
                    }
                }
                divLoading.style.display = "flex";
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url + '/Login/resetPass';
                var formData = new FormData(formResetPass);
                request.open("POST", ajaxUrl, true);
                request.send(formData);
                request.onreadystatechange = function() {
                    if (request.readyState != 4) return;
                    if (request.status == 200) {
                        var objData = JSON.parse(request.responseText);
                        if (objData.status) {
                            swal({
                                title: 'Correo Enviado',
                                text: objData.msg,
                                type: 'success',
                                confirmButtonText: "Aceptar",
                                preConfirm: false
                            }).then((result) => {
                                if (result.value) {
                                    window.location = base_url;
                                }
                            })
                        } else {
                            swal("Atención", objData.msg, "error");
                            document.querySelector('#txtEmailReset').value = "";
                        }
                    } else {
                        swal("Atención", "Error en el proceso.", "error");
                        document.querySelector('#txtEmailReset').value = "";
                    }
                    divLoading.style.display = "none";
                    return false;
                }
            }
        }
    }
    if (document.querySelector("#formCambiarPass")) {
        let formCambiarPass = document.querySelector("#formCambiarPass");
        formCambiarPass.onsubmit = function(e) {
            e.preventDefault();
            let strPassword = document.querySelector('#txtPassword').value;
            let strPasswordConfirm = document.querySelector('#txtPasswordConfirm').value;
            let idUsuario = document.querySelector('#idUsuario').value;
            if (strPassword == '' || strPasswordConfirm == '') {
                swal("Atención", "Escribe la nueva contraseña y confirma.", "error");
                return false;
            } else {
                if (strPassword < 5) {
                    swal("Atención", "La contraseña debe tener un mínimo de 5 caracteres.", "warning");
                    return false;
                }
                if (strPassword != strPasswordConfirm) {
                    swal("Atención", "Las contraseñas no son iguales.", "info");
                    return false;
                }
                divLoading.style.display = "flex";
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url + '/Login/setPass';
                var formData = new FormData(formCambiarPass);
                request.open("POST", ajaxUrl, true);
                request.send(formData);
                request.onreadystatechange = function() {
                    if (request.readyState != 4) return;
                    if (request.status == 200) {
                        var objData = JSON.parse(request.responseText);
                        if (objData.status) {
                            swal({
                                title: 'Iniciar sección',
                                text: objData.msg,
                                type: 'success',
                                confirmButtonText: "Iniciar sección",
                                preConfirm: false
                            }).then((result) => {
                                if (result.value) {
                                    window.location = base_url + '/Login';
                                }
                            })
                        } else {
                            swal("Atención", objData.msg, "error");
                            document.querySelector('#txtPassword').value = "";
                            document.querySelector('#txtPasswordConfirm').value = "";
                        }
                    } else {
                        swal("Atención", "Error en el proceso.", "error");
                        document.querySelector('#txtPassword').value = "";
                        document.querySelector('#txtPasswordConfirm').value = "";
                    }
                    divLoading.style.display = "none";
                }
            }
        }
    }
    if (document.querySelector("#formResetPassPregunta")) {
        let formResetPassPregunta = document.querySelector("#formResetPassPregunta");
        formResetPassPregunta.onsubmit = function(e) {
            e.preventDefault();
            let usuaioReset = document.querySelector('#txtUsuaioReset').value;
            let listPregunta = document.querySelector('#listPregunta').value;
            let respuesta = document.querySelector('#txtRespuesta').value;
            if (usuaioReset == '' || listPregunta == '' || respuesta == '') {
                swal("Atención", "Todos los campos son obligatorios.", "error");
                return false;
            } else {
                let elemtedValid = document.getElementsByClassName("valid");
                for (let i = 0; i < elemtedValid.length; i++) {
                    if (elemtedValid[i].classList.contains('form-control-danger')) {
                        swal("Atención", "Por favor verifica los campos en rojo.", "error");
                        return false;
                    }
                }
                divLoading.style.display = "flex";
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url + '/Login/resetPassPregunta';
                var formData = new FormData(formResetPassPregunta);
                request.open("POST", ajaxUrl, true);
                request.send(formData);
                request.onreadystatechange = function() {
                    if (request.readyState != 4) return;
                    if (request.status == 200) {
                        var objData = JSON.parse(request.responseText);
                        if (objData.status) {
                            swal({
                                title: 'Datos correctos',
                                text: objData.msg,
                                type: 'success',
                                confirmButtonText: "Aceptar",
                                preConfirm: false,
                                timer: 3000
                            }).then((result) => {
                                if (result.value) {
                                    window.location = objData.url;
                                }
                            });
                            window.location = objData.url;
                        } else {
                            swal("Atención", objData.msg, "error");
                            divPregunta.style.display = "none";
                            document.querySelector('#txtUsuaioReset').value = "";
                            document.querySelector("#divPreguntaEnviar").classList.add("notblock");
                        }
                    } else {
                        swal("Atención", "Error en el proceso.", "error");
                        divPregunta.style.display = "none";
                        document.querySelector('#txtUsuaioReset').value = "";
                    }
                    divLoading.style.display = "none";
                    return false;
                }
            }
        }
    }

}, false);

function buscarUser() {
    let usuaioReset = document.querySelector('#txtUsuaioReset').value;
    if (usuaioReset == '') {
        swal("Atención", "Todos los campos son obligatorios.", "error");
        return false;
    }
    divLoading.style.display = "flex";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Login/getUsuarioPreguntas';
    let strData = "nombreUsuario=" + usuaioReset;
    request.open("POST", ajaxUrl, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(strData);
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                swal({
                    title: 'Sistema',
                    html: '<p><strong>Nombre: </strong>' + objData.data.nom_persona + " " + objData.data.ape_persona +
                        '</p>' +
                        '<p><strong>Correo: </strong>' + objData.data.correo + '</p>' +
                        '<p><strong>Usuario: </strong>' + objData.data.nom_usuario + '</p>',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Si Soy Yo!",
                    cancelButtonText: "No Soy Yo!",
                    preConfirm: false
                }).then((result) => {
                    if (result.value) {
                        let idUser = objData.data.id_usuario;
                        document.querySelector('#iduser').value = idUser;
                        buscarPreguntaUser(idUser);
                        divPregunta.style.display = "";

                    } else {
                        divPregunta.style.display = "none";
                        document.querySelector('#txtUsuaioReset').value = "";
                    }
                })
            } else {
                swal("Atención!", objData.msg, "error");
            }
        }
        divLoading.style.display = "none";
        return false;
    }
}

function buscarPreguntaUser(idUser) {
    divLoading.style.display = "flex";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Login/buscarPreguntaUser';
    let strData = "idUser=" + idUser;
    request.open("POST", ajaxUrl, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(strData);
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector('#listPregunta').innerHTML = objData.data;
                document.querySelector('#listPregunta').value = 1;
                $('#listPregunta').selectpicker('refresh');
            } else {
                swal("Atención!", objData.msg, "error");
            }
        }
        divLoading.style.display = "none";
        return false;
    }
}

if (document.querySelector("#txtRespuesta")) {
    let direccion = document.querySelector("#txtRespuesta");
    direccion.addEventListener('keyup', function() {
        let dir = this.value;
        fntEnviar();
    });
}

function fntEnviar() {
    let respuesta = document.querySelector("#txtRespuesta").value;
    if (respuesta == "") {
        document.querySelector("#divPreguntaEnviar").classList.add("notblock");
    } else {
        document.querySelector("#divPreguntaEnviar").classList.remove("notblock");
    }
}