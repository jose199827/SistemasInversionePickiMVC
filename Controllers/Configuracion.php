<?php

class Configuracion extends Controllers
{
  public function __construct()
  {
    parent::__construct();
    session_start();
    //session_regenerate_id(true);
    if (empty($_SESSION['login'])) {
      header('location: ' . Base_URL() . '/login');
    }
  }
  public function configuracion()
  {
    $data['page_tag'] = "Configuración de Productos - Inversiones Picky";
    $data['page_title'] = "Configuración";
    $data['page_name'] = "Configuración de Producto";
    $data['page_funtions_js'] = "funtions_configuracion.js";
    $this->views->getView($this, "configuracion", $data);
  }
  public function Empleados()
  {
    $data['page_tag'] = "Configuración Empleados - Inversiones Picky";
    $data['page_title'] = "Configuración";
    $data['page_name'] = "Configuración de Empleados";
    $data['page_funtions_js'] = "funtions_configuracion.js";
    $this->views->getView($this, "configuracionEmpleados", $data);
  }
  public function Facturacion()
  {
    $data['page_tag'] = "Configuración Facturación - Inversiones Picky";
    $data['page_title'] = "Configuración";
    $data['page_name'] = "Configuración de Facturación";
    $data['page_funtions_js'] = "funtions_configuracion.js";
    $this->views->getView($this, "configuracionFacturacion", $data);
  }
  public function Empresa()
  {
    $data['page_tag'] = "Configuración Empresa - Inversiones Picky";
    $data['page_title'] = "Configuración";
    $data['page_name'] = "Configuración de Empresa";
    $data['page_funtions_js'] = "funtions_configuracion.js";
    $this->views->getView($this, "configuracionEmpresa", $data);
  }
  public function Repositorio()
  {
    $data['page_tag'] = "Repositorio - Inversiones Picky";
    $data['page_title'] = "Configuración";
    $data['page_name'] = "Repositorio de datos";
    $data['page_funtions_js'] = "funtions_configuracion.js";
    $this->views->getView($this, "configuracionbitacora", $data);
  }
  public function getBitacora()
  {
    $arrData = $this->model->selectBitacora();
    //dep($arrData);//
    for ($i = 0; $i < count($arrData); $i++) {
      $btnView = '';
      $btnEdit = '';
      $btnDel = '';
      $btnEdit = '<a class="dropdown-item btnEditRepositorio" href="javascript:;" onClick="fntEditRepositorio(' . $arrData[$i]['id_bitacora'] . ')"><i class="dw dw-edit2"></i> Editar</a>';
      $btnDel = '<a class="dropdown-item btnDelRepositorio" href="javascript:;" onClick="fntDelRepositorio(' . $arrData[$i]['id_bitacora'] . ')"><i class="dw dw-delete-3"></i> Eliminar</a>';
      $arrData[$i]['options'] = '<div class="dropdown ">
                                                 <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="javascript:;" role="button"
                                                   data-toggle="dropdown">
                                                   <i class="dw dw-more"></i>
                                                 </a>
                                                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                   
                                                   ' . $btnView . '
                                                   ' . $btnEdit . '
                                                   ' . $btnDel . '    
                                                   
                                                 </div>
                                               </div>';
    }
    echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    die();
  }
  public function getMarcas()
  {
    $arrData = $this->model->selectMarcas();
    //dep($arrData);//
    for ($i = 0; $i < count($arrData); $i++) {
      $btnView = '';
      $btnEdit = '';
      $btnDel = '';
      $btnEdit = '<a class="dropdown-item btnEditMarca" href="javascript:;" onClick="fntEditMarca(' . $arrData[$i]['id_marca'] . ')"><i class="dw dw-edit2"></i> Editar</a>';
      $btnDel = '<a class="dropdown-item btnDelMarca" href="javascript:;" onClick="fntDelMarca(' . $arrData[$i]['id_marca'] . ')"><i class="dw dw-delete-3"></i> Eliminar</a>';
      $arrData[$i]['options'] = '<div class="dropdown ">
                                                 <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="javascript:;" role="button"
                                                   data-toggle="dropdown">
                                                   <i class="dw dw-more"></i>
                                                 </a>
                                                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                   
                                                   ' . $btnView . '
                                                   ' . $btnEdit . '
                                                   ' . $btnDel . '    
                                                   
                                                 </div>
                                               </div>';
    }
    echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    die();
  }
  public function getCategorias()
  {
    $arrData = $this->model->selectCategorias();
    /* dep($arrData);
    exit(); */
    for ($i = 0; $i < count($arrData); $i++) {
      $btnView = '';
      $btnEdit = '';
      $btnDel = '';
      $btnEdit = '<a class="dropdown-item btnEditCategoria" href="javascript:;" onClick="fntEditCategoria(' . $arrData[$i]['id_categoria'] . ')"><i class="dw dw-edit2"></i> Editar</a>';
      $btnDel = '<a class="dropdown-item btnDelCatgoria" href="javascript:;" onClick="fntDelCategoria(' . $arrData[$i]['id_categoria'] . ')"><i class="dw dw-delete-3"></i> Eliminar</a>';
      $arrData[$i]['options'] = '<div class="dropdown ">
                                                 <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="javascript:;" role="button"
                                                   data-toggle="dropdown">
                                                   <i class="dw dw-more"></i>
                                                 </a>
                                                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                   
                                                   ' . $btnView . '
                                                   ' . $btnEdit . '
                                                   ' . $btnDel . '    
                                                   
                                                 </div>
                                               </div>';
    }
    echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    die();
  }
  public function getGrupos()
  {
    $arrData = $this->model->selectGrupos();
    //dep($arrData);//
    for ($i = 0; $i < count($arrData); $i++) {
      $btnView = '';
      $btnEdit = '';
      $btnDel = '';



      $btnEdit = '<a class="dropdown-item btnEditGrupo" href="javascript:;" onClick="fntEditGrupo(' . $arrData[$i]['id_grupo'] . ')"><i class="dw dw-edit2"></i> Editar</a>';


      $btnDel = '<a class="dropdown-item btnDelGrupo" href="javascript:;" onClick="fntDelGrupo(' . $arrData[$i]['id_grupo'] . ')"><i class="dw dw-delete-3"></i> Eliminar</a>';


      $arrData[$i]['options'] = '<div class="dropdown ">
                                                 <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="javascript:;" role="button"
                                                   data-toggle="dropdown">
                                                   <i class="dw dw-more"></i>
                                                 </a>
                                                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                   
                                                   ' . $btnView . '
                                                   ' . $btnEdit . '
                                                   ' . $btnDel . '    
                                                   
                                                 </div>
                                               </div>';
    }
    echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    die();
  }
  public function getUnidades()
  {
    $arrData = $this->model->selectUnidades();
    //dep($arrData);//
    for ($i = 0; $i < count($arrData); $i++) {
      $btnView = '';
      $btnEdit = '';
      $btnDel = '';



      $btnEdit = '<a class="dropdown-item btnEditUnidades" href="javascript:;" onClick="fntEditUnidades(' . $arrData[$i]['id_uni_medida'] . ')"><i class="dw dw-edit2"></i> Editar</a>';


      $btnDel = '<a class="dropdown-item btnDelUnidades" href="javascript:;" onClick="fntDelUnidades(' . $arrData[$i]['id_uni_medida'] . ')"><i class="dw dw-delete-3"></i> Eliminar</a>';


      $arrData[$i]['options'] = '<div class="dropdown ">
                                                 <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="javascript:;" role="button"
                                                   data-toggle="dropdown">
                                                   <i class="dw dw-more"></i>
                                                 </a>
                                                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                   
                                                   ' . $btnView . '
                                                   ' . $btnEdit . '
                                                   ' . $btnDel . '    
                                                   
                                                 </div>
                                               </div>';
    }
    echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    die();
  }
  public function getImpuestos()
  {
    $arrData = $this->model->selectImpuestos();
    //dep($arrData);//
    for ($i = 0; $i < count($arrData); $i++) {
      $btnView = '';
      $btnEdit = '';
      $btnDel = '';



      $btnEdit = '<a class="dropdown-item btnEditImpuestos" href="javascript:;" onClick="fntEditImpuestos(' . $arrData[$i]['id_tip_impuestos'] . ')"><i class="dw dw-edit2"></i> Editar</a>';


      $btnDel = '<a class="dropdown-item btnDelImpuestos" href="javascript:;" onClick="fntDelImpuestos(' . $arrData[$i]['id_tip_impuestos'] . ')"><i class="dw dw-delete-3"></i> Eliminar</a>';


      $arrData[$i]['options'] = '<div class="dropdown ">
                                                 <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="javascript:;" role="button"
                                                   data-toggle="dropdown">
                                                   <i class="dw dw-more"></i>
                                                 </a>
                                                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                   
                                                   ' . $btnView . '
                                                   ' . $btnEdit . '
                                                   ' . $btnDel . '    
                                                   
                                                 </div>
                                               </div>';
    }
    echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    die();
  }

