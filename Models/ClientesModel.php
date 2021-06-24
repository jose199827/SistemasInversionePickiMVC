<?php

class ClientesModel extends Mysql
{

  public function __construct()
  {
    parent::__construct();
  }

  /*  INSERT DE CLIENTES */

  public function insertCliente($nombre_cliente, $apellido_cliente, $edad_cliente, $identidad_cliente, $nacimiento_cliente, $correo_cliente, $genero_cliente, $telefono_cliente, $tipo_cliente, $rtn_cliente, $nombre_empresa)
  {
    $Fecha_registro = date("Y-m-d H:i:s");
    $Usuario_registro = "MARIO";
    $return = "";

    $sql = "SELECT * FROM `personas` WHERE `num_id_persona` = '$identidad_cliente'";
    $request = $this->selectAll($sql);
    if (!empty($request)) {
      $return = "existenumerodeid";
    }

    $sql_correo = "SELECT * FROM `correos` WHERE `correo` = '$correo_cliente'";
    $request_correo = $this->selectAll($sql_correo);
    if (!empty($request_correo)) {
      $return = "existecorreo";
    }

    $sql_telefono = "SELECT * FROM `telefonos` WHERE `telefono` = '$telefono_cliente'";
    $request_telefono = $this->selectAll($sql_telefono);
    if (!empty($request_telefono)) {
      $return = "existetelefono";
    }

    $sql_Rtn = "SELECT * FROM `clientes` WHERE `rtn_empresa` = '$rtn_cliente'";
    $request_Rtn_empresa = $this->selectAll($sql_Rtn);
    if (!empty($request_Rtn_empresa)) {
      $return = "existertn";
    }

    if (empty($request) && empty($request_correo) && empty($request_telefono) && empty($request_Rtn_empresa)) {
      $sql_InsertCliente = "INSERT INTO `personas`( `num_id_persona`,`nom_persona`, `ape_persona`, `eda_persona`, `fec_na_persona`, `gen_persona`, `fec_registro`, `usr_registro`) 
      VALUES (?,?,?,?,?,?,?,?);
      SELECT @id_persona := MAX(id_persona) FROM `personas`;

      INSERT INTO `correos`(`correo`, `fec_registro`, `usr_registro`) 
      VALUES (?,?,?);
      SELECT @id_correo := MAX(id_correo) FROM `correos`;
      INSERT INTO `rel_correos_persona`(`id_correo`, `id_persona`) 
      VALUES (@id_correo,@id_persona);

      INSERT INTO `telefonos`(`telefono`, `fec_registro`, `usr_registro`)
      VALUES (?,?,?);
      SELECT @id_telefono := MAX(id_telefono) FROM `telefonos`;
      INSERT INTO `rel_telefonos_persona`(`id_telefono`, `id_persona`) 
      VALUES (@id_telefono,@id_persona);

      INSERT INTO `clientes`(`id_persona`, `rtn_empresa`, `nom_empresa`, `id_tip_cliente`, `fec_registro`, `usr_registro`)   
      VALUES (@id_persona,?,?,?,?,?);";

      $arrData = array(
        $identidad_cliente,
        $nombre_cliente,
        $apellido_cliente,
        $edad_cliente,
        $nacimiento_cliente,
        $genero_cliente,
        $Fecha_registro,
        $Usuario_registro,
        $correo_cliente,
        $Fecha_registro,
        $Usuario_registro,
        $telefono_cliente,
        $Fecha_registro,
        $Usuario_registro,
        $rtn_cliente,
        $nombre_empresa,
        $tipo_cliente,
        $Fecha_registro,
        $Usuario_registro
      );

      $requestInsertCL = $this->insert($sql_InsertCliente, $arrData);
      $return = $requestInsertCL;
    }
    return $return;
  }

  /* SELECT PARA CLIENTES*/
  public function SelectCliente($id_cliente)
  {
    $sql = "SELECT  p.id_persona,p.num_id_persona,p.nom_persona,p.ape_persona,p.eda_persona, p.fec_na_persona,p.gen_persona, rel_c.id_correo, c.correo,rel_t.id_telefono,t.telefono,cl.id_cliente, cl.rtn_empresa, cl.nom_empresa, tc.tip_cliente FROM personas p 
    INNER JOIN rel_correos_persona rel_c ON p.id_persona = rel_c.id_persona 
    INNER JOIN correos c ON c.id_correo = rel_c.id_correo 
    INNER JOIN rel_telefonos_persona rel_t on p.id_persona = rel_t.id_persona  
    INNER JOIN telefonos t ON t.id_telefono = rel_t.id_telefono 
    INNER JOIN clientes cl on p.id_persona = cl.id_persona 
    inner join tipo_clientes tc on cl.id_tip_cliente = tc.id_tip_cliente
    WHERE cl.id_cliente = $id_cliente";

    $request = $this->select($sql);
    return $request;
  } 


