 <!--MODAL CARGO-->
 <div class="modal fade" id="modalCargo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="TituloModalCA">CARGO</h5>
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
             <form class="needs-validation" novalidate id="formCargo" name="formCargo" method="POST">
                <input type="hidden" id="UCargo" name="UCargo">
                <div class="row">
                   <div class="col-md-12 col-sm-12">
                      <div class="form-group">
                         <label for="cargo">CARGO: <span class="text-red-50">*</span> </label>
                         <input type="text" class="form-control valid validText" minlength="3" maxlength="20" id="cargo" 
                         onkeyup="javascript:this.value=this.value.toUpperCase();" name="cargo" required>
                         <span class="msj"></span>
                         <div class="valid-feedback">Valido</div>
                         <div class="invalid-feedback">Por favor, rellena el campo</div>

                      </div>
                   </div>
                </div>
                <div class="text-right">
                   <button id="btnActionForm" type="submit" class="btn btn-success"><span
                         id="btnTexCA">GUARDAR</span></button>
                   <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
                </div>
             </form>
          </div>
       </div>
    </div>
 </div>
 <!--MODAL TIPO DE EMPLEADO-->
 <div class="modal fade" id="modalTipoEm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="TituloModalEm">EMPLEADO</h5>
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
             <form class="needs-validation" novalidate id="formTipoEmpleado" name="formTipoEmpleado" method="POST">
                <input type="hidden" id="UEmpleado" name="UEmpleado">
                <div class="row">
                   <div class="col-md-12 col-sm-12">
                      <div class="form-group">
                         <label for="tipo_empleado">TIPO DE EMPLEADO: <span class="text-red-50">*</span> </label>
                         <input type="text" class="form-control valid validText" minlength="3" maxlength="20"
                            id="tipo_empleado" onkeyup="javascript:this.value=this.value.toUpperCase();" name="tipo_empleado" required>
                         <span class="msj"></span>
                         <div class="valid-feedback">Valido</div>
                         <div class="invalid-feedback">Por favor, rellena el campo</div>

                      </div>
                   </div>
                </div>
                <div class="text-right">
                   <button id="btnActionForm" type="submit" class="btn btn-success"><span
                         id="btnTexEm">GUARDAR</span></button>
                   <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
                </div>
             </form>
          </div>
       </div>
    </div>
 </div>
 <!--MODAL TIPO ROL-->
 <div class="modal fade" id="modalRol" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="TituloModalR">ROL</h5>
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
             <form class="needs-validation" novalidate id="formRol" name="formRol" method="POST">
                <input type="hidden" id="URol" name="URol">
                <div class="row">
                   <div class="col-md-12 col-sm-12">
                      <div class="form-group">
                         <label for="rol">ROL: <span class="text-red-50">*</span> </label>
                         <input type="text" class="form-control valid validText" minlength="3" maxlength="20" id="rol"
                            name="rol" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                         <span class="msj"></span>
                         <div class="valid-feedback">Valido</div>
                         <div class="invalid-feedback">Por favor, rellena el campo</div>
                      </div>
                   </div>
                </div>
                <div class="text-right">
                   <button id="btnActionForm" type="submit" class="btn btn-success"><span
                         id="btnTexR">GUARDAR</span></button>
                   <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
                </div>
             </form>
          </div>
       </div>
    </div>
 </div>