<?php
	include("../../../modelo/conexion.php");
	include("../../../controlador/seguridad.php");
	//echo $nom_user;
	//echo "<br>";
	if($id_tipo_user != 2){
		header("location: ../../../iniciosesion.php");
		exit();
	}

	$where = "";

	if(!empty($_POST)){
		$valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE empresa LIKE '%$valor%', categoria LIKE '%$valor%', articulo LIKE '%$valor%', tipo LIKE '%$valor%' talla LIKE '%$valor%', abreviacion LIKE '%$valor%'";
			
		}
	}

	$tabla="SELECT id_articulo, empresa, categoria, articulo, tipo, talla, abreviacion, stock FROM articulo, proveedores, categoria WHERE $where articulo.id_proveedor = proveedores.id_proveedor AND articulo.id_categoria = categoria.id_categoria";
	$resultado = $conexion->query($tabla);


?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Inventario</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<!--------ESTILO ICON COFICAB-------->
	<link rel="shortcut icon" href="../../../img/favicon.ico" type="image/x-icon">
	<!--------ESTILO MENU---------->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="../../../css/menu.css">
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="../../../js/menu.js"></script>
	<!--------ESTILO VENTANA MODAL-------->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--------ESTILO TABLA BOOSTRAP-------->
	<!--<link rel="stylesheet" href="../../../css/tabla.css">-->
  	<link rel="stylesheet" href="../../../css/jquery.dataTables.min.css">
	<script src="../../../js/jquery.dataTables.min.js"></script>

  	<script>
  		$(document).ready(function() {
  			$('#mitabla').DataTable({
  				"order":[[1, "asc"]],
  				"language":{
  					"lengthMenu": "Mostrar _MENU_ registros por página",
  					"info": "Mostrando página _PAGE_ de _PAGES_",
  					"infoEmpty": "No hay registros disponibles",
  					"infoFiltered": "(Filtrada de _MAX_ registros)",
  					"loadingRecords": "Cargando...",
  					"processing": "Procesando...",
  					"search": "Buscar",
  					"zeroRecords": "No se Encontraron registros coincidentes",
  					"paginate":{
  						"next": "Siguiente",
  						"previous": "Anterior"
  					},
  				}
  			});
  		});
  	</script>

  	<!------COMBO ANIDADO---------->
	<!--<script src="../../../js/jquery-3.2.1.min.js"></script>-->
	<script language="javascript">
		$(document).ready(function() {
			$("#id_categoria").change(function() {

				//$('#id_puesto').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

				$("#id_categoria option:selected").each(function() {
				    id_categoria = $(this).val();
				    $.post("../../../controlador/admin/reportes/inventario/combos.php", { id_categoria: id_categoria }, function(data) {
				    	$("#id_articulo").html(data);
				    });
				});
			});
		});
	</script>

