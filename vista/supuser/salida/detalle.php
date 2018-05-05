<?php 
//@session_start();
?>
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

<script type="text/javascript" src="../../../js/ajax.js"></script>