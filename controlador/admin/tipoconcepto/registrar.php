<?php  
	
	include("../../../modelo/conexion.php"); 

	/*Registro de Tipo de Usuario*/
	$tipo_concepto = $_POST['tipo_concepto'];

	$query = "INSERT INTO tipo_concepto (tipo_concepto) VALUES ('$tipo_concepto')";

	$resultado = $conexion->query($query);

	/*echo "$departamento<br>";*/

	if($resultado){
		echo '<script languaje="javascript">
			alert("¡REGISTRO CORRECTO!\n\n Se ha Registrado Correctamente el Tipo de Concepto."); 
		window.location="../../../vista/admin/tipoconcepto/tipoconcepto.php";</script>';
	}else{
		echo '<script languaje="javascript">
			alert("¡REGISTRO FALLIDO!\n\n Verifique que los Datos Ingresados sean Correctos."); 
		window.location="../../../vista/admin/tipoconcepto/tipoconcepto.php";</script>';
	}

?>