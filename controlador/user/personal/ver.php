<?php  

    include("../../../modelo/conexion.php"); 

 if(isset($_POST["id_personal"]))  
 {  
      $output = '';  
      $query = "SELECT no_emp, nombres, pat_ape, mat_ape, genero, fecha_ingreso, departamento, puesto FROM personal, departamentos, puestos WHERE personal.id_depto = departamentos.id_depto AND personal.id_puesto = puestos.id_puesto AND id_personal = '".$_POST["id_personal"]."'";  
      $result = mysqli_query($conexion, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= ' 
           		<tr>  
                     <td width="30%"><label>No. Empleado</label></td>  
                     <td width="70%">'.$row["no_emp"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Nombres</label></td>  
                     <td width="70%">'.$row["nombres"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Apellido Paterno</label></td>  
                     <td width="70%">'.$row["pat_ape"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Apellido Materno</label></td>  
                     <td width="70%">'.$row["mat_ape"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Genero</label></td>  
                     <td width="70%">'.$row["genero"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Fecha de Ingreso</label></td>  
                     <td width="70%">'.$row["fecha_ingreso"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Departamento</label></td>  
                     <td width="70%">'.$row["departamento"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Puesto</label></td>  
                     <td width="70%">'.$row["puesto"].'</td>  
                </tr>  
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
 ?>