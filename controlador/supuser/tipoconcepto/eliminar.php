<?php 
	include("../../../modelo/conexion.php"); 

	/*$id_tipo_user = $_POST['id_tipo_user'];*/
	
    $id_tipo_concepto = isset($_REQUEST['id_tipo_concepto']) ? $_REQUEST['id_tipo_concepto'] : NULL;

	$query = "DELETE FROM tipo_concepto WHERE id_tipo_concepto='".$id_tipo_concepto."'";

	$resultado = $conexion->query($query);

	if($resultado){
		echo '<script languaje="javascript">
			alert("¡SE HA ELIMINADO CORRECTAMENTE EL TIPO DE CONCEPTO!"); 
		window.location="../../../vista/supuser/tipoconcepto/tipoconcepto.php";</script>';
	}else{
		echo '<script languaje="javascript">
			alert("¡NO SE HA PODIDO ELIMINAR EL TIPO DE CONCEPTO!"); 
		window.location="../../../vista/supuser/tipoconcepto/tipoconcepto.php";</script>';
	}               

?>