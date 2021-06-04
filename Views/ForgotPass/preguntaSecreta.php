<!DOCTYPE html>
<html>

<head>
   <!-- Basic Page Info -->
   <meta charset="utf-8">
   <meta name="desciption" content="Tienda Virtual">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="author" content="Jose Pineda">
   <title><?= $data['page_tag']; ?></title>

   <!-- Site favicon -->
   <link rel="icon" type="image/png" sizes="16x16" href="<?= media(); ?>/img/favicon.ico">

   <!-- Mobile Specific Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

   <!-- Google Font -->
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
   <!-- CSS -->
   <link rel="stylesheet" type="text/css" href="<?= vendors(); ?>/styles/core.css">
   <link rel="stylesheet" type="text/css" href="<?= vendors(); ?>/styles/icon-font.min.css">
   <link rel="stylesheet" type="text/css" href="<?= media(); ?>/plugins/sweetalert2/sweetalert2.css">
   <link rel="stylesheet" type="text/css" href="<?= vendors(); ?>/styles/style.css">
   <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/estilos.css">

</head>

<body>
   <div id="divLoading">
      <div>
         <img src="<?= media(); ?>/img/loading.svg" alt="Cargador de Tienda Virtual">
      </div>
   </div>
   <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-md-6">
               <img src="<?= vendors(); ?>/images/forgot-password.png" alt="">
            </div>
            <div class="col-md-6">
               <div class="login-box bg-white box-shadow border-radius-10">
                  <div class="login-title">
                     <h2 class="text-center text-primary">Has olvidado tu contraseña</h2>
                  </div>
                  <h6 class="mb-20">Introduzce tu Usuario</h6>
                  <form id="formResetPassPregunta" name="formResetPassPregunta" action="">
                     <div class="row">
                        <div class="col-9">
                           <div class="input-group custom">
                              <input type="email" class="form-control " id="txtUsuaioReset" name="txtUsuaioReset" placeholder="Usuario" minlength="10" maxlength="20">
                              <div class=" input-group-append custom">
                                 <span class="input-group-text"><i class="dw dw-user1" aria-hidden="true"></i></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-3">
                           <button class="btn btn-primary btn-block" type="button" onclick="buscarUser();"><i class="icon-copy dw dw-search2 font-20"></i></button>
                        </div>
                     </div>

                     <div id="divPregunta" style="display: none;">
                        <h6 class="mb-20">Tus Preguntas de Seguridad</h6>
                        <div class="form-group">
                           <input type="hidden" name="iduser" id="iduser">
                           <label>Preguntas de Seguridad:</label>
                           <select id="listPregunta" name="listPregunta" class="form-control selectpicker" name="" data-live-search="true">
                           </select>
                        </div>
                        <div class="form-group">
                           <label>Respuesta de Seguridad: </label>
                           <input class="form-control" type="text" name="txtRespuesta" id="txtRespuesta">
                        </div>
                     </div>

                     <div class="row align-items-center">
                        <div id="divPreguntaEnviar" class="col-6 notblock">
                           <div class="input-group mb-0">
                              <input class="btn btn-primary btn-lg btn-block" type="submit" value="Enviar">
                           </div>
                        </div>
                        <div class="col-6">
                           <div class="input-group mb-0">
                              <a class="btn btn-outline-primary btn-lg btn-block" href="<?= Base_URL(); ?>/login">Iniciar Sesión</a>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- js -->
   <script>
      const base_url = "<?= Base_URL(); ?>"
   </script>
   <script src="<?= vendors(); ?>/scripts/core.js"></script>
   <script src="<?= vendors(); ?>/scripts/script.min.js"></script>
   <script src="<?= vendors(); ?>/scripts/process.js"></script>
   <script src="<?= vendors(); ?>/scripts/layout-settings.js"></script>
   <!-- add sweet alert js & css in footer -->
   <link rel="stylesheet" type="text/css" href="<?= media(); ?>/plugins/sweetalert2/sweetalert2.css">
   <script src="<?= media(); ?>/plugins/sweetalert2/sweetalert2.all.js"></script>
   <script src="<?= media(); ?>/plugins/sweetalert2/sweet-alert.init.js"></script>
   <script src="<?= media(); ?>/js/<?= $data['page_funtions_js']; ?>"></script>
</body>

</html>