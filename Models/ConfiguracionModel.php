<?php
/* require_once("CategoriasModel.php"); */
//Se crea la clase homeModel
class ConfiguracionModel extends Mysql
{

  public function __construct()
  {
    parent::__construct();
    /*     $this->objCategoria = new CategoriasModel(); */
  }
  public function selectMarcas()
  {
    $sql = "SELECT * FROM `marcas`";
    $request = $this->selectAll($sql);
    return $request;
  }
  public function selectCategorias()
  {
    $sql = "SELECT * FROM `categorias`";
    $request = $this->selectAll($sql);
    return $request;
  }
  public function selectGrupos()
  {
    $sql = "SELECT * FROM `grupos`";
    $request = $this->selectAll($sql);
    return $request;
  }
  public function selectUnidades()
  {
    $sql = "SELECT * FROM `unidades_medidas`";
    $request = $this->selectAll($sql);
    return $request;
  }
  public function selectImpuestos()
  {
    $sql = "SELECT * FROM `tipos_impuestos`";
    $request = $this->selectAll($sql);
    return $request;
  }
  public function selectCargos()
  {
    $sql = "SELECT * FROM `cargos`";
    $request = $this->selectAll($sql);
    return $request;
  }
  public function selectEmpleados()
  {
    $sql = "SELECT * FROM `tipos_empleado`";
    $request = $this->selectAll($sql);
    return $request;
  }
  public function selectRol()
  {
    $sql = "SELECT * FROM `tipo_rol`";
    $request = $this->selectAll($sql);
    return $request;
  }
  public function selectFacturacion()
  {
    $sql = "SELECT * FROM `regimen_facturacion`";
    $request = $this->selectAll($sql);
    return $request;
  }

  public function selectEmpresas()
  {
    $sql = "SELECT * FROM `empresas`";
    $request = $this->selectAll($sql);
    return $request;
  }

  public function selectBitacora()
  {
    $sql = "SELECT * FROM `bitacora`";
    $request = $this->selectAll($sql);
    return $request;
  }

  public function insertMarcas($InsertaMarcas)
  {
    $return = "";
    $Fecha = date("Y-m-d H:i:s");
    $sql = "SELECT * FROM `marcas` WHERE marca ='$InsertaMarcas'";
    $request = $this->selectAll($sql);
    if (empty($request)) {
      $sqlInsertMarca = "INSERT INTO `marcas`
    (
    `marca`, 
   `fec_registro`, 
   `usr_registro`)
     VALUES (?,?,?);";

      $array = array($InsertaMarcas, $Fecha, 'Franklin');
      $requestInsert = $this->insert($sqlInsertMarca, $array);
      $return = $requestInsert;
    } else {
      $return = "exist";
    }
    return $return;
  }
  public function insertCategorias($InsertaCategorias)
  {
    $return = "";
    $Fecha = date("Y-m-d H:i:s");
    $sql = "SELECT * FROM `categorias` WHERE categoria ='$InsertaCategorias'";
    $request = $this->selectAll($sql);
    if (empty($request)) {
      $sqlInsertCategorias = "INSERT INTO `categorias`
    (
    `categoria`, 
   `fec_registro`, 
   `usr_registro`)
     VALUES (?,?,?);";

      $array = array($InsertaCategorias, $Fecha, 'Franklin');
      $requestInsert = $this->insert($sqlInsertCategorias, $array);
      $return = $requestInsert;
    } else {
      $return = "exist";
    }
    return $return;
  }
  public function insertGrupos($InsertaGrupos)
  {
    $return = "";
    $Fecha = date("Y-m-d H:i:s");
    $sql = "SELECT * FROM `grupos` WHERE grupo ='$InsertaGrupos'";
    $request = $this->selectAll($sql);
    if (empty($request)) {
      $sqlInsertGrupos = "INSERT INTO `grupos`
    (
    `grupo`, 
   `fec_registro`, 
   `usr_registro`)
     VALUES (?,?,?);";

      $array = array($InsertaGrupos, $Fecha, 'Franklin');
      $requestInsert = $this->insert($sqlInsertGrupos, $array);
      $return = $requestInsert;
    } else {
      $return = "exist";
    }
    return $return;
  }
  public function insertUnidades($InsertaUnidades)
  {
    $return = "";
    $Fecha = date("Y-m-d H:i:s");
    $sql = "SELECT * FROM `unidades_medidas` WHERE uni_medida ='$InsertaUnidades'";
    $request = $this->selectAll($sql);
    if (empty($request)) {
      $sqlInsertUnidades = "INSERT INTO `unidades_medidas`
    (
    `uni_medida`, 
   `fec_registro`, 
   `usr_registro`)
     VALUES (?,?,?);";

      $array = array($InsertaUnidades, $Fecha, 'Franklin');
      $requestInsert = $this->insert($sqlInsertUnidades, $array);
      $return = $requestInsert;
    } else {
      $return = "exist";
    }
    return $return;
  }

