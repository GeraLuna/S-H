<?php  

    include("../../../modelo/conexion.php"); 

 if(isset($_POST["id_entrada"]))  
 {  
      $output = '';  
      $query = "SELECT id_entrada, categoria, articulo, tipo, talla, cantidad, fecha_entrada, concepto, nom_user FROM entrada, categoria, articulo, concepto, usuarios WHERE entrada.id_categoria = categoria.id_categoria AND entrada.id_articulo = articulo.id_articulo AND entrada.id_user = usuarios.id_user AND entrada.id_concepto = concepto.id_concepto AND id_entrada = '".$_POST["id_entrada"]."'"; 
      $result = mysqli_query($conexion, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= ' 
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
                     <td width="30%"><label>Fecha de Entrada</label></td>  
                     <td width="70%">'.$row["fecha_entrada"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Concepto</label></td>  
                     <td width="70%">'.$row["concepto"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Registro</label></td>  
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