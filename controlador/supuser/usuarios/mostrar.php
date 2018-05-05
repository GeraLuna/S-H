<?php 
	include("../../../modelo/conexion.php");

	if(isset($_POST["id_user"])){
		$query = "SELECT * FROM usuarios WHERE id_user = '".$_POST["id_user"]."'";
		$resultado = mysqli_query($conexion, $query);
		$row = mysqli_fetch_array($resultado);
		echo json_encode($row);
	}

?>