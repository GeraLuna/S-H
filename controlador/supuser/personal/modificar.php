<?php 
	
	include("../../../modelo/conexion.php"); 

	/*Modificar el Tipo de Usuario*/
	$id_personal = $_POST['id_personal'];
	$number = $_POST['number'];
	$names = $_POST['names'];
	$apepat = $_POST['apepat'];
	$apemat = $_POST['apemat'];
	$gender = $_POST['gender'];
	$fechaingreso = $_POST['fechaingreso'];
	$iddepto = $_POST['iddepto'];
	$idpuesto = $_POST['idpuesto'];

	$query = "UPDATE personal SET no_emp='$number', nombres='$names', pat_ape ='$apepat', mat_ape ='$apemat', genero='$gender', fecha_ingreso ='$fechaingreso', id_depto ='$iddepto', id_puesto='$idpuesto'  WHERE id_personal='$id_personal'";

	$resultado = $conexion->query($query);

	/*echo "
	$number;
	$names;
	$apepat;
	$apemat;
	$gender;
	$fechaingreso;
	$iddepto;
	$idpuesto;
	";*/

	if($resultado){
		echo '<script languaje="javascript">
		alert("SE HAN MODIFICADO CORRECTAMENTE LOS DATOS DEL EMPLEADO");
			window.location="../../../vista/supuser/personal/personal.php";
		</script>';
	}else{
		echo '<script languaje="javascript">alert("NO SE PUDO MODIFICAR LOS DATOS DEL EMPLEADO!!! \n\n Verifique que los Datos Ingresados sean Correctos"); 
		window.location="../../../vista/supuser/personal/personal.php";
		</script>';
	}
	
?>