  public function getCargos()
  {
    $arrData = $this->model->selectCargos();
    //dep($arrData);//
    for ($i = 0; $i < count($arrData); $i++) {
      $btnView = '';
      $btnEdit = '';
      $btnDel = '';



      $btnEdit = '<a class="dropdown-item btnEditCargos" href="javascript:;" onClick="fntEditCargos(' . $arrData[$i]['id_cargo'] . ')"><i class="dw dw-edit2"></i> Editar</a>';


      $btnDel = '<a class="dropdown-item btnDelCargos" href="javascript:;" onClick="fntDelCargos(' . $arrData[$i]['id_cargo'] . ')"><i class="dw dw-delete-3"></i> Eliminar</a>';


      $arrData[$i]['options'] = '<div class="dropdown ">
                                                 <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="javascript:;" role="button"
                                                   data-toggle="dropdown">
                                                   <i class="dw dw-more"></i>
                                                 </a>
                                                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                   
                                                   ' . $btnView . '
                                                   ' . $btnEdit . '
                                                   ' . $btnDel . '    
                                                   
                                                 </div>
                                               </div>';
    }
    echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    die();
  }
  public function getEmpleados()
  {
    $arrData = $this->model->selectEmpleados();
    //dep($arrData);//
    for ($i = 0; $i < count($arrData); $i++) {
      $btnView = '';
      $btnEdit = '';
      $btnDel = '';



      $btnEdit = '<a class="dropdown-item btnEditEmpleados" href="javascript:;" onClick="fntEditEmpleados(' . $arrData[$i]['id_tip_empleado'] . ')"><i class="dw dw-edit2"></i> Editar</a>';


      $btnDel = '<a class="dropdown-item btnDelEmpleados" href="javascript:;" onClick="fntDelEmpleados(' . $arrData[$i]['id_tip_empleado'] . ')"><i class="dw dw-delete-3"></i> Eliminar</a>';


      $arrData[$i]['options'] = '<div class="dropdown ">
                                                 <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="javascript:;" role="button"
                                                   data-toggle="dropdown">
                                                   <i class="dw dw-more"></i>
                                                 </a>
                                                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                   
                                                   ' . $btnView . '
                                                   ' . $btnEdit . '
                                                   ' . $btnDel . '    
                                                   
                                                 </div>
                                               </div>';
    }
    echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    die();
  }
  public function getRoles()
  {
    $arrData = $this->model->selectRol();
    //dep($arrData);//
    for ($i = 0; $i < count($arrData); $i++) {
      $btnView = '';
      $btnEdit = '';
      $btnDel = '';



      $btnEdit = '<a class="dropdown-item btnEditRol" href="javascript:;" onClick="fntEditRol(' . $arrData[$i]['id_rol'] . ')"><i class="dw dw-edit2"></i> Editar</a>';


      $btnDel = '<a class="dropdown-item btnDelRol" href="javascript:;" onClick="fntDelRol(' . $arrData[$i]['id_rol'] . ')"><i class="dw dw-delete-3"></i> Eliminar</a>';


      $arrData[$i]['options'] = '<div class="dropdown ">
                                                 <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="javascript:;" role="button"
                                                   data-toggle="dropdown">
                                                   <i class="dw dw-more"></i>
                                                 </a>
                                                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                   
                                                   ' . $btnView . '
                                                   ' . $btnEdit . '
                                                   ' . $btnDel . '    
                                                   
                                                 </div>
                                               </div>';
    }
    echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    die();
  }

