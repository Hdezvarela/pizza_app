<?php
	require '../php/transaction.php';
	session_start();
	$pag = true;

	$Pizzas = get_infPRODUCTOS(2);
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Delipizza - Bebidas</title>
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/cliente_productos.css">
	<link rel="icon" type="image/png" href="/img/icon.png"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i" rel="stylesheet">
</head>
<body>
	<?php require '../mod/header.php'; ?>
	<main class="contenedor">
		<div class="bebidasc"></div>
		<div class="cuerpo">
			<div class="submenu">
				<input type="text" class="search" id="buscar" autofocus placeholder="Buscar Bebida">
			</div>
			<div class="prod"></div>
		</div>
	</main>
	<?php require '../mod/footer.php'; ?>
	<script src="/js/jquery.js"></script>
	<script src="/js/producto_vista.js"></script>
	<script src="/js/shbebida.js"></script>
</body>
</html>