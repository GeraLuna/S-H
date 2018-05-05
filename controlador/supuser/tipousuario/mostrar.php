<?php 
	include("../../../modelo/conexion.php");

	if(isset($_POST["id_tipo_user"])){
		$query = "SELECT * FROM tipo_usuario WHERE id_tipo_user = '".$_POST["id_tipo_user"]."'";
		$resultado = mysqli_query($conexion, $query);
		$row = mysqli_fetch_array($resultado);
		echo json_encode($row);
	}

?>