<?php
	session_start();
	$pag = true;
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Delipizza - Inicio</title>
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/inicio.css">
	<link rel="icon" type="image/png" href="/img/icon.png"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/css/jquery.fullPage.css" />
</head>
<body>
	<?php require '../mod/header.php'; ?>
	<main id="inicio">

		<section class="section" id="section0">
			<div class="cover">
				<div class="logoBIG"></div>
				<div class="slogan"></div>

				<form action="../index.php" method="post" class="suscribe">
					<input type="text" name="suscribe" placeholder="Ingresa tu Correo electronico" class="inicio" id="email" required>
					<input type="submit" value="ok" class="inicio" id="ok">
				</form>

				<div class="infIe" onclick="infIe()"></div>
			</div>
		</section>

		<section class="section" id="section1">
			<div class="Iportada">
				<p class="titPort">Dale gusto a tu paladar con nuestra variedad de comidas y recibe increibles promociones por ello:</p>
			</div>

			<aside class="productos" id="pizzas">
				<div class="covProd">
					<p class="subt">Pizzas</p>
					<p class="text">La pizza es seguramente uno de los platos más famosos y apreciados en el mundo, es un plato originario de la cocina italiana, admite ingredientes de lo más variados y se presta a peculiares experimentos para aumentar el sabor y la digestibilidad. <br> Por ello en Delipizza estamos comprometidos a preparar las mejores pizzas tradicionales y caseras, para llevar el genuino sabor de nuestro horno a tu paladar.</p>
				</div>
			</aside>
			<aside class="productos" id="bebidas">
				<div class="covProd">
					<p class="subt">Bebidas</p>
					<p class="text">En Delipizza ofrecemos una amplia variedad de bebidas sin importar el horario te ofrecemos cafe, cafe frio, té, té frio, zumos y bebidas gaseosas. <br> Estamos comprometidos hasta con los clientes mas exigentes para brindarles un servicio de calidad que dejara su gusto satisfecho.</p>
				</div>
			</aside>
			<aside class="productos" id="postres">
				<div class="covProd">
					<p class="subt">Postres</p>
					<p class="text">No hay nada mejor para cerrar una deliciosa comida que un postre, ya sea dulce o salado ofrecemos una amplia gama de exquisitos postres. <br> No dejes espacio, llenalo con un helado, un pay o una rebanada de pastel, ya sabes lo que dicen: <br> "barriga llena, corazon contento" </p>
				</div>
			</aside>
		</section>

		<section class="section" id="section2">
			<div class="delicheffs"></div>
			<div class="infdelichf"></div>
		</section>
	</main>
	<script src="/js/jquery.js"></script>
	<script src="/js/jqueryui.js"></script>
	<script src="/js/jquery.fullPage.min.js"></script>
	<script src="/js/main.js"></script>
	<script src="/js/notify.js"></script>
	<script>
		function infIe(){
			$(".infIe").notify("Recibe nuestras promociones en tu correo", 'info');
		}
	</script>
</body>
</html>