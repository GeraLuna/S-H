<?php 
	include("../../controlador/seguridad.php");
	//echo $nom_user;
	//echo "<br>";
	if($id_tipo_user != 3){
		header("location: ../../iniciosesion.php");
		exit();
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Menú</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="../../css/menu.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="../../js/menu.js"></script>
</head>
<body>
	<div class="contenedor">
		<nav class="bar-horizon">
			<div class="logocoficab">
				<a href=""><img src="../../img/coficab.png" alt="20px"></a>
			</div>
		</nav>
		<div class="contenedor-menu">
			<a href="#" class="btn-menu">Menu <i class="icono fa fa-bars" aria-hidden="true"></i></a>
		<nav class="nav-vertical">
			<ul class="menu">
				<!--<li><a href=""><i class="icono izquierda fa fa-user" aria-hidden="true"></i>Usuarios<i class="icono derecha fa fa-angle-down" aria-hidden="true"></i></a>
					<ul>
						<li><a href="tipousuario/tipousuario.php" >Tipos de Usuario</a></li>
						<li><a href="usuarios/usuarios.php" >Usuarios</a></li>
					</ul>
				</li>-->
				<li><a href=""><i class="icono izquierda fa fa-building" aria-hidden="true"></i>Empresa<i class="icono derecha fa fa-angle-down" aria-hidden="true"></i></a>
					<ul>
						<!--<li><a href="departamentos/departamentos.php" >Departamentos</a></li>
						<li><a href="puestos/puestos.php" >Puestos</a></li>-->
						<li><a href="personal/personal.php" >Personal</a></li>
					</ul>
				</li>
				<!--<li><a href=""><i class="icono izquierda fa fa-tags" aria-hidden="true"></i>Artículos<i class="icono derecha fa fa-angle-down" aria-hidden="true"></i></a>
					<ul>
						<li><a href="proveedores/proveedores.php" >Proveedores</a></li>
						<li><a href="categoria/categoria.php" >Categoria</a></li>
						<li><a href="articulos/articulos.php" >Articulos</a></li>
					</ul>
				</li>-->
				<li><a href=""><i class="icono izquierda fa fa-archive" aria-hidden="true"></i>Almacén<i class="icono derecha fa fa-angle-down" aria-hidden="true"></i></a>
					<ul>
						<!--<li><a href="tipoconcepto/tipoconcepto.php" >Tipo de Concepto</a></li>
						<li><a href="concepto/concepto.php" >Concepto de Articulos</a></li>-->
						<li><a href="entrada/entrada.php" >Entrada de Articulos</a></li>
						<li><a href="salida/salida.php" >Salida de Articulos</a></li>
					</ul>
				</li>
				<li><a href=""><i class="icono izquierda fa fa-file-excel-o" aria-hidden="true"></i>Reportes<i class="icono derecha fa fa-angle-down" aria-hidden="true"></i></a>
					<ul>
						<li><a href="reportes/inventario.php" >Inventario</a></li>
						<li><a href="reportes/concepto_entrega.php" >Concepto de Entrega</a></li>
						<li><a href="" >Entregas por Usuario</a></li>
						<li><a href="" >Entrgas por Departamento</a></li>
						<li><a href="" >Entregas por Empleado</a></li>
					</ul>
				</li>
				<li><a href="../../cerrarsesion.php"><i class="icono izquierda fa fa-sign-out" aria-hidden="true"></i>Cerrar Sesión</a></li>
			</ul>
		</nav>
		</div>

		<div class="contenido">
			<header>
				<h1>Bienvenido</h1>
			</header>
			<section class="main">
				<p>La Seguridad e Higiene industrial es un área encaminada a formar profesionales capaces de analizar, evaluar, organizar, planear, dirigir e identificar factores que afectan de manera crucial la seguridad e higiene en el ambiente laboral, así como para desarrollar e implementar las medidas para prevenir y mitigar las emergencias en su centro de trabajo.
				Además, esta rama de la ingeniera tiene como objetivo principal prevenir los accidentes laborales, los cuales se producen como consecuencia de las actividades de producción, por lo tanto, una producción que no contempla las medidas de seguridad e higiene no es una buena producción. Una buena producción debe satisfacer las condiciones necesarias de los tres elementos indispensables, seguridad, productividad y calidad de los productos. Por tanto, contribuye a la reducción de sus socios y clientes.</p>
			</section>		
		</div>
		
	</div>
</body>
</html>

