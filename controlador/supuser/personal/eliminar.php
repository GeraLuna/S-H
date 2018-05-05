<?php 
	include("../../../modelo/conexion.php"); 

	/*$id_tipo_user = $_POST['id_tipo_user'];*/
	
    $id_personal = isset($_REQUEST['id_personal']) ? $_REQUEST['id_personal'] : NULL;

	$query = "DELETE FROM personal WHERE id_personal='".$id_personal."'";

	$resultado = $conexion->query($query);

	if($resultado){
		echo '<script languaje="javascript">
			alert("¡SE HA ELIMINADO CORRECTAMENTE EL EMPLEADO!"); 
		window.location="../../../vista/supuser/personal/personal.php";</script>';
	}else{
		echo '<script languaje="javascript">
			alert("¡NO SE HA PODIDO ELIMINAR EL EMPLEADO!"); 
		window.location="../../../vista/supuser/personal/personal.php";</script>';
	}               

?>