  public function getFacturacion()
  {
    $arrData = $this->model->selectFacturacion();
    //dep($arrData);//
    for ($i = 0; $i < count($arrData); $i++) {
      $btnEdit = '';
      $btnEdit = '<a class="dropdown-item btnEditFacturacion" href="javascript:;" onClick="fntEditFacturacion(' . $arrData[$i]['id_regi_fact'] . ')"><i class="dw dw-edit2"></i> Editar</a>';
      $arrData[$i]['options'] = '<div class="dropdown ">
                                                 <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="javascript:;" role="button"
                                                   data-toggle="dropdown">
                                                   <i class="dw dw-more"></i>
                                                 </a>
                                                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                   ' . $btnEdit . '                                              
                                                 </div>
                                               </div>';
    }
    echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    die();
  }

  public function getEmpresa()
  {
    $arrData = $this->model->selectEmpresas();
    //dep($arrData);//
    for ($i = 0; $i < count($arrData); $i++) {
      $btnView = '';
      $btnEdit = '';
      $btnDel = '';



      $btnEdit = '<a class="dropdown-item btnEditEmpresas" href="javascript:;" onClick="fntEditEmpresas(' . $arrData[$i]['id_empresa'] . ')"><i class="dw dw-edit2"></i> Editar</a>';


      $btnDel = '<a class="dropdown-item btnDelEmpresas" href="javascript:;" onClick="fntDelEmpresas(' . $arrData[$i]['id_empresa'] . ')"><i class="dw dw-delete-3"></i> Eliminar</a>';


      $arrData[$i]['options'] = '<div class="dropdown ">
                                                 <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="javascript:;" role="button"
                                                   data-toggle="dropdown">
                                                   <i class="dw dw-more"></i>
                                                 </a>
                                                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                   
                                                   ' . $btnView . '
                                                   ' . $btnEdit . '
                                                   ' . $btnDel . '    
                                                   
                                                 </div>
                                               </div>';
    }
    echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    die();
  }

