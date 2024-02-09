<?php
	require '../php/transaction.php';
	session_start();
	$pag = true;

	if(isset($_SESSION['cliente'])){
		$Tarjeta = get_infTARJETA($_SESSION['cliente']['id']);
		if(check_infCOMPRA($_SESSION['cliente']['id'])){
			$id = get_idCOMPRA($_SESSION['cliente']['id']);
			$Carrito = get_infCARRITO($id);
			$tot = get_totCOMPRA($id);
			$Ban = 0;
		}else{
			$tot = '0.00';
			$Ban = 1;
		}
    }else{
    	if(isset($_SESSION['empleado'])){
			header('location: /404');
		}else{
			header('location: /registro');
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
			<div class="tarjeta">
				<?php while($raw = $Tarjeta->fetch_assoc()){ ?>
					<p class="tarTitulo">Datos de la tarjeta:</p>
					<div class="tarImg"></div>
					<div class="proTarjeta"><?= $raw['propietario'] ?></div>
					<div class="numTarjeta">XXXX XXXX XXXX <?= $raw['no_de_tarjeta'] ?></div>
					<div class="vigTarjeta"><?= $raw['vigencia'] ?></div>
					<input type="text" placeholder="CVV" class="tarCvv">
					<hr class="sepTar">
					<p class="total">$ <?= $tot ?></p>
					<a href="/orden"><div class="pagar">Pagar Ahora</div></a>
				<?php } ?>
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
							<div class="delProducto" onclick="delCarrito(<?= $row['id'] ?>, <?= $row['producto'] ?>)">Eliminar</div>
						</div>
					<?php }
					}
				}else{ ?>
					<p class="noproductos">AUN NO HAS AGREGADO PRODUCTOS AL CARRITO</p>
				<?php } ?>
			</div>
		</div>
	</main>
	<?php require '../mod/footer.php'; ?>
	<script src="/js/jquery.js"></script>
	<script>
		function delCarrito(id, producto){
			$.ajax({
			url: '../php/addCarrito.php',
			method: 'post',
			dataType: 'json',
			data: {'dproducto': id, 'producto': producto}
			})
			.done(function(respuesta){
				if (respuesta.error == 0){
					console.log("Producto eliminado");
					location.reload();
				}else if (respuesta.error == 9){
					location.href = "/registro";
				}else{
					console.log('Revision a las condiciones de respuesta');
				}
		})
		.fail(function(respuesta){
			console.log(respuesta.responseText);
		});
		}
	</script>
</body>
</html>