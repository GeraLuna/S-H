<?php  
	
	include("../../../modelo/conexion.php"); 

	/*Registro de Tipo de Usuario*/
	$puesto = $_POST['puesto'];
	$id_depto = $_POST['id_depto'];

	$query = "INSERT INTO puestos (puesto, id_depto) VALUES ('$puesto', '$id_depto')";

	$resultado = $conexion->query($query);

	/*echo "$departamento<br>";*/

	if($resultado){
		echo '<script languaje="javascript">
			alert("¡REGISTRO CORRECTO!\n\n Se ha Registrado Correctamente el Puesto."); 
		window.location="../../../vista/supuser/puestos/puestos.php";</script>';
	}else{
		echo '<script languaje="javascript">
			alert("¡REGISTRO FALLIDO!\n\n Verifique que los Datos Ingresados sean Correctos."); 
		window.location="../../../vista/supuser/puestos/puestos.php";</script>';
	}

?>