  public function insertImpuestos($InsertaImpuestos, $InsertaImpuestosP)
  {
    $return = "";
    $Fecha = date("Y-m-d H:i:s");
    $sql = "SELECT * FROM `tipos_impuestos` WHERE nom_isv ='$InsertaImpuestos' and `porcentaje`= '$InsertaImpuestosP'";
    $request = $this->selectAll($sql);
    if (empty($request)) {
      $sqlInsertImpuestos = "INSERT INTO `tipos_impuestos`
    (
    `nom_isv`, 
    `porcentaje`,
   `fec_registro`, 
   `usr_registro`)
     VALUES (?,?,?,?);";

      $array = array($InsertaImpuestos, $InsertaImpuestosP, $Fecha, 'Franklin');
      $requestInsert = $this->insert($sqlInsertImpuestos, $array);
      $return = $requestInsert;
    } else {
      $return = "exist";
    }
    return $return;
  }

  public function insertCargos($InsertaCargos)
  {
    $return = "";
    $Fecha = date("Y-m-d H:i:s");
    $sql = "SELECT * FROM `cargos` WHERE cargo ='$InsertaCargos'";
    $request = $this->selectAll($sql);
    if (empty($request)) {
      $sqlInsertCargos = "INSERT INTO `cargos`
    (
    `cargo`, 
   `fec_registro`, 
   `usr_registro`)
     VALUES (?,?,?);";

      $array = array($InsertaCargos, $Fecha, 'Franklin');
      $requestInsert = $this->insert($sqlInsertCargos, $array);
      $return = $requestInsert;
    } else {
      $return = "exist";
    }
    return $return;
  }
  public function insertEmpleados($InsertaEmpleados)
  {
    $return = "";
    $Fecha = date("Y-m-d H:i:s");
    $sql = "SELECT * FROM `tipos_empleado` WHERE tipo_empleado ='$InsertaEmpleados'";
    $request = $this->selectAll($sql);
    if (empty($request)) {
      $sqlInsertEmpleados = "INSERT INTO `tipos_empleado`
    (
    `tipo_empleado`, 
   `fec_registro`, 
   `usr_registro`)
     VALUES (?,?,?);";

      $array = array($InsertaEmpleados, $Fecha, 'Franklin');
      $requestInsert = $this->insert($sqlInsertEmpleados, $array);
      $return = $requestInsert;
    } else {
      $return = "exist";
    }
    return $return;
  }

  public function insertRol($InsertaRol)
  {
    $return = "";
    $Fecha = date("Y-m-d H:i:s");
    $sql = "SELECT * FROM `tipo_rol` WHERE rol ='$InsertaRol'";
    $request = $this->selectAll($sql);
    if (empty($request)) {
      $sqlInsertRol = "INSERT INTO `tipo_rol`
    (
    `rol`, 
   `fec_registro`, 
   `usr_registro`)
     VALUES (?,?,?);";

      $array = array($InsertaRol, $Fecha, 'Franklin');
      $requestInsert = $this->insert($sqlInsertRol, $array);
      $return = $requestInsert;
    } else {
      $return = "exist";
    }
    return $return;
  }

  public function insertFacturacion($InsertaFacturacion, $InsertaCor_inicial, $InsertaCor_final, $InsertaFecha_limite)
  {
    $return = "";

    $sql = "SELECT * FROM `regimen_facturacion` WHERE `cai` ='$InsertaFacturacion' and `cor_inic` =$InsertaCor_inicial and `cor_fin`=$InsertaCor_final and `fec_lim_emi` =$InsertaFecha_limite";
    $request = $this->selectAll($sql);
    if (empty($request)) {
      $sqlInsertFacturacion = "INSERT INTO `regimen_facturacion`
    (
      `cai`,
      `cor_inic`,
      `cor_fin`, 
      `fec_lim_emi`)
     VALUES (?,?,?,?);";

      $array = array($InsertaFacturacion, $InsertaCor_inicial, $InsertaCor_final, $InsertaFecha_limite);
      $requestInsert = $this->insert($sqlInsertFacturacion, $array);
      $return = $requestInsert;
    } else {
      $return = "exist";
    }
    return $return;
  }