  public function setMarcas()
  {
    //dep($_POST);
    //exit();
    $IdMarca = intval($_POST['UMarca']);  // este codigo se modifica cuando se hace el update
    $InsertaMarcas = strClean($_POST['marca']);
    if ($IdMarca == 0) {
      $requestinsert = $this->model->insertMarcas($InsertaMarcas);
      $option = 1;
    } else {
      $requestinsert = $this->model->updateMarcas($InsertaMarcas, $IdMarca);
      $option = 2;
    }

    if ($requestinsert > 0) {
      if ($option == 1) {
        $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
      } else {
        $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
      }
    } else if ($requestinsert == 'exist') {
      $arrResponse = array('status' => false, 'msg' => '¡Atención! La marca ya existe.');
    } else {
      $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
    }

    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }

  public function setCategorias()
  {
    //dep($_POST);
    //exit();
    $IdCategoria = intval($_POST['UCategoria']);  // este codigo se modifica cuando se hace el update
    $InsertaCategorias = strClean($_POST['categoria']);
    if ($IdCategoria == 0) {
      $requestinsert = $this->model->insertCategorias($InsertaCategorias);
      $option = 1;
    } else {
      $requestinsert = $this->model->updateCategoria($InsertaCategorias, $IdCategoria);
      $option = 2;
    }

    if ($requestinsert > 0) {
      if ($option == 1) {
        $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
      } else {
        $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
      }
    } else if ($requestinsert == 'exist') {
      $arrResponse = array('status' => false, 'msg' => '¡Atención! La categoria ya existe.');
    } else {
      $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
    }

    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }

