<?php 
	
	include("../../../modelo/conexion.php"); 

	/*Modificar el Tipo de Usuario*/
	$id_entrada = $_POST['id_entrada'];
	$id_category = $_POST['id_category'];
	$id_article = $_POST['id_article'];
	$quantity = $_POST['quantity'];
	$fecha_in = $_POST['fecha_in'];
	$id_concept = $_POST['id_concept'];

	$query = "UPDATE entrada SET id_categoria ='$id_category', id_articulo='$id_article', cantidad='$quantity', fecha_entrada ='$fecha_in', concepto='$id_concept' WHERE id_entrada='$id_entrada'";

	$resultado = $conexion->query($query);



	if($resultado){
		echo '<script languaje="javascript">
		alert("SE A MODIFICADO CORRECTAMENTE LA ENTRADA DEL ARTICULO");
			window.location="../../../vista/user/entrada/entrada.php";
		</script>';
	}else{
		echo '<script languaje="javascript">alert("NO SE PUDO MODIFICAR LA ENTRADA DEL ARTICULO!!! \n\n Verifique que los Datos Ingresados sean Correctos"); 
		window.location="../../../vista/user/entrada/entrada.php";
		</script>';
	}
	
?>