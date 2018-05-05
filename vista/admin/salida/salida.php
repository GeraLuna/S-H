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
	<title>Personal</title>
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

  	<!------COMBO ANIDADO---------->
	<!--<script src="../../../js/jquery-3.2.1.min.js"></script>-->
	<script language="javascript">
		$(document).ready(function() {
			$("#id_categoria").change(function() {

				//$('#id_puesto').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

				$("#id_categoria option:selected").each(function() {
				    id_categoria = $(this).val();
				    $.post("../../../controlador/admin/entrada/combos.php", { id_categoria: id_categoria }, function(data) {
				    	$("#id_articulo").html(data);
				    });
				});
			});
		});


		//----------COMBO ANIDADO EDITAR REGISTROS--------
		$(document).ready(function() {
			$("#id_category").change(function() {

				//$('#id_puesto').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

				$("#id_category option:selected").each(function() {
				    id_category = $(this).val();
				    $.post("../../../controlador/admin/entrada/combos_edit.php", { id_category: id_category }, function(data) {
				    	$("#id_article").html(data);
				    });
				});
			});
		});
	</script>

</head>
<body>
	<div class="contenedor">
	<nav class="bar-horizon">
		<div class="usuario">
			<input type="hidden" REQUIRED disabled class="form-control" id="id_user" value="<?php echo $_SESSION['id_user']; ?>">
        	<input type="hidden" REQUIRED disabled class="form-control" id="nom_user" value="<?php echo $_SESSION['nom_user']; ?>">
      	</div>
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
						<li><a href="salida.php" >Salida de Articulos</a></li>
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
				<h1>Salida de Artículos</h1>
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
							<h2 class="modal-tittle">Registrar Entrega de Articulos</h2>
						</div>
						<div class="modal-body">
							<h4>Entrega de Articulos</h4>
							<!--<form action="../../../controlador/admin/salida/buscar.php" method="post" id="brouse_form" accept-charset="utf-8">
								
								<label>N° de Empleado</label>
								<input type="text" name="no_emp" id="no_emp" class="form-control" required placeholder="Ingresa el No de Empleado">
								<br>
								<input type="submit" name="brouse" id="brouse" value="Buscar" class="btn btn-primary">
								
								<br><br>
							</form>-->
							<form action="../../../controlador/admin/salida/registrar.php" method="post" id="insert_form" accept-charset="utf-8">
								<!--<input type="text" REQUIRED disabled name="id_personal" id="id_personal" class="form-control" required placeholder="Ingresa el No de Empleado" >
								<input type="text" REQUIRED disabled name="empleado" id="empleado" class="form-control" required placeholder="Ingresa el No de Empleado" >
								<br>-->
								<label>Empleado</label>
 								<select name="id_personal" id="id_personal" class="form-control">
										<option value="0" required>Seleccionar</option>
										<?php 
								  			$consult="select id_personal, no_emp, nombres, pat_ape, mat_ape from personal order by no_emp asc";
											$result = $conexion->query($consult);
								  			while ($row = $result->fetch_assoc()) {
								  					//echo "<option value=".'["id_tipouser"]'.">".'["tipo_user"]'."</option>";
										?>
										<option value="<?php echo $row['id_personal']; ?>"><?php echo ($row['no_emp']); ?>,  <?php echo ($row['nombres']); ?> <?php echo ($row['pat_ape']); ?> <?php echo ($row['mat_ape']); ?></option>
								   			
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
								<label>Articulo, Tipo y Talla</label>
 								<select id="id_articulo" name="id_articulo" class="form-control">
 									<option value="0">Seleccionar Articulo</option>
 								</select>
								<br>
								<label>Cantidad</label>
								<input type="text" name="cantidad" id="cantidad" class="form-control" required placeholder="Ingresa la Cantidad">
								<br>
								<label>Fecha de Ingreso</label>
								<div class="input-group date calendario">
  									<input type="text" name="fecha_salida" id="fecha_salida" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
								</div>
								<br>
								<label>Concepto de Entrega de Articulos</label>
 								<select name="id_concepto" id="id_concepto" class="form-control">
										<option value="0" required>Seleccionar</option>
										<?php 
								  			$consult="select id_concepto, concepto from concepto where id_tipo_concepto = '2'";
											$result = $conexion->query($consult);
								  			while ($row = $result->fetch_assoc()) {
								  					//echo "<option value=".'["id_tipouser"]'.">".'["tipo_user"]'."</option>";
										?>
										<option value="<?php echo $row['id_concepto']; ?>"><?php echo ($row['concepto']); ?></option>
								   			
										<?php } ?>
								</select><br>
								<div class="usuario">
									<input type="hidden" name="id_user" id="id_user" class="form-control" value="<?php echo $_SESSION['id_user']; ?>">
      							</div>
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

			<div class="modal fade" id="Ver">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h2 class="modal-tittle">Detalles de Entrega de Articulos</h2>
						</div>
						<div class="modal-body" id="detalle_salida">
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
							<h2 class="modal-tittle">Modificar Entrada de Articulos</h2>
						</div>
						<div class="modal-body">
							<form action="../../../controlador/admin/salida/modificar.php" method="post" id="modify_form" accept-charset="utf-8">
								<input type="hidden" name="id_salida" id="id_salida" class="form-control" required placeholder="Ingresa el Id Puesto">
								<label>Empleado</label>
								<select name="id_staff" id="id_staff" class="form-control">
									<option value="0" required>Seleccionar</option>
										<?php 
								  			$consult="select id_personal, no_emp, nombres, pat_ape, mat_ape from personal";
											$result = $conexion->query($consult);
								  			while ($row = $result->fetch_assoc()) {
								  					//echo "<option value=".'["id_tipouser"]'.">".'["tipo_user"]'."</option>";
										?>
										<option value="<?php echo $row['id_personal']; ?>"><?php echo ($row['no_emp']); ?> <?php echo ($row['nombres']); ?> <?php echo ($row['pat_ape']); ?> <?php echo ($row['mat_ape']); ?></option>
								   			
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
								<label>Articulo, Tipo y Talla</label>
 								<select id="id_article" name="id_article" class="form-control">
 									<option value="0">Seleccionar Articulo</option>
 									<option value="<?php echo $row['id_articulo']; ?>"><?php echo ($row['articulo']); ?></option>
 								</select>
								<br>
								<label>Cantidad</label>
								<input type="text" name="quantity" id="quantity" class="form-control" required placeholder="Ingresa la Cantidad">
								<br>
								<label>Fecha de Ingreso</label>
								<div class="input-group date calendario">
  									<input type="text" name="fecha_out" id="fecha_out" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
								</div>
								<br>
								<label>Concepto de Entrada de Articulos</label>
 								<select name="id_concept" id="id_concept" class="form-control">
										<option value="0" required>Seleccionar</option>
										<?php 
								  			$consult="select id_concepto, concepto from concepto where id_tipo_concepto = '2'";
											$result = $conexion->query($consult);
								  			while ($row = $result->fetch_assoc()) {
								  					//echo "<option value=".'["id_tipouser"]'.">".'["tipo_user"]'."</option>";
										?>
										<option value="<?php echo $row['id_concepto']; ?>"><?php echo ($row['concepto']); ?></option>
								   			
										<?php } ?>
								</select><br>
								<div class="usuario">
									<input type="hidden" name="iduser" id="iduser" class="form-control" value="<?php echo $_SESSION['id_user']; ?>">
      							</div>
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
					<th>No Emp</th>
					<th>Empleado</th>
					<!--<th>Categoria</th>-->
					<th>Articulo</th>
					<th>Tipo</th>
					<!--<th>Talla</th>-->
					<th>Cantidad</th>
					<th>Fecha</th>
					<!--<th>Concepto</th>
					<th>Usuario</th>-->
					<th>Ver</th>
					<th>Modificar</th>
					<th>Eliminar</th>
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
						<!--<td><?php echo $row['categoria']; ?></td>-->
						<td><?php echo $row['articulo']; ?></td>
						<td><?php echo $row['tipo']; ?></td>
						<!--<td><?php echo $row['talla']; ?></td>-->
						<td><?php echo $row['cantidad']; ?></td>
						<td><?php echo $row['fecha_salida']; ?></td>
						<!--<td><?php echo $row['concepto']; ?></td>
						<td><?php echo $row['nom_user']; ?></td>-->
						<td><a name="Ver" id="<?php echo $row['id_salida']; ?>" class="view_data" title="Ver Información"><span class="glyphicon glyphicon-list-alt"></span></a></td>
						<td><a name="Modificar" id="<?php echo $row['id_salida']; ?>" class="edit_data" title="Modificar Información"><span class="glyphicon glyphicon-pencil"></span></a></td>
						<td><a class="delete_data" href="#" data-href="../../../controlador/admin/salida/eliminar.php?id_salida=<?php echo $row['id_salida']; ?>" data-toggle="modal" data-target="#confirm-delete" title="Eliminar Registro"><span class="glyphicon glyphicon-trash"></span></a></td>
					</tr>
					<?php
					}
				?>
			</tbody>
		</table>
		<script>
			$(document).ready(function(){

				$('.calendario').datepicker({
    			format: "yyyy/mm/dd"
				});

				$(document).on('click', '.view_data', function(){  
           			var id_salida = $(this).attr("id");  
           			if(id_salida != '')  {  
                		$.ajax({  
                     	url:"../../../controlador/admin/salida/ver.php",  
                     	method:"POST",  
                     	data:{id_salida:id_salida},  
                     	success:function(data){  
                        $('#detalle_salida').html(data);  
                        $('#Ver').modal('show');  
                    	}  
                	});  
           		}            
      		}); 

				$(document).on('click', '.edit_data', function(){
					var id_salida = $(this).attr("id");
					$.ajax({
						url:"../../../controlador/admin/salida/mostrar.php",
						method:"POST",
						data:{id_salida:id_salida},
						dataType:"json",
						success:function(data){
							$('#id_salida').val(data.id_salida);
							$('#id_staff').val(data.id_personal);
							$('#id_category').val(data.id_categoria);
							$('#id_article').val(data.id_articulo);
							$('#quantity').val(data.cantidad);
							$('#fecha_out').val(data.fecha_salida);
							$('#id_concept').val(data.id_concepto);
							$('#iduser').val(data.id_user);
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
					¿Desea Eliminar el Empleado?<br><br>
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
			$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
		});
	</script>
</body>
</html>