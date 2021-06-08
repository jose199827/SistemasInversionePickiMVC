<?php
class ProveedoresModel extends Mysql
{

  public function __construct()
  {
    parent::__construct();
  }
  public function select_proveedores()
  {
    $consulta_proveedores="SELECT p.id_proveedor,`nom_empresa`, `con_empresa`, eb.nom_banco,`num_cuenta`,rel_t.id_proveedor, t.telefono FROM `proveedores` p 
     inner join entidad_banco eb on p.id_banco = eb.id_banco
     INNER JOIN rel_telefonos_proveedores rel_t on p.id_proveedor = rel_t.id_proveedor  
     INNER JOIN telefonos t ON t.id_telefono = rel_t.id_telefono";
    $resultado_proveedores=$this->selectAll($consulta_proveedores);
    return $resultado_proveedores;
  }
  public function SelectProveedores($id_proveedor)
  {
    $consulta_proveedores="SELECT  p.id_proveedor,p.rtn_empresa,p.nom_empresa,p.con_empresa,p.id_banco,eb.nom_banco, p.num_cuenta,p.nacionalidad, rel_c.id_correo, c.correo,rel_t.id_telefono,t.telefono,rel_d.id_direccion,d.direccion FROM proveedores p 
      INNER JOIN rel_correo_proveedores rel_c ON p.id_proveedor = rel_c.id_proveedor 
      INNER JOIN correos c ON c.id_correo = rel_c.id_correo 
      INNER JOIN rel_telefonos_proveedores rel_t on p.id_proveedor = rel_t.id_proveedor  
      INNER JOIN telefonos t ON t.id_telefono = rel_t.id_telefono 
      INNER JOIN rel_direcciones_proveedores rel_d on p.id_proveedor = rel_d.id_proveedor 
      INNER JOIN direcciones d on d.id_direccion = rel_d.id_direccion 
      inner join entidad_banco eb on p.id_banco = eb.id_banco
      WHERE p.id_proveedor = $id_proveedor";
    $resultado_proveedores=$this->select($consulta_proveedores);
    return $resultado_proveedores;
  }
  public function eliminarproveedor($eliminar_idproveedor)
  {
    $borrar_proveedores="DELETE p,rel_c, c,rel_t,t,rel_d,d FROM proveedores p 
      LEFT JOIN rel_correo_proveedores rel_c ON p.id_proveedor = rel_c.id_proveedor 
      LEFT JOIN correos c ON c.id_correo = rel_c.id_correo 
      LEFT JOIN rel_telefonos_proveedores rel_t on p.id_proveedor = rel_t.id_proveedor  
      LEFT JOIN telefonos t ON t.id_telefono = rel_t.id_telefono 
      LEFT JOIN rel_direcciones_proveedores rel_d on p.id_proveedor = rel_d.id_proveedor 
      LEFT JOIN direcciones d on d.id_direccion = rel_d.id_direccion
      WHERE p.id_proveedor = $eliminar_idproveedor";
      $eliminar_proveedores=$this->delete($borrar_proveedores);
    return $eliminar_proveedores;
  }
  public function getBancos ()
  {
    $bancos="SELECT * FROM `entidad_banco`";
    $resultado_bancos=$this->selectAll($bancos);
    return $resultado_bancos;
  } 
  public function setProveedores($conempresa,$nomempresa,$nacionalidad,$telefono,$rtnempresa,$direccion,$correo,$banco,$numcuenta)
  {
    $return="";
    $Fecha_registro = date("Y-m-d H:i:s");
    $Usuario_registro = "Root-Kevin";
    $vali_nombreempresa = "SELECT * FROM `proveedores` WHERE nom_empresa = '$nomempresa'";
    $resultado_vali_nombreempresa=$this->selectAll($vali_nombreempresa);
    if (!empty($resultado_vali_nombreempresa)) {
       $return="existeempresa";
    }
    $vali_telefono = "SELECT * FROM `telefonos` WHERE telefono = '$telefono'";
    $resultado_vali_telefono=$this->selectAll($vali_telefono);
    if (!empty($resultado_vali_telefono)) {
       $return="existeTelefono";
    }
    $vali_rtn = "SELECT * FROM `proveedores` WHERE rtn_empresa = '$rtnempresa'";
    $resultado_vali_rtn=$this->selectAll($vali_rtn);
    if (!empty($resultado_vali_rtn)) {
       $return="existeRTN";
    }
    $vali_correo = "SELECT * FROM `correos` WHERE correo = '$correo'";
    $resultado_vali_correo=$this->selectAll($vali_correo);
    if (!empty($resultado_vali_correo)) {
       $return="existeCorreo";
    }
    $vali_numcuenta = "SELECT * FROM `proveedores` WHERE num_cuenta = $numcuenta";
    $resultado_vali_numcuenta=$this->selectAll($vali_numcuenta);
    if (!empty($resultado_vali_numcuenta)) {
       $return="existeNumerodeCuenta";
    }
    if (empty($resultado_vali_nombreempresa)&&empty($resultado_vali_telefono)&&empty($resultado_vali_rtn)&&empty($resultado_vali_correo)&&empty($resultado_vali_numcuenta)) {
      $insertar_proveedor = "INSERT INTO `proveedores`(`rtn_empresa`, `nom_empresa`, `con_empresa`, `id_banco`, `num_cuenta`, `nacionalidad`, `fec_registro`, `usr_registro`) 
     VALUES (?,?,?,?,?,?,?,?);
     SELECT @id_proveedor:=MAX(id_proveedor) FROM `proveedores`; 

     INSERT INTO `correos`(`correo`, `fec_registro`, `usr_registro`) 
     VALUES (?,?,?);
     SELECT @id_correo := MAX(id_correo) FROM `correos`;
     INSERT INTO `rel_correo_proveedores`(`id_correo`, `id_proveedor`) 
     VALUES (@id_correo,@id_proveedor);

     INSERT INTO `telefonos`(`telefono`, `fec_registro`, `usr_registro`)
     VALUES (?,?,?);
     SELECT @id_telefono := MAX(id_telefono) FROM `telefonos`;
     INSERT INTO `rel_telefonos_proveedores`(`id_telefono`, `id_proveedor`) 
     VALUES (@id_telefono,@id_proveedor);

     INSERT INTO `direcciones`(`direccion`, `fec_registro`, `usr_registro`) 
     VALUES (?,?,?);
     SELECT @id_direccion := MAX(id_direccion) FROM `direcciones`;
     INSERT INTO `rel_direcciones_proveedores`(`id_direccion`, `id_proveedor`) 
     VALUES (@id_direccion,@id_proveedor);";
     $arrdata=array($rtnempresa,$nomempresa,$conempresa,$banco,$numcuenta,$nacionalidad,$Fecha_registro,$Usuario_registro,$correo,$Fecha_registro,$Usuario_registro,$telefono,$Fecha_registro,$Usuario_registro,$direccion,$Fecha_registro,$Usuario_registro);
     $eje_insertarproveedor=$this->insert($insertar_proveedor,$arrdata);
     $return=$eje_insertarproveedor;
    }
    return $return;

  } 
  public function updateProveedores($id_proveedor,$id_telefono,$id_correo,$id_direccion,$conempresa,$nomempresa,$nacionalidad,$telefono,$rtnempresa,$direccion,$correo,$banco,$numcuenta)
  {
    $return="";
    $Fecha_registro = date("Y-m-d H:i:s");
    $Usuario_registro = "Root-Kevin";
    $vali_nombreempresa = "SELECT * FROM `proveedores` WHERE nom_empresa = '$nomempresa' AND id_proveedor != $id_proveedor ";
    $resultado_vali_nombreempresa=$this->selectAll($vali_nombreempresa);
    if (!empty($resultado_vali_nombreempresa)) {
       $return="existeempresa";
    }
    $vali_telefono = "SELECT * FROM `telefonos` WHERE telefono = '$telefono' AND id_telefono != $id_telefono";
    $resultado_vali_telefono=$this->selectAll($vali_telefono);
    if (!empty($resultado_vali_telefono)) {
       $return="existeTelefono";
    }
    $vali_rtn = "SELECT * FROM `proveedores` WHERE rtn_empresa = '$rtnempresa' AND id_proveedor != $id_proveedor ";
    $resultado_vali_rtn=$this->selectAll($vali_rtn);
    if (!empty($resultado_vali_rtn)) {
       $return="existeRTN";
    }
    $vali_correo = "SELECT * FROM `correos` WHERE correo = '$correo' AND id_correo != $id_correo";
    $resultado_vali_correo=$this->selectAll($vali_correo);
    if (!empty($resultado_vali_correo)) {
       $return="existeCorreo";
    }
    $vali_numcuenta = "SELECT * FROM `proveedores` WHERE num_cuenta = $numcuenta AND id_proveedor != $id_proveedor ";
    $resultado_vali_numcuenta=$this->selectAll($vali_numcuenta);
    if (!empty($resultado_vali_numcuenta)) {
       $return="existeNumerodeCuenta";
    }
    if (empty($resultado_vali_nombreempresa)&&empty($resultado_vali_telefono)&&empty($resultado_vali_rtn)&&empty($resultado_vali_correo)&&empty($resultado_vali_numcuenta)) {
      $actualizar_proveedor = "UPDATE `proveedores` SET 
    `rtn_empresa`=?,
    `nom_empresa`=?,
    `con_empresa`=?,
    `id_banco`=?,
    `num_cuenta`=?,
    `nacionalidad`=?,
    `fec_Registro`=?,
    `usr_Registro`=?
     WHERE `id_proveedor`=?;
    UPDATE `correos` SET 
      `correo`= ?, 
      `fec_registro` = ?, 
      `usr_registro`= ?
       WHERE `id_correo` = ?;
     UPDATE `telefonos` SET
     `telefono`= ?, 
     `fec_registro` = ?, 
      `usr_registro`= ?
      WHERE `id_telefono`=?;
  
     UPDATE `direcciones` SET
     `direccion`= ?,
     `fec_registro` = ?, 
      `usr_registro`= ?
     WHERE `id_direccion`= ?;";
     $arrdata=array($rtnempresa,$nomempresa,$conempresa,$banco,$numcuenta,$nacionalidad,$Fecha_registro,$Usuario_registro,$id_proveedor,$correo,$Fecha_registro,$Usuario_registro,$id_correo,$telefono,$Fecha_registro,$Usuario_registro,$id_telefono,$direccion,$Fecha_registro,$Usuario_registro,$id_direccion);
     $eje_actproveedor=$this->update($actualizar_proveedor,$arrdata);
     $return=$eje_actproveedor;
    }
    return $return;

  } 
}
 ?>