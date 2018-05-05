<?php 
	
	include("../../../modelo/conexion.php"); 

	/*Modificar el Tipo de Usuario*/
	$id_articulo = $_POST['id_articulo'];
	$id_supplier = $_POST['id_supplier'];
	$id_category = $_POST['id_category'];
	$article = $_POST['article'];
	$type = $_POST['type'];
	$size = $_POST['size'];
	$abbreviation = $_POST['abbreviation'];
	$stocks = $_POST['stocks'];

	$query = "UPDATE articulo SET id_proveedor='$id_supplier', id_categoria='$id_category', articulo='$article', tipo='$type', talla='$size', abreviacion='$abbreviation', stock='$stocks' WHERE id_articulo='$id_articulo'";

	$resultado = $conexion->query($query);

	/*echo "$departamento<br>";*/

	if($resultado){
		echo '<script languaje="javascript">
		alert("SE A MODIFICADO CORRECTAMENTE EL ARTICULO");
			window.location="../../../vista/admin/articulos/articulos.php";
		</script>';
	}else{
		echo '<script languaje="javascript">alert("NO SE PUDO MODIFICAR EL ARTICULO!!! \n\n Verifique que los Datos Ingresados sean Correctos"); 
		window.location="../../../vista/admin/articulos/articulos.php";
		</script>';
	}
	
?>