  /*UPDATE CLIENTE  */
  public function Update_Cliente($id_cliente, $id_correo, $id_telefono,$id_persona, $nombre_cliente, $apellido_cliente, $edad_cliente, $identidad_cliente, $nacimiento_cliente, $correo_cliente, $genero_cliente, $telefono_cliente, $tipo_cliente, $rtn_cliente, $nombre_empresa)
  {
    $Fecha_registro = date("Y-m-d H:i:s");
    $Usuario_registro = "MARIO";
    $return = "";
    $sql = "SELECT * FROM `personas` WHERE `num_id_persona` = '$identidad_cliente' and `id_persona` != $id_cliente";
    $request = $this->selectAll($sql);
    if (!empty($request)) {
      $return = "existenumerodeid";
    }

    $sql_correo = "SELECT * FROM `correos` WHERE `correo` = '$correo_cliente' and `id_correo` != $id_correo ";
    $request_correo = $this->selectAll($sql_correo);
    if (!empty($request_correo)) {
      $return = "existecorreo";
    }

    $sql_telefono = "SELECT * FROM `telefonos` WHERE `telefono` = '$telefono_cliente' and `id_telefono` != $id_telefono";
    $request_telefono = $this->selectAll($sql_telefono);
    if (!empty($request_telefono)) {
      $return = "existetelefono";
    }

    $sql_Rtn = "SELECT * FROM `clientes` WHERE `rtn_empresa` = '$rtn_cliente'";
    $request_Rtn_empresa = $this->selectAll($sql_Rtn);
    if (!empty($request_Rtn_empresa)) {
      $return = "existertn";
    }

    if (empty($request) && empty($request_correo) && empty($request_telefono) && empty($request_Rtn_empresa)) {
      $sql_InsertCliente = "UPDATE `personas` SET
      `num_id_persona`= ?,
      `nom_persona` = ?, 
      `ape_persona` = ?, 
      `eda_persona` = ?,
      `fec_na_persona` = ?,
      `gen_persona`= ?,
      `fec_registro` = ?, 
      `usr_registro`= ?
      WHERE `id_persona` = ?;
      
      UPDATE `correos` SET 
      `correo`= ?, 
      `fec_registro` = ?, 
      `usr_registro`= ?
       WHERE `id_correo` = ?;

    
     UPDATE `telefonos` SET
     `telefono`= ?, 
     `fec_registro` = ?, 
      `usr_registro`= ?
      WHERE `id_telefono`= ?;
    
     UPDATE `clientes` SET
     `rtn_empresa`= ?,
     `nom_empresa`= ?,
     `id_tip_cliente`= ?,
     `fec_registro` = ?, 
       `usr_registro`= ?
     WHERE `id_cliente`= ?";

      $arrData = array(

        $identidad_cliente,
        $nombre_cliente,
        $apellido_cliente,
        $edad_cliente,
        $nacimiento_cliente,
        $genero_cliente,
        $Fecha_registro,
        $Usuario_registro,
        $id_persona,
        $correo_cliente,
        $Fecha_registro,
        $Usuario_registro,
        $id_correo,
        $telefono_cliente,
        $Fecha_registro,
        $Usuario_registro,
        $id_telefono,
        $rtn_cliente,
        $nombre_empresa,
        $tipo_cliente,
        $Fecha_registro,
        $Usuario_registro,
        $id_cliente
      );

      $requestInsertCl = $this->update($sql_InsertCliente, $arrData);
      $return = $requestInsertCl;
    }
    return $return;
    } 

  /*DELETE EMPLEADO */
  public function Delete_Cliente($id_cliente)
  {
    $sql_DeleteCliente = "DELETE  p,rel_c,c,rel_t,t,rel_d,d,cl FROM personas p 
    left JOIN rel_correos_persona rel_c ON p.id_persona = rel_c.id_persona 
    left JOIN correos c ON c.id_correo = rel_c.id_correo 
    left JOIN rel_telefonos_persona rel_t on p.id_persona = rel_t.id_persona  
    left JOIN telefonos t ON t.id_telefono = rel_t.id_telefono 
    left JOIN rel_direcciones_persona rel_d on p.id_persona = rel_d.id_persona 
    left JOIN direcciones d on d.id_direccion = rel_d.id_direccion 
    left JOIN clientes cl on p.id_persona = cl.id_persona 
    WHERE cl.id_cliente = $id_cliente";

    $request = $this->delete($sql_DeleteCliente);
    return $request;
  }

  /*
  public function SelectCargo()
  {
    $sql = "SELECT * FROM `cargos`";
    $request = $this->selectAll($sql);
    return $request;
  }*/

  /*
  public function SelectTipo_empleado()
  {
    $sql = "SELECT * FROM `tipos_empleado`";
    $request = $this->selectAll($sql);
    return $request;
  } 

  public function SelectRol()
  {
    $sql = "SELECT * FROM `tipo_rol`";
    $request = $this->selectAll($sql);
    return $request;
  }

  public function SelectPregunta()
  {
    $sql = "SELECT * FROM `preguntas_seguridad`";
    $request = $this->selectAll($sql);
    return $request;
  } */

  public function selectClientes()
  {
    $sql = "SELECT `id_cliente`,`rtn_empresa`,p.nom_persona,p.ape_persona,  `nom_empresa`, tp.tip_cliente FROM `clientes` c
    INNER JOIN personas p ON c.id_persona = p.id_persona 
    INNER JOIN tipo_clientes tp ON c.id_tip_cliente = tp.id_tip_cliente";
    $request = $this->selectAll($sql);
    return $request;
  } 
}