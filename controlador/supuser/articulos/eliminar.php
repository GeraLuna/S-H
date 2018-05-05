<?php 
	include("../../../modelo/conexion.php"); 

	/*$id_tipo_user = $_POST['id_tipo_user'];*/
	
    $id_articulo = isset($_REQUEST['id_articulo']) ? $_REQUEST['id_articulo'] : NULL;

	$query = "DELETE FROM articulo WHERE id_articulo='".$id_articulo."'";

	$resultado = $conexion->query($query);

	if($resultado){
		echo '<script languaje="javascript">
			alert("¡SE HA ELIMINADO CORRECTAMENTE EL ARTICULO!"); 
		window.location="../../../vista/supuser/articulos/articulos.php";</script>';
	}else{
		echo '<script languaje="javascript">
			alert("¡NO SE HA PODIDO ELIMINAR EL ARTICULO!"); 
		window.location="../../../vista/supuser/articulos/articulos.php";</script>';
	}               

?>