<?php
class ProductosModel extends Mysql
{

  public function __construct()
  {
    parent::__construct();
  }
  public function select_producto()
  {
    $consulta_productos="SELECT `id_producto`,`nom_producto`,`des_producto`,`pre_venta` FROM `productos`";
    $resultado_productos=$this->selectAll($consulta_productos);
    return $resultado_productos;
  }
  public function select_productos($id_producto)
  {
    $consulta_producto="SELECT pro.id_proveedor,pro.nom_empresa,m.id_marca, m.marca,c.id_categoria,c.categoria,g.id_grupo,g.grupo,um.id_uni_medida,um.uni_medida, id_producto, nom_producto, des_producto, pre_compra, pre_venta,tp.id_tip_impuestos,tp.nom_isv,tp.porcentaje, pre_reventa, sto_minimo, sto_maximo  FROM productos p
      INNER JOIN proveedores pro ON p.id_proveedor = pro.id_proveedor
      inner join marcas m on p.id_marca = m.id_marca
      inner join categorias c on p.id_categoria = c.id_categoria
      inner join grupos g on p.id_grupo = g.id_grupo
      inner join tipos_impuestos tp on p.id_tip_impuesto = tp.id_tip_impuestos
      inner join unidades_medidas um on p.id_uni_medida = um.id_uni_medida WHERE p.id_producto = $id_producto";
    $resultado_producto=$this->select($consulta_producto);
    return $resultado_producto;
  }
  public function eliminarProducto($eliminar_idproducto)
 {
   $borrar_producto="DELETE  FROM `productos` WHERE `id_producto` = $eliminar_idproducto";
     $eliminar_producto=$this->delete($borrar_producto);
   return $eliminar_producto;
 }
 public function getProveedores ()
  {
    $proveedores="SELECT * FROM `proveedores`";
    $resultado_productos=$this->selectAll($proveedores);
    return $resultado_productos;
  }
  public function getMarca ()
   {
     $marca="SELECT * FROM `marcas`";
     $resultado_marca=$this->selectAll($marca);
     return $resultado_marca;
   }
   public function getCategorias ()
    {
      $categoria="SELECT * FROM `categorias`";
      $resultado_categoria=$this->selectAll($categoria);
      return $resultado_categoria;
    }
    public function getGrupo ()
     {
       $grupos="SELECT * FROM `grupos`";
       $resultado_grupos=$this->selectAll($grupos);
       return $resultado_grupos;
     }
     public function getTip_imp ()
      {
        $tip_imp="SELECT * FROM `tipos_impuestos`";
        $resultado_tip_imp=$this->selectAll($tip_imp);
        return $resultado_tip_imp;
      }
      public function getUnidades_medidas ()
       {
         $unidades_medidas="SELECT * FROM `unidades_medidas`";
         $resultado_uni_medida=$this->selectAll($unidades_medidas);
         return $resultado_uni_medida;
       }
    public function setProducto($proveedor,$marca,$categoria,$grupo,$tip_imp,$unidades_medidas,$nom_producto,$des_producto,$pre_compra,$pre_venta,$pre_reventa,$sto_minimo,$sto_maximo,$concepto,$cantidad)
  {
    $return="";
    $Fecha_registro = date("Y-m-d H:i:s");
    $Usuario_registro = "Root-Kevin";
    $vali_nombreproduto = "SELECT * FROM `productos` WHERE nom_producto = '$nomproducto'";
    $resultado_vali_nombreproducto=$this->selectAll($vali_nombreproduto);
    if (!empty($resultado_vali_nombreproducto)) {
       $return="existeproducto";
    }
    if (empty($resultado_vali_nombreproducto)) {
      $insertar_producto = "INSERT INTO `productos`(`id_proveedor`, `id_marca`, `id_categoria`, `id_grupo`, `id_tip_impuesto`, `id_uni_medida`, `nom_producto`, `des_producto`, `pre_compra`, `pre_venta`, `pre_reventa`, `sto_minimo`,`sto_maximo`, `fec_registro`, `usr_registro`)
      VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);
      SELECT @id_producto:=MAX(id_producto) FROM `productos`;

      INSERT INTO `inventarios`(`id_producto`, `concepto`, `entradas`, `salidas`, `cantidad`,`fec_registro`, `usr_registro`)
      VALUES (@id_producto,?,?,?,?,?,?);
      SELECT @id_inventario:=MAX(id_inventario) FROM `inventarios`;";
     $arrdata=array($proveedor,$marca,$categoria,$grupo,$tip_imp,$unidades_medidas,$nom_producto,$des_producto,$pre_compra,$pre_venta,$pre_reventa,$sto_minimo,$sto_maximo,$Fecha_registro,$Usuario_registro,$concepto,$cantidad,$Fecha_registro,$Usuario_registro);
     $eje_insertarproducto=$this->insert($insertar_producto,$arrdata);
     $return=$eje_insertarproducto;
    }
    return $return;
  }
  public function updateProveedores($proveedor,$marca,$categoria,$grupo,$tip_imp,$unidades_medidas,$nom_producto,$des_producto,$pre_compra,$pre_venta,$pre_reventa,$sto_minimo,$sto_maximo,$concepto,$cantidad)
  {
    $return="";
    $Fecha_registro = date("Y-m-d H:i:s");
    $Usuario_registro = "Root-Kevin";
    $vali_nombreproduto = "SELECT * FROM `productos` WHERE nom_producto = '$nomproducto' AND id_producto != $id_producto ";
    $resultado_vali_nombreproducto=$this->selectAll($vali_nombreproduto);
    if (!empty($resultado_vali_nombreproducto)) {
       $return="existeproducto";
    }
    if (empty($resultado_vali_nombreproducto)) {
      $actualizar_producto = "UPDATE `productos` SET
      `id_producto`=:id_producto,
      `id_proveedor`=:proveedor,
      `id_marca`=:marca,
      `id_categoria`=:categoria,
      `id_grupo`=:grupo,
      `id_tip_impuesto`=:isv,
      `id_uni_medida`=:uni_medida,
      `nom_producto`=:nom_producto,
      `des_producto`=:descripcion,
      `pre_compra`=:pre_compra,
      `pre_venta`=:pre_venta,
      `pre_reventa`=:pre_reventa,
      `sto_maximo`=:sto_maximo,
      `sto_minimo`=:sto_minimo,
      `fec_Registro`=:Fecha,
      `usr_Registro`=:Usr
       WHERE `id_producto`= ?;";
     $arrdata=array($proveedor,$marca,$categoria,$grupo,$tip_imp,$unidades_medidas,$nom_producto,$des_producto,$pre_compra,$pre_venta,$pre_reventa,$sto_minimo,$sto_maximo,$Fecha_registro,$Usuario_registro);
     $eje_actproducto=$this->update($actualizar_producto,$arrdata);
     $return=$eje_actproducto;
    }
    return $return;

  }

}
 ?>
