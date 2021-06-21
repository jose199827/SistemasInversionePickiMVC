<!-- Se manda a llamar el encabezado -->
<?php headerAdmin($data);
/* getModal("modalRoles", $data); */
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
                        <li class="breadcrumb-item"><a href="<?= Base_URL(); ?>">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $data['page_name'] ?></li>
                     </ol>
                  </nav>
               </div>
               <div class="col-6 text-right">
                  <button class="btn btn-primary">Agregar cliente</button>
               </div>
            </div>
         </div>
         <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">

            <h5>Datos de la Venta</h5>
            <hr>
            <div class="row">
               <div class="col-6 ">
                  <label for=""><strong>Vendedor</strong></label>
                  <p><?= $_SESSION['userData']['nom_persona'] . " " . $_SESSION['userData']['ape_persona'] ?></p>
               </div>
               <div class="col-6 text-right">
                  <label for=""><strong>Acciones</strong></label>
                  <div id="acciones_venta">
                     <a href="#" class="btn btn-danger btn_ok textcenter" id="btn_anular_venta">Cancelar</a>
                     <a href="#" class="btn btn-success  btn_new textcenter" id="btn_factura_venta">Procesar</a>
                  </div>
               </div>
            </div>

            <h5>Datos del Cliente</h5>
            <hr>
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Numero de ID</label>
                     <input type="hidden" name="idcliente" id="idcliente">
                     <input type="text" class="form-control valid validNumber" id="id_cliente" min="15" max="15"
                        name="id_cliente" placeholder="Numero de ID" required>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Nombre Cliente</label>
                     <input type="text" class="form-control" id="nom_cliente" disabled>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Telefono Cliente</label>
                     <input type="text" class="form-control" id="nom_cliente" disabled>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="form-group">
                     <label>Dirección Cliente</label>
                     <textarea name="direccion" class="form-control" id="direccion" cols="30" rows="10"
                        disabled></textarea>

                  </div>
               </div>
            </div>

            <h5 class="mb-15">Detalle de la Factura</h5>
            <table class="table tbl_venta">
               <thead>
                  <tr>
                     <th width="100px">Código</th>
                     <th>Descripción</th>
                     <th>Existencia</th>
                     <th width="100px">Cantidad</th>
                     <th class="textright">Precio</th>
                     <th width="100px">Descuento</th>
                     <th class="textright">Total</th>
                     <th>Acciones</th>
                  </tr>
                  <tr>
                     <td>
                        <input type="text" class="form-control" name="txt_cod_producto" id="txt_cod_producto">
                     </td>
                     <td id="txt_descripcion">-</td>
                     <td id="txt_existencia">-</td>
                     <td>
                        <input type="number" class="form-control" name="txt_cant_producto" id="txt_cant_producto"
                           value="1" min="1" disabled>
                     </td>
                     <td id="txt_precio" class="textright">0.00</td>
                     <td>
                        <input type="number" class="form-control" name="txt_des_producto" id="txt_des_producto"
                           value="0" min="0" max="100" disabled>
                     </td>
                     <td id="txt_precio_total" class="textright">0.00</td>
                     <td><a href="#" id="add_product_venta" class="link_add btn btn-primary"><i
                              class="icon-copy dw dw-add"></i></a></td>
                  </tr>
                  <tr>
                     <th>Código</th>
                     <th colspan="2">Descripción</th>
                     <th>Cantidad</th>
                     <th class="textright">Precio</th>
                     <th class="textright">Descuento</th>
                     <th class="textright">Total</th>
                     <th>Acciones</th>
                  </tr>
               </thead>
               <tbody id="detalle_venta">

               </tbody>
               <tfoot id="detalle_Totales">

               </tfoot>
            </table>

         </div>
      </div>
   </div>
</div>
<!-- js -->
<!-- Se manda a llamar el footer  -->
<?php footerAdmin($data); ?>