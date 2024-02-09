<?php
	require '../php/transaction.php';
	session_start();
	$pag = true;

	$Producto = get_infPRODUCTO($_GET['id']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Delipizza - Ver pizza</title>
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/producto.css">
	<link rel="icon" type="image/png" href="/img/icon.png"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i" rel="stylesheet">
</head>
<body>
	<?php require '../mod/header.php'; ?>
	<main class="contenedor">
		<div class="cuerpo">
			<?php while($row = $Producto->fetch_assoc()){ ?>
				<div class="producto" style="background-image: url(/img/productov/<?= $row['id'] ?>.png);"></div>
				<h1 class="nombre"><?= $row['nombre'] ?></h1>
				<div class="calificacion">
					<?php for($i=0; $i < $row['calificacion']; $i++){ ?>
						<div class="corazon"></div>
					<?php } ?>
				</div>
				<div class="addcarrito" id="nCa" onclick="addCarrito(<?= $row['id'] ?>)">Agregar al Carrito</div>
				<p class="descripcion"><?= $row['descripcion'] ?></p>
				<hr class="sepuno">
				<div class="tamano">
					<p class="infTamano">Seleccione el tamaño que desea ordenar: </p>
					<select name="" class="optTamano" onchange="modtam()" id="tam">
						<option value="3">Grande</option>
						<option value="2">Mediana</option>
						<option value="1">Pequeña</option>
					</select>
				</div>
				<div class="piepre">
					<p class="infPieza">Unidades: </p>
					<div class="blockPieza">
						<div class="opcBlock" id="menos" onclick="quitar()">
							<span class="sigmenos">-</span>
						</div>
						<div class="opcBlock" id="unidades">
							<span id="num"></span>
						</div>
						<div class="opcBlock" id="mas" onclick="agregar()">
							<span class="sigmas">+</span>
						</div>
					</div>
					<p class="infPrecio">Precio: </p>
					<p class="precio" id="dinero"><?= $row['precio'] ?></p>
				</div>
			<?php } ?>
		</div>
	</main>
	<?php require '../mod/footer.php'; ?>
	<script src="/js/jquery.js"></script>
	<script src="/js/producto.js"></script>
</body>
</html>