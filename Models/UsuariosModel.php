<?php
//Se crea la clase homeModel
class UsuariosModel extends Mysql
{
  private $intIdUsuario;
  private $strIdentificacion;
  private $strNombre;
  private $strApellido;
  private $strTelefono;
  private $strEmail;
  private $strPassword;
  private $strIdentificacionFiscal;
  private $strNombreFiscal;
  private $strDireccionFiscal;
  private $strToken;
  private $intTipoId;
  private $intStatus;
  public function __construct()
  {
    parent::__construct();
  }
  public function insertUsuario(string $identificacion, string $nombre, string $apellido, string $telefono, string $email, int $tipoid, int $status, string $password)
  {
    $this->strIdentificacion = $identificacion;
    $this->strNombre = $nombre;
    $this->strApellido = $apellido;
    $this->strTelefono = $telefono;
    $this->strEmail = $email;
    $this->strPassword = $password;
    $this->intTipoId = $tipoid;
    $this->intStatus = $status;
    $return = 0;
    $sql = "SELECT * FROM `persona` WHERE `email_user`= '{$this->strEmail}' OR `indentificacion`='{$this->strIdentificacion}'";
    $request = $this->selectAll($sql);

    if ($this->strIdentificacion == "" || $this->strNombre == "" || $this->strApellido == "" || $this->strTelefono == "" || $this->strEmail == "" || $this->strPassword == "" || $this->intTipoId == "" || $this->intStatus == "") {
      $return = "sqlinjection";
    } else if (empty($request)) {
      $query_insert = "INSERT INTO `persona` (`indentificacion`,`nombres`,`apellidos`,`telefono`, `email_user`, `password`, `rolid`, `status`) VALUES (?,?,?,?,?,?,?,?)";
      $arrData = array(
        $this->strIdentificacion,
        $this->strNombre,
        $this->strApellido,
        $this->strTelefono,
        $this->strEmail,
        $this->strPassword,
        $this->intTipoId,
        $this->intStatus
      );
      $request_insert = $this->insert($query_insert, $arrData);
      $return = $request_insert;
    } else {
      $return = "exist";
    }
    return $return;
  }
  public function updateUsuario(int $idUsuario, string $identificacion, string $nombre, string $apellido, string $telefono, string $email, int $tipoid, int $status, string $password)
  {
    $this->intIdUsuario = $idUsuario;
    $this->strIdentificacion = $identificacion;
    $this->strNombre = $nombre;
    $this->strApellido = $apellido;
    $this->strTelefono = $telefono;
    $this->strEmail = $email;
    $this->strPassword = $password;
    $this->intTipoId = $tipoid;
    $this->intStatus = $status;
    $sql = "SELECT * FROM `persona` WHERE (`email_user`= '{$this->strEmail}' AND `idpersona`!=$this->intIdUsuario) OR (`indentificacion`= '{$this->strIdentificacion}' AND `idpersona`!=$this->intIdUsuario)";
    $request = $this->selectAll($sql);
    if ($this->intIdUsuario == "" || $this->strIdentificacion == "" || $this->strNombre == "" || $this->strApellido == "" || $this->strTelefono == "" || $this->strEmail == "" ||  $this->intTipoId == "" || $this->intStatus == "") {
      $return = "sqlinjection";
    } else if (empty($request)) {
      if ($this->strPassword != "") {
        $sql = "UPDATE `persona` SET`indentificacion`=?,`nombres`=?,`apellidos`=?,`telefono`=?,`email_user`=?,              `password`=?,`rolid`=?,`status`=? WHERE `idpersona`=$this->intIdUsuario";
        $arrData = array($this->strIdentificacion, $this->strNombre, $this->strApellido, $this->strTelefono, $this->strEmail, $this->strPassword, $this->intTipoId, $this->intStatus);
      } else {
        $sql = "UPDATE `persona` SET`indentificacion`=?,`nombres`=?,`apellidos`=?,`telefono`=?,`email_user`=?,`rolid`=?,`status`=? WHERE `idpersona`=$this->intIdUsuario";
        $arrData = array($this->strIdentificacion, $this->strNombre, $this->strApellido, $this->strTelefono, $this->strEmail, $this->intTipoId, $this->intStatus);
      }
      $request = $this->update($sql, $arrData);
      $return = $request;
    } else {
      $return = "exist";
    }
    return $return;
  }
  public function selectUsuarios()
  {
    $whereAdmin = "";
    if ($_SESSION['idUser'] != 1) {
      $whereAdmin = " and p.idpersona !=1";
    }
    $sql = "SELECT p.idpersona,p.indentificacion,p.nombres,p.apellidos,p.telefono,p.email_user,p.status,r.idrol ,r.nombrerol FROM persona p INNER JOIN rol r ON p.rolid= r.idrol WHERE p.status!=0" . $whereAdmin;
    $request = $this->selectAll($sql);
    return $request;
  }
  public function selectPreguntas()
  {
    $id = $_SESSION['userData']['id_usuario'];
    $sql = "SELECT r.id_resp_seg, r.id_usuario,r.id_preg_seg, p.preguntas, r.respuesta FROM respuestas_seguridad r INNER JOIN preguntas_seguridad p ON p.id_preg_seg= r.id_preg_seg WHERE r.id_usuario= $id";
    $request = $this->selectAll($sql);
    return $request;
  }
  public function selectUsuario(int $idpersona)
  {
    $this->intIdUsuario = $idpersona;
    $sql = "SELECT p.idpersona,p.indentificacion,p.nombres,p.apellidos,p.telefono,p.email_user, p.nit, p.nombrefical, p.direccionfiscal, r.idrol,r.nombrerol, p.status, DATE_FORMAT(p.datecreated, '%d/%m/%y') AS fechaRegistro  FROM persona p INNER JOIN rol r ON p.rolid= r.idrol WHERE p.idpersona =$this->intIdUsuario";
    $request = $this->select($sql);
    return $request;
  }
  public function selectPregunta($idpregunta)
  {
    $sql = "SELECT r.id_resp_seg, r.id_usuario,r.id_preg_seg, p.preguntas, r.respuesta FROM respuestas_seguridad r INNER JOIN preguntas_seguridad p ON p.id_preg_seg= r.id_preg_seg WHERE r.id_preg_seg= $idpregunta";
    $request = $this->select($sql);
    return $request;
  }
  public function deleteUsuario(int $idpersona)
  {
    $this->intIdUsuario = $idpersona;
    $sql = "UPDATE `persona` SET `status` = ? WHERE `persona`.`idpersona` = $this->intIdUsuario;";
    $arrData = array(0);
    $request = $this->update($sql, $arrData);
    return $request;
  }
  public function deletePregunta($idpregunta)
  {
    $sql = "DELETE FROM `preguntas_seguridad` WHERE `id_preg_seg`=$idpregunta";
    $request = $this->delete($sql);
    return $request;
  }
  public function updatePerfil(int $idUsuario, string $identificacion, string $nombre, string $apellido, string $telefono, string $password)
  {
    $this->intIdUsuario = $idUsuario;
    $this->strIdentificacion = $identificacion;
    $this->strNombre = $nombre;
    $this->strApellido = $apellido;
    $this->strTelefono = $telefono;
    $this->strPassword = $password;

    if ($this->intIdUsuario == "" || $this->strIdentificacion == "" || $this->strNombre == "" || $this->strApellido == "" || $this->strTelefono == "") {
      $return = "sqlinjection";
      exit();
    }
    if ($this->strPassword != "") {
      $sql = "UPDATE `persona` SET`indentificacion`=?,`nombres`=?,`apellidos`=?,`telefono`=?, `password`=? WHERE `idpersona`=$this->intIdUsuario";
      $arrData = array($this->strIdentificacion, $this->strNombre, $this->strApellido, $this->strTelefono, $this->strPassword);
    } else {
      $sql = "UPDATE `persona` SET`indentificacion`=?,`nombres`=?,`apellidos`=?,`telefono`=?WHERE `idpersona`=$this->intIdUsuario";
      $arrData = array($this->strIdentificacion, $this->strNombre, $this->strApellido, $this->strTelefono);
    }
    $request = $this->update($sql, $arrData);
    $return = $request;
    return $return;
  }
  public function updateDatosFiscales(int $intIdUsuario, string $strIdentificacionFiscal, string $strNombreFiscal, string $strDireccionFiscal)
  {
    $this->intIdUsuario = $intIdUsuario;
    $this->strIdentificacionFiscal = $strIdentificacionFiscal;
    $this->strNombreFiscal = $strNombreFiscal;
    $this->strDireccionFiscal = $strDireccionFiscal;
    if ($this->intIdUsuario == "" || $this->strIdentificacionFiscal == "" || $this->strNombreFiscal == "" || $this->strDireccionFiscal == "") {
      $return = "sqlinjection";
      exit();
    }
    $sql = "UPDATE `persona` SET `nit`=?,`nombrefical`=?,`direccionfiscal`=? WHERE `idpersona`=$this->intIdUsuario";
    $arrData = array($this->strIdentificacionFiscal, $this->strNombreFiscal, $this->strDireccionFiscal);
    $request = $this->update($sql, $arrData);
    $return = $request;
    return $return;
  }
  public function insertPregunta($intIdUsuario, $txtPregunta, $txtRespuesta)
  {
    $return = 0;
    $sql = "SELECT * FROM `preguntas_seguridad` WHERE preguntas ='$txtPregunta'";
    $request = $this->selectAll($sql);
    if (empty($request)) {
      $sqlPreguntas = "SELECT COUNT(*) AS total FROM preguntas_seguridad WHERE `id_user`=$intIdUsuario";
      $resultado = $this->select($sqlPreguntas);
      $total = $resultado['total'];
      if ($total == PREGUNTAS) {
        $return = "limite";
      } else {
        $sqlInser = "INSERT INTO `preguntas_seguridad`(`id_user`, `preguntas`) VALUES(?,?);
                          SELECT @id_preg_seg := MAX(id_preg_seg) FROM `preguntas_seguridad`;
                          INSERT INTO `respuestas_seguridad`(`id_usuario`, `id_preg_seg`, `respuesta`) VALUES (?,@id_preg_seg ,?)";
        $arrData = array($intIdUsuario, $txtPregunta, $intIdUsuario, $txtRespuesta);
        $request_insert = $this->insert($sqlInser, $arrData);
        $return = $request_insert;
      }
    } else {
      $return = "exist";
    }
    return $return;
  }
  public function updatePregunta($idPregunta, $txtRespuesta)
  {
    $sql = "UPDATE `respuestas_seguridad` SET `respuesta`=? WHERE `id_preg_seg`=$idPregunta";
    $arrData = array($txtRespuesta);
    $request = $this->update($sql, $arrData);
    return $request;
  }
}