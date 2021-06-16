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
		$return = "";

		$sqlIntentos = "SELECT `intentos` FROM `usuario` WHERE `nom_usuario` ='$this->strUsuario';";
		$requestIntentos = $this->select($sqlIntentos);
		if (empty($requestIntentos)) {
			$return = "NoExiste";
		} else {
			$sql = "SELECT `id_persona`, `activacion` FROM `usuario` WHERE `nom_usuario`= '$this->strUsuario' AND `pass_usuario` ='$this->strPassword' ;";
			$request = $this->select($sql);
			$return = $request;
			if (!empty($return)) {
				$sqlIntentosCambio = "UPDATE `usuario` SET `intentos` = ? WHERE `usuario`.`nom_usuario` ='$this->strUsuario' ;";
				$arrData = array(0);
				$requestIntentosCambio = $this->update($sqlIntentosCambio, $arrData);
			}
			if ($requestIntentos['intentos'] == INTENTOSBLOQUEOS) {
				$sqlIntentosCambio = "UPDATE `usuario` SET `activacion` = ?,`intentos` = ? WHERE `usuario`.`nom_usuario` ='$this->strUsuario' ;";
				$arrData = array(0, 0);
				$requestIntentosCambio = $this->update($sqlIntentosCambio, $arrData);
				$return = "UsuarioBloqueado";
			} else {
				if (empty($return)) {
					$intento = $requestIntentos['intentos'] + 1;
					$sqlIntentosCambio = "UPDATE `usuario` SET `intentos` = ? WHERE `usuario`.`nom_usuario` ='$this->strUsuario' ;";
					$arrData = array($intento);
					$requestIntentosCambio = $this->update($sqlIntentosCambio, $arrData);
					$return = "UsuarioIntento";
				}
			}
		}
		return $return;
	}
	public function sessionLogin(int $idUsuario)
	{
		$this->intIdUsuario = $idUsuario;
		$sql = "SELECT p.id_persona, p.num_id_persona, p.nom_persona, p.ape_persona, t.telefono, d.direccion, c.correo, tr.id_rol, tr.rol,u.id_usuario, u.nom_usuario, u.activacion,u.pass_request
    FROM personas p 
    INNER JOIN rel_telefonos_persona rtp 
    ON rtp.id_persona = p.id_persona 
    INNER JOIN rel_direcciones_persona rdp 
    ON rdp.id_persona = p.id_persona 
    INNER JOIN rel_correos_persona rcp 
    ON rcp.id_persona = p.id_persona 
    INNER JOIN usuario u 
    ON u.id_persona=p.id_persona 
    INNER JOIN tipo_rol tr 
    ON tr.id_rol= u.id_rol 
    INNER JOIN telefonos t
    ON t.id_telefono= rtp.id_telefono 
    INNER JOIN direcciones d 
    ON d.id_direccion= rdp.id_direccion 
    INNER JOIN correos c 
    ON c.id_correo = rcp.id_correo WHERE p.id_persona =$this->intIdUsuario";
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
        u.id_usuario,
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
		$sql = "UPDATE `usuario` SET `token`=? WHERE `id_usuario`= $this->intIdUsuario";
		$arrData = array($this->strToken);
		$request = $this->update($sql, $arrData);
		return $request;
	}
	public function getUsuario(string $token)
	{
		$this->strToken = $token;
		$sql = "SELECT `id_persona`FROM `usuario` WHERE `token`= '$this->strToken' AND `activacion`=1";
		$request = $this->select($sql);
		return $request;
	}
	public function getUsuarioPregunta(string $token)
	{
		$this->strToken = $token;
		$sql = "SELECT `id_persona`FROM `usuario` WHERE `token`= '$this->strToken' AND `activacion`=1";
		$request = $this->select($sql);
		return $request;
	}
	public function getUsuarioPreguntas($nombreUsuario)
	{
		$this->strUsuario = $nombreUsuario;
		$sql = "SELECT p.id_persona,p.nom_persona, p.ape_persona, c.correo, u.nom_usuario, u.id_usuario FROM personas p INNER JOIN rel_correos_persona rcp ON rcp.id_persona = p.id_persona INNER JOIN usuario u ON u.id_persona=p.id_persona INNER JOIN tipo_rol tr ON tr.id_rol= u.id_rol INNER JOIN correos c ON c.id_correo = rcp.id_correo WHERE u.nom_usuario ='$this->strUsuario'";
		$request = $this->select($sql);
		return $request;
	}
	public function buscarPreguntaUser($idUser)
	{
		$this->intIdUsuario = $idUser;
		$sql = "SELECT * FROM `preguntas_seguridad` WHERE `id_user`=$this->intIdUsuario ";
		$request = $this->selectAll($sql);
		return $request;
	}
	public function insertPass($idUsuario, $password)
	{
		$this->intIdUsuario = $idUsuario;
		$this->strPassword = $password;
		$return = "";
		$sqlpass = "SELECT * FROM `usuario` WHERE `pass_usuario`='$this->strPassword'";
		$requestpass = $this->selectAll($sqlpass);
		if (empty($requestpass)) {
			$sql = "UPDATE `usuario` SET `pass_usuario`=?, `token`=?, pass_request=? WHERE `id_persona`= $this->intIdUsuario;";
			$arrData = array($this->strPassword, "", 1);
			$request = $this->update($sql, $arrData);
			$return = $request;
		} else {
			$return = "exist";
		}
		return $return;
	}

	public function setPreguntaUser($idUser, $pregunta, $respuesta)
	{
		$this->intIdUsuario = $idUser;
		$sql = "SELECT * FROM `respuestas_seguridad` WHERE `id_usuario`=$this->intIdUsuario AND `id_preg_seg`=$pregunta AND `respuesta`='$respuesta'";
		$request = $this->select($sql);
		return $request;
	}
}