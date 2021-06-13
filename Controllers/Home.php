<?php

//Se crea la clase Home y se hace una herencia hacia la clase de controllers de la carpeta Librares/Core
class Home extends Controllers
{

  public function __construct()
  { //Se manda a llamar el constructor de la clase heredada de controllers de la carpeta Librares/Core
    parent::__construct();
    session_start();
    session_regenerate_id(true);
    if (empty($_SESSION['login'])) {
      header('location: ' . Base_URL() . '/Login');
    }
    getPermisos(1);
  }
  //Se crea el método Home
  public function home()
  {
    $data['page_tag'] = NOMBRE_EMPRESA;
    $data['page_title'] = NOMBRE_EMPRESA;
    $data['page_name'] = "home";
    $data['page_funtions_js'] = "funtions_dashoard.js";
    $this->views->getView($this, "home", $data);
  }
  public function getMsg()
  {
    if ($_SESSION['userData']['pass_request'] != 1) {
      $arrResponse = array('status' => true);
    } else {
      $arrResponse = array('status' => false);
    }
    /*   dep($arrResponse);
    exit(); */
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }

  public function setPassInicio()
  {
    /* dep($_POST);
    exit(); */
    if (empty($_POST['idUsuario']) || empty($_POST['txtPassword']) || empty($_POST['txtPasswordConfirm'])) {
      $arrResponse = array('status' => false, 'msg' => 'Error de Datos.');
    } else {
      $intIdPersona = intval($_POST['idUsuario']);
      $strPassword = $_POST['txtPassword'];
      $strPasswordConfirm = $_POST['txtPasswordConfirm'];
      if ($strPassword != $strPasswordConfirm) {
        $arrResponse = array('status' => false, 'msg' => 'Las contraseñas no son iguales.');
      } else {
        $strPass = hash("SHA256", $strPassword);
        $requestPass = $this->model->insertPass($intIdPersona, $strPass);
        /*         dep($requestPass);
        exit(); */
        if ($requestPass > 0) {
          $arrResponse = array('status' => true, 'msg' => 'Contraseña actualizada con éxito.');
        } else if ($requestPass == 'exist') {
          $arrResponse = array('status' => false, 'msg' => 'La contraseña no puede ser igual a la anterior.');
        } else {
          $arrResponse = array('status' => false, 'msg' => 'No es posible realizar el proceso, intenta más tarde.');
        }
      }
    }
    /*     dep($arrResponse);
    exit(); */
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }
}