<?php 
	include("../../../modelo/conexion.php"); 

	/*$id_tipo_user = $_POST['id_tipo_user'];*/
	
    $id_categoria = isset($_REQUEST['id_categoria']) ? $_REQUEST['id_categoria'] : NULL;

	$query = "DELETE FROM categoria WHERE id_categoria='".$id_categoria."'";

	$resultado = $conexion->query($query);

	if($resultado){
		echo '<script languaje="javascript">
			alert("¡SE HA ELIMINADO CORRECTAMENTE LA CATEGORIA!"); 
		window.location="../../../vista/supuser/categoria/categoria.php";</script>';
	}else{
		echo '<script languaje="javascript">
			alert("¡NO SE HA PODIDO ELIMINAR LA CATEGORIA!"); 
		window.location="../../../vista/supuser/categoria/categoria.php";</script>';
	}               

?>