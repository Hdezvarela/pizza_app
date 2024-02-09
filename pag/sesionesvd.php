<?php
	session_start();
	if(isset($_SESSION['empleado']) || isset($_SESSION['cliente'])){
        header('location: /inicio');
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Delipizza - Usuario</title>
	<link rel="icon" type="image/png" href="/img/favicon.png"/>
	<link rel="stylesheet" href="/css/sesionesvd.css">
</head>
<body>
	<aside class="fondo"></aside>
	<main>
		<div class="atras" id="btn_atras">
			<div class="flecha"></div>
			<span class="txt_atras">Regresar</span>
		</div>
		<a href="/inicio"><div class="logotipo"></div></a>
		<div class="error"><span id="txt_error">Error</span></div>
		<form action="../php/sesiones.php" method="post" class="iniciar_sesion" id="iniciar">
			<p class="txt_titulo">Iniciar sesión</p>
			<input type="text" name="is_email" class="email" placeholder="alguien@ejemplo.com" pattern="[A-Za-z0-9._]+@[A-Za-z0-9._]+\.[A-Za-z]{2,3}$" required autofocus>
			<span class="txt_email">Correo Electronico</span>
			<input type="password" name="is_password" class="password" placeholder="Contraseña" required>
			<input type="submit" class="btn_iniciar" id="btn_ini" value="Iniciar Sesión">
			<span class="txt_registro">¿No tienes una cuenta?</span>
			<span class="link_registro" id="ir_registro">Crear una nueva</span>
		</form>
		<form action="../php/sesiones.php" method="post" class="crear_cuenta" id="crear">
			<p class="txt_titulo">Crear cuenta</p>
			<input type="text" name="cc_email" class="email" placeholder="alguien@ejemplo.com" pattern="[A-Za-z0-9._]+@[A-Za-z0-9._]+\.[A-Za-z]{2,3}$" required>
			<span class="txt_email">Correo Electronico</span>
			<input type="password" name="cc_password" class="password" placeholder="Contraseña" required>
			<input type="text" name="cc_nombre" class="nombre" placeholder="Nombre" required>
			<input type="text" name="cc_apellidos" class="apellidos" placeholder="Apellidos" required>
			<input type="text" name="cc_direccion" class="direccion" placeholder="Direccion" required>
			<input type="number" name="cc_dia" min="1" max="31" class="dia" placeholder="Dia" required>
			<input type="number" name="cc_mes" min="1" max="12" class="mes" placeholder="Mes" required>
			<input type="number" name="cc_ano" min="1970" max="2002" class="ano" placeholder="Año" required>
			<input type="submit" class="btn_crear" id="btn_cre" value="Crear Cuenta">
			<span class="txt_iniciar">¿Ya tienes una cuenta?</span>
			<span class="link_iniciar" id="ir_iniciar">Iniciar sesión</span>
		</form>
	</main>
	<script src="/js/jquery.js"></script>
	<script src="/js/sesionesvd.js"></script>
</body>
</html>