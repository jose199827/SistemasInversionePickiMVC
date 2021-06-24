<!-- Se manda a llamar el encabezado -->
<?php headerAdmin($data);
$empleado = $data['empleados'];

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
         <?php /*  dep($empleado);
         dep($data['cargos']); 
         dep($data['tipos_empleado']) */;
         ?>
         <div class="card-box mb-30">
            <div class="pd-20">
               <form class="needs-validation" id="formEditarEmpleado" name="formEditarEmpleado" method="POST">
                  <h5>Información Personal</h5>
                  <hr>
                  <div class="row">
                     <div class="col-md-6 col-sm-12">
                        <input class="form-control " type="hidden" value="<?= $empleado['id_persona'] ?>" id="id_empleado" name="id_empleado">
                        <input class="form-control " type="hidden" value="<?= $empleado['id_correo'] ?>" id="id_correo" name="id_correo">
                        <input class="form-control " type="hidden" value="<?= $empleado['id_telefono'] ?>" id="id_telefono" name="id_telefono">
                        <input class="form-control " type="hidden" value="<?= $empleado['id_direccion'] ?>" id="id_direccion" name="id_direccion">
                        <input class="form-control " type="hidden" value="<?= $empleado['id_empleado'] ?>" id="id_emple" name="id_emple">
                        <!-- Nombre -->
                        <div class="form-group">
                           <label for="nombreEmpleado">Nombre: <span class="danger">*</span></label>
                           <input class="form-control valid validText" type="text" value="<?= $empleado['nom_persona'] ?>" id="nombreEmpleado" name="nombreEmpleado" required minlength="3" maxlength="50" pattern="^[A-Za-z ]*$">
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>
                        <!-- Num ID -->
                        <div class="form-group">
                           <label for="identidad">Num. Identidad:</label>
                           <input type="text" class="form-control valid validNumber" id="identidad" value="<?= $empleado['num_id_persona'] ?>" name="identidad" required minlength="13" maxlength="15" pattern="[0-9]+">
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>
                        <!-- Fecha Nacimiento -->
                        <div class="form-group">
                           <label for="nacimiento">Fecha de Nacimiento:</label>
                           <input type="date" class="form-control " value="<?= $empleado['fec_na_persona'] ?>" id="nacimiento" name="nacimiento" required>
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>
                        <!--Correo -->
                        <div class="form-group">
                           <label for="correo">Correo Electrónico: </label>
                           <input type="email" class="form-control valid validEmail" value="<?= $empleado['correo'] ?>" id="correo" name="correo" required>
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>
                     </div>
                     <div class="col-md-6 col-sm-12">
                        <!-- Apellido -->
                        <div class="form-group">
                           <label for="apellido">Apellido:</label>
                           <input type="text" class="form-control valid validText" value="<?= $empleado['ape_persona'] ?>" id="apellido" name="apellido" required minlength="3" maxlength="50" pattern="^[A-Za-z ]*$">
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>
                        <!-- Edad -->
                        <div class="form-group">
                           <label for="edad">Edad:</label>
                           <input type="number" class="form-control valid validNumber" value="<?= $empleado['eda_persona'] ?>" id="edad" name="edad" required minlength="1" maxlength="3" pattern="[0-9]+">
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>
                        <!-- Genero -->
                        <div class="form-group">
                           <label for="genero">Género:</label>
                           <select class="form-control selectpicker" value="<?= $empleado['gen_persona'] ?>" id="genero" name="genero" required>
                              <option value="Femenino">Femenino</option>
                              <option value="Masculino">Masculino</option>
                              <option value="Otro">Otro</option>
                           </select>
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>
                        <!-- Telefono -->
                        <div class="form-group">
                           <label for="telefono">Teléfono: </label>
                           <input type="text" class="form-control valid validNumber" value="<?= $empleado['telefono'] ?>" id="telefono" name="telefono" required minlength="8" maxlength="12" pattern="[0-9]+">
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>
                     </div>
                     <div class="col-md-12 col-sm-12">
                        <!-- Direccion -->
                        <div class="form-group">
                           <label for="direccion">Dirección:</label>
                           <textarea class="form-control valid validTextNumber" name="direccion" id="direccion" cols="30" rows="10" style="resize:vertical; height: 140px;" required minlength="3" maxlength="250" pattern="^[A-Za-z ]*$"><?= $empleado['direccion'] ?></textarea>
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>
                     </div>
                  </div>
                  <h5>Información de Empleado</h5>
                  <hr>
                  <div class="row">
                     <div class="col-md-6 col-sm-12">
                        <!-- Salario -->
                        <div class="form-group">
                           <label for="salario">Salario: </label>
                           <input type="text" class="form-control valid validNumber" value="<?= $empleado['sal_empleado'] ?>" id="salario" name="salario" required minlength="3" maxlength="7" pattern="[0-9]+">
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>

                        <!-- Tipo Empleado -->
                        <div class="form-group">
                           <label for="tipou">Tipo de Empleado:</label>
                           <select class="form-control selectpicker" data-live-search="true" id="tipou" name="tipou" required>
                              <!--Jalar datos de db -->
                              <?php
                              for ($i = 0; $i < count($data['tipos_empleado']); $i++) {
                                 $select = "";
                                 if ($data['tipos_empleado'][$i]['id_tip_empleado'] == $empleado['id_tip_empleado']) {
                                    $select = "selected";
                                 }
                              ?>
                                 <option value="<?= $data['tipos_empleado'][$i]['id_tip_empleado']; ?>" <?= $select ?>>
                                    <?= $data['tipos_empleado'][$i]['tipo_empleado']; ?></option>
                              <?php
                              }
                              ?>
                           </select>
                        </div>
                        <!-- Fecha Ingreso -->
                        <div class="form-group">
                           <label for="ingreso">Fecha de Ingreso: </label>
                           <input type="date" class="form-control " value="<?= $empleado['fec_ingreso'] ?>" id="ingreso" name="ingreso">
                        </div>
                     </div>
                     <div class="col-md-6 col-sm-12">
                        <!-- Cargo -->
                        <div class="form-group">
                           <div class="form-group">
                              <label for="cargou">Cargo:</label>
                              <select class="form-control  selectpicker" data-live-search="true" id="cargou" name="cargou" required>
                                 <?php
                                 for ($i = 0; $i < count($data['cargos']); $i++) {
                                    $select = "";
                                    if ($data['cargos'][$i]['id_cargo'] == $empleado['id_cargo']) {
                                       $select = "selected";
                                    }
                                 ?>
                                    <option value="<?= $data['cargos'][$i]['id_cargo']; ?>" <?= $select ?>>
                                       <?= $data['cargos'][$i]['cargo']; ?></option>
                                 <?php
                                 }
                                 ?>
                              </select>
                              <span class="msj"></span>
                              <div class="valid-feedback">Valido</div>
                              <div class="invalid-feedback">Por favor, rellena el campo</div>
                           </div>
                        </div>
                        <!-- Estatus -->
                        <div class="form-group">
                           <label for="estatus">Estatus:</label>
                           <select class="form-control  selectpicker" id="estatus" name="estatus" required>
                              <option value="1">Activo</option>
                              <option value="2">Inactivo</option>
                           </select>
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>
                        <!-- Fecha Salida -->
                        <div class="form-group">
                           <label for="salida">Fecha de Salida: </label>
                           <input type="date" class="form-control " value="<?= $empleado['fec_salida'] ?>" id="salida" name="salida">
                        </div>
                     </div>
                     <div class="col-md-12 col-sm-12">
                        <!-- Motivo de salida -->
                        <div class="form-group">
                           <label for="motivo">Motivo de salida: </label>
                           <textarea class="form-control valid validTextNumber" onkeyup="javascript:this.value=this.value.toUpperCase();"  name="motivo" id="motivo" minlength="3" maxlength="250" cols="30" rows="10" style="resize:vertical; height: 140px;" pattern="^[A-Za-z ]*$" required><?= $empleado['motivoSalida'] ?></textarea>
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12 col-md-offset-2">
                        <div class="text-right">
                           <button type="submit" class="btn btn-success " name="GuardarEmpleado">GUARDAR</button>
                           <a href="<?= Base_URL(); ?>/Empleados/Tabla"><button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button></a>
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