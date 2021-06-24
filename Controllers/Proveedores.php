<?php
class Proveedores extends Controllers
{
   public function __construct()
   {
      parent::__construct();
      session_start();
      //session_regenerate_id(true);
      if (empty($_SESSION['login'])) {
         header('location: ' . Base_URL() . '/login');
      }
      getPermisos(4);
   }
   public function proveedores()
   {
      $data['page_tag'] = "Proveedores - Inversiones Picky";
      $data['page_title'] = "Proveedores";
      $data['page_name'] = "Registrar Proveedores";
      $data['page_funtions_js'] = "funtions_proveedor.js";
      $this->views->getView($this, "proveedores", $data);
   }
   public function Tabla()
   {
      $data['page_tag'] = "Proveedores - Inversiones Picky";
      $data['page_title'] = "Proveedores";
      $data['page_name'] = "Tabla de Proveedores";
      $data['page_funtions_js'] = "funtions_proveedor.js";
      $this->views->getView($this, "lista_proveedores", $data);
   }
   public function getProveedores()
   {
      $arrData = $this->model->select_proveedores();
      /*dep($arrData);exit();*/
      for ($i = 0; $i < count($arrData); $i++) {
         $arrData[$i]['numRegistro'] = $i + 1;
         $btnEdit = '';

         $btnDel = '';
         if ($_SESSION['permisosMod']['u']) {
            $btnEdit = '<a class="dropdown-item btnEditProveedores" href="' . Base_URL() . '/Proveedores/updateProveedores/' . $arrData[$i]['id_proveedor'] . '" ><i class="dw dw-edit2"></i> Editar</a>';
         }
         if ($_SESSION['permisosMod']['d']) {
            $btnDel = '<a class="dropdown-item btnDelProveedores" href="javascript:;" onClick="fntDelProveedores(' . $arrData[$i]['id_proveedor'] . ')"><i class="dw dw-delete-3"></i> Eliminar</a>';
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
   public function eliminarProveedor()
   {
      $eliminar_idproveedor = intval($_POST['idproveedor']);
      $resultado_eliminar = $this->model->eliminarproveedor($eliminar_idproveedor);
      if ($resultado_eliminar) {
         $arrResponse = array("status" => true, "msg" => 'Datos eliminados.');
      } else {
         $arrResponse = array("status" => false, "msg" => 'Datos no eliminados.');
      }
      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
      die();
   }
   public function setProveedores()
   {
      /*dep($_POST);
     exit();*/
      if (empty($_POST['conempresa']) || empty($_POST['nomempresa']) || empty($_POST['nacionalidad']) || empty($_POST['telefono']) || empty($_POST['rtnempresa']) || empty($_POST['direccion']) || empty($_POST['correo']) || empty($_POST['banco']) || empty($_POST['numcuenta'])) {

         $arrResponse = array("status" => false, "msg" => 'Por favor rellenar todos los campos.');
      } else {
         $conempresa = strClean($_POST['conempresa']);
         $nomempresa = strClean($_POST['nomempresa']);
         $nacionalidad = strClean($_POST['nacionalidad']);
         $telefono = intval($_POST['telefono']);
         $rtnempresa = intval($_POST['rtnempresa']);
         $direccion = strClean($_POST['direccion']);
         $correo = strClean($_POST['correo']);
         $banco = intval($_POST['banco']);
         $numcuenta = intval($_POST['numcuenta']);
         $proveedores_insertar = $this->model->setProveedores($conempresa, $nomempresa, $nacionalidad, $telefono, $rtnempresa, $direccion, $correo, $banco, $numcuenta);
         if ($proveedores_insertar > 0) {
            $arrResponse = array("status" => true, "msg" => 'Datos Guardados correctamente.');
         } elseif ($proveedores_insertar == 'existeempresa') {
            $arrResponse = array("status" => false, "msg" => 'Empresa Existente.');
         } elseif ($proveedores_insertar == 'existeTelefono') {
            $arrResponse = array("status" => false, "msg" => 'Telefono Existente.');
         } elseif ($proveedores_insertar == 'existeRTN') {
            $arrResponse = array("status" => false, "msg" => 'RTN Existente.');
         } elseif ($proveedores_insertar == 'existeCorreo') {
            $arrResponse = array("status" => false, "msg" => 'Correo Existente.');
         } elseif ($proveedores_insertar == 'existeNumerodeCuenta') {
            $arrResponse = array("status" => false, "msg" => 'Numero de Cuenta Existente.');
         } else {
            $arrResponse = array("status" => false, "msg" => 'No se guardaron los datos.');
         }
      }
      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
      die();
   }
   public function getBancos()
   {
      $bancos = "";
      $info_bancos = $this->model->getBancos();
      if (count($info_bancos) > 0) {
         for ($i = 0; $i < count($info_bancos); $i++) {
            $bancos .= '<option value = " ' . $info_bancos[$i]['id_banco'] . ' ">' . $info_bancos[$i]['nom_banco'] . '</option>';
         }
      }
      echo $bancos;
      die();
   }
   public function updateProveedores($params)
   {
      if (empty($params)) {
         header('location: ' . Base_URL() . '/Proveedores/Tabla');
      } else {
         $arrData = explode(",", $params);
         $id_proveedor = $arrData[0];
         $request = $this->model->SelectProveedores($id_proveedor);
         if (empty($request)) {
            header('location: ' . Base_URL() . '/Proveedores/Tabla');
         }
      }
      $data['proveedores'] = $request;
      $data['page_tag'] = "Proveedores - Inversiones Picky";
      $data['page_title'] = "Proveedores";
      $data['page_name'] = "Editar Proveedores";
      $data['page_funtions_js'] = "funtions_proveedor.js";
      $this->views->getView($this, "updateProveedores", $data);
   }
   public function actualizarProveedores()
   {
      if (empty($_POST['conempresa']) || empty($_POST['nomempresa']) || empty($_POST['nacionalidad']) || empty($_POST['telefono']) || empty($_POST['rtnempresa']) || empty($_POST['direccion']) || empty($_POST['correo']) || empty($_POST['banco']) || empty($_POST['numcuenta'])) {

         $arrResponse = array("status" => false, "msg" => 'Por favor rellenar todos los campos.');
      } else {
         $id_proveedor = intval($_POST['id_proveedor']);
         $id_telefono = intval($_POST['id_telefono']);
         $id_correo = intval($_POST['id_correo']);
         $id_direccion = intval($_POST['id_direccion']);
         $conempresa = strClean($_POST['conempresa']);
         $nomempresa = strClean($_POST['nomempresa']);
         $nacionalidad = strClean($_POST['nacionalidad']);
         $telefono = intval($_POST['telefono']);
         $rtnempresa = intval($_POST['rtnempresa']);
         $direccion = strClean($_POST['direccion']);
         $correo = strClean($_POST['correo']);
         $banco = intval($_POST['banco']);
         $numcuenta = intval($_POST['numcuenta']);
         $proveedores_insertar = $this->model->updateProveedores($id_proveedor, $id_telefono, $id_correo, $id_direccion, $conempresa, $nomempresa, $nacionalidad, $telefono, $rtnempresa, $direccion, $correo, $banco, $numcuenta);
         if ($proveedores_insertar > 0) {
            $arrResponse = array("status" => true, "msg" => 'Datos Actualizados correctamente.');
         } elseif ($proveedores_insertar == 'existeempresa') {
            $arrResponse = array("status" => false, "msg" => 'Empresa Existente.');
         } elseif ($proveedores_insertar == 'existeTelefono') {
            $arrResponse = array("status" => false, "msg" => 'Telefono Existente.');
         } elseif ($proveedores_insertar == 'existeRTN') {
            $arrResponse = array("status" => false, "msg" => 'RTN Existente.');
         } elseif ($proveedores_insertar == 'existeCorreo') {
            $arrResponse = array("status" => false, "msg" => 'Correo Existente.');
         } elseif ($proveedores_insertar == 'existeNumerodeCuenta') {
            $arrResponse = array("status" => false, "msg" => 'Numero de Cuenta Existente.');
         } else {
            $arrResponse = array("status" => false, "msg" => 'No se guardaron los datos.');
         }
      }
      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
      die();
   }
}
