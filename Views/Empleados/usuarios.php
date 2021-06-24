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
                    <form class="needs-validation" novalidate id="formUsuario" name="formUsuario" method="POST">
                        <h5>Registrar Usuario</h5>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <!-- Nombre Persona -->
                                <div class="form-group">
                                    <label for="tipo">Nombre: <span class="text-red-50">*</span> </label>
                                    <select class="form-control selectpicker" data-live-search="true" id="NombrePer" name="NombrePer" required>
                                        <option selected=""></option>
                                        <!--Jalar datos de db -->
                                    </select>
                                </div>
                                <!-- Usuario -->
                                <div class="form-group">
                                    <label for="usuario">Usuario: <span class="text-red-50">*</span> </label>
                                    <input type="text" class="form-control valid validTextNumber" id="usuario" name="usuario" minlength="3" maxlength="50" required onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>

                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!--Rol -->
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="Rol">Rol:<span class="text-red-50">*</span> </label>
                                        <select class="form-control  selectpicker" data-live-search="true" id="Rol" name="Rol" required>

                                        </select>

                                    </div>
                                </div>
                                <!-- Contraseña -->
                                <div class="form-group">
                                    <label for="password">Password: </label>
                                    <input type="password" class="form-control valid validTextNumber" id="password" name="password" minlength="5" maxlength="20" pattern="[[a-zA-Z0-9.!#$%&’+/=?^_`{|}~-]+@[a-zA-Z0-9- ]+(?:\.[a-zA-Z0-9-]+)$]+" required>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12 col-md-offset-2">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary float-right" name="GuardarEmpleado">REGISTRAR</button>
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