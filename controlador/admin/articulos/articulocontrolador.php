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
				$categoria = $producto->categoria;
				$articulo = $producto->articulo;
				$tipo = $producto->tipo;
				$talla = $producto->talla;
				$stock = $producto->stock;
				$cantidad = $producto->cantidad;
				
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
	
		if (isset($_POST['id_articulo'])) {
			try {
				unset($_SESSION['detalle'][$_POST['id_articulo']]);
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