<?php 
	include("../../../modelo/conexion.php"); 

	/*$id_tipo_user = $_POST['id_tipo_user'];*/
	
    $id_puesto = isset($_REQUEST['id_puesto']) ? $_REQUEST['id_puesto'] : NULL;

	$query = "DELETE FROM puestos WHERE id_puesto='".$id_puesto."'";

	$resultado = $conexion->query($query);

	if($resultado){
		echo '<script languaje="javascript">
			alert("¡SE HA ELIMINADO CORRECTAMENTE EL PUESTO!"); 
		window.location="../../../vista/admin/puestos/puestos.php";</script>';
	}else{
		echo '<script languaje="javascript">
			alert("¡NO SE HA PODIDO ELIMINAR EL PUESTO!"); 
		window.location="../../../vista/admin/puestos/puestos.php";</script>';
	}               

?>