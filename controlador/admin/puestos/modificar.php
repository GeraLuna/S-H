<?php 
	
	include("../../../modelo/conexion.php"); 

	/*Modificar el Tipo de Usuario*/
	$id_puesto = $_POST['id_puesto'];
	$puest = $_POST['puest'];
	$id_dpto = $_POST['id_dpto'];

	$query = "UPDATE puestos SET puesto ='$puest', id_depto='$id_dpto' WHERE id_puesto='$id_puesto'";

	$resultado = $conexion->query($query);

	/*echo "$departamento<br>";*/

	if($resultado){
		echo '<script languaje="javascript">
		alert("SE A MODIFICADO CORRECTAMENTE EL PUESTO");
			window.location="../../../vista/admin/puestos/puestos.php";
		</script>';
	}else{
		echo '<script languaje="javascript">alert("NO SE PUDO MODIFICAR EL PUESTO!!! \n\n Verifique que los Datos Ingresados sean Correctos"); 
		window.location="../../../vista/admin/puestos/puestos.php";
		</script>';
	}
	
?>