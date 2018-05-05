<?php 
	
	include("../../../modelo/conexion.php"); 

	/*Modificar el Tipo de Usuario*/
	$id_salida = $_POST['id_salida'];
	$id_staff = $_POST['id_staff'];
	$id_category = $_POST['id_category'];
	$id_article = $_POST['id_article'];
	$quantity = $_POST['quantity'];
	$fecha_out = $_POST['fecha_out'];
	$id_concept = $_POST['id_concept'];

	$query = "UPDATE salida SET id_personal = '$id_staff', id_categoria ='$id_category', id_articulo='$id_article', cantidad='$quantity', fecha_salida ='$fecha_out', concepto='$id_concept' WHERE id_salida='$id_salida'";

	$resultado = $conexion->query($query);



	if($resultado){
		echo '<script languaje="javascript">
		alert("SE A MODIFICADO CORRECTAMENTE LA SALIDA DEL ARTICULO");
			window.location="../../../vista/supuser/salida/salida.php";
		</script>';
	}else{
		echo '<script languaje="javascript">alert("NO SE PUDO MODIFICAR LA SALIDA DEL ARTICULO!!! \n\n Verifique que los Datos Ingresados sean Correctos"); 
		window.location="../../../vista/supuser/salida/salida.php";
		</script>';
	}
	
?>