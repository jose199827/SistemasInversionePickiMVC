<!DOCTYPE html>
<html lang="es">

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
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
      rel="stylesheet">
   <!-- CSS -->
   <link rel="stylesheet" type="text/css" href="<?= vendors(); ?>/styles/core.css">
   <link rel="stylesheet" type="text/css" href="<?= vendors(); ?>/styles/icon-font.min.css">
   <link rel="stylesheet" type="text/css" href="<?= media(); ?>/plugins/sweetalert2/sweetalert2.css">
   <link rel="stylesheet" type="text/css" href="<?= vendors(); ?>/styles/style.css">
   <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/estilos.css">

</head>

<body class="login-page">
   <div id="divLoading">
      <div>
         <img src="<?= media(); ?>/img/loading.svg" alt="Cargador de Tienda Virtual">
      </div>
   </div>
   <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-md-6 col-lg-7">
               <img src="<?= vendors(); ?>/images/login-page-img.png" alt="">
            </div>
            <div class="col-md-6 col-lg-5">
               <div class="login-box bg-white box-shadow border-radius-10">
                  <div class="login-title">
                     <h2 class="text-center text-primary">
                        Iniciar sesión</h2>
                  </div>
                  <form class="login-form" id="formLogin" name="formLogin" action="">

                     <div class="input-group custom">
                        <input type="text" class="form-control form-control-lg valid validTextNumMayus"
                           onkeypress="return controlTagEspacio(event);"
                           onkeyup="javascript:this.value=this.value.toUpperCase();" id="txtEmail" name="txtEmail"
                           placeholder="Usuario" minlength="5" maxlength="20">
                        <div class="input-group-append custom">
                           <span class="input-group-text"><i class="dw dw-user1"></i></span>
                        </div>
                     </div>

                     <div class="input-group custom">
                        <input type="password" class="form-control form-control-lg valid"
                           onkeypress="return controlTagEspacio(event);" id="txtPassword" name="txtPassword"
                           placeholder="**********" minlength="5" maxlength="20">
                        <div class="input-group-append custom">
                           <span class="input-group-text"><i id="verPass" class="fa fa-eye"></i></span>
                        </div>
                     </div>

                     <div class="row pb-30">
                        <div class="col">
                           <div class="forgot-password text-rigth"><a href="javascript:void(0);"
                                 onclick="fntRecuperar();">¿Has
                                 olvidado tu
                                 contraseña?</a>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                           <div class="input-group mb-0">
                              <input class="btn btn-primary btn-lg btn-block" type="submit" value="Iniciar sesión">
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
   <script src="<?= media(); ?>/js/funtions_admin.js"></script>


</body>

</html>