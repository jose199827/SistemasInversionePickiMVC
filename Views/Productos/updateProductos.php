<!-- Se manda a llamar el encabezado -->
<?php headerAdmin($data);
$productos =$data['productos'];
?>
<div class="mobile-menu-overlay"></div>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
      <div class="min-height-200px">
        <div class="page-header">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="title">
              <h4><?=$data['page_title'] ?></h4>
              </div>
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?=Base_URL() ?>">Inicio</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?=$data['page_name'] ?></li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
        <!-- Inicio del Contenido -->
        <!-- Simple Datatable End -->
        <div class="card-box mb-30">
          <div class="pd-20">
            <h5>Registrar Producto</h5>
            <hr>
            <form method="post" id="actualizarproducto" name="actualizarproducto" oninput="calc()" class="needs-validation" novalidate>
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <!-- Nombre del producto -->
                  <div class="form-group">
                    <input type="text" id="id_producto" value="<?=$productos['id_producto']?>" name="id_producto" hidden>
			              <input type="text" id="id_proveedor" value="<?=$productos['id_proveedor']?>" name="id_proveedor" hidden>
			              <input type="text" id="id_marca" value="<?=$productos['id_marca']?>" name="id_marca" hidden>
                    <input type="text" id="id_categoria" value="<?=$productos['id_categoria']?>" name="id_categoria" hidden>
                    <input type="text" id="id_grupo" value="<?=$productos['id_grupo']?>" name="id_grupo" hidden>
                    <input type="text" id="id_tip_impuesto" value="<?=$productos['id_tip_impuesto']?>" name="id_tip_impuesto" hidden>
                    <input type="text" id="id_uni_medida" value="<?=$productos['id_uni_medida']?>" name="id_uni_medida" hidden>
                    <label>Nombre de Producto: <span class="text-red-50">*</span> </label>
                    <input type="text" class="form-control" required name="nomproducto" value="<?=$productos['nom_producto']?>" id="nomproducto" maxlength="50" minlength="6" pattern="[a-zA-Z0-9 ]+">
                    <div class="valid-feedback">Valido</div>
                    <div class="invalid-feedback">Por favor, rellena el campo</div>
                  </div>
                  <!-- Descripción -->
                  <div class="form-group">
                    <label>Descripción: </label>
                    <textarea class="form-control" name="descripcion" id="descripcion" value="<?=$productos['des_producto']?>" cols="20" rows="10" style="resize:vertical; height: 140px;" required pattern="[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9- ]+(?:\.[a-zA-Z0-9-]+)*$]+" maxlength="250" minlength="10"></textarea>
                    <div class="valid-feedback">Valido</div>
                    <div class="invalid-feedback">Por favor, rellena el campo</div>
                  </div>
                  <!-- Proveedor -->
                  <div class="form-group">
                    <label>Proveedor: <span class="text-red-50">*</span></label>
                    <select class="custom-select2 form-control" id="proveedor" name="proveedor" required>
                      <option selected="" value="<?=$productos['nom_empresa']?>"></option>
                    </select>
                    <div class="valid-feedback">Valido</div>
                    <div class="invalid-feedback">Por favor, rellena el campo</div>
                  </div>
                  <!-- Marca -->
                  <div class="form-group">
                    <label>Marca: <span class="text-red-50">*</span></label>
                    <select class="custom-select2 form-control" id="marca" name="marca" required>
                      <option selected="" value="<?=$productos['marca']?>"></option>
                      <!--halar datos de db -->
                    </select>
                    <div class="valid-feedback">Valido</div>
                    <div class="invalid-feedback">Por favor, rellena el campo</div>
                  </div>
                  <!-- Categoria -->
                  <div class="form-group">
                    <label>Categoria: </label>
                    <select class="custom-select2 form-control" id="categorias" name="categorias" required>
                      <option selected="" value="<?=$productos['categoria']?>"></option>
                    </select>
                    <div class="valid-feedback">Valido</div>
                    <div class="invalid-feedback">Por favor, rellena el campo</div>
                  </div>
                  <!-- Grupo -->
                  <div class="form-group">
                    <label>Grupo: </label>
                    <select class="custom-select2 form-control" id="grupo" name="grupo" required>
                      <option selected="" value="<?=$productos['grupo']?>"></option>
                    </select>
                    <div class="valid-feedback">Valido</div>
                    <div class="invalid-feedback">Por favor, rellena el campo</div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <!-- Precio Compra del producto -->
                  <div class="form-group">
                    <label>Precio de costo: <span class="text-red-50">*</span> </label>
                    <input type="number" min="1" class="form-control" id="pre_compra" value="<?=$productos['pre_compra']?>" name="pre_compra" required pattern="[0-9]+" >
                    <div class="valid-feedback">Valido</div>
                    <div class="invalid-feedback">Por favor, rellena el campo</div>
                  </div>
                  <!-- Precio Venta del producto -->
                  <div class="form-group">
                    <label>Precio de Venta: <span class="text-red-50">*</span> </label>
                    <input type="number" min="1" class="form-control" required id="pre_venta" value="<?=$productos['pre_venta']?>" name="pre_venta" pattern="[0-9]+" >
                    <div class="valid-feedback">Valido</div>
                    <div class="invalid-feedback">Por favor, rellena el campo</div>
                  </div>
                  <!-- Isv -->
                  <div class="form-group">
                    <label>Isv: <span class="text-red-50">*</span></label>
                    <select class="custom-select2 form-control" id="isv" name="isv" required>
                      <option selected="" value="<?=$productos['nom_isv']?>"></option>
                    </select>
                    <div class="valid-feedback">Valido</div>
                    <div class="invalid-feedback">Por favor, rellena el campo</div>
                  </div>
                  <!-- Precio Bruto del producto -->
                  <div class="form-group">
                    <label>Precio Bruto (con isv): <span class="text-red-50">*</span> </label>
                    <input type="text" class="form-control" value="<?=$productos['pre_reventa']?>" required id="pre_reventa" name="pre_reventa" readonly>
                    <div class="valid-feedback">Valido</div>
                    <div class="invalid-feedback">Por favor, rellena el campo</div>
                  </div>
                  <!-- Stock Minimo del producto -->
                  <div class="form-group">
                    <label>Stock Minimo: </label>
                    <input type="number" min="1" class="form-control" required value="<?=$productos['sto_minimo']?>" id="sto_minimo" name="sto_minimo" pattern="[0-9]+" >
                    <div class="valid-feedback">Valido</div>
                    <div class="invalid-feedback">Por favor, rellena el campo</div>
                  </div>
                  <!-- Stock Maximo del producto -->
                  <div class="form-group">
                    <label>Stock Maximo: </label>
                    <input type="number" min="1" class="form-control" required id="sto_maximo" value="<?=$productos['sto_maximo']?>" name="sto_maximo" pattern="[0-9]+" >
                    <div class="valid-feedback">Valido</div>
                    <div class="invalid-feedback">Por favor, rellena el campo</div>
                  </div>
                  <!-- Unidad de medida -->
                  <div class="form-group">
                    <label>Unidad de medida: </label>
                    <select class="custom-select2 form-control" id="uni_medida" name="uni_medida" required>
                      <option selected="" value="<?=$productos['uni_medida']?>"></option>
                    </select>
                    <div class="valid-feedback">Valido</div>
                    <div class="invalid-feedback">Por favor, rellena el campo</div>
                  </div>
                </div>
                </div>
                 <!-- Descripción -->

              <div class="text-right">
                <input type="submit" class="btn btn-primary" name="guardar" id="guardar">
              </div>
              <script>
                // Disable form submissions if there are invalid fields
                (function() {
                  'use strict';
                  window.addEventListener('load', function() {
                    // Get the forms we want to add validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                      form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                          event.preventDefault();
                          event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                      }, false);
                    });
                  }, false);
                })();
              </script>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function calc() {
      var precio = document.getElementById("pre_venta").value;
      var impuesto = document.getElementById("isv");
      var c = impuesto.options[impuesto.selectedIndex].text;
      var d = c.replace("%", "");

      subTotal = parseInt(precio)
      desPorcentaje = ((subTotal * d) / 100);
      var total = document.getElementById("pre_reventa");
      total.value = (subTotal + desPorcentaje);
    }
  </script>
  <?php footerAdmin($data); ?>