  public function insertEmpresa($InsertaRtn, $InsertaEmpresa)
  {
    $return = "";
    $sql = "SELECT * FROM `empresas` WHERE `rtn_empresa` ='$InsertaRtn' and `nom_empresa`= '$InsertaEmpresa'";
    $request = $this->selectAll($sql);
    if (empty($request)) {
      $sqlInsertEmpresa = "INSERT INTO `empresas`
    (
    `rtn_empresa`, 
    `nom_empresa`)
     VALUES (?,?);";

      $array = array($InsertaRtn, $InsertaEmpresa);
      $requestInsert = $this->insert($sqlInsertEmpresa, $array);
      $return = $requestInsert;
    } else {
      $return = "exist";
    }
    return $return;
  }


  //SELECT DE MARCA PARA MOSTRAR EN EL MODAL Y ACTUALIZAR//
  public function selectMarca($UMarca)
  {
    $sql = "SELECT * FROM `marcas` WHERE  `id_marca` = $UMarca";
    $request = $this->select($sql);
    return $request;
  }
  //SELECT DE CATEGORIA PARA MOSTRAR EN EL MODAL Y ACTUALIZAR//
  public function selectCategoria($UCategoria)
  {
    $sql = "SELECT * FROM `categorias` WHERE  `id_categoria` = $UCategoria";
    $request = $this->select($sql);
    return $request;
  }

  //SELECT DE GRUPO PARA MOSTRAR EN EL MODAL Y ACTUALIZAR//
  public function selectGrupo($UGrupo)
  {
    $sql = "SELECT * FROM `grupos` WHERE  `id_grupo` = $UGrupo";
    $request = $this->select($sql);
    return $request;
  }

  //SELECT DE UNIDADES MEDIDAS PARA MOSTRAR EN EL MODAL Y ACTUALIZAR//
  public function selectUnidad($UUnidades)
  {
    $sql = "SELECT * FROM `unidades_medidas` WHERE  `id_uni_medida` = $UUnidades";
    $request = $this->select($sql);
    return $request;
  }

  //SELECT DE IMPUESTOS PARA MOSTRAR EN EL MODAL Y ACTUALIZAR//
  public function selectImpuesto($UImpuesto)
  {
    $sql = "SELECT * FROM `tipos_impuestos` WHERE  `id_tip_impuestos` = $UImpuesto";
    $request = $this->select($sql);
    return $request;
  }
  //SELECT DE CARGOS PARA MOSTRAR EN EL MODAL Y ACTUALIZAR//
  public function selectCargo($UCargo)
  {
    $sql = "SELECT * FROM `cargos` WHERE  `id_cargo` = $UCargo";
    $request = $this->select($sql);
    return $request;
  }

  //SELECT DE EMPLEADOS PARA MOSTRAR EN EL MODAL Y ACTUALIZAR//
  public function selectEmpleado($UEmpleado)
  {
    $sql = "SELECT * FROM `tipos_empleado` WHERE  `id_tip_empleado` = $UEmpleado";
    $request = $this->select($sql);
    return $request;
  }
  //SELECT DE ROL PARA MOSTRAR EN EL MODAL Y ACTUALIZAR//
  public function selectRoles($URol)
  {
    $sql = "SELECT * FROM `tipo_rol` WHERE  `id_rol` = $URol";
    $request = $this->select($sql);
    return $request;
  }

  //SELECT DE REGIMEN DE FACTURACION PARA MOSTRAR EN EL MODAL Y ACTUALIZAR//
  public function selectFacturaciones($UFacturacion)
  {
    $sql = "SELECT * FROM `regimen_facturacion` WHERE  `id_regi_fact` = $UFacturacion";
    $request = $this->select($sql);
    return $request;
  }

  //SELECT DE EMPRESAS PARA MOSTRAR EN EL MODAL Y ACTUALIZAR//
  public function selectEmpresa($UEmpresa)
  {
    $sql = "SELECT * FROM `empresas` WHERE  `id_empresa` = $UEmpresa";
    $request = $this->select($sql);
    return $request;
  }


  //UPDATE DE MARCA//
  public function updateMarcas($InsertaMarcas, $IdMarca)
  {
    $return = "";
    $sql = "SELECT * FROM `marcas` WHERE marca ='$InsertaMarcas'";
    $request = $this->selectAll($sql);
    if (empty($request)) {
      $sqlInsertMarca = "UPDATE `marcas` SET `marca`= ? WHERE `id_marca`=$IdMarca";

      $array = array($InsertaMarcas);
      $requestInsert = $this->update($sqlInsertMarca, $array);
      $return = $requestInsert;
    } else {
      $return = "exist";
    }
    return $return;
  }

