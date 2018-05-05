<?php 
	include("../../../modelo/conexion.php"); 

	/*$id_tipo_user = $_POST['id_tipo_user'];*/
	
    $id_depto = isset($_REQUEST['id_depto']) ? $_REQUEST['id_depto'] : NULL;

	$query = "DELETE FROM departamentos WHERE id_depto='".$id_depto."'";

	$resultado = $conexion->query($query);

	if($resultado){
		echo '<script languaje="javascript">
			alert("¡SE HA ELIMINADO CORRECTAMENTE EL DEPARTAMENTO!"); 
		window.location="../../../vista/supuser/departamentos/departamentos.php";</script>';
	}else{
		echo '<script languaje="javascript">
			alert("¡NO SE HA PODIDO ELIMINAR EL DEPARTAMENTO!"); 
		window.location="../../../vista/supuser/departamentos/departamentos.php";</script>';
	}               

?>