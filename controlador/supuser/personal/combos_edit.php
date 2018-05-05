<?php 
	
	include("../../../modelo/conexion.php"); 

	/*$id_depto = $_POST['id_depto'];*/

	$id_depto = isset($_REQUEST['iddepto']) ? $_REQUEST['iddepto'] : NULL;

	$query = "SELECT id_puesto, puesto FROM puestos WHERE id_depto = '".$id_depto."' ORDER BY puesto ASC";
	$resultado = $conexion->query($query);

	/*if ($row = $resultado->fetch_assoc()) {
		$html = "<option value='".$row['id_puesto']."'>".$row['puesto']."</option>";
		

	} else {
		$html = "<option value='0'>No existe un Puesto para el Departamento seleccionado</option>";
	}
	echo $html;*/


	$html = "<option value='0'>No existe un Puesto para el Departamento seleccionado</option>";
	while ($row = $resultado->fetch_assoc()) {
	$html = "<option value='".$row['id_puesto']."'>".$row['puesto']."</option>";
	echo $html;
	}

	


?>
