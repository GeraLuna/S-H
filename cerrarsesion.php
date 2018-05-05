<?php 
	
	session_start();
	session_unset(); //Libera todas las variables de sesión
	session_destroy(); //Destruye toda la información registrada de una sesión
	header("location: iniciosesion.php");
?>