  //UPDATE DE CATEGORIA//
  public function updateCategoria($InsertaCategorias, $IdCategoria)
  {
    $return = "";
    $sql = "SELECT * FROM `categorias` WHERE categoria ='$InsertaCategorias'";
    $request = $this->selectAll($sql);
    if (empty($request)) {
      $sqlInsertCategorias = "UPDATE `categorias` SET `categoria`= ? WHERE `id_categoria`=$IdCategoria";

      $array = array($InsertaCategorias);
      $requestInsert = $this->update($sqlInsertCategorias, $array);
      $return = $requestInsert;
    } else {
      $return = "exist";
    }
    return $return;
  }

  //UPDATE DE GRUPO//
  public function updateGrupo($InsertaGrupos, $IdGrupo)
  {
    $return = "";
    $sql = "SELECT * FROM `grupos` WHERE grupo ='$InsertaGrupos'";
    $request = $this->selectAll($sql);
    if (empty($request)) {
      $sqlInsertGrupos = "UPDATE `grupos` SET `grupo`= ? WHERE `id_grupo`=$IdGrupo";

      $array = array($InsertaGrupos);
      $requestInsert = $this->update($sqlInsertGrupos, $array);
      $return = $requestInsert;
    } else {
      $return = "exist";
    }
    return $return;
  }

  //UPDATE DE UNIDADES MEDIDAS//
  public function updateUnidad($InsertaUnidades, $IdUnidades)
  {
    $return = "";
    $sql = "SELECT * FROM `unidades_medidas` WHERE uni_medida ='$InsertaUnidades'";
    $request = $this->selectAll($sql);
    if (empty($request)) {
      $sqlInsertUnidades = "UPDATE `unidades_medidas` SET `uni_medida`= ? WHERE `id_uni_medida`=$IdUnidades";

      $array = array($InsertaUnidades);
      $requestInsert = $this->update($sqlInsertUnidades, $array);
      $return = $requestInsert;
    } else {
      $return = "exist";
    }
    return $return;
  }

  //UPDATE DE IMPUESTOS
  public function updateImpuesto($InsertaImpuestos, $InsertaPorcentaje, $IdImpuesto)
  {
    $return = "";
    $sql = "SELECT * FROM `tipos_impuestos` WHERE nom_isv ='$InsertaImpuestos' and porcentaje='$InsertaPorcentaje'";
    $request = $this->selectAll($sql);
    if (empty($request)) {
      $sqlInsertImpuesto = "UPDATE `tipos_impuestos` SET `nom_isv`= ? , `porcentaje` = ?  WHERE `id_tip_impuestos`=$IdImpuesto";

      $array = array($InsertaImpuestos, $InsertaPorcentaje);
      $requestInsert = $this->update($sqlInsertImpuesto, $array);
      $return = $requestInsert;
    } else {
      $return = "exist";
    }
    return $return;
  }

  //UPDATE DE CARGOS
  public function updateCargo($InsertaCargos, $IdCargo)
  {
    $return = "";
    $sql = "SELECT * FROM `cargos` WHERE cargo ='$InsertaCargos'";
    $request = $this->selectAll($sql);
    if (empty($request)) {
      $sqlInsertCargos = "UPDATE `cargos` SET `cargo`= ? WHERE `id_cargo`=$IdCargo";

      $array = array($InsertaCargos);
      $requestInsert = $this->update($sqlInsertCargos, $array);
      $return = $requestInsert;
    } else {
      $return = "exist";
    }
    return $return;
  }

  //UPDATE DE EMPLEADOS
  public function updateEmpleado($InsertaEmpleados, $IdEmpleado)
  {
    $return = "";
    $sql = "SELECT * FROM `tipos_empleado` WHERE tipo_empleado ='$InsertaEmpleados'";
    $request = $this->selectAll($sql);
    if (empty($request)) {
      $sqlInsertEmpleados = "UPDATE `tipos_empleado` SET `tipo_empleado`= ? WHERE `id_tip_empleado`=$IdEmpleado";

      $array = array($InsertaEmpleados);
      $requestInsert = $this->update($sqlInsertEmpleados, $array);
      $return = $requestInsert;
    } else {
      $return = "exist";
    }
    return $return;
  }

