<?php 
	include("../../../modelo/conexion.php");

	if(isset($_POST["id_tipo_concepto"])){
		$query = "SELECT * FROM tipo_concepto WHERE id_tipo_concepto = '".$_POST["id_tipo_concepto"]."'";
		$resultado = mysqli_query($conexion, $query);
		$row = mysqli_fetch_array($resultado);
		echo json_encode($row);
	}

?>