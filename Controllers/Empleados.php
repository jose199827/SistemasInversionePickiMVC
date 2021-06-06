<?php

class Empleados extends Controllers
{
   public function __construct()
   {
      parent::__construct();
      session_start();
      //session_regenerate_id(true);
      if (empty($_SESSION['login'])) {
         header('location: ' . Base_URL() . '/login');
      }
   }

   public function empleados()
   {
      $data['page_tag'] = "Empleados - Inversiones Picky";
      $data['page_title'] = "Empleados";
      $data['page_name'] = "Registrar Empleados";
      $data['page_funtions_js'] = "funtions_empleados.js";
      $this->views->getView($this, "empleados", $data);
   }

   /* JALAR DATOS PARA LA TABLA */
   public function tabla()
   {
      $data['page_tag'] = "Empleados - Inversiones Picky";
      $data['page_title'] = "Empleados";
      $data['page_name'] = "Tabla de Empleados";
      $data['page_funtions_js'] = "funtions_empleados.js";
      $this->views->getView($this, "lista_empleados", $data);
   }


   /*  INSERT DATOS EMPLEADOS */
   public function setEmpleado()
   {
      /*  dep($_POST); exit(); */

      if (empty($_POST["nombreEmpleado"]) || empty($_POST["identidad"]) || empty($_POST["nacimiento"]) || empty($_POST["correo"]) || empty($_POST["apellido"]) || empty($_POST["edad"]) || empty($_POST["genero"]) || empty($_POST["telefono"]) || empty($_POST["direccion"]) || empty($_POST["salario"]) || empty($_POST["tipo"]) || empty($_POST["cargo"]) || empty($_POST["estatus"]) || empty($_POST["usuario"]) || empty($_POST["rol"])) {

         $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
      } else {
         $nombre_empleado = strClean($_POST["nombreEmpleado"]);
         $apellido_empleado = strClean($_POST["apellido"]);
         $edad_empleado = intval($_POST["edad"]);
         $identidad_empleado = strClean($_POST["identidad"]);
         $nacimiento_empleado = strClean($_POST["nacimiento"]);
         $correo_empleado = strClean($_POST["correo"]);
         $genero_empleado = strClean($_POST["genero"]);
         $telefono_empleado = strClean($_POST["telefono"]);
         $direccion_empleado = strClean($_POST["direccion"]);
         $salario_empleado = intval($_POST["salario"]);
         $ingreso_empleado = strClean($_POST["ingreso"]);
         $cargo_empleado = intval($_POST["cargo"]);
         $salida_empleado = strClean($_POST["salida"]);
         $estatus_empleado = intval($_POST["estatus"]);
         $usuario_empleado = strClean($_POST["usuario"]);
         $rol_empleado = intval($_POST["rol"]);
         $password_empleado = empty($_POST['password']) ? hash("SHA256", passGenerator()) : hash("SHA256", $_POST['password']);
         $tipo_empleado = intval($_POST["tipo"]);

         $request = $this->model->InsertEmpleado($nombre_empleado, $apellido_empleado, $edad_empleado, $identidad_empleado, $nacimiento_empleado, $correo_empleado, $genero_empleado, $telefono_empleado, $direccion_empleado, $salario_empleado, $ingreso_empleado, $cargo_empleado,  $salida_empleado, $estatus_empleado, $usuario_empleado, $rol_empleado, $password_empleado, $tipo_empleado);


         if ($request > 0) {
            $arrResponse = array("status" => true, "msg" => 'Datos guardados correctamente.');
         } else if ($request == 'existenumerodeid') {
            $arrResponse = array("status" => false, "msg" => 'Número de identidad ya existe.');
         } else if ($request == 'existecorreo') {
            $arrResponse = array("status" => false, "msg" => 'Correo ya existe.');
         } else if ($request == 'existetelefono') {
            $arrResponse = array("status" => false, "msg" => 'Teléfono ya existe.');
         } else if ($request == 'existeusuario') {
            $arrResponse = array("status" => false, "msg" => 'Nombre de usuario ya existe.');
         } else {
            $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
         }
      }

      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);

