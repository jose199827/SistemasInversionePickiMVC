<?php
//Se crea la clase homeModel
class LoginModel extends Mysql
{
  private $intIdUsuario;
  private $strUsuario;
  private $strPassword;
  private $strToken;
  public function __construct()
  {
    parent::__construct();
  }
  public function loginUser(string $usuario, string $password)
  {
    $this->strUsuario = $usuario;
    $this->strPassword = $password;
    $sql = "SELECT `id_persona`,`activacion` FROM `usuario` WHERE `nom_usuario`= '$this->strUsuario' AND `pass_usuario` ='$this->strPassword' AND `activacion` !=0;";
    $request = $this->select($sql);
    return $request;
  }
  public function sessionLogin(int $idUsuario)
  {
    $this->intIdUsuario = $idUsuario;
    $sql = "SELECT p.id_persona, p.num_id_persona, p.nom_persona, p.ape_persona, t.telefono, d.direccion, c.correo, tr.id_rol, tr.rol, u.nom_usuario, u.activacion FROM personas p INNER JOIN rel_telefonos_persona rtp ON rtp.id_persona = p.id_persona INNER JOIN rel_direcciones_persona rdp ON rdp.id_persona = p.id_persona INNER JOIN rel_correos_persona rcp ON rcp.id_persona = p.id_persona INNER JOIN usuario u ON u.id_persona=p.id_persona INNER JOIN tipo_rol tr ON tr.id_rol= u.id_rol INNER JOIN telefonos t ON t.id_telefono= rtp.id_telefono INNER JOIN direcciones d ON d.id_direccion= rdp.id_direccion INNER JOIN correos c ON c.id_correo = rcp.id_correo WHERE p.id_persona =$this->intIdUsuario";
    $request = $this->select($sql);
    $_SESSION['userData'] = $request;
    return $request;
  }
  public function getUserEmail(string $email)
  {
    $this->strUsuario = $email;
    $sql = "SELECT  p.id_persona, 
        p.nom_persona, 
        p.ape_persona,
        u.nom_usuario,
        u.activacion 
      FROM personas p 
      INNER JOIN usuario u 
      ON u.id_persona=p.id_persona 
      WHERE u.nom_usuario ='$this->strUsuario'  AND u.activacion=1";
    $request = $this->select($sql);
    return $request;
  }
  public function setTokenUser(int $idPersona, string $token)
  {
    $this->intIdUsuario = $idPersona;
    $this->strToken = $token;
    $sql = "UPDATE `usuario` SET `token`=? WHERE `id_persona`= $this->intIdUsuario";
    $arrData = array($this->strToken);
    $request = $this->update($sql, $arrData);
    return $request;
  }
  public function getUsuario(string $email, string $token)
  {
    $this->strUsuario = $email;
    $this->strToken = $token;
    $sql = "SELECT `id_persona`FROM `usuario` WHERE `nom_usuario`='$this->strUsuario' AND `token`= '$this->strToken' AND `activacion`=1";
    $request = $this->select($sql);
    return $request;
  }
  public function insertPass($idUsuario, $password)
  {
    $this->intIdUsuario = $idUsuario;
    $this->strPassword = $password;
    $sql = "UPDATE `usuario`SET `pass_usuario`=?, `token`=? WHERE `id_persona`= $this->intIdUsuario;";
    $arrData = array($this->strPassword, "");
    $request = $this->update($sql, $arrData);
    return $request;
  }
}