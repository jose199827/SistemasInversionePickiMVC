<?php
/* require_once("CategoriasModel.php"); */
//Se crea la clase homeModel
class EmpleadosModel extends Mysql
{

  public function __construct()
  {
    parent::__construct();
  }

  /*  INSERT DE ENPLEADOS */
  public function InsertEmpleado($nombre_empleado, $apellido_empleado, $edad_empleado, $identidad_empleado, $nacimiento_empleado, $correo_empleado, $genero_empleado, $telefono_empleado, $direccion_empleado, $salario_empleado, $ingreso_empleado, $cargo_empleado,  $salida_empleado, $estatus_empleado, $motivo_empleado, $tipo_empleado)
  {
    $Fecha_registro = date("Y-m-d H:i:s");
    $Usuario_registro = $_SESSION['userData']['nom_usuario'];
    $return = "";

    $sql = "SELECT * FROM `personas` WHERE `num_id_persona` = '$identidad_empleado'";
    $request = $this->selectAll($sql);
    if (!empty($request)) {
      $return = "existenumerodeid";
    }

    $sql_correo = "SELECT * FROM `correos` WHERE `correo` = '$correo_empleado'";
    $request_correo = $this->selectAll($sql_correo);
    if (!empty($request_correo)) {
      $return = "existecorreo";
    }

    $sql_telefono = "SELECT * FROM `telefonos` WHERE `telefono` = '$telefono_empleado'";
    $request_telefono = $this->selectAll($sql_telefono);
    if (!empty($request_telefono)) {
      $return = "existetelefono";
    }

    if (empty($request) && empty($request_correo) && empty($request_telefono)) {
      $sql_InsertEmpleado = "INSERT INTO `personas`(`num_id_persona`, `nom_persona`, `ape_persona`, `eda_persona`, `fec_na_persona`, `gen_persona`, `fec_registro`, `usr_registro`) 
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

                           INSERT INTO `direcciones`(`direccion`, `fec_registro`, `usr_registro`) 
                           VALUES (?,?,?);
                           SELECT @id_direccion := MAX(id_direccion) FROM `direcciones`;
                           INSERT INTO `rel_direcciones_persona`(`id_direccion`, `id_persona`) 
                           VALUES (@id_direccion,@id_persona);  

                           INSERT INTO `empleados`(`id_persona`, `sal_empleado`, `id_cargo`, `id_tip_empleado`, `fec_ingreso`, `fec_salida`,`motivoSalida`, `est_empleado`,`fec_registro`,`usr_registro`)   
                           VALUES(@id_persona,?,?,?,?,?,?,?,?,?);

                         ";

      $arrData = array(
        $identidad_empleado,
        $nombre_empleado,
        $apellido_empleado,
        $edad_empleado,
        $nacimiento_empleado,
        $genero_empleado,
        $Fecha_registro,
        $Usuario_registro,
        $correo_empleado,
        $Fecha_registro,
        $Usuario_registro,
        $telefono_empleado,
        $Fecha_registro,
        $Usuario_registro,
        $direccion_empleado,
        $Fecha_registro,
        $Usuario_registro,
        $salario_empleado,
        $cargo_empleado,
        $tipo_empleado,
        $ingreso_empleado,
        $salida_empleado,
        $motivo_empleado,
        $estatus_empleado,
        $Fecha_registro,
        $Usuario_registro
      );

      $requestInsertEm = $this->insert($sql_InsertEmpleado, $arrData);
      $return = $requestInsertEm;
    }
    return $return;
  }

  /* SELECT EMPLEADOS UPDATE*/
  public function SelectEmpleado($id_empleado)
  {
    $sql = "SELECT * FROM `personas` 
    INNER JOIN rel_correos_persona ON personas.id_persona = rel_correos_persona.id_persona
    INNER JOIN correos ON rel_correos_persona.id_correo = correos.id_correo
    INNER JOIN rel_telefonos_persona ON personas.id_persona = rel_telefonos_persona.id_persona
    INNER JOIN telefonos ON rel_telefonos_persona.id_telefono = telefonos.id_telefono
    INNER JOIN rel_direcciones_persona ON personas.id_persona = rel_direcciones_persona.id_persona
    INNER JOIN direcciones ON rel_direcciones_persona.id_direccion = direcciones.id_direccion
    INNER JOIN empleados ON personas.id_persona = empleados.id_persona 
    INNER JOIN cargos ON empleados.id_cargo = cargos.id_cargo
    INNER JOIN tipos_empleado ON empleados.id_tip_empleado = tipos_empleado.id_tip_empleado
    WHERE personas.id_persona = $id_empleado";

    $request = $this->select($sql);
    return $request;
  }


