<?php 
	include("../../../modelo/conexion.php");

	$empleado ="";
	$no_emp = isset($_REQUEST['no_emp']) ? $_REQUEST['no_emp'] : NULL;
	$query = "SELECT id_personal, nombres, pat_ape, mat_ape FROM personal WHERE no_emp = '".$_POST["no_emp"]."'";
	$resultado = $conexion->query($query);

	$html = "<input type='text' REQUIRED disabled name='id_personal' id='id_personal' class='form-control' required placeholder='Ingresa el No de Empleado' value='No Existe Empleado con ese N° de Empleado'>";
	while ($row = $resultado->fetch_assoc()) {
	$id_personal = "<input type='text' value='".$row['id_personal']."'>";
	$empleado = "<input type='text' value='".$row['nombres']." ".$row['pat_ape']." ".$row['mat_ape']." '>";
	
	}
	echo $id_personal;
	echo $empleado;


?>