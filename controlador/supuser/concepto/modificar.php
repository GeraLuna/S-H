<?php 
	
	include("../../../modelo/conexion.php"); 

	/*Modificar el Tipo de Usuario*/
	$id_concepto = $_POST['id_concepto'];
	$id_type_concept = $_POST['id_type_concept'];
	$concept = $_POST['concept'];

	$query = "UPDATE concepto SET concepto='$concept', id_tipo_concepto='$id_type_concept' WHERE id_concepto='$id_concepto'";

	$resultado = $conexion->query($query);

	/*echo "$concepto<br>";*/

	if($resultado){
		echo '<script languaje="javascript">
		alert("SE A MODIFICADO CORRECTAMENTE EL CONCEPTO DEL ARTICULO");
			window.location="../../../vista/supuser/concepto/concepto.php";
		</script>';
	}else{
		echo '<script languaje="javascript">alert("NO SE PUDO MODIFICAR EL CONCEPTO DEL ARTICULO!!! \n\n Verifique que los Datos Ingresados sean Correctos"); 
		window.location="../../../vista/supuser/concepto/concepto.php";
		</script>';
	}
	
?>