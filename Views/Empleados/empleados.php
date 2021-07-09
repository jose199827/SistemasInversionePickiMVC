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
               <form class="needs-validation" novalidate id="formEmpleado" name="formEmpleado" method="POST">
                  <h5>INFORMACION PERSONAL</h5>
                  <hr>
                  <div class="row">
                     <div class="col-md-6 col-sm-12">
                        <!-- Nombre -->
                        <div class="form-group">
                           <label for="nombreEmpleado">NOMBRE: <span class="text-red-50">*</span> </label>
                           <input class="form-control valid validText"
                              onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" id="nombreEmpleado"
                              name="nombreEmpleado" minlength="3" maxlength="50" pattern="^[A-Za-z ]*$" required>
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>
                        <!-- Num ID -->
                        <div class="form-group">
                           <label for="identidad">NUM. IDENTIDAD: <span class="text-red-50">*</span> </label>
                           <input type="text" class="form-control valid validNumber" id="identidad" name="identidad"
                              minlength="13" maxlength="15" pattern="[0-9]+" required>
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>
                        <!-- Fecha Nacimiento -->
                        <div class="form-group">
                           <label for="nacimiento">FECHA DE NACIMIENTO: <span class="text-red-50">*</span> </label>
                           <input type="date" class="form-control " id="nacimiento" name="nacimiento" required>
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>
                        <!--Correo -->
                        <div class="form-group">
                           <label for="correo">CORREO ELECTRONICO: <span class="text-red-50">*</span> </label>
                           <input type="email" class="form-control valid validEmail" id="correo" name="correo" required>
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>
                     </div>
                     <div class="col-md-6 col-sm-12">
                        <!-- Apellido -->
                        <div class="form-group">
                           <label for="apellido">APELLIDO: <span class="text-red-50">*</span> </label>
                           <input type="text" class="form-control valid validText "
                              onkeyup="javascript:this.value=this.value.toUpperCase();" id="apellido" name="apellido"
                              minlength="3" maxlength="50" pattern="^[A-Za-z ]*$" required>
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>
                        <!-- Edad -->
                        <div class="form-group">
                           <label for="edad">EDAD: <span class="text-red-50">*</span> </label>
                           <input type="number" value="" class="form-control valid validNumber" id="edad" name="edad"
                              minlength="1" maxlength="3" required pattern="[0-9]+">
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>
                        <!-- Genero -->
                        <div class="form-group">
                           <label for="genero">GENERO: <span class="text-red-50">*</span> </label>
                           <select class="form-control selectpicker" id="genero" name="genero" required>
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
                           <label for="telefono">TELEFONO: <span class="text-red-50">*</span> </label>
                           <input type="text" class="form-control valid validNumber" id="telefono" name="telefono"
                              minlength="8" maxlength="12" pattern="[0-9]+" required>
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>
                     </div>
                     <div class="col-md-12 col-sm-12">
                        <!-- Direccion -->
                        <div class="form-group">
                           <label for="direccion">DIRECCION: <span class="text-red-50">*</span> </label>
                           <textarea class="form-control valid validTextNumber"
                              onkeyup="javascript:this.value=this.value.toUpperCase();" name="direccion" id="direccion"
                              minlength="3" maxlength="250" cols="30" rows="10" style="resize:vertical; height: 140px;"
                              pattern="^[A-Za-z ]*$" required></textarea>
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>
                     </div>
                  </div>
                  <h5>DATOS LABORALES</h5>
                  <hr>
                  <div class="row">
                     <div class="col-md-6 col-sm-12">
                        <!-- Salario -->
                        <div class="form-group">
                           <label for="salario">SALARIO: <span class="text-red-50">*</span> </label>
                           <input type="text" class="form-control valid validNumber" id="salario" name="salario"
                              minlength="3" maxlength="7" pattern="[0-9]+" required>
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>
                        <!-- Tipo Empleado -->
                        <div class="form-group">
                           <label for="tipo">TIPO DE EMPLEADO: <span class="text-red-50">*</span> </label>
                           <select class="form-control selectpicker" data-live-search="true" id="tipo" name="tipo"
                              required>
                              <option selected=""></option>
                              <!--Jalar datos de db -->
                           </select>
                           <span class="msj"></span>

                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>
                        <!-- Fecha Ingreso -->
                        <div class="form-group">
                           <label for="ingreso">FECHA DE INGRESO: </label>
                           <input type="date" class="form-control " id="ingreso" name="ingreso">
                        </div>

                     </div>
                     <div class="col-md-6 col-sm-12">
                        <!-- Cargo -->
                        <div class="form-group">
                           <div class="form-group">
                              <label for="cargo">CARGO: <span class="text-red-50">*</span> </label>
                              <select class="form-control  selectpicker" data-live-search="true" id="cargo" name="cargo"
                                 required>

                              </select>
                              <span class="msj"></span>
                              <div class="valid-feedback">Valido</div>
                              <div class="invalid-feedback">Por favor, rellena el campo</div>
                           </div>
                        </div>
                        <!-- Estatus -->
                        <div class="form-group">
                           <label for="estatus">ESTATUS: <span class="text-red-50">*</span> </label>
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
                           <label for="salida">FECHA DE SALIDA: </label>
                           <input type="date" class="form-control " id="salida" name="salida">
                        </div>
                     </div>
                     <div class="col-md-12 col-sm-12">
                        <!-- Motivo de salida -->
                        <div class="form-group">
                           <label for="motivo">MOTIVO DE SALIDA: </label>
                           <textarea class="form-control valid validTextNumber"
                              onkeyup="javascript:this.value=this.value.toUpperCase();" name="motivo" id="motivo"
                              minlength="3" maxlength="250" cols="30" rows="10" style="resize:vertical; height: 140px;"
                              pattern="^[A-Za-z ]*$"></textarea>
                           <span class="msj"></span>
                           <div class="valid-feedback">Valido</div>
                           <div class="invalid-feedback">Por favor, rellena el campo</div>
                        </div>
                     </div>
                  </div>
                  <!--  <h5>REGISTRAR USUARIO</h5>
                  <hr>
                  <div class="row">
                     <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                           <input type="radio" class="op" name="opcion" value="si"> SI <br>
                           <input type="radio" class="op" name="opcion" value="no" checked> NO

                        </div>
                     </div>
                  </div> -->
                  <!-- <div class="row">
                     <div class="col-md-6 col-sm-12">

                        <div class="form-group">
                           <label for="Nombre">NOMBRE: <span class="text-red-50">*</span> </label>
                           <select class="form-control selectpicker" data-live-search="true" id="NombrePer" name="NombrePer" required disabled>

                           </select>
                        </div>

                        <div class="form-group">
                           <label for="usuario">USUARIO: <span class="text-red-50">*</span> </label>
                           <input type="text" class="form-control valid validTextNumber" id="usuario" name="usuario" disabled minlength="3" maxlength="50" required onkeyup="javascript:this.value=this.value.toUpperCase();">
                        </div>

                     </div>
                     <div class="col-md-6 col-sm-12">

                        <div class="form-group">
                           <div class="form-group">
                              <label for="Rol">ROL:<span class="text-red-50">*</span> </label>
                              <select class="form-control  selectpicker" data-live-search="true" disabled id="Rol" name="Rol" required>

                              </select>

                           </div>
                        </div>

                        <div class="form-group">
                           <label for="password">CONTRASEÑA: </label>
                           <input type="password" class="form-control valid validTextNumber" id="password" name="password" disabled minlength="5" maxlength="20" pattern="[[a-zA-Z0-9.!#$%&’+/=?^_`{|}~-]+@[a-zA-Z0-9- ]+(?:\.[a-zA-Z0-9-]+)$]+" required>

                        </div>
                     </div>
                  </div> -->
                  <div class="row">
                     <div class="col-md-12 col-md-offset-2">
                        <div class="text-right">
                           <button type="submit" class="btn btn-primary" name="GuardarEmpleado">REGISTRAR</button>

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