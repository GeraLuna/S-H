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
	<title>Articulos</title>
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
				<!--<li><a href=""><i class="icono izquierda fa fa-user" aria-hidden="true"></i>Usuarios<i class="icono derecha fa fa-angle-down" aria-hidden="true"></i></a>
					<ul>
						<li><a href="../tipousuario/tipousuario.php" >Tipos de Usuario</a></li>
						<li><a href="../usuarios/usuarios.php" >Usuarios</a></li>
					</ul>
				</li>-->
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
						<li><a href="articulos.php" >Articulos</a></li>
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
						<li><a href="" >Inventario</a></li>
						<li><a href="" >Concepto de Entrega</a></li>
						<li><a href="" >Entregas por Usuario</a></li>
						<li><a href="" >Entrgas por Departamento</a></li>
						<li><a href="" >Entregas por Empleado</a></li>
					</ul>
				</li>
				<li><a href="../../../cerrarsesion.php"><i class="icono izquierda fa fa-sign-out" aria-hidden="true"></i>Cerrar Sesión</a></li>
			</ul>
		</div>

		<div class="contenido">
			<header>
				<h1>Articulos</h1>
			</header>
			<section class="main">
			<div class="botones">
					<a class='btn btn-success' value="registrar" data-toggle="modal" href="#Registro"><span class="glyphicon glyphicon-plus"></span></a>
					<!--<a class='btn btn-warning' value="buscar" data-toggle="modal" href="#Buscador"><span class="glyphicon glyphicon-search"></span></a>-->
					<!--<a class='btn btn-info' value="formulario"><span class="glyphicon glyphicon-list-alt"></span></a>-->
			</div><br>

			<div class="modal fade" id="Registro">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h2 class="modal-tittle">Registrar Articulos</h2>
						</div>
						<div class="modal-body">
							<form action="../../../controlador/admin/articulos/registrar.php" method="post" id="insert_form" accept-charset="utf-8">
								<label>Proveedor</label>
 								<select name="id_proveedor" id="id_proveedor" class="form-control">
										<option value="0" required>Seleccionar</option>
										<?php 
								  			$consult="select id_proveedor, empresa from proveedores";
											$result = $conexion->query($consult);
								  			while ($row = $result->fetch_assoc()) {
								  					//echo "<option value=".'["id_tipouser"]'.">".'["tipo_user"]'."</option>";
										?>
										<option value="<?php echo $row['id_proveedor']; ?>"><?php echo ($row['empresa']); ?></option>
								   			
										<?php } ?>
								</select><br>
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
								<label>Articulo</label>
								<input type="text" name="articulo" id="articulo" class="form-control" required placeholder="Ingresa el Nombre del Articulo">
								<br>
								<label>Tipo</label>
								<input type="text" name="tipo" id="tipo" class="form-control" required placeholder="Ingresa el Tipo del Articulo">
								<br>
								<label>Talla</label>
								<input type="text" name="talla" id="talla" class="form-control" required placeholder="Ingresa la Talla del Articulo">
								<br>
								<label>Abreviación</label>
								<input type="text" name="abreviacion" id="abreviacion" class="form-control" required placeholder="Ingresa la Abreviación del Articulo">
								<br>
								<label>Stock</label>
								<input type="text" name="stock" id="stock" class="form-control" required placeholder="Ingresa el Stock del Articulo">
								<br>
								<input type="submit" name="insert" id="insert" value="Registrar" class="btn btn-success">
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</div>		
			</div>
			
			<div class="modal fade" id="Modificar">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h2 class="modal-tittle">Modificar Categoria</h2>
						</div>
						<div class="modal-body">
							<form action="../../../controlador/admin/articulos/modificar.php" method="post" id="modify_form" accept-charset="utf-8">
								<input type="hidden" name="id_articulo" id="id_articulo" class="form-control" required placeholder="Ingresa el Id Puesto">
								<label>Proveedor</label>
 								<select name="id_supplier" id="id_supplier" class="form-control">
										<option value="0" required>Seleccionar</option>
										<?php 
								  			$consult="select id_proveedor, empresa from proveedores";
											$result = $conexion->query($consult);
								  			while ($row = $result->fetch_assoc()) {
								  					//echo "<option value=".'["id_tipouser"]'.">".'["tipo_user"]'."</option>";
										?>
										<option value="<?php echo $row['id_proveedor']; ?>"><?php echo ($row['empresa']); ?></option>
								   			
										<?php } ?>
								</select><br>
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
								<label>Articulo</label>
								<input type="text" name="article" id="article" class="form-control" required placeholder="Ingresa el Nombre del Articulo">
								<br>
								<label>Tipo</label>
								<input type="text" name="type" id="type" class="form-control" required placeholder="Ingresa el Tipo del Articulo">
								<br>
								<label>Talla</label>
								<input type="text" name="size" id="size" class="form-control" required placeholder="Ingresa la Talla del Articulo">
								<br>
								<label>Abreviación</label>
								<input type="text" name="abbreviation" id="abbreviation" class="form-control" required placeholder="Ingresa la Abreviación del Articulo">
								<br>
								<label>Stock</label>
								<input type="text" name="stocks" id="stocks" class="form-control" required placeholder="Ingresa el Stock del Articulo">
								<br>
								<input type="submit" name="modify" id="modify" value="Modificar" class="btn btn-success">
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
					<th>Modificar</th>
					<th>Eliminar</th>
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
						<td><a name="Modificar" id="<?php echo $row['id_articulo']; ?>" class="edit_data" title="Modificar Información"><span class="glyphicon glyphicon-pencil"></span></a></td>
						<td><a class="delete_data" href="#" data-href="../../../controlador/admin/articulos/eliminar.php?id_articulo=<?php echo $row['id_articulo']; ?>" data-toggle="modal" data-target="#confirm-delete" title="Eliminar Registro"><span class="glyphicon glyphicon-trash"></span></a></td>
					</tr>
					<?php
					}
				?>
			</tbody>
		</table>
		<script>
			$(document).ready(function(){

				$(document).on('click', '.edit_data', function(){
					var id_articulo = $(this).attr("id");
					$.ajax({
						url:"../../../controlador/admin/articulos/mostrar.php",
						method:"POST",
						data:{id_articulo:id_articulo},
						dataType:"json",
						success:function(data){
							$('#id_articulo').val(data.id_articulo);
							$('#id_supplier').val(data.id_proveedor);
							$('#id_category').val(data.id_categoria);
							$('#article').val(data.articulo);
							$('#type').val(data.tipo);
							$('#size').val(data.talla);
							$('#abbreviation').val(data.abreviacion);
							$('#stocks').val(data.stock);
							$('#modify').val("Modificar");
							$('#Modificar').modal("show");
						}
					});
				});
			});
		</script>
	</div>
	<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" arial-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Eliminar Registros</h4>
				</div>
				<div class="modal-body">
					¿Desea Eliminar la Articulo?<br><br>
					<a class="btn btn-danger btn-ok">Eliminar</a>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<!--<a class="btn btn-danger btn-ok">Eliminar</a>-->
				</div>
			</div>
		</div>
	</div>
	<script>
		$('#confirm-delete').on('show.bs.modal', function(e){
			$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
			$('.debug-url').html('Delete URL: <<strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
		});
	</script>
</body>
</html>