 <!-- Apartado de regimen de Facturacion -->
 <div class="modal fade" id="small-modaladdbanco" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="TituloModalRF">Registrar Código CAI</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body">
                     <form class="needs-validation" novalidate  id="formRegimen" name="formRegimen" method="POST">
                     <input type="hidden" id="UFacturacion" name="UFacturacion">
                        <div class="row">
                           <div class="col-md-12 col-sm-12">
                              <!-- Nombre del banco-->
                              <div class="form-group">
                                 <label for="cai">CAI: <span class="text-red-50">*</span> </label>
                                 <input type="text" id="cai" name="cai" minlength="3" maxlength="14" class="form-control valid validNumber" required>
                                 <span class="msj"></span>
                                 <div class="valid-feedback">Valido</div>
                                 <div class="invalid-feedback">Por favor, rellena el campo</div>
                              </div>
                              <div class="form-group">
                                 <label for="cor_inicial">Correlativo Inicial: <span class="text-red-50">*</span> </label>
                                 <input type="text" id="cor_inic" name="cor_inic" minlength="3" maxlength="5" class="form-control valid validNumber" required>
                                 <span class="msj"></span>
                                 <div class="valid-feedback">Valido</div>
                                 <div class="invalid-feedback">Por favor, rellena el campo</div>
                              </div>
                              <div class="form-group">
                                 <label for="cor_final">Correlativo Final: <span class="text-red-50">*</span> </label>
                                 <input type="text" id="cor_final" name="cor_final" minlength="3" maxlength="4" class="form-control valid validNumber" required>
                                 <span class="msj"></span>
                                 <div class="valid-feedback">Valido</div>
                                 <div class="invalid-feedback">Por favor, rellena el campo</div>
                              </div>
                              <div class="form-group">
                                 <label for="fecha_limite">Fecha Límite:<span class="text-red-50">*</span></label>
                                 <input class="form-control" type="date" name="fecha_limite" id="fecha_limite" placeholder:="00/00/000" id="example-date-input" required>
                                 <span class="msj"></span>
                                 <div class="valid-feedback">Valido</div>
                                 <div class="invalid-feedback">Por favor, rellena el campo</div>
                              </div>
                           </div>
                        </div>
                        <div class="text-right">
                           <button id="btnActionForm" type="submit" class="btn btn-success"><span id="btnTexRF">Registrar</span></button>
                           <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                  </div>

                  </form>
               </div>

            </div>
         </div>