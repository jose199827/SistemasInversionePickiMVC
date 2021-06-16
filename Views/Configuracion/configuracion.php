<!-- Se manda a llamar el encabezado -->
<?php headerAdmin($data);
getModal("modalProductos", $data);
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
               <div class="col-6 text-right">
                  <div class="dropdown">
                     <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        Registrar
                     </a>
                     <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#marca-modal">Marca</a>
                        <a class="dropdown-item" href="#" data-toggle="modal"
                           data-target="#categoria-modal">Categoria</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#grupo-modal">Grupo</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#unidadMedida-modal">Unidad
                           Medida</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#impuesto-modal">Impuesto</a>
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
                              <h4 class="text-blue h4">Tabla de Marcas</h4>
                           </div>
                           <div class="col-6 text-right">
                              <button type="button" class="btn btn-primary" data-toggle="modal"
                                 data-target="#marca-modal">Registrar</button>
                           </div>
                        </div>
                     </div>
                     <div class="pb-20">
                        <table id="TablaMarcas" class="data-table table stripe hover nowrap">
                           <thead>
                              <tr>
                                 <th class="table-plus">N.º</th>
                                 <th>Marca</th>
                                 <th class="datatable-nosort">Acciones</th>
                              </tr>
                           </thead>
                           <tbody>

                           </tbody>
                        </table>

                     </div>
                  </div>

               </div>

               <!--TABLE DE CATEGORIAS-->
               <div class="col-md-12 col-sm-12">
                  <div class="card-box mb-30">
                     <div class="pd-20">
                        <div class="row">
                           <div class="col-6">
                              <h4 class="text-blue h4">Tabla de Categorías</h4>
                           </div>
                           <div class="col-6 text-right">
                              <button type="button" class="btn btn-primary" data-toggle="modal"
                                 data-target="#categoria-modal">Registrar</button>
                           </div>
                        </div>

                     </div>
                     <div class="pb-20">
                        <table id="TablaCategorias" class="data-table table stripe hover nowrap">
                           <thead>
                              <tr>
                                 <th class="table-plus">N.º</th>
                                 <th>Categoria</th>
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
                                       <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                          href="#" role="button" data-toggle="dropdown">
                                          <i class="dw dw-more"></i>
                                       </a>
                                       <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                          <a class="dropdown-item editar_categoria" id=""><i class="dw dw-edit2"></i>
                                             Editar</a>
                                          <a class="dropdown-item" href="bd/delete_categoria.php?id_categoria="><i
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
         <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <!-- Simple Datatable start -->
            <!--TABLA DE GRUPOS -->
            <div class="row">
               <div class="col-md-12 col-sm-12">
                  <div class="card-box mb-30">
                     <div class="pd-20">
                        <div class="row">
                           <div class="col-6">
                              <h4 class="text-blue h4">Tabla de Grupos</h4>
                           </div>
                           <div class="col-6 text-right">
                              <button type="button" class="btn btn-primary" data-toggle="modal"
                                 data-target="#grupo-modal">Registrar</button>
                           </div>
                        </div>
                     </div>
                     <div class="pb-20">
                        <table id="TablaGrupos" class="data-table table stripe hover nowrap">
                           <thead>
                              <tr>
                                 <th class="table-plus">N.º</th>
                                 <th>Grupo</th>
                                 <th class="datatable-nosort">Acciones</th>
                              </tr>
                           </thead>
                           <tbody>

                              <tr>
                                 <td class="table-plus"></td>
                                 <td></td>
                                 <td>
                                    <div class="dropdown">
                                       <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                          href="#" role="button" data-toggle="dropdown">
                                          <i class="dw dw-more"></i>
                                       </a>
                                       <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                          <a class="dropdown-item editar_grupos" id=""><i class="dw dw-edit2"></i>
                                             Editar</a>
                                          <a class="dropdown-item" href="bd/delete_grupos.php?id_grupo="><i
                                                class="dw dw-delete-3"></i> Eliminar</a>
                                       </div>
                                    </div>
                                 </td>
                              </tr>

                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <!--TABLA UNIDADES MEDIDAS-->
               <div class="col-md-12 col-sm-12">
                  <div class="card-box mb-30">
                     <div class="pd-20">
                        <div class="pd-20">
                           <div class="row">
                              <div class="col-6">
                                 <h4 class="text-blue h4">Tabla de Unidades Medidas</h4>
                              </div>
                              <div class="col-6 text-right">
                                 <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#unidadMedida-modal">Registrar</button>
                              </div>
                           </div>
                        </div>
                        <div class="pb-20">
                           <table id="TablaUnidades" class="data-table table stripe hover nowrap">
                              <thead>
                                 <tr>
                                    <th class="table-plus">N.º</th>
                                    <th>Unidad</th>
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
                                          <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                             href="#" role="button" data-toggle="dropdown">
                                             <i class="dw dw-more"></i>
                                          </a>
                                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                             <a class="dropdown-item editar_uni_medidas" id=""><i
                                                   class="dw dw-edit2"></i> Editar</a>
                                             <a class="dropdown-item" href="bd/delete_uni_medidas.php?id_uni_medida="><i
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
         </div>
         <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <!-- TABLA DE IMPUESTOS -->
            <div class="row">
               <div class="col-md-12 col-sm-12">
                  <div class="card-box mb-30">
                     <div class="pd-20">
                        <div class="row">
                           <div class="col-6">
                              <h4 class="text-blue h4">Tabla de Impuestos</h4>
                           </div>
                           <div class="col-6 text-right">
                              <button type="button" class="btn btn-primary" data-toggle="modal"
                                 data-target="#impuesto-modal">Registrar</button>
                           </div>
                        </div>
                     </div>
                     <div class="pb-20">
                        <table id="TablaImpuestos" class="data-table table stripe hover nowrap">
                           <thead>
                              <tr>
                                 <th class="table-plus">N.º</th>
                                 <th>Nombre Impuestos</th>
                                 <th>Porcentaje</th>
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

                                          <a class="dropdown-item editar_impuestos" id=""><i class="dw dw-edit2"></i>
                                             Editar</a>
                                          <a class="dropdown-item" href="bd/delete_impuestos.php?id_tip_impuestos="><i
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

         <!-- Modal de Editar Marca -->
         <div class="modal fade" id="marca-modalEditar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="myLargeModalLabel">Editar Marca</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body ActualizarMarca">

                  </div>
               </div>
            </div>
         </div>


         <!-- Modal de Editar Categoria -->
         <div class="modal fade" id="categoria-modalEditar" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="myLargeModalLabel">Editar Categoria</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body ActualizarCategoria">

                  </div>
               </div>
            </div>
         </div>

         <!-- Modal de Editar Grupo -->
         <div class="modal fade" id="grupo-modalEditar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="myLargeModalLabel">Editar Grupo</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body ActualizarGrupo">

                  </div>
               </div>
            </div>
         </div>

         <!-- Modal de Unidad Medida -->

         <!-- Modal de Editar Unidades Medidas -->
         <div class="modal fade" id="uni_medidas-modalEditar" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="myLargeModalLabel">Editar Unidad de Medida:</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body Actualizar_Uni_Medidas">

                  </div>
               </div>
            </div>
         </div>



         <!-- Modal de Editar Impuestos -->
         <div class="modal fade" id="impuesto-modalEditar" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="myLargeModalLabel">Editar Impuestos</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body ActualizarImpuestos">

                  </div>
               </div>
            </div>
         </div>
         <!-- Fin apartado de modales -->


      </div>
      <?php footer($data); ?>
   </div>
</div>

<!-- Se manda a llamar el footer  -->
<?php footerAdmin($data); ?>