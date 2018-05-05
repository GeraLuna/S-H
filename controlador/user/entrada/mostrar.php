<?php 
	include("../../../modelo/conexion.php");

	if(isset($_POST["id_entrada"])){
		$query = "SELECT * FROM entrada WHERE id_entrada = '".$_POST["id_entrada"]."'";
		$resultado = mysqli_query($conexion, $query);
		$row = mysqli_fetch_array($resultado);
		echo json_encode($row);
	}

?>