<?php 
	include("../../../modelo/conexion.php");

	if(isset($_POST["id_articulo"])){
		$query = "SELECT * FROM articulo WHERE id_articulo = '".$_POST["id_articulo"]."'";
		$resultado = mysqli_query($conexion, $query);
		$row = mysqli_fetch_array($resultado);
		echo json_encode($row);
	}

?>