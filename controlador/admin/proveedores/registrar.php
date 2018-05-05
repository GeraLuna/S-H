<?php  
	
	include("../../../modelo/conexion.php"); 

	/*Registro de Tipo de Usuario*/
	$empresa = $_POST['empresa'];
	$direccion = $_POST['direccion'];
	$contacto = $_POST['contacto'];
	$telefono = $_POST['telefono'];
	$celular = $_POST['celular'];
	$correo = $_POST['correo'];

	$query = "INSERT INTO proveedores (empresa, direccion, contacto, telefono, celular, correo) VALUES ('$empresa', '$direccion', '$contacto', '$telefono', '$celular', '$correo')";

	$resultado = $conexion->query($query);

	/*echo "$empresa<br>";
	echo "$direccion<br>";
	echo "$contacto<br>";
	echo "$telefono<br>";
	echo "$celular<br>";
	echo "$correo<br>";*/

	if($resultado){
		echo '<script languaje="javascript">
			alert("¡REGISTRO CORRECTO!\n\n Se ha Registrado Correctamente el Proveedor."); 
		window.location="../../../vista/admin/proveedores/proveedores.php";</script>';
	}else{
		echo '<script languaje="javascript">
			alert("¡REGISTRO FALLIDO!\n\n Verifique que los Datos Ingresados sean Correctos."); 
		window.location="../../../vista/admin/proveedores/proveedores.php";</script>';
	}

?>

<?php 