  /*  UPDATE EMPLEADO */
  public function Update_Empleado($id_empleado, $id_correo, $id_telefono, $id_direccion, $id_emple, $nombre_empleado, $apellido_empleado, $edad_empleado, $identidad_empleado, $nacimiento_empleado, $correo_empleado, $genero_empleado, $telefono_empleado, $direccion_empleado, $salario_empleado, $ingreso_empleado, $cargo_empleado,  $salida_empleado, $motivo_empleado, $estatus_empleado,  $tipo_empleado)
  {
    $Fecha_registro = date("Y-m-d H:i:s");
    $Usuario_registro = "HELLEN";
    $return = "";
    $sql = "SELECT * FROM `personas` WHERE `num_id_persona` = '$identidad_empleado' and `id_persona` != $id_empleado ";
    $request = $this->selectAll($sql);
    if (!empty($request)) {
      $return = "existenumerodeid";
    }

    $sql_correo = "SELECT * FROM `correos` WHERE `correo` = '$correo_empleado' and `id_correo` != $id_correo";
    $request_correo = $this->selectAll($sql_correo);
    if (!empty($request_correo)) {
      $return = "existecorreo";
    }

    $sql_telefono = "SELECT * FROM `telefonos` WHERE `telefono` = '$telefono_empleado' and `id_telefono` != $id_telefono";
    $request_telefono = $this->selectAll($sql_telefono);
    if (!empty($request_telefono)) {
      $return = "existetelefono";
    }


    if (empty($request) && empty($request_correo) && empty($request_telefono)) {
      $sql_InsertEmpleado = "UPDATE `personas` SET
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
   `telefono`=?, 
   `fec_registro` = ?, 
    `usr_registro`= ?
    WHERE `id_telefono`=?;
  
 
   UPDATE `direcciones` SET
   `direccion`= ?,
   `fec_registro` = ?, 
    `usr_registro`= ?
   WHERE `id_direccion`= ?;
  

  
   UPDATE `empleados` SET
   `sal_empleado`=?,
   `id_cargo`=? ,
   `id_tip_empleado`=?,
   `fec_ingreso`=?,
   `fec_salida`=?,
   `motivoSalida`=?,
   `est_empleado`=?,
   `fec_registro` = ?, 
   `usr_registro`= ?
   WHERE `id_empleado`=? ";

      $arrData = array(

        $identidad_empleado,
        $nombre_empleado,
        $apellido_empleado,
        $edad_empleado,
        $nacimiento_empleado,
        $genero_empleado,
        $Fecha_registro,
        $Usuario_registro,
        $id_empleado,
        $correo_empleado,
        $Fecha_registro,
        $Usuario_registro,
        $id_correo,
        $telefono_empleado,
        $Fecha_registro,
        $Usuario_registro,
        $id_telefono,
        $direccion_empleado,
        $Fecha_registro,
        $Usuario_registro,
        $id_direccion,
        $salario_empleado,
        $cargo_empleado,
        $tipo_empleado,
        $ingreso_empleado,
        $salida_empleado,
        $motivo_empleado,
        $estatus_empleado,
        $Fecha_registro,
        $Usuario_registro,
        $id_emple
      );

      $requestInsertEm = $this->update($sql_InsertEmpleado, $arrData);
      $return = $requestInsertEm;
    }
    return $return;
  }

  /*  DELETE EMPLEADO */
  public function Delete_Empleado($id_empleado)
  {
    $sql_DeleteEmpleado = "DELETE p, rel_c,c, rel_t,t, rel_d,d, e, u, res_s FROM personas p
    LEFT JOIN rel_correos_persona rel_c ON p.id_persona = rel_c.id_persona
    LEFT JOIN correos c ON c.id_correo = rel_c.id_correo
    LEFT JOIN rel_telefonos_persona rel_t ON p.id_persona = rel_t.id_persona
    LEFT JOIN telefonos t ON t.id_telefono = rel_t.id_telefono
    LEFT JOIN rel_direcciones_persona rel_d ON p.id_persona = rel_d.id_persona
    LEFT JOIN direcciones d ON d.id_direccion = rel_d.id_direccion
    LEFT JOIN empleados e ON p.id_persona = e.id_persona
    LEFT JOIN usuario u ON p.id_persona = u.id_persona
    LEFT JOIN respuestas_seguridad res_s ON u.id_usuario = res_s.id_usuario 
    WHERE p.id_persona =$id_empleado";

    $request = $this->delete($sql_DeleteEmpleado);
    return $request;
  }

  public function SelectCargo()
  {
    $sql = "SELECT * FROM `cargos`";
    $request = $this->selectAll($sql);
    return $request;
  }

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
  }

  public function selectEmpleados()
  {
    $sql = "SELECT * FROM `personas` WHERE `id_persona` IN (SELECT `id_persona` FROM `empleados`)";
    $request = $this->selectAll($sql);
    return $request;
  }

  /* SELEC PARA LA TABLA USUARIOS */
  /* public function selectUsuarios()
  {

    $sql = "SELECT * FROM `personas` 
    INNER JOIN empleados ON personas.id_persona = empleados.id_persona 
    INNER JOIN usuario ON personas.id_persona = usuario.id_persona
    INNER JOIN tipo_rol ON usuario.id_rol = tipo_rol.id_rol";
     $request = $this->selectAll($sql);
     return $request;
  }  */
}
