<?php
/* require_once("CategoriasModel.php"); */
//Se crea la clase homeModel
class GraficasModel extends Mysql
{

  /*   private $objCategoria; */
  public function __construct()
  {
    parent::__construct();
    /*     $this->objCategoria = new CategoriasModel(); */
  }
  public function productos_registrados()
  {

    $productosregistrados = "SELECT COUNT(*) AS total FROM `productos`";
    $resultado = $this->select($productosregistrados);
    $total = $resultado['total'];
    return $total;

  }

  public function clientes_registrados()
  {

    $clientesregistrados = "SELECT COUNT(*) AS total FROM `clientes`";
    $resultado = $this->select($clientesregistrados);
    $total = $resultado['total'];
    return $total;

  }

  public function marcas_registrados()
  {

    $marcasregistrados = "SELECT COUNT(*) AS total FROM `marcas`";
    $resultado = $this->select($marcasregistrados);
    $total = $resultado['total'];
    return $total;

  }

  public function proveedores_registrados()
  {

    $proveedoresregistrados = "SELECT COUNT(*) AS total FROM `proveedores`";
    $resultado = $this->select($proveedoresregistrados);
    $total = $resultado['total'];
    return $total;

  }

  public function grafica_de_barra()
  {

    $grafica = "SELECT * FROM `factura`";
    $resultado = $this->selectAll($grafica);
    return $resultado;

  }


}
