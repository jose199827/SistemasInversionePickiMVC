<?php
class Facturacion extends Controllers
{
   public function __construct()
   {
      parent::__construct();
      session_start();
      //session_regenerate_id(true);
      if (empty($_SESSION['login'])) {
         header('location: ' . Base_URL() . '/login');
      }
      getPermisos(2);
   }
   //Se crea el método 
   public function Facturacion()
   {
      $data['page_tag'] = "Facturación - Inversiones Picky";
      $data['page_title'] = "Facturación";
      $data['page_name'] = "Registrar Facturación";
      $data['page_funtions_js'] = "funtions_facturacion.js";
      $this->views->getView($this, "facturacion", $data);
   }
   public function Tabla()
   {
      $data['page_tag'] = "Tabla de Facturación - Inversiones Picky";
      $data['page_title'] = "Tabla";
      $data['page_name'] = "Tabla de Facturación";
      $data['page_funtions_js'] = "funtions_facturacion.js";
      $this->views->getView($this, "tabla", $data);
   }
   public function getFacturas()
   {
      $arrData = $this->model->selectFacturas();
      /*   dep($arrData);
      exit(); */
      for ($i = 0; $i < count($arrData); $i++) {
         $btnEdit = '';
         $btnDel = '';
         if ($_SESSION['permisosMod']['u']) {
            $btnEdit = '<a class="dropdown-item btnEditEmpleados" href="' . Base_URL() . '/Empleados/updateEmpleado/' . $arrData[$i]['id_factura'] . '" ><i class="dw dw-edit2"></i> Editar</a>';
         }
         if ($_SESSION['permisosMod']['d']) {
            $btnDel = '<a class="dropdown-item btnDelEmpleados" href="javascript:;" onClick="fntDelEmpleados(' . $arrData[$i][' 	id_factura'] . ')"><i class="dw dw-delete-3"></i> Eliminar</a>';
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
}