</head>
<body>
	<div class="contenedor">
	<nav class="bar-horizon">
		<div class="logocoficab">
			<a href="../menu.php"><img src="../../../img/coficab.png" alt="20px"></a>
		</div>
	</nav>
		

		<div class="contenedor-menu">
			<a href="#" class="btn-menu">Menu <i class="icono fa fa-bars" aria-hidden="true"></i></a>
			<ul class="menu">
				<li><a href=""><i class="icono izquierda fa fa-building" aria-hidden="true"></i>Empresa<i class="icono derecha fa fa-angle-down" aria-hidden="true"></i></a>
					<ul>
						<li><a href="../departamentos/departamentos.php" >Departamentos</a></li>
						<li><a href="../puestos/puestos.php" >Puestos</a></li>
						<li><a href="../personal/personal.php" >Personal</a></li>
					</ul>
				</li>
				<li><a href=""><i class="icono izquierda fa fa-tags" aria-hidden="true"></i>Artículos<i class="icono derecha fa fa-angle-down" aria-hidden="true"></i></a>
					<ul>
						<li><a href="../proveedores/proveedores.php" >Proveedores</a></li>
						<li><a href="../categoria/categoria.php" >Categoria</a></li>
						<li><a href="../articulos/articulos.php" >Articulos</a></li>
					</ul>
				</li>
				<li><a href=""><i class="icono izquierda fa fa-archive" aria-hidden="true"></i>Almacén<i class="icono derecha fa fa-angle-down" aria-hidden="true"></i></a>
					<ul>
						<li><a href="../tipoconcepto/tipoconcepto.php" >Tipo de Concepto</a></li>
						<li><a href="../concepto/concepto.php" >Concepto de Articulos</a></li>
						<li><a href="../entrada/entrada.php" >Entrada de Articulos</a></li>
						<li><a href="../salida/salida.php" >Salida de Articulos</a></li>
					</ul>
				</li>
				<li><a href=""><i class="icono izquierda fa fa-file-excel-o" aria-hidden="true"></i>Reportes<i class="icono derecha fa fa-angle-down" aria-hidden="true"></i></a>
					<ul>
						<li><a href="inventario.php" >Inventario</a></li>
						<li><a href="../reportes/entregas.php" >Concepto de Entrega</a></li>
						<li><a href="../reportes/usuario.php" >Entregas por Usuario</a></li>
						<li><a href="../reportes/departamento.php" >Entrgas por Departamento</a></li>
						<li><a href="../reportes/empleado.php" >Entregas por Empleado</a></li>
					</ul>
				</li>
				<li><a href="../../../cerrarsesion.php"><i class="icono izquierda fa fa-sign-out" aria-hidden="true"></i>Cerrar Sesión</a></li>
			</ul>
		</div>

		<div class="contenido">
			<header>
				<h1>Inventario</h1>
			</header>

			<div class="botones">
				<div id="izquierda">
					<form action="../../../controlador/admin/reportes/inventario/inventario_general.php" method="post" id="insert_form" accept-charset="utf-8">
						<input type="submit" name="reporte_general" id="insert" value="Reporte General" class="btn btn-success">
					</form>
				</div>
				<div id="centrado">
					<a class='btn btn-success' value="registrar" data-toggle="modal" href="#Reporte_Categoria">Reporte por Categoria <!--<span class="fa fa-file-excel-o"></span>--></a>
				</div>
				<div id="derecha">
					<a class='btn btn-success' value="reporte" data-toggle="modal" href="#Reporte_Articulo">Reporte  por Articulo <!--<span class="fa fa-file-excel-o"></span>--></a>
				</div>							
			</div><br>

			<div class="modal fade" id="Reporte_Categoria">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h2 class="modal-tittle">Generar Reporte</h2>
						</div>
						<div class="modal-body">
							<form action="../../../controlador/admin/reportes/inventario/inventario_categoria.php" method="post" id="insert_form" accept-charset="utf-8">
								<label>Categoria de Articulos</label>
 								<select name="id_category" id="id_category" class="form-control">
										<option value="0" required>Seleccionar</option>
										<?php 
								  			$consult="select id_categoria, categoria from categoria";
											$result = $conexion->query($consult);
								  			while ($row = $result->fetch_assoc()) {
								  					//echo "<option value=".'["id_tipouser"]'.">".'["tipo_user"]'."</option>";
										?>
										<option value="<?php echo $row['id_categoria']; ?>"><?php echo ($row['categoria']); ?></option>
								   			
										<?php } ?>
								</select><br>
								<input type="submit" name="generar_reporte" id="insert" value="Generar Reporte" class="btn btn-success">
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</div>		
			</div>

			<div class="modal fade" id="Reporte_Articulo">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h2 class="modal-tittle">Generar Reporte</h2>
						</div>
						<div class="modal-body">
							<form action="../../../controlador/admin/reportes/inventario/inventario_articulo.php" method="post" id="insert_form" accept-charset="utf-8">
								<label>Categoria de Articulos</label>
 								<select name="id_categoria" id="id_categoria" class="form-control">
										<option value="0" required>Seleccionar</option>
										<?php 
								  			$consult="select id_categoria, categoria from categoria";
											$result = $conexion->query($consult);
								  			while ($row = $result->fetch_assoc()) {
								  					//echo "<option value=".'["id_tipouser"]'.">".'["tipo_user"]'."</option>";
										?>
										<option value="<?php echo $row['id_categoria']; ?>"><?php echo ($row['categoria']); ?></option>
								   			
										<?php } ?>
								</select><br>
								<label>Articulo, Tipo y Talla</label>
 								<select id="id_articulo" name="id_articulo" class="form-control">
 									<option value="0">Seleccionar Articulo</option>
 								</select>
								<br>
								<input type="submit" name="genera_reporte" id="insert" value="Generar Reporte" class="btn btn-success">
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</div>		
			</div>
					

		<div class="row table-responsive">
		<table class="display" id="mitabla">
			<thead>
				<tr>
					<!--<th>Id</th>-->
					<th>Proveedor</th>
					<th>Categoria</th>
					<th>Articulo</th>
					<th>Tipo</th>
					<th>Talla</th>
					<th>Abreviación</th>
					<th>Stock</th>
				</tr>
			</thead>
			<tbody>
				<?php
					while($row= $resultado->fetch_assoc()){
					?>
					<tr>
						<!--<td><?php echo $row['id_articulo']; ?></td>-->
						<td><?php echo $row['empresa']; ?></td>
						<td><?php echo $row['categoria']; ?></td>
						<td><?php echo $row['articulo']; ?></td>
						<td><?php echo $row['tipo']; ?></td>
						<td><?php echo $row['talla']; ?></td>
						<td><?php echo $row['abreviacion']; ?></td>
						<td><?php echo $row['stock']; ?></td>
					</tr>
					<?php
					}
				?>
			</tbody>
		</table>
		</div>
	</div>
</body>
</html>