<?php 
	
	include("../../../modelo/conexion.php"); 

	/*Modificar el Tipo de Usuario*/
	$id_tipo_concepto = $_POST['id_tipo_concepto'];
	$type_concept = $_POST['type_concept'];

	$query = "UPDATE tipo_concepto SET tipo_concepto='$type_concept' WHERE id_tipo_concepto='$id_tipo_concepto'";

	$resultado = $conexion->query($query);

	/*echo "$categoria<br>";*/

	if($resultado){
		echo '<script languaje="javascript">
		alert("SE A MODIFICADO CORRECTAMENTE EL TIPO DE CONCEPTO");
			window.location="../../../vista/admin/tipoconcepto/tipoconcepto.php";
		</script>';
	}else{
		echo '<script languaje="javascript">alert("NO SE PUDO MODIFICAR EL TIPO DE CONCEPTO!!! \n\n Verifique que los Datos Ingresados sean Correctos"); 
		window.location="../../../vista/admin/tipoconcepto/tipoconcepto.php";
		</script>';
	}
	
?>