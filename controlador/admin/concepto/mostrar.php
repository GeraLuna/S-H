<?php 
	include("../../../modelo/conexion.php");

	if(isset($_POST["id_concepto"])){
		$query = "SELECT * FROM concepto WHERE id_concepto = '".$_POST["id_concepto"]."'";
		$resultado = mysqli_query($conexion, $query);
		$row = mysqli_fetch_array($resultado);
		echo json_encode($row);
	}

?>