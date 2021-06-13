<?php
/* require_once("CategoriasModel.php"); */
//Se crea la clase homeModel
class HomeModel extends Mysql
{
  public $idMsg;
  public $txtTitulo;
  public $txtMensaje;
  /*   private $objCategoria; */
  public function __construct()
  {
    parent::__construct();
    /*     $this->objCategoria = new CategoriasModel(); */
  }
  public function getCategorias()
  {
    /*     return $this->objCategoria->selectCategorias(); */
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
}