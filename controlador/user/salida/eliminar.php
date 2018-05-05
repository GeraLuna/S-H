<?php 
	include("../../../modelo/conexion.php"); 

	/*$id_tipo_user = $_POST['id_tipo_user'];*/
	
    $id_salida = isset($_REQUEST['id_salida']) ? $_REQUEST['id_salida'] : NULL;

	$query = "DELETE FROM salida WHERE id_salida='".$id_salida."'";

	$resultado = $conexion->query($query);

	if($resultado){
		echo '<script languaje="javascript">
			alert("¡SE HA ELIMINADO CORRECTAMENTE LA SALIDA DE LOS ARTICULOS!"); 
		window.location="../../../vista/user/salida/salida.php";</script>';
	}else{
		echo '<script languaje="javascript">
			alert("¡NO SE HA PODIDO ELIMINAR LA SALIDA DE LOS ARTICULOS!"); 
		window.location="../../../vista/user/salida/salida.php";</script>';
	}               

?>