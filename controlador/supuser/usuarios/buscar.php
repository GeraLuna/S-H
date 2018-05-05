<?php 
	
	include("../../../modelo/conexion.php");

	/*Registro de Tipo de Usuario*/
	echo "<a href='../../../vista/supuser/usuarios/usuarios.php'>Regresar</a>";
	/*

	usuarios.id_tipo_user = tipo_usuario.id_tipo_user and 
	 nom_user like "%'.$dato.'%" OR user like "%'.$dato.'%" OR pass like "%'.md5($dato).'%"
	*/
	$dato = $_POST['buscar_usuario'];

	$query='select nom_user, user, pass, tipo_usuario.tipo_usuario 
			from usuarios, tipo_usuario
			where nom_user like "%'.$dato.'%" OR user like "%'.$dato.'%" OR pass like "%'.md5($dato).'%" OR tipo_usuario like "%'.$dato.'%" and usuarios.id_tipo_user = tipo_usuario.id_tipo_user';
			$resultado = $conexion->query($query);
			$i=0;
			if(mysqli_num_rows($resultado)<1){
				echo "La busqueda no obtuvo resultados.";	
			}else{
			echo "<table class='tabla'>
					<caption>Tabla de Usuarios</caption>
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Usuario</th>
								<th>Contraseña</th>
								<th>Tipo de Usuario</th>
								<th colspan='2'>Opciones</th>
							</tr>
						</thead>
					<tbody>";
			 while ($row = mysqli_fetch_array($resultado)){	
			 	echo "<tr>";
			 	echo "<td align='center'>".$row["nom_user"]."</td>"; 								
				echo "<td align='center'>".$row["user"]."</td>";
				echo "<td align='center'>".$row["pass"]."</td>"; 								
				echo "<td align='center'>".$row["tipo_usuario"]."</td>";
				echo "<td><a class='btn btn-info' data-toggle='modal' href='../../../controlador/supuser/tipousuario/eliminar.php?id_tipo_user= #Modificar'>Modificar</a></td>";
				echo "<td><a class='btn btn-warning' href='../../../controlador/supuser/tipousuario/eliminar.php?id_tipo_user='>Eliminar</a></td>";
				echo "</tr>
						</tbody>
					</table>";
				}
			}

?>