  public function setGrupos()
  {
    //dep($_POST);
    //exit();
    $IdGrupo = intval($_POST['UGrupo']);  // este codigo se modifica cuando se hace el update
    $InsertaGrupos = strClean($_POST['grupo']);
    if ($IdGrupo == 0) {
      $requestinsert = $this->model->insertGrupos($InsertaGrupos);
      $option = 1;
    } else {
      $requestinsert = $this->model->updateGrupo($InsertaGrupos, $IdGrupo);
      $option = 2;
    }

    if ($requestinsert > 0) {
      if ($option == 1) {
        $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
      } else {
        $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
      }
    } else if ($requestinsert == 'exist') {
      $arrResponse = array('status' => false, 'msg' => '¡Atención! El grupo ya existe.');
    } else {
      $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
    }

    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }

  public function setUnidades_Medidas()
  {
    //dep($_POST);
    //exit();
    $IdUnidades = intval($_POST['UUnidades']);  // este codigo se modifica cuando se hace el update
    $InsertaUnidades = strClean($_POST['uni_medida']);
    if ($IdUnidades == 0) {
      $requestinsert = $this->model->insertUnidades($InsertaUnidades);
      $option = 1;
    } else {
      $requestinsert = $this->model->updateUnidad($InsertaUnidades, $IdUnidades);
      $option = 2;
    }

    if ($requestinsert > 0) {
      if ($option == 1) {
        $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
      } else {
        $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
      }
    } else if ($requestinsert == 'exist') {
      $arrResponse = array('status' => false, 'msg' => '¡Atención! El grupo ya existe.');
    } else {
      $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
    }

    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }
  public function setImpuestos()
  {
    //dep($_POST);
    //exit();
    $IdImpuesto = intval($_POST['UImpuesto']);  // este codigo se modifica cuando se hace el update
    $InsertaImpuestos = strClean($_POST['nom_isv']);
    $InsertaPorcentaje = strClean($_POST['porcentaje']);
    if ($IdImpuesto == 0) {
      $requestinsert = $this->model->insertImpuestos($InsertaImpuestos, $InsertaPorcentaje);
      $option = 1;
    } else {
      $requestinsert = $this->model->updateImpuesto($InsertaImpuestos, $InsertaPorcentaje, $IdImpuesto);
      $option = 2;
    }

    if ($requestinsert > 0) {
      if ($option == 1) {
        $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
      } else {
        $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
      }
    } else if ($requestinsert == 'exist') {
      $arrResponse = array('status' => false, 'msg' => '¡Atención! El Impuesto ya existe.');
    } else {
      $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
    }

    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }

  public function setCargos()
  {
    //dep($_POST);
    //exit();
    $IdCargo = intval($_POST['UCargo']);  // este codigo se modifica cuando se hace el update
    $InsertaCargos = strClean($_POST['cargo']);
    if ($IdCargo == 0) {
      $requestinsert = $this->model->insertCargos($InsertaCargos);
      $option = 1;
    } else {
      $requestinsert = $this->model->updateCargo($InsertaCargos, $IdCargo);
      $option = 2;
    }

    if ($requestinsert > 0) {
      if ($option == 1) {
        $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
      } else {
        $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
      }
    } else if ($requestinsert == 'exist') {
      $arrResponse = array('status' => false, 'msg' => '¡Atención! El Cargo ya existe.');
    } else {
      $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
    }

    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }

  public function setEmpleados()
  { {
      //dep($_POST);
      //exit();
      $IdEmpleado = intval($_POST['UEmpleado']);  // este codigo se modifica cuando se hace el update
      $InsertaEmpleados = strClean($_POST['tipo_empleado']);
      if ($IdEmpleado == 0) {
        $requestinsert = $this->model->insertEmpleados($InsertaEmpleados);
        $option = 1;
      } else {
        $requestinsert = $this->model->updateEmpleado($InsertaEmpleados, $IdEmpleado);
        $option = 2;
      }

      if ($requestinsert > 0) {
        if ($option == 1) {
          $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
        } else {
          $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
        }
      } else if ($requestinsert == 'exist') {
        $arrResponse = array('status' => false, 'msg' => '¡Atención! El Cargo ya existe.');
      } else {
        $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
      }

      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
      die();
    }
  }

