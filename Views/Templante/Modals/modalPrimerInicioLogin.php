<div class="modal fade" id="login-modal" data-backdrop="static" tabindex="-1" role="dialog"
   aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="login-box bg-white box-shadow border-radius-10">
            <div class="login-title">
               <h2 class="text-center text-primary">Primer Inicio de Sesión</h2>
               <h4 class="text-center text-primary">Cambio de Contraseña</h4>
            </div>
            <form id="formCambiarPassInicio" name="formCambiarPassInicio" action="">
               <input type="hidden" name="idUsuario" id="idUsuario" value="<?= $_SESSION['userData']['id_persona'] ?>">
               <div class="input-group custom">
                  <input type="password" class="form-control form-control-lg" placeholder="Nueva Password"
                     onkeypress="return controlTagEspacio(event);" id="txtPassword" name="txtPassword" minlength="5"
                     maxlength="20" required>
                  <div class="input-group-append custom">
                     <span class="input-group-text"><i id="verPass" class="fa fa-eye"></i></i></span>
                  </div>
               </div>
               <div class="input-group custom">
                  <input type="password" class="form-control form-control-lg" placeholder="Confirmar Nueva Password"
                     onkeypress="return controlTagEspacio(event);" id="txtPasswordConfirm" name="txtPasswordConfirm"
                     minlength="5" maxlength="20" required>
                  <div class="input-group-append custom">
                     <span class="input-group-text"></i></span>
                  </div>
               </div>
               <div class="row align-items-center">
                  <div class="col-5">
                     <div class="input-group mb-0">
                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Enviar">
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<script>
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
</script>