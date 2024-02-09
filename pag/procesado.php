<?php
	require '../php/transaction.php';
	session_start();
	$pag = true;

	if(isset($_SESSION['cliente'])){
		if(check_infCOMPRA($_SESSION['cliente']['id'])){
			$id = get_idCOMPRA($_SESSION['cliente']['id']);
			$Carrito = get_infCARRITO($id);
			del_infCARRITO($id);
			upd_infCOMPRA($id);
			$Ban = 0;
		}else{
			header('location: /carrito');
		}
    }else{
    	if(isset($_SESSION['empleado'])){
			header('location: /404');
		}else{
			header('location: /404');
		}
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Delipizza - Inicio</title>
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/carrito.css">
	<link rel="icon" type="image/png" href="/img/icon.png"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i" rel="stylesheet">
	<link rel="stylesheet" href="/ext/fontawesome/css/all.css">
</head>
<body>
	<?php require '../mod/header.php'; ?>
	<main class="contenedor">
		<div class="cuerpo">
			<div class="gracias">
				<p>TU ORDEN A SIDO PROCESADA</p>
				<p><?= $_SESSION['cliente']['nombre'].' '.$_SESSION['cliente']['apellidos'] ?></p>
				<br>
				<br>
				<p>TU PIZZA ESTA SIENDO PREPARADA Y ESTARA EN CAMINO PRONTO</p>
				<br>
				<br>
				<p>GRACIAS POR TU COMPRA!</p>
				<br>
				<br>
			</div>
			<div class="subtitulos">
				<p class="opcSub">Producto</p>
				<p class="opcSub">Cantidad</p>
				<p class="opcSub">Precio</p>
				<p class="opcSub">Total</p>
			</div>
			<div class="infProductos">
				<?php if($Ban == 0){ ?>
					<?php while($row = $Carrito->fetch_assoc()){
					$prodct = get_infPRODUCTO($row['producto']);
					while($rew = $prodct->fetch_assoc()){ ?>
						<div class="producto">
							<div class="imgProducto" style="background-image: url(/img/producto/<?= $row['producto'] ?>.png);"></div>
							<div class="nomProducto"><?= $rew['nombre'] ?></div>
							<div class="catProducto"><?= $row['cantidad'] ?></div>
							<div class="prcProducto"><?= $rew['precio'] ?></div>
							<div class="totProducto"><?= $row['total'] ?></div>
						</div>
					<?php }
					}
				} ?>
			</div>
		</div>
	</main>
	<?php require '../mod/footer.php'; ?>
	<script src="/js/jquery.js"></script>
</body>
</html>