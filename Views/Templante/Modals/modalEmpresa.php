<!--MODAL DE EMPRESAS-->
<div class="modal fade" id="small-modaladdEmpresa" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="TituloModalEP">Registrar Empresa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         </div>
         <div class="modal-body">
            <form class="needs-validation" novalidate id="formEmpresa" name="formEmpresa" method="POST">
               <input type="hidden" id="UEmpresa" name="UEmpresa">
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <!-- Nombre del banco-->
                     <div class="form-group">
                        <label for="RTN">RTN Empresa: <span class="text-red-50">*</span> </label>
                        <input type="text" id="rtn_empresa" name="rtn_empresa" class="form-control valid validNumber"
                           required minlength="14" maxlength="14">
                        <span class="msj"></span>
                        <div class="valid-feedback">Valido</div>
                        <div class="invalid-feedback">Por favor, rellena el campo</div>
                     </div>
                     <div class="form-group">
                        <label for="empresa">Empresa: <span class="text-red-50">*</span> </label>
                        <input type="text" id="nom_empresa" name="nom_empresa" class="form-control" required>
                        <span class="msj"></span>
                        <div class="valid-feedback">Valido</div>
                        <div class="invalid-feedback">Por favor, rellena el campo</div>
                     </div>
                  </div>

               </div>
               <div class="text-right">
                  <button id="btnActionForm" type="submit" class="btn btn-success"><span
                        id="btnTexEP">Registrar</span></button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
               </div>
            </form>
         </div>

      </div>
   </div>
</div>