<!-- Se manda a llamar el encabezado -->
<?php headerAdmin($data);

$cliente = $data['clientes'];
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
                        <li class="breadcrumb-item"><a href="<?= Base_URL(); ?>">INICIO</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $data['page_name'] ?></li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
         <!-- Simple Datatable End -->
         <div class="card-box mb-30">
            <div class="pd-20">
               <form class="needs-validation" id="formEditarCliente" name="formEditarCliente" method="POST">
                  <br>
                  <h5>INFORMACIÓN PERSONAL</h5>
                  <p></p>
                  <hr>
                  <div class="row">
                     <div class="col-md-6">
                        <input class="form-control" type="hidden" value="<?= $cliente['id_persona'] ?>" id="id_persona"
                           name="id_persona">
                        <input class="form-control" type="hidden" value="<?= $cliente['id_correo'] ?>" id="id_correo"
                           name="id_correo">
                        <input class="form-control" type="hidden" value="<?= $cliente['id_telefono'] ?>"
                           id="id_telefono" name="id_telefono">
                        <input class="form-control" type="hidden" value="<?= $cliente['id_cliente'] ?>" id="id_cliente"
                           name="id_cliente">
                        <div class="form-group">
                           <label>NÚMERO DE IDENTIDAD: <span class="text-red-50">*</span> </label>
                           <input type="Number" class="form-control valid validNumber" id="idnum" name="idnum" min="0"
                              maxlength="15" value="<?= $cliente['num_id_persona'] ?>">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>NOMBRES DE LA PERSONA: <span class="text-red-50">*</span> </label>
                           <input class="form-control valid validText" type="text"
                              onkeyup="javascript:this.value=this.value.toUpperCase();"
                              value="<?= $cliente['nom_persona'] ?>" id="nomper" name="nomper" required minlength="3"
                              maxlength="50">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>APELLIDOS DE LA PERSONA: <span class="text-red-50">*</span> </label>
                           <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" id="apeper"
                              name="apeper" min="3" maxlength="50" class="form-control valid validText"
                              value="<?= $cliente['ape_persona'] ?>">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>EDAD: <span class="text-red-50">*</span> </label>
                           <input type="number" class="form-control valid validNumber" id="edad" name="edad" min="5"
                              max="99" maxlength="2" value="<?= $cliente['eda_persona'] ?>">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Fecha de Nacimiento:</label>
                           <input type="date" class="form-control" id="fecnac" name="fecnac"
                              value="<?= $cliente['fec_na_persona'] ?>">
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>GÉNERO: <span class="text-red-50">*</span> </label>
                           <select class="form-control selectpicker
" id="gene" name="gene" value="<?= $cliente['gen_persona'] ?>">
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
                           <input type="email" class="form-control valid validEmail" id="correo" name="correo"
                              value="<?= $cliente['correo'] ?>">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>TELÉFONO: <span class="text-red-50">*</span></label>
                           <input type="text" class="form-control valid validNumber" id="telefono" name="telefono"
                              minlength="0" maxlength="12" value="<?= $cliente['telefono'] ?>">
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
                           <select class="form-control selectpicker
" id="tipo" name="tipo" value="<?= $cliente['id_tip_cliente'] ?>">
                              <option selected=""></option>
                              <option value="">Seleccione</option>
                              <option value="1">Natural</option>
                              <option value="2">Juridico</option>
                           </select>
                        </div>
                     </div>


                     <div class="col-md-6">
                        <div class="form-group">
                           <label>RTN DE EMPRESA:</label>
                           <input type="text" class="form-control" id="rtn" name="rtn" min="0" maxlength="14"
                              value="<?= $cliente['rtn_empresa'] ?>">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>NOMBRE DE LA EMPRESA:</label>
                           <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"
                              class="form-control valid ValidTextNumber" id="nomempre" name="nomempre" min="3"
                              maxlength="50" value="<?= $cliente['nom_empresa'] ?>">
                        </div>
                     </div>
                  </div>

                  <div class="row">
                     <div class="col-md-12 col-md-offset-2">
                        <div class="text-right">
                           <button type="submit" class="btn btn-success " name="GuardarEmpleado">GUARDAR</button>
                           <a href="<?= Base_URL(); ?>/Clientes/Tabla"><button type="button" class="btn btn-danger"
                                 data-dismiss="modal">CANCELAR</button></a>
                        </div>
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