  public function setRol()
  { {
      //dep($_POST);
      //exit();
      $IdRol = intval($_POST['URol']);  // este codigo se modifica cuando se hace el update
      $InsertaRol = strClean($_POST['rol']);
      if ($IdRol == 0) {
        $requestinsert = $this->model->insertRol($InsertaRol);
        $option = 1;
      } else {
        $requestinsert = $this->model->updateRol($InsertaRol, $IdRol);
        $option = 2;
      }

      if ($requestinsert > 0) {
        if ($option == 1) {
          $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
        } else {
          $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
        }
      } else if ($requestinsert == 'exist') {
        $arrResponse = array('status' => false, 'msg' => '¡Atención! El Rol ya existe.');
      } else {
        $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
      }

      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
      die();
    }
  }

  public function setFacturacion()
  {
    //dep($_POST);
    //exit();
    $IdFacturacion = intval($_POST['UFacturacion']);  // este codigo se modifica cuando se hace el update
    $InsertaFacturacion = strClean($_POST['cai']);
    $InsertaCor_inicial = strClean($_POST['cor_inic']);
    $InsertaCor_final = strClean($_POST['cor_final']);
    $InsertaFecha_limite = strClean($_POST['fecha_limite']);
    if ($IdFacturacion == 0) {
      $requestinsert = $this->model->insertFacturacion($InsertaFacturacion, $InsertaCor_inicial, $InsertaCor_final, $InsertaFecha_limite);
      $option = 1;
    } else {
      $requestinsert = $this->model->updateFacturacion($InsertaFacturacion, $InsertaCor_inicial, $InsertaCor_final, $InsertaFecha_limite, $IdFacturacion);
      $option = 2;
    }

    if ($requestinsert > 0) {
      if ($option == 1) {
        $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
      } else {
        $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
      }
    } else if ($requestinsert == 'exist') {
      $arrResponse = array('status' => false, 'msg' => '¡Atención! El Impuesto ya existe.');
    } else {
      $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
    }

    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }

  public function setEmpresa()
  {
    //dep($_POST);
    //exit();
    $IdEmpresa = intval($_POST['UEmpresa']);  // este codigo se modifica cuando se hace el update
    $InsertaRtn = strClean($_POST['rtn_empresa']);
    $InsertaEmpresa = strClean($_POST['nom_empresa']);
    if ($IdEmpresa == 0) {
      $requestinsert = $this->model->insertEmpresa($InsertaRtn, $InsertaEmpresa);
      $option = 1;
    } else {
      $requestinsert = $this->model->updateEmpresa($InsertaRtn, $InsertaEmpresa, $IdEmpresa);
      $option = 2;
    }

    if ($requestinsert > 0) {
      if ($option == 1) {
        $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
      } else {
        $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
      }
    } else if ($requestinsert == 'exist') {
      $arrResponse = array('status' => false, 'msg' => '¡Atención! El Impuesto ya existe.');
    } else {
      $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
    }

    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }


  //UPDATE PARA MARCAS
  public function getMarca($id_marca)
  {
    $UMarca = intval($id_marca);
    if ($UMarca > 0) {
      $arrData = $this->model->selectMarca($UMarca);
      //dep($arrData); //
      //  exit(); //
      if (empty($arrData)) {
        $arrResponse = array('status' => false, 'msg' => '¡Atención! Datos no encontrados.');
      } else {
        $arrResponse = array('status' => true, 'Data' => $arrData);
      }
    }
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }

  //DELETE PARA MARCAS
  public function delMarcas()
  {
    $IdMarca = intval($_POST['id_marca']);
    $requestdelete = $this->model->deleteMarca($IdMarca);
    if ($requestdelete) {
      $arrResponse = array('status' => true, 'msg' => 'Datos eliminados correctamente.');
    } else {
      $arrResponse = array('status' => false, 'msg' => 'Error al eliminar.');
    }
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }

