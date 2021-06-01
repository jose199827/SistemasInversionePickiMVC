<!-- Se manda a llamar el encabezado -->
<?php headerAdmin($data);
/* getModal("modalRoles", $data); */
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

          <form class="needs-validation" novalidate  id="formEmpleado" name="formEmpleado" method="POST">
            
            <h5>Información Personal</h5>
            <hr>
            <div class="row">

              <div class="col-md-6 col-sm-12">

                <!-- Nombre -->
                <div class="form-group">
                  <label for="nombreEmpleado">Nombre: <span class="danger">*</span></label>
                  <input class="form-control " type="text" id="nombreEmpleado" name="nombreEmpleado" required required pattern="^[A-Za-z ]*$">
                  <span class="msj"></span>
                  <div class="valid-feedback">Valido</div>
                  <div class="invalid-feedback">Por favor, rellena el campo</div>
                </div>

                <!-- Num ID -->
                <div class="form-group">
                  <label for="identidad">Num. Identidad:</label>
                  <input type="text" class="form-control " id="identidad" name="identidad" required required pattern="[0-9]+">
                  <span class="msj"></span>
                  <div class="valid-feedback">Valido</div>
                  <div class="invalid-feedback">Por favor, rellena el campo</div>
                </div>

                <!-- Fecha Nacimiento -->
                <div class="form-group">
                  <label for="nacimiento">Fecha de Nacimiento:</label>
                  <input type="date" class="form-control " id="nacimiento" name="nacimiento" required>
                  <span class="msj"></span>
                  <div class="valid-feedback">Valido</div>
                  <div class="invalid-feedback">Por favor, rellena el campo</div>
                </div>

                <!--Correo -->
                <div class="form-group">
                  <label for="correo">Correo Electrónico: </label>
                  <input type="email" class="form-control " id="correo" name="correo" required>
                  <span class="msj"></span>
                  <div class="valid-feedback">Valido</div>
                  <div class="invalid-feedback">Por favor, rellena el campo</div>
                </div>



              </div>

              <div class="col-md-6 col-sm-12">

                <!-- Apellido -->
                <div class="form-group">
                  <label for="apellido">Apellido:</label>
                  <input type="text" class="form-control " id="apellido" name="apellido" required required pattern="^[A-Za-z ]*$">
                  <span class="msj"></span>
                  <div class="valid-feedback">Valido</div>
                  <div class="invalid-feedback">Por favor, rellena el campo</div>
                </div>
                <!-- Edad -->
                <div class="form-group">
                  <label for="edad">Edad:</label>
                  <input type="number" value="" class="form-control " id="edad" name="edad" required required pattern="[0-9]+">
                  <span class="msj"></span>
                  <div class="valid-feedback">Valido</div>
                  <div class="invalid-feedback">Por favor, rellena el campo</div>
                </div>

                <!-- Genero -->
                <div class="form-group">
                  <label for="genero">Género:</label>
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
                  <label for="telefono">Teléfono: </label>
                  <input type="text" class="form-control " id="telefono" name="telefono" required required pattern="[0-9]+">
                  <span class="msj"></span>
                  <div class="valid-feedback">Valido</div>
                  <div class="invalid-feedback">Por favor, rellena el campo</div>
                </div>

              </div>
              <div class="col-md-12 col-sm-12">
                <!-- Direccion -->
                <div class="form-group">
                  <label for="direccion">Dirección:</label>
                  <textarea class="form-control" name="direccion" id="direccion" cols="30" rows="10" style="resize:vertical; height: 140px;" required required pattern="^[A-Za-z ]*$"></textarea>
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
                  <input type="text" class="form-control " id="salario" name="salario" required required pattern="[0-9]+">
                  <span class="msj"></span>
                  <div class="valid-feedback">Valido</div>
                  <div class="invalid-feedback">Por favor, rellena el campo</div>
                </div>

                <!-- Fecha Ingreso -->
                <div class="form-group">
                  <label for="ingreso">Fecha de Ingreso: </label>
                  <input type="date" class="form-control " id="ingreso" name="ingreso">
                </div>

                <!-- Tipo Empleado -->
                <div class="form-group">
                  <label for="tipo">Tipo de Empleado:</label>
                  <select class="form-control selectpicker" data-live-search="true" id="tipo" name="tipo" required>
                    <option selected=""></option>
                    <!--Jalar datos de db -->

                  </select>
                  <span class="msj"></span>
                  <div class="valid-feedback">Valido</div>
                  <div class="invalid-feedback">Por favor, rellena el campo</div>
                </div>

              </div>
              <div class="col-md-6 col-sm-12">
                <!-- Cargo -->
                <div class="form-group">
                  <div class="form-group">
                    <label for="cargo">Cargo:</label>
                    <select class="form-control  selectpicker" data-live-search="true" id="cargo" name="cargo" required>


                    </select>
                    <span class="msj"></span>
                    <div class="valid-feedback">Valido</div>
                    <div class="invalid-feedback">Por favor, rellena el campo</div>
                  </div>
                </div>
                <!-- Fecha Salida -->
                <div class="form-group">
                  <label for="salida">Fecha de Salida: </label>
                  <input type="date" class="form-control " id="salida" name="salida">
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
              </div>
            </div>


            <h5>Información de Usuario</h5>
            <hr>
            <div class="row">
              <div class="col-md-6 col-sm-12">


                <!-- Usuario -->
                <div class="form-group">
                  <label for="usuario">Nombre de Usuario: </label>
                  <input type="text" class="form-control " id="usuario" name="usuario" required pattern="[[a-zA-Z0-9.!#$%&’+/=?^_`{|}~-]+@[a-zA-Z0-9- ]+(?:\.[a-zA-Z0-9-]+)$]+">
                  <span class="msj"></span>
                  <div class="valid-feedback">Valido</div>
                  <div class="invalid-feedback">Por favor, rellena el campo</div>
                </div>

              <!-- Pregunta 1 -->
              <!--   <div class="form-group">
                  <label for="pregunta1">Pregunta de Seguridad :</label>
                  <select class="form-control selectpicker" data-live-search="true" id="pregunta1" name="pregunta1" required>


                  </select>
                  <span class="msj"></span>
                  <div class="valid-feedback">Valido</div>
                  <div class="invalid-feedback">Por favor, rellena el campo</div>
                </div> -->


                <!-- Rol -->
                <div class="form-group">
                  <label for="rol">Rol de Usuario:</label>
                  <select class="form-control selectpicker" data-live-search="true" id="rol" name="rol" required>

                  </select>
                  <span class="msj"></span>
                  <div class="valid-feedback">Valido</div>
                  <div class="invalid-feedback">Por favor, rellena el campo</div>
                </div>
              </div>

              <div class="col-md-6 col-sm-12">
                <!-- Contraseña -->
                <div class="form-group">
                  <label for="password">Password: </label>
                  <input type="text" class="form-control " id="password" name="password" required pattern="[[a-zA-Z0-9.!#$%&’+/=?^_`{|}~-]+@[a-zA-Z0-9- ]+(?:\.[a-zA-Z0-9-]+)$]+">
                  <span class="msj"></span>
                  <div class="valid-feedback">Valido</div>
                  <div class="invalid-feedback">Por favor, rellena el campo</div>
                </div>
                <!-- Respuesta -->
              <!--   <div class="form-group">
                  <label for="Respuesta1">Respuesta : </label>
                  <input type="text" class="form-control " id="Respuesta1" name="Respuesta1" required>
                  <span class="msj"></span>
                  <div class="valid-feedback">Valido</div>
                  <div class="invalid-feedback">Por favor, rellena el campo</div>
                </div> -->

              </div>

            </div>

            <div class="row">
             <div class="col-md-12 col-md-offset-2">
              <button type="submit" class="btn btn-primary float-right" name="GuardarEmpleado">Registrar</button>
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