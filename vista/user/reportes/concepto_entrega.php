<?php
	include("../../../modelo/conexion.php");
	include("../../../controlador/seguridad.php");
	//echo $nom_user;
	//echo "<br>";
	if($id_tipo_user != 3){
		header("location: ../../../iniciosesion.php");
		exit();
	}


	$where = "";

	if(!empty($_POST)){
		$valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE no_emp LIKE '%$valor%', nombres LIKE '%$valor%', pat_ape LIKE '%$valor%', mat_ape LIKE '%$valor%', articulo LIKE '%$valor%', tipo LIKE '%$valor%', fecha_salida LIKE '%$valor%', nom_user LIKE '%$valor%'";
			
		}
	}

	$tabla="SELECT id_salida, no_emp, nombres, pat_ape, mat_ape, categoria, articulo, tipo, talla, cantidad, fecha_salida, concepto, nom_user FROM salida, personal, categoria, articulo, concepto, usuarios WHERE salida.id_personal = personal.id_personal AND salida.id_categoria = categoria.id_categoria AND salida.id_articulo = articulo.id_articulo AND salida.id_concepto = concepto.id_concepto AND salida.id_user = usuarios.id_user";
	$resultado = $conexion->query($tabla);

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Reporte Concepto de Entrega</title>
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
  	<!------CALENDARIO------------> 
  	<script src="../../../js/bootstrap-datepicker.min.js"></script>
  	<link rel="stylesheet" href="../../../css/bootstrap-datepicker.css"> 
	<!--------ESTILO TABLA BOOSTRAP-------->
  	<link rel="stylesheet" href="../../../css/jquery.dataTables.min.css">
	<script src="../../../js/jquery.dataTables.min.js"></script>
	<!--------SELECTS-------->
	<script type="text/javascript" src="../../../js/jquery-3.2.1.min"></script>

  	<script>
  		$(document).ready(function() {
  			$('#mitabla').DataTable({
  				"order":[[0, "asc"]],
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
						<li><a href="../personal/personal.php" >Personal</a></li>
					</ul>
				</li>
				<li><a href=""><i class="icono izquierda fa fa-archive" aria-hidden="true"></i>Almacén<i class="icono derecha fa fa-angle-down" aria-hidden="true"></i></a>
					<ul>
						<li><a href="../entrada/entrada.php" >Entrada de Articulos</a></li>
						<li><a href="../salida/salida.php" >Salida de Articulos</a></li>
					</ul>
				</li>
				<li><a href=""><i class="icono izquierda fa fa-file-excel-o" aria-hidden="true"></i>Reportes<i class="icono derecha fa fa-angle-down" aria-hidden="true"></i></a>
					<ul>
						<li><a href="../reportes/inventario.php" >Inventario</a></li>
						<li><a href="concepto_entrega.php" >Concepto de Entrega</a></li>
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
				<h1>Salida de Artículos</h1>
			</header>
			
			<div class="botones">
				<div id="izquierda">
					<form action="../../../controlador/admin/reportes/concepto_entregas/concepto_entregas_general.php" method="post" id="insert_form" accept-charset="utf-8">
						<input type="submit" name="reporte_general" id="insert" value="Reporte General" class="btn btn-success">
					</form>
				</div>
				<div id="centrado">
					<a class='btn btn-success' value="registrar" data-toggle="modal" href="#Reporte_Mensual">Reporte Mensual <!--<span class="fa fa-file-excel-o"></span>--></a>
				</div>
				<div id="derecha">
					<a class='btn btn-success' value="reporte" data-toggle="modal" href="#Reporte_Diario">Reporte  Diario <!--<span class="fa fa-file-excel-o"></span>--></a>
				</div>							
			</div><br>

			<div class="modal fade" id="Reporte_Mensual">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h2 class="modal-tittle">Generar Reporte</h2>
						</div>
						<div class="modal-body">
							<form action="../../../controlador/admin/reportes/concepto_entregas/concepto_entregas_mensual.php" method="post" id="insert_form" accept-charset="utf-8">
								<label>Concepto de Entrega</label>
 								<select name="id_concepto" id="id_concepto" class="form-control">
										<option value="0" required>Seleccionar</option>
										<?php 
								  			$consult="select id_concepto, concepto from concepto";
											$result = $conexion->query($consult);
								  			while ($row = $result->fetch_assoc()) {
								  					//echo "<option value=".'["id_tipouser"]'.">".'["tipo_user"]'."</option>";
										?>
										<option value="<?php echo $row['id_concepto']; ?>"><?php echo ($row['concepto']); ?></option>
								   			
										<?php } ?>
								</select><br>
								<label>Fecha Inicial</label>
								<div class="input-group date calendario">
  									<input type="text" name="fecha_inicio" id="fecha_inicio" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
								</div>
								<br>
								<label>Fecha Termino</label>
								<div class="input-group date calendario">
  									<input type="text" name="fecha_termino" id="fecha_termino" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
								</div>
								<br>
								<input type="submit" name="generar_reporte" id="insert" value="Generar Reporte" class="btn btn-success">
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</div>		
			</div>

			<div class="modal fade" id="Reporte_Diario">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h2 class="modal-tittle">Generar Reporte</h2>
						</div>
						<div class="modal-body">
							<form action="../../../controlador/admin/reportes/concepto_entregas/concepto_entregas_diario.php" method="post" id="insert_form" accept-charset="utf-8">
								<label>Concepto de Entrega</label>
 								<select name="id_concepto" id="id_concepto" class="form-control">
										<option value="0" required>Seleccionar</option>
										<?php 
								  			$consult="select id_concepto, concepto from concepto";
											$result = $conexion->query($consult);
								  			while ($row = $result->fetch_assoc()) {
								  					//echo "<option value=".'["id_tipouser"]'.">".'["tipo_user"]'."</option>";
										?>
										<option value="<?php echo $row['id_concepto']; ?>"><?php echo ($row['concepto']); ?></option>
								   			
										<?php } ?>
								</select><br>
								<label>Fecha</label>
								<div class="input-group date calendario">
  									<input type="text" name="fecha" id="fecha" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
								</div>
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
					<th>No Emp</th>
					<th>Empleado</th>
					<th>Categoria</th>
					<th>Articulo</th>
					<th>Tipo</th>
					<th>Talla</th>
					<th>Cantidad</th>
					<th>Fecha</th>
					<th>Concepto</th>
					<!--<th>Usuario</th>-->
				</tr>
			</thead>
			<tbody>
				<?php
					while($row= $resultado->fetch_assoc()){
					?>
					<tr>
						<!--<td><?php echo $row['id_salida']; ?></td>-->
						<td><?php echo $row['no_emp']; ?></td>
						<td><?php echo $row['nombres']; ?> <?php echo $row['pat_ape']; ?> <?php echo $row['mat_ape']; ?></td>
						<td><?php echo $row['categoria']; ?></td>
						<td><?php echo $row['articulo']; ?></td>
						<td><?php echo $row['tipo']; ?></td>
						<td><?php echo $row['talla']; ?></td>
						<td><?php echo $row['cantidad']; ?></td>
						<td><?php echo $row['fecha_salida']; ?></td>
						<td><?php echo $row['concepto']; ?></td>
						<!--<td><?php echo $row['nom_user']; ?></td>-->
					</tr>
					<?php
					}
				?>
			</tbody>
		</table>
	</div>
	<script>
		$(document).ready(function(){

				$('.calendario').datepicker({
    			format: "yyyy/mm/dd"
				});
			});
		</script>
</body>
</html>