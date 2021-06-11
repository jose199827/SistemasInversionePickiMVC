<?php
//Se crea la clase Home y se hace una herencia hacia la clase de controllers de la carpeta Librares/Core
class Login extends Controllers
{
  public function __construct()
  { //Se manda a llamar el constructor de la clase heredada de controllers de la carpeta Librares/Core
    parent::__construct();
    session_start();
    if (isset($_SESSION['login'])) {
      header('location: ' . Base_URL());
    }
  }
  //Se crea el método Home
  public function login()
  {
    $data['page_tag'] = "Login - Inversiones Picky";
    $data['page_title'] = "Login";
    $data['page_name'] = "login";
    $data['page_funtions_js'] = "funtions_login.js";
    $this->views->getView($this, "login", $data);
  }
  public function loginUser()
  {
    /* dep($_POST); */
    if ($_POST) {
      if (empty($_POST['txtEmail']) || empty($_POST['txtPassword'])) {
        $arrResponse = array('status' => false, 'msg' => 'Error de Datos.');
      } else {
        $strUsuario = strtolower(strClean($_POST['txtEmail']));
        $strPassword = hash("SHA256", ($_POST['txtPassword']));
        $requestUser = $this->model->loginUser($strUsuario, $strPassword);
        /* dep($requestUser);
        exit(); */
        if ($requestUser == 'NoExiste') {
          $arrResponse = array('status' => false, 'msg' => 'El usuario o la contraseña es incorrecta.');
        } else if ($requestUser == 'UsuarioBloqueado') {
          $arrResponse = array('status' => false, 'msg' => 'El usuario esta inactivo.');
        } else if ($requestUser == 'UsuarioIntento') {
          $arrResponse = array('status' => false, 'msg' => 'Intento fallido');
        } else {
          $arrData = $requestUser;
          if ($arrData['activacion'] == 1) {
            $_SESSION['idUser'] = $arrData['id_persona'];
            $_SESSION['login'] = true;
            $arrData = $this->model->sessionLogin($_SESSION['idUser']);
            sessionUser($_SESSION['idUser']);
            $arrResponse = array('status' => true, 'msg' => $arrData['nom_persona'] . " " . $arrData['ape_persona']);
          } else {
            $arrResponse = array('status' => false, 'msg' => 'El usuario esta inactivo.');
          }
        }
      }
      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
    die();
  }
  public function resetPass()
  {
    if ($_POST) {
      /* error_reporting(0); */
      if (empty($_POST['txtEmailReset'])) {
        $arrResponse = array('status' => false, 'msg' => 'Error de Datos.');
      } else {
        $token = token();
        $strEmail = strtolower(strClean($_POST['txtEmailReset']));
        $arrData = $this->model->getUserEmail($strEmail);
        if (empty($arrData)) {
          $arrResponse = array('status' => false, 'msg' => 'Usuario no existente.');
        } else {
          $idPersona = $arrData['id_usuario'];
          $nombreUsuario = $arrData['nom_persona'] . ' ' . $arrData['ape_persona'];
          $url_recovery = Base_URL() . '/Login/confirmUser/' . $strEmail . '/' . $token;
          $requestUpdate = $this->model->setTokenUser($idPersona, $token);

          $dataUsuario = array(
            'nombreUsuario' => $nombreUsuario,
            'email' => $strEmail,
            'asunto' => 'Recuperar cuenta - ' . NOMBRE_REMITENTE,
            'url_recovery' => $url_recovery
          );
          if ($requestUpdate) {
            $sendEmail = sendEmail($dataUsuario, 'email_cambioPassword');
            if ($sendEmail) {
              $arrResponse = array('status' => true, 'msg' => 'Se ha enviado un email a tu cuenta de correo para cambiar tu contraseña.');
            } else {
              $arrResponse = array('status' => false, 'msg' => 'No se ha podido realizar el proceso, intenta más tarde.');
            }
          } else {
            $arrResponse = array('status' => false, 'msg' => 'No se ha podido realizar el proceso, intenta más tarde.');
          }
        }
      }
      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
    die();
  }
  public function getUsuarioPreguntas()
  {
    if ($_POST) {
      if (empty($_POST['nombreUsuario'])) {
        $arrResponse = array('status' => false, 'msg' => 'Error de Datos.');
      } else {
        $nombreUsuario = strClean($_POST['nombreUsuario']);
        $arraResponseUser = $this->model->getUsuarioPreguntas($nombreUsuario);
        if ($arraResponseUser) {
          $arrResponse = array('status' => true, 'msg' => 'Usuario Encontrado.', 'data' => $arraResponseUser);
        } else if (empty($arraResponseUser)) {
          $arrResponse = array('status' => false, 'msg' => 'Usuario no existe.');
        } else {
          $arrResponse = array('status' => false, 'msg' => 'No es posible realizar el proceso, intenta más tarde.');
        }
      }
    }
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }
  public function buscarPreguntaUser()
  {
    $htmlOptions = "";
    if ($_POST) {
      if (empty($_POST['idUser']) || !intval($_POST['idUser'])) {
        $arrResponse = array('status' => false, 'msg' => 'Error de Datos.');
      } else {
        $idUser = intval($_POST['idUser']);
        $arraResponseUser = $this->model->buscarPreguntaUser($idUser);
        /* dep($arraResponseUser);
        exit(); */
        if ($arraResponseUser) {
          for ($i = 0; $i < count($arraResponseUser); $i++) {
            $htmlOptions .= '<option value ="' . $arraResponseUser[$i]['id_preg_seg'] . '">' . $arraResponseUser[$i]['preguntas'] . '</option>';
          }
          $arrResponse = array('status' => true, 'data' => $htmlOptions);
        } else if (empty($arraResponseUser)) {
          $arrResponse = array('status' => false, 'msg' => 'Usuario no cuenta con preguntas de seguridad.');
        } else {
          $arrResponse = array('status' => false, 'msg' => 'No es posible realizar el proceso, intenta más tarde.');
        }
      }
    }
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }

  public function confirmUserPregunta(string $params)
  {
    if (empty($params)) {
      header('Location: ' . Base_URL());
    } else {
      $strToken = strClean($params);
      $arraResponse = $this->model->getUsuarioPregunta($strToken);
      if (empty($arraResponse)) {
        header('Location: ' . Base_URL());
      } else {
        $data['page_tag'] = "Cambiar Contraseña";
        $data['page_title'] = "Login";
        $data['page_name'] = "login";
        $data['idpersona'] = $arraResponse['id_persona'];
        $data['token'] = $strToken;
        $data['page_funtions_js'] = "funtions_login.js";
        $this->views->getView($this, "cambiarPass", $data);
      }
    }
  }

  public function confirmUser(string $params)
  {
    if (empty($params)) {
      header('Location: ' . Base_URL());
    } else {
      $arrParams = explode(',', $params);
      $strEmail = strClean($arrParams[0]);
      $strToken = strClean($arrParams[1]);
      $arraResponse = $this->model->getUsuario($strToken);
      if (empty($arraResponse)) {
        header('Location: ' . Base_URL());
      } else {
        $data['page_tag'] = "Cambiar Contraseña";
        $data['page_title'] = "Login";
        $data['page_name'] = "login";
        $data['idpersona'] = $arraResponse['id_persona'];
        $data['email'] = $strEmail;
        $data['token'] = $strToken;
        $data['page_funtions_js'] = "funtions_login.js";
        $this->views->getView($this, "cambiarPass", $data);
      }
    }
    die();
  }
  public function setPass()
  {
    if (empty($_POST['idUsuario']) || empty($_POST['txtPassword']) || empty($_POST['txtPasswordConfirm']) ||  empty($_POST['txtToken'])) {
      $arrResponse = array('status' => false, 'msg' => 'Error de Datos.');
    } else {
      $intIdPersona = intval($_POST['idUsuario']);
      $strPassword = $_POST['txtPassword'];
      $strPasswordConfirm = $_POST['txtPasswordConfirm'];
      $strToken = strClean($_POST['txtToken']);
      if ($strPassword != $strPasswordConfirm) {
        $arrResponse = array('status' => false, 'msg' => 'Las contraseñas no son iguales.');
      } else {
        $arraResponseUser = $this->model->getUsuario($strToken);
        if (empty($arraResponseUser)) {
          $arrResponse = array('status' => false, 'msg' => 'Error de Datos.');
        } else {
          $strPass = hash("SHA256", $strPassword);
          $requestPass = $this->model->insertPass($intIdPersona, $strPass);
          /* dep($requestPass);
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
    }
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }

  public function resetPassPregunta()
  {
    if ($_POST) {
      if (empty($_POST['txtUsuaioReset']) || empty($_POST['iduser']) || empty($_POST['listPregunta']) || empty($_POST['txtRespuesta'])) {
        $arrResponse = array('status' => false, 'msg' => 'Error de Datos.');
      } else {
        $token = token();
        $idUser = intval($_POST['iduser']);
        $pregunta = intval($_POST['listPregunta']);
        $usuaioReset = strClean($_POST['txtUsuaioReset']);
        $respuesta = strClean($_POST['txtRespuesta']);
        $arraResponseUser = $this->model->setPreguntaUser($idUser, $pregunta, $respuesta);
        /* dep($arraResponseUser);
        exit(); */
        if (empty($arraResponseUser)) {
          $arrResponse = array('status' => false, 'msg' => 'No ha coicidencia.');
        } else {
          $url_recovery = Base_URL() . '/Login/confirmUserPregunta/' . $token;
          $requestUpdate = $this->model->setTokenUser($idUser, $token);
          if ($requestUpdate) {
            $arrResponse = array('status' => true, 'msg' => 'Respuesta Correcta.', 'url' => $url_recovery);
          } else {
            $arrResponse = array('status' => false, 'msg' => 'No se ha podido realizar el proceso, intenta más tarde.');
          }
        }
      }
      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
    die();
  }
}