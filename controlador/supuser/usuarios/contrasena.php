<?php 
	
	include("../../../modelo/conexion.php"); 

	/*Modificar el Tipo de Usuario*/
	$iduser = $_POST['iduser'];
	$password = md5($_POST['password']);

	$query = "UPDATE usuarios SET pass= '$password' WHERE id_user='$iduser'";

	$resultado = $conexion->query($query);

	if($resultado){
		echo '<script languaje="javascript">
		alert("SE A MODIFICADO CORRECTAMENTE LA CONTRASEÑA");
			window.location="../../../vista/supuser/usuarios/usuarios.php";
		</script>';
	}else{
		echo '<script languaje="javascript">alert("NO SE PUDO MODIFICAR LA CONTRASEÑA!!! \n\n Verifique que los Datos Ingresados sean Correctos"); 
		window.location="../../../vista/supuser/usuarios/usuarios.php";
		</script>';
	}
	
?>