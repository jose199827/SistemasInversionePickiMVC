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
    if ($_SESSION['userData']['pass_request'] == 0) {
      $arrResponse = array('status' => true, 'msg' => 'Primera Vez.');
    }
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }
}