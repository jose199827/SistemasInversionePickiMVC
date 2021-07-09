<?php

class Clientes extends Controllers
{
   public function __construct()
   {
      parent::__construct();
      session_start();
      //session_regenerate_id(true);
      if (empty($_SESSION['login'])) {
         header('location: ' . Base_URL() . '/login');
      }
      getPermisos(5);
   }

   public function clientes()
   {
      $data['page_tag'] = "Clientes - Inversiones Picky";
      $data['page_title'] = "CLIENTES";
      $data['page_name'] = "REGISTRAR CLIENTE";
      $data['page_funtions_js'] = "functions_clientes.js";
      $this->views->getView($this, "clientes", $data);
   }

   public function tabla()
   {
      $data['page_tag'] = "Clientes - Inversiones Picky";
      $data['page_title'] = "Clientes";
      $data['page_name'] = "Tabla de Clientes";
      $data['page_funtions_js'] = "functions_clientes.js";
      $this->views->getView($this, "lista_clientes", $data);
   }

   public function updateCliente($params)
   {
      if (empty($params)) {
         header('location: ' . Base_URL() . '/Clientes/Tabla');
      } else {
         $arrData = explode(",", $params);
         $id_cliente = $arrData[0];
         $request = $this->model->SelectCliente($id_cliente);
         if (empty($request)) {
            header('location: ' . Base_URL() . '/Clientes/Tabla');
         }
      }
      /* dep($request); */
      $data['clientes'] = $request;
      $data['page_tag'] = "Clientes - Inversiones Picky";
      $data['page_title'] = "CLIENTES";
      $data['page_name'] = "EDITAR CLIENTES";
      $data['page_funtions_js'] = "functions_clientes.js";
      $this->views->getView($this, "update_clientes", $data);
   }


   /*  INSERT DATOS CLIENTES */
   public function setCliente()
   {


      if (empty($_POST["nomper"]) || empty($_POST["idnum"]) || empty($_POST["fecnac"]) || empty($_POST["correo"]) || empty($_POST["apeper"]) || empty($_POST["edad"]) || empty($_POST["gene"]) || empty($_POST["telefono"]) || empty($_POST["tipo"]) || empty($_POST["rtn"]) || empty($_POST["nomempre"])) {

         $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
      } else {
         $identidad_cliente = strClean($_POST["idnum"]);
         $nombre_cliente = strClean($_POST["nomper"]);
         $apellido_cliente = strClean($_POST["apeper"]);
         $edad_cliente = intval($_POST["edad"]);
         $nacimiento_cliente = strClean($_POST["fecnac"]);
         $genero_cliente = strClean($_POST["gene"]);
         $correo_cliente = strClean($_POST["correo"]);
         $telefono_cliente = strClean($_POST["telefono"]);
         $tipo_cliente = intval($_POST["tipo"]);
         $rtn_cliente = strClean($_POST["rtn"]);
         $nombre_empresa = strClean($_POST["nomempre"]);

         $request = $this->model->insertCliente($nombre_cliente, $apellido_cliente, $edad_cliente, $identidad_cliente, $nacimiento_cliente, $correo_cliente, $genero_cliente, $telefono_cliente, $tipo_cliente, $rtn_cliente, $nombre_empresa);
         /*dep($request); exit(); */

         if ($request > 0) {
            $arrResponse = array("status" => true, "msg" => 'Datos guardados correctamente.');
         } else if ($request == 'existenumerodeid') {
            $arrResponse = array("status" => false, "msg" => 'Número de identidad ya existe.');
         } else if ($request == 'existecorreo') {
            $arrResponse = array("status" => false, "msg" => 'Correo ya existe.');
         } else if ($request == 'existetelefono') {
            $arrResponse = array("status" => false, "msg" => 'Teléfono ya existe.');
         } else if ($request == 'existertn') {
            $arrResponse = array("status" => false, "msg" => 'RTN ya existe.');
         } else {
            $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
         }
      }

      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);

