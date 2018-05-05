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
			$where = "WHERE no_emp LIKE '%$valor%', nombres LIKE '%$valor%', pat_ape LIKE '%$valor%', mat_ape LIKE '%$valor%', puesto LIKE '%$valor%'";
			/*, genero LIKE '%$valor%', fecha_ingreso LIKE '%$valor%', departamento LIKE '%$valor%', puesto LIKE '%$valor%'*/
		}
	}

	$tabla="SELECT id_personal, no_emp, nombres, pat_ape, mat_ape, puesto FROM personal, puestos WHERE personal.id_puesto = puestos.id_puesto";
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

  	<!--RADIO BUTTONS PARA EL GENERO-->
  	<script type="text/javascript">
    function verificaRadios(form){
        marcado=false;
        for ( var i = 0; i < form.genero.length; i++ ) {
            if (form.genero[i].checked)
                marcado = true;
        }

        if(!marcado){
            alert("Por favor, debe elegir una opción!");
            return false;
        }
        else{
            return true;
        }
    }
    </script>
  	
	<!----------COMBO ANIDADO REGISTROS---------->
	<!--<script src="../../../js/jquery-3.2.1.min.js"></script>-->
	<script language="javascript">
		$(document).ready(function() {
			$("#id_depto").change(function() {

				//$('#id_puesto').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

				$("#id_depto option:selected").each(function() {
				    id_depto = $(this).val();
				    $.post("../../../controlador/user/personal/combos.php", { id_depto: id_depto }, function(data) {
				    	$("#id_puesto").html(data);
				    });
				});
			});
		});



	//----------COMBO ANIDADO EDITAR REGISTROS--------
		$(document).ready(function() {
			$("#iddepto").change(function() {

				//$('#id_puesto').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

				$("#iddepto option:selected").each(function() {
				    iddepto = $(this).val();
				    $.post("../../../controlador/user/personal/combos_edit.php", { iddepto: iddepto }, function(data) {
				    	$("#idpuesto").html(data);
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
						<li><a href="personal.php" >Personal</a></li>
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
				<h1>Personal</h1>
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
							<h2 class="modal-tittle">Registrar Personal</h2>
						</div>
						<div class="modal-body">
							<form action="../../../controlador/user/personal/registrar.php" method="post" id="insert_form" accept-charset="utf-8">
								<label>No. Empleado</label>
								<input type="text" name="no_emp" id="no_emp" class="form-control" required placeholder="Ingresa el Nombre del Puesto">
								<br>
								<label>Nombres</label>
								<input type="text" name="nombres" id="nombres" class="form-control" required placeholder="Ingresa el Nombre del Puesto">
								<br>
								<label>Apellido Paterno</label>
								<input type="text" name="pat_ape" id="pat_ape" class="form-control" required placeholder="Ingresa el Nombre del Puesto">
								<br>
								<label>Apellido Materno</label>
								<input type="text" name="mat_ape" id="mat_ape" class="form-control" required placeholder="Ingresa el Nombre del Puesto">
								<br>
								<label>Genero</label><br>
								<input type="radio" class="genero" name="genero" value="Femenino" checked />
                    			Femenino&nbsp;
                				<input type="radio" class="genero" name="genero" value="Masculino"/>
                    			Masculino&nbsp;
                    			                    			<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['genero']))
        echo 'Has seleccionado el genero '.$_POST['genero'];
    else
        echo 'Debes seleccionar una opción.';
}
?>
								<br><br>
								<label>Fecha de Ingreso</label>
								<div class="input-group date calendario">
  									<input type="text" name="fecha_ingreso" id="fecha_ingreso" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
								</div>
								<br>
								<label>Departamento</label>
 								<select id="id_depto" name="id_depto" class="form-control">
										<option value="0">Seleccionar Departamento</option>
										<?php 
								  			$consult="SELECT id_depto, departamento FROM departamentos ORDER BY departamento ASC";
											$result = $conexion->query($consult);
								  			while ($row = $result->fetch_assoc()) {
										?>
										<option value="<?php echo $row['id_depto']; ?>"><?php echo ($row['departamento']); ?></option>
										<?php } ?>
								</select>
								<br>
								<label>Puesto</label>
 								<select id="id_puesto" name="id_puesto" class="form-control">
 									<option value="0">Seleccionar Puesto</option>
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

			<div class="modal fade" id="Ver">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h2 class="modal-tittle">Detalles del Personal</h2>
						</div>
						<div class="modal-body" id="detalle_personal">
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
							<h2 class="modal-tittle">Modificar Personal</h2>
						</div>
						<div class="modal-body">
							<form action="../../../controlador/user/personal/modificar.php" method="post" id="modify_form" accept-charset="utf-8">
								<input type="hidden" name="id_personal" id="id_personal" class="form-control" required placeholder="Ingresa el Id Puesto">
								<label>No. Empleado</label>
								<input type="text" name="number" id="number" class="form-control" required placeholder="Ingresa el No. de Empleado">
								<br>
								<label>Nombres</label>
								<input type="text" name="names" id="names" class="form-control" required placeholder="Ingresa el Nombre del Puesto">
								<br>
								<label>Apellido Paterno</label>
								<input type="text" name="apepat" id="apepat" class="form-control" required placeholder="Ingresa el Nombre del Puesto">
								<br>
								<label>Apellido Materno</label>
								<input type="text" name="apemat" id="apemat" class="form-control" required placeholder="Ingresa el Nombre del Puesto">
								<br>
								<label>Genero</label><br>
								<!--<input type="radio" class="gender" name="gender" value="Femenino"  checked="<?php if( $row == "Femenino" ) { ?>checked='checked'<?php } ?>" />
                    			Femenino&nbsp;
                				<input type="radio" class="gender" name="gender" value="Masculino" checked="<?php if( $row == "Masculino" ) { ?>checked='checked'<?php } ?>" />
                    			Masculino&nbsp;-->
                    			<select name="gender" id="gender" class="form-control">
                    			<option value="Masculino" <?php if( $row == "Masculino" ) { ?>checked="checked"<?php } ?> >Masculino
								<option value="Femenino" <?php if( $row == "Femenino" ) { ?>checked="checked"<?php } ?>>Femenino
									</select>
								<br><br>
								
								<label>Fecha de Ingreso</label>
								<div class="input-group date calendario">
  									<input type="text" name="fechaingreso" id="fechaingreso" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
								</div>
								<br>
								<label>Departamento</label>
 								<select name="iddepto" id="iddepto" class="form-control">
										<option value="0">Seleccionar Departamento</option>
										<?php 
								  			$consult="SELECT id_depto, departamento FROM departamentos ORDER BY departamento ASC";
											$result = $conexion->query($consult);
								  			while ($row = $result->fetch_assoc()) {
										?>
										<option value="<?php echo $row['id_depto']; ?>"><?php echo ($row['departamento']); ?></option>
										<?php } ?>
								</select>
								<br>
								<label>Puesto</label>
 								<select name="idpuesto" id="idpuesto" class="form-control">
 									<option value="0">Seleccionar Puesto</option>
										<!--<?php 
								  			$consult="select id_puesto, puesto from puestos";
											$result = $conexion->query($consult);
								  			while ($row = $result->fetch_assoc()) {
								  					//echo "<option value=".'["id_tipouser"]'.">".'["tipo_user"]'."</option>";
										?> -->
										<option value="<?php echo $row['id_puesto']; ?>"><?php echo ($row['puesto']); ?></option>
										<!--<?php } ?>-->
 								</select><br>
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
					<th>No. Emp</th>
					<th>Nombres</th>
					<th>Ap. Pat.</th>
					<th>Ap. Mat.</th>
					<th>Puesto</th>
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
						<!--<td><?php echo $row['id_personal']; ?></td>-->
						<td><?php echo $row['no_emp']; ?></td>
						<td><?php echo $row['nombres']; ?></td>
						<td><?php echo $row['pat_ape']; ?></td>
						<td><?php echo $row['mat_ape']; ?></td>
						<td><?php echo $row['puesto']; ?></td>
						<td><a name="Ver" id="<?php echo $row['id_personal']; ?>" class="view_data" title="Ver Información"><span class="glyphicon glyphicon-list-alt"></span></a></td>
						<td><a name="Modificar" id="<?php echo $row['id_personal']; ?>" class="edit_data" title="Modificar Información"><span class="glyphicon glyphicon-pencil"></span></a></td>
						<td><a class="delete_data" href="#" data-href="../../../controlador/user/personal/eliminar.php?id_personal=<?php echo $row['id_personal']; ?>" data-toggle="modal" data-target="#confirm-delete" title="Eliminar Registro"><span class="glyphicon glyphicon-trash"></span></a></td>
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
           			var id_personal = $(this).attr("id");  
           			if(id_personal != '')  {  
                		$.ajax({  
                     	url:"../../../controlador/user/personal/ver.php",  
                     	method:"POST",  
                     	data:{id_personal:id_personal},  
                     	success:function(data){  
                        $('#detalle_personal').html(data);  
                        $('#Ver').modal('show');  
                    	}  
                	});  
           		}            
      		});  

				$(document).on('click', '.edit_data', function(){
					var id_personal = $(this).attr("id");
					$.ajax({
						url:"../../../controlador/user/personal/mostrar.php",
						method:"POST",
						data:{id_personal:id_personal},
						dataType:"json",
						success:function(data){
							$('#id_personal').val(data.id_personal);
							$('#number').val(data.no_emp);
							$('#names').val(data.nombres);
							$('#apepat').val(data.pat_ape);
							$('#apemat').val(data.mat_ape);
							$('#gender').val(data.genero);
							$('#fechaingreso').val(data.fecha_ingreso);
							$('#iddepto').val(data.id_depto);
							$('#idpuesto').val(data.id_puesto);
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
			$('.debug-url').html('Delete URL: <<strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
		});
	</script>
</body>
</html>