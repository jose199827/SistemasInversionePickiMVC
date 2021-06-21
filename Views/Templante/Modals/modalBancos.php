 <!-- Modal de Bancos -->
 <div class="modal fade" id="Bancos-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="TituloModalI">BANCOS</h5>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
               <form class="needs-validation" novalidate id="formBanco" name="formBanco" method="POST">
                  <input type="hidden" id="UBanco" name="UBanco">
                  <div class="row">
                     <div class="col-md-12 col-sm-12">
                        <!-- Nombre del producto -->
                        <div class="form-group">
                           <label for="nom_banco">BANCO: <span class="text-red-50">*</span> </label>
                           <input type="text" id="nom_banco" name="nom_banco" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control valid validText"
                              minlength="3" maxlength="25" required>
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>

                        </div>
                        <div class="form-group">
                           <label for="abr_banco">ABREVIATURA: <span class="text-red-50">*</span> </label>
                           <input type="text" id="abr_banco" name="abr_banco" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control valid validText"
                              minlength="3" maxlength="10" required>
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, valores mayores a 0</div>

                        </div>
                     </div>
                  </div>
                  <div class="text-right">
                     <button type="submit" class="btn btn-success"><span id="btnTexI">GUARDAR</span></button>
                     <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>