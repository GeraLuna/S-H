<?php 
	include("../../../modelo/conexion.php"); 

	/*$id_tipo_user = $_POST['id_tipo_user'];*/
	
    $id_tipo_user = isset($_REQUEST['id_tipo_user']) ? $_REQUEST['id_tipo_user'] : NULL;

	$query = "DELETE FROM tipo_usuario WHERE id_tipo_user='".$id_tipo_user."'";

	$resultado = $conexion->query($query);

	if($resultado){
		echo '<script languaje="javascript">
			alert("¡SE HA ELIMINADO CORRECTAMENTE EL TIPO DE USUARIO!"); 
		window.location="../../../vista/supuser/tipousuario/tipousuario.php";</script>';
	}else{
		echo '<script languaje="javascript">
			alert("¡NO SE HA PODIDO ELIMINAR EL TIPO DE USUARIO!"); 
		window.location="../../../vista/supuser/tipousuario/tipousuario.php";</script>';
	}               


	/*$id_tipo_user = isset($_REQUEST['id_tipo_user']) ? $_REQUEST['id_tipo_user'] : NULL;

	$query = "DELETE FROM tipo_usuario WHERE id_tipo_user='".$id_tipo_user."'";

	$resultado = $conexion->query($query);

	if($resultado){
		echo '<script languaje="javascript">
			alert("¡SE HA ELIMINADO CORRECTAMENTE EL TIPO DE USUARIO!"); 
		window.location="../../vista/supuser/tipousuario/tipousuario.php";</script>';
	}else{
		echo '<script languaje="javascript">
			alert("¡NO SE HA PODIDO ELIMINAR EL TIPO DE USUARIO!"); 
		window.location="../../vista/supuser/tipousuario/tipousuario.php";</script>';
	}*/
?>