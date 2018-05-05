<?php 
	
	include("../../../modelo/conexion.php"); 

	/*Modificar el Tipo de Usuario*/
	$id_proveedor = $_POST['id_proveedor'];
	$company = $_POST['company'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$phone = $_POST['phone'];
	$cellphone = $_POST['cellphone'];
	$email = $_POST['email'];

	$query = "UPDATE proveedores SET empresa='$company', direccion='$address', contacto='$contact', telefono='$phone', celular='$cellphone', correo='$email' WHERE id_proveedor='$id_proveedor'";

	$resultado = $conexion->query($query);

	/*echo "$departamento<br>";*/

	if($resultado){
		echo '<script languaje="javascript">
		alert("SE A MODIFICADO CORRECTAMENTE EL PROVEEDOR");
			window.location="../../../vista/admin/proveedores/proveedores.php";
		</script>';
	}else{
		echo '<script languaje="javascript">alert("NO SE PUDO MODIFICAR EL PROVEEDOR!!! \n\n Verifique que los Datos Ingresados sean Correctos"); 
		window.location="../../../vista/admin/proveedores/proveedores.php";
		</script>';
	}
	
?>