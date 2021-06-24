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
               <div class="col-6">
                  <div class="title">
                     <h4><?= $data['page_title'] ?></h4>
                  </div>
                  <nav aria-label="breadcrumb" role="navigation">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= Base_URL(); ?>/dashboard">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $data['page_name'] ?></li>
                     </ol>
                  </nav>
               </div>
               <?php if ($_SESSION['permisosMod']['w']) { ?>
               <div class="col-6 text-right">
                  <a href="<?= Base_URL(); ?>/Empleados"><button type="submit"
                        class="btn btn-primary float-right">REGISTRAR</button></a>
               </div>
               <?php } ?>
            </div>
         </div>
         <!-- Inicio del Contenido -->
         <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <!-- Simple Datatable start -->
            <!-- TABLA DE EMPLEADOS-->
            <div class="row">
               <div class="col-md-12 col-sm-12">
                  <div class="card-box mb-30">
                     <div class="pd-20">
                        <div class="row">
                           <div class="col-6">
                              <h4 class="text-blue h4"><?= $data['page_name'] ?></h4>
                           </div>
                        </div>
                     </div>
                     <div class="pb-20">
                        <table class="data-table table stripe hover nowrap" id="tabla_usuarios">
                           <thead>
                              <tr>
                                 <th class="table-plus datatable-nosort">N.º</th>
                                 <th>NOMBRE</th>
                                 <th>ROL</th>
                                 <th>USUARIO</th>
                                 <th>ESTADO</th>
                                 <th class="datatable-nosort">ACCIONES</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td class="table-plus">
                                 </td>
                                 <td>

                                 </td>
                                 <td>

                                 </td>
                                 <td>

                                 </td>
                                 <td>

                                 </td>
                                 <td>
                                    <div class="dropdown">
                                       <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                          href="#" role="button" data-toggle="dropdown">
                                          <i class="dw dw-more"></i>
                                       </a>
                                       <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                          <a class="dropdown-item BtnVista"><i class="dw dw-eye"></i> Vista</a>
                                          <a class="dropdown-item BtnActualizar"><i class="dw dw-edit2"></i> Editar</a>
                                          <a class="dropdown-item" href=""><i class="dw dw-delete-3"></i> Eliminar</a>
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
      </div>
      <?php footer($data); ?>
   </div>
</div>

<!-- Se manda a llamar el footer  -->
<?php footerAdmin($data); ?>