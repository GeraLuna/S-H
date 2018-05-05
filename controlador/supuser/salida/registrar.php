<?php  
	
	include("../../../modelo/conexion.php"); 

	/*Registro de Tipo de Usuario*/
	$stock = "";
	$newstock = "";
	$id_personal = $_POST['id_personal'];
	$id_categoria = $_POST['id_categoria'];
	$id_articulo = $_POST['id_articulo'];
	$cantidad = $_POST['cantidad'];
	$fecha_salida = $_POST['fecha_salida'];
	$id_concepto = $_POST['id_concepto'];
	$id_user = $_POST['id_user'];

	/*HACEMOS LA CONSULTA DEL STOCK*/
	if(isset($_POST["id_articulo"])) {   
      	$query = "SELECT stock FROM articulo WHERE id_articulo = '".$id_articulo."'";  //Realizamos la Consulta del Stock de Articulo
      	$result = mysqli_query($conexion, $query);   //Obtenemos la Busqueda
      	while($row = mysqli_fetch_array($result))  {  
           $stock .= ' '.$row["stock"].' ';  //Almacenamos el valor en una variable
      	if ($stock < 10) {
      		echo '<script languaje="javascript">
			alert("¡ADVERTENCIA!\n\n Le recomendamos hacer un pedido de este articulo, ya que quedan pocos articulos."); 
		window.location="../../../vista/supuser/salida/salida.php";</script>';
      	}
      	}

      	
      	//echo $stock;
      	$newstock = ($stock - $cantidad);  
	}

	/*HACEMOS LA INSERCION DE DATOS*/
	$query = "INSERT INTO salida (id_personal, id_categoria, id_articulo, cantidad, fecha_salida, id_concepto, id_user) VALUES ('$id_personal','$id_categoria', '$id_articulo', '$cantidad', '$fecha_salida','$id_concepto' ,'$id_user')";
	$resultado = $conexion->query($query);


	/*HACEMOS LA ACTUALIZACIÓN DE STOCK*/
	$queryupdate = "UPDATE articulo SET stock='$newstock' WHERE id_articulo='$id_articulo'";
	$resultadoupdate = $conexion->query($queryupdate);

	

	/*echo "$id_proveedor<br>";
	echo "$id_categoria<br>";
	echo "$articulo<br>";
	echo "$tipo<br>";
	echo "$talla<br>";
	echo "$abreviacion<br>";
	echo "$stock<br>";*/

	if($resultado){
		/*echo "$stock";
		echo "- - - - -";
		echo "$cantidad";
		echo "- - - - -";
		echo "$newstock";
		echo "- - - - -";
		echo "$query";*/
		echo '<script languaje="javascript">
			alert("¡REGISTRO CORRECTO!\n\n Se ha Registrado Correctamente la Entrega del Articulo."); 
		window.location="../../../vista/supuser/salida/salida.php";</script>';
	}else{
		echo '<script languaje="javascript">
			alert("¡REGISTRO FALLIDO!\n\n Verifique que los Datos Ingresados sean Correctos."); 
		window.location="../../../vista/supuser/salida/salida.php";</script>';
	}

?>