<?php 
	
	include("../../../modelo/conexion.php"); 

	/*Registro de Usuarios*/
	$nom_user = $_POST['nom_user'];
	$user = $_POST['user'];
	$pass = md5($_POST['pass']);
	$id_tipo_user = $_POST['id_tipo_user'];

	$query = "INSERT INTO usuarios (nom_user, user, pass, id_tipo_user) VALUES ('$nom_user', '$user', '$pass', '$id_tipo_user')";

	$resultado = $conexion->query($query);

	/*echo "$nom_user<br>";
	echo "$user<br>";
	echo "$pass<br>";
	echo "$id_tipo_user<br>";*/

	if($resultado){
		echo '<script languaje="javascript">
			alert("¡REGISTRO CORRECTO!\n\n Se ha Registrado Correctamente el Usuario."); 
		window.location="../../../vista/supuser/usuarios/usuarios.php";</script>';
	}else{
		echo '<script languaje="javascript">
			alert("¡REGISTRO FALLIDO!\n\n Verifique que los Datos Ingresados sean Correctos."); 
		window.location="../../../vista/supuser/usuarios/usuarios.php";</script>';
	}

?>