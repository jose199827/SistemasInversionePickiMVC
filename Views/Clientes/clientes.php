<!-- Se manda a llamar el encabezado -->
<?php headerAdmin($data);
/* getModal("modalRoles", $data); */
getModal("modalPrimerInicioLogin", $data);
?>
<div class="mobile-menu-overlay"></div>
<div class="main-container">
   <div class="pd-ltr-20 xs-pd-20-10">
      <div class="min-height-200px">
         <div class="page-header">
            <div class="row">
               <div class="col-md-6 col-sm-12">
                  <div class="title">
                     <h4><?= $data['page_title'] ?></h4>
                  </div>
                  <nav aria-label="breadcrumb" role="navigation">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= Base_URL(); ?>">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $data['page_name'] ?></li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
         <!-- Simple Datatable End -->
         <div class="card-box mb-30">
            <div class="pd-20">
               <form class="needs-validation" id="formCliente" name="formCliente" method="POST">
                  <br>
                  <h5>INFORMACIÓN PERSONAL</h5>
                  <p></p>
                  <hr>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>NÚMERO DE IDENTIDAD: <span class="text-red-50">*</span> </label>
                           <input type="text" class="form-control valid validNumber" id="idnum" name="idnum" min="0"
                              maxlength="15">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>NOMBRES DE LA PERSONA: <span class="text-red-50">*</span> </label>
                           <input type="text" id="nomper" name="nomper"
                              onkeyup="javascript:this.value=this.value.toUpperCase();" min="3" maxlength="50"
                              class="form-control valid validText">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>APELLIDOS DE LA PERSONA: <span class="text-red-50">*</span> </label>
                           <input type="text" id="apeper" name="apeper"
                              onkeyup="javascript:this.value=this.value.toUpperCase();" min="3" maxlength="50"
                              class="form-control valid validText">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>EDAD: <span class="text-red-50">*</span> </label>
                           <input type="number" class="form-control valid validNumber" id="edad" name="edad" min="5"
                              max="99" maxlength="2">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>FECHA DE NACIMIENTO:</label>
                           <input type="date" class="form-control" id="fecnac" name="fecnac">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>GÉNERO: <span class="text-red-50">*</span> </label>
                           <select class="custom-select form-control" id="gene" name="gene">
                              <option value="">Seleccione</option>
                              <option value="fem">Femenino</option>
                              <option value="masc">Masculino</option>
                              <option value="otr">Otro</option>
                           </select>
                        </div>
                     </div>
                  </div>


                  <h5>INFORMACIÓN DE CONTACTO</h5>
                  <p></p>
                  <hr>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>CORREO ELECTRÓNICO: <span class="text-red-50">*</span> </label>
                           <input type="email" class="form-control valid validEmail" id="correo" name="correo" ">
                      </div>
                  </div>
                  <div class=" col-md-6">
                           <div class="form-group">
                              <label>TELÉFONO: <span class="text-red-50">*</span></label>
                              <input type="text" class="form-control valid validNumber" id="telefono" name="telefono"
                                 minlength="0" maxlength="12">
                           </div>
                        </div>
                     </div>

                     <h5>INFORMACIÓN DEL CLIENTE</h5>
                     <p></p>
                     <hr>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>TIPO DE CLIENTE: <span class="text-red-50">*</span></label>
                              <select class="custom-select form-control" id="tipo" name="tipo">
                                 <option selected=""></option>
                                 <option value="">Seleccione</option>
                                 <option value="1">Natural</option>
                                 <option value="2">Juridíco</option>
                              </select>
                           </div>
                        </div>


                        <div class="col-md-6">
                           <div class="form-group">
                              <label>RTN DE EMPRESA:</label>
                              <input type="text" class="form-control" id="rtn" value="-" name="rtn" min="0"
                                 maxlength="14">
                              <span class="msj"></span>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>NOMBRE DE LA EMPRESA:</label>
                              <input type="text" class="form-control valid ValidTextNumber" id="nomempre"
                                 onkeyup="javascript:this.value=this.value.toUpperCase();" value="-" name="nomempre"
                                 min="3" maxlength="50">
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-12 col-md-offset-2">
                           <button type="submit" class="btn btn-primary float-right"
                              name="GuardarEmpleado">REGISTRAR</button>
                        </div>
                     </div>

               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Se manda a llamar el footer  -->
<?php footerAdmin($data); ?>