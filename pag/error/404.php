<?php
	session_start();
	$pag = true;
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Delipizza - 404 No encontrado</title>
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/error.css">
	<link rel="icon" type="image/png" href="/img/icon.png"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i" rel="stylesheet">
</head>
<body>
	<?php require '../../mod/header.php'; ?>
	<main class="contenedor">
		<div class="cuerpo">
			<img src="/img/error/404.png" class="imgError">
		</div>
	</main>
	<?php require '../../mod/footer.php'; ?>
</body>
</html>