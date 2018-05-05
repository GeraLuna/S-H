<?php  
	
	include("../../../modelo/conexion.php"); 

	/*Registro de Tipo de Usuario*/
	$id_tipo_concepto = $_POST['id_tipo_concepto'];
	$concepto = $_POST['concepto'];

	$query = "INSERT INTO concepto (id_tipo_concepto, concepto) VALUES ('$id_tipo_concepto', '$concepto')";

	$resultado = $conexion->query($query);

	/*echo "$departamento<br>";*/

	if($resultado){
		echo '<script languaje="javascript">
			alert("¡REGISTRO CORRECTO!\n\n Se ha Registrado Correctamente el Concepto del Articulo."); 
		window.location="../../../vista/supuser/concepto/concepto.php";</script>';
	}else{
		echo '<script languaje="javascript">
			alert("¡REGISTRO FALLIDO!\n\n Verifique que los Datos Ingresados sean Correctos."); 
		window.location="../../../vista/supuser/concepto/concepto.php";</script>';
	}

?>