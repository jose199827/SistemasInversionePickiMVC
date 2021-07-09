<?php
class Facturacion extends Controllers
{
   public function __construct()
   {
      parent::__construct();
      session_start();
      //session_regenerate_id(true);
      if (empty($_SESSION['login'])) {
         header('location: ' . Base_URL() . '/login');
      }
      getPermisos(2);
   }
   //Se crea el método 
   public function Facturacion()
   {
      $data['page_tag'] = "Facturación - Inversiones Picky";
      $data['page_title'] = "Facturación";
      $data['page_name'] = "Registrar Facturación";
      $data['page_funtions_js'] = "funtions_facturacion.js";
      $this->views->getView($this, "facturacion", $data);
   }
   public function Tabla()
   {
      $data['page_tag'] = "Tabla de Facturación - Inversiones Picky";
      $data['page_title'] = "Tabla";
      $data['page_name'] = "Tabla de Facturación";
      $data['page_funtions_js'] = "funtions_facturacion.js";
      $this->views->getView($this, "tabla", $data);
   }
   public function getFacturas()
   {
      $arrData = $this->model->selectFacturas();
      /*   dep($arrData);
      exit(); */
      for ($i = 0; $i < count($arrData); $i++) {
         $btnEdit = '';
         $btnDel = '';
         if ($_SESSION['permisosMod']['u']) {
            $btnEdit = '<a class="dropdown-item btnEditEmpleados" href="' . Base_URL() . '/Empleados/updateEmpleado/' . $arrData[$i]['id_factura'] . '" ><i class="dw dw-edit2"></i> Editar</a>';
         }
         if ($_SESSION['permisosMod']['d']) {
            $btnDel = '<a class="dropdown-item btnDelEmpleados" href="javascript:;" onClick="fntDelEmpleados(' . $arrData[$i][' 	id_factura'] . ')"><i class="dw dw-delete-3"></i> Eliminar</a>';
         }
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

      echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
      die();
   }
   public function getCliente()
   {
      if ($_POST) {
         $id = intval($_POST["idCliente"]);
         $request = $this->model->getCliente($id);
         /* dep($request);
         exit(); */
         if ($request > 0) {
            $arrResponse = array("status" => true, "msg" => 'Datos guardados correctamente.', "data" => $request);
         } else {
            $arrResponse = array("status" => false, "msg" => 'No hay clientes con es Nº Identidad.');
         }
      }
      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
      die();
   }
   public function getProducto()
   {
      if ($_POST) {
         $id = intval($_POST["idProducto"]);
         $request = $this->model->getProducto($id);
         /* dep($request);
         exit(); */
         if ($request > 0) {
            /*  $request['precio'] = SMONEY . formatMoney($request['pre_reventa']); */
            $arrResponse = array("status" => true, "msg" => 'Datos guardados correctamente.', "data" => $request);
         } else {
            $arrResponse = array("status" => false, "msg" => 'No hay clientes con es Nº Identidad.');
         }
      }
      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
      die();
   }
   public function setProducto()
   {
      if ($_POST) {
         if (empty($_POST['codproducto']) || empty($_POST['cantidad'])) {
            $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
         } else {
            $id = intval($_POST["codproducto"]);
            $cantidad = intval($_POST["cantidad"]);
            $descuento = intval($_POST["descuento"]);
            $token = md5($_SESSION['idUser']);
            $request = $this->model->getImpuesto($id);
            $request1 = $this->model->getDatelle($id, $cantidad, $token, $descuento);
            /* dep($request1);
            exit(); */
            $detalleTabla = '';
            $subtotal = 0;
            $isv = 0;
            $total = 0;
            $arrData = array();
            /* dep($request1);
            exit(); */
            if ($request1 > 0) {
               if ($request > 0) {
                  $isv = $request['porcentaje'];
               }
               $data = $request1;
               for ($i = 0; $i < count($data); $i++) {
                  $descuento = (($data[$i]['descuento']) / 100);
                  $precioTotal = round(($data[$i]['cantidad']) * ($data[$i]['precio_venta']), 2);
                  $valDes = $precioTotal * $descuento;
                  $precioTotal = $precioTotal - $valDes;
                  $subtotal = round($subtotal + $precioTotal, 2);
                  $total = round($total + $precioTotal, 2);

                  $detalleTabla .= '
                  <tr>
                        <td>' . $data[$i]['id_producto'] . '</td>
                        <td colspan="2">' . $data[$i]['des_producto'] . '</td>
                        <td class="textrcenter">' . $data[$i]['cantidad'] . '</td>
                        <td class="textright">' . SMONEY . formatMoney($data[$i]['precio_venta'])   . '</td>
                        <td class="textright">' . $data[$i]['descuento'] . '%</td>
                        <td class="textright">' . SMONEY . formatMoney($precioTotal) . '</td>
                        <td class="">
                        <a href="#" id="add_product_venta" class="link_delete btn btn-danger" onclick="event.preventDefault(); del_product_detalle(' . $data[$i]['id'] . ');"><i
                              class="icon-copy dw dw-delete-1"></i></a>
                        </td>
                     </tr>
                  ';
               } //ghjghj
               $impuesto = round($subtotal * ($isv / 100), 2);
               $t = round($subtotal - $impuesto, 2);
               $total = round($t + $impuesto, 2);
               $detalleTotal = '
                      <tr>
                        <td colspan="6" class="textright">SubTotal</td>
                        <td class="textright">' . SMONEY . formatMoney($t) . '</td>
                     </tr>
                     <tr>
                        <td colspan="6" class="textright">Isv (' . $isv . ')%</td>
                        <td class="textright">' .  SMONEY . formatMoney($impuesto) . '</td>
                     </tr>
                     <td colspan="6" class="textright">Total</td>
                     <td class="textright">' . SMONEY . formatMoney($total) . '</td>
                     </tr>';
               $arrData['detalle'] = $detalleTabla;
               $arrData['totales'] = $detalleTotal;
               $arrResponse = array("status" => true, "msg" => 'Datos guardados correctamente.', "data" => $arrData);
            }
            /*             dep($isv);
            exit(); */
            /*  if ($request > 0) {
               $arrResponse = array("status" => true, "msg" => 'Datos guardados correctamente.', "data" => $request);
            } else {
               $arrResponse = array("status" => false, "msg" => 'No hay clientes con es Nº Identidad.');
            } */
         }
      }
      /*       dep($arrResponse);
      exit(); */
      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
      die();
   }
   public function deleteFactura()
   {
      $token = md5($_SESSION['idUser']);
      $request = $this->model->deleteFactura($token);
      if ($request) {
         $arrResponse = array("status" => true, "msg" => 'Datos eliminados de la factura.');
      } else {
         $arrResponse = array("status" => false, "msg" => 'No hay clientes con es Nº Identidad.');
      }
      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
      die();
   }
   public function getFactura()
   {
      if ($_POST) {
         $codcliente = intval($_POST["codcliente"]);
         $token = md5($_SESSION['idUser']);
         $idUser = $_SESSION['idUser'];
         $request = $this->model->getDetalle_Temp($token);
         /* dep($request);
         exit(); */
         if ($request > 0) {
            $requestProcesar = $this->model->getProcesar($idUser, $codcliente, $token);
            dep($requestProcesar);
            exit();
            if ($requestProcesar > 0) {
               $arrResponse = array("status" => true, "msg" => 'Datos guardados correctamente.', "data" => $requestProcesar);
            }
         } else {
            $arrResponse = array("status" => false, "msg" => 'No hay clientes con es Nº Identidad.');
         }
      }
      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
      die();
   }
}