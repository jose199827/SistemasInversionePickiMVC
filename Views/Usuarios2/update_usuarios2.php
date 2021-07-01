<!-- Se manda a llamar el encabezado -->
<?php headerAdmin($data);
$usuarios = $data['usuarios'];

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
                    <form class="needs-validation" novalidate id="formEditarUsuario" name="formEditarUsuario" method="POST">
                        <h5>Registrar Usuarios</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <input class="form-control " type="hidden" value="<?= $usuarios['id_usuario'] ?>" id="id_usuario" name="id_usuario">
                                <!-- Nombre Persona -->
                                <div class="form-group">
                                    <label for="Nombre">NOMBRE: </label>
                                    <input type="text" class="form-control valid validTextNumber" disabled id="Nombre" value="<?= $usuarios['nom_persona'] ." ". $usuarios['ape_persona'] ?>" name="Nombre" minlength="3" maxlength="50" required onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                                <!-- Usuario -->
                                <div class="form-group">
                                    <label for="usuario">USUARIO: </label>
                                    <input type="text" class="form-control valid validTextNumber" value="<?= $usuarios['nom_usuario'] ?>" id="usuario" name="usuario" minlength="3" maxlength="50" required onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>

                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!--Rol -->
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="Rolu">ROL:</span> </label>
                                        <select class="form-control  selectpicker" data-live-search="true" id="Rolu" name="Rolu" required>
                                            <?php
                                            for ($i = 0; $i < count($data['roles']); $i++) {
                                                $select = "";
                                                if ($data['roles'][$i]['id_rol'] == $usuarios['id_rol']) {
                                                    $select = "selected";
                                                }
                                            ?>
                                                <option value="<?= $data['roles'][$i]['id_rol']; ?>" <?= $select ?>>
                                                    <?= $data['roles'][$i]['rol']; ?></option>
                                            <?php
                                            }
                                            ?>


                                        </select>

                                    </div>
                                </div>
                                <!-- Contraseña -->
                                <!--  <div class="form-group">
                                    <label for="password">CONTRASEÑA: </label>
                                    <input type="password" class="form-control valid validTextNumber" id="password" name="password" minlength="5" maxlength="20" pattern="[[a-zA-Z0-9.!#$%&’+/=?^_`{|}~-]+@[a-zA-Z0-9- ]+(?:\.[a-zA-Z0-9-]+)$]+" required>

                                </div> -->
                                <!--Rol -->
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="Estado">ESTADO:</span> </label>
                                        <select class="form-control  selectpicker" data-live-search="true" id="Estado" name="Estado" required>
                                            <option value="Activo">Activo</option>
                                            <option value="Inactivo">Inactivo</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-md-offset-2">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success " name="GuardarUsuario">GUARDAR</button>
                                    <a href="<?= Base_URL(); ?>/Usuarios2/Tabla"><button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button></a>
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