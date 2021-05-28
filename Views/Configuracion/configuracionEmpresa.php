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
                     <h4>Configuración</h4>
                  </div>
                  <nav aria-label="breadcrumb" role="navigation">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Configuración</a></li>
                     </ol>
                  </nav>
               </div>
               <div class="col-6 text-right">
                  <div class="dropdown">
                     <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        Registrar
                     </a>
                     <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#small-modaladdEmpresa">Empresa</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Inicio del Contenido -->
         <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <!-- Simple Datatable start -->
            <!-- TABLA DE MARCAS-->
            <div class="row">
               <div class="col-md-12 col-sm-12">
                  <div class="card-box mb-30">
                     <div class="pd-20">
                        <div class="row">
                           <div class="col-6">
                              <h4 class="text-blue h4">Tabla de Empresas</h4>
                           </div>
                           <div class="col-6 text-right">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#small-modaladdEmpresa">Registrar</button>
                           </div>
                        </div>
                     </div>
                     <div class="pb-20">
                        <table class="data-table table stripe hover nowrap">
                           <thead>
                              <tr>
                                 <th class="table-plus datatable-nosort">N.°</th>
                                 <th>RTN Empresa</th>
                                 <th>Empresa</th>
                                 <th class="datatable-nosort">Acciones</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td class="table-plus"></td>
                                 <td></td>
                                 <td></td>
                                 <td>
                                    <div class="dropdown">
                                       <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                          <i class="dw dw-more"></i>
                                       </a>
                                       <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                          <a class="dropdown-item editar" id=""><i class="dw dw-edit2"></i> Editar</a>
                                          <a class="dropdown-item" href="bd/delete_marcas.php?id_marca="><i class="dw dw-delete-3"></i>Eliminar</a>
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

         <!-- </div> -->

         <!-- Apartado de modales -->
         <!--MODAL DE EMPRESAS-->
         <div class="modal fade" id="small-modaladdEmpresa" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="myLargeModalLabel">Registrar Empresa</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body">
                     <form class="needs-validation" novalidate action="bd/insert_empresa.php" id="formEmpresa" name="formEmpresa" method="POST">
                        <div class="row">
                           <div class="col-md-12 col-sm-12">
                              <!-- Nombre del banco-->
                              <div class="form-group">
                                 <label for="RTN">RTN Empresa: <span class="text-red-50">*</span> </label>
                                 <input type="text" id="RTN" name="RTN" class="form-control" required>
                                 <span class="msj"></span>
                                 <div class="valid-feedback">Valido</div>
                                 <div class="invalid-feedback">Por favor, rellena el campo</div>
                              </div>
                              <div class="form-group">
                                 <label for="empresa">Empresa: <span class="text-red-50">*</span> </label>
                                 <input type="text" id="empresa" name="empresa" class="form-control" required>
                                 <span class="msj"></span>
                                 <div class="valid-feedback">Valido</div>
                                 <div class="invalid-feedback">Por favor, rellena el campo</div>
                              </div>
                           </div>

                        </div>
                        <div class="text-right">
                           <button id="btnActionForm" type="submit" class="btn btn-success"><span id="btnTex">Registrar</span></button>
                           <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                     </form>
                  </div>

               </div>
            </div>
         </div>
         <!--MODAL DE EDITAR EMPRESAS-->
         <div class="modal fade" id="small-modaladdEmpresaEditar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="myLargeModalLabel">Actualizar Empresa</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body ActualizarEmpresas">

                  </div>

               </div>
            </div>
         </div>
      </div>
      <?php footer($data); ?>
   </div>
</div>
<!-- Se manda a llamar el footer  -->
<?php footerAdmin($data); ?>