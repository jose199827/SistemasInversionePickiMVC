<?php

class FacturacionModel extends Mysql
{

   public function __construct()
   {
      parent::__construct();
   }
   public function selectFacturas()
   {
      $sql = "SELECT * FROM `factura` ";
      $request = $this->selectAll($sql);
      return $request;
   }
}