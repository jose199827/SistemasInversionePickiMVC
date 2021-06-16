<?php

//Se crea la clase Home y se hace una herencia hacia la clase de controllers de la carpeta Librares/Core
class Graficas extends Controllers
{

  public function __construct()
  { //Se manda a llamar el constructor de la clase heredada de controllers de la carpeta Librares/Core
    parent::__construct();
    session_start();
    session_regenerate_id(true);
    if (empty($_SESSION['login'])) {
      header('location: ' . Base_URL() . '/Login');
    }
  //  getPermisos(1);
  }
  //Se crea el método Graficas
  public function graficas()
  {
    $data['productosre'] = $this->model->productos_registrados();
    $data['clientesre'] = $this->model->clientes_registrados();
    $data['marcasre'] = $this->model->marcas_registrados();
    $data['proveedoresre'] = $this->model->proveedores_registrados();
    $data['grafica'] = $this->model->grafica_de_barra();
    $data['page_tag'] = "Graficos Inversiones Picky";
    $data['page_title'] = "Graficos Inversiones Picky";
    $data['page_name'] = "Graficos";
    $data['page_funtions_js'] = "funtions_graficos.js";
    $this->views->getView($this, "graficos", $data);
  }
}
