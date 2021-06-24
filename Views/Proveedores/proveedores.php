<!-- Se manda a llamar el encabezado -->
<?php headerAdmin($data);
getModal("modalPrimerInicioLogin", $data);
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
                  <li class="breadcrumb-item active" aria-current="addProveedores.php"><?= $data['page_name'] ?></li>
               </ol>
            </nav>
         </div>
      </div>
      <div class="pd-20 card-box mb-30">
         <div class="clearfix">
            <h5>Información Personal</h5>
         </div>
         <hr>
         <form method="post" id="registrarproveedor" name="registrarproveedor" action="bd/insert_proveedores.php" class="needs-validation" novalidate>
            <!-- paso 1 -->
            <div class="row">
               <!-- Nombre -->
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="conempresa">Nombre del Contacto :</label>
                     <input type="text" class="form-control" required name="conempresa" id="conempresa" maxlength="50" minlength="3" pattern="[a-zA-Z ]+">
                     <div class="valid-feedback">Valido</div>
                     <div class="invalid-feedback">Por favor, rellena el campo</div>
                  </div>
               </div>
               <!-- Empresa -->
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="nomempresa">Nombre de la empresa :</label>
                     <input type="text" class="form-control" required name="nomempresa" id="nomempresa" maxlength="50" minlength="3" pattern="[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9- ]+(?:\.[a-zA-Z0-9-]+)*$]+">
                     <div class="valid-feedback">Valido</div>
                     <div class="invalid-feedback">Por favor, rellena el campo</div>
                  </div>
               </div>
               <!-- Nacionalidad -->
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="nacionalidad">Nacionalidad :</label>
                     <select class="custom-select2 form-control" id="nacionalidad" name="nacionalidad" required="" style="width: 100%; height: 38px;">
                        <option selected=""></option>
                        <option value="Hondureño">Hondureño</option>
                        <option value="Estadounidense">Estadounidense</option>
                        <option value="otra">otra</option>
                     </select>
                     <div class="valid-feedback">Valido</div>
                     <div class="invalid-feedback">Por favor, rellena el campo</div>
                  </div>
               </div>
               <!-- Numero -->
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="telefono">Telefono :</label>
                     <input type="number" class="form-control" required name="telefono" id="telefono" minlength="8" maxlength="14" pattern="[0-9 ]+">
                     <div class="valid-feedback">Valido</div>
                     <div class="invalid-feedback">Por favor, rellena el campo</div>
                  </div>
               </div>
               <!-- RTN -->
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="rtnempresa">RTN Empresa:</label>
                     <input type="text" class="form-control" name="rtnempresa" required="" id="rtnempresa" maxlength="14" minlength="14" pattern="[0-9]+">
                     <div class="valid-feedback">Valido</div>
                     <div class="invalid-feedback">Por favor, rellena el campo</div>
                     <small class="form-text text-danger" th:if="${#fields.hasErrors('rtnempresa')}" th:errors="*{rtnempresa}"></small>
             </div>
             </div>
			<!-- Correo Electronico -->
			<div class="col-md-6">
			<div class="form-group">
			<label for="correo">Correo Electronico :</label>
			<input type="text" class="form-control" name="correo" id="correo" minlength="10" maxlength="40" required="@" pattern="[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9- ]+(?:\.[a-zA-Z0-9-]+)*$]+">
			<div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">Por favor, rellena el campo</div>
			</div>
			</div>
			<!-- Direccion -->
			<div class="col-md-6">
			<div class="form-group">
			<label for="direccion">Direccion:</label>
			<textarea type="text" class="form-control" required name="direccion" id="direccion" maxlength="250" pattern="[[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9- ]+(?:\.[a-zA-Z0-9-]+)*$]+"></textarea> 
			<div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">Por favor, rellena el campo</div>
			</div>
			</div>
			</div>
			<!-- paso 2 -->
			<!-- banco -->
			<h5>Informacion Bancaria</h5>
			<hr>
			 <div class="row">
			 <div class="col-md-6">
		     <div class="form-group">
			<label for="banco" >seleccionar banco:</label>
            <select class="custom-select2 form-control" id="banco" name="banco" required>
            <option selected=""></option>
            </select>
            <div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">Por favor, rellena el campo</div>
		    </div>
			</div>
			<!-- Numero de cuenta -->
		    <div class="col-md-6">
	        <div class="form-group">
		    <label for="numcuenta">Numero de Cuenta :</label>
			<input type="text" class="form-control" name="numcuenta" id="numcuenta" required minlength="8" maxlength="30" pattern="[0-9]+">
			<div class="valid-feedback">Valido</div>
            <div class="invalid-feedback">Por favor, rellena el campo</div>
			</div>
			</div>
			</div>
			<div class="text-right">
			<input type="submit" class="btn btn-primary" name="guardar" value="REGISTRAR"id="guardar">
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
<!-- Se manda a llamar el footer  -->
<?php footerAdmin($data); ?>