      die();
   }

   public function getSelectCargo()
   {
      $htmlOptions = "";
      $arrData = $this->model->SelectCargo();

      /*  dep($arrData); */

      if (count($arrData) > 0) {
         for ($i = 0; $i < count($arrData); $i++) {

            $htmlOptions .= '<option value ="' . $arrData[$i]['id_cargo'] . '">' . $arrData[$i]['cargo'] . '</option>';
         }
      }
      echo $htmlOptions;
      die();
   }


   public function getSelectTipo_empleado()
   {
      $htmlOptions = "";
      $arrData = $this->model->SelectTipo_empleado();

      /*  dep($arrData); exit(); */

      if (count($arrData) > 0) {
         for ($i = 0; $i < count($arrData); $i++) {

            $htmlOptions .= '<option value ="' . $arrData[$i]['id_tip_empleado'] . '">' . $arrData[$i]['tipo_empleado'] . '</option>';
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


   public function getSelectPregunta()
   {
      $htmlOptions = "";
      $arrData = $this->model->SelectPregunta();

      /*  dep($arrData);  */

      if (count($arrData) > 0) {
         for ($i = 0; $i < count($arrData); $i++) {

            $htmlOptions .= '<option value ="' . $arrData[$i]['id_preg_seg'] . '">' . $arrData[$i]['preguntas'] . '</option>';
         }
      }
      echo $htmlOptions;
      die();
   }


   public function  getEmpleados()
   {

      $arrData = $this->model->selectEmpleados();

      /* dep( $arrData); exit(); */
      for ($i = 0; $i < count($arrData); $i++) {
         $btnEdit = '';
         $btnDel = '';

         $btnEdit = '<a class="dropdown-item btnEditEmpleados" href="' . Base_URL() . '/Empleados/updateEmpleado/' . $arrData[$i]['id_persona'] . '" ><i class="dw dw-edit2"></i> Editar</a>';
         $btnDel = '<a class="dropdown-item btnDelEmpleados" href="javascript:;" onClick="fntDelEmpleados(' . $arrData[$i]['id_persona'] . ')"><i class="dw dw-delete-3"></i> Eliminar</a>';

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

   public function updateEmpleado($params)
   {

      if (empty($params)) {
         header('location: ' . Base_URL() . '/Empleados/Tabla');
      } else {
         $arrData = explode(",", $params);
         $id_empleado = $arrData[0];
         $request = $this->model->SelectEmpleado($id_empleado);


         if (empty($request)) {
            header('location: ' . Base_URL() . '/Empleados/Tabla');
         }
      }

      $data['empleados'] = $request;
      $data['page_tag'] = "Empleados - Inversiones Picky";
      $data['page_title'] = "Empleados";
      $data['page_name'] = "Editar Empleados";
      $data['page_funtions_js'] = "funtions_empleados.js";
      $this->views->getView($this, "update_empleados", $data);
   }


   /*  update DATOS EMPLEADOS */
   public function setUpdateEmpleado()
   {
      /* dep($_POST); exit();  */

      if (empty($_POST["nombreEmpleado"]) || empty($_POST["identidad"]) || empty($_POST["nacimiento"]) || empty($_POST["correo"]) || empty($_POST["apellido"]) || empty($_POST["edad"]) || empty($_POST["genero"]) || empty($_POST["telefono"]) || empty($_POST["direccion"]) || empty($_POST["salario"]) || empty($_POST["tipo"]) || empty($_POST["cargo"]) || empty($_POST["estatus"])) {

         $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
      } else {
         $id_empleado = intval($_POST["id_empleado"]);
         $id_correo = intval($_POST["id_correo"]);
         $id_telefono = intval($_POST["id_telefono"]);
         $id_direccion = intval($_POST["id_direccion"]);
         $id_emple = intval($_POST["id_emple"]);
         $nombre_empleado = strClean($_POST["nombreEmpleado"]);
         $apellido_empleado = strClean($_POST["apellido"]);
         $edad_empleado = intval($_POST["edad"]);
         $identidad_empleado = strClean($_POST["identidad"]);
         $nacimiento_empleado = strClean($_POST["nacimiento"]);
         $correo_empleado = strClean($_POST["correo"]);
         $genero_empleado = strClean($_POST["genero"]);
         $telefono_empleado = strClean($_POST["telefono"]);
         $direccion_empleado = strClean($_POST["direccion"]);
         $salario_empleado = intval($_POST["salario"]);
         $ingreso_empleado = strClean($_POST["ingreso"]);
         $cargo_empleado = intval($_POST["cargo"]);
         $salida_empleado = strClean($_POST["salida"]);
         $estatus_empleado = intval($_POST["estatus"]);
         $tipo_empleado = intval($_POST["tipo"]);

         $request = $this->model->Update_Empleado($id_empleado, $id_correo, $id_telefono, $id_direccion, $id_emple, $nombre_empleado, $apellido_empleado, $edad_empleado, $identidad_empleado, $nacimiento_empleado, $correo_empleado, $genero_empleado, $telefono_empleado, $direccion_empleado, $salario_empleado, $ingreso_empleado, $cargo_empleado,  $salida_empleado, $estatus_empleado,  $tipo_empleado);


         if ($request > 0) {
            $arrResponse = array("status" => true, "msg" => 'Datos actualizados correctamente.');
         } else if ($request == 'existenumerodeid') {
            $arrResponse = array("status" => false, "msg" => 'Número de identidad ya existe.');
         } else if ($request == 'existecorreo') {
            $arrResponse = array("status" => false, "msg" => 'Correo ya existe.');
         } else if ($request == 'existetelefono') {
            $arrResponse = array("status" => false, "msg" => 'Teléfono ya existe.');
         } else {
            $arrResponse = array("status" => false, "msg" => 'No es posible actualizar los datos.');
         }
      }

      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);

      die();
   }

   /*  ELIMINAR EMPLEADO */
   public function eliminarEmpleado()
   {
      $id_empleado = intval($_POST['idUsuario']);
      $request = $this->model->Delete_Empleado($id_empleado);

      if ($request) {
         $arrResponse = array("status" => true, "msg" => 'Datos eliminados.');
      } else {
         $arrResponse = array("status" => false, "msg" => 'Datos no eliminados.');
      }

      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);

      die();
   }
}