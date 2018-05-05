<?php 
	include("../../../modelo/conexion.php"); 

	/*$id_tipo_user = $_POST['id_tipo_user'];*/
	
    $id_proveedor = isset($_REQUEST['id_proveedor']) ? $_REQUEST['id_proveedor'] : NULL;

	$query = "DELETE FROM proveedores WHERE id_proveedor='".$id_proveedor."'";

	$resultado = $conexion->query($query);

	if($resultado){
		echo '<script languaje="javascript">
			alert("¡SE HA ELIMINADO CORRECTAMENTE EL PROVEEDOR!"); 
		window.location="../../../vista/admin/proveedores/proveedores.php";</script>';
	}else{
		echo '<script languaje="javascript">
			alert("¡NO SE HA PODIDO ELIMINAR EL PROVEEDOR!"); 
		window.location="../../../vista/admin/proveedores/proveedores.php";</script>';
	}               

?>