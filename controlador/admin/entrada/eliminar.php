<?php 
	include("../../../modelo/conexion.php"); 

	/*$id_tipo_user = $_POST['id_tipo_user'];*/
	
    $id_entrada = isset($_REQUEST['id_entrada']) ? $_REQUEST['id_entrada'] : NULL;

	$query = "DELETE FROM entrada WHERE id_entrada='".$id_entrada."'";

	$resultado = $conexion->query($query);

	if($resultado){
		echo '<script languaje="javascript">
			alert("¡SE HA ELIMINADO CORRECTAMENTE LA ENTRADA DE LOS ARTICULOS!"); 
		window.location="../../../vista/admin/entrada/entrada.php";</script>';
	}else{
		echo '<script languaje="javascript">
			alert("¡NO SE HA PODIDO ELIMINAR LA ENTRADA DE LOS ARTICULOS!"); 
		window.location="../../../vista/admin/entrada/entrada.php";</script>';
	}               

?>