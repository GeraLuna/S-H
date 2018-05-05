<?php 
	include("../../../modelo/conexion.php");

	if(isset($_POST["id_puesto"])){
		$query = "SELECT * FROM puestos WHERE id_puesto = '".$_POST["id_puesto"]."'";
		$resultado = mysqli_query($conexion, $query);
		$row = mysqli_fetch_array($resultado);
		echo json_encode($row);
	}

?>