<?php 
	include("../../../modelo/conexion.php");

	if(isset($_POST["id_categoria"])){
		$query = "SELECT * FROM categoria WHERE id_categoria = '".$_POST["id_categoria"]."'";
		$resultado = mysqli_query($conexion, $query);
		$row = mysqli_fetch_array($resultado);
		echo json_encode($row);
	}

?>