  //UPDATE PARA CATEGORIA
  public function getCategoria($id_categoria)
  {
    $UCategoria = intval($id_categoria);
    if ($UCategoria > 0) {
      $arrData = $this->model->selectCategoria($UCategoria);
      //dep($arrData); //
      //  exit(); //
      if (empty($arrData)) {
        $arrResponse = array('status' => false, 'msg' => '¡Atención! Datos no encontrados.');
      } else {
        $arrResponse = array('status' => true, 'Data' => $arrData);
      }
    }
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }

  //DELETE PARA CATEGORIAS
  public function delCategorias()
  {
    $IdCategoria = intval($_POST['id_categoria']);
    $requestdelete = $this->model->deleteCategoria($IdCategoria);
    if ($requestdelete) {
      $arrResponse = array('status' => true, 'msg' => 'Datos eliminados correctamente.');
    } else {
      $arrResponse = array('status' => false, 'msg' => 'Error al eliminar.');
    }
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }


  //UPDATE PARA GRUPO
  public function getGrupo($id_grupo)
  {
    $UGrupo = intval($id_grupo);
    if ($UGrupo > 0) {
      $arrData = $this->model->selectGrupo($UGrupo);
      //dep($arrData); //
      //  exit(); //
      if (empty($arrData)) {
        $arrResponse = array('status' => false, 'msg' => '¡Atención! Datos no encontrados.');
      } else {
        $arrResponse = array('status' => true, 'Data' => $arrData);
      }
    }
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }

  //DELETE PARA GRUPo
  public function delGrupos()
  {
    $IdGrupo = intval($_POST['id_grupo']);
    $requestdelete = $this->model->deleteGrupo($IdGrupo);
    if ($requestdelete) {
      $arrResponse = array('status' => true, 'msg' => 'Datos eliminados correctamente.');
    } else {
      $arrResponse = array('status' => false, 'msg' => 'Error al eliminar.');
    }
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }


  //UPDATE PARA UNIDADES MEDIDAS
  public function getUnidad($id_uni_medida)
  {
    $UUnidades = intval($id_uni_medida);
    if ($UUnidades > 0) {
      $arrData = $this->model->selectUnidad($UUnidades);
      //dep($arrData); //
      //  exit(); //
      if (empty($arrData)) {
        $arrResponse = array('status' => false, 'msg' => '¡Atención! Datos no encontrados.');
      } else {
        $arrResponse = array('status' => true, 'Data' => $arrData);
      }
    }
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }

  //DELETE PARA UNIDADES MEDIDA
  public function delUnidades()
  {
    $IdUnidades = intval($_POST['id_uni_medida']);
    $requestdelete = $this->model->deleteUnidades($IdUnidades);
    if ($requestdelete) {
      $arrResponse = array('status' => true, 'msg' => 'Datos eliminados correctamente.');
    } else {
      $arrResponse = array('status' => false, 'msg' => 'Error al eliminar.');
    }
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }

  //UPDATE PARA IMPUESTOS
  public function getImpuesto($id_tip_impuestos)
  {
    $UImpuesto = intval($id_tip_impuestos);
    if ($UImpuesto > 0) {
      $arrData = $this->model->selectImpuesto($UImpuesto);
      //dep($arrData); //
      //  exit(); //
      if (empty($arrData)) {
        $arrResponse = array('status' => false, 'msg' => '¡Atención! Datos no encontrados.');
      } else {
        $arrResponse = array('status' => true, 'Data' => $arrData);
      }
    }
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }

  //DELETE PARA IMPUESTOS
  public function delImpuestos()
  {
    $IdImpuesto = intval($_POST['id_tip_impuestos']);
    $requestdelete = $this->model->deleteImpuestos($IdImpuesto);
    if ($requestdelete) {
      $arrResponse = array('status' => true, 'msg' => 'Datos eliminados correctamente.');
    } else {
      $arrResponse = array('status' => false, 'msg' => 'Error al eliminar.');
    }
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }

  //UPDATE PARA CARGOS
  public function getCargo($id_cargo)
  {
    $UCargo = intval($id_cargo);
    if ($UCargo > 0) {
      $arrData = $this->model->selectCargo($UCargo);
      //dep($arrData); //
      //  exit(); //
      if (empty($arrData)) {
        $arrResponse = array('status' => false, 'msg' => '¡Atención! Datos no encontrados.');
      } else {
        $arrResponse = array('status' => true, 'Data' => $arrData);
      }
    }
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }

