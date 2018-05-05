<?php 
	include("../../../modelo/conexion.php");

	if(isset($_POST["id_personal"])){
		$query = "SELECT * FROM personal WHERE id_personal = '".$_POST["id_personal"]."'";
		$resultado = mysqli_query($conexion, $query);
		$row = mysqli_fetch_array($resultado);
		echo json_encode($row);
	}

?>