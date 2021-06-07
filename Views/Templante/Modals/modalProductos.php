   <!-- Modal de Marca -->
   <div class="modal fade" id="marca-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="TituloModal">Registrar Marca</h5>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
               <form class="needs-validation" novalidate id="formMarca" name="formMarca" method="POST">
                  <input type="hidden" id="UMarca" name="UMarca">
                  <div class="row">
                     <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                           <label for="marca">Marca: <span class="text-red-50">*</span> </label>
                           <input type="text" id="marca" name="marca" minlength="1" maxlength="20" class="form-control valid validTextNumber " required>
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>
                     </div>
                  </div>
                  <div class="text-right">
                     <button type="submit" class="btn btn-success"><span id="btnTex">Registrar</span></button>
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

   <!-- Modal de Categoria -->
   <div class="modal fade" id="categoria-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="TituloModalC">Registrar Categoria</h5>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
               <form class="needs-validation" novalidate id="formCategoria" name="formCategoria" method="POST">
                  <input type="hidden" id="UCategoria" name="UCategoria">
                  <div class="row">
                     <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                           <label for="categoria">Categorias: <span class="text-red-50">*</span> </label>
                           <input type="text" id="categoria" name="categoria" minlength="3" maxlength="20" class="form-control valid validText " required>
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>
                     </div>
                  </div>
                  <div class="text-right">
                     <button type="submit" class="btn btn-success"><span id="btnTexC">Registrar</span></button>
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- Modal de Grupo -->
   <div class="modal fade" id="grupo-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="TituloModalG">Registrar Grupo</h5>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
               <form class="needs-validation" novalidate id="formGrupo" name="formGrupo" method="POST">
                  <input type="hidden" id="UGrupo" name="UGrupo">
                  <div class="row">
                     <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                           <label for="grupo">Grupo: <span class="text-red-50">*</span> </label>
                           <input type="text" class="form-control valid validText" id="grupo" name="grupo" minlength="3" maxlength="20" required>
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>

                        </div>
                     </div>
                  </div>
                  <div class="text-right">
                     <button type="submit" class="btn btn-success"><span id="btnTexG">Registrar</span></button>
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- Modal de Unidad Medida -->
   <div class="modal fade" id="unidadMedida-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="TituloModalU">Registrar Unidad de Medida</h5>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
               <form class="needs-validation" novalidate id="formMedida" name="formMedida" method="POST">
                  <input type="hidden" id="UUnidades" name="UUnidades">
                  <div class="row">
                     <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                           <label for="uni_medida">Unidad: <span class="text-red-50">*</span> </label>
                           <input type="text" class="form-control valid validTextNumber" id="uni_medida" name="uni_medida" minlength="5" maxlength="8" required>
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>
                     </div>
                  </div>
                  <div class="text-right">
                     <button type="submit" class="btn btn-success"><span id="btnTexU">Registrar</span></button>
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- Modal de Impuestos -->
   <div class="modal fade" id="impuesto-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="TituloModalI">Registrar Impuestos</h5>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
               <form class="needs-validation" novalidate id="formImpuesto" name="formImpuesto" method="POST">
                  <input type="hidden" id="UImpuesto" name="UImpuesto">
                  <div class="row">
                     <div class="col-md-12 col-sm-12">
                        <!-- Nombre del producto -->
                        <div class="form-group">
                           <label for="nom_isv">Nombre de Impuesto: <span class="text-red-50">*</span> </label>
                           <input type="text" id="nom_isv" name="nom_isv" class="form-control valid validText" minlength="3" maxlength="10" required>
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>

                        </div>
                        <div class="form-group">
                           <label for="porcentaje">Porcentaje Impuesto: <span class="text-red-50">*</span> </label>
                           <input type="number" id="porcentaje" name="porcentaje" class="form-control valid validNumber"  min="0" max="100"
                              required>
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, valores mayores a 0</div>

                        </div>
                     </div>
                  </div>
                  <div class="text-right">
                     <button type="submit" class="btn btn-success"><span id="btnTexI">Registrar</span></button>
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!--MODAL CARGO-->
   <div class="modal fade" id="modalCargo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="TituloModalCA">Registrar cargo</h5>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
               <form class="needs-validation" novalidate id="formCargo" name="formCargo" method="POST">
                  <input type="hidden" id="UCargo" name="UCargo">
                  <div class="row">
                     <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                           <label for="cargo">Cargo: <span class="text-red-50">*</span> </label>
                           <input type="text" class="form-control valid validText" id="cargo" name="cargo" minlength="3" maxlength="20" required>
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>

                        </div>
                     </div>
                  </div>
                  <div class="text-right">
                     <button type="submit" class="btn btn-success"><span id="btnTexCA">Registrar</span></button>
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>