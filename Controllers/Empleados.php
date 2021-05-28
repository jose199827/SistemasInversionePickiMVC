<?php

class Configuracion extends Controllers
{
   public function __construct()
   {
      parent::__construct();
   }

   public function configuracion()
   {
      $data['page_tag'] = "Empleados - Inversiones Picky";
      $data['page_title'] = "Empleados";
      $data['page_name'] = "Lista de Empleados";
      $data['page_funtions_js'] = "funtions_login.js";
      $this->views->getView($this, "configuracion", $data);
   }
}
