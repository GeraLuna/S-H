<?php  
	
	include("../../../modelo/conexion.php"); 

	/*Registro de Tipo de Usuario*/
	$no_emp = $_POST['no_emp'];
	$nombres = $_POST['nombres'];
	$pat_ape = $_POST['pat_ape'];
	$mat_ape = $_POST['mat_ape'];
	$genero = $_POST['genero'];
	$fecha_ingreso = $_POST['fecha_ingreso'];
	$id_depto = $_POST['id_depto'];
	$id_puesto = $_POST['id_puesto'];

	$query = "INSERT INTO personal (no_emp, nombres, pat_ape, mat_ape, genero, fecha_ingreso, id_depto, id_puesto) VALUES ('$no_emp', '$nombres', '$pat_ape', '$mat_ape', '$genero', '$fecha_ingreso', '$id_depto', '$id_puesto')";

	$resultado = $conexion->query($query);

	/*echo "$no_emp<br>";
	echo "$nombres<br>";
	echo "$pat_ape<br>";
	echo "$mat_ape<br>";
	echo "$genero<br>";
	echo "$fecha_ingreso<br>";
	echo "$id_depto<br>";
	echo "$id_puesto<br>";*/

	if($resultado){
		echo '<script languaje="javascript">
			alert("¡REGISTRO CORRECTO!\n\n Se ha Registrado Correctamente el Empleado."); 
		window.location="../../../vista/user/personal/personal.php";</script>';
	}else{
		echo '<script languaje="javascript">
			alert("¡REGISTRO FALLIDO!\n\n Verifique que los Datos Ingresados sean Correctos."); 
		window.location="../../../vista/user/personal/personal.php";</script>';
	}

?>