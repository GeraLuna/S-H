<?php
	
	session_start();
	sleep(5);
	require("../modelo/conexion.php"); 

	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$consulta = "SELECT id_user, nom_user, id_tipo_user FROM usuarios WHERE user = '".$user."' AND pass = md5('".$pass."')";

	$resultado = mysqli_query($conexion, $consulta);

	if(1 == mysqli_num_rows($resultado)){
		$linea = mysqli_fetch_array($resultado);

		$id_user = $linea[0];
		$nom_user = $linea[1];
		$id_tipo_user = $linea[2];

		$_SESSION["id_user"] = $id_user;
		$_SESSION["nom_user"] = $nom_user;
		$_SESSION["id_tipo_user"] = $id_tipo_user;

		/*echo $_SESSION["nom_user"];
		echo $_SESSION["id_tipo_user"];*/		

		/*echo "$nom_user";
		echo "$id_tipo_user";*/

		/*if($id_tipo_user == 1){
			echo "$nom_user";
			echo "$id_tipo_user";
		}else if ($id_tipo_user == 2){
			echo "$nom_user";
			echo "$id_tipo_user";
		}else if ($id_tipo_user == 3){
			echo "$nom_user";
			echo "$id_tipo_user";
		}*/

		switch ($id_tipo_user) {
			case '1':
				header("location: ../vista/supuser/menu.php");
				break;
			
			case '2':
				header("location: ../vista/admin/menu.php");
				break;

			case '3':
				header("location: ../vista/user/menu.php");
				break;
		}
	}else{
		echo "<script languaje='javascript'>alert('No se pudo Iniciar Sesión, Verifica que tus datos sean correctos'); 
			  window.location='../iniciosesion.php';</script>";
	}

	mysql_close();
?>