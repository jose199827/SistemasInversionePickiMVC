<!-- Se manda a llamar el encabezado -->
<?php headerAdmin($data);
getModal("modalEmpresa", $data);
?>

<div class="main-container">
   <div class="pd-ltr-20 xs-pd-20-10">
      <div class="min-height-200px">
         <div class="page-header">
            <div class="row">
               <div class="col-6">
                  <div class="title">
                     <h4><?= $data['page_title'] ?></h4>
                  </div>
                  <nav aria-label="breadcrumb" role="navigation">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= Base_URL(); ?>">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $data['page_name']; ?></li>
                     </ol>
                  </nav>
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
                        </div>
                     </div>
                     <div class="pb-20">
                        <table id="TablaEmpresa" class="data-table table stripe hover nowrap">
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
                                       <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                          href="#" role="button" data-toggle="dropdown">
                                          <i class="dw dw-more"></i>
                                       </a>
                                       <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                          <a class="dropdown-item editar" id=""><i class="dw dw-edit2"></i> Editar</a>
                                          <a class="dropdown-item" href="bd/delete_marcas.php?id_marca="><i
                                                class="dw dw-delete-3"></i>Eliminar</a>
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

         <!--MODAL DE EDITAR EMPRESAS-->
         <div class="modal fade" id="small-modaladdEmpresaEditar" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
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