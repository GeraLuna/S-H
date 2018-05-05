<?php  
	
	include("../../../modelo/conexion.php"); 

	/*Registro de Tipo de Usuario*/
	$id_proveedor = $_POST['id_proveedor'];
	$id_categoria = $_POST['id_categoria'];
	$articulo = $_POST['articulo'];
	$tipo = $_POST['tipo'];
	$talla = $_POST['talla'];
	$abreviacion = $_POST['abreviacion'];
	$stock = $_POST['stock'];

	$query = "INSERT INTO articulo (id_proveedor, id_categoria, articulo, tipo, talla, abreviacion, stock) VALUES ('$id_proveedor', '$id_categoria', '$articulo', '$tipo', '$talla', '$abreviacion', '$stock')";

	$resultado = $conexion->query($query);

	/*echo "$id_proveedor<br>";
	echo "$id_categoria<br>";
	echo "$articulo<br>";
	echo "$tipo<br>";
	echo "$talla<br>";
	echo "$abreviacion<br>";
	echo "$stock<br>";*/

	if($resultado){
		echo '<script languaje="javascript">
			alert("¡REGISTRO CORRECTO!\n\n Se ha Registrado Correctamente el Articulo."); 
		window.location="../../../vista/supuser/articulos/articulos.php";</script>';
	}else{
		echo '<script languaje="javascript">
			alert("¡REGISTRO FALLIDO!\n\n Verifique que los Datos Ingresados sean Correctos."); 
		window.location="../../../vista/supuser/articulos/articulos.php";</script>';
	}

?>