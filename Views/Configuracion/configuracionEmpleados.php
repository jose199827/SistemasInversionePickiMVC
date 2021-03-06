<!-- Se manda a llamar el encabezado -->
<?php headerAdmin($data);
getModal("modalEmpleados", $data);
getModal("modalPrimerInicioLogin", $data);
?>
<div id="contentAjax"></div>
<div class="main-container">
   <div class="pd-ltr-20 xs-pd-20-10">
      <div class="min-height-200px">
         <div class="page-header">
            <div class="row">
               <div class="col-6">
                  <div class="title">
                     <h4>Configuración</h4>
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
                        REGISTRAR
                     </a>
                     <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalCargo" onclick="openModalCargos()">
                           CARGOS</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalTipoEm" onclick="openModalEmpleados()">
                           EMPLEADOS</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalRol" onclick="openModalRoles()">ROLES</a>
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
                              <h4 class="text-blue h4">CARGOS</h4>
                           </div>
                           <div class="col-6 text-right">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCargo" onclick="openModalCargos()">REGISTRAR</button>
                           </div>
                        </div>
                     </div>
                     <div class="pb-20">
                        <table id="TablaCargos" class="data-table table stripe hover nowrap">
                           <thead>
                              <tr>
                                 <th class="table-plus">N.º</th>
                                 <th>CARGO</th>
                                 <th class="datatable-nosort">ACCIONES</th>
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
                                          <a class="dropdown-item editar_cargo" id=""><i class="dw dw-edit2"></i>
                                             Editar</a>
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
                              <h4 class="text-blue h4">EMPLEADOS</h4>
                           </div>
                           <div class="col-6 text-right">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTipoEm" onclick="openModalEmpleados()">REGISTRAR</button>
                           </div>
                        </div>
                     </div>
                     <div class="pb-20">
                        <table id="TablaEmpleados" class="data-table table stripe hover nowrap">
                           <thead>
                              <tr>
                                 <th class="table-plus">N.º</th>
                                 <th>EMPLEADO</th>
                                 <th class="datatable-nosort">ACCIONES</th>
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
                                          <a class="dropdown-item editar_tip_empleado" id=""><i class="dw dw-edit2"></i>
                                             Editar</a>
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
                              <h4 class="text-blue h4">ROLES</h4>
                           </div>
                           <div class="col-6 text-right">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRol" onclick="openModalRoles()">REGISTRAR</button>
                           </div>
                        </div>
                     </div>
                     <div class="pb-20">
                        <table id="TablaRol" class="data-table table stripe hover nowrap">
                           <thead>
                              <tr>
                                 <th class="table-plus">N.º</th>
                                 <th>ROL</th>
                                 <th class="datatable-nosort">ACCIONES</th>
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
                                          <a class="dropdown-item editar_rol" id=""><i class="dw dw-edit2"></i>
                                             Editar</a>
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

         <!--MODAL EDITAR CARGO-->
         <div class="modal fade" id="modalCargoEditar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="myLargeModalLabel">CARGO</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body ActualizarCargo">

                  </div>
               </div>
            </div>
         </div>

         <!--MODAL EDITAR TIPO DE EMPLEADO-->
         <div class="modal fade" id="modalTipoEmEditar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="myLargeModalLabel">EMPLEADO</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body ActualizarTipoEmpleado">

                  </div>
               </div>
            </div>
         </div>

         <!--MODAL EDITAR TIPO ROL-->
         <div class="modal fade" id="modalRolEditar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="myLargeModalLabel">ROL</h5>
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