  //UPDATE DE ROL
  public function updateRol($InsertaRol, $IdRol)
  {
    $return = "";
    $sql = "SELECT * FROM `tipo_rol` WHERE rol ='$InsertaRol'";
    $request = $this->selectAll($sql);
    if (empty($request)) {
      $sqlInsertRol = "UPDATE `tipo_rol` SET `rol`= ? WHERE `id_rol`=$IdRol";

      $array = array($InsertaRol);
      $requestInsert = $this->update($sqlInsertRol, $array);
      $return = $requestInsert;
    } else {
      $return = "exist";
    }
    return $return;
  }

  //UPDATE DE REGIMEN DE FACTURACION
  public function updateFacturacion($InsertaFacturacion, $InsertaCor_inicial, $InsertaCor_final, $InsertaFecha_limite, $IdFacturacion)
  {
    $return = "";

    $sqlInsertFacturacion = "UPDATE `regimen_facturacion` SET `cai`= ?, `cor_inic`= ?,`cor_fin` = ?,`fec_lim_emi`=? WHERE `id_regi_fact`=$IdFacturacion";

    $array = array($InsertaFacturacion, $InsertaCor_inicial, $InsertaCor_final, $InsertaFecha_limite);
    $requestInsert = $this->update($sqlInsertFacturacion, $array);
    $return = $requestInsert;



    return $return;
  }

  //UPDATE DE EMPRESA
  public function updateEmpresa($InsertaRtn, $InsertaEmpresa, $IdEmpresa)
  {
    $return = "";
    $sql = "SELECT * FROM `empresas` WHERE rtn_empresa ='$InsertaRtn' and nom_empresa='$InsertaEmpresa'";
    $request = $this->selectAll($sql);
    if (empty($request)) {
      $sqlInsertEmpresa = "UPDATE `empresas` SET `rtn_empresa`= ? , `nom_empresa` = ?  WHERE `id_empresa`=$IdEmpresa";

      $array = array($InsertaRtn, $InsertaEmpresa);
      $requestInsert = $this->update($sqlInsertEmpresa, $array);
      $return = $requestInsert;
    } else {
      $return = "exist";
    }
    return $return;
  }


  //DELETE PARA MARCAS
  public function deleteMarca($IdMarca)
  {
    $sql = "DELETE  FROM `marcas` WHERE `id_marca` = $IdMarca";
    $request = $this->delete($sql);
    return $request;
  }
  //DELETE PARA CATEGORIA
  public function deleteCategoria($IdCategoria)
  {
    $sql = "DELETE  FROM `categorias` WHERE `id_categoria` = $IdCategoria";
    $request = $this->delete($sql);
    return $request;
  }
  //DELETE PARA GRUPOS
  public function deleteGrupo($IdGrupo)
  {
    $sql = "DELETE  FROM `grupos` WHERE `id_grupo` = $IdGrupo";
    $request = $this->delete($sql);
    return $request;
  }
  //DELETE PARA UNIDADES MEDIDAS
  public function deleteUnidades($IdUnidades)
  {
    $sql = "DELETE  FROM `unidades_medidas` WHERE `id_uni_medida` = $IdUnidades";
    $request = $this->delete($sql);
    return $request;
  }
  //DELETE PARA IMPUESTOS
  public function deleteImpuestos($IdImpuesto)
  {
    $sql = "DELETE  FROM `tipos_impuestos` WHERE `id_tip_impuestos` = $IdImpuesto";
    $request = $this->delete($sql);
    return $request;
  }
  //DELETE PARA CARGOS
  public function deleteCargos($IdCargo)
  {
    $sql = "DELETE  FROM `cargos` WHERE `id_cargo` = $IdCargo";
    $request = $this->delete($sql);
    return $request;
  }
  //DELETE PARA EMPLEADOS
  public function deleteEmpleados($IdEmpleado)
  {
    $sql = "DELETE  FROM `tipos_empleado` WHERE `id_tip_empleado` = $IdEmpleado";
    $request = $this->delete($sql);
    return $request;
  }
  //DELETE PARA ROL
  public function deleteRoles($IdRol)
  {
    $sql = "DELETE  FROM `tipo_rol` WHERE `id_rol` = $IdRol";
    $request = $this->delete($sql);
    return $request;
  }
  //DELETE PARA EMPRESA
  public function deleteEmpresas($IdEmpresa)
  {
    $sql = "DELETE  FROM `empresas` WHERE `id_empresa` = $IdEmpresa";
    $request = $this->delete($sql);
    return $request;
  }
}//fin de la funcion entera