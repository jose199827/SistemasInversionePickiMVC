<?php

class Configuracion extends Controllers
{
   public function __construct()
   {
      parent::__construct();
   }
   public function configuracion()
   {
      $data['page_tag'] = "Configuración de Productos - Inversiones Picky";
      $data['page_title'] = "Configuración de Producto";
      $data['page_name'] = "Configuración de Producto";
      $data['page_funtions_js'] = "funtions_login.js";
      $this->views->getView($this, "configuracion", $data);
   }
   public function Empleados()
   {
      $data['page_tag'] = "Configuración Empleados - Inversiones Picky";
      $data['page_title'] = "Configuración Empleados";
      $data['page_name'] = "Configuración Empleados";
      $data['page_funtions_js'] = "funtions_login.js";
      $this->views->getView($this, "configuracionEmpleados", $data);
   }
   public function Facturacion()
   {
      $data['page_tag'] = "Configuración Facturación - Inversiones Picky";
      $data['page_title'] = "Configuración Facturación";
      $data['page_name'] = "Configuración Facturación";
      $data['page_funtions_js'] = "funtions_login.js";
      $this->views->getView($this, "configuracionFacturacion", $data);
   }
   public function Empresa()
   {
      $data['page_tag'] = "Configuración Empresa - Inversiones Picky";
      $data['page_title'] = "Configuración Empresa";
      $data['page_name'] = "Configuración Empresa";
      $data['page_funtions_js'] = "funtions_login.js";
      $this->views->getView($this, "configuracionEmpresa", $data);
   }
}
