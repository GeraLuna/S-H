<?php 
	
	include("../../../modelo/conexion.php");

	/*Registro de Tipo de Usuario*/
	/*$dato = $_POST['buscar_departamento'];

	$query='select * 
			from departamentos
			where departamento like "%'.$dato.'%"';
			$resultado = $conexion->query($query);
			$i=0;
			if(mysqli_num_rows($resultado)<1){
				echo "La busqueda no obtuvo resultados.";	
			}else{
			echo "<table class='tabla'>
					<caption>Tabla de Departamentos</caption>
						<thead>
							<tr>
								<th>Id</th>
								<th>Departamento</th>
								<th colspan='2'>Opciones</th>
							</tr>
						</thead>
					<tbody>";
			 while ($row = mysqli_fetch_array($resultado)){	
			 	echo "<tr>";
			 	echo "<td align='center'>".$row["id_depto"]."</td>"; 								
				echo "<td align='center'>".$row["departamento"]."</td>";
				echo "<td><a class='btn btn-info' data-toggle='modal' href='../../../controlador/departamentos/eliminar.php?id_depto= #Modificar'>Modificar</a></td>";
				echo "<td><a class='btn btn-warning' href='../../../controlador/departamentos/eliminar.php?id_depto='>Eliminar</a></td>";
				echo "</tr>
						</tbody>
					</table>";
				}
			}*/

?>
