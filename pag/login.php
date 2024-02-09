<?php
	session_start();
	$pag = true;

	if(isset($_SESSION['empleado']) || isset($_SESSION['cliente'])){
        header('location: /inicio');
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Delipizza - Inicio</title>
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/sessions.css">
	<link rel="icon" type="image/png" href="/img/icon.png"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i" rel="stylesheet">
	<link rel="stylesheet" href="/ext/fontawesome/css/all.css">
</head>
<body>
	<?php require '../mod/header.php'; ?>
	<main class="contenedor">
		<div class="cuerpo">
			<form action="../php/sessions.php" method="post" id="formlogin">
			<p>Correo electrónico:</p>
			<div class="field-container">
				<i class="fa fa-envelope fa-lg white"></i>
				<input type="email" name="lgUSR" placeholder="example@email.com" required class="field"><br/>
			</div>
			

			<p>Contraseña:</p>
			<div class="field-container">
				<i class="fas fa-key fa-lg"></i>
				<input type="password" name="lgPWD" placeholder="*********"required class="field"> <br/>
			</div>

			<p class="center-content">
				<input type="submit" class="btn btn-cyan" id="btnli" value="Iniciar Sesión">
			</p>
		</form>
		<div class="datERROR">
			<span>El usuario y/o la contraseña son incorrectos</span>
		</div>
		<div class="empERROR">
			<span>Todos los campos son obligatorios</span>
		</div>
		</div>
	</main>
	<?php require '../mod/footer.php'; ?>
	<script src="/js/jquery.js"></script>
	<script src="/js/sessions.js"></script>
</body>
</html>