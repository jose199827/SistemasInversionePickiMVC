<!-- Se manda a llamar el encabezado -->
<?php headerAdmin($data);
/* dep($_SESSION['userData']); */
?>

<div class="mobile-menu-overlay"></div>

<div class="main-container">
   <div class="pd-ltr-20 xs-pd-20-10">
      <div class="min-height-200px">
         <div class="page-header">
            <div class="row">
               <div class="col-md-12 col-sm-12">
                  <div class="title">
                     <h4><?= $data['page_title']; ?></h4>
                  </div>
                  <nav aria-label="breadcrumb" role="navigation">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= Base_URL(); ?>/dashboard">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $data['page_name']; ?></li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
               <div class="pd-20 card-box height-100-p">

                  <h5 class="text-center h5 mb-0">
                     <?= $_SESSION['userData']['nom_persona']  . "  " . $_SESSION['userData']['ape_persona'] ?></h5>
                  <p class="text-center text-muted font-14"><?= $_SESSION['userData']['rol'] ?></p>
                  <div class="profile-info">
                     <h5 class="mb-20 h5 text-blue">Información de contacto</h5>
                     <ul>
                        <li>
                           <span>Correo Electronico:</span>
                           <?= $_SESSION['userData']['correo'] ?>
                        </li>
                        <li>
                           <span>Numero de Telefono:</span>
                           <?= $_SESSION['userData']['telefono'] ?>
                        </li>
                        <li>
                           <span>Direccion:</span>
                           <?= $_SESSION['userData']['direccion'] ?>
                        </li>
                        <li>
                           <span>Nombre Empresa:</span>
                        </li>

                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
               <div class="card-box height-100-p overflow-hidden">
                  <div class="profile-tab height-100-p">
                     <div class="tab height-100-p">
                        <ul class="nav nav-tabs customtab" role="tablist">
                           <li class="nav-item">
                              <a class="nav-link active" data-toggle="tab" href="#datosPersonales" role="tab">Datos
                                 Personales</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#datosFiscales" role="tab">Datos de
                                 Usuario</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#pagos" role="tab">Preguntas de Seguridad</a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <!-- Datos Personales -->
                           <div class="tab-pane fade show active" id="datosPersonales" role="tabpanel">
                              <div class="pd-20">
                                 <form id="formPerfil" name="formPerfil" class="form-horizontal">
                                    <p class="text-primary">Los campos con asterisco (<span class="text-red-50">*</span>) son obligatorios.</p>
                                    <div class="row">
                                       <div class="col-md-12 col-sm-12">
                                          <div class="form-group">
                                             <label>Identificación: <span class="text-red-50">*</span> </label>
                                             <input type="text" id="txtIdentificacion" name="txtIdentificacion" placeholder="Identificación" class="form-control " value="<?= $_SESSION['userData']['num_id_persona'] ?>" required>
                                          </div>
                                       </div>
                                       <div class="col-md-6 col-sm-12">
                                          <div class="form-group">
                                             <label>Nombres: <span class="text-red-50">*</span> </label>
                                             <input type="text" id="txtNombre" name="txtNombre" placeholder="Nombres del Usuario" class="form-control valid validText" value="<?= $_SESSION['userData']['nom_persona'] ?>" required>
                                          </div>
                                       </div>
                                       <div class="col-md-6 col-sm-12">
                                          <div class="form-group">
                                             <label>Apellidos: <span class="text-red-50">*</span> </label>
                                             <input type="text" id="txtApellido" name="txtApellido" placeholder="Apellidos del Usuario" class="form-control valid validText" value="<?= $_SESSION['userData']['ape_persona'] ?>" required>
                                          </div>
                                       </div>
                                       <div class="col-md-12 col-sm-12">
                                          <div class="form-group">
                                             <label>Email: <span class="text-red-50">*</span> </label>
                                             <input type="email" id="txtEmail" name="txtEmail" placeholder="Email del Usuario" class="form-control valid validEmail" value="<?= $_SESSION['userData']['correo'] ?>" required readonly disabled>
                                          </div>
                                       </div>
                                       <div class="col-md-6 col-sm-12">
                                          <div class="form-group">
                                             <label>Teléfono: <span class="text-red-50">*</span> </label>
                                             <input type="text" id="txtTelefono" name="txtTelefono" placeholder="Teléfono del Usuario" class="form-control valid validNumber" value="<?= $_SESSION['userData']['telefono'] ?>" required onkeypress="return controlTag(event);">
                                          </div>
                                       </div>
                                       <div class="col-md-6 col-sm-12">
                                          <div class="form-group">
                                             <label>Password:</label>
                                             <input type="password" id="txtPassword" name="txtPassword" placeholder="Password" class=" form-control">
                                          </div>
                                       </div>
                                       <div class="col-md-6 col-sm-12">
                                          <div class="form-group">
                                             <label>Confirmar Password:</label>
                                             <input type="password" id="txtPasswordConfirm" name="txtPasswordConfirm" placeholder="Confirmar Password" class=" form-control">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="text-right">
                                       <button id="btnActionForm" type="submit" class="btn btn-success"><span id="btnTex">Actualizar</span></button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                           <!-- Datos Personales -->
                           <!-- Datos Fiscales -->
                           <div class="tab-pane fade height-100-p" id="datosFiscales" role="tabpanel">
                              <div class="pd-20">
                                 jghjjgh
                              </div>
                           </div>
                           <!-- Datos Fiscales -->
                           <!-- Preguntas de Seguridad -->
                           <div class="tab-pane fade height-100-p" id="pagos" role="tabpanel">
                              <div class="pd-20">
                                 <form id="formPreguntas" name="formPreguntas" action="">
                                    <div class="row">
                                       <div class="col-md-6 col-sm-12">
                                          <div class="form-group">
                                             <input class="form-control" type="hidden" name="idPregunta" id="idPregunta">
                                             <label>Pregunta de Seguridad: <span class="text-red-50">*</span> </label>
                                             <input type="text" id="txtPregunta" name="txtPregunta" placeholder="Preunta de Seguridad" class="form-control" required>
                                          </div>
                                       </div>
                                       <div class="col-md-6 col-sm-12">
                                          <div class="form-group">
                                             <label>Respuesta: <span class="text-red-50">*</span> </label>
                                             <input type="text" id="txtRespuesta" name="txtRespuesta" placeholder="Respuesta" class="form-control" required>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="text-right">
                                       <button id="btn-cancelar" type="submit" class="btn btn-danger notblock">
                                          <span id="btnTex">Cancelar</span>
                                       </button>
                                       <button id="" type="submit" class="btn btn-primary ">
                                          <span id="btnTex">Agregar</span>
                                       </button>
                                    </div>
                                 </form>
                                 <table id="tablePreguntas" class="data-table table stripe hover nowrap">
                                    <thead>
                                       <tr>
                                          <th class="table-plus">N.º</th>
                                          <th>Pregunta</th>
                                          <th>Respuesta</th>
                                          <th class="datatable-nosort">Acciones</th>
                                       </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                 </table>
                              </div>
                           </div>
                           <!-- Preguntas de Seguridad -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="footer-wrap pd-20 mb-20 card-box">
         DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit
            Hingarajiya</a>
      </div>
   </div>
</div>
<!-- Se manda a llamar el footer  -->
<?php footerAdmin($data); ?>