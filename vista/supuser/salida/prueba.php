<?php
	include("../../../modelo/conexion.php");
	include("../../../controlador/seguridad.php");
	//echo $nom_user;
	//echo "<br>";
	if($id_tipo_user != 1){
		header("location: ../../../iniciosesion.php");
		exit();
	}

	


	$tabla="SELECT id_articulo, categoria, articulo, tipo, talla FROM categoria, articulo WHERE articulo.id_categoria = categoria.id_categoria";
	$resultado = $conexion->query($tabla);

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Entrega de Articulos</title>
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
	<!------COMBO ANIDADO---------->
	<!--<script src="../../../js/jquery-3.2.1.min.js"></script>-->
	<script language="javascript">
		$(document).ready(function() {
			$("#id_categoria").change(function() {

				//$('#id_puesto').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

				$("#id_categoria option:selected").each(function() {
				    id_categoria = $(this).val();
				    $.post("../../../controlador/supuser/entrada/combos.php", { id_categoria: id_categoria }, function(data) {
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
				    $.post("../../../controlador/supuser/entrada/combos_edit.php", { id_category: id_category }, function(data) {
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
				<h3>Entrega de Articulos</h3>
				<div class="empleado">
					<label>Buscar Empleado</label><br>
					<form action="" method="post" id="brouse_form" accept-charset="utf-8">
						<label>N° de Empleado</label>
						<input type="text" name="keywords" id="keywords" class="form-control" required placeholder="Ingresa el No de Empleado" size="10" maxlength="10">
						<br>
						<input type="submit" name="search" id="search" value="Buscar" class="btn btn-primary"><br><br>	
						<?php
							//Si se ha pulsado el botón de buscar
							if (isset($_POST['search'])) {
    						//Recogemos las claves enviadas
   		 					$keywords = $_POST['keywords'];

							$query = "SELECT id_personal, nombres, pat_ape, mat_ape 
									  FROM personal 
									  WHERE no_emp = '$keywords'";

							$result = $conexion->query($query);

							while ($row = $result->fetch_assoc()) {
								  	$id = $row['id_personal']; 
								  	$empleado = $row['nombres']." ".$row['pat_ape']." ".$row['mat_ape'];	
						?>				
					</form>
				</div>
				<div class="formulario">
					<form action="../../../controlador/supuser/salida/registrar.php" method="post" id="insert_form" accept-charset="utf-8">
						<label>Empleado</label>
								<input type="hidden" REQUIRED disabled name="id_personal" id="id_personal" value="<?php echo $id; ?>" class="form-control" required placeholder="Ingresa el No de Empleado" >
								<input type="text" REQUIRED disabled name="empleado" id="empleado" value="<?php echo $empleado; ?>" class="form-control" required placeholder="Ingresa el No de Empleado" >
								<?php
								}
								  	}		
								  	?>
								<br>
								<label>Articulo</label>
								<a class='btn btn-success' value="registrar" data-toggle="modal" href="#Registro"><span class="glyphicon glyphicon-plus"></span></a><br><br>
								<div class="modal fade" id="Registro">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h2 class="modal-tittle">Agregar Articulos</h2>
						</div>
						<div class="modal-body">
							<h4>Selección de Articulos</h4>
								<label>Seleccione una Categoria</label>
								<form name="form" method="post" action="">
 								<select name="id_categoria" id="id_categoria" class="form-control">
										<option value="0" required>Seleccionar</option>
										<?php 
								  			$consult="select id_categoria, categoria from categoria";
											$result = $conexion->query($consult);
								  			while ($row = $result->fetch_assoc()) {
								  					
												
										?>
										<option value="<?php echo $row['id_categoria']; ?>"><?php echo ($row['categoria']); ?></option>
								   		<?php } ?>
										
								</select><br>
								<label>Seleccione un Articulo</label>
									<select id="id_articulo" name="id_articulo" class="form-control">
 										<option value="0">Seleccionar Articulo</option>
 									</select><br>
 								<label>Cantidad</label>
 								<input type="number" name="cantidad" id="cantidad" class="form-control" required placeholder="Ingresa la Cantidad"><br>
 									<input type="submit" name="insert" id="insert" value="Agregar" class="btn btn-primary" data-dismiss="modal">
								</form>
								
								<!--<div class="row table-responsive">
								<table  class="display" name="tabla">
									<thead>
										<tr>
											<th>Check</th>
											<th>Articulo</th>
											<th>Tipo</th>
											<th>Talla</th>
											<th>Cantidad</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$tab="SELECT articulo, tipo, talla FROM articulo";
										$resul = $conexion->query($tab);
											while($row= $resul->fetch_assoc()){
										?>
										<tr>
											<td><input type="checkbox" name="selected"></td>
											<td><?php echo $row['articulo']; ?></td>
											<td><?php echo $row['tipo']; ?></td>
											<td><?php echo $row['talla']; ?></td>
											<td><input type="text" name="cantidad"></td>
										</tr>
										<?php
											}
										?>
									</tbody>
								</table>-->
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</div>		
			</div>
			<table class="table table-striped">
 				<thead>
				<tr>
					<th>id</th>
					<th>Articulo</th>
					<th>Tipo</th>
					<th>Talla</th>
					<th>Cantidad</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if (isset($_REQUEST['insert'])) {
					$id = $_REQUEST['id_articulo'];
					echo "El id seleccionado es: $id";
				}
				?>
				<!-- 
					<?php
				if (isset($_POST['insert'])) {
 						$id_articulo = $_POST['id_articulo'];

 						$query = "SELECT id_articulo, articulo, tipo, talla 
								  FROM articulo 
								  WHERE id_articulo = '".$id_articulo."'";

						$result = $conexion->query($query);
				?>
				<?php
						while($row= $result->fetch_assoc()){
							
				?>
					<tr>
						<td><input type="text" name="id_articulo" value="<?php echo $row['id_articulo']; ?>"></td>
						<td><?php echo $row['articulo']; ?></td>
						<td><?php echo $row['tipo']; ?></td>
						<td><?php echo $row['talla']; ?></td>
						<td><input type="text" name=""></td>
					</tr>
					<?php
					}
				}
				?>
				-->
			</tbody>
			</table>
			<input type="submit" name="button" id="button" value="Registrar" class="btn btn-success" data-dismiss="modal">
				</div>	-->					
							
				
				

			</section>
</body>
</html>
