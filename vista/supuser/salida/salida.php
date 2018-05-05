<?php

	$_SESSION['detalle'] = array();

	include("../../../modelo/conexion.php");
	include("../../../controlador/seguridad.php");
	include("../../../modelo/articulo.php");

	$objProducto = new Articulo();
	$resultado_producto = $objProducto->get();

	//echo $nom_user;
	//echo "<br>";
	if($id_tipo_user != 1){
		header("location: ../../../iniciosesion.php");
		exit();
	}

	


	$tabla="SELECT id_salida, no_emp, nombres, pat_ape, mat_ape, categoria, articulo, tipo, talla, cantidad, fecha_salida, concepto, nom_user FROM salida, personal, categoria, articulo, concepto, usuarios WHERE salida.id_personal = personal.id_personal AND salida.id_categoria = categoria.id_categoria AND salida.id_articulo = articulo.id_articulo AND salida.id_concepto = concepto.id_concepto AND salida.id_user = usuarios.id_user";
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
	<script type="text/javascript" src="../../../js/jquery-3.2.1.min.js"></script>

	 <!-- Alertity -->
    <link rel="stylesheet" href="../../../js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="../../../js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="../../../js/alertify/lib/alertify.min.js"></script>

    <script type="text/javascript" src="../../../js/ajax.js"></script>

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
				    $.post("../../../controlador/supuser/salida/combos.php", { id_categoria: id_categoria }, function(data) {
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
				    $.post("../../../controlador/supuser/salida/combos_edit.php", { id_category: id_category }, function(data) {
				    	$("#id_article").html(data);
				    });
				});
			});
		});
	</script>


	<script type="text/javascript">
    function validarForm(formulario) 
    {
        if(formulario.palabra.value.length==0) 
        { //¿Tiene 0 caracteres?
            formulario.palabra.focus();  // Damos el foco al control
            alert('Debes rellenar este campo'); //Mostramos el mensaje
            return false; 
         } //devolvemos el foco  
         return true; //Si ha llegado hasta aquí, es que todo es correcto 
     }   
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
		<div class="user">
			<div class="centrado">
				<?php
    		      echo "Bienvenido " .$nom_user;
       			?>
			</div>
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
			<div class="container">
 		
 		<div class="row">
 			<label>Buscar Empleado</label><br>
				<form action="" method="post" id="brouse_form" accept-charset="utf-8">
					<div class="col-md-4">
						<label>N° de Empleado</label>
						<input type="text" name="keywords" id="keywords" class="form-control" required placeholder="Ingresa el No de Empleado" size="10" maxlength="10">
						<input type="submit" name="search" id="search" value="Buscar" class="btn btn-primary"><br>
					</div><br>
							
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
				<form>
				<div class="col-md-4">
						<label>Empleado</label>
								<input type="hidden" REQUIRED disabled name="id_personal" id="id_personal" value="<?php echo $id; ?>" class="form-control" required placeholder="Ingresa el No de Empleado" >
								<input type="text" REQUIRED disabled name="empleado" id="empleado" value="<?php echo $empleado; ?>" class="form-control" required placeholder="Ingresa el No de Empleado" >
								<?php
								}
								  	}		
								  	?>
					</div>		
		
					
 			
			<div class="col-md-4">
			<div><b>Categoria:</b>
				<select name="id_categoria" id="id_categoria" class="form-control">
					<option value="0" required>Seleccionar</option>
						<?php 
							$consult="select id_categoria, categoria from categoria";
							$result = $conexion->query($consult);
							while ($row = $result->fetch_assoc()) {	
						?>
					<option value="<?php echo $row['id_categoria']; ?>"><?php echo ($row['categoria']); ?></option>
						<?php } ?>					
				</select>
			</div>	
			<div><b>Articulo:</b>
				<select id="id_articul" name="id_articul" class="form-control">
 					<option value="1">Seleccionar Articulo</option>
 				</select>
			</div>
			<div class="col-md-4">	
				<div>Producto:
				<select name="id_articulo" id="id_articulo" class="col-md-2 form-control">
					<option value="0">Seleccione un producto</option>
					<?php foreach($resultado_producto as $producto):?>
						<option value="<?php echo $producto['id_articulo']?>"><?php echo $producto['id_articulo']." ".$producto['articulo']." ".$producto['tipo']." ".$producto['talla']?></option>
					<?php endforeach;
					echo $producto['id'];
					echo $producto['articulo'];?>
				</select>
				</div>
			</div>
			<div class="col-md-15">
				<div><b>Cantidad:</b>
				  <input id="txt_cantidad" name="txt_cantidad" type="number" class="col-md-2 form-control" placeholder="Ingrese cantidad" autocomplete="off" />
				</div>
			</div>
			</div>
			
			
			<div class="col-md-2">
				<div style="margin-top: 130px;">
				<button type="button" class="btn btn-success btn-agregar-producto">Agregar</button>
				</div>
			</div>
		</div>
		
		<br>
		<div class="panel panel-info">
			 <div class="panel-heading">
		        <h3 class="panel-title">Productos</h3>
		      </div>
			<div class="panel-body detalle-producto">
				<?php if(count($_SESSION['detalle'])>0){?>
					<table class="table">
					    <thead>
					        <tr>
					            <th>Categoria</th>
					            <th>Articulo</th>
					            <th>Tipo</th>
					            <th>Talla</th>
					            <th>Stock</th>
					            <th>Cantidad</th>
					            <th></th>
					        </tr>
					    </thead>
					    <tbody>
					    	<?php 
					    	foreach($_SESSION['detalle'] as $k => $detalle){ 
					    	?>
					        <tr>
					        	<td><?php echo $detalle['categoria'];?></td>
					            <td><?php echo $detalle['articulo'];?></td>
					            <td><?php echo $detalle['tipo'];?></td>
					            <td><?php echo $detalle['talla'];?></td>
					            <td><?php echo $detalle['stock'];?></td>
					            <td><?php echo $detalle['cantidad'];?></td>
					            <td><button type="button" class="btn btn-sm btn-danger eliminar-producto" id="<?php echo $detalle['id_articulo'];?>">Eliminar</button></td>
					        </tr>
					        <?php }?>
					    </tbody>
					</table>
				<?php }else{?>
				<div class="panel-body"> No hay productos agregados</div>
				<?php }?>
			</div>
			</form>	
		</div>
 	</div>	
 	</div>
</body>
</html>

https://www.youtube.com/watch?v=3_ldx0puIVU