<?php
session_start();
if(isset($_GET["page"])){
	$page=$_GET["page"];
}else{
	$page=0;
}

require_once '../../../modelo/conexion.php';
require_once '../../../modelo/articulo.php';

switch($page){

	case 1:
		$objProducto = new Articulo();
		$json = array();
		$json['msj'] = 'Articulo Agregado';
		$json['success'] = true;
	
		if (isset($_POST['id_articulo']) && $_POST['id_articulo']!='' && isset($_POST['cantidad']) && $_POST['cantidad']!='') {
			try {
				$cantidad = $_POST['cantidad'];
				$id_articulo = $_POST['id_articulo'];
				
				$resultado_producto = $objProducto->getById($id_articulo);
				$producto = $resultado_producto->fetchObject();
				$descripcion = $producto->descripcion;
				$precio = $producto->precio;
				
				$subtotal = $cantidad * $precio;
				
				$_SESSION['detalle'][$id_articulo] = array('id_articulo'=>$id_articulo, 'categoria'=>$categoria, 'articulo'=>$articulo, 'tipo'=>$tipo, 'talla'=>$talla, 'stock'=>$stock, 'cantidad'=>$cantidad);

				$json['success'] = true;

				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'Ingrese un producto y/o ingrese cantidad';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;

	case 2:
		$json = array();
		$json['msj'] = 'Producto Eliminado';
		$json['success'] = true;
	
		if (isset($_POST['id'])) {
			try {
				unset($_SESSION['detalle'][$_POST['id']]);
				$json['success'] = true;
	
				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}
		break;
		
	case 3:
		$json = array();
		$json['msj'] = 'Precio actualizado';
		$json['success'] = true;
	
		if (isset($_POST['id'])) {
			try {
				//unset($_SESSION['detalle'][$_POST['id']]);
				$producto_id = $_POST['id'];
				$cantidad = $_SESSION['detalle'][$producto_id]['cantidad'];
				$descripcion = $_SESSION['detalle'][$producto_id]['producto'];
				$precio = $_POST['precio'];
				
				$subtotal = $cantidad * $precio;
				
				$_SESSION['detalle'][$producto_id] = array('id'=>$producto_id, 'producto'=>$descripcion, 'cantidad'=>$cantidad, 'precio'=>$precio, 'subtotal'=>$subtotal);
				
				$json['success'] = true;
	
				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}
		break;

}
?>