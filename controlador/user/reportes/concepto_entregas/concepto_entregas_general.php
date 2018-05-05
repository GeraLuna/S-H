<?php 
	include("../../../../modelo/conexion.php"); 

	if(isset($_POST['reporte_general'])){
		//Nombre del Archivo y Charset
		header('Content-Type:text/csv; charset=latin1');
		header('Content-Disposition: attachment; filename="Reporte de Entrega de Articulos General.csv"');

		//Salida de Archivo
		$salida = fopen('php://output', 'w');

		//Encabezados
		fputcsv($salida, array('No. Empleado', 'Empleado', utf8_decode('Categoría'), utf8_decode('Artículo'), 'Tipo', 'Talla', 'Cantidad', 'Fecha', 'Concepto'));

		//Query para crear el reporte
		$reporte = $conexion->query("SELECT id_salida, no_emp, nombres, pat_ape, mat_ape, categoria, articulo, tipo, talla, cantidad, fecha_salida, concepto, nom_user FROM salida, personal, categoria, articulo, concepto, usuarios WHERE salida.id_personal = personal.id_personal AND salida.id_categoria = categoria.id_categoria AND salida.id_articulo = articulo.id_articulo AND salida.id_concepto = concepto.id_concepto AND salida.id_user = usuarios.id_user");
		while($fila = $reporte->fetch_assoc())
			fputcsv($salida, array (utf8_decode($fila['no_emp']), 
									utf8_decode($fila['nombres']." ".$fila['pat_ape']." ".$fila['mat_ape']),
									utf8_decode($fila['categoria']), 
									utf8_decode($fila['articulo']),
									$fila['tipo'], 
									$fila['talla'],
									$fila['cantidad'], 
									$fila['fecha_salida'],  
									utf8_decode($fila['concepto']),));
	}               

?>