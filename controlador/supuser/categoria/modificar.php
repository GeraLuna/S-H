<?php 
	
	include("../../../modelo/conexion.php"); 

	/*Modificar el Tipo de Usuario*/
	$id_categoria = $_POST['id_categoria'];
	$category = $_POST['category'];

	$query = "UPDATE categoria SET categoria='$category' WHERE id_categoria='$id_categoria'";

	$resultado = $conexion->query($query);

	/*echo "$categoria<br>";*/

	if($resultado){
		echo '<script languaje="javascript">
		alert("SE A MODIFICADO CORRECTAMENTE LA CATEGORIA");
			window.location="../../../vista/supuser/categoria/categoria.php";
		</script>';
	}else{
		echo '<script languaje="javascript">alert("NO SE PUDO MODIFICAR EL TIPO DE USUARIO!!! \n\n Verifique que los Datos Ingresados sean Correctos"); 
		window.location="../../../vista/supuser/categoria/categoria.php";
		</script>';
	}
	
?>