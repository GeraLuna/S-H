<?php 
	include("../../../modelo/conexion.php");

	if(isset($_POST["id_depto"])){
		$query = "SELECT * FROM departamentos WHERE id_depto = '".$_POST["id_depto"]."'";
		$resultado = mysqli_query($conexion, $query);
		$row = mysqli_fetch_array($resultado);
		echo json_encode($row);
	}

?>