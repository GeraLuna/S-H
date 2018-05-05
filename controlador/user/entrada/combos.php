<?php 
	
	include("../../../modelo/conexion.php"); 

	/*$id_depto = $_POST['id_depto'];*/

	$id_categoria = isset($_REQUEST['id_categoria']) ? $_REQUEST['id_categoria'] : NULL;

	$query = "SELECT id_articulo, articulo, tipo, talla FROM articulo WHERE id_categoria = '".$id_categoria."' ORDER BY articulo ASC";
	$resultado = $conexion->query($query);

	$html = "<option value='0'>No existe un articulo para la Categoria seleccionada</option>";
	while ($row = $resultado->fetch_assoc()) {
	$html = "<option value='".$row['id_articulo']."'>".$row['articulo'].", ".$row['tipo'].", ".$row['talla']."</option>";
	echo $html;
	}

?>
