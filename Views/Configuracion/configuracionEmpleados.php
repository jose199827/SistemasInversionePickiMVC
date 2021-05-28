<!-- Se manda a llamar el encabezado -->
<?php headerAdmin($data);
getModal("modalUsuarios", $data);
?>

<div class="main-container">
   <div class="pd-ltr-20 xs-pd-20-10">
      <div class="min-height-200px">
         <div class="page-header">
            <div class="row">
               <div class="col-6">
                  <div class="title">
                     <h4>Configuración de Usuario</h4>
                  </div>
                  <nav aria-label="breadcrumb" role="navigation">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                     </ol>
                  </nav>
               </div>
               <div class="col-6 text-right">
                  <div class="dropdown">
                     <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        Registrar
                     </a>
                     <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalCargo">Tipos de Cargos</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalTipoEm">Tipos de Empleados</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalRol">Tipos de Roles</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Inicio del Contenido -->
         <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <!-- TABLA CARGOS -->
            <div class="row">
               <div class="col-md-12 col-sm-12">
                  <div class="card-box mb-30">
                     <div class="pd-20">
                        <div class="row">
                           <div class="col-6">
                              <h4 class="text-blue h4">Tipos de Cargos</h4>
                           </div>
                           <div class="col-6 text-right">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCargo">Registrar</button>
                           </div>
                        </div>
                     </div>
                     <div class="pb-20">
                        <table class="data-table table stripe hover nowrap">
                           <thead>
                              <tr>
                                 <th class="table-plus">N.º</th>
                                 <th>Tipo de Cargo</th>
                                 <th class="datatable-nosort">Acciones</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td class="table-plus"></td>
                                 <td></td>
                                 <td>
                                    <div class="dropdown">
                                       <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                          <i class="dw dw-more"></i>
                                       </a>
                                       <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                          <a class="dropdown-item editar_cargo" id=""><i class="dw dw-edit2"></i> Editar</a>
                                          <a class="dropdown-item" href="bd/delete_cargo.php?id_cargo="><i class="dw dw-delete-3"></i>Eliminar</a>
                                       </div>
                                    </div>
                                 </td>
                              </tr>

                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <!--TIPOS EMPLEADOS-->
               <div class="col-md-12 col-sm-12">
                  <div class="card-box mb-30">
                     <div class="pd-20">
                        <div class="row">
                           <div class="col-6">
                              <h4 class="text-blue h4">Tipos de Empleados</h4>
                           </div>
                           <div class="col-6 text-right">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTipoEm">Registrar</button>
                           </div>
                        </div>
                     </div>
                     <div class="pb-20">
                        <table class="data-table table stripe hover nowrap">
                           <thead>
                              <tr>
                                 <th class="table-plus">N.º</th>
                                 <th>Tipo de Empleado</th>
                                 <th class="datatable-nosort">Acciones</th>
                              </tr>
                           </thead>
                           <tbody>

                              <tr>
                                 <td class="table-plus"></td>
                                 <td>

                                 </td>
                                 <td>
                                    <div class="dropdown">
                                       <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                          <i class="dw dw-more"></i>
                                       </a>
                                       <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                          <a class="dropdown-item editar_tip_empleado" id=""><i class="dw dw-edit2"></i> Editar</a>
                                          <a class="dropdown-item" href="bd/delete_tip_empleados.php?id_tip_empleado="><i class="dw dw-delete-3"></i>Eliminar</a>
                                       </div>
                                    </div>
                                 </td>
                              </tr>

                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <!--TIPOS ROLES-->
            <div class="row">
               <div class="col-md-12 col-sm-12">
                  <div class="card-box mb-30">
                     <div class="pd-20">
                        <div class="row">
                           <div class="col-6">
                              <h4 class="text-blue h4">Tipos de Roles</h4>
                           </div>
                           <div class="col-6 text-right">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRol">Registrar</button>
                           </div>
                        </div>
                     </div>
                     <div class="pb-20">
                        <table class="data-table table stripe hover nowrap">
                           <thead>
                              <tr>
                                 <th class="table-plus">N.º</th>
                                 <th>Tipo de Rol</th>
                                 <th class="datatable-nosort">Acciones</th>
                              </tr>
                           </thead>
                           <tbody>

                              <tr>
                                 <td class="table-plus"></td>
                                 <td>

                                 </td>
                                 <td>
                                    <div class="dropdown">
                                       <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                          <i class="dw dw-more"></i>
                                       </a>
                                       <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                          <a class="dropdown-item editar_rol" id=""><i class="dw dw-edit2"></i> Editar</a>
                                          <a class="dropdown-item" href="bd/delete_rol.php?id_rol="><i class="dw dw-delete-3"></i>Eliminar</a>
                                       </div>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--MODAL CARGO-->
         <div class="modal fade" id="modalCargo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="myLargeModalLabel">Registrar cargo</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body">
                     <form class="needs-validation" novalidate action="bd/insert_cargo.php" id="formCargo" name="formCargo" method="POST">
                        <div class="row">
                           <div class="col-md-12 col-sm-12">
                              <div class="form-group">
                                 <label for="cargo">Cargo: <span class="text-red-50">*</span> </label>
                                 <input type="text" class="form-control" id="cargo" name="cargo" required>
                                 <span class="msj"></span>
                                 <div class="valid-feedback">Valido</div>
                                 <div class="invalid-feedback">Por favor, rellena el campo</div>

                              </div>
                           </div>
                        </div>
                        <div class="text-right">
                           <button id="btnActionForm" type="submit" class="btn btn-success"><span id="btnTex">Registrar</span></button>
                           <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!--MODAL EDITAR CARGO-->
         <div class="modal fade" id="modalCargoEditar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="myLargeModalLabel">Editar cargo</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body ActualizarCargo">

                  </div>
               </div>
            </div>
         </div>
         <!--MODAL TIPO DE EMPLEADO-->
         <div class="modal fade" id="modalTipoEm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="myLargeModalLabel">Registrar Empleado</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body">
                     <form class="needs-validation" novalidate action="bd/insert_tipo_empleado.php" id="formTipoEmpleado" name="formTipoEmpleado" method="POST">
                        <div class="row">
                           <div class="col-md-12 col-sm-12">
                              <div class="form-group">
                                 <label for="tipo_empleado">Tipo de Empleado: <span class="text-red-50">*</span> </label>
                                 <input type="text" class="form-control" id="tipo_empleado" name="tipo_empleado" required>
                                 <span class="msj"></span>
                                 <div class="valid-feedback">Valido</div>
                                 <div class="invalid-feedback">Por favor, rellena el campo</div>

                              </div>
                           </div>
                        </div>
                        <div class="text-right">
                           <button id="btnActionForm" type="submit" class="btn btn-success"><span id="btnTex">Registrar</span></button>
                           <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!--MODAL EDITAR TIPO DE EMPLEADO-->
         <div class="modal fade" id="modalTipoEmEditar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="myLargeModalLabel">Editar Empleado</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body ActualizarTipoEmpleado">

                  </div>
               </div>
            </div>
         </div>
         <!--MODAL TIPO ROL-->
         <div class="modal fade" id="modalRol" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="myLargeModalLabel">Registrar Rol</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body">
                     <form class="needs-validation" novalidate id="Agregargrupo" action="bd/insert_rol.php" id="formRol" name="formRol" method="POST">
                        <div class="row">
                           <div class="col-md-12 col-sm-12">
                              <div class="form-group">
                                 <label for="rol">Rol: <span class="text-red-50">*</span> </label>
                                 <input type="text" class="form-control" id="rol" name="rol" required>
                                 <span class="msj"></span>
                                 <div class="valid-feedback">Valido</div>
                                 <div class="invalid-feedback">Por favor, rellena el campo</div>
                              </div>
                           </div>
                        </div>
                        <div class="text-right">
                           <button id="btnActionForm" type="submit" class="btn btn-success"><span id="btnTex">Registrar</span></button>
                           <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!--MODAL EDITAR TIPO ROL-->
         <div class="modal fade" id="modalRolEditar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="myLargeModalLabel">Editar Rol</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body ActualizarRol">

                  </div>
               </div>
            </div>
         </div>
         <?php footer($data); ?>
      </div>
   </div>
</div>

<!-- Se manda a llamar el footer  -->
<?php footerAdmin($data); ?>