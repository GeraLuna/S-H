<?php
	include("../../../modelo/conexion.php");
	include("../../../controlador/seguridad.php");
	//echo $nom_user;
	//echo "<br>";
	if($id_tipo_user != 1){
		header("location: ../../../iniciosesion.php");
		exit();
	}

	$where = "";

	if(!empty($_POST)){
		$valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE puesto LIKE '%$valor%', departamento LIKE '%$valor%'";
			
		}
	}

	$tabla="SELECT id_puesto, puesto, departamento FROM puestos, departamentos  WHERE $where puestos.id_depto = departamentos.id_depto ";
	$resultado = $conexion->query($tabla);

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Puestos</title>
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
				<li><a href=""><i class="icono izquierda fa fa-user" aria-hidden="true"></i>Usuarios<i class="icono derecha fa fa-angle-down" aria-hidden="true"></i></a>
					<ul>
						<li><a href="../tipousuario/tipousuario.php" >Tipos de Usuario</a></li>
						<li><a href="../usuarios/usuarios.php" >Usuarios</a></li>
					</ul>
				</li>
				<li><a href=""><i class="icono izquierda fa fa-building" aria-hidden="true"></i>Empresa<i class="icono derecha fa fa-angle-down" aria-hidden="true"></i></a>
					<ul>
						<li><a href="../departamentos/departamentos.php" >Departamentos</a></li>
						<li><a href="puestos.php" >Puestos</a></li>
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
				<h1>Puestos</h1>
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
							<h2 class="modal-tittle">Registrar Puestos</h2>
						</div>
						<div class="modal-body">
							<form action="../../../controlador/supuser/puestos/registrar.php" method="post" id="insert_form" accept-charset="utf-8">
								<label>Puesto</label>
								<input type="text" name="puesto" id="puesto" class="form-control" required placeholder="Ingresa el Nombre del Puesto">
								<br>
								<label>Departamento</label>
 								<select name="id_depto" id="id_depto" class="form-control">
										<option value="0" required>Seleccionar</option>
										<?php 
								  			$consult="select id_depto, departamento from departamentos";
											$result = $conexion->query($consult);
								  			while ($row = $result->fetch_assoc()) {
								  					//echo "<option value=".'["id_tipouser"]'.">".'["tipo_user"]'."</option>";
										?>
										<option value="<?php echo $row['id_depto']; ?>"><?php echo utf8_decode($row['departamento']); ?></option>
								   			
										<?php } ?>
								</select><br>
								<input type="submit" name="insert" id="insert" value="Registrar" class="btn btn-success">
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</div>		
			</div>

			<!--<div class="modal fade" id="Buscador">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h2 class="modal-tittle">Buscar Puesto</h2>
						</div>
						<div class="modal-body">
							<form action="../../../controlador/departamentos/buscar.php" method="post" id="brouse_form" accept-charset="utf-8">
								<label>Tipos de Usuario</label>
								<input type="text" name="buscar_departamento" id="buscar_departamento" class="form-control" required placeholder="Ingresa un Dato">
								<br>
								<input type="submit" name="brouse" id="brouse" value="Buscar" class="btn btn-success">
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</div>
			</div>-->
			
			<div class="modal fade" id="Modificar">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h2 class="modal-tittle">Modificar Puesto</h2>
						</div>
						<div class="modal-body">
							<form action="../../../controlador/supuser/puestos/modificar.php" method="post" id="modify_form" accept-charset="utf-8">
								<label>Puesto</label>
								<input type="hidden" name="id_puesto" id="id_puesto" class="form-control" required placeholder="Ingresa el Id Puesto">
								<br>
								<input type="text" name="puest" id="puest" class="form-control" required placeholder="Ingresa el Departamento">
								<br>
								<label>Departamento</label>
 								<select name="id_dpto" id="id_dpto" class="form-control">
										<option value="0" required>Seleccionar</option>
										<?php 
								  			$consult="select id_depto, departamento from departamentos";
											$result = $conexion->query($consult);
								  			while ($row = $result->fetch_assoc()) {
								  					//echo "<option value=".'["id_tipouser"]'.">".'["tipo_user"]'."</option>";
										?>
										<option value="<?php echo $row['id_depto']; ?>"><?php echo utf8_decode($row['departamento']); ?></option>
								   			
										<?php } ?>
								</select><br>
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
					<th>Puesto</th>
					<th>Departamento</th>
					<th>Modificar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php
					while($row= $resultado->fetch_assoc()){
					?>
					<tr>
						<!--<td><?php echo $row['id_puesto']; ?></td>-->
						<td><?php echo $row['puesto']; ?></td>
						<td><?php echo $row['departamento']; ?></td>
						<td><a name="Modificar" id="<?php echo $row['id_puesto']; ?>" class="edit_data" title="Modificar Información"><span class="glyphicon glyphicon-pencil"></span></a></td>
						<td><a class="delete_data" href="#" data-href="../../../controlador/supuser/puestos/eliminar.php?id_puesto=<?php echo $row['id_puesto']; ?>" data-toggle="modal" data-target="#confirm-delete" title="Eliminar Registro"><span class="glyphicon glyphicon-trash"></span></a></td>
					</tr>
					<?php
					}
				?>
			</tbody>
		</table>
		<script>
			$(document).ready(function(){

				$(document).on('click', '.edit_data', function(){
					var id_puesto = $(this).attr("id");
					$.ajax({
						url:"../../../controlador/supuser/puestos/mostrar.php",
						method:"POST",
						data:{id_puesto:id_puesto},
						dataType:"json",
						success:function(data){
							$('#id_puesto').val(data.id_puesto);
							$('#puest').val(data.puesto);
							$('#id_dpto').val(data.id_depto);
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
					¿Desea Eliminar el Tipo de Usuario?<br><br>
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