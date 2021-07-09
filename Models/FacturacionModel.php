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
   public function getCliente($id)
   {
      $sql = "SELECT p.id_persona,p.num_id_persona, p.nom_persona,p.ape_persona, te.telefono, di.direccion FROM personas p INNER JOIN clientes c ON p.id_persona=c.id_persona INNER JOIN rel_telefonos_persona relt on relt.id_persona= p.id_persona INNER JOIN telefonos te on te.id_telefono= relt.id_telefono INNER JOIN rel_direcciones_persona reld on reld.id_persona= p.id_persona INNER JOIN direcciones di on di.id_direccion= reld.id_direccion WHERE p.num_id_persona like '%$id%'";
      $request = $this->select($sql);
      return $request;
   }
   public function getProducto($id)
   {
      $sql = "SELECT * from productos p INNER JOIN inventarios i ON i.id_producto= p.id_producto WHERE p.id_producto= $id";
      $request = $this->select($sql);
      return $request;
   }
   public function setProducto($id)
   {
      $sql = "SELECT * from productos p INNER JOIN inventarios i ON i.id_producto= p.id_producto WHERE p.id_producto= $id";
      $request = $this->select($sql);
      return $request;
   }
   public function getImpuesto($id)
   {
      $sql = "SELECT p.id_tip_impuesto, t.porcentaje, t.nom_isv FROM productos p INNER JOIN tipos_impuestos t ON p.id_tip_impuesto= t.id_tip_impuestos WHERE p.id_producto= $id";
      $request = $this->select($sql);
      return $request;
   }
   public function getDatelle($id, $cantidad, $token, $descuento)
   {
      $sql = "CALL add_detalle_factura_temp($id,$cantidad,'$token',$descuento)";
      $request = $this->selectAll($sql);
      return $request;
   }
   public function deleteFactura($token)
   {
      $sql = "DELETE FROM `detalle_factura_temp` WHERE `detalle_factura_temp`.`token_user` = '$token';";
      $request = $this->delete($sql);
      return $request;
   }
   public function getFactura($codcliente)
   {
   }
   public function getDetalle_Temp($token)
   {
      $sql = "SELECT * FROM detalle_factura_temp WHERE  token_user='$token';";
      $request = $this->selectAll($sql);
      return $request;
   }
   public function getProcesar($idUser, $codcliente, $token)
   {
      $sql = "CALL 	procesar_venta($idUser,$codcliente,'$token')";
      $request = $this->selectAll($sql);
      return $request;
   }
}