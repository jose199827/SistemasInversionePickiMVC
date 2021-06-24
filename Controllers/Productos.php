<?php
class Productos extends Controllers
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
   public function productos ()
   {
     $data['page_tag'] = "Productos - Inversiones Picky";
     $data['page_title'] = "Productos";
     $data['page_name'] = "Registrar Productos";
     $data['page_funtions_js'] = "funtions_productos.js";
     $this->views->getView($this, "productos", $data);
   }
   public function Tabla ()
   {
     $data['page_tag'] = "Productos - Inversiones Picky";
     $data['page_title'] = "Productos";
     $data['page_name'] = "Tabla de Productos";
     $data['page_funtions_js'] = "funtions_productos.js";
     $this->views->getView($this, "lista_productos", $data);
   }
	 public function getProductos ()
   {
   	$arrData=$this->model->select_producto();
   	/*dep($arrData);exit();*/
   	for ($i = 0; $i < count($arrData); $i++) {
         $btnEdit = '';
         $btnDel = '';

         $btnEdit = '<a class="dropdown-item btnEditProductos" href="' . Base_URL() . '/Productos/updateProductos/' . $arrData[$i]['id_producto'] . '" ><i class="dw dw-edit2"></i> Editar</a>';
         $btnDel = '<a class="dropdown-item btnDelProducto" href="javascript:;" onClick="fntDelProducto(' . $arrData[$i]['id_producto'] . ')"><i class="dw dw-delete-3"></i> Eliminar</a>';

         $arrData[$i]['options'] = '<div class="dropdown ">
         <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="javascript:;" role="button"
                                                   data-toggle="dropdown">
                                                   <i class="dw dw-more"></i>
                                                 </a>
                                                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                   ' . $btnEdit . '
                                                   ' . $btnDel . '
                                                 </div>
                                               </div>';
      }
      echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
      die();
   }
	 public function eliminarProveedor ()
{
 $eliminar_idproveedor=intval($_POST['idproveedor']);
 $resultado_eliminar=$this->model->eliminarproveedor($eliminar_idproveedor);
 if ($resultado_eliminar) {
 $arrResponse = array("status" => true, "msg" => 'Datos eliminados.');
 }
 else {
 $arrResponse = array("status" => false, "msg" => 'Datos no eliminados.');
 }
 echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
	 die();
}
public function setProducto ()
{
	/*dep($_POST);
	exit();*/
	if (empty($_POST['nomproducto']) || empty($_POST['descripcion']) || empty($_POST['proveedor']) || empty($_POST['marca']) || empty($_POST['categorias']) || empty($_POST['grupo']) || empty($_POST['pre_compra']) || empty($_POST['pre_venta']) || empty($_POST['isv']) || empty($_POST['pre_reventa']) || empty($_POST['sto_minimo'])  || empty($_POST['sto_maximo']) || empty($_POST['uni_medida']) || empty($_POST['concepto']) || empty($_POST['cantidad']) )
	{
	 $arrResponse = array("status" => false, "msg" => 'Por favor rellenar todos los campos.');
	} else {
	 $nom_producto=strClean($_POST['nomproducto']);
	 $descripcion=strClean($_POST['descripcion']);
	 $proveedor=intval($_POST['proveedor']);
	 $marca=intval($_POST['marca']);
	 $categoria=intval($_POST['categorias']);
	 $grupo=intval($_POST['grupo']);
	 $pre_compra=intval($_POST['pre_compra']);
	 $pre_venta=intval($_POST['pre_venta']);
	 $isv=intval($_POST['isv']);
	 $pre_reventa=intval($_POST['pre_reventa']);
	 $sto_minimo=intval($_POST['sto_minimo']);
	 $sto_maximo=intval($_POST['sto_maximo']);
	 $unidades_medidas=intval($_POST['uni_medida']);
	 $concepto=strClean($_POST['concepto']);
	 $cantidad=intval($_POST['cantidad']);
	 $producto_insertar=$this->model->setProducto($nom_producto,$descripcion,$proveedor,$marca,$categoria,$grupo,$pre_compra,$pre_venta,$isv,$pre_reventa,$sto_minimo,$sto_maximo,$unidades_medidas,$concepto,$cantidad);
	 if ($producto_insertar>0) {
		 $arrResponse = array("status" => true, "msg" => 'Datos Guardados correctamente.');
	 } elseif ($producto_insertar=='existeproducto') {
		 $arrResponse = array("status" => false, "msg" => 'Producto Existente.');
	 } else {
			$arrResponse = array("status" => false, "msg" => 'No se guardaron los datos.');
	 }

	}
	echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
	 die();
}
public function getProveedores () {
    $proveedor ="" ;
    $info_proveedor=$this->model->getProveedores();
    if (count($info_proveedor)>0) {
    for ($i=0; $i < count($info_proveedor) ; $i++) {
    	$proveedor .='<option value = " '.$info_proveedor[$i]['id_proveedor'].' ">' .$info_proveedor[$i]['nom_empresa']. '</option>';
    }
    }
    echo $proveedor;
    die();
   }
	 public function getMarca () {
    $marca ="" ;
    $info_marcas=$this->model->getMarca();
    if (count($info_marcas)>0) {
    for ($i=0; $i < count($info_marcas) ; $i++) {
    	$marca .='<option value = " '.$info_marcas[$i]['id_marca'].' ">' .$info_marcas[$i]['marca']. '</option>';
    }
    }
    echo $marca;
    die();
   }
	 public function getCategorias () {
    $categoria ="" ;
    $info_categorias=$this->model->getCategorias();
    if (count($info_categorias)>0) {
    for ($i=0; $i < count($info_categorias) ; $i++) {
    	$categoria .='<option value = " '.$info_categorias[$i]['id_categoria'].' ">' .$info_categorias[$i]['categoria']. '</option>';
    }
    }
    echo $categoria;
    die();
   }
	 public function getGrupo () {
    $grupo ="" ;
    $info_grupo=$this->model->getGrupo();
    if (count($info_grupo)>0) {
    for ($i=0; $i < count($info_grupo) ; $i++) {
    	$grupo .='<option value = " '.$info_grupo[$i]['id_grupo'].' ">' .$info_grupo[$i]['grupo']. '</option>';
    }
    }
    echo $grupo;
    die();
   }
	 public function getTip_imp () {
    $isv ="" ;
    $info_isv=$this->model->getTip_imp();
    if (count($info_isv)>0) {
    for ($i=0; $i < count($info_isv) ; $i++) {
    	$isv .='<option value = " '.$info_isv[$i]['id_tip_impuesto'].' ">' .$info_isv[$i]['nom_isv']. '</option>';
    }
    }
    echo $isv;
    die();
   }
	 public function getUnidades_medidas () {
    $unidades_medidas ="" ;
    $info_unidades_medidas=$this->model->getUnidades_medidas();
    if (count($info_unidades_medidas)>0) {
    for ($i=0; $i < count($info_unidades_medidas) ; $i++) {
    	$unidades_medidas .='<option value = " '.$info_unidades_medidas[$i]['id_uni_medida'].' ">' .$info_unidades_medidas[$i]['uni_medida']. '</option>';
    }
    }
    echo $unidades_medidas;
    die();
   }
	 public function updateProductos($params) {
   	if (empty($params)) {
         header('location: ' . Base_URL() . '/Producto/Tabla');
      } else {
         $arrData = explode(",", $params);
         $id_producto = $arrData[0];
         $request = $this->model->select_producto($id_producto);
         if (empty($request)) {
            header('location: ' . Base_URL() . '/Producto/Tabla');
         }
      }
      $data['productos'] = $request;
      $data['page_tag'] = "Productos - Inversiones Picky";
      $data['page_title'] = "Productos";
      $data['page_name'] = "Editar Producto";
      $data['page_funtions_js'] = "funtions_productos.js";
      $this->views->getView($this, "updateProductos", $data);

   }
   public function ActualizarProducto () {
   	  if (empty($_POST['nomproducto']) || empty($_POST['descripcion']) || empty($_POST['proveedor']) || empty($_POST['marca']) || empty($_POST['categorias']) || empty($_POST['grupo']) || empty($_POST['pre_compra']) || empty($_POST['pre_venta']) || empty($_POST['isv']) || empty($_POST['pre_reventa']) || empty($_POST['sto_minimo'])  || empty($_POST['sto_maximo']) || empty($_POST['uni_medida']) || empty($_POST['concepto']) || empty($_POST['cantidad']) ) {

     	$arrResponse = array("status" => false, "msg" => 'Por favor rellenar todos los campos.');
     } else {
		 $nom_producto=strClean($_POST['nomproducto']);
 	 	 $descripcion=strClean($_POST['descripcion']);
 	 	 $proveedor=intval($_POST['proveedor']);
 	 	 $marca=intval($_POST['marca']);
 	 	 $categoria=intval($_POST['categorias']);
 	 	 $grupo=intval($_POST['grupo']);
 	 	 $pre_compra=intval($_POST['pre_compra']);
 	 	 $pre_venta=intval($_POST['pre_venta']);
 	 	 $isv=intval($_POST['isv']);
 	 	 $pre_reventa=intval($_POST['pre_reventa']);
 	 	 $sto_minimo=intval($_POST['sto_minimo']);
 	 	 $sto_maximo=intval($_POST['sto_maximo']);
 	 	 $unidades_medidas=intval($_POST['uni_medida']);
 	 	 $concepto=strClean($_POST['concepto']);
 	 	 $cantidad=intval($_POST['cantidad']);
 	 	 $producto_actualizar=$this->model->setProducto($nom_producto,$descripcion,$proveedor,$marca,$categoria,$grupo,$pre_compra,$pre_venta,$isv,$pre_reventa,$sto_minimo,$sto_maximo,$unidades_medidas,$concepto,$cantidad);
     	if ($producto_actualizar>0) {
     		$arrResponse = array("status" => true, "msg" => 'Datos Actualizados correctamente.');
     	} elseif ($proveedores_actualizar=='existeproducto') {
     		$arrResponse = array("status" => false, "msg" => 'Producto Existente.');
     	} else {
     	   $arrResponse = array("status" => false, "msg" => 'No se guardaron los datos.');
     	}

     }
     echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
      die();
   }

}
?>
