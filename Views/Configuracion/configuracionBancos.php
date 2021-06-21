<!-- Se manda a llamar el encabezado -->
<?php headerAdmin($data);
getModal("modalBancos", $data);
getModal("modalPrimerInicioLogin", $data);
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
                        <li class="breadcrumb-item"><a href="<?= Base_URL(); ?>/dashboard">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $data['page_name']; ?></li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div> 
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30"> 
            <!-- TABLA DE BANCOS -->
            <div class="row">
               <div class="col-md-12 col-sm-12">
                  <div class="card-box mb-30">
                     <div class="pd-20">
                        <div class="row">
                           <div class="col-6">
                              <h4 class="text-blue h4">BANCOS</h4>
                           </div>
                           <div class="col-6 text-right">
                              <button type="button" class="btn btn-primary" data-toggle="modal"
                                 data-target="#Bancos-modal" onclick="openModalBanco()">REGISTRAR</button>
                           </div>
                        </div>
                     </div>
                     <div class="pb-20">
                        <table id="TablaBancos" class="data-table table stripe hover nowrap">
                           <thead>
                              <tr>
                                 <th class="table-plus">N.º</th>
                                 <th>BANCO</th>
                                 <th>ABREVIATURA</th>
                                 <th class="datatable-nosort">ACCIONES</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td class="table-plus"></td>
                                 <td></td>
                                 <td></td>
                                 <td>
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