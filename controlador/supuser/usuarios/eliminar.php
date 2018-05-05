<?php 
	include("../../../modelo/conexion.php"); 

	/*$id_tipo_user = $_POST['id_tipo_user'];*/
	
    $id_user = isset($_REQUEST['id_user']) ? $_REQUEST['id_user'] : NULL;

	$query = "DELETE FROM usuarios WHERE id_user='".$id_user."'";

	$resultado = $conexion->query($query);

	if($resultado){
		echo '<script languaje="javascript">
			alert("¡SE HA ELIMINADO CORRECTAMENTE EL USUARIO!"); 
		window.location="../../../vista/supuser/usuarios/usuarios.php";</script>';
	}else{
		echo '<script languaje="javascript">
			alert("¡NO SE HA PODIDO ELIMINAR EL USUARIO!"); 
		window.location="../../../vista/supuser/usuarios/usuarios.php";</script>';
	}               

?>