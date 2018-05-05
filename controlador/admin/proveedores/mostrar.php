<?php 
	include("../../../modelo/conexion.php");

	if(isset($_POST["id_proveedor"])){
		$query = "SELECT * FROM proveedores WHERE id_proveedor = '".$_POST["id_proveedor"]."'";
		$resultado = mysqli_query($conexion, $query);
		$row = mysqli_fetch_array($resultado);
		echo json_encode($row);
	}

?>