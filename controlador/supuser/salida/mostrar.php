<?php 
	include("../../../modelo/conexion.php");

	if(isset($_POST["id_salida"])){
		$query = "SELECT * FROM salida WHERE id_salida = '".$_POST["id_salida"]."'";
		$resultado = mysqli_query($conexion, $query);
		$row = mysqli_fetch_array($resultado);
		echo json_encode($row);
	}

?>