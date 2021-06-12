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
    var stringText = new RegExp(/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/);
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
    var stringText = new RegExp(/^[A-Z\s]+$/);
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
    var stringText = new RegExp(/^[A-Z0-9-_\s]+$/);
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
    var stringText = new RegExp(/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü0-9\s]+$/);
    if (stringText.test(txtString)) {
        return true;
    } else {
        return false;
    }
}

/* Valida que solo sea numeros ingresado */
function testEntero(intCant) {
    var intCantidad = new RegExp(/^([0-9])*$/);
    if (intCantidad.test(intCant)) {
        return true;
    } else {
        return false;
    }
}

function fntEmailValidate(email) {
    var stringEmail = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
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
}, false);