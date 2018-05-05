<?php  

    include("../../../modelo/conexion.php"); 

 if(isset($_POST["id_salida"]))  
 {  
      $output = '';  
      $query = "SELECT id_salida, no_emp, nombres, pat_ape, mat_ape, categoria, articulo, tipo, talla, cantidad, fecha_salida, concepto, nom_user FROM salida, personal, categoria, articulo, concepto, usuarios WHERE salida.id_personal = personal.id_personal AND salida.id_categoria = categoria.id_categoria AND salida.id_articulo = articulo.id_articulo AND salida.id_concepto = concepto.id_concepto AND salida.id_user = usuarios.id_user AND id_salida = '".$_POST["id_salida"]."'"; 
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
                     <td width="30%"><label>Empleado</label></td>  
                     <td width="70%">'.$row["nombres"]. " ".$row["pat_ape"]. " " .$row["mat_ape"]. '</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Categoria</label></td>  
                     <td width="70%">'.$row["categoria"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Articulo</label></td>  
                     <td width="70%">'.$row["articulo"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Tipo</label></td>  
                     <td width="70%">'.$row["tipo"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Talla</label></td>  
                     <td width="70%">'.$row["talla"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Cantidad</label></td>  
                     <td width="70%">'.$row["cantidad"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Fecha de Entrega</label></td>  
                     <td width="70%">'.$row["fecha_salida"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Concepto</label></td>  
                     <td width="70%">'.$row["concepto"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Entrego</label></td>  
                     <td width="70%">'.$row["nom_user"].'</td>  
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