      die();
   }

   public function setUpdateCliente()
   {
      /*dep($_POST); exit(); */

      if (empty($_POST["nomper"]) || empty($_POST["idnum"]) || empty($_POST["fecnac"]) || empty($_POST["correo"]) || empty($_POST["apeper"]) || empty($_POST["edad"]) || empty($_POST["gene"]) || empty($_POST["telefono"]) || empty($_POST["tipo"]) || empty($_POST["rtn"]) || empty($_POST["nomempre"])) {

         $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
      } else {
         $id_cliente = intval($_POST["id_cliente"]);
         $id_persona = intval($_POST["id_persona"]);
         $id_correo = intval($_POST["id_correo"]);
         $id_telefono = intval($_POST["id_telefono"]);
         $identidad_cliente = strClean($_POST["idnum"]);
         $nombre_cliente = strClean($_POST["nomper"]);
         $apellido_cliente = strClean($_POST["apeper"]);
         $edad_cliente = intval($_POST["edad"]);
         $nacimiento_cliente = strClean($_POST["fecnac"]);
         $genero_cliente = strClean($_POST["gene"]);
         $correo_cliente = strClean($_POST["correo"]);
         $telefono_cliente = strClean($_POST["telefono"]);
         $tipo_cliente = intval($_POST["tipo"]);
         $rtn_cliente = strClean($_POST["rtn"]);
         $nombre_empresa = strClean($_POST["nomempre"]);

         $request = $this->model->Update_Cliente($id_cliente, $id_correo, $id_telefono, $id_persona, $nombre_cliente, $apellido_cliente, $edad_cliente, $identidad_cliente, $nacimiento_cliente, $correo_cliente, $genero_cliente, $telefono_cliente, $tipo_cliente, $rtn_cliente, $nombre_empresa);


         if ($request > 0) {
            $arrResponse = array("status" => true, "msg" => 'Datos guardados correctamente.');
         } else if ($request == 'existenumerodeid') {
            $arrResponse = array("status" => false, "msg" => 'Número de identidad ya existe.');
         } else if ($request == 'existecorreo') {
            $arrResponse = array("status" => false, "msg" => 'Correo ya existe.');
         } else if ($request == 'existetelefono') {
            $arrResponse = array("status" => false, "msg" => 'Teléfono ya existe.');
         } else if ($request == 'existertn') {
            $arrResponse = array("status" => false, "msg" => 'RTN ya existe.');
         } else {
            $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
         }
      }

      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);

      die();
   }

   public function getClientes()
   {
      $arrData = $this->model->selectClientes();

      /* dep( $arrData); exit();*/
      for ($i = 0; $i < count($arrData); $i++) {
         $arrData[$i]['numRegistro'] = $i + 1;
         $arrData[$i]['nom_persona'] =  $arrData[$i]['nom_persona'] . ' ' . $arrData[$i]['ape_persona'];
         $btnEdit = '';
         $btnDel = '';
         if ($_SESSION['permisosMod']['u']) {
            $btnEdit = '<a class="dropdown-item btnEditClientes" href="' . Base_URL() . '/Clientes/updateCliente/' . $arrData[$i]['id_cliente'] . '" ><i class="dw dw-edit2"></i> Editar</a>';
         }
         if ($_SESSION['permisosMod']['d']) {
            $btnDel = '<a class="dropdown-item btnDelClientes" href="javascript:;" onClick="fntDelClientes(' . $arrData[$i]['id_cliente'] . ')"><i class="dw dw-delete-3"></i> Eliminar</a>';
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

   public function eliminarClientes()
   {
      $id_cliente = intval($_POST['idUsuario']);
      $request = $this->model->Delete_Cliente($id_cliente);
      if ($request) {
         $arrResponse = array("status" => true, "msg" => 'Datos eliminados.');
      } else {
         $arrResponse = array("status" => false, "msg" => 'Datos no eliminados.');
      }
      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
      die();
   }
}
