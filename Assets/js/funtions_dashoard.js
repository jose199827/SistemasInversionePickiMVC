var divLoading = document.querySelector('#divLoading');
window.addEventListener('load', function() {
    fntMensajePrimerIngreso();
}, false);

function fntMensajePrimerIngreso() {
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Home/getMsg/';
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                swal({
                    title: 'Sistema',
                    html: 'email',
                    showCancelButton: true,
                    confirmButtonText: 'Submit',
                    showLoaderOnConfirm: true,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    preConfirm: function(email) {
                        return new Promise(function(resolve, reject) {
                            setTimeout(function() {
                                if (email === 'taken@example.com') {
                                    reject('This email is already taken.')
                                } else {
                                    resolve()
                                }
                            }, 2000)
                        })
                    },
                    allowOutsideClick: false
                }).then(function(email) {
                    swal({
                        type: 'success',
                        title: 'Ajax request finished!',
                        html: 'Submitted email: ' + email
                    })
                })

            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}