<?php

class Usuarios2 extends Controllers
{
   public function __construct()
   {
      parent::__construct();
      session_start();
      //session_regenerate_id(true);
      if (empty($_SESSION['login'])) {
         header('location: ' . Base_URL() . '/login');
      }
      getPermisos(3);
   }

   /* TITULOS DE LA TABLA USUARIOS */
   public function tabla()
   {
      $data['page_tag'] = "Usuarios - Inversiones Picky";
      $data['page_title'] = "Usuarios";
      $data['page_name'] = "Tabla de Usuarios";
      $data['page_funtions_js'] = "funtions_usuarios2.js";
      $this->views->getView($this, "lista_usuarios", $data);
   }

   
   /* TITULOS DE REGISTRAR USUARIO */
   public function usuarios2()
   {
      $data['page_tag'] = "Usuarios - Inversiones Picky";
      $data['page_title'] = "Usuarios";
      $data['page_name'] = "Registrar Usuarios";
      $data['page_funtions_js'] = "funtions_usuarios2.js";
      $this->views->getView($this, "usuarios2", $data);
   }


   /* JALAR LOS DATOS A LA TABLA  */
   public function  getUsuarios()
   {
      $arrData = $this->model->selectUsuarios();

      /* dep( $arrData); exit();  */
      for ($i = 0; $i < count($arrData); $i++) {
         $arrData[$i]['numRegistro'] = $i + 1;



         $btnEdit = '';
         $btnDel = '';
         if ($_SESSION['permisosMod']['u']) {
            $btnEdit = '<a class="dropdown-item btnActualizarUsuario" href="' . Base_URL() . '/Usuarios2/updateUsuarios/' . $arrData[$i]['id_persona'] . '" ><i class="dw dw-edit2"></i> Editar</a>';
         }
         if ($_SESSION['permisosMod']['d']) {
            $btnDel = '<a class="dropdown-item btnDelUsuarios" href="javascript:;" onClick="fntDelUsuarios(' . $arrData[$i]['id_persona'] . ')"><i class="dw dw-delete-3"></i> Eliminar</a>';
         }
         $arrData[$i]['options'] = '<div class="dropdown ">
          <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="javascript:;" role="button"
                                                    data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                  </a>
                                                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    ' . $btnEdit . '
                                                    ' . $btnDel . '
                                                  </div>
                                                </div>';
      }



      echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
      die();
   }

    /*  INSERT DATOS USUARIO */
    public function setUsuarios2()
    {
        /* dep($_POST); exit();  */
 
       if (empty($_POST["NombrePer"]) || empty($_POST["usuario"]) || empty($_POST["Rol"])  ) {
 
          $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
       } else {
          $nombre_persona = intval($_POST['NombrePer']);
          $usuario_empleado = strClean($_POST['usuario']);
          $rol_usuario = intval($_POST['Rol']);
          $password_empleado = empty($_POST['password']) ? hash("SHA256", passGenerator()) : hash("SHA256", $_POST['password']);

          $request = $this->model->InsertUsuario($nombre_persona, $usuario_empleado, $rol_usuario, $password_empleado);
 
 
          if ($request > 0) {
             $arrResponse = array("status" => true, "msg" => 'Datos guardados correctamente.');
          } else if ($request == 'existeusuario') {
             $arrResponse = array("status" => false, "msg" => 'Nombre de usuario ya existe.');
          }
       }
 
       echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
 
       die();
    }

   /* SELECCIONAR PERSONA */
   public function getSelectPersona()
   {
      $htmlOptions = "";
      $arrData = $this->model->selectpersonas();
      /*  dep($arrData); */
      if (count($arrData) > 0) {
         for ($i = 0; $i < count($arrData); $i++) {
            $htmlOptions .= '<option value ="' . $arrData[$i]['id_persona'] . '">' . $arrData[$i]['nom_persona'] . ' ' . $arrData[$i]['ape_persona'] . '</option>';
         }
      }
      echo $htmlOptions;
      die();
   }

   public function getSelectRol()
   {
      $htmlOptions = "";
      $arrData = $this->model->SelectRol();
      /* dep($arrData); exit();  */
      if (count($arrData) > 0) {
         for ($i = 0; $i < count($arrData); $i++) {
            $htmlOptions .= '<option value ="' . $arrData[$i]['id_rol'] . '">' . $arrData[$i]['rol'] . '</option>';
         }
      }
      echo $htmlOptions;
      die();
   }


}
