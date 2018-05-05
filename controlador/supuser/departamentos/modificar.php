<?php 
	
	include("../../../modelo/conexion.php"); 

	/*Modificar el Tipo de Usuario*/
	$id_depto = $_POST['id_depto'];
	$departament = $_POST['departament'];

	$query = "UPDATE departamentos SET departamento='$departament' WHERE id_depto='$id_depto'";

	$resultado = $conexion->query($query);

	/*echo "$departamento<br>";*/

	if($resultado){
		echo '<script languaje="javascript">
		alert("SE A MODIFICADO CORRECTAMENTE EL DEPARTAMENTO");
			window.location="../../../vista/supuser/departamentos/departamentos.php";
		</script>';
	}else{
		echo '<script languaje="javascript">alert("NO SE PUDO MODIFICAR EL DEPARTAMENTO!!! \n\n Verifique que los Datos Ingresados sean Correctos"); 
		window.location="../../../vista/supuser/departamentos/departamentos.php";
		</script>';
	}
	
?>
