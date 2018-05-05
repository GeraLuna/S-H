<?php 
	include("../../../modelo/conexion.php"); 

	/*$id_tipo_user = $_POST['id_tipo_user'];*/
	
    $id_concepto = isset($_REQUEST['id_concepto']) ? $_REQUEST['id_concepto'] : NULL;

	$query = "DELETE FROM concepto WHERE id_concepto='".$id_concepto."'";

	$resultado = $conexion->query($query);

	if($resultado){
		echo '<script languaje="javascript">
			alert("¡SE HA ELIMINADO CORRECTAMENTE EL CONCEPTO DEL ARTICULO!"); 
		window.location="../../../vista/admin/concepto/concepto.php";</script>';
	}else{
		echo '<script languaje="javascript">
			alert("¡NO SE HA PODIDO ELIMINAR EL CONCEPTO DEL ARTICULO!"); 
		window.location="../../../vista/admin/concepto/concepto.php";</script>';
	}               

?>