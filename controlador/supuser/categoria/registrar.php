<?php  
	
	include("../../../modelo/conexion.php"); 

	/*Registro de Tipo de Usuario*/
	$categoria = $_POST['categoria'];

	$query = "INSERT INTO categoria (categoria) VALUES ('$categoria')";

	$resultado = $conexion->query($query);

	/*echo "$departamento<br>";*/

	if($resultado){
		echo '<script languaje="javascript">
			alert("¡REGISTRO CORRECTO!\n\n Se ha Registrado Correctamente la Categoria."); 
		window.location="../../../vista/supuser/categoria/categoria.php";</script>';
	}else{
		echo '<script languaje="javascript">
			alert("¡REGISTRO FALLIDO!\n\n Verifique que los Datos Ingresados sean Correctos."); 
		window.location="../../../vista/supuser/categoria/categoria.php";</script>';
	}

?>