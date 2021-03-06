<?php
/* require_once("CategoriasModel.php"); */
//Se crea la clase homeModel
class Usuarios2Model extends Mysql
{
  public function __construct()
  {
    parent::__construct();
  }

  /* SELEC PARA LA TABLA USUARIOS */
  public function selectUsuarios()
  {

    $sql = "SELECT * FROM `personas` 
      INNER JOIN empleados ON personas.id_persona = empleados.id_persona 
      INNER JOIN usuario ON personas.id_persona = usuario.id_persona
      INNER JOIN tipo_rol ON usuario.id_rol = tipo_rol.id_rol";
    $request = $this->selectAll($sql);
    return $request;
  }

  /* SELEC PARA REGISTRAR USUARIOS */
  public function SelectPersona()
  {
    $sql = "SELECT * FROM `personas` 
    INNER JOIN empleados ON personas.id_persona = empleados.id_persona 
    INNER JOIN usuario ON personas.id_persona = usuario.id_persona
    INNER JOIN tipo_rol ON usuario.id_rol = tipo_rol.id_rol";
    $request = $this->selectAll($sql);
    return $request;
  }

  public function selectpersonas()
  {
    $sql = "SELECT p.id_persona, p.nom_persona, p.ape_persona FROM personas p
    INNER JOIN empleados e ON e.id_persona = p.id_persona
    WHERE e.id_persona NOT IN (SELECT id_persona FROM usuario)";
    $request = $this->selectAll($sql);
    return $request;
  }

  public function SelectRol()
  {
    $sql = "SELECT * FROM `tipo_rol`";
    $request = $this->selectAll($sql);
    return $request;
  }

  /*  INSERT DE USUARIOS */
  public function InsertUsuario($nombre_persona, $usuario_empleado, $rol_usuario, $password_empleado)
  {
    $Fecha_registro = date("Y-m-d H:i:s");
    $Usuario_registro = $_SESSION['userData']['nom_usuario'];
    $return = "";

    $sql_nomUsuario = "SELECT * FROM `usuario` WHERE `nom_usuario` = '$usuario_empleado'";
    $request_nomUsuario = $this->selectAll($sql_nomUsuario);
    if (!empty($request_nomUsuario)) {
      $return = "existeusuario";
    }


    if (empty($request_nomUsuario)) {
      $sql_InsertUsuario = "INSERT INTO `usuario`(`id_persona`, `id_rol`, `nom_usuario`, `pass_usuario`, `activacion`,`pass_request`, `fec_registro`, `usr_registro`) 
                              VALUES (?,?,?,?,?,?,?,?);
                          ";
      /*   dep($sql_InsertUsuario); exit();  */
      $arrData = array(
        $nombre_persona,
        $rol_usuario,
        $usuario_empleado,
        $password_empleado,
        1,
        0,
        $Fecha_registro,
        $Usuario_registro
      );

      $requestInsertUs = $this->insert($sql_InsertUsuario, $arrData);
      $return = $requestInsertUs;
    }
    return $return;
  }

  /* SELECT EMPLEADOS UPDATE*/
  public function SelectUsuario($id_usuario)
  {
    $sql = "SELECT * FROM `personas` 
    INNER JOIN empleados ON personas.id_persona = empleados.id_persona 
    INNER JOIN usuario ON personas.id_persona = usuario.id_persona
    INNER JOIN tipo_rol ON usuario.id_rol = tipo_rol.id_rol
    WHERE usuario.id_usuario = $id_usuario";

    $request = $this->select($sql);
    return $request;
  }


  /*  UPDATE USUARIO */
  public function Update_Usuario($id_usuario, $usuario_empleado, $rol_usuario, $estado)
  {
    $Fecha_registro = date("Y-m-d H:i:s");
    $Usuario_registro = $_SESSION['userData']['nom_usuario'];
    $return = "";

    $sql_nomUsuario = "SELECT * FROM `usuario` WHERE `nom_usuario` = '$usuario_empleado' and `id_usuario` != $id_usuario ";
    $request_nomUsuario = $this->selectAll($sql_nomUsuario);
    if (!empty($request_nomUsuario)) {
      $return = "existeusuario";
    }

    if (empty($request_nomUsuario)) {
      $sql_InsertUsuario = "UPDATE `usuario` SET 
    `id_rol`=?,
    `nom_usuario`=?,
    `activacion`=?,
    `fec_registro`=?,
    `usr_registro`=?
    WHERE `id_usuario` = ? ";

      $arrData = array(

        $rol_usuario,
        $usuario_empleado,
        $estado,
        $Fecha_registro,
        $Usuario_registro,
        $id_usuario
      );

      $requestInsertUs = $this->update($sql_InsertUsuario, $arrData);
      $return = $requestInsertUs;
    }
    return $return;
  }

  /*  DELETE USUARIO */
  public function Delete_Usuario($id_usuario)
  {
    $sql_DeleteUsuario = "DELETE FROM `usuario` WHERE `id_usuario` = $id_usuario";

    $request = $this->delete($sql_DeleteUsuario);
    return $request;
  }
}
