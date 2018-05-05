<?php  

    include("../../../modelo/conexion.php"); 

 if(isset($_POST["id_proveedor"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM proveedores WHERE id_proveedor = '".$_POST["id_proveedor"]."'";  
      $result = mysqli_query($conexion, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Nombre de la Empresa</label></td>  
                     <td width="70%">'.$row["empresa"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Dirección</label></td>  
                     <td width="70%">'.$row["direccion"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Contacto</label></td>  
                     <td width="70%">'.$row["contacto"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Telefóno</label></td>  
                     <td width="70%">'.$row["telefono"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Celular</label></td>  
                     <td width="70%">'.$row["celular"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Correo</label></td>  
                     <td width="70%">'.$row["correo"].'</td>  
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