<?php 
	
	include("../../../modelo/conexion.php"); 

	/*Modificar el Tipo de Usuario*/
	$id_tipo_user = $_POST['id_tipo_user'];
	$tipousuario = $_POST['tipousuario'];

	$query = "UPDATE tipo_usuario SET tipo_usuario='$tipousuario' WHERE id_tipo_user='$id_tipo_user'";

	$resultado = $conexion->query($query);

	/*echo "$tipo_usuario<br>";*/

	if($resultado){
		echo '<script languaje="javascript">
		alert("SE A MODIFICADO CORRECTAMENTE EL TIPO DE USUARIO");
			window.location="../../../vista/supuser/tipousuario/tipousuario.php";
		</script>';
	}else{
		echo '<script languaje="javascript">alert("NO SE PUDO MODIFICAR EL TIPO DE USUARIO!!! \n\n Verifique que los Datos Ingresados sean Correctos"); 
		window.location="../../../vista/supuser/tipousuario/tipousuario.php";
		</script>';
	}
	
?>
