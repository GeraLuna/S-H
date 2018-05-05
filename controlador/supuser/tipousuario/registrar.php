<?php  
	
	include("../../../modelo/conexion.php"); 

	/*Registro de Tipo de Usuario*/
	$tipo_usuario = $_POST['tipo_usuario'];

	$query = "INSERT INTO tipo_usuario (tipo_usuario) VALUES ('$tipo_usuario')";

	$resultado = $conexion->query($query);

	/*echo "$tipo_usuario<br>";*/

	if($resultado){
		echo '<script languaje="javascript">
			alert("¡REGISTRO CORRECTO!\n\n Se ha Registrado Correctamente el Tipo de Usuario."); 
		window.location="../../../vista/supuser/tipousuario/tipousuario.php";</script>';
	}else{
		echo '<script languaje="javascript">
			alert("¡REGISTRO FALLIDO!\n\n Verifique que los Datos Ingresados sean Correctos."); 
		window.location="../../../vista/supuser/tipousuario/tipousuario.php";</script>';
	}

?>