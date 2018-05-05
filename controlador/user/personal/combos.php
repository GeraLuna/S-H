<?php 
	
	include("../../../modelo/conexion.php"); 

	/*$id_depto = $_POST['id_depto'];*/

	$id_depto = isset($_REQUEST['id_depto']) ? $_REQUEST['id_depto'] : NULL;

	$query = "SELECT id_puesto, puesto FROM puestos WHERE id_depto = '".$id_depto."' ORDER BY puesto ASC";
	$resultado = $conexion->query($query);

	
	/*while ($row = $resultado->fetch_assoc()) {
		$html = "<option value='".$row['id_puesto']."'>".$row['puesto']."</option>";
		echo $html;
	}else {
		$html = "<option value='0'>No existe un Puesto para el Departamento seleccionado</option>";
		echo $html;
	}*/

	$html = "<option value='0'>No existe un Puesto para el Departamento seleccionado</option>";
	while ($row = $resultado->fetch_assoc()) {
	$html = "<option value='".$row['id_puesto']."'>".$row['puesto']."</option>";
	echo $html;
	}

	


?>

