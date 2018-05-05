<?php 
	include("../../../modelo/conexion.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>buscador</title>
</head>
<body>
	<form action="" method="post" id="brouse_form" accept-charset="utf-8">
		<label>N° de Empleado</label>
		<input type="text" name="keywords" id="keywords" class="form-control" required placeholder="Ingresa el No de Empleado">
		<input type="submit" name="search" id="search" value="Buscar" class="btn btn-primary"><br><br>
		<?php
									//Si se ha pulsado el botón de buscar
									if ($_POST['search']) {
    								//Recogemos las claves enviadas
   		 								$keywords = $_POST['keywords'];


										$query = "SELECT id_personal, nombres, pat_ape, mat_ape 
												  FROM personal 
												  WHERE no_emp = '$keywords'";

										$result = $conexion->query($query);

								while ($row = $result->fetch_assoc()) {
								  				$id= $row['id_personal']; 
								  				$empleado = $row['nombres']." ".$row['pat_ape']." ".$row['mat_ape'];	
								  				
								  			?>
								  			
	</form>
	<form>
		<input type='hidden' name='id_personal' id='id_personal' value="<?php echo $id ?>" class='form-control' required placeholder='Ingresa el No de Empleado' >
		<input type='text' REQUIRED disabled name='empleado' id='empleado' value='<?php echo $empleado ?>' class='form-control' required placeholder='Ingresa el No de Empleado'><br><br>
								  			<?php 	 
								}
							}
		?>
		<label>Seleccione una categoria</label>	
		<select name="id_categoria" id="id_categoria" class="form-control">
										<option value="0" required>Seleccionar</option>
										<?php 
								  			$consult="select id_categoria, categoria from categoria";
											$result = $conexion->query($consult);
								  			while ($row = $result->fetch_assoc()) {
								  					
												
										?>
										<option name="id_categoria" id="id_categoria" value="<?php echo $row['id_categoria']; ?>"><?php echo ($row['categoria']); ?></option>
								   		<?php } ?>

								   		<?php 

								   		if ($_POST['id_categoria']){

								   			$eleccion = $_POST['id_categoria'];

								   			$query = "SELECT id_articulo, id_categoria, articulo, tipo, talla 
								   					  FROM articulo
								   					  WHERE id_categoria = '$eleccion'";

								   			$result = $conexion->query($query);

										while ($row = $result->fetch_assoc()) {
								  				$idcate= $row['id_categoria']; 
								  				$id= $row['id_articulo']; 
								  				$empleado = $row['articulo']." ".$row['tipo']." ".$row['talla'];

								   		?>
								   		<input type='hidden' name='id_personal' id='id_personal' value="<?php echo $idcate ?>" class='form-control' required placeholder='Ingresa el No de Empleado' >
								   		<input type='hidden' name='id_personal' id='id_personal' value="<?php echo $id ?>" class='form-control' required placeholder='Ingresa el No de Empleado' >
										<input type='text' REQUIRED disabled name='empleado' id='empleado' value='<?php echo $empleado ?>' class='form-control' required placeholder='Ingresa el No de Empleado'><br><br>
										<?php 
										}
										}
										 ?>
										
		</select><br>
	</form>	
	<script>
		$('select#id_categoria').on('change',function(){
    var valor = $(this).val();
    alert(valor);
});
	</script>							
</body>
</html>