  //DELETE PARA CARGOS
  public function delCargos()
  {
    $IdCargo = intval($_POST['id_cargo']);
    $requestdelete = $this->model->deleteCargos($IdCargo);
    if ($requestdelete) {
      $arrResponse = array('status' => true, 'msg' => 'Datos eliminados correctamente.');
    } else {
      $arrResponse = array('status' => false, 'msg' => 'Error al eliminar.');
    }
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }


  //UPDATE PARA EMPLEADOS
  public function getEmpleado($id_tip_empleado)
  {
    $UEmpleado = intval($id_tip_empleado);
    if ($UEmpleado > 0) {
      $arrData = $this->model->selectEmpleado($UEmpleado);
      //dep($arrData); //
      //  exit(); //
      if (empty($arrData)) {
        $arrResponse = array('status' => false, 'msg' => '¡Atención! Datos no encontrados.');
      } else {
        $arrResponse = array('status' => true, 'Data' => $arrData);
      }
    }
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }

  //DELETE PARA EMPLEADOS
  public function delEmpleados()
  {
    $IdEmpleado = intval($_POST['id_tip_empleado']);
    $requestdelete = $this->model->deleteEmpleados($IdEmpleado);
    if ($requestdelete) {
      $arrResponse = array('status' => true, 'msg' => 'Datos eliminados correctamente.');
    } else {
      $arrResponse = array('status' => false, 'msg' => 'Error al eliminar.');
    }
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }

  //UPDATE PARA ROL
  public function getRol($id_rol)
  {
    $URol = intval($id_rol);
    if ($URol > 0) {
      $arrData = $this->model->selectRoles($URol);
      //dep($arrData); //
      //  exit(); //
      if (empty($arrData)) {
        $arrResponse = array('status' => false, 'msg' => '¡Atención! Datos no encontrados.');
      } else {
        $arrResponse = array('status' => true, 'Data' => $arrData);
      }
    }
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }
  //DELETE PARA ROLES
  public function delRoles()
  {
    $IdRol = intval($_POST['id_rol']);
    $requestdelete = $this->model->deleteRoles($IdRol);
    if ($requestdelete) {
      $arrResponse = array('status' => true, 'msg' => 'Datos eliminados correctamente.');
    } else {
      $arrResponse = array('status' => false, 'msg' => 'Error al eliminar.');
    }
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }

  //UPDATE PARA REGIMEN DE FACTURACION
  public function getFacturaciones($id_regi_fact)
  {
    $UFacturacion = intval($id_regi_fact);
    if ($UFacturacion > 0) {
      $arrData = $this->model->selectFacturaciones($UFacturacion);
      //dep($arrData); //
      //  exit(); //
      if (empty($arrData)) {
        $arrResponse = array('status' => false, 'msg' => '¡Atención! Datos no encontrados.');
      } else {
        $arrResponse = array('status' => true, 'Data' => $arrData);
      }
    }
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }

  //UPDATE PARA EMPRESAS
  public function getEmpresas($id_empresa)
  {
    $UEmpresa = intval($id_empresa);
    if ($UEmpresa > 0) {
      $arrData = $this->model->selectEmpresa($UEmpresa);
      //dep($arrData); //
      //  exit(); //
      if (empty($arrData)) {
        $arrResponse = array('status' => false, 'msg' => '¡Atención! Datos no encontrados.');
      } else {
        $arrResponse = array('status' => true, 'Data' => $arrData);
      }
    }
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }

  //DELETE PARA EMPRESAS
  public function delEmpresas()
  {
    $IdEmpresa = intval($_POST['id_empresa']);
    $requestdelete = $this->model->deleteEmpresas($IdEmpresa);
    if ($requestdelete) {
      $arrResponse = array('status' => true, 'msg' => 'Datos eliminados correctamente.');
    } else {
      $arrResponse = array('status' => false, 'msg' => 'Error al eliminar.');
    }
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }
}//cierra el controlador