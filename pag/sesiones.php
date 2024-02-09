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
	<link rel="stylesheet" href="/css/sesiones.css">
	<link rel="icon" type="image/png" href="/img/icon.png"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i" rel="stylesheet">
</head>
<body>
	<?php require '../mod/header.php'; ?>
	<main class="contenedor">
		<div class="cuerpo">
			<section class="formularios" id="login">
				<form action="" method="post" id="lgFormulario">
					<input type="text" name="usr" placeholder="alguien@ejemplo.com" pattern="[A-Za-z0-9._]+@[A-Za-z0-9._]+\.[A-Za-z]{2,3}$" required>
					<input type="password" name="pwd" placeholder="Contraseña" pattern="[A-Za-z0-9].{5,31}" required>
				</form>
			</section>
			<section class="formularios" id="registro">
				
			</section>
		</div>
	</main>
	<?php require '../mod/footer.php'; ?>
	<script src="/js/jquery.js"></script>
	<script src="/js/sesiones.js"></script>
</body>
</html>