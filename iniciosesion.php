<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<title>Inicio de Sesión</title>
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/iniciosesion.css">
</head>
<body>
	<form action="controlador/validar.php" method="POST">
		<h2>Inicio de Sesión</h2>
		<input type="text" name="user" pattern="[a-z.]{1,20}" required placeholder="&#128113; Usuario">
		<input type="password" name="pass" pattern="[a-z0-9]{1,6}" required placeholder="&#128272; Contraseña">
		<input type="submit" value="Ingresar">
	</form>
</body>
</html>