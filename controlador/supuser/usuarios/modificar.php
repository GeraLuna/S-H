<?php 
	
	include("../../../modelo/conexion.php"); 

	/*Modificar el Tipo de Usuario*/
	$id_user = $_POST['id_user'];
	$nomuser = $_POST['nomuser'];
	$usuario = $_POST['usuario'];
	$id_tipouser = $_POST['id_tipouser'];

	$query = "UPDATE usuarios SET nom_user='$nomuser', user='$usuario', id_tipo_user='$id_tipouser' WHERE id_user='$id_user'";

	$resultado = $conexion->query($query);

	if($resultado){
		echo '<script languaje="javascript">
		alert("SE A MODIFICADO CORRECTAMENTE EL USUARIO");
			window.location="../../../vista/supuser/usuarios/usuarios.php";
		</script>';
	}else{
		echo '<script languaje="javascript">alert("NO SE PUDO MODIFICAR EL USUARIO!!! \n\n Verifique que los Datos Ingresados sean Correctos"); 
		window.location="../../../vista/supuser/usuarios/usuarios.php";
		</script>';
	}
	
?>