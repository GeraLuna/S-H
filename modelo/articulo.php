<?php
class Articulo
{
	function get(){
		$sql = "SELECT * FROM articulo";
		global $conexion;
		return $conexion->query($sql);
	}
	
	function getById($id_articulo){
		$sql = "SELECT * FROM articulo WHERE id_articulo = $id_articulo";
		global $conexion;
		return $conexion->query($sql);
	}
}