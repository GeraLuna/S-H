<?php 
	include("../../../../modelo/conexion.php"); 

	$id_categoria = $_POST['id_category'];

	if(isset($_POST['generar_reporte'])){
		//Nombre del Archivo y Charset
		header('Content-Type:text/csv; charset=latin1');
		header('Content-Disposition: attachment; filename="Reporte de Inventario por Categoría.csv"');

		//Salida de Archivo
		$salida = fopen('php://output', 'w');

		//Encabezados
		fputcsv($salida, array('Proveedor', utf8_decode('Categoría'), utf8_decode('Artículo'), 'Tipo', 'Talla', utf8_decode('Abreviación'), 'Stock'));

		//Query para crear el reporte
		$reporte = $conexion->query("SELECT id_articulo, empresa, categoria, articulo, tipo, talla, abreviacion, stock FROM articulo, proveedores, categoria WHERE articulo.id_proveedor = proveedores.id_proveedor AND articulo.id_categoria = categoria.id_categoria AND categoria.id_categoria = $id_categoria");
		while($fila = $reporte->fetch_assoc())
			fputcsv($salida, array (utf8_decode($fila['empresa']), 
									utf8_decode($fila['categoria']),
									utf8_decode($fila['articulo']), 
									$fila['tipo'],
									$fila['talla'], 
									$fila['abreviacion'], 
									$fila['stock'],));
	}               

?>