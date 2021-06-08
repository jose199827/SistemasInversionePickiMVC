<!-- Se manda a llamar el encabezado -->
<?php headerAdmin($data);
/* getModal("modalRoles", $data); */
?>
<div class="mobile-menu-overlay"></div>
<div class="main-container">
   <div class="pd-ltr-20 xs-pd-20-10">
      <div class="page-header d-flex justify-content-between align-items-center">
         <div class="col-md-6 col-sm-12">
            <div class="title">
               <h4><?= $data['page_title'] ?></h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= Base_URL() ?>">Inicio</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?= $data['page_name'] ?></li>
               </ol>
            </nav>
         </div>
         <?php if ($_SESSION['permisosMod']['w']) { ?>
         <div class="pull-right">
            <a href="addproveedores.php"><button type="button" class="btn btn-primary"
                  data-toggle="modal">Registrar</button></a>
         </div>
         <?php } ?>
      </div>
      <div class="card-box mb-30">
         <div class="pd-20">
            <h4 class="text-blue h4"><?= $data['page_name'] ?></h4>
            <div class="row">
            </div>
            <div class="pb-20">
               <table id="tabla_proveedores" name="tabla_proveedores"
                  class="table hover multiple-select-row data-table-export nowrap">
                  <thead>
                     <tr>
                        <th class="table-plus datatable-nosort">N.°</th>
                        <th>Empresa </th>
                        <th>Contacto</th>
                        <th>Banco</th>
                        <th>Cuenta</th>
                        <th>Numero</th>
                        <th class="datatable-nosort">Acciones</th>
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
                        </td>
                        <td>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
         <!-- Modal de Editar proveedor -->
         <div class="modal fade" id="proveedormodalEditar" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="myLargeModalLabel">Editar Proveedor</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body card-body wizard-content ActualizarProveedor">

                  </div>
               </div>
            </div>
         </div>
         <!-- Modal de vista proveedor -->
         <div class="modal fade" id="proveedormodalvista" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="myLargeModalLabel">Ver Proveedor</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body card-body wizard-content vistaProveedor">

                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Se manda a llamar el footer  -->
      <?php footerAdmin($data); ?>