<?php 
	include("../../../../modelo/conexion.php"); 

	$id_user = $_POST['id_user'];
	$fecha_inicio = $_POST['fecha_inicio'];
	$fecha_termino = $_POST['fecha_termino'];

	if(isset($_POST['generar_reporte'])){
		//Nombre del Archivo y Charset
		header('Content-Type:text/csv; charset=latin1');
		header('Content-Disposition: attachment; filename="Reporte de Entrega de Articulos por Mes.csv"');

		//Salida de Archivo
		$salida = fopen('php://output', 'w');

		//Encabezados
		fputcsv($salida, array(utf8_decode('Categoría'), utf8_decode('Artículo'), 'Tipo', 'Talla', 'Cantidad', 'Fecha', 'Concepto', 'Usuario'));

		//Query para crear el reporte
		$reporte = $conexion->query("SELECT id_salida, categoria, articulo, tipo, talla, cantidad, fecha_salida, concepto, nom_user FROM salida, categoria, articulo, concepto, usuarios WHERE salida.id_categoria = categoria.id_categoria AND salida.id_articulo = articulo.id_articulo AND salida.id_concepto = concepto.id_concepto AND salida.id_user = usuarios.id_user AND salida.id_user = $id_user AND fecha_salida BETWEEN '$fecha_inicio' AND '$fecha_termino' ");
		while($fila = $reporte->fetch_assoc())
			fputcsv($salida, array (utf8_decode($fila['categoria']), 
									utf8_decode($fila['articulo']),
									$fila['tipo'], 
									$fila['talla'],
									$fila['cantidad'], 
									$fila['fecha_salida'],  
									utf8_decode($fila['concepto']),
									utf8_decode($fila['nom_user']),));
	}                   

?>