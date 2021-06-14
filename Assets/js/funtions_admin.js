function controlTag(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) return true;
    else if (tecla == 0 || tecla == 9) return true;
    patron = /[0-9\s]/;
    n = String.fromCharCode(tecla);
    return patron.test(n);
}

function controlTagEspacio(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) return true;
    else if (tecla == 0 || tecla == 9) return true;
    patron = /[a-zA-ZÑñÁáÉéÍíÓóÚúÜü!#$%&*@0-9]/;
    n = String.fromCharCode(tecla);
    return patron.test(n);
}

/* Valida que solo sea texto ingresado */
function testText(txtString) {
    let stringText = new RegExp(/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/);
    if (stringText.test(txtString)) {
        return true;
    } else {
        return false;
    }
}

function fntValidText() {
    let validText = document.querySelectorAll(".validText");
    validText.forEach(function(validText) {
        validText.addEventListener('keyup', function() {
            let inputValue = this.value;
            if (!testText(inputValue)) {

                this.classList.add('form-control-danger');
            } else {
                this.classList.remove('form-control-danger');
            }
        });
    });
}

/* Valida que solo sea texto ingresado */
function testTextMayus(txtString) {
    let stringText = new RegExp(/^[A-Z\s]+$/);
    if (stringText.test(txtString)) {
        return true;
    } else {
        return false;
    }
}

function fntValidTextMayus() {
    let validText = document.querySelectorAll(".validTextMayus");
    validText.forEach(function(validText) {
        validText.addEventListener('keyup', function() {
            let inputValue = this.value;
            if (!testTextMayus(inputValue)) {
                this.classList.add('form-control-danger');
            } else {
                this.classList.remove('form-control-danger');
            }
        });
    });
}

/* Valida que solo sea texto ingresado */
function testTextNumMayus(txtString) {
    let stringText = new RegExp(/^[A-Z0-9-_\s]+$/);
    if (stringText.test(txtString)) {
        return true;
    } else {
        return false;
    }
}

function fntValidTextNumMayus() {
    let validText = document.querySelectorAll(".validTextNumMayus");
    validText.forEach(function(validText) {
        validText.addEventListener('keyup', function() {
            let inputValue = this.value;
            if (!testTextNumMayus(inputValue)) {
                this.classList.add('form-control-danger');
            } else {
                this.classList.remove('form-control-danger');
            }
        });
    });
}

/* Valida que solo sea texto con Numero ingresado */
function testTextNumero(txtString) {
    let stringText = new RegExp(/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü0-9\s]+$/);
    if (stringText.test(txtString)) {
        return true;
    } else {
        return false;
    }
}

/* Valida que solo sea numeros ingresado */
function testEntero(intCant) {
    let intCantidad = new RegExp(/^([0-9])*$/);
    if (intCantidad.test(intCant)) {
        return true;
    } else {
        return false;
    }
}

function fntEmailValidate(email) {
    let stringEmail = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
    if (stringEmail.test(email) == false) {
        return false;
    } else {
        return true;
    }
}

function fntValidTextNumber() {
    let validText = document.querySelectorAll(".validTextNumber");
    validText.forEach(function(validText) {
        validText.addEventListener('keyup', function() {
            let inputValue = this.value;
            if (!testTextNumero(inputValue)) {
                this.classList.add('form-control-danger');
                document.querySelector(".msj").classList.remove('notblock');
            } else {
                this.classList.remove('form-control-danger');
                document.querySelector(".msj").classList.add('notblock');
            }
        });
    });
}

function fntvalidNumber() {
    let validNumber = document.querySelectorAll(".validNumber");
    validNumber.forEach(function(validNumber) {
        validNumber.addEventListener('keyup', function() {
            let inputValue = this.value;
            if (!testEntero(inputValue)) {
                this.classList.add('form-control-danger');
            } else {
                this.classList.remove('form-control-danger');
            }
        });
    });
}

function fntvalidEmail() {
    let validEmail = document.querySelectorAll(".validEmail");
    validEmail.forEach(function(validEmail) {
        validEmail.addEventListener('keyup', function() {
            let inputValue = this.value;
            if (!fntEmailValidate(inputValue)) {
                this.classList.add('form-control-danger');
            } else {
                this.classList.remove('form-control-danger');
            }
        });
    });
}

window.addEventListener('load', function() {
    fntValidText();
    fntvalidNumber();
    fntvalidEmail();
    fntValidTextNumber();
    fntValidTextMayus();
    fntValidTextNumMayus();
    fntMensajePrimerIngreso();
}, false);

function fntMensajePrimerIngreso() {
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Home/getMsg';
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            /* console.log(objData); */
            if (objData.status) {
                $('#login-modal').modal('show');
            }
        }
    }
}

if (document.querySelector("#formCambiarPassInicio")) {
    let formCambiarPassInicio = document.querySelector("#formCambiarPassInicio");
    formCambiarPassInicio.onsubmit = function(e) {
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
            var ajaxUrl = base_url + '/Home/setPassInicio';
            var formData = new FormData(formCambiarPassInicio);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function() {
                if (request.readyState != 4) return;
                if (request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    console.log(objData);
                    if (objData.status) {
                        swal({
                            title: 'Iniciar sesión',
                            text: objData.msg,
                            type: 'success',
                            confirmButtonText: "Iniciar sesión",
                            preConfirm: false
                        }).then((result) => {
                            if (result.value) {
                                window.location = base_url + '/Logout';
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

let verPas = document.querySelector("#verPass");
let txtPassword = document.querySelector('#txtPassword');
verPas.addEventListener('click', function() {
    if (txtPassword.value != "") {
        if (txtPassword.type == "password") {
            txtPassword.type = "text";
            verPas.classList.remove("fa-eye");
            verPas.classList.add("fa-eye-slash");
            setTimeout("ocultarPass()", 1500);
        } else {
            txtPassword.type = "password";
            verPas.classList.remove("fa-eye-slash");
            verPas.classList.add("fa-eye");
        }
    }
});

function ocultarPass() {
    txtPassword.type = "password";
    verPas.classList.remove("fa-eye-slash");
    verPas.classList.add("fa-eye");
}
//Auto Close Timer sa-close
function fntRecuperar() {
    swal({
        title: 'Método de Recuperación',
        type: 'info',
        html: '<a href="<?= base_url(); ?>/forgotPass/preguntaSecreta" class="text-dark">Mediante Pregunta Secreta.</a><br>' +
            '<a href="<?= base_url(); ?>/forgotPass" class="text-dark">Mediante Correo.</a><br>',
        showCancelButton: false,
        